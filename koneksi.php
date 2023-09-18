<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "tb_data";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
