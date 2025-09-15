<?php

// Cek apakah pengguna sudah login dan memiliki level Administrator
if (isset($_SESSION["ses_username"]) == "") {

} else {
    $data_level = $_SESSION["ses_level"];
    if ($data_level != "Administrator") {
        
    }
}

// Koneksi ke DB
include "inc/koneksi.php";
if (isset($_SESSION["ses_username"]) == "Administrator") {
// Mendapatkan ID komik dari parameter URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $komik_id = $_GET['id'];

    // Hapus komik dari database
    $sql = "DELETE FROM komik WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $komik_id);

    if ($stmt->execute()) {
        // Jika penghapusan berhasil
        header("Location: index.php?page=MyApp/data_komik&status=success");
    } else {
        // Jika terjadi kesalahan saat menghapus
        header("Location: index.php?page=MyApp/data_komik&status=error");
    }
} else {
    // Jika ID komik tidak valid
    header("Location: index.php?page=MyApp/data_komik&status=error");
}
}
?>
