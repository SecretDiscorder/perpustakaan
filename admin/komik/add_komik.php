<?php
session_start(); // Start the session to store file info between pages
error_reporting(E_ALL); 
ini_set('display_errors', 1);
if (isset($_SESSION["ses_username"]) == "") {

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

// Fungsi untuk mencatat log error
function log_error($message) {
    $log_file = 'error_log.txt'; // File log yang akan menyimpan pesan error
    $current_time = date('Y-m-d H:i:s'); // Waktu saat error terjadi
    $formatted_message = "[$current_time] ERROR: $message" . PHP_EOL;
    
    file_put_contents($log_file, $formatted_message, FILE_APPEND);
}

// Jika form disubmit untuk menambahkan komik
if (isset($_POST['SimpanManual'])) {
    // Ambil data dari form komik
    $judul_buku = escape_input($_POST['judul_buku']);
    $pengarang = !empty($_POST['pengarang']) ? escape_input($_POST['pengarang']) : NULL;
    $penerbit = !empty($_POST['penerbit']) ? escape_input($_POST['penerbit']) : NULL;
    $gambar_url = !empty($_POST['gambar_url']) ? escape_input($_POST['gambar_url']) : NULL;
    $chapter_links = !empty($_POST['chapter_links']) ? escape_input($_POST['chapter_links']) : NULL;

    // Membuat slug berdasarkan judul komik
    $slug = create_slug($judul_buku);

    // Query untuk menyimpan data komik
    $sql_komik = "INSERT INTO komik (judul, slug, penulis, penerbit, gambar) 
                  VALUES ('$judul_buku', '$slug', '$pengarang', '$penerbit', '$gambar_url')";
    
    if (mysqli_query($koneksi, $sql_komik)) {
        $komik_id = mysqli_insert_id($koneksi); // Ambil ID komik yang baru saja dimasukkan
        
        $chapter_success = true; // Flag untuk mengecek apakah chapter berhasil ditambahkan

        // Jika ada chapter yang ditambahkan
        if (!empty($chapter_links)) {
            // Pisahkan link chapter berdasarkan koma
            $chapter_links_array = explode(',', $chapter_links);

            // Insert setiap chapter ke dalam tabel
            foreach ($chapter_links_array as $index => $chapter_link) {
                $chapter_link = trim($chapter_link); // Hilangkan spasi di sekitar link
                $chapter_judul = "Chapter " . ($index + 1); // Judul chapter berdasarkan urutan
                $chapter_slug = create_slug($chapter_judul); // Membuat slug untuk chapter
                
                // Query untuk menyimpan chapter
                $sql_chapter = "INSERT INTO chapter (komik_id, judul, slug, link) 
                                VALUES ('$komik_id', '$chapter_judul', '$chapter_slug', '$chapter_link')";
                
                if (!mysqli_query($koneksi, $sql_chapter)) {
                    // Menambahkan log error jika gagal menambahkan chapter
                    log_error("Gagal menambahkan chapter '$chapter_judul' untuk komik ID $komik_id. Error: " . mysqli_error($koneksi));
                    $chapter_success = false; // Tandai jika ada chapter yang gagal
                    break; // Jika gagal menambahkan chapter, stop proses
                }
            }
        }

        // Menampilkan SweetAlert jika semua berhasil
        if ($chapter_success) {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Added Successfully',
                        text: 'Komik dan chapter berhasil ditambahkan!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location = 'index.php?page=MyApp/data_komik';
                    });
                });
            </script>";
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Add Failed',
                        text: 'Terjadi kesalahan saat menambahkan chapter.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location = 'index.php?page=MyApp/add_komik';
                    });
                });
            </script>";
        }
    } else {
        // Menambahkan log error jika gagal menambahkan komik
        log_error("Gagal menambahkan komik '$judul_buku'. Error: " . mysqli_error($koneksi));
        
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Add Failed',
                    text: 'Terjadi kesalahan saat menyimpan data komik.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location = 'index.php?page=MyApp/add_komik';
                });
            });
        </script>";
    }
}
?>
<?php if ($data_level == "Administrator") { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Komik</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Komik</h3>
                </div>
                <div class="box-body">
                    <form method="POST">
                        <div class="form-group">
                            <label>Judul Komik</label>
                            <input type="text" class="form-control" name="judul_buku" required>
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" class="form-control" name="pengarang">
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit">
                        </div>
                        <div class="form-group">
                            <label>Link Gambar Komik</label>
                            <input type="text" class="form-control" name="gambar_url" placeholder="Masukkan URL gambar">
                        </div>

                        <!-- Form untuk chapter -->
                        <div class="form-group">
                            <label>Link Chapter (Pisahkan dengan koma)</label>
                            <input type="text" class="form-control" name="chapter_links" placeholder="Masukkan link chapter, pisahkan dengan koma">
                            <small>Contoh: link_chapter_1, link_chapter_2, link_chapter_3</small>
                        </div>

                        <button type="submit" class="btn btn-info" name="SimpanManual">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
<?php } ?>