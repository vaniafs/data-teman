<?php
require "koneksi.php";
require "function.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $gambar = $_POST["gambar_url"];
    $deskripsi = $_POST["deskripsi"];

    $query = "UPDATE tb_data_teman
              SET nama = '$nama', umur = '$umur', gambar = '$gambar', deskripsi = '$deskripsi'
              WHERE id = $id";

    mysqli_query($koneksi, $query);

    header("Location: index.php");
    exit();
} else {
}
?>
