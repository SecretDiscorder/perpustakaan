<?php
session_start();
include "inc/koneksi.php";
mysqli_set_charset($koneksi, "utf8mb4");

$timeLimit = 600; // 30 minutes

if (isset($_POST['shuffle'])) {
    $_SESSION['last_shuffle_time'] = time();
    $sql = $koneksi->query("SELECT * FROM tb_buku WHERE category = 'Literasi' ORDER BY RAND() LIMIT 1");
    $literatureBook = $sql->fetch_assoc();
    $_SESSION['literature_book'] = $literatureBook;

    $response = [
        'status' => 'success',
        'judul_buku' => $literatureBook['judul_buku'],
        'drive_url' => $literatureBook['drive_url'],
        'thumbnail' => getGoogleDriveThumbnail($literatureBook['drive_url'])
    ];

    echo json_encode($response);
}

function getGoogleDriveThumbnail($driveUrl) {
    if (empty($driveUrl)) {
        return 'https://mtk.bima-pustaka.my.id/folder-icon.jpg';
    }
    preg_match('/\/d\/([a-zA-Z0-9-_]+)/', $driveUrl, $matches);
    if (!isset($matches[1])) {
        return 'https://mtk.bima-pustaka.my.id/folder-icon.jpg';
    }
    $fileId = $matches[1];
    return "https://drive.google.com/thumbnail?id=$fileId";
}
?>
