<?php
require "koneksi.php";
require "function.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $teman = getById($id);

    if ($teman === null) {
        echo "Data teman tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Teman</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
    <h3>Ubah Teman</h3>
    <form action="proses_ubah.php" method="POST" enctype="multipart/form-data" class="container">
    <input type="hidden" name="id" value="<?=$teman->id;?>">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" value="<?=$teman->nama;?>" required>

    <label for="umur">Umur:</label>
    <input type="number" id="umur" name="umur" value="<?=$teman->umur;?>" required min="1">

    <label for="gambar_url">Gambar URL:</label>
    <input type="url" id="gambar_url" name="gambar_url" value="<?=$teman->gambar;?>" placeholder="URL gambar (optional)">

    <input type="file" id="customFile" class="custom-file-input" name="gambar" accept="image/*">
    <label class="custom-file-label" for="customFile">Choose File</label>

    <label for="deskripsi">Deskripsi:</label>
    <textarea id="deskripsi" name="deskripsi" rows="4" required><?=$teman->deskripsi;?></textarea>

    <div class="button-container">
        <button type="submit" class="rectangular-button">Ubah</button>
    </div>
</form>
</body>
</html>
