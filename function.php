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
function hapusData($id) {
    global $koneksi;

    $query = "DELETE FROM tb_data_teman WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function getById($id) {
    global $koneksi;

    $query = "SELECT * FROM tb_data_teman WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_object($result);
    } else {
        return null; 
    }
}
?>
