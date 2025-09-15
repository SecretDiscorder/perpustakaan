<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


if (isset($_SESSION["ses_username"]) == "") {
    //header("location: login.php");
    $data_level = "User";
    $data_nama = "User";
    
} else {
    $data_id = $_SESSION["ses_id"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}


// Koneksi ke DB
include "inc/koneksi.php";
// Make sure your connection uses UTF-8 encoding
mysqli_set_charset($koneksi, "utf8mb4");


// Fetch Google Drive thumbnails
function getGoogleDriveThumbnail($driveUrl) {
    // Extract the file ID from the URL
    preg_match('/\/d\/([a-zA-Z0-9-_]+)/', $driveUrl, $matches);
    if (!isset($matches[1])) {
        return 'https://mtk.bima-pustaka.my.id/folder-icon.jpg'; // Tampilkan ikon default untuk folder
    }
    $fileId = $matches[1];

    // Construct the thumbnail URL
    return "https://drive.google.com/thumbnail?id=$fileId";
}

// --- Ambil data buku dengan JOIN ke info_buku ---
$no = 1;
$books = [];
$sql = $koneksi->query("
    SELECT * 
    FROM tb_buku 
    WHERE category NOT IN ('Literasi')
");


$folderCount = 0;
while ($data = $sql->fetch_assoc()) {
    $drive_url = $data["drive_url"];
    $is_folder = strpos($drive_url, "drive.google.com/drive/folders/") !== false;
    $folder_url = $is_folder ? $drive_url : "";
    
    if ($is_folder) {
        $folderCount++;
        if ($folderCount <= 2) {
            $thumbnail = 'https://mtk.bima-pustaka.my.id/folder-icon.jpg';
        } else {
            $thumbnail = getGoogleDriveThumbnail($drive_url);
        }
    } else {
        $thumbnail = getGoogleDriveThumbnail($drive_url);
    }
    
    $books[] = [
        "id_buku"      => $data["id_buku"],
        "no"           => $no++,
        "judul_buku"   => $data["judul_buku"],
        "pengarang"    => $data["pengarang"],
        "penerbit"     => $data["penerbit"],
        "th_terbit"    => $data["th_terbit"],
        "category"     => $data["category"],
        "drive_url"    => $drive_url,
        "is_folder"    => $is_folder,
        "folder_url"   => $folder_url,
        "thumbnail"    => $thumbnail,
        "jumlah_baca"  => $data["jumlah_baca"],
        "total_waktu_baca"  => $data["total_waktu_baca"]
    ];
}
shuffle($books);
foreach ($books as $index => &$book) {
    $book['no'] = $index + 1;
}
unset($book);

// --- Ambil kategori buku ---
$sql_categories = $koneksi->query("SELECT DISTINCT category FROM tb_buku ORDER BY category");
$categories = [];
while ($data = $sql_categories->fetch_assoc()) {
    $categories[] = $data["category"];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Digital</title>
    <!-- Custom Styles -->
    <style>
      /* Ensure cards display correctly across all screen sizes */
      /* Card Styling */
      #book-list {
        display: flex;
        flex-wrap: wrap;
        /* Agar card bisa diposisikan secara fleksibel */
        justify-content: space-between;
        gap: 12px;
        /* Menambahkan jarak antara card dalam tampilan grid */
      }

      /* Desktop view */
      @media (min-width: 992px) {
        .book-item {
          /* On large screens (desktops), the cards will occupy a 1/3 of the width */
          flex: 0 0 30%;
          max-width: 30%;
        }
      }

      /* Tablet view */
      @media (min-width: 768px) and (max-width: 991px) {
        .book-item {
          /* On tablets, the cards will occupy 1/2 of the width */
          flex: 0 0 48%;
          max-width: 48%;
        }
      }

      /* Mobile view */
      @media (max-width: 767px) {
        .book-item {
          /* On smaller screens, the cards will occupy full width */
          flex: 0 0 100%;
          max-width: 100%;
        }
      }

      .card {
        display: flex;
        flex-direction: column;
        /* Agar elemen-elemen card disusun secara vertikal */
        justify-content: space-between;
        /* Menjaga elemen tersebar merata */
        height: 100%;
        /* Pastikan card mengisi ruang yang tersedia */
        overflow: hidden;
        border-radius: 8px;
        /* Memberikan sudut rounded pada card */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /* Memberikan efek shadow pada card */
      }

      .card-body {
        flex-grow: 1;
        /* Membuat card-body mengisi sisa ruang */
        display: flex;
        flex-direction: column;
        /* Menyusun isi card secara vertikal */
        justify-content: space-between;
        /* Menjaga tombol di bagian bawah */
        padding: 15px;
        /* Padding untuk memberi jarak antara konten dan batas card */
      }

      .card-body .btn {
        align-self: flex-end;
        /* Menjaga tombol di bagian bawah */
        margin-top: auto;
        /* Pastikan tombol berada di bagian bawah */
      }

      .card-body p {
        font-size: 0.8rem;
        margin-bottom: 10px;
        /* Memberi jarak antar elemen dalam card */
      }

      /* Card image adjustments */
      .card-img-top {
        width: 100%;
        height: 200px;
        /* Fixed height for the images */
        object-fit: cover;
        /* Maintain image proportions */
        object-position: center;
        /* Ensure the image is centered */
        border-radius: 5px;
        /* Rounded corners for the image */
      }

      /* Card body adjustments */
      .card-body {
        padding: 15px;
        /* Add padding to prevent content from touching edges */
        flex-grow: 1;
        /* Make the card body fill remaining space */
        max-height: auto;
        /* Limit height of card body */
        overflow-y: auto;
        /* Enable scroll if content overflows */
      }

      /* Mobile View (Small screens) */
      @media (max-width: 767px) {
        .book-item {
          flex: 0 0 48%;
          /* Cards take up 2 columns on mobile */
          max-width: 48%;
        }

        .card-body .btn {
          width: 100%;
          /* Full-width buttons on mobile */
        }
      }

      /* Search input and navigation buttons styling */
      #searchInput {
        width: 100%;
        padding: 10px;
        height: 50px;
      }

      #prevBtn,
      #nextBtn {
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
    </style>
  </head>
  <body> <?php if ($data_level == "User") { ?> <div class="container py-5">
      <h1 class="text-center mb-5">Book Library</h1>
      <!-- Dropdown for Filtering Book Types -->
      <!-- Dropdown for Filtering Book Categories -->
      <div class="mb-4">
<select id="bookTypeFilter" class="form-control" onchange="filterBooksByCategory()">
    <option value="">Select Category</option>
    <?php 
    foreach ($categories as $category):
        if ($category != "Literasi" && $category != "Komik" && $category != "Cerita"): // Tambahkan pengecekan kategori "Komik" dan "Cerita"
    ?>
        <option value="<?= $category ?>"><?= $category ?></option>
    <?php 
        endif; // Tutup kondisi if
    endforeach; // Tutup perulangan foreach
    ?>

</select>
      </div>
      <!-- Search Bar -->
      <div class="mb-4">
        <input type="text" id="searchInput" class="form-control" placeholder="Search books..." onkeyup="searchBooks()">
      </div>
      <!-- Book List -->
      <div class="row" id="book-list"></div>
      <!-- Pagination Controls -->
      <div class="d-flex justify-content-between mt-4">
        <button id="prevBtn" class="btn btn-primary" onclick="changePage('prev')">Previous</button>
        <button id="nextBtn" class="btn btn-primary" onclick="changePage('next')">Next</button>
      </div>
    </div>
    <script>
  let isLoggedIn = <?php echo isset($_SESSION["ses_username"]) ? 'true' : 'false'; ?>;
  let books = <?php echo json_encode($books, JSON_HEX_TAG); ?>;
  let filteredBooks = books;
  let currentPage = 0;
  const itemsPerPage = 12;
  
  // Variabel untuk timer membaca
  let readingStartTime = null;
  let idBukuCurrent = null;

  function displayBooks(page) {
    const startIndex = page * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const booksToDisplay = filteredBooks.slice(startIndex, endIndex);
    const bookList = document.getElementById("book-list");
    bookList.innerHTML = '';
    booksToDisplay.forEach(book => {
        const isFolder = book.is_folder;
        const driveUrl = book.drive_url;
        const folderUrl = book.folder_url;
        // Menambahkan info jumlah baca dan total waktu baca
        const infoText = `
            <p style="font-size: 10px;" >Dibaca: ${book.jumlah_baca}x, Waktu: ${book.total_waktu_baca} m</p>`;
        
const cardHTML = `
  <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-title="${book.judul_buku}">
    <div class="card h-100">
      <img src="${book.thumbnail || 'default-placeholder.jpg'}" referrerPolicy="no-referrer" class="card-img-top" alt="Book Cover">
      <div class="card-body d-flex flex-column">
        <b style="font-size: 12px;" class="font-weight-bold">${book.judul_buku}</b>

        ${infoText}

        <p style="font-size: 12px;" class="mt-2"><strong>Jenis:</strong> ${book.category}</p>

        <div class="mt-auto pt-2">
          ${
            isFolder 
              ? `<a href="${folderUrl}" class="btn btn-info btn-block">Open Folder</a>`
              : (
                  isLoggedIn 
                    ? `<button class="btn btn-info btn-block" onclick="startReading(${book.id_buku}, '${driveUrl}')">Baca</button>` 
                    : `<button class="btn btn-info btn-block" onclick="showLoginAlert()"><i class="fa fa-lock"></i></button>`
                )
          }
        </div>
      </div>
    </div>
  </div>
`;

        bookList.innerHTML += cardHTML;
    });
    // Update tombol prev/next
    document.getElementById("prevBtn").disabled = currentPage === 0;
    document.getElementById("nextBtn").disabled = endIndex >= filteredBooks.length;
  }

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
let startTime = null;
let endTime = null;

function startReading(id_buku, driveUrl) {
    // Record the start time when the user starts reading the book
    startTime = new Date().getTime(); // Current time in milliseconds

    // Open the Google Drive link in a new window/tab
    window.open(driveUrl, "_blank");

    // After opening the book, you can use an event listener to track when the user returns to your site
    // For simplicity, we'll just assume the user returns after some time.
    // This is where you'd add more logic for more sophisticated tracking.
    
    // Simulate a user returning to the site (this could be an actual event like clicking a component)
    setTimeout(() => {
        // Record the end time when the user returns (you can track this with an event listener)
        endTime = new Date().getTime(); // Current time in milliseconds

        // Calculate the reading time in minutes
        const readingTime = Math.round((endTime - startTime) / 60000); // Convert milliseconds to minutes

        // Send the reading time and book id to the backend
        updateReading(id_buku, readingTime);
    }, 10000); // Simulating that the user spent 10 seconds reading. Replace with actual logic.
}
function updateReading(id_buku, waktu_baca) {
    fetch('update_reading.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id_buku=${id_buku}&waktu_baca=${waktu_baca}`
    })
    .then(response => response.text())  // Log the raw response text
    .then(data => {
        console.log("Raw response from server:", data); // Debugging
        try {
            const jsonData = JSON.parse(data); // Parse the JSON
            if (jsonData.success) {
            } else {
            }
        } catch (error) {
        }
    })
    .catch(error => {
    });
}

  function getUserIdFromSession() {
    return localStorage.getItem('user_id'); // ID user dari localStorage
  }

// Function to stop the reading session and calculate time spent
function stopReading() {
    if (readingStartTime && idBukuCurrent) {
        // Stop the timer and calculate the reading time
        readingEndTime = new Date();
        const durationInMinutes = Math.round((readingEndTime - readingStartTime) / 60000); // Calculate time in minutes

        if (durationInMinutes < 1) {
            readingTime = 1; // Minimum reading time should be 1 minute
        }

        // Send the reading time to the backend to update the database
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_reading.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        const userId = getUserIdFromSession(); // Get the user ID

        xhr.send(`id_user=${userId}&id_buku=${idBukuCurrent}&waktu_baca=${durationInMinutes}`);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Reading time updated successfully");
            }
        };

        // Reset the start time and current book ID
        readingStartTime = null;
        idBukuCurrent = null;
    }
}

// You can add event listeners to stop reading on page interactions (e.g., scroll or click)
window.addEventListener('scroll', stopReading);
window.addEventListener('click', stopReading);

function changePage(direction) {
    if (direction === 'next' && (currentPage + 1) * itemsPerPage < filteredBooks.length) {
        currentPage++;
    } else if (direction === 'prev' && currentPage > 0) {
        currentPage--;
    }

    window.scrollTo({top: 0, behavior: "smooth"});
    displayBooks(currentPage);
}

function searchBooks() {
    var input = document.getElementById('searchInput').value.toLowerCase();

    filteredBooks = books.filter(function(book) {
        var title = (book.judul_buku || "").toLowerCase();
        var author = (book.pengarang || "").toLowerCase();
        var publisher = (book.penerbit || "").toLowerCase();
        return title.includes(input) || author.includes(input) || publisher.includes(input);
    });

    currentPage = 0;
    displayBooks(currentPage);
}

function filterBooksByCategory() {
    const selectedType = document.getElementById("bookTypeFilter").value.toLowerCase();

    if (selectedType) {
        filteredBooks = books.filter(book => book.category.toLowerCase() === selectedType);
    } else {
        filteredBooks = books;
    }

    currentPage = 0;
    displayBooks(currentPage);
}

document.getElementById('searchInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        searchBooks();
    }
});

displayBooks(currentPage);

    </script>
  </body>
</html> <?php } else { ?> <section class="content-header">
  <h1>Data Buku</h1>
  <ol class="breadcrumb">
    <li>
      <a href="index.php">
        <i class="fa fa-home"></i>
        <b>Dashboard</b>
      </a>
    </li>
  </ol>
</section>
<section class="content">
  <div class="card shadow-sm">
    <div class="card-header">
      <a href="?page=MyApp/add_buku" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Buku </a>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-between mb-3">
        <div>
          <label>Show <select id="entriesPerPage" class="form-select form-select-sm d-inline-block w-auto ms-2" onchange="updateTable()">
              <option value="5">5</option>
              <option value="10" selected>10</option>
              <option value="20">20</option>
              <option value="all">Show All</option>
            </select> entries </label>
        </div>
        <div>
          <input type="text" id="searchInput" class="form-control form-control-sm d-inline-block w-auto" placeholder="Search..." onkeyup="searchTable()">
        </div>
      </div>
      <!-- Book Table -->
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Buku</th>
              <th>Pengarang</th>
              <th>Penerbit</th>
              <th>Tahun Terbit</th>
              <th>Kategori</th>
              <th>Drive URL</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="book-table-body"> <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_buku");
                            while ($data = $sql->fetch_assoc()) { ?> <tr>
              <td> <?= $no++ ?> </td>
              <td> <?= $data["judul_buku"] ?> </td>
              <td> <?= $data["pengarang"] ?> </td>
              <td> <?= $data["penerbit"] ?> </td>
              <td> <?= $data["th_terbit"] ?> </td>
              <td> <?= $data["category"] ?> </td>
              <td>
                <a href="
															<?= $data[
                                            "drive_url"
                                        ] ?>" >Open </a>
              </td>
              <td>
                <a href="?page=MyApp/edit_buku&id=
															<?= $data[
                                            "id_buku"
                                        ] ?>" class="btn btn-warning btn-sm">Edit </a> <?php 
if ($data_level == "Administrator") {
    echo '
														<a href="?page=MyApp/del_buku&id=' . $data["id_buku"] . '" class="btn btn-danger btn-sm">Delete</a>';
}
?>
              </td>
            </tr> <?php }
                            ?> </tbody>
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
let entriesPerPage = 10;

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
 <?php } ?>