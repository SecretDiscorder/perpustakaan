<?php

if (isset($_GET["id"])) {
    $sql_cek = "SELECT * FROM tb_buku WHERE id_buku = '" . $_GET["id"] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    // Check if the query returns any result
    if ($query_cek && mysqli_num_rows($query_cek) > 0) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    } else {
        echo "No data found for the specified book.";
    }
} else {
    echo "No book ID provided.";
}

// Fetch all categories from the database
$sql_categories = $koneksi->query(
    "SELECT DISTINCT category FROM tb_buku ORDER BY category"
);
$categories = [];
while ($data = $sql_categories->fetch_assoc()) {
    $categories[] = $data["category"];
}
?>
<head>
    <!-- Import SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.6/dist/sweetalert2.min.css">

    <!-- Import SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.6/dist/sweetalert2.all.min.js"></script>
</head>

<section class="content-header">
	<h1>
		Master Data
		<small>Data Buku</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Si Perpustakaan</b>
			</a>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah buku</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label>Id Buku</label>
							<input type='text' class="form-control" name="id_buku" value="<?php echo $data_cek[
           "id_buku"
       ]; ?>" readonly/>
						</div>

						<div class="form-group">
							<label>Judul Buku</label>
							<input type='text' class="form-control" name="judul_buku" value="<?php echo $data_cek[
           "judul_buku"
       ]; ?>" />
						</div>

						<div class="form-group">
							<label>Pengarang</label>
							<input type='text' class="form-control" name="pengarang" value="<?php echo $data_cek[
           "pengarang"
       ]; ?>" />
						</div>

						<div class="form-group">
							<label>Penerbit</label>
							<input class="form-control" name="penerbit" value="<?php echo $data_cek[
           "penerbit"
       ]; ?>" />
						</div>

						<div class="form-group">
							<label>Th Terbit</label>
							<input class="form-control" name="th_terbit" value="<?php echo $data_cek[
           "th_terbit"
       ]; ?>">
						</div>

                        <!-- Dropdown untuk memilih kategori -->
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category" class="form-control" required>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category ?>" <?php echo $data_cek[
    "category"
] == $category
    ? "selected"
    : ""; ?>>
                                        <?= $category ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Input untuk Drive URL Buku -->
                        <div class="form-group">
                            <label>Drive URL Buku</label>
                            <input type="url" name="drive_url" id="drive_url" class="form-control" value="<?php echo $data_cek[
                                "drive_url"
                            ]; ?>">
                        </div>
			
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_buku" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>

<?php if (isset($_POST["Ubah"])) {
    //mulai proses ubah
    $sql_ubah =
        "UPDATE tb_buku SET
        judul_buku='" .
        $_POST["judul_buku"] .
        "',
        pengarang='" .
        $_POST["pengarang"] .
        "',
        penerbit='" .
        $_POST["penerbit"] .
        "',
        category='" .
        $_POST["category"] .
        "',  
        drive_url='" .
        $_POST["drive_url"] .
        "',
        th_terbit='" .
        $_POST["th_terbit"] .
        "'
        WHERE id_buku='" .
        $_POST["id_buku"] .
        "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_buku';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_buku';
            }
        })</script>";
    }
}
?>
