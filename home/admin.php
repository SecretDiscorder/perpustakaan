<?php
	$sql = $koneksi->query("SELECT count(id_buku) as buku from tb_buku");
	while ($data= $sql->fetch_assoc()) {
	
		$buku=$data['buku'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(user_id) as agt from tb_anggota");
	while ($data= $sql->fetch_assoc()) {
	
		$agt=$data['agt'];
	}
?>
<?php
$komikQuery = $koneksi->query("SELECT COUNT(id) AS total_komik FROM komik");
if ($komikData = $komikQuery->fetch_assoc()) {
    $komik = $komikData["total_komik"];
}
?>


<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard  Administrator
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
             <div class="small-box bg-blue small-box-mini">
				<div class="inner">
					<h4>
						<?= $buku; ?>
					</h4>

					<p>Buku</p>
				</div>
				<div class="icon">
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
                    <h4><?= $komik; ?></h4>
                    <p>Komik</p>
                </div>
                <div class="icon">
                    <i class="fa fa-magic"></i>

                </div>
                <a href="?page=MyApp/data_komik" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
		
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
             <div class="small-box bg-yellow small-box-mini">
				<div class="inner">
					<h4>
						<?= $agt; ?>
					</h4>

					<p>Anggota</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="?page=MyApp/data_agt" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
</section>
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