<?php
require "koneksi.php";
require "function.php";

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $deskripsi = $_POST["deskripsi"];

    $gambar_url = "";

    if ($_FILES["gambar"]["name"]) {
        $gambar_name = $_FILES["gambar"]["name"];
        $gambar_tmp = $_FILES["gambar"]["tmp_name"];
        $gambar_url = "uploads/" . $gambar_name;

        move_uploaded_file($gambar_tmp, $gambar_url);
    } elseif (!empty($_POST["gambar_url"])) {
        $gambar_url = $_POST["gambar_url"];
    }

    if (empty($nama) || empty($umur) || empty($deskripsi)) {
        echo "<script>
                alert('Semua data harus diisi');
                window.location.href = 'tambah.php';
            </script>";
    } else {
        $data = [
            "nama" => $nama,
            "umur" => $umur,
            "gambar" => $gambar_url,
            "deskripsi" => $deskripsi
        ];

        if (tambah($data) > 0) {
            echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan');
                window.location.href = 'index.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Teman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 80%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"], input[type="number"], input[type="url"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="number"] {
            min: 1; 
        }

        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .rectangular-button {
            background-color: #61764B;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .custom-file-input {
            display: none;
        }

        .custom-file-label {
            background-color: #61764B;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #gambar-preview {
            max-width: 120px;
            height: auto;
        }

        .remove-image {
            display: none;
            color: red;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Tambah Teman</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="umur">Umur:</label>
            <input type="number" id="umur" name="umur" required min="1">

            <label for="gambar_url">Gambar URL (opsional):</label>
            <input type="url" id="gambar_url" name="gambar_url" placeholder="URL gambar (opsional)">

            <input type="file" id="customFile" class="custom-file-input" name="gambar" accept="image/*">
            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
            
            <img id="gambar-preview" src="" alt="">
            <span id="remove-image" class="remove-image" onclick="removeImage()">Hapus Gambar</span>
            
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>

            <div class="button-container">
                <button type="submit" name="submit" class="rectangular-button">Tambahkan</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage() {
            var fileInput = document.getElementById('customFile');
            var gambarPreview = document.getElementById('gambar-preview');
            var removeImage = document.getElementById('remove-image');
            
            fileInput.addEventListener('change', function () {
                var file = fileInput.files[0];
                var reader = new FileReader();

                reader.onload = function () {
                    gambarPreview.src = reader.result;
                    removeImage.style.display = 'inline'; // Menampilkan tombol hapus gambar
                }

                if (file) {
                    reader.readAsDataURL(file);
                }
            });
        }

        function removeImage() {
            var fileInput = document.getElementById('customFile');
            var gambarPreview = document.getElementById('gambar-preview');
            var gambarUrl = document.getElementById('gambar_url');
            var removeImage = document.getElementById('remove-image');

            fileInput.value = ''; 
            gambarPreview.src = ''; 
            removeImage.style.display = 'none'; 
            gambarUrl.value = ''; 
        }

        previewImage();
    </script>
</body>
</html>
