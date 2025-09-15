<?php
// Fetch statistics for Books
$buku = $agt = $pin = $kem = 0;
$bukuQuery = $koneksi->query("SELECT count(id_buku) AS buku FROM tb_buku WHERE category NOT IN ('Literasi') AND category NOT IN ('Komik & Cerita')");

if ($bukuData = $bukuQuery->fetch_assoc()) {
    $buku = $bukuData["buku"];
}

$literasiQuery = $koneksi->query("SELECT count(id_buku) AS literasi FROM tb_buku WHERE category = 'Literasi'");
if ($literasiData = $literasiQuery->fetch_assoc()) {
    $literasi = $literasiData["literasi"];
}

$agtQuery = $koneksi->query("SELECT count(user_id) AS agt FROM tb_anggota");
if ($agtData = $agtQuery->fetch_assoc()) {
    $agt = $agtData["agt"];
}
$komikQuery = $koneksi->query("SELECT COUNT(id) AS total_komik FROM komik");
if ($komikData = $komikQuery->fetch_assoc()) {
    $komik = $komikData["total_komik"];
}
?>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>User</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
             <div class="small-box bg-purple small-box-mini">

                <div class="inner">
                    <h4><?= $literasi ?></h4>
                    <p>Lembar Literasi</p>
                </div>
                <div class="icon">
                    <!-- Ikon untuk Buku Literasi -->
                    <i class="fa fa-book-open"></i>
                </div>
                <a href="?page=MyApp/literasi" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
             <div class="small-box bg-blue small-box-mini">
                <div class="inner">
                    <h4><?= $buku ?></h4>
                    <p>Buku</p>
                </div>
                <div class="icon">
                    <!-- Ikon untuk Buku -->
                    <i class="fa fa-book"></i>
                </div>
                <a href="?page=MyApp/data_buku" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
             <div class="small-box bg-green small-box-mini">
                <div class="inner">
                     <h4><?= $komik ?></h4>
                    <p>Komik Light Novel</p>
                </div>
                <div class="icon">
                    <i class="fa fa-dragon"></i>
                </div>
                <a href="?page=MyApp/data_komik" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
             <div class="small-box bg-red small-box-mini">
                <div class="inner">
                    <h4>QUIZ</h4>
                    <p>Math Game</p>
                </div>
                <div class="icon">
                    <!-- Ikon untuk Quiz -->
                    <i class="fa fa-question-circle"></i>
                </div>
                <a href="?page=MyApp/math" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <?php
        if (isset($_SESSION["ses_username"]) == "") {
    //header("location: login.php");
    $data_level = "";
    $data_nama = "Guest";
    
} else {
    $data_id = $_SESSION["ses_id"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}

?>
    </div>


</section>
