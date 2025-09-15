<?php
session_start(); // Start session
error_reporting(E_ALL); 
ini_set('display_errors', 1);
if (!isset($_SESSION["ses_username"]) == "Administrator") {
    
} else {
    $data_id = $_SESSION["ses_id"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}

require_once('inc/koneksi.php');
mysqli_set_charset($koneksi, "utf8mb4");

// Fungsi untuk membuat slug dari judul
function create_slug($string) {
    $slug = strtolower(trim($string));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    return $slug;
}

// Fungsi untuk menghindari SQL injection
function escape_input($data) {
    global $koneksi;
    return mysqli_real_escape_string($koneksi, trim($data));
}

// Jika ID komik diberikan melalui URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $komik_id = escape_input($_GET['id']);
    
    // Mengambil data komik berdasarkan ID
    $sql_komik = "SELECT * FROM komik WHERE id = '$komik_id'";
    $result = mysqli_query($koneksi, $sql_komik);
    
    if (mysqli_num_rows($result) > 0) {
        $komik = mysqli_fetch_assoc($result);
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Komik tidak ditemukan!',
                text: 'ID komik yang dimasukkan tidak valid.'
            }).then(() => {
                window.location = 'index.php?page=MyApp/data_komik';
            });
        </script>";
        exit;
    }
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'ID komik tidak ditemukan!',
            text: 'Tidak ada ID komik yang diberikan.'
        }).then(() => {
            window.location = 'index.php?page=MyApp/data_komik';
        });
    </script>";
    exit;
}

// Menangani perubahan data komik
if (isset($_POST['SimpanEdit'])) {
    $judul_buku = escape_input($_POST['judul_buku']);
    $pengarang = !empty($_POST['pengarang']) ? escape_input($_POST['pengarang']) : NULL;
    $penerbit = !empty($_POST['penerbit']) ? escape_input($_POST['penerbit']) : NULL;
    $gambar_url = !empty($_POST['gambar_url']) ? escape_input($_POST['gambar_url']) : NULL;

    // Membuat slug berdasarkan judul komik
    $slug = create_slug($judul_buku);

    // Query untuk memperbarui data komik
    $sql_update_komik = "UPDATE komik SET 
                        judul = '$judul_buku', 
                        slug = '$slug', 
                        penulis = '$pengarang', 
                        penerbit = '$penerbit', 
                        gambar = '$gambar_url' 
                        WHERE id = '$komik_id'";

    if (mysqli_query($koneksi, $sql_update_komik)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Komik berhasil diperbarui!',
                text: 'Perubahan data komik telah disimpan.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=MyApp/data_komik';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal memperbarui komik!',
                text: 'Terjadi kesalahan saat memperbarui data komik.'
            });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komik</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
if (isset($_SESSION["ses_username"]) == "Administrator") {
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Komik</h3>
                </div>
                <div class="box-body">
                    <form method="POST">
                        <div class="form-group">
                            <label>Judul Komik</label>
                            <input type="text" class="form-control" name="judul_buku" value="<?php echo $komik['judul']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" value="<?php echo $komik['penulis']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" value="<?php echo $komik['penerbit']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Link Gambar Komik</label>
                            <input type="text" class="form-control" name="gambar_url" value="<?php echo $komik['gambar']; ?>" placeholder="Masukkan URL gambar">
                        </div>

                        <button type="submit" class="btn btn-info" name="SimpanEdit">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>

</body>
</html>
