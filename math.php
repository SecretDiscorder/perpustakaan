

<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["ses_username"])) {
    header("Location: login.php");
    exit();
}
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Matematika</title>
    <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML"></script>
    <style>
      /* Tema Moonlight Galaxy yang dimodifikasi */
      :root {
        --background-color: #1a150d;
        --text-color: black;
        --primary-color: #4f46e5;
        --secondary-color: #1e293b;
        --accent-color: #6b21a8;
        --highlight-color: green;
        --error-color: black;
      }

      /* Image styling - Set a fixed size for the image */
      #question-image {
        width: 80%;
        /* Adjust size as needed */
        max-width: 100%;
        height: auto;
        /* Maintain aspect ratio */
        margin: 20px auto;
        display: block;
        border: 5px solid var(--highlight-color);
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease;
      }

      #question-image:hover {
        transform: scale(1.2);
        /* Larger zoom effect */
      }

      /* Math styling */
      #question-math {
        font-size: 32px;
        /* Adjust math font size */
        text-align: center;
        color: white;
        /* Optional for styling */
      }

      /* Styling body 
      body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--background-color);
        color: var(--text-color);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        overflow-x: hidden;
      }*/

      /* Kontainer utama */
      #container,
      .container {
        width: 90%;
        max-width: 800px;
        background-color: #e38b07;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        text-align: center;
        animation: fadeIn 1.2s ease-in-out;
      }

      /* Judul */
      h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: var(--highlight-color);
        margin-bottom: 10px;
      }

      h2 {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--text-color);
        margin-bottom: 20px;
      }

      /* Animasi fade-in */
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(-20px);
        }

        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Tombol operasi */
      button {
        background: var(--button-primary-bg);
        color: white;
        padding: 12px 20px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        margin: 10px;
        transition: all 0.3s ease-in-out;
      }

      button:hover {
        background: var(--button-hover-bg);
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(147, 51, 234, 0.4);
      }

      /* Tombol angka */
      /* Tombol angka */
      .number-btn {
        display: inline-block;
        margin: 5px;
        padding: 10px 20px;
        background-color: var(--accent-color);
        color: white;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
      }

      .number-btn:hover {
        background-color: var(--highlight-color);
      }

      .number-btn.selected {
        background-color: var(--highlight-color);
      }

      /* Input style */
      input[type="text"],
      input[type="number"] {
        width: 100%;
        padding: 10px;
        font-size: 18px;
        border: 2px solid #4caf50;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s ease;
      }

      input[type="number"]:focus {
        border-color: var(--highlight-color);
        box-shadow: 0 0 8px rgba(72, 187, 120, 0.5);
      }

      /* Kartu */
      .card {
        background-color: var(--card-bg-color);
        padding: 20px;
        border-radius: 10px;
        border: 1px solid var(--card-border-color);
        margin: 20px 0;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      }

      /* Timer */
      #timer {
        font-size: 1.5rem;
        color: var(--error-color);
        font-weight: bold;
      }

      /* Feedback */
      #feedback {
        font-size: 1.2rem;
        font-weight: bold;
      }

      /* Tampilan Hasil */
      #result-container {
        text-align: center;
      }

      #result-container p {
        font-size: 1.3rem;
        margin: 10px 0;
      }

      #result-message {
        font-size: 1.5rem;
        font-weight: bold;
      }

      /* Responsif */
      @media screen and (max-width: 768px) {
        h1 {
          font-size: 2rem;
        }

        h2 {
          font-size: 1.5rem;
        }

        button {
          font-size: 14px;
          padding: 10px 15px;
        }
      }
    </style>
  </head>
  <body>

  <br>
<br>
  <br>
  <br>
    <div id="container" class="container">
      <h1>Tes Matematika Dasar</h1>
      <!-- Form Input Nama -->
      <div id="input-nama-container">
        <label for="nama">Masukkan Nama Anda:</label>
        <input type="text" id="nama" placeholder="Nama lengkap" required>
        <button id="submit-name-btn">Submit</button>
      </div>
      <!-- Step 1: Pilih Operasi -->
      <div id="operation-menu" class="fade-in" style="display:none">
        <h2>Pilih Operasi</h2>
        <button class="operation-btn" data-operation="addition">Penjumlahan ( + )</button>
        <button class="operation-btn" data-operation="subtraction">Pengurangan ( - )</button>
        <button class="operation-btn" data-operation="multiplication">Perkalian ( * )</button>
        <button class="operation-btn" data-operation="division">Pembagian ( / )</button>
        <button class="operation-btn" data-operation="exponent">Perpangkatan ( ** )</button>
      </div>
      <!-- Step 2: Pilih Angka -->
      <div id="number-selection" class="fade-in" style="display: none;">
        <h2>Pilih Angka</h2>
        <div id="number-options"></div>
        <button id="continue-btn" class="btn" style="display: none;">Lanjutkan</button>
      </div>
      <!-- Bagian Pemilihan Jumlah Soal -->
      <div id="question-count-selection" style="display: none;">
        <h2>Pilih Jumlah Soal</h2>
        <label for="question-count">Jumlah Soal: </label>
        <input type="number" id="question-count" min="1" max="100" value="50">
        <button id="start-quiz-btn">Mulai Quiz</button>
      </div>
      <!-- Container untuk Quiz -->
      <div id="quiz-container" style="display: none;">
        <!-- Container to display math equation -->
        <!-- Display math equation -->
        <p id="question-math" style="display: none;"></p>
        <!-- Display question image -->
        <!-- Question number -->
        <h2 id="question-number"></h2>
        <!-- Answer input -->
        <input type="number" id="answer" placeholder="Ketik jawaban..." />
        <!-- Feedback section -->
        <p id="feedback"></p>
        <!-- Submit button -->
        <button id="submit-btn">Submit</button>
        <!-- Timer -->
        <p>Waktu tersisa: <span id="time-left">60</span> detik </p>
      </div>
      <!-- Hasil -->
      <div id="result-container" style="display: none;">
        <h2>Hasil Kuis</h2>
        <h3 id="nama-hasil"></h3>
        <!-- Fixed missing closing tag -->
        <h3 id="score"></h3>
        <h3 id="percentage"></h3>
        <h3 id="result-message"></h3>
        <button onclick="location.reload()">Coba Lagi</button>
      </div>
    </div>
    <script>
      document.getElementById('submit-name-btn').addEventListener('click', function() {
        const name = document.getElementById('nama').value;
        if (name) {
          document.getElementById('input-nama-container').style.display = 'none';
          document.getElementById('operation-menu').style.display = 'block';
          document.getElementById('nama-hasil').textContent = `Nama: ${name}`; // Display name in the result
        } else {
          alert('Nama tidak boleh kosong!');
        }
      });
      let selectedOperation = null;
      let selectedNumbers = [];
      let questions = [];
      let currentQuestionIndex = 0;
      let score = 0;
      let correctAnswer;
      let timer;
      let totalQuestions = 50; // Default jumlah soal
      // Langkah 1: Pilih Operasi
      document.querySelectorAll('.operation-btn').forEach(button => {
        button.addEventListener('click', function() {
          selectedOperation = this.dataset.operation;
          showNumberSelection();
        });
      });

      function showNumberSelection() {
        document.getElementById('operation-menu').style.display = 'none';
        document.getElementById('number-selection').style.display = 'block';
        // Clear the previous number options
        document.getElementById('number-options').innerHTML = '';
        // Create number buttons for selection (1 to 20)
        for (let i = 1; i <= 20; i++) {
          const numberOption = document.createElement('button');
          numberOption.className = 'number-btn';
          numberOption.textContent = i;
          numberOption.dataset.number = i;
          numberOption.addEventListener('click', function() {
            toggleNumberSelection(this);
          });
          document.getElementById('number-options').appendChild(numberOption);
        }
        // Show continue button only when a number is selected
        document.getElementById('continue-btn').style.display = selectedNumbers.length > 0 ? 'block' : 'none';
      }

      function toggleNumberSelection(button) {
        const number = parseInt(button.dataset.number);
        if (selectedNumbers.includes(number)) {
          selectedNumbers = selectedNumbers.filter(n => n !== number);
          button.style.backgroundColor = '';
        } else {
          selectedNumbers.push(number);
          button.style.backgroundColor = 'lightblue';
        }
        // Update continue button visibility
        document.getElementById('continue-btn').style.display = selectedNumbers.length > 0 ? 'block' : 'none';
      }
      document.getElementById('continue-btn').addEventListener('click', showQuestionCountSelection);
      // Langkah 3: Mulai Quiz
      document.getElementById('start-quiz-btn').addEventListener('click', startQuiz);
      document.getElementById('submit-btn').addEventListener('click', submitAnswer);
      // Tambahkan event listener untuk Enter
      document.getElementById('answer').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
          event.preventDefault(); // Mencegah behavior default form
          submitAnswer();
        }
      });

      function showQuestionCountSelection() {
        document.getElementById('number-selection').style.display = 'none';
        document.getElementById('question-count-selection').style.display = 'block';
      }

      function startQuiz() {
        // Ambil jumlah soal dari input
        totalQuestions = parseInt(document.getElementById('question-count').value) || 50;
        document.getElementById('question-count-selection').style.display = 'none';
        document.getElementById('quiz-container').style.display = 'block';
        generateQuestions();
        showQuestion();
      }

function generateQuestions() {
    for (let i = 0; i < totalQuestions; i++) {
        const num1 = selectedNumbers[Math.floor(Math.random() * selectedNumbers.length)];
        const num2 = Math.floor(Math.random() * 10) + 1;
        let question, answer;
        switch (selectedOperation) {
            case 'addition':
                question = `${num1} + ${num2}`;  // Penjumlahan
                answer = num1 + num2;
                break;
            case 'subtraction':
                question = `${num1} - ${num2}`;  // Pengurangan
                answer = num1 - num2;
                break;
            case 'multiplication':
                question = `${num1} * ${num2}`;  // Perkalian
                answer = num1 * num2;
                break;
            case 'division':
                question = `${num1 * num2} / ${num2}`;  // Pembagian
                answer = num1;
                break;
            case 'exponent':
                question = `${num1}^2`;  // Perpangkatan
                answer = num1 ** 2;
                break;
        }
        questions.push({
            question,
            answer
        });
    }
}


      function startTimer() {
        let timeLeft = 60; // Set waktu awal (60 detik)
        document.getElementById('time-left').textContent = timeLeft;
        // Pastikan tidak ada timer aktif sebelum memulai yang baru
        if (timer) {
          clearInterval(timer);
        }
        // Mulai interval baru
        timer = setInterval(() => {
          timeLeft--;
          document.getElementById('time-left').textContent = timeLeft;
          // Jika waktu habis
          if (timeLeft <= 0) {
            clearInterval(timer); // Hentikan timer
            handleTimeout(); // Tangani ketika waktu habis
          }
        }, 1000); // Perbarui setiap 1 detik
      }

      function handleTimeout() {
        // Show feedback for timeout
        const feedbackElement = document.getElementById('feedback');
        feedbackElement.textContent = "Waktu habis! Jawaban yang benar adalah " + questions[currentQuestionIndex].answer;
        feedbackElement.style.color = "orange";
        // Move to the next question after a short delay
        setTimeout(() => {
          currentQuestionIndex++;
          showQuestion();
        }, 2000); // 2-second delay
      }

      function showQuestion() {
        // Stop the timer if any is running
        clearInterval(timer);
        if (currentQuestionIndex >= questions.length) {
          endQuiz();
          return;
        }
        const currentQuestion = questions[currentQuestionIndex];
        if (['addition', 'subtraction', 'multiplication', 'division', 'exponent'].includes(selectedOperation)) {
          const mathExpression = currentQuestion.question;
          // Show math equation and hide image
          document.getElementById('question-math').style.display = 'block';
          document.getElementById('question-math').innerHTML = `${mathExpression}`;
        } else {
          // Show image and hide math
          document.getElementById('question-math').style.display = 'none';
        }
        document.getElementById('question-number').textContent = `Soal ${currentQuestionIndex + 1} dari ${questions.length}`;
        document.getElementById('feedback').textContent = ""; // Reset feedback
        document.getElementById('answer').value = ""; // Reset input
        startTimer(); // Start the timer for this question
      }

      function submitAnswer() {
        clearInterval(timer); // Stop the timer when the user submits an answer
        const userAnswer = parseFloat(document.getElementById('answer').value);
        const correctAnswer = questions[currentQuestionIndex].answer;
        const feedbackElement = document.getElementById('feedback');
        // Provide feedback
        if (userAnswer === correctAnswer) {
          feedbackElement.textContent = "Benar!";
          feedbackElement.style.color = "green";
          score++;
        } else {
          feedbackElement.textContent = `Salah! Jawaban yang benar adalah ${correctAnswer}`;
          feedbackElement.style.color = "red";
        }
        // Move to the next question after a short delay
        setTimeout(() => {
          currentQuestionIndex++;
          showQuestion();
        }, 2000); // 2-second delay
      }

      function endQuiz() {
        clearInterval(timer);
        // Calculate percentage correct
        const percentage = Math.round((score / questions.length) * 100);
        // Show the result container and hide the quiz container
        document.getElementById('quiz-container').style.display = 'none';
        document.getElementById('result-container').style.display = 'block';
        // Update result information
        document.getElementById('score').textContent = `Skor Anda: ${score}/${questions.length}`;
        document.getElementById('percentage').textContent = `Persentase Jawaban Benar: ${percentage}%`;
        // Dynamically create and display result summary
        const resultHTML = `
    
							<h2>Hasil Ujian</h2>
							<p>Nama: ${nama}</p>
							<p>Jumlah Soal: ${questions.length}</p>
							<p>Soal Benar: ${correctAnswer}</p>
							<p>Soal Salah: ${questions.length - correctAnswer}</p>
  `;
        document.getElementById('result-message').innerHTML = resultHTML; // Adding dynamic result message
        // Optionally, show a message based on the percentage
        let resultMessage = '';
        if (percentage >= 80) {
          resultMessage = 'Selamat, Anda Lulus!';
        } else if (percentage >= 50) {
          resultMessage = 'Anda Cukup Baik, tapi masih bisa ditingkatkan.';
        } else {
          resultMessage = 'Sayang sekali, Anda Gagal. Coba lagi!';
        }
        document.getElementById('result-message').textContent = resultMessage;
      }

      function setNama() {
        // Ambil nilai dari input nama
        const nama = document.getElementById("nama").value;
        if (nama.trim() === "") {
          alert("Nama tidak boleh kosong!");
          return;
        }
        // Menampilkan hasil ujian dan menyembunyikan form input nama
        document.getElementById("input-nama-container").style.display = "none";
        document.getElementById("result-container").style.display = "block";
        document.getElementById("nama-hasil").innerText = "Nama: " + nama;
      }


    </script>
  </body>
</html>
