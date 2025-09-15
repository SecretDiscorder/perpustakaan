<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('inc/koneksi.php');
mysqli_set_charset($koneksi, "utf8mb4");

function escape_input($data) {
    global $koneksi;
    return mysqli_real_escape_string($koneksi, trim($data));
}

// Ambil komik_id dari URL
$komik_id = isset($_GET['komik_id']) ? escape_input($_GET['komik_id']) : null;
if (!$komik_id) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Komik ID tidak ditemukan!',
            text: 'Tidak ada ID komik yang diberikan.'
        }).then(() => {
            window.location = 'index.php?page=MyApp/data_komik';
        });
    </script>";
    exit;
}

// Ambil slug komik (digunakan untuk penambahan)
$query_slug = "SELECT slug FROM komik WHERE id = '$komik_id'";
$res_slug = mysqli_query($koneksi, $query_slug);
$slug_data = mysqli_fetch_assoc($res_slug);
$slug = $slug_data['slug'] ?? '';

// Handle Edit Chapter
if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $chapter_id = escape_input($_GET['edit_id']);
    $query = "SELECT * FROM chapter WHERE komik_id = '$komik_id' AND id = '$chapter_id'";
    $res = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($res) > 0) {
        $chapter = mysqli_fetch_assoc($res);
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Chapter tidak ditemukan!',
                text: 'ID chapter yang dimasukkan tidak valid.'
            }).then(() => {
                window.location = 'index.php?page=MyApp/view_chapters&komik_id=$komik_id';
            });
        </script>";
        exit;
    }
}

// Simpan Edit Chapter
if (isset($_POST['SimpanEditChapter'])) {
    $chapter_id = escape_input($_POST['chapter_id']);
    $judul = escape_input($_POST['chapter_judul']);
    $link = escape_input($_POST['chapter_link']);

    $update = "UPDATE chapter SET judul = '$judul', link = '$link' WHERE komik_id = '$komik_id' AND id = '$chapter_id'";
    if (mysqli_query($koneksi, $update)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Chapter berhasil diperbarui!',
                text: 'Perubahan data chapter telah disimpan.'
            }).then(() => {
                window.location = 'index.php?page=MyApp/view_chapters&komik_id=$komik_id';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal memperbarui chapter!',
                text: 'Terjadi kesalahan saat memperbarui data chapter.'
            });
        </script>";
    }
}
// Simpan Tambah Chapter
if (isset($_POST['SimpanTambahChapter'])) {
    $judul = escape_input($_POST['chapter_judul']);
    $link = escape_input($_POST['chapter_link']);
    
    // Ambil chapter_number terakhir untuk komik tertentu
    $get_last_chapter = "SELECT MAX(chapter_number) AS last_chapter FROM chapter WHERE komik_id = '$komik_id'";
    $res_last_chapter = mysqli_query($koneksi, $get_last_chapter);
    $row_last_chapter = mysqli_fetch_assoc($res_last_chapter);
    $new_chapter_number = ($row_last_chapter['last_chapter'] ?? 0) + 1; // Auto increment chapter_number

    // Membuat slug untuk chapter
    $slug = create_slug($judul);

    // Insert chapter baru dengan chapter_number
    $insert = "INSERT INTO chapter (komik_id, chapter_number, judul, link, slug) 
               VALUES ('$komik_id', '$new_chapter_number', '$judul', '$link', '$slug')";

    if (mysqli_query($koneksi, $insert)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Chapter berhasil ditambahkan!',
                text: 'Data chapter baru telah disimpan.'
            }).then(() => {
                window.location = 'index.php?page=MyApp/view_chapters&komik_id=$komik_id';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal menambahkan chapter!',
                text: 'Terjadi kesalahan saat menambahkan chapter.'
            });
        </script>";
    }
}
// Fungsi untuk membuat slug dari judul
function create_slug($string) {
    $slug = strtolower(trim($string));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug); // Hapus karakter yang tidak perlu
    $slug = preg_replace('/[\s-]+/', '-', $slug); // Ganti spasi dan garis bawah dengan '-'
    return $slug;
}


// Ambil daftar chapter
$query_chapters = "SELECT * FROM chapter WHERE komik_id = '$komik_id'";
$chapters_result = mysqli_query($koneksi, $query_chapters);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Chapters</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<section class="content mt-4 mb-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Chapters Komik</h3>
            <a href="index.php?page=MyApp/data_komik" class="btn btn-primary btn-sm">Kembali ke Komik</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul Chapter</th>
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($chapters_result) > 0) : ?>
                    <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($chapters_result)) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['judul'] ?></td>
                            <td><a href="<?= $row['link'] ?>" target="_blank">Lihat</a></td>
                            <td>
                                <a href="index.php?page=MyApp/view_chapters&komik_id=<?= $komik_id ?>&edit_id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr><td colspan="4">Belum ada chapter.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <hr>
        <h5>Tambah Chapter Baru</h5>
        <form method="POST">
            <input type="hidden" name="komik_id" value="<?= $komik_id ?>">
            <div class="form-group">
                <label>Judul Chapter</label>
                <input type="text" name="chapter_judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Link Chapter</label>
                <input type="text" name="chapter_link" class="form-control" required>
            </div>
            <button type="submit" name="SimpanTambahChapter" class="btn btn-success">Tambah Chapter</button>
        </form>

        <?php if (isset($chapter)) : ?>
            <hr>
            <h5>Edit Chapter</h5>
            <form method="POST">
                <input type="hidden" name="chapter_id" value="<?= $chapter['id'] ?>">
                <div class="form-group">
                    <label>Judul Chapter</label>
                    <input type="text" name="chapter_judul" class="form-control" value="<?= $chapter['judul'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Link Chapter</label>
                    <input type="text" name="chapter_link" class="form-control" value="<?= $chapter['link'] ?>" required>
                </div>
                <button type="submit" name="SimpanEditChapter" class="btn btn-warning">Simpan Perubahan</button>
            </form>
        <?php endif; ?>
    </div>
</section>

</body>
</html>
