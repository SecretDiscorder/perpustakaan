<?php
// Cek apakah level user adalah Administrator
if ($data_level == "Administrator") {
    // Cek apakah parameter 'kode' ada di URL
    if (isset($_GET['kode']) && !empty($_GET['kode'])) {
        $user_id = mysqli_real_escape_string($koneksi, $_GET['kode']);

        // Periksa apakah data pengguna ada di database
        $checkPengguna = "SELECT * FROM tce_users WHERE user_id = '$user_id'";
        $result = $koneksi->query($checkPengguna);

        if ($result->num_rows > 0) {
            $data_pengguna = $result->fetch_assoc();

            // Cek jika level pengguna adalah Administrator
            if ($data_pengguna['level'] == "Administrator") {
                echo "<script>
                Swal.fire({
                    title: 'Aksi Ditolak',
                    text: 'Pengguna dengan level Administrator tidak dapat dihapus!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?page=MyApp/data_pengguna';
                    }
                });
                </script>";
                exit; // Hentikan eksekusi lebih lanjut
            }

            // Hapus data dari tabel tb_agt terlebih dahulu
            $deleteAgt = "DELETE FROM tb_anggota WHERE user_id = '$user_id'";
            $koneksi->query($deleteAgt);

            // Hapus data dari tabel tb_pengguna
            $deletePengguna = "DELETE FROM tce_users WHERE user_id = '$user_id'";
            if ($koneksi->query($deletePengguna) === TRUE) {
                echo "<script>
                Swal.fire({
                    title: 'Data Berhasil Dihapus',
                    text: 'Data pengguna dan anggota berhasil dihapus.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '?page=MyApp/data_pengguna';
                    }
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Kesalahan',
                    text: 'Gagal menghapus data pengguna: " . $koneksi->error . "',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                </script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                title: 'Data Tidak Ditemukan',
                text: 'ID pengguna yang dimasukkan tidak valid.',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '?page=MyApp/data_pengguna';
                }
            });
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            title: 'ID Pengguna Tidak Ditemukan',
            text: 'Parameter ID pengguna tidak valid.',
            icon: 'warning',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = '?page=MyApp/data_pengguna';
            }
        });
        </script>";
    }
}
?>
