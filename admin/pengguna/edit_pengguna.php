<?php 
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tce_users WHERE user_id='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

    // Cek apakah pengguna yang ingin diedit adalah Administrator
    if ($data_cek['level'] == 'Administrator' && $data_level != 'Administrator') {
        echo "<script>
            Swal.fire({title: 'Akses Ditolak!',text: 'Anda tidak dapat mengedit data Administrator.',icon: 'error',confirmButtonText: 'OK'})
            .then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=MyApp/data_pengguna';
                }
            })</script>";
        exit();
    }
}
?>

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
				<b>Si Tabsis</b>
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
					<h3 class="box-title">Ubah Pengguna</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div><?php $is_readonly = ($data_cek['level'] == "Administrator"); ?>

				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<input type='hidden' class="form-control" name="user_id" value="<?php echo $data_cek['user_id']; ?>"
							 readonly/>
						</div>

				
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="user_name" value="<?php echo $data_cek['user_name']; ?>" 
    class="form-control" <?php echo $is_readonly ? "readonly" : ""; ?> />
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name="user_password" id="pass" value="<?php echo $data_cek['user_password']; ?>"
							/>
							<input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
						</div>

						<div class="form-group">
							<label>Level</label>
<?php
// Cek apakah ada Administrator lain di database
$sql_admin_check = "SELECT COUNT(*) as jumlah_admin FROM tce_users WHERE level='Administrator'";
$query_admin_check = mysqli_query($koneksi, $sql_admin_check);
$data_admin_check = mysqli_fetch_array($query_admin_check);

// Periksa apakah pengguna yang sedang diedit adalah Administrator
$is_single_admin = ($data_admin_check['jumlah_admin'] == 1 && $data_cek['level'] == "Administrator");

// Menampilkan dropdown
?>
<select name="level" id="level" class="form-control" required>
    <option value="">-- Pilih Level --</option>
    <?php
    if ($data_cek['level'] == "Administrator") {
        // Jika pengguna yang sedang diedit adalah Administrator, tampilkan level sebagai read-only
        echo "<option value='Administrator' selected readonly>Administrator</option>";
    } else {
        // Jika pengguna adalah Petugas atau User, tampilkan opsi untuk mengubah levelnya
        echo "<option value='Petugas'" . ($data_cek['level'] == "Petugas" ? " selected" : "") . ">Petugas</option>";
        echo "<option value='User'" . ($data_cek['level'] == "User" ? " selected" : "") . ">User</option>";
    }
    ?>
</select>


						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>
<?php
}
?>
<?php
if (isset($_POST['Ubah'])) {
    // Validasi agar level Administrator tidak diubah
    if ($data_cek['level'] == 'Administrator' && $_POST['level'] != 'Administrator') {
        echo "<script>
            Swal.fire({title: 'Akses Ditolak!',text: 'Level Administrator tidak dapat diubah.',icon: 'error',confirmButtonText: 'OK'})
            .then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=MyApp/data_pengguna';
                }
            })</script>";
        exit();
    }
if ($_POST['level'] == "Administrator" && $data_cek['level'] != "Administrator") {
    echo "<script>
    Swal.fire({title: 'Gagal Mengubah Level',text: 'Tidak dapat mengubah pengguna menjadi Administrator!',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) {
            window.location = 'index.php?page=MyApp/data_pengguna';
        }
    })</script>";
    exit;
}

    // Mulai proses ubah
    $sql_ubah = "UPDATE tce_users SET
        user_name='".$_POST['user_name']."',
        user_password='".$_POST['user_password']."',
        level='".$_POST['level']."'
        WHERE user_id='".$_POST['user_id']."'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_pengguna';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_pengguna';
            }
        })</script>";
    }
}
?>


<script type="text/javascript">
        function change()
        {
        var x = document.getElementById('pass').type;

        if (x == 'user_password')
        {
            document.getElementById('pass').type = 'text';
            document.getElementById('mybutton').innerHTML;
        }
        else
        {
            document.getElementById('pass').type = 'user_password';
            document.getElementById('mybutton').innerHTML;
        }
        }
    </script>