<?php
// Single file solution for displaying comics with pagination and search

// Include your database connection
include 'inc/koneksi.php';  // Make sure you have this file for database connection
$sql = $koneksi->query("SELECT * FROM komik");
$comics = [];

while ($data = $sql->fetch_assoc()) {
    // Get the image URL from the database
    $gambar = $data['gambar'];

    // Check if the image URL is from Google Drive
    if (strpos($gambar, 'drive.google.com') !== false) {
        preg_match('/\/d\/(.*?)\//', $gambar, $matches);
        $fileId = $matches[1] ?? '';

        if ($fileId) {
            // Convert Google Drive URL to an accessible thumbnail
            $gambar = "https://drive.google.com/thumbnail?id=" . $fileId;
        }
    }

    // Add the comic data to the array
    $comics[] = [
        'id' => $data['id'],
        'title' => $data['judul'],
        'author' => $data['penulis'],
        'image' => $gambar // Use the processed image URL
    ];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Komik</title>

    <!-- Custom Styles -->

    <!-- Custom Styles -->
    <style>
/* Ensure cards display correctly across all screen sizes */
/* Card Styling */
#book-list {
    display: flex;
    flex-wrap: wrap; /* Agar card bisa diposisikan secara fleksibel */
    justify-content: space-between;
    gap: 12px; /* Menambahkan jarak antara card dalam tampilan grid */
}
/* Desktop view */
@media (min-width: 992px) {
    .komik-item {
        /* On large screens (desktops), the cards will occupy a 1/3 of the width */
        flex: 0 0 46%;
        max-width: 100%;
    }
}

/* Tablet view */
@media (min-width: 768px) and (max-width: 991px) {
    .komik-item {
        /* On tablets, the cards will occupy 1/2 of the width */
        flex: 0 0 48%;
        max-width: 48%;
    }
}

/* Mobile view */
@media (max-width: 767px) {
    .komik-item {
        /* On smaller screens, the cards will occupy full width */
        flex: 0 0 100%;
        max-width: 100%;
    }
}
.card {
    display: flex;
    flex-direction: column; /* Agar elemen-elemen card disusun secara vertikal */
    justify-content: space-between; /* Menjaga elemen tersebar merata */
    height: 100%; /* Pastikan card mengisi ruang yang tersedia */

    overflow: hidden;
    border-radius: 8px; /* Memberikan sudut rounded pada card */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Memberikan efek shadow pada card */
}

.card-body {
    flex-grow: 1; /* Membuat card-body mengisi sisa ruang */
    display: flex;
    flex-direction: column; /* Menyusun isi card secara vertikal */
    justify-content: space-between; /* Menjaga tombol di bagian bawah */
    padding: 15px; /* Padding untuk memberi jarak antara konten dan batas card */
}

.card-body .btn {
    align-self: flex-end; /* Menjaga tombol di bagian bawah */
    margin-top: auto; /* Pastikan tombol berada di bagian bawah */
}

.card-body p {
    font-size: 0.8rem;
    margin-bottom: 10px; /* Memberi jarak antar elemen dalam card */
}

/* Card image adjustments */
.card-img-top {
    width: 100%;
    height: 500px; /* Fixed height for the images */
    object-fit: cover; /* Maintain image proportions */
    object-position: center; /* Ensure the image is centered */
    border-radius: 5px; /* Rounded corners for the image */
}
/* Mobile View (Small screens) */
@media (max-width: 767px) {
    .book-item {
        flex: 0 0 48%; /* Cards take up 2 columns on mobile */
        max-width: 48%;
    }

    .card-body .btn {
        width: 100%; /* Full-width buttons on mobile */
    }
}




/* Search input and navigation buttons styling */
#searchInput {
    width: 100%;
    padding: 10px;
    height: 50px;
}

#prevBtn, #nextBtn {
    width: 100px;
    padding: 10px;
}

/* Full-screen container styling */
#full-screen-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 1000;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* Back button styling inside full-screen mode */
.back-btn {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(255, 255, 255, 0.7);
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

        /* Style for Tree view of chapters */
        .tree {
            margin: 0;
            padding-left: 20px;
            list-style-type: none;
        }

        .tree li {
            padding: 5px 0;
        }

        .tree li:before {
            content: "► ";
            padding-left: 5px;
            font-size: 16px;
        }
    </style>
</head>

<body>
<?php if ($data_level == "User" or $data_level == "") { ?>
    <div class="container py-5">
        <h1 class="text-center mb-5">Komik Library</h1>

        <!-- Search Bar -->
        <div class="mb-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Search komik..." onkeyup="searchKomik()">
        </div>

        <!-- Book List -->
        <div class="row" id="book-list">
            <!-- Books will be dynamically added here using JavaScript -->
        </div>

        <!-- Pagination Controls -->
        <div class="d-flex justify-content-between mt-4">
            <button id="prevBtn" class="btn btn-primary" disabled>Previous</button>
            <button id="nextBtn" class="btn btn-primary">Next</button>
        </div>
    </div>
    <script>

  let isLoggedIn = <?php echo isset($_SESSION["ses_username"]) ? 'true' : 'false'; ?>;
        let currentPage = 1;
        const itemsPerPage = 2; // Number of comics per page
        let allComics = <?php echo json_encode($comics); ?>;
        let filteredBooks = [];

  function showLoginAlert() {
    Swal.fire({
      icon: 'warning',
      title: 'Oops...',
      text: 'Harap login terlebih dahulu!',
      confirmButtonText: 'OK'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'login.php';
      }
    });
  }
        // Handle page change (Next/Previous)
        function changePage(direction) {
            if (direction === 'next' && (currentPage * itemsPerPage) < (filteredBooks.length > 0 ? filteredBooks.length : allComics.length)) {
                currentPage++;
            } else if (direction === 'prev' && currentPage > 1) {
                currentPage--;
            }


    window.scrollTo({top: 0, behavior: "smooth"});
    displayBooks(currentPage);
            displayBooks(currentPage);
        }

        document.getElementById("prevBtn").addEventListener("click", () => changePage('prev'));
        document.getElementById("nextBtn").addEventListener("click", () => changePage('next'));

        // Search function to filter comics by title, author, or publisher
        function searchKomik() {
            const input = document.getElementById('searchInput').value.toLowerCase();

            // Filter the comics based on input
            filteredBooks = allComics.filter(function(book) {
                return book.title.toLowerCase().includes(input) || book.author.toLowerCase().includes(input);
            });

            currentPage = 1;  // Reset to the first page when a new search is made
            displayBooks(currentPage);
        }

        // Function to display books based on the current page
        function displayBooks(page) {
            const listToDisplay = filteredBooks.length > 0 ? filteredBooks : allComics;
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const paginatedComics = listToDisplay.slice(startIndex, endIndex);

            const bookList = document.getElementById("book-list");
            bookList.innerHTML = "";  // Clear current list

            paginatedComics.forEach(book => {
const cardHTML = `
    <div class="col-lg-4 col-md-6 col-sm-12 komik-item">
        <div class="card h-100">
            <img src="${book.image || ''}" class="card-img-top" alt="Komik Thumbnail">
            <div class="card-body d-flex flex-column">
                <h2><strong>${book.title}</strong></h2>
                <p style="text-align: justify; font-style: italic; font-size: 1.05rem; margin-top: 10px;">
                    <strong>Sinopsis:</strong><br>
                    ${book.author}
                </p>
                <div class="mt-auto pt-2">
                    ${
                      isLoggedIn 
                        ? `<a href="index.php?page=MyApp/get_chapters&komik_id=${book.id}" class="btn btn-primary btn-block">Baca Buku</a>` 
                        : `<button class="btn btn-secondary btn-block" onclick="showLoginAlert()"><i class="fa fa-lock"></i> Baca Buku</button>`
                    }
                </div>
            </div>
        </div>
    </div>
`;

                bookList.innerHTML += cardHTML;
            });

            // Enable/disable pagination buttons based on the list size
            document.getElementById("prevBtn").disabled = currentPage === 1;
            document.getElementById("nextBtn").disabled = currentPage * itemsPerPage >= listToDisplay.length;
        }

        // Initial display of books when page loads
        displayBooks(currentPage);
    </script>

<?php } else { ?>
<section class="content-header">
    <h1>Data Komik</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index.php"><i class="fa fa-home"></i><b>Dashboard</b></a>
        </li>
    </ol>
</section>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-header">
            <a href="?page=MyApp/add_komik" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Komik
            </a>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <label>Show 
                        <select id="entriesPerPage" class="form-select form-select-sm d-inline-block w-auto ms-2" onchange="updateTable()">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="all">Show All</option>
                        </select> entries
                    </label>
                </div>
                <div>
                    <input type="text" id="searchInput" class="form-control form-control-sm d-inline-block w-auto" placeholder="Search..." onkeyup="searchTable()">
                </div>
            </div>

            <!-- Komik Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Komik</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Gambar</th>
                            <th>Chapters</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="book-table-body">
                        <?php
                        $no = 1;
                        $sql = $koneksi->query("SELECT * FROM komik");
                        while ($data = $sql->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data["judul"] ?></td>
                                <td><?= $data["penulis"] ?></td>
                                <td><?= $data["penerbit"] ?></td>
                                <td><img src="<?= $data['gambar'] ?>" width="100" height="100" /></td>
                                <td>
                                    <!-- Display chapters in tree view -->
                                    <?php
                                    $komik_id = $data['id'];
                                    $chapter_sql = $koneksi->query("SELECT * FROM chapter WHERE komik_id = $komik_id");
                                    if ($chapter_sql->num_rows > 0) {
                                        echo "<ul class='tree'>";
                                        while ($chapter = $chapter_sql->fetch_assoc()) {
                                            echo "<li><a href='index.php?page=MyApp/view_chapters&komik_id=".$chapter['id']."'>".$chapter['judul']."</a></li>";
                                        }
                                        echo "</ul>";
                                    } else {
                                        echo "No Chapters Available";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <!-- Only administrator can edit and delete -->
                                    <a href="index.php?page=MyApp/edit_komik&id=<?= $data["id"] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=MyApp/view_chapters&komik_id=<?= $data["id"] ?>" class="btn btn-info btn-sm">View Chapters</a>
                                    <?php 
                                    if ($data_level == "Administrator") {
                                        echo '<a href="index.php?page=MyApp/del_komik&id=' . $data["id"] . '" class="btn btn-danger btn-sm">Delete</a>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
                <div id="paginationControls" class="mt-2 d-flex justify-content-end gap-2">
  <button class="btn btn-sm btn-secondary" onclick="changePage(-1)">Previous</button>
  <span id="pageIndicator" class="align-self-center">Page 1</span>
  <button class="btn btn-sm btn-secondary" onclick="changePage(1)">Next</button>
</div>

            </div>
        </div>
    </div>
</section>
<script>
let tableRows = [];
let currentPage = 1;
let entriesPerPage = 5;

window.onload = function () {
  tableRows = document.querySelectorAll("#book-table-body tr");
  updateTable();
};

function updateTable() {
  let selected = document.getElementById("entriesPerPage").value;
  entriesPerPage = selected === "all" ? tableRows.length : parseInt(selected);
  currentPage = 1;
  renderTable();
}

function renderTable() {
  let start = (currentPage - 1) * entriesPerPage;
  let end = start + entriesPerPage;

  tableRows.forEach((row, index) => {
    row.style.display = (index >= start && index < end) ? "" : "none";
  });

  updatePagination();
}

function updatePagination() {
  const totalPages = Math.ceil(tableRows.length / entriesPerPage);
  document.getElementById("pageIndicator").innerText = `Page ${currentPage} of ${totalPages}`;

  document.querySelector("#paginationControls button:first-child").disabled = currentPage === 1;
  document.querySelector("#paginationControls button:last-child").disabled = currentPage === totalPages;
}

function changePage(direction) {
  const totalPages = Math.ceil(tableRows.length / entriesPerPage);
  currentPage += direction;

  if (currentPage < 1) currentPage = 1;
  if (currentPage > totalPages) currentPage = totalPages;

  renderTable();
}

function searchTable() {
  const input = document.getElementById("searchInput").value.toUpperCase();

  tableRows.forEach(row => {
    const cells = row.getElementsByTagName("td");
    let match = false;

    for (let cell of cells) {
      if (cell.textContent.toUpperCase().includes(input)) {
        match = true;
        break;
      }
    }
    row.style.display = match ? "" : "none";
  });

  // Refresh pagination
  tableRows = Array.from(document.querySelectorAll("#book-table-body tr")).filter(row => row.style.display !== "none");
  currentPage = 1;
  renderTable();
}
</script>

</body>
</html>
<?php }?>