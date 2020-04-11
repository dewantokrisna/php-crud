<?php
$connect = mysqli_connect("192.168.137.2", "root", "dewa12345", "learn");

function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $connect;
    // ambil data dari tiap elemen dalam form
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO mahasiswa
                VALUES
                (null, '$nama', '$nim', '$email', '$jurusan', '$gambar')";
    // query insert data
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function hapus($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($connect);
}
