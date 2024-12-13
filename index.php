<?php
// Mulai Session
session_start();
if (isset($_SESSION["ses_username"]) == "") {
    header("location: login.php");
} else {
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}
ini_set("display_errors", false);
ini_set("safe_mode", false);
ini_set("allow_url_fopen", 1);
ini_set("allow_url_include", 1);

ini_set("allow_url_include", "on");
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prata Pustaka</title>
    <link rel="icon" href="dist/img/logo1.png">
<!-- Bootstrap JS -->
    <!-- Responsive Meta Tag -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 5.3.3 CSS (Replace older version with this) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <style>
    a{
        text-decoration: none;
    }
    </style>

        <!-- jQuery -->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        
        <!-- Bootstrap 5.3.3 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- DataTables JS -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
        
        <!-- AdminLTE JS -->
        <script src="dist/js/app.min.js"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
<header class="main-header">
    <a href="index.php" class="logo" style=" text-decoration: none;"
				<span class="logo-lg">
					<img src="dist/img/logo1.png" width="37px">
					<b>Prata Pustaka</b>
				</span>
    </a>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-cyan bg-cyan">
        <!-- Navbar toggle button -->
				<a href="#" id="sidebarToggle" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>


        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <font color="white"><b>E-Library V1</b></font>
                    </a>
                </li>
            </ul>
        </div>
    </nav>





</header>

		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<br>
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/avatar.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $data_nama; ?>
						</p>
						<span class="label label-warning">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>
				</br>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>



            <?php if ($data_level == "Administrator") { ?>

                <!-- Menu Kelola Data with Bootstrap Collapse -->
            <li class="nav-item">
                <a class="nav-link" href="?page=admin">
                    <i class="fa fa-dashboard"></i> Dashboard
                </a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#kelolaDataMenu">
                        <i class="fa fa-folder"></i> Kelola Data <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="collapse" id="kelolaDataMenu">
                        <li><a class="nav-link" href="?page=MyApp/data_buku"><i class="fa fa-book"></i> Data Buku</a></li>
                        <li><a class="nav-link" href="?page=MyApp/data_agt"><i class="fa fa-users"></i> Data Anggota</a></li>
                    </ul>
                </li>

                <!-- Pengguna Sistem -->
                <li class="nav-item">
                    <a class="nav-link" href="?page=MyApp/data_pengguna">
                        <i class="fa fa-user"></i> Pengguna Sistem
                    </a>
                </li>

            <?php } elseif ($data_level == "User") { ?>
            
                        <li class="nav-item">
                <a class="nav-link" href="?page=user">
                    <i class="fa fa-dashboard"></i> Dashboard
                </a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=edit_profile">
                        <i class="fa fa-user"></i> Edit Profil
                    </a>
                </li>
            <?php } elseif ($data_level == "Petugas") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?page=petugas">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#kelolaDataMenu">
                        <i class="fa fa-folder"></i> Kelola Data <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="collapse" id="kelolaDataMenu">
                        <li><a class="nav-link" href="?page=MyApp/data_buku"><i class="fa fa-book"></i> Data Buku</a></li>
                    </ul>
                </li>

            <?php } ?>

            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </li>
        </ul>
    </section>
</aside>

        <div class="content-wrapper">
            <section class="content">
                <?php if (isset($_GET["page"])) {
                    $hal = $_GET["page"];
                    switch ($hal) {
                        case "admin":
                            include "home/admin.php";
                            break;
                        case "petugas":
                            include "home/petugas.php";
                            break;
                        case "user":
                            include "home/user.php";
                            break;
                        case "MyApp/data_pengguna":
                            include "admin/pengguna/data_pengguna.php";
                            break;
                        case "MyApp/add_pengguna":
                            include "admin/pengguna/add_pengguna.php";
                            break;
                        case "MyApp/edit_pengguna":
                            include "admin/pengguna/edit_pengguna.php";
                            break;
                        case "MyApp/del_pengguna":
                            include "admin/pengguna/del_pengguna.php";
                            break;
                        case "MyApp/data_agt":
                            include "admin/agt/data_agt.php";
                            break;
                        case "MyApp/add_agt":
                            include "admin/agt/add_agt.php";
                            break;
                        case "MyApp/edit_agt":
                            include "admin/agt/edit_agt.php";
                            break;
                        case "MyApp/del_agt":
                            include "admin/agt/del_agt.php";
                            break;
                        case "MyApp/print_agt":
                            include "admin/agt/print_agt.php";
                            break;
                        case "MyApp/math":
                            include "math.php";
                            break;
                        case "MyApp/print_allagt":
                            include "admin/agt/print_allagt.php";
                            break;
                        case "MyApp/data_buku":
                            include "admin/buku/data_buku.php";
                            break;

                        case "MyApp/artifact":
                            include "youtube.php";

                            break;
                        case "edit_profile":
                            include "home/profile_user.php";
                            break;
                        case "MyApp/add_buku":
                            include "admin/buku/add_buku.php";
                            break;
                        case "MyApp/edit_buku":
                            include "admin/buku/edit_buku.php";
                            break;
                        case "MyApp/del_buku":
                            include "admin/buku/del_buku.php";
                            break;
                        default:
                            echo "<center><h1> Halaman tidak ditemukan !</h1></center>";
                            break;
                    }
                } else {
                    if ($data_level == "Administrator") {
                        include "home/admin.php";
                    } elseif ($data_level == "Petugas") {
                        include "home/petugas.php";
                    } elseif ($data_level == "User") {
                        include "home/user.php";
                    }
                } ?>
            </section>
        </div>
        
        <!-- Page-specific JS -->
        <script>
document.getElementById('sidebarToggle').addEventListener('click', function () {
    const sidebar = document.getElementById('sidebarToggle');
    sidebar.classList.toggle('collapsed');
});


            $(function() {
                $("#example1").DataTable({
                    columnDefs: [{
                        "defaultContent": "-",
                        "targets": "_all"
                    }]
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });

            $(function() {
                // Initialize Select2 Elements
                $(".select2").select2();
            });
        </script>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
