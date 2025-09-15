// update_read_time.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_buku = $_POST['id_buku'];
    $durasi = $_POST['durasi'];
    
    // Update waktu baca di info_buku
    $sql_update = "UPDATE info_buku SET total_waktu_baca = total_waktu_baca + ? WHERE id_buku = ?";
    $stmt = $koneksi->prepare($sql_update);
    $stmt->bind_param("ii", $durasi, $id_buku);
    $stmt->execute();
    $stmt->close();
    echo "Waktu baca berhasil diperbarui!";
}
