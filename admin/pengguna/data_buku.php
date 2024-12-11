

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
        'drive_url' => $drive_url,
        'is_folder' => $is_folder,
        'folder_url' => $folder_url
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Example Custom CSS */
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
        /* Custom Full-Screen PDF Container */
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

        <!-- Search Bar -->
        <div class="mb-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Search books..." onkeyup="searchBooks()">
        </div>

        <!-- Book List -->
        <div class="row" id="book-list">
            <!-- Dynamic book list will be loaded here by JavaScript -->
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

    <!-- JavaScript for functionality -->
    <script>
        // Safely pass PHP data into JS
        let books = <?php echo json_encode($books, JSON_HEX_TAG); ?>;

        let filteredBooks = books; // Initially, the filtered list is the same as all books
        let currentPage = 0;
        const itemsPerPage = 9;

        // Function to display books based on the current page and search filter
        function displayBooks(page) {
            const startIndex = page * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const booksToDisplay = filteredBooks.slice(startIndex, endIndex);

            // Clear current book list
            const bookList = document.getElementById("book-list");
            bookList.innerHTML = '';

            // Add books for the current page
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

            // Disable/Enable pagination buttons based on filtered list
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

        // Initialize the first page
        displayBooks(currentPage);

        function searchBooks() {
            var input = document.getElementById('searchInput').value.toLowerCase();

            // Filter books based on title, author, or publisher
            filteredBooks = books.filter(function(book) {
                // Ensure that undefined or null values are handled gracefully by falling back to empty string
                var title = (book.judul_buku || "").toLowerCase();
                var author = (book.pengarang || "").toLowerCase();
                var publisher = (book.penerbit || "").toLowerCase();

                // Return true if any field matches the search input
                return title.includes(input) || author.includes(input) || publisher.includes(input);
            });

            // Reset to the first page after search
            currentPage = 0;
            displayBooks(currentPage);
        }

        document.getElementById('searchInput').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                searchBooks();
            }
        });
    </script>
</body>
</html>





<?php } else { ?>
<section class="content-header">
    <h1>
        Data Buku
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <b>Si Tabsis</b>
            </a>
        </li>
    </ol>
</section>

<!-- Main content -->
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
                        <select id="entriesPerPage" class="form-select form-select-sm d-inline-block w-auto ms-2">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                        </select> entries
                    </label>
                </div>
                <div>
                    <input type="text" id="searchInput" class="form-control form-control-sm w-auto" placeholder="Search...">
                </div>
            </div>

            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM data_buku");
                            $data_rows = [];
                            while ($data = $sql->fetch_assoc()) {
                                $data_rows[] = $data;
                            }
                            $totalRows = count($data_rows);
                        ?>

                        <?php foreach ($data_rows as $data): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['judul_buku']; ?></td>
                            <td><?php echo $data['pengarang']; ?></td>
                            <td><?php echo $data['penerbit']; ?></td>
                            <td><?php echo $data['tahun_terbit']; ?></td>
                            <td>
                                <a href="?page=MyApp/edit_buku&kode=<?php echo $data['id_buku']; ?>" title="Ubah" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <a href="?page=MyApp/del_buku&kode=<?php echo $data['id_buku']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Controls -->
            <div class="d-flex justify-content-between mt-3">
                <button id="prevBtn" class="btn btn-secondary btn-sm" onclick="changePage('prev')" disabled>
                    Previous
                </button>
                <span id="pageInfo" class="align-self-center"></span>
                <button id="nextBtn" class="btn btn-secondary btn-sm" onclick="changePage('next')" disabled>
                    Next
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    var currentPage = 1;
    var rowsPerPage = 10; // Default to show 10 rows per page
    var dataRows = <?php echo json_encode($data_rows); ?>; // Fetch all rows
    var totalRows = dataRows.length;
    var totalPages = Math.ceil(totalRows / rowsPerPage);

    // Update the table based on the current page and rows per page
    function updateTable() {
        var tableBody = document.getElementById('tableBody');
        var startIndex = (currentPage - 1) * rowsPerPage;
        var endIndex = startIndex + rowsPerPage;
        var paginatedRows = dataRows.slice(startIndex, endIndex);

        // Clear the current table body
        tableBody.innerHTML = '';

        // Append new rows to the table
        paginatedRows.forEach((data, index) => {
            var row = document.createElement('tr');
            row.innerHTML = `
                <td>${startIndex + index + 1}</td>
                <td>${data.judul_buku}</td>
                <td>${data.pengarang}</td>
                <td>${data.penerbit}</td>
                <td>${data.tahun_terbit}</td>
                <td>
                    <a href="?page=MyApp/edit_buku&kode=${data.id_buku}" title="Ubah" class="btn btn-secondary btn-sm">
                        <i class="bi bi-pencil"></i> Ubah
                    </a>
                    <a href="?page=MyApp/del_buku&kode=${data.id_buku}" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-secondary btn-sm">
                        <i class="bi bi-trash"></i> Hapus
                    </a>
                </td>
            `;
            tableBody.appendChild(row);
        });

        // Update the page info text
        document.getElementById('pageInfo').textContent = `Showing ${startIndex + 1} to ${Math.min(endIndex, totalRows)} of ${totalRows} entries`;

        // Enable/disable pagination buttons
        document.getElementById('prevBtn').disabled = (currentPage === 1);
        document.getElementById('nextBtn').disabled = (currentPage === totalPages);
    }

    // Change page based on the button clicked (previous or next)
    function changePage(direction) {
        if (direction === 'next' && currentPage < totalPages) {
            currentPage++;
        } else if (direction === 'prev' && currentPage > 1) {
            currentPage--;
        }
        updateTable();
    }

    // Handle search functionality
    document.getElementById('searchInput').addEventListener('input', function(e) {
        var searchQuery = e.target.value.toLowerCase();
        dataRows = <?php echo json_encode($data_rows); ?>; // Reset data
        dataRows = dataRows.filter(function(row) {
            return row.judul_buku.toLowerCase().includes(searchQuery) || row.pengarang.toLowerCase().includes(searchQuery);
        });
        totalRows = dataRows.length;
        totalPages = Math.ceil(totalRows / rowsPerPage);
        currentPage = 1; // Reset to first page
        updateTable();
    });

    // Handle entries per page change
    document.getElementById('entriesPerPage').addEventListener('change', function(e) {
        rowsPerPage = parseInt(e.target.value);
        totalPages = Math.ceil(totalRows / rowsPerPage);
        currentPage = 1; // Reset to first page
        updateTable();
    });

    // Initialize table
    updateTable();
</script>

<style>
    .btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .pagination-controls button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .pagination-controls button:hover {
        background-color: #0056b3;
    }

    input[type="text"], select {
        padding: 5px;
        border-radius: 4px;
        margin-left: 5px;
    }
</style>


<?php } ?>

