
    <head>	

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register | Prata Pustaka</title>
	<!-- Tell the browser to be responsive to screen width -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


	<link rel="icon" href="dist/img/logo1.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->

	<!-- Latest compiled JavaScript -->
	<link rel="stylesheet" href="dist/css/ionics/ionicons.min.css">
	<link rel="stylesheet" href="assets/font-awesome/fonts/font-awesome.min.css">
		
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.0"></script>

<script src="dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 5.3.3 CSS (Replace older version with this) -->
    <link href="bootstrap/css/533/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
	<link rel="stylesheet" href="assets/font-awesome/fonts/font-awesome.min.css">
    <!-- Bootstrap JS Bundle (termasuk Popper.js) -->
<script src="dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Update Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Update Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

	<!-- Latest compiled JavaScript -->
	<link rel="stylesheet" href="assets/font-awesome/fonts/font-awesome.min.css">
		
	<!-- Latest compiled JavaScript -->
	<!-- Ionicons -->
	<link rel="stylesheet" href="dist/css/ionics/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<style>
body, .hold-transition {
    background-image: url("https://mtk.bima-pustaka.my.id/pp.png");
    background-size: cover; /* Ensures the image covers the entire background */
    background-position: right; /* Centers the image */
    background-repeat: no-repeat; /* Prevents the image from repeating */
    background-attachment: fixed; /* Keeps the background fixed while scrolling */
}
.login-box-body {
    background-color: rgba(255, 255, 255, 0.9); /* White background with 80% opacity */
    padding: 20px; /* Add some padding for better spacing */
    border-radius: 10px; /* Optional: Rounded corners */
}
</style>
    </head>
    <body>
    <div class="login-box">

        <div class="login-box-body">
        <div class="login-logo">
        <font color="blue">
            <h3><b>Register | Prata Pustaka</b></h3>
        </font>
        </div>
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div><br>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div><br>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas" class="form-control" required>
                    <!-- Kelas X -->
                    <optgroup label="Kelas X">
                        <option value="X.E1" <?php echo isset($data["kelas"]) &&
                        $data["kelas"] == "X.E1"
                            ? "selected"
                            : ""; ?>>X.E1</option>
                        <option value="X.E2" <?php echo isset($data["kelas"]) &&
                        $data["kelas"] == "X.E2"
                            ? "selected"
                            : ""; ?>>X.E2</option>
                        <option value="X.E3" <?php echo isset($data["kelas"]) &&
                        $data["kelas"] == "X.E3"
                            ? "selected"
                            : ""; ?>>X.E3</option>
                        <option value="X.E4" <?php echo isset($data["kelas"]) &&
                        $data["kelas"] == "X.E4"
                            ? "selected"
                            : ""; ?>>X.E4</option>
                        <option value="X.E5" <?php echo isset($data["kelas"]) &&
                        $data["kelas"] == "X.E5"
                            ? "selected"
                            : ""; ?>>X.E5</option>
                        <option value="X.E6" <?php echo isset($data["kelas"]) &&
                        $data["kelas"] == "X.E6"
                            ? "selected"
                            : ""; ?>>X.E6</option>
                        <option value="X.E7" <?php echo isset($data["kelas"]) &&
                        $data["kelas"] == "X.E7"
                            ? "selected"
                            : ""; ?>>X.E7</option>
                        <option value="X.E8" <?php echo isset($data["kelas"]) &&
                        $data["kelas"] == "X.E8"
                            ? "selected"
                            : ""; ?>>X.E8</option>
                        <option value="X.E9" <?php echo isset($data["kelas"]) &&
                        $data["kelas"] == "X.E9"
                            ? "selected"
                            : ""; ?>>X.E9</option>
                        <option value="X.E10" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "X.E10"
                            ? "selected"
                            : ""; ?>>X.E10</option>
                        <option value="X.E11" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "X.E11"
                            ? "selected"
                            : ""; ?>>X.E11</option>
                    </optgroup>

                    <!-- Kelas XI -->
                    <optgroup label="Kelas XI">
                        <option value="XI.F1" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F1"
                            ? "selected"
                            : ""; ?>>XI.F1</option>
                        <option value="XI.F2" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F2"
                            ? "selected"
                            : ""; ?>>XI.F2</option>
                        <option value="XI.F3" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F3"
                            ? "selected"
                            : ""; ?>>XI.F3</option>
                        <option value="XI.F4" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F4"
                            ? "selected"
                            : ""; ?>>XI.F4</option>
                        <option value="XI.F5" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F5"
                            ? "selected"
                            : ""; ?>>XI.F5</option>
                        <option value="XI.F6" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F6"
                            ? "selected"
                            : ""; ?>>XI.F6</option>
                        <option value="XI.F7" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F7"
                            ? "selected"
                            : ""; ?>>XI.F7</option>
                        <option value="XI.F8" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F8"
                            ? "selected"
                            : ""; ?>>XI.F8</option>
                        <option value="XI.F9" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F9"
                            ? "selected"
                            : ""; ?>>XI.F9</option>
                        <option value="XI.F10" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F10"
                            ? "selected"
                            : ""; ?>>XI.F10</option>
                        <option value="XI.F11" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XI.F11"
                            ? "selected"
                            : ""; ?>>XI.F11</option>
                    </optgroup>

                    <!-- Kelas XII -->
                    <optgroup label="Kelas XII">
                        <option value="XII.F1" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F1"
                            ? "selected"
                            : ""; ?>>XII.F1</option>
                        <option value="XII.F2" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F2"
                            ? "selected"
                            : ""; ?>>XII.F2</option>
                        <option value="XII.F3" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F3"
                            ? "selected"
                            : ""; ?>>XII.F3</option>
                        <option value="XII.F4" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F4"
                            ? "selected"
                            : ""; ?>>XII.F4</option>
                        <option value="XII.F5" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F5"
                            ? "selected"
                            : ""; ?>>XII.F5</option>
                        <option value="XII.F6" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F6"
                            ? "selected"
                            : ""; ?>>XII.F6</option>
                        <option value="XII.F7" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F7"
                            ? "selected"
                            : ""; ?>>XII.F7</option>
                        <option value="XII.F8" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F8"
                            ? "selected"
                            : ""; ?>>XII.F8</option>
                        <option value="XII.F9" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F9"
                            ? "selected"
                            : ""; ?>>XII.F9</option>
                        <option value="XII.F10" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F10"
                            ? "selected"
                            : ""; ?>>XII.F10</option>
                        <option value="XII.F11" <?php echo isset(
                            $data["kelas"]
                        ) && $data["kelas"] == "XII.F11"
                            ? "selected"
                            : ""; ?>>XII.F11</option>
                    </optgroup>
                </select>
            </div><br>
                <div class="form-group has-feedback">
                    <select class="form-control" name="jekel" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div><br>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="no_hp" placeholder="No HP" required>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div><br>


                <!-- Remove level selection dropdown since it's hardcoded -->
                <input type="hidden" name="level" value="User">
                
                <div class="row">
                    <div class="col-xs-8">
                        
      <br/>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat" name="btnRegister" style="float: right;">Register</button>
                    </div><br>
                    <br><br>
						    <h6 class="text" style=""><a href='login.php' style="text-decoration: none;">
							<b>Sudah punya akun? Login sekarang</b></a></h6>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Daftar kata-kata ilegal terkait judi, slot, bet, dana, dan lainnya
    const forbiddenWords = [
        "judi", "slot", "bet", "dana", "perjudian", "taruhan", "poker", "casino", "gambling", "online betting",
    ];

    // Fungsi untuk memeriksa apakah teks mengandung kata kunci terlarang
    function containsForbiddenWords(text) {
        return forbiddenWords.some(word => text.toLowerCase().includes(word.toLowerCase()));
    }

    // Fungsi untuk memfilter iklan berdasarkan kata kunci terlarang
    function filterAds() {
        const ads = document.querySelectorAll('.ad-container'); // Seleksi kontainer iklan yang perlu difilter

        ads.forEach(ad => {
            const adText = ad.innerText || ad.textContent;

            if (containsForbiddenWords(adText)) {
                // Jika iklan mengandung kata kunci terlarang, kita akan menghapusnya
                ad.remove();
            }
        });
    }

    // Menggunakan event listener untuk menjalankan filter setelah konten dimuat
    window.onload = function() {
        filterAds();
    };

    // Mengatasi jika iklan dimuat setelah halaman dimuat
    setInterval(filterAds, 1000);  // Memeriksa setiap detik untuk konten baru
    </script>
    </body>


<?php
include "inc/koneksi.php"; // Assuming this file includes the database connection

if (isset($_POST["btnRegister"])) {
    // Ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"]; // Kelas
    $jekel = $_POST["jekel"]; // Jenis Kelamin
    $no_hp = $_POST["no_hp"]; // No HP

    // Validasi input
    // Cek apakah sudah ada admin terdaftar
$query_admin_check = "SELECT * FROM tce_users WHERE level = 'Admin'";
$result_admin_check = $koneksi->query($query_admin_check);

    // Validasi input
    if (
        empty($username) ||
        empty($password) ||
        empty($nama) ||
        empty($kelas) ||
        empty($jekel) ||
        empty($no_hp)
    ) {
        echo "<script>
                Swal.fire('Error', 'All fields are required!', 'error');
              </script>";
    }
    if ($result_admin_check->num_rows > 0) {
        // Jika sudah ada admin, mencegah pendaftaran admin baru
        echo "<script>
            Swal.fire('Error', 'Admin sudah terdaftar, hanya satu admin yang diperbolehkan!', 'error');
          </script>";
    } else {
        // Jika belum ada admin, lanjutkan pendaftaran user biasa
        // Cek apakah username sudah ada
        $query = "SELECT * FROM tce_users WHERE user_name = ?";
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
               
            // Mengambil nilai dari form dan jika tidak ada input, set NULL
            $subscription_status = isset($_POST["subscription_status"]) && !empty($_POST["subscription_status"]) ? $_POST["subscription_status"] : 'inactive'; // Default to 'inactive'
            $level = isset($_POST["level"]) && !empty($_POST["level"]) ? $_POST["level"] : 'User'; // Default to 'User'

            // Insert the user into tce_users table
            $insert_pengguna_query = "INSERT INTO tce_users (user_name, user_password, subscription_status, level) 
                                      VALUES (?, ?, ?, ?)";
            $stmt = $koneksi->prepare($insert_pengguna_query);
            $stmt->bind_param("ssssssssssssss", $username, $hashed_password, $nama, $_SERVER['REMOTE_ADDR'], $user_email, $user_lastname, $user_birthdate, $user_birthplace, $user_regnumber, $user_ssn, $user_verifycode, $user_otpkey, $subscription_status, $level);
            $stmt->execute();
                if (!$stmt) {
                    echo "Error in query preparation: " . $koneksi->error;
                    exit();
                }

                if ($stmt->errno) {
                    echo "Error executing query: " . $stmt->error;
                    exit();
                }

                // Get the ID of the inserted user (id_pengguna)
                $user_id = $stmt->insert_id;

                // Insert data into tb_anggota
                $insert_anggota_query =
                    "INSERT INTO tb_anggota (user_id, nama, jekel, kelas, no_hp) VALUES (?, ?, ?, ?, ?)";
                $stmt = $koneksi->prepare($insert_anggota_query);
                if (!$stmt) {
                    echo "Error in query preparation: " . $koneksi->error;
                    exit();
                }

                $stmt->bind_param(
                    "issss",
                    $user_id,
                    $nama,
                    $jekel,
                    $kelas,
                    $no_hp
                );
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
                // Rollback transaksi jika terjadi error
                $koneksi->rollback();
                echo "<script>
                    Swal.fire('Error', 'Terjadi kesalahan saat mendaftar!', 'error');
                  </script>";
            }
        }

        // Close the statement and connection
        $stmt->close();
        $koneksi->close();
    }
}

?>
