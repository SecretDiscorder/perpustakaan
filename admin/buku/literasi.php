<?php

if (isset($_SESSION["ses_username"]) == "") {
    //header("location: login.php");
    $data_level = "User";
    $data_nama = "User";
    
} else {
    $data_id = $_SESSION["ses_id"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}

// Koneksi ke DB
include "inc/koneksi.php";

// Make sure your connection uses UTF-8 encoding
mysqli_set_charset($koneksi, "utf8mb4");
$timeLimit = 600; // 30 minutes
// Cek apakah tombol acak sudah ditekan
if (isset($_POST['shuffle'])) {
    // Reset timer dan ambil buku baru
    $_SESSION['last_shuffle_time'] = time();
    $sql = $koneksi->query("SELECT * FROM tb_buku WHERE category = 'Literasi' ORDER BY RAND() LIMIT 1");
    $literatureBook = $sql->fetch_assoc();
    $_SESSION['literature_book'] = $literatureBook; // Simpan buku yang baru diacak dalam session
} else {
    // Cek apakah sudah lebih dari 30 menit sejak terakhir kali buku diacak
    
    if (!isset($_SESSION['last_shuffle_time']) || time() - $_SESSION['last_shuffle_time'] > $timeLimit) {
        // Sudah lebih dari 30 menit, acak buku
        $_SESSION['last_shuffle_time'] = time(); // Simpan waktu acak ulang buku
        $sql = $koneksi->query("SELECT * FROM tb_buku WHERE category = 'Literasi' ORDER BY RAND() LIMIT 1");
        $literatureBook = $sql->fetch_assoc();
    } else {
        // Gunakan buku yang sudah diacak sebelumnya
        $literatureBook = isset($_SESSION['literature_book']) ? $_SESSION['literature_book'] : null;
    }
}

$thumbnail = isset($literatureBook["drive_url"]) ? getGoogleDriveThumbnail($literatureBook["drive_url"]) : 'https://mtk.bima-pustaka.my.id/folder-icon.jpg'; // Gambar thumbnail dari Google Drive

// Fetch Google Drive thumbnails function
function getGoogleDriveThumbnail($driveUrl) {
    if (empty($driveUrl)) {
        return 'https://mtk.bima-pustaka.my.id/folder-icon.jpg';
    }
    preg_match('/\/d\/([a-zA-Z0-9-_]+)/', $driveUrl, $matches);
    if (!isset($matches[1])) {
        return 'https://mtk.bima-pustaka.my.id/folder-icon.jpg';
    }
    $fileId = $matches[1];
    return "https://drive.google.com/thumbnail?id=$fileId";
}

// Calculate the remaining time before next shuffle
$timeLeft = $timeLimit - (time() - $_SESSION['last_shuffle_time']);
$minutesLeft = floor($timeLeft / 60);
$secondsLeft = $timeLeft % 60;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Literasi Book</title>
    <style>
        /* Styling for card layout */
        .card {
            display: flex;
            flex-direction: column;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            margin: 20px auto;
            background: white;
            transition: transform 0.5s ease-in-out;
        }
        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 2px solid #ddd;
        }
        .card-body {
            padding: 20px;
            text-align: center;
        }
        .card-body h5 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .card-body p {
            margin-bottom: 15px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .timer {
            font-size: 1.2rem;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
        }
        .shuffle-btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }
        .shuffle-btn:hover {
            background-color: #218838;
        }

        /* Card rotation animation */
        .rotate-card {
            animation: rotateCard 1s forwards;
        }

        @keyframes rotateCard {
            0% {
                transform: rotateY(0deg);
            }
            50% {
                transform: rotateY(180deg);
            }
            100% {
                transform: rotateY(360deg);
            }
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <h1 class="text-center mb-5">Lembar Literasi</h1>

        <?php if ($literatureBook): ?>
            <div class="card" id="literatureCard">
                <img src="<?= $thumbnail ?>" class="card-img-top" alt="Literasi Book Cover">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($literatureBook["judul_buku"]) ?></h5>
                    <a href="<?= $literatureBook["drive_url"] ?>" class="btn">Baca Buku</a>
                </div>
            </div>
        <?php else: ?>
            <p class="text-center">Tidak ada buku literasi tersedia.</p>
        <?php endif; ?>

        <form method="POST" action="">
            <button type="submit" name="shuffle" class="shuffle-btn">Acak Lagi</button>
        </form>

        <?php if ($timeLeft > 0): ?>
            <div class="timer">
                <p>Akan mereset buku dalam <span id="countdown"><?= $minutesLeft ?> menit <?= $secondsLeft ?> detik</span></p>
            </div>
        <?php else: ?>
            <div class="timer">
                <p>Buku telah diacak! Anda dapat membaca buku baru.</p>
            </div>
        <?php endif; ?>

    </div>

    <script>
        // If time left is greater than 0, update the countdown every second
        <?php if ($timeLeft > 0): ?>
            var countdown = document.getElementById('countdown');
            var timeLeft = <?= $timeLeft ?>; // in seconds

            function updateCountdown() {
                timeLeft--;
                var minutesLeft = Math.floor(timeLeft / 60);
                var secondsLeft = timeLeft % 60;
                countdown.textContent = minutesLeft + " menit " + secondsLeft + " detik";

                if (timeLeft <= 0) {
                    clearInterval(timer);
                    countdown.textContent = "Buku telah diacak! Anda dapat membaca buku baru.";
                }
            }

            var timer = setInterval(updateCountdown, 1000); // update every second
        <?php endif; ?>

        // Handle shuffle button click to rotate the card and load a new book
        document.querySelector('.shuffle-btn').addEventListener('click', function() {
            var card = document.getElementById('literatureCard');
            card.classList.add('rotate-card'); // Add rotation animation class

            setTimeout(function() {
                // After the rotation, refresh the page to get a new book
                location.reload(); // Reload page to get a new book
            }, 1000); // Delay for the rotation to finish
        });
    </script>

</body>
</html>
