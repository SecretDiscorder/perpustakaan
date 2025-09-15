<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["ses_username"])) {
    header("Location: login.php");
    exit();
}

include('inc/koneksi.php');

// Get the data from the form submission
$username = $_POST['username'];
$score = $_POST['score'];
$total_questions = $_POST['total_questions']; // Ensure this is being sent
$time_taken = $_POST['time_taken'];

// Validate inputs
if (empty($username) || empty($score) || empty($total_questions) || empty($time_taken)) {
    echo json_encode(["status" => "error", "message" => "All data must be provided."]);
    exit();
}

// Ensure that the score, total questions, and time are numeric
if (!is_numeric($score) || !is_numeric($total_questions) || !is_numeric($time_taken)) {
    echo json_encode(["status" => "error", "message" => "Score, total questions, and time must be numeric."]);
    exit();
}

// Calculate the percentage
$percentage = ($score / $total_questions) * 100;

// Ensure that percentage is a valid number (between 0 and 100)
if ($percentage < 0 || $percentage > 100) {
    echo json_encode(["status" => "error", "message" => "Invalid percentage calculated."]);
    exit();
}

// Prepared statement to insert the data into the leaderboard table
$query = "INSERT INTO leaderboard (username, score, total_questions, time_taken, percentage, date) 
          VALUES (?, ?, ?, ?, ?, NOW())";

// Prepare the statement
$stmt = mysqli_prepare($koneksi, $query);

// Bind the parameters, including the percentage value
mysqli_stmt_bind_param($stmt, "siiis", $username, $score, $total_questions, $time_taken, $percentage);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    // Return a success message in JSON format
    echo json_encode(["status" => "success", "message" => "Score successfully saved."]);
} else {
    // Return an error message in JSON format
    echo json_encode(["status" => "error", "message" => "Error saving score: " . mysqli_error($koneksi)]);
}

// Close the statement
mysqli_stmt_close($stmt);
?>
