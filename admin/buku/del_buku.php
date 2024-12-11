<?php
if (isset($_GET['id'])) {
    $kode = $_GET['id'];

    // Menggunakan prepared statement
    $stmt = $koneksi->prepare("DELETE FROM tb_buku WHERE id_buku = ?");
    $stmt->bind_param("s", $kode);
    $query_hapus = $stmt->execute();

    if ($query_hapus) {
        echo "<script>
            Swal.fire({
                title: 'Hapus Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=MyApp/data_buku';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Hapus Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=MyApp/data_buku';
                }
            });
        </script>";
    }

    $stmt->close(); // Menutup statement
}
?>
