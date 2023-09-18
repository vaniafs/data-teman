<?php
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_object($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $koneksi;

    $nama = $data["nama"];
    $umur = $data["umur"];
    $gambar = $data["gambar"];
    $deskripsi = $data["deskripsi"];

    $query = "INSERT INTO tb_data_teman (nama, umur, gambar, deskripsi)
            VALUES ('$nama', '$umur', '$gambar', '$deskripsi')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>
