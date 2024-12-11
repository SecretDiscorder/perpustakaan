<?php

session_start();

if (isset($_SESSION["ses_username"]) == "") {
    header("location: login.php");
} else {
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}

// Koneksi ke DB
include "inc/koneksi.php";
// Make sure your connection uses UTF-8 encoding
mysqli_set_charset($koneksi, "utf8mb4");

// Fetch book data from the database
$no = 1;
$books = [];
$sql = $koneksi->query("SELECT * FROM tb_buku");
while ($data = $sql->fetch_assoc()) {
    $drive_url = $data['drive_url']; // Get the Google Drive URL

    // Check if the URL is a folder
    $is_folder = strpos($drive_url, 'drive.google.com/drive/folders/') !== false;
    $folder_url = $is_folder ? $drive_url : '';
    $books[] = [
        'no' => $no++,
        'judul_buku' => $data['judul_buku'],
        'pengarang' => $data['pengarang'],
        'penerbit' => $data['penerbit'],
        'th_terbit' => $data['th_terbit'],
        'category' => $data['category'], // Added category
        'drive_url' => $drive_url,
        'is_folder' => $is_folder,
        'folder_url' => $folder_url
    ];
}

?>
<?php
// Koneksi ke DB
$sql_categories = $koneksi->query("SELECT DISTINCT category FROM tb_buku ORDER BY category");
$categories = [];
while ($data = $sql_categories->fetch_assoc()) {
    $categories[] = $data['category'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library</title>


    <!-- Custom Styles -->
    <style>
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.2rem;
        }
        .card-text {
            font-size: 1rem;
        }
        #searchInput {
            width: 100%;
            padding: 10px;
            height: 50px;
        }
        #prevBtn, #nextBtn {
            width: 100px;
            padding: 10px;
        }
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
        #pdf-iframe {
            width: 100%;
            height: 80vh;
        }
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
<body>

<?php if ($data_level == "User") { ?>
    <div class="container py-5">
        <h1 class="text-center mb-5">Book Library</h1>
<!-- Dropdown for Filtering Book Types -->
<!-- Dropdown for Filtering Book Categories -->
<div class="mb-4">
    <select id="bookTypeFilter" class="form-control" onchange="filterBooksByCategory()">
        <option value="">Select Category</option>
        <?php foreach ($categories as $category) : ?>
            <option value="<?= $category ?>"><?= $category ?></option>
        <?php endforeach; ?>
    </select>
</div>


        <!-- Search Bar -->
        <div class="mb-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Search books..." onkeyup="searchBooks()">
        </div>

        <!-- Book List -->
        <div class="row" id="book-list">
        </div>

        <!-- Pagination Controls -->
        <div class="d-flex justify-content-between mt-4">
            <button id="prevBtn" class="btn btn-primary" onclick="changePage('prev')">Previous</button>
            <button id="nextBtn" class="btn btn-primary" onclick="changePage('next')">Next</button>
        </div>
    </div>

    <!-- Full-Screen PDF Viewer -->
    <div id="full-screen-container">
        <button class="back-btn" onclick="closeFullScreen()">Back</button>
        <iframe id="pdf-iframe" src="" frameborder="0"></iframe>
    </div>

    <script>
let books = <?php echo json_encode($books, JSON_HEX_TAG); ?>;
let filteredBooks = books;
let currentPage = 0;
const itemsPerPage = 9;

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
        const cardHTML = `
            <div class="col-md-4 col-sm-6 book-item" 
                 data-title="${book.judul_buku}"
                 data-author="${book.pengarang}"
                 data-publisher="${book.penerbit}">
                 <div class="card" style="width: 100%; height: 100%;">
                     <div class="card-body">
                         <p>${book.no}</p>
                         <h5 class="card-title">${book.judul_buku}</h5>
                         <p class="card-text"><strong>Author:</strong> ${book.pengarang}</p>
                         <p class="card-text"><strong>Publisher:</strong> ${book.penerbit}</p>
                         <p class="card-text"><strong>Year:</strong> ${book.th_terbit}</p>
                         <p class="card-text"><strong>Category:</strong> ${book.category}</p>
                         ${isFolder 
                             ? `<a href="${folderUrl}" class="btn btn-info" target="_blank">Open Folder</a>`
                             : `<a href="${driveUrl}" class="btn btn-info" target="_blank">Open Book</a>`
                         }
                     </div>
                 </div>
             </div>
        `;
        bookList.innerHTML += cardHTML;
    });

    document.getElementById("prevBtn").disabled = currentPage === 0;
    document.getElementById("nextBtn").disabled = endIndex >= filteredBooks.length;
}

function changePage(direction) {
    if (direction === 'next' && (currentPage + 1) * itemsPerPage < filteredBooks.length) {
        currentPage++;
    } else if (direction === 'prev' && currentPage > 0) {
        currentPage--;
    }

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
</html>
<?php } else { ?>
    <section class="content-header">
        <h1>Data Buku</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"><i class="fa fa-home"></i><b>Si Tabsis</b></a>
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="card shadow-sm">
            <div class="card-header">
                <a href="?page=MyApp/add_buku" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Buku
                </a>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <label>Show 
                            <select id="entriesPerPage" class="form-select form-select-sm d-inline-block w-auto ms-2" onchange="updateEntriesPerPage()">
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
                        <tbody id="book-table-body">
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_buku");
                            while ($data = $sql->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['judul_buku'] ?></td>
                                    <td><?= $data['pengarang'] ?></td>
                                    <td><?= $data['penerbit'] ?></td>
                                    <td><?= $data['th_terbit'] ?></td>
                                    <td><?= $data['category'] ?></td>
                                    <td>
                                        <a href="<?= $data['drive_url'] ?>" target="_blank">Open</a>
                                    </td>
                                    <td>
                                        <a href="?page=MyApp/edit_buku&id=<?= $data['id_buku'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="?page=MyApp/del_buku&id=<?= $data['id_buku'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

    <script>
        var tableRows;

        // Initialize the table rows for later use
        window.onload = function() {
            tableRows = document.querySelectorAll("#book-table-body tr");
            updateEntriesPerPage(); // Call the function on load to set the default entries per page
        };

        // Function to handle changing the number of entries per page
        function updateEntriesPerPage() {
            var entriesPerPage = document.getElementById("entriesPerPage").value;
            var startIndex = 0;

            // Hide all rows initially
            tableRows.forEach(function(row) {
                row.style.display = "none";
            });

            // Show rows based on the selected entries per page
            if (entriesPerPage === "all") {
                // Show all rows if "Show All" is selected
                tableRows.forEach(function(row) {
                    row.style.display = "";
                });
            } else {
                // Otherwise, show the specified number of rows per page
                for (var i = 0; i < entriesPerPage; i++) {
                    if (tableRows[i]) {
                        tableRows[i].style.display = "";
                    }
                }
            }
        }

        // Function to handle searching within the table
        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, except the header
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                let found = false;
                
                // Loop through all columns (td)
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                        }
                    }
                }

                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
<?php } ?>
