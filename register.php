
    <link rel="icon" href="dist/img/logo.png">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <div class="login-box">
        <div class="login-logo">
            <h3><b>Register | Prata Pustaka</b></h3>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Register New User</p>
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="nama" placeholder="Full Name" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
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
                <div class="form-group has-feedback">
                    <select class="form-control" name="jekel" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="no_hp" placeholder="No HP" required>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>


                <!-- Remove level selection dropdown since it's hardcoded -->
                <input type="hidden" name="level" value="User">
                
                <div class="row">
                    <div class="col-xs-8">
                        
      <br/>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat" name="btnRegister">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<?php
include "inc/koneksi.php";  // Assuming this file includes the database connection
if (isset($_POST['btnRegister'])) {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];  // Kelas
    $jekel = $_POST['jekel'];  // Jenis Kelamin
    $no_hp = $_POST['no_hp'];  // No HP
 
    // Validasi input
    if (empty($username) || empty($password) || empty($nama) || empty($kelas) || empty($jekel) || empty($no_hp)) {
        echo "<script>
                Swal.fire('Error', 'All fields are required!', 'error');
              </script>";
    } else {
        // Cek apakah username sudah ada
        $query = "SELECT * FROM tb_pengguna WHERE username = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>
                    Swal.fire('Error', 'Username already taken!', 'error');
                  </script>";
        } else {
 // Hash password
            $hashed_password = $password; // You should use password_hash for actual security purposes
            
            // Mulai transaksi untuk menjaga konsistensi data
            $koneksi->begin_transaction();
            
            try {
                // Insert data into tb_pengguna
                $insert_pengguna_query = "INSERT INTO tb_pengguna (username, password, nama_pengguna, level) VALUES (?, ?, ?, 'User')";
                $stmt = $koneksi->prepare($insert_pengguna_query);
                if (!$stmt) {
                    echo "Error in query preparation: " . $koneksi->error;
                    exit();
                }
            
                $stmt->bind_param("sss", $username, $hashed_password, $nama); // Include the 'nama_pengguna'
                $stmt->execute();
                if ($stmt->errno) {
                    echo "Error executing query: " . $stmt->error;
                    exit();
                }
            
                // Get the ID of the inserted user (id_pengguna)
                $id_pengguna = $stmt->insert_id;
            
                // Insert data into tb_anggota
                $insert_anggota_query = "INSERT INTO tb_anggota (id_anggota, nama, jekel, kelas, no_hp) VALUES (?, ?, ?, ?, ?)";
                $stmt = $koneksi->prepare($insert_anggota_query);
                if (!$stmt) {
                    echo "Error in query preparation: " . $koneksi->error;
                    exit();
                }
            
                $stmt->bind_param("issss", $id_pengguna, $nama, $jekel, $kelas, $no_hp);
                if (!$stmt->execute()) {
                    echo "Error executing query: " . $stmt->error;
                    exit();
                }
            
                // Commit the transaction
                $koneksi->commit();
            
                echo "<script>
                        Swal.fire({title: 'Pendaftaran Berhasil',
						text: '',
						icon: 'success',
						confirmButtonText: 'OK'}).then((result) => {
                        if (result.value) {
                            window.location = 'index.php';
                        }
						})
                      </script>";
            } catch (Exception $e) {
                
                // Rollback transaksi jika ada kesalahan
                $koneksi->rollback();
                echo "<script>
                        Swal.fire('Error', 'Registration failed, please try again later!', 'error');
                      </script>";
            }
        }

// Close the statement and connection
$stmt->close();
$koneksi->close();

    }


}
?>
