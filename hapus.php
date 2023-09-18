<?php
require "koneksi.php";
require "function.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if (hapusData($id) > 0) {
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'index.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Data gagal dihapus');
                window.location.href = 'index.php';
              </script>";
        exit();
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan.');
            window.location.href = 'index.php';
          </script>";
    exit();
}
?>
