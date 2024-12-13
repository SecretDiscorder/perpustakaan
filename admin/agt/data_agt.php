<?php 
if ($data_level == "Administrator") {
?>
<section class="content-header" style="text-align: center;">
    <h1>
        Data Anggota
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
            <a href="?page=MyApp/add_agt" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
            <a href="?page=MyApp/print_allagt" class="btn btn-success" title="Print" style="color: green;">
                <i class="glyphicon glyphicon-print"></i> Print
            </a>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">

            </div>

            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Anggota</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Kelas</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * from tb_anggota");
                            $data_rows = [];
                            while ($data = $sql->fetch_assoc()) {
                                $data_rows[] = $data;
                            }
                            $totalRows = count($data_rows);
                        ?>

                        <?php foreach ($data_rows as $data): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['id_anggota']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['jekel']; ?></td>
                            <td><?php echo $data['kelas']; ?></td>
                            <td><?php echo $data['no_hp']; ?></td>
                            <td>
                                <a href="?page=MyApp/edit_agt&kode=<?php echo $data['id_anggota']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <a href="?page=MyApp/del_agt&kode=<?php echo $data['id_anggota']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                                <a href="?page=MyApp/print_agt&kode=<?php echo $data['id_anggota'] ?>" title="Print" target="_blank" class="btn btn-primary btn-sm">
                                    <i class="bi bi-printer"></i> Print
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
                <td>${data.id_anggota}</td>
                <td>${data.nama}</td>
                <td>${data.jekel}</td>
                <td>${data.kelas}</td>
                <td>${data.no_hp}</td>
                <td>
                    <a href="?page=MyApp/edit_agt&kode=${data.id_anggota}" title="Ubah" class="btn btn-success btn-sm">
                        <i class="bi bi-pencil"></i> Ubah
                    </a>
                    <a href="?page=MyApp/del_agt&kode=${data.id_anggota}" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> Hapus
                    </a>
                    <a href="?page=MyApp/print_agt&kode=${data.id_anggota}" title="Print" target="_blank" class="btn btn-primary btn-sm">
                        <i class="bi bi-printer"></i> Print
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
            return row.nama.toLowerCase().includes(searchQuery) || row.id_anggota.toLowerCase().includes(searchQuery);
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
