<?php
include "inc/koneksi.php";
   
?>


<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | Prata Pustaka</title>
	<link rel="icon" href="dist/img/logo1.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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


<body class="hold-transition login-page">
	<div class="login-box">

		<!-- /.login-logo -->
		<div class="login-box-body">
		<div class="login-logo">
			<h3>
				<font color="blue">
					<b>Login | Prata Pustaka</b>
				</font>
			</h3>
		</div>
			<center>
				<img src="dist/img/logo1.png" width=160px />
			</center>
			<form action="#" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="username" placeholder="Username" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">

					</div>
					<!-- /.col -->
					<div class="col-xs-4">				
					    <button type="submit" class="btn btn-success btn-block btn-flat" name="btnLogin" style="background-color: blue;" title="Masuk Sistem">
							<b>Masuk</b>
						</button>

					</div>
				
				</div>
			</form><br><br>
						    <h6 class="text" style=""><a href='register.php' style="text-decoration: none;">
							<b>Belum punya akun? Daftar Sekarang</b></a></h6>
				<br>		<div class="login-logo"><h6><b style="color: blue;">Recode Developed by <a href="https://youtube.com/@BimaSeven">Bima Adhi</a>. Thanks to GitHub<a href="https://github.com/ivan42118/perpustakaan"> ivan42118</a></b></h6>		</div>
	
		
		</div> 

		<!-- /.login-box-body -->
	</div>

	<!-- /.login-box -->

			<!-- /.social-auth-links -->
			
	<!-- jQuery 2.2.3 -->
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- sweet alert -->
</body>

</html>


<?php 
include "inc/koneksi.php";

		if (isset($_POST['btnLogin'])) {  
		
		

			$username=mysqli_real_escape_string($koneksi,$_POST['username']);
			$password=mysqli_real_escape_string($koneksi,$_POST['password']);


		$sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password= '$password'";
		$query_login = mysqli_query($koneksi, $sql_login);
		$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
		$jumlah_login = mysqli_num_rows($query_login);
        

            if ($jumlah_login == 1 ){
              session_start();
              $_SESSION["ses_id"]=$data_login["id_pengguna"];
              $_SESSION["ses_nama"]=$data_login["nama_pengguna"];
              $_SESSION["ses_username"]=$data_login["username"];
              $_SESSION["ses_password"]=$data_login["password"];
              $_SESSION["ses_level"]=$data_login["level"];
                
              echo "<script>
                    Swal.fire({title: 'Login Berhasil',
						text: '',
						icon: 'success',
						confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'index.php';
                        }
                    })</script>";
              }else{
              echo "<script>
                    Swal.fire({title: 'Login Gagal',
						text: '',
						icon: 'error',
						confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'login.php';
                        }
                    })</script>";
                }
			  }
?>