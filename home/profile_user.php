

<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["ses_username"])) {
    header("Location: login.php");
    exit();
}

include "inc/koneksi.php";

// Ambil data pengguna berdasarkan session
$id_pengguna = $_SESSION["ses_id"];

// Proses jika ada form yang disubmit untuk update data
if (isset($_POST['update_profile'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $no_hp = $_POST['no_hp'];
    $jekel = $_POST['jekel'];

    // Query untuk memperbarui data pengguna
    $update_query = "UPDATE tb_anggota SET nama = ?, kelas = ?, no_hp = ?, jekel = ? WHERE id_anggota = ?";
    $stmt = $koneksi->prepare($update_query);
    $stmt->bind_param("ssssi", $nama, $kelas, $no_hp, $jekel, $id_pengguna);

    if ($stmt->execute()) {
        echo "<script>
                Swal.fire({title: 'Profil berhasil diperbarui!', icon: 'success', confirmButtonText: 'OK'})
              </script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Gagal memperbarui profil', icon: 'error', confirmButtonText: 'OK'})
              </script>";
    }
}

// Ambil data pengguna dari database
$query = "SELECT a.*, p.username 
          FROM tb_anggota a
          JOIN tb_pengguna p ON a.id_anggota = p.id_pengguna
          WHERE p.id_pengguna = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id_pengguna);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah ada data
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    $data = null; // Data tidak ditemukan
    echo "<script>
            Swal.fire({title: 'Data tidak ditemukan', icon: 'error', confirmButtonText: 'OK'})
          </script>";
    exit(); // Jika data tidak ditemukan, hentikan eksekusi
}
?>

<head>
    <title>Edit Profil | SI Perpustakaan</title>



</head>
<body>
<br>
<br>
    <div class="container">
        <h2>Edit Profil</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" 
                       value="<?php echo isset($data['nama']) ? htmlspecialchars($data['nama']) : ''; ?>" required>
            </div>


            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas" class="form-control" required>
                    <!-- Kelas X -->
                    <optgroup label="Kelas X">
                        <option value="X.E1" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E1') ? 'selected' : ''; ?>>X.E1</option>
                        <option value="X.E2" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E2') ? 'selected' : ''; ?>>X.E2</option>
                        <option value="X.E3" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E3') ? 'selected' : ''; ?>>X.E3</option>
                        <option value="X.E4" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E4') ? 'selected' : ''; ?>>X.E4</option>
                        <option value="X.E5" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E5') ? 'selected' : ''; ?>>X.E5</option>
                        <option value="X.E6" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E6') ? 'selected' : ''; ?>>X.E6</option>
                        <option value="X.E7" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E7') ? 'selected' : ''; ?>>X.E7</option>
                        <option value="X.E8" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E8') ? 'selected' : ''; ?>>X.E8</option>
                        <option value="X.E9" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E9') ? 'selected' : ''; ?>>X.E9</option>
                        <option value="X.E10" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E10') ? 'selected' : ''; ?>>X.E10</option>
                        <option value="X.E11" <?php echo (isset($data['kelas']) && $data['kelas'] == 'X.E11') ? 'selected' : ''; ?>>X.E11</option>
                    </optgroup>

                    <!-- Kelas XI -->
                    <optgroup label="Kelas XI">
                        <option value="XI.F1" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F1') ? 'selected' : ''; ?>>XI.F1</option>
                        <option value="XI.F2" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F2') ? 'selected' : ''; ?>>XI.F2</option>
                        <option value="XI.F3" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F3') ? 'selected' : ''; ?>>XI.F3</option>
                        <option value="XI.F4" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F4') ? 'selected' : ''; ?>>XI.F4</option>
                        <option value="XI.F5" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F5') ? 'selected' : ''; ?>>XI.F5</option>
                        <option value="XI.F6" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F6') ? 'selected' : ''; ?>>XI.F6</option>
                        <option value="XI.F7" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F7') ? 'selected' : ''; ?>>XI.F7</option>
                        <option value="XI.F8" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F8') ? 'selected' : ''; ?>>XI.F8</option>
                        <option value="XI.F9" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F9') ? 'selected' : ''; ?>>XI.F9</option>
                        <option value="XI.F10" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F10') ? 'selected' : ''; ?>>XI.F10</option>
                        <option value="XI.F11" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XI.F11') ? 'selected' : ''; ?>>XI.F11</option>
                    </optgroup>

                    <!-- Kelas XII -->
                    <optgroup label="Kelas XII">
                        <option value="XII.F1" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F1') ? 'selected' : ''; ?>>XII.F1</option>
                        <option value="XII.F2" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F2') ? 'selected' : ''; ?>>XII.F2</option>
                        <option value="XII.F3" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F3') ? 'selected' : ''; ?>>XII.F3</option>
                        <option value="XII.F4" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F4') ? 'selected' : ''; ?>>XII.F4</option>
                        <option value="XII.F5" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F5') ? 'selected' : ''; ?>>XII.F5</option>
                        <option value="XII.F6" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F6') ? 'selected' : ''; ?>>XII.F6</option>
                        <option value="XII.F7" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F7') ? 'selected' : ''; ?>>XII.F7</option>
                        <option value="XII.F8" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F8') ? 'selected' : ''; ?>>XII.F8</option>
                        <option value="XII.F9" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F9') ? 'selected' : ''; ?>>XII.F9</option>
                        <option value="XII.F10" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F10') ? 'selected' : ''; ?>>XII.F10</option>
                        <option value="XII.F11" <?php echo (isset($data['kelas']) && $data['kelas'] == 'XII.F11') ? 'selected' : ''; ?>>XII.F11</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" 
                       value="<?php echo isset($data['no_hp']) ? htmlspecialchars($data['no_hp']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="jekel">Jenis Kelamin</label>
                <select class="form-control" id="jekel" name="jekel" required>
                    <option value="Laki-laki" <?php echo (isset($data['jekel']) && $data['jekel'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo (isset($data['jekel']) && $data['jekel'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
<br><br>
            <button type="submit" class="btn btn-success" name="update_profile">Perbarui Profil</button>
        </form>
    </div>

</body>
</html>

