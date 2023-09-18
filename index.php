<?php
require "koneksi.php";
require "function.php";

$tb_data_teman = query("SELECT * FROM tb_data_teman");
$id = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Teman</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        img {
            max-width: 120px; 
            height: auto;
        }

        .rectangular-button {
            background-color: #61764B; 
            color: #fff;
            border: none; 
            padding: 10px 20px; 
            border-radius: 5px;
            cursor: pointer;
        }
        .button-container {
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <h3>Data Teman</h3>
    <div class="button-container">
        <a href="tambah.php" class="rectangular-button">Tambah Teman</a> 
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php
        foreach($tb_data_teman as $teman) {
        ?>
            <tr>
                <td><?=$id++;?></td>
                <td><?=$teman->nama;?></td>
                <td><?=$teman->umur;?></td>
                <td>
                    <img src="<?=$teman->gambar;?>" alt="<?=$teman->nama;?>">
                </td>
                <td><?=$teman->deskripsi;?></td>
                <td>
                <a href="ubah.php?id=<?=$teman->id;?>" class="rectangular-button">Ubah</a>
                    <a href="hapus.php?id=<?=$teman->id;?>" class="rectangular-button">Hapus</a>
                </td>
                
                <script>
                function hapusData(id) {
                    var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data ini (ID: " + id + ")?");
                    if (konfirmasi) {
                        window.location.href = "hapus.php?id=" + id;
                    } else {

                    }
                    }
                </script>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
