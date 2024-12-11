

<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["ses_username"])) {
    header("Location: login.php");
    exit();
}
?>
<?php

// Handle OPTIONS pre-flight request (required for CORS)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
?>
<html lang="en">
<head>
<script>
    function fetchDownloadOptions() {
        const youtubeLink = document.getElementById("youtube_link").value;
        const resolution = document.getElementById("resolution").value;
        const downloadButton = document.querySelector("button");

        if (!youtubeLink) {
            alert("Please enter a YouTube link.");
            return;
        }

        // Blok tombol download
        downloadButton.disabled = true;
        downloadButton.innerText = "Loading...";

        // API Endpoint Django
        const apiUrl = "https://mtk.bima-pustaka.my.id/api/youtube-download/";

        // Fetch data from Django API
        fetch(`${apiUrl}?youtube_link=${encodeURIComponent(youtubeLink)}&resolution=${encodeURIComponent(resolution)}`)
            .then(response => response.json())
            .then(data => {
                const downloadContainer = document.getElementById("download-options");
                downloadContainer.innerHTML = `<h2>${data.title}</h2>`;
if (data.streams.length > 0) {
    const list = document.createElement("ul");
    data.streams.forEach(stream => {
        const listItem = document.createElement("li");

        // Tambahkan label "Disarankan" jika ID adalah 18
        const recommendedText = stream.format === "18 - 640x360 (360p)" ? " <b>(Disarankan)</b>" : "";

        listItem.innerHTML = `<a href="${stream.url}" download>${stream.format}${recommendedText}</a>`;
        list.appendChild(listItem);
    });
    downloadContainer.appendChild(list);
} else {
    downloadContainer.innerHTML += "<p>No streams available for the selected resolution.</p>";
}


            })
            .catch(error => {
                console.error("Error fetching download options:", error);
                alert("An error occurred. Please try again.");
            })
            .finally(() => {
                // Kembalikan tombol ke keadaan semula
                downloadButton.disabled = false;
                downloadButton.innerText = "Download";
            });
    }
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Video Downloader</title>
    <style>

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
      input[type="text"], select,
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
    </style>
</head>
<body>
<br>
<br>
<br>
<br>
<div class="container">
    <h1>YouTube Video Downloader</h1>

    <label for="youtube_link">Enter YouTube Link:</label>
    <input type="text" id="youtube_link" placeholder="Paste YouTube Link Here" required>

    <label for="resolution">Select Resolution:</label>
    <select id="resolution">
        <option value="360p">360p</option>
        <option value="480p">480p</option>
        <option value="720p">720p</option>
        <option value="1080p">1080p</option>
    </select>

    <button onclick="fetchDownloadOptions()">Download</button>

    <div id="download-options"></div>
</div>

</body>
</html>
