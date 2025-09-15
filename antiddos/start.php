<?php 

function safe_print($value){
    $value .= "";
    return strlen($value) > 1 && (strpos($value, "0") !== false) ? ltrim($value, "0") : (strlen($value) == 0 ? "0" : $value);
}

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['standby'])){

    // Konfigurasi
    $_SESSION['standby'] = $_SESSION['standby'] + 1;

    $ad_ddos_query = 10; // batas permintaan per detik
    $log_file = 'ip_log.txt'; // file untuk menyimpan log IP
    $ad_check_file = 'check.txt'; // file untuk menulis status saat monitoring
    $ad_black_file = 'black_ip.txt'; // IP yang diblokir
    $ad_white_file = 'white_ip.txt'; // IP yang diizinkan
    $ad_temp_file = 'ad_temp_file.txt'; // IP pengunjung
    $ad_dir = 'antiddos/files'; // direktori dengan skrip
    $ad_num_query = 0; // jumlah permintaan saat ini
    $ad_sec_query = 0; // detik dari file $check_file
    $ad_end_defense = 0; // akhir perlindungan dari file $check_file
    $ad_sec = date("s"); // detik saat ini
    $ad_date = date("is"); // waktu saat ini
    $ad_defense_time = 100; // waktu deteksi serangan DDoS dalam detik

    // Ambil alamat IP pengunjung
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $current_time = time(); // waktu saat ini

    // Cek apakah file log ada, jika tidak buat
    if (!file_exists($log_file)) {
        file_put_contents($log_file, "");
    }

    // Baca isi file log
    $log_data = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $ip_requests = [];

    // Proses data log
    foreach ($log_data as $line) {
        list($ip, $timestamp) = explode(',', $line);
        if (!isset($ip_requests[$ip])) {
            $ip_requests[$ip] = [];
        }
        $ip_requests[$ip][] = (int)$timestamp;
    }

    // Tambahkan permintaan baru
    if (!isset($ip_requests[$ip_address])) {
        $ip_requests[$ip_address] = [];
    }
    $ip_requests[$ip_address][] = $current_time;

    // Hapus permintaan yang lebih tua dari 1 detik
    foreach ($ip_requests as $ip => $timestamps) {
        $ip_requests[$ip] = array_filter($timestamps, function($timestamp) use ($current_time) {
            return ($current_time - $timestamp) < 1; // hanya simpan permintaan dalam 1 detik terakhir
        });
    }

    // Cek apakah IP terdeteksi DDoS
    if (count($ip_requests[$ip_address]) > $ad_ddos_query) {
        // IP terdeteksi DDoS
        file_put_contents($ad_black_file, "$ip_address\n", FILE_APPEND); // Simpan IP yang diblokir
        echo "IP $ip_address terdeteksi melakukan serangan DDoS dan telah diblokir!";
        exit(); // Hentikan eksekusi
    } else {
        // Simpan kembali ke file log
        file_put_contents($log_file, "$ip_address,$current_time\n", FILE_APPEND);
    }

    // Memeriksa file konfigurasi
    if (!file_exists("{$ad_dir}/{$ad_check_file}")) {
        Create_File("{$ad_dir}/{$ad_check_file}");
    }

    // Memeriksa status perlindungan
    require ("{$ad_dir}/{$ad_check_file}");

    if ($ad_end_defense && $ad_end_defense > $ad_date) {
        require ("{$ad_dir}/../anti_ddos.php");
    } else {
        $ad_num_query = ($ad_sec == $ad_sec_query) ? ++$ad_num_query : 1;
        $ad_file = fopen("{$ad_dir}/{$ad_check_file}", "w");

        $ad_string = ($ad_num_query >= $ad_ddos_query) ? '<?php $ad_end_defense=' . safe_print($ad_date + $ad_defense_time) . '; ?>' : '<?php $ad_num_query=' . safe_print($ad_num_query) . '; $ad_sec_query=' . safe_print($ad_sec) . '; ?>';

        fputs($ad_file, $ad_string);
        fclose($ad_file);
    }
} else {
    $_SESSION['standby'] = 1;

    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header("refresh:8," . $actual_link);
    ?>
    <style type="text/css">
        .loading {display: flex; flex-direction: column; align-items: center; } 
        .loading__msg {font-family: Roboto; font-size: 16px; } 
        .loading__dots {display: flex; flex-direction: row; width: 100%; justify-content: center; margin: 100px 0 30px 0; } 
        .loading__dots__dot {background-color: #44BBA4; width: 20px; height: 20px; border-radius: 50%; margin: 0 5px; color: #587B7F; } 
        .loading__dots__dot:nth-child(1) {animation: bounce 1s 1s infinite; } 
        .loading__dots__dot:nth-child(2) {animation: bounce 1s 1.2s infinite; } 
        .loading__dots__dot:nth-child(3) {animation: bounce 1s 1.4s infinite; } 
        @keyframes bounce {0% {transform: translate(0, 0); } 50% {transform: translate(0, 15px); } 100% {transform: translate(0, 0); } }
    </style>
    <div class="loading" style="margin-top: 11%;">
        <div class="loading__dots">
            <div class="loading__dots__dot"></div>
            <div class="loading__dots__dot"></div>
            <div class="loading__dots__dot"></div>
        </div>
        <div class="loading__msg">
            <center>
                <b style="font-size: 22px;">
                    <a href="https://github.com/NaInSec/Anti-DDoS" target="_blank" style="color: black;">Anti DDoS</a> NaInSec is checking....
                </b>
                <br><br>
                Hi, don't worry, this is a simple security verification, 
                you will see this only one time;<br> your webpage will show up soon!
                <br> This security wall was built by 
                <a href="https://github.com/NaInSec" target="_blank">NaInSec</a> 
            </center>
        </div>
    </div>

    <?php exit();
}
?>