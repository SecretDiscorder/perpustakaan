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

<!-- Control Bar -->
<div class="d-flex justify-content-between mb-2">
    <div>
        Show
        <select id="entriesPerPage" class="form-select form-select-sm d-inline-block w-auto">
            <option value="5">5</option>
            <option value="10" selected>10</option>
            <option value="20">20</option>
        </select>
        entries
    </div>
    <div>
        Search:
        <input type="text" id="searchInput" class="form-control form-control-sm d-inline-block w-auto" placeholder="Cari pengguna...">
    </div>
</div>

<!-- Info Page -->
<div id="pageInfo" class="mb-2 text-end text-muted">Menampilkan 0 data</div>

<!-- Table -->
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>

                    <tbody id="tableBody">
                        <?php
                            $no = 1;
                            $sql = $koneksi->query("select * from tce_users");
                            $data_rows = [];
                            while ($data = $sql->fetch_assoc()) {
                                $data_rows[] = $data;
                            }
                            $totalRows = count($data_rows);
                        ?>

                        <?php foreach ($data_rows as $data): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['user_name']; ?></td>
                            <td><?php echo $data['user_name']; ?></td>
                            <td><?php echo $data['level']; ?></td>
                            <td>
                                <a href="?page=MyApp/edit_pengguna&kode=<?php echo $data['user_id']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <a href="?page=MyApp/del_pengguna&kode=<?php echo $data['user_id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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
<?php 
}
?>

<script>
    var dataRows = <?php echo json_encode($data_rows); ?>;
    var filteredRows = dataRows;
    var rowsPerPage = 10;
    var currentPage = 1;

    function updateTable() {
        var tableBody = document.getElementById('tableBody');
        var start = (currentPage - 1) * rowsPerPage;
        var end = start + rowsPerPage;
        var pageRows = filteredRows.slice(start, end);

        tableBody.innerHTML = "";

        pageRows.forEach((data, index) => {
            var row = `
                <tr>
                    <td>${start + index + 1}</td>
                    <td>${data.user_firstname}</td>
                    <td>${data.user_name}</td>
                    <td>${data.level}</td>
                    <td>
                        <a href="?page=MyApp/edit_pengguna&kode=${data.user_id}" class="btn btn-success btn-sm">
                            <i class="bi bi-pencil"></i> Ubah
                        </a>
                        <a href="?page=MyApp/del_pengguna&kode=${data.user_id}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin hapus data ini ?')">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });

        document.getElementById("pageInfo").textContent =
            `Menampilkan ${start + 1} - ${Math.min(end, filteredRows.length)} dari ${filteredRows.length} data`;
        document.getElementById("pageIndicator").textContent =
            `Page ${currentPage} of ${Math.ceil(filteredRows.length / rowsPerPage)}`;

        document.querySelector("#paginationControls button:first-child").disabled = currentPage === 1;
        document.querySelector("#paginationControls button:last-child").disabled = currentPage === Math.ceil(filteredRows.length / rowsPerPage);
    }

    function changePage(direction) {
        let totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        currentPage += direction;
        if (currentPage < 1) currentPage = 1;
        if (currentPage > totalPages) currentPage = totalPages;
        updateTable();
    }

    document.getElementById('searchInput').addEventListener('input', function (e) {
        let query = e.target.value.toLowerCase();
        filteredRows = dataRows.filter(row =>
            row.user_firstname.toLowerCase().includes(query) ||
            row.user_name.toLowerCase().includes(query)
        );
        currentPage = 1;
        updateTable();
    });

    document.getElementById('entriesPerPage').addEventListener('change', function (e) {
        rowsPerPage = parseInt(e.target.value);
        currentPage = 1;
        updateTable();
    });

    window.onload = updateTable;
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
