<?php


session_start();


// Set the HSTS header
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");

include "inc/koneksi.php";

?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | Prata Pustaka</title>
	<link rel="icon" href="dist/img/logo1.ico" type="image/x-icon" sizes="48x48">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

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
.form-group.has-feedback {
    display: flex;
    align-items: center;  /* Menyelaraskan ikon dan input secara vertikal */
    position: relative;
}

.form-group.has-feedback .form-control-feedback {
    position: absolute;
    right: 10px;  /* Posisi ikon di sebelah kanan input */
    font-size: 18px;
    line-height: 35px;  /* Menjaga posisi ikon agar terpusat secara vertikal */
}

.form-control {
    padding-right: 35px; /* Memberi ruang untuk ikon di sebelah kanan */
}

i.bi {
    font-size: 20px; /* Ukuran ikon */
    line-height: 1.5; /* Posisi vertikal ikon */
}
.form-control {
    height: 35px; /* Menyesuaikan tinggi input */
    padding: 10px; /* Mengurangi padding dalam input */
    font-size: 16px; /* Menyesuaikan ukuran font dalam input */
}
.text a {
    font-size: 14px; /* Menyesuaikan ukuran teks */
}

.login-logo h6 {
    font-size: 12px; /* Mengurangi ukuran teks Recode */
}
a{
    text-decoration: none;
}
</style>
</head>

<body class="hold-transition login-page">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.0"></script>
    <div class="login-box">
        <div class="login-box-body">
            <div class="login-logo">
                <font color="blue">
                    <h3><b>Login | Prata Pustaka</b></h3>
                </font>
            </div>
            <center>
                <img src="dist/img/logo1.png" width="160px" />
            </center>
            <form action="#" method="post">
<div class="form-group has-feedback">
    <input type="text" class="form-control" name="username" placeholder="Username" required>
    <i class="bi bi-person-fill form-control-feedback" style="font-size: 20px;"></i>
</div><br>
<div class="form-group has-feedback">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <i class="bi bi-lock-fill form-control-feedback" style="font-size: 20px;"></i>
</div><br>

                <div class="row">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4">                
                        <button type="submit" class="btn btn-success btn-block btn-flat" name="btnLogin" style="background-color: green; float: right;" title="Masuk Sistem">
                            <b>Masuk</b>
                        </button>
                    </div>
                </div>
            </form><br>
            <!--h6 class="text" style=""><a href="register.php">
                <b>Belum Punya Akun? Daftar Sekarang!</b></a></h6>
            <br-->
<div class="login-logo" style="text-align: center; font-family: Arial, sans-serif;">
<blockquote  style="font-style: italic; color: #555; border-left: 4px solid #007bff; padding: 10px 15px; margin: 10px 0;">
<h6 style="color: #007bff; margin: 10px 0;">
    <a href="https://www.immuniweb.com/websec/bima-pustaka.my.id/jEQroNyH/" style="text-decoration: none; color: #007bff;">
    
            <b style="font-size: 10px; color:black;">Click This </b>to Check Power Security For Prata Pustaka by ImmuniWeb. 

    </a>

        Recode Developed by <a href="https://youtube.com/@BimaSeven" style="color: #007bff; text-decoration: none;"><b style="font-size: 10px; color:black;">Bima Adhi Pratama Kharis</b></a>. 
        Thanks to GitHub <a href="https://github.com/ivan42118/perpustakaan" style="color: #007bff; text-decoration: none;"><b style="font-size: 10px; color:black;">ivan42118</b></a>.
    </h6>
        <cite style="display: block; font-size: 10px;margin-top: 5px; color: black;">– Secret Discorder</cite>
</blockquote>
    <h6 class="privacy-policy" style="color: #555; margin-top: 20px;">
        By logging in, you agree to our <a href="privacy-policy.html" target="_blank" style="color: #007bff; text-decoration: none;">Privacy Policy</a>.
    </h6>
</div>
        </div> 
            <!-- Place the SweetAlert2 script last -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.0"></script>

    </div>
    <!-- Update jQuery ke versi 3.x -->
</body>

<?php // Prevent Clickjacking

// Add the Content-Security-Policy header to enforce security policies
// Your remaining PHP code here

// Prevent Content Type Sniffing

// Strict Transport Security (HSTS)
// Referrer Policy

if (isset($_POST["btnLogin"])) {
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);

    // Update SQL query to use tce_users table
    $sql_login = "SELECT * FROM tce_users WHERE BINARY user_name='$username' AND user_password='$password'";
    $query_login = mysqli_query($koneksi, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);

    if ($jumlah_login == 1) {
        session_start();
        $_SESSION["ses_id"] = $data_login["user_id"];  // ID pengguna
        $_SESSION["ses_username"] = $data_login["user_name"];  // Username pengguna
        $_SESSION["ses_password"] = $data_login["user_password"];  // Password pengguna (jangan disarankan untuk disimpan langsung)
        $_SESSION["ses_level"] = $data_login["level"];  // Level pengguna (misalnya, admin, user biasa, dsb.)

        // Menambahkan data sesi lainnya jika diperlukan
        

        echo "<script>
                Swal.fire({
                    title: 'Login Berhasil',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php';
                    }
                })
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Login Gagal',
                    text: '',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'login.php';
                    }
                })
              </script>";
    }
}

?>