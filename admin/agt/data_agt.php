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
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <a href="?page=MyApp/add_agt" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
        <a href="?page=MyApp/print_allagt" class="btn btn-success text-white" title="Print">
          <i class="bi bi-printer"></i> Print
        </a>
      </div>
    </div>

    <div class="card-body">
      <div class="d-flex justify-content-between mb-3">
        <label>
          Show
          <select id="entriesPerPage" class="form-select form-select-sm d-inline-block w-auto ms-2">
            <option value="5">5</option>
            <option value="10" selected>10</option>
            <option value="20">20</option>
            <option value="all">Show All</option>
          </select>
          entries
        </label>
        <input type="text" id="searchInput" class="form-control form-control-sm w-auto" placeholder="Search...">
      </div>

      <!-- Book Table -->
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
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
            <!-- Konten akan diisi oleh JavaScript -->
          </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center">
          <div id="pageInfo" class="small text-muted"></div>
          <div id="paginationControls" class="d-flex gap-2">
            <button class="btn btn-sm btn-secondary" onclick="changePage(-1)">Previous</button>
            <span id="pageIndicator" class="align-self-center">Page 1</span>
            <button class="btn btn-sm btn-secondary" onclick="changePage(1)">Next</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  $sql = $koneksi->query("SELECT * FROM tb_anggota");
  $data_rows = [];
  while ($data = $sql->fetch_assoc()) {
    $data_rows[] = $data;
  }
?>

<script>
  let currentPage = 1;
  let rowsPerPage = 10;
  let dataRows = <?php echo json_encode($data_rows); ?>;
  let filteredRows = dataRows;

  function updateTable() {
    const tableBody = document.getElementById('tableBody');
    const entriesSelect = document.getElementById('entriesPerPage');
    const pageInfo = document.getElementById('pageInfo');
    const pageIndicator = document.getElementById('pageIndicator');

    rowsPerPage = entriesSelect.value === 'all' ? filteredRows.length : parseInt(entriesSelect.value);
    const totalPages = Math.ceil(filteredRows.length / rowsPerPage);

    if (currentPage > totalPages) currentPage = totalPages;
    if (currentPage < 1) currentPage = 1;

    const startIndex = (currentPage - 1) * rowsPerPage;
    const endIndex = rowsPerPage === filteredRows.length ? filteredRows.length : startIndex + rowsPerPage;
    const paginatedRows = filteredRows.slice(startIndex, endIndex);

    tableBody.innerHTML = '';

    paginatedRows.forEach((data, index) => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${startIndex + index + 1}</td>
        <td>${data.user_id}</td>
        <td>${data.nama}</td>
        <td>${data.jekel}</td>
        <td>${data.kelas}</td>
        <td>${data.no_hp}</td>
        <td>
          <a href="?page=MyApp/edit_agt&kode=${data.user_id}" class="btn btn-success btn-sm">
            <i class="bi bi-pencil"></i> Ubah
          </a>
          <a href="?page=MyApp/del_agt&kode=${data.user_id}" onclick="return confirm('Yakin Hapus Data Ini ?')" class="btn btn-danger btn-sm">
            <i class="bi bi-trash"></i> Hapus
          </a>
          <a href="?page=MyApp/print_agt&kode=${data.user_id}" target="_blank" class="btn btn-primary btn-sm">
            <i class="bi bi-printer"></i> Print
          </a>
        </td>
      `;
      tableBody.appendChild(row);
    });

    pageInfo.textContent = `Menampilkan ${filteredRows.length === 0 ? 0 : startIndex + 1} - ${endIndex} dari ${filteredRows.length} data`;
    pageIndicator.textContent = `Page ${currentPage} of ${totalPages || 1}`;
    document.querySelector("#paginationControls button:first-child").disabled = currentPage === 1;
    document.querySelector("#paginationControls button:last-child").disabled = currentPage === totalPages || totalPages === 0;
  }

  function changePage(direction) {
    currentPage += direction;
    updateTable();
  }

  document.getElementById('searchInput').addEventListener('input', function (e) {
    const query = e.target.value.toLowerCase();
    filteredRows = dataRows.filter(row =>
      Object.values(row).some(value =>
        String(value).toLowerCase().includes(query)
      )
    );
    currentPage = 1;
    updateTable();
  });

  document.getElementById('entriesPerPage').addEventListener('change', function () {
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
<?php
}
?>