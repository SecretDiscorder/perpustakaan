<?php
// Mulai session jika belum
session_start();

// Cek apakah pengguna sudah login


// Koneksi ke DB
include "inc/koneksi.php";
mysqli_set_charset($koneksi, "utf8mb4");

// Mengambil komik_id dari query string
if (isset($_GET['komik_id'])) {
    $komik_id = intval($_GET['komik_id']); // Pastikan komik_id adalah integer
} else {
    echo "Komik ID tidak ditemukan.";
    exit();
}

// Ambil data komik berdasarkan ID
$sql_komik = "SELECT * FROM komik WHERE id = ?";
$stmt_komik = $koneksi->prepare($sql_komik);
$stmt_komik->bind_param("i", $komik_id);
$stmt_komik->execute();
$result_komik = $stmt_komik->get_result();

if ($result_komik->num_rows === 0) {
    echo "Komik tidak ditemukan.";
    exit();
}

$komik = $result_komik->fetch_assoc();

// Ambil data chapter berdasarkan komik_id
$sql_chapter = "SELECT * FROM chapter WHERE komik_id = ?";
$stmt_chapter = $koneksi->prepare($sql_chapter);
$stmt_chapter->bind_param("i", $komik_id);
$stmt_chapter->execute();
$result_chapter = $stmt_chapter->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Chapter - <?= htmlspecialchars($komik['judul']) ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
            color: #4CAF50;
            font-weight: 700;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .chapter-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow-y: auto;
            max-height: 500px; /* height for scroll */
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .list-group-item {
            background-color: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #e9ecef;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .list-group-item a {
            color: #007bff;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .list-group-item a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .list-group-item i {
            font-size: 1.2rem;
            color: #4CAF50;
        }

        .no-chapters {
            text-align: center;
            font-size: 1.2rem;
            color: #6c757d;
            padding: 20px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            h1 {
                font-size: 2rem;
            }

            .chapter-list {
                max-height: 400px;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1>Daftar Chapter - <?= htmlspecialchars($komik['judul']) ?></h1>

        <!-- Tombol Kembali ke Daftar Komik -->
        <a href="index.php?page=MyApp/data_komik" class="btn btn-secondary mb-4">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Komik
        </a>

        <!-- Daftar Chapter -->
        <div class="chapter-list">
            <?php if ($result_chapter->num_rows > 0) { ?>
                <ul class="list-group">
                    <?php while ($chapter = $result_chapter->fetch_assoc()) { ?>
                        <li class="list-group-item">
                            <a href="<?= htmlspecialchars($chapter['link']) ?>" target="_blank">
                                <i class="fas fa-book"></i>
                                <?= htmlspecialchars($chapter['judul']) ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p class="no-chapters">Tidak ada chapter yang tersedia untuk komik ini.</p>
            <?php } ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi database
$stmt_komik->close();
$stmt_chapter->close();
$koneksi->close();
?>