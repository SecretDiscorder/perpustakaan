<?php
session_start(); // Start the session to store file info between pages
error_reporting(E_ALL); 
ini_set('display_errors', 1);

require_once('vendor/autoload.php');
require_once('inc/koneksi.php');
mysqli_set_charset($koneksi, "utf8mb4");

// Upload directory path
$upload_dir = '/home/bimapust/domains/bima-pustaka.my.id/public_html/admin/buku/';

// Handle JSON file upload
if (isset($_POST['upload_json'])) {
    if (isset($_FILES['acc_json']) && $_FILES['acc_json']['error'] === UPLOAD_ERR_OK) {
        $file_tmp_name = $_FILES['acc_json']['tmp_name'];
        $file_name = "acc_" . time() . ".json";
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp_name, $file_path)) {
            $_SESSION['file_path'] = $file_path;
            echo "<script>
                    Swal.fire({title: 'File Uploaded Successfully!', text: 'Now input the Folder ID for sync.', icon: 'success', confirmButtonText: 'OK'});
                  </script>";
        } else {
            echo "<script>Swal.fire({title: 'Upload Failed!', text: 'Failed to upload your JSON file.', icon: 'error', confirmButtonText: 'Try Again'});</script>";
        }
    } else {
        echo "<script>Swal.fire({title: 'No File Uploaded!', text: 'Please choose a file to upload.', icon: 'warning', confirmButtonText: 'OK'});</script>";
    }
}

// Handle Google Drive sync
if (isset($_POST['sync_files']) && isset($_SESSION['file_path'])) {
    if (file_exists($_SESSION['file_path'])) {
        $client = new Google_Client();
        $client->setApplicationName('Google Drive API PHP');
        $client->setScopes(Google_Service_Drive::DRIVE_READONLY);
        $client->setAuthConfig($_SESSION['file_path']);
        $client->setAccessType('offline');

        $service = new Google_Service_Drive($client);
        $folderId = $_POST['folder_id'];

        syncFromGoogleDrive($koneksi, $service, $folderId);
    }
}

// Function to sync from Google Drive
function syncFromGoogleDrive($koneksi, $service, $folderId) {
    $query = "'$folderId' in parents";

    try {
        $files = $service->files->listFiles(['q' => $query]);

        if (empty($files->getFiles())) {
            echo "<script>Swal.fire({title: 'No Files Found!', text: 'No files in the provided folder.', icon: 'info', confirmButtonText: 'OK'});</script>";
            return;
        }

        $fileUrls = [];
        $fileNames = [];
        foreach ($files->getFiles() as $file) {
            $fileUrls[] = "https://drive.google.com/file/d/" . $file->id . "/view?usp=sharing";
            $fileNames[] = $file->getName();
	     $category = $_POST['category'];
        }

        $query_max_id = mysqli_query($koneksi, "SELECT MAX(id_buku) AS max_id FROM tb_buku");
        $row = mysqli_fetch_assoc($query_max_id);
        $max_id = $row['max_id'] ?? 0;
        $format = $max_id + 1;

        $total_files = count($fileNames);
        $synced_files = 0;

        foreach ($fileNames as $index => $judul_buku) {
            $drive_url = $fileUrls[$index];
            $judul_buku = mysqli_real_escape_string($koneksi, $judul_buku);
            $drive_url = mysqli_real_escape_string($koneksi, $drive_url);

            $cek_judul = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE judul_buku = '$judul_buku'");

            if (mysqli_num_rows($cek_judul) == 0) {
                $id_buku = $format++;

                $sql_simpan = "INSERT INTO tb_buku (id_buku, judul_buku, category, pengarang, penerbit, th_terbit, drive_url) 
                               VALUES ('$id_buku', '$judul_buku', '$category', NULL, NULL, '0', '$drive_url')";
                $query_simpan = mysqli_query($koneksi, $sql_simpan);

                if ($query_simpan) $synced_files++;
            }
        }

        echo "<script>
                Swal.fire({title: 'Sync Completed!', text: '$synced_files out of $total_files files synced successfully.', icon: 'success', confirmButtonText: 'OK'})
                .then(() => { window.location = 'index.php?page=MyApp/data_buku'; });
              </script>";

    } catch (Exception $e) {
	
        echo "<script>Swal.fire({title: 'Error!', text: '" . $e->getMessage() . "', icon: 'error', confirmButtonText: 'OK'});</script>";
    }
}

// Function to fetch a random category from the database
// Fetch all categories from the database, not just one random category

	$sql_categories = $koneksi->query("SELECT DISTINCT category FROM tb_buku ORDER BY category");
	$categories = [];
	while ($data = $sql_categories->fetch_assoc()) {
	    $categories[] = $data['category'];
	}

$query_max_id = mysqli_query($koneksi, "SELECT MAX(id_buku) AS max_id FROM tb_buku");
$row = mysqli_fetch_assoc($query_max_id);
$max_id = $row['max_id'] ?? 0;
$format = $max_id + 1;
if (!$format) {
    $format = 1; // Pastikan ada nilai default
}

function saveManualBook($koneksi) {
    $id_buku = $_POST['id_buku'] ?? null; // Pastikan nilainya tidak kosong
    $judul_buku = $_POST['judul_buku'];
    $kategori = $_POST['category'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $drive_url = mysqli_real_escape_string($koneksi, $_POST['drive_url']);
    $th_terbit = $_POST['th_terbit'] ?: '0000';

    if (empty($id_buku)) {
        echo "<script>alert('ID Buku tidak boleh kosong');</script>";
        return;
    }

    $sql_simpan = "INSERT INTO tb_buku (id_buku, judul_buku, category, pengarang, drive_url, penerbit, th_terbit) 
                   VALUES ('$id_buku', '$judul_buku', '$kategori', '$pengarang', '$drive_url', '$penerbit', '$th_terbit')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);

    if ($query_simpan) {
        echo "<script>
                Swal.fire({title: 'Added Successfully', text: 'OK', icon: 'success', confirmButtonText: 'OK'})
                .then(() => { window.location = 'index.php?page=MyApp/data_buku'; });
              </script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Add Failed', text: 'Terjadi kesalahan saat menyimpan data.', icon: 'error', confirmButtonText: 'OK'})
                .then(() => { window.location = 'index.php?page=MyApp/add_buku'; });
              </script>";
    }
}


// Handle manual book saving
if (isset($_POST['SimpanManual'])) {
    saveManualBook($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Buku Manual</h3>
                </div>
                <div class="box-body">
                    <form method="POST">
                        <div class="form-group">
                            <label>ID Buku</label>
<input type="number" class="form-control" name="id_buku" value="<?php echo $format; ?>" readonly required>

                        </div>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category" class="form-control" required>
                               
        <?php foreach ($categories as $category) : ?>
            <option value="<?= $category ?>"><?= $category ?></option>
        <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" class="form-control" name="pengarang">
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit">
                        </div>
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="text" class="form-control" name="th_terbit" maxlength="4">
                        </div>
<div class="form-group">
                            <label>Link Buku</label>
                            <input type="text" class="form-control" name="drive_url">
                        </div>
                        <button type="submit" class="btn btn-info" name="SimpanManual">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Box to display content with better styling -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Sync Folder Drive API</h3>
                </div>
                <div class="card-body">
                    <!-- Form to upload JSON -->
                    <form method="POST" enctype="multipart/form-data" class="mb-4">
                        <div class="mb-3">
                            <label for="acc_json" class="form-label">Upload Google API JSON:</label>
                            <input type="file" name="acc_json" id="acc_json" class="form-control" required>
                        </div>
                        <button type="submit" name="upload_json" class="btn btn-primary">Upload JSON</button>
                    </form>

                    <!-- Form to Sync Files from Google Drive -->
                    <?php if (isset($_SESSION['file_path'])): ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="folder_id" class="form-label">Enter Google Drive Folder ID:</label>
                                <input type="text" name="folder_id" id="folder_id" class="form-control" placeholder="Folder ID" required>
                            </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category" class="form-control" required>
                               
        <?php foreach ($categories as $category) : ?>
            <option value="<?= $category ?>"><?= $category ?></option>
        <?php endforeach; ?>
                            </select>
                        </div>
                            <button type="submit" name="sync_files" class="btn btn-success">Sync Files</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>

