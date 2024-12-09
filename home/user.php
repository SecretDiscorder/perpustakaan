<?php
// Fetch statistics
$buku = $agt = $pin = $kem = 0;

$bukuQuery = $koneksi->query("SELECT count(id_buku) AS buku FROM tb_buku");
if ($bukuData = $bukuQuery->fetch_assoc()) {
    $buku = $bukuData['buku'];
}

$agtQuery = $koneksi->query("SELECT count(id_anggota) AS agt FROM tb_anggota");
if ($agtData = $agtQuery->fetch_assoc()) {
    $agt = $agtData['agt'];
}

$pinQuery = $koneksi->query("SELECT count(id_sk) AS pin FROM tb_sirkulasi WHERE status = 'PIN'");
if ($pinData = $pinQuery->fetch_assoc()) {
    $pin = $pinData['pin'];
}

$kemQuery = $koneksi->query("SELECT count(id_sk) AS kem FROM tb_sirkulasi WHERE status = 'KEM'");
if ($kemData = $kemQuery->fetch_assoc()) {
    $kem = $kemData['kem'];
}
?>

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

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h4><?= $buku; ?></h4>
                    <p>Buku</p>
                </div>
                <div class="icon">
                    <i class="ion ion-books-add"></i>
                </div>
                <a href="?page=MyApp/data_buku" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                <h4>QUIZ</h4>
                    <p>Math Game</p>
                </div>
                <div class="icon">
                    <i class="ion ion-quiz"></i>
                </div>
                <a href="?page=MyApp/math" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>


</section>
