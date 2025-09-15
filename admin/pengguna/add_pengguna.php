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
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Pengguna</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-remove"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pengguna</label>
                            <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control" placeholder="Nama pengguna" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option>-- Pilih Level --</option>
                                <option>Administrator</option>
                                <option>Petugas</option>
                            </select>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                        <a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<?php
}

if (isset($_POST['Simpan'])) {
    // Sanitasi input
    $username = mysqli_real_escape_string($koneksi, $_POST['user_name']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $level = mysqli_real_escape_string($koneksi, $_POST['level']);

    // Validasi level pengguna
    if ($level !== "Administrator" && $level !== "Petugas") {
        echo "<script>
            Swal.fire({title: 'Level pengguna tidak valid', icon: 'error', confirmButtonText: 'OK'})
        </script>";
    } else {

        // Query untuk menyimpan data
        $sql_simpan = "INSERT INTO tce_users (user_name, password, level) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $sql_simpan);
        mysqli_stmt_bind_param($stmt, "ssss", $nama_pengguna, $username, $password, $level);

        // Eksekusi query
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
                .then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_pengguna';
                    }
                })
            </script>";
        } else {
            echo "<script>
                Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
                .then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/add_pengguna';
                    }
                })
            </script>";
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    }
}
?>
