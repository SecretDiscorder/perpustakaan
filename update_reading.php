<?php
// Include database connection
include "inc/koneksi.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

// Prepare an array for the response
$response = [];

// Check if the user is logged in
if (!isset($_SESSION["ses_id"])) {
    $response['error'] = "User not logged in.";
    echo json_encode($response); // Output JSON directly
    exit; // End the script
}

// Get user ID from session
$user_id = $_SESSION["ses_id"];

// Check if the required data is sent via POST
if (isset($_POST['id_buku']) && isset($_POST['waktu_baca'])) {
    $id_buku = intval($_POST['id_buku']);
    $waktu_baca = intval($_POST['waktu_baca']); // Time in minutes

    // Check if the book exists in the database
    // Mengubah query untuk memilih dari tabel tb_buku (bukan info_buku)
$sql_check_book = "SELECT id_buku, judul_buku, jumlah_baca, total_waktu_baca 
                   FROM tb_buku WHERE id_buku = ?";

    $stmt_check_book = $koneksi->prepare($sql_check_book);
    $stmt_check_book->bind_param("i", $id_buku);
    $stmt_check_book->execute();
    $stmt_check_book->store_result();
    
    if ($stmt_check_book->num_rows > 0) {
        // Fetch book details
        $stmt_check_book->bind_result($id_buku_db, $judul_buku, $jumlah_baca, $total_waktu_baca);
        $stmt_check_book->fetch();
// Cek apakah data sudah ada pada hari ini
$sql_check_existing = "SELECT id FROM user_readings WHERE id_user = ? AND tanggal_baca = CURDATE()";
$stmt_check_existing = $koneksi->prepare($sql_check_existing);
$stmt_check_existing->bind_param("i", $user_id);
$stmt_check_existing->execute();
$stmt_check_existing->store_result();



// Jika belum ada, lanjutkan untuk memasukkan data bacaan
// Perintah SQL untuk memasukkan data bacaan pengguna
$sql_insert_reading = "INSERT INTO user_readings (id_user, id_buku, waktu_baca, tanggal_baca)
                       VALUES (?, ?, ?, CURDATE())"; // Menggunakan CURDATE() untuk tanggal hari ini

$stmt_insert_reading = $koneksi->prepare($sql_insert_reading);
$stmt_insert_reading->bind_param("iii", $user_id, $id_buku, $waktu_baca);


        if ($stmt_insert_reading->execute()) {
            // Update the read count and total reading time in the info_buku table
            // Update jumlah_baca dan total_waktu_baca di tb_buku
$new_jumlah_baca = ($jumlah_baca ?? 0) + 1;
$new_total_waktu_baca = ($total_waktu_baca ?? 0) + $waktu_baca;

$sql_update_buku = "UPDATE tb_buku 
                    SET jumlah_baca = ?, total_waktu_baca = ? 
                    WHERE id_buku = ?";

$stmt_update_buku = $koneksi->prepare($sql_update_buku);
$stmt_update_buku->bind_param("iii", $new_jumlah_baca, $new_total_waktu_baca, $id_buku);
$stmt_update_buku->execute();


            // Success message
            $response['success'] = "Reading data inserted and book information updated successfully.";
        } else {
            $response['error'] = "Failed to insert reading data.";
        }
        $stmt_insert_reading->close();
    } else {
        // If book not found
        $response['error'] = "Book not found.";
    }
    $stmt_check_book->close();
} else {
    // If required data is missing
    $response['error'] = "Missing required data.";
}

// Close the database connection
$koneksi->close();

// Output the complete JSON response to the browser
header('Content-Type: application/json'); // Set the response header to JSON
echo json_encode($response); // Output the JSON response
exit; // End the script


$stmt_check_existing->close();
$stmt_insert_reading->close();

?>