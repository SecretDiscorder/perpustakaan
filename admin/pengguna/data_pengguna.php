<?php 
if ($data_level == "Administrator") {
?>
<section class="content-header">
    <h1>
        Pengguna Sistem
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <b>Dashboard</b>
            </a>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="card shadow-sm">
        <div class="card-header">
            <a href="?page=MyApp/add_pengguna" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">


            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php
                            $no = 1;
                            $sql = $koneksi->query("select * from tb_pengguna");
                            $data_rows = [];
                            while ($data = $sql->fetch_assoc()) {
                                $data_rows[] = $data;
                            }
                            $totalRows = count($data_rows);
                        ?>

                        <?php foreach ($data_rows as $data): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nama_pengguna']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['level']; ?></td>
                            <td>
                                <a href="?page=MyApp/edit_pengguna&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <a href="?page=MyApp/del_pengguna&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
                <button id="prevBtn" class="btn btn-primary btn-sm" onclick="changePage('prev')" disabled>
                    Previous
                </button>
                <span id="pageInfo" class="align-self-center"></span>
                <button id="nextBtn" class="btn btn-primary btn-sm" onclick="changePage('next')" disabled>
                    Next
                </button>
            </div>
        </div>
    </div>
</section>
<?php 
}
?>
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
                <td>${data.nama_pengguna}</td>
                <td>${data.username}</td>
                <td>${data.level}</td>
                <td>
                    <a href="?page=MyApp/edit_pengguna&kode=${data.id_pengguna}" title="Ubah" class="btn btn-success btn-sm">
                        <i class="bi bi-pencil"></i> Ubah
                    </a>
                    <a href="?page=MyApp/del_pengguna&kode=${data.id_pengguna}" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
            return row.nama_pengguna.toLowerCase().includes(searchQuery) || row.username.toLowerCase().includes(searchQuery);
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
