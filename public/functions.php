<?php
//koneksi
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Cek koneksi
// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// } else {
//     echo "Koneksi berhasil!";
// }

//fungsi read
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//fungsi create
function create($data)
{
    global $conn;

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $stmt = mysqli_prepare($conn, "INSERT INTO mahasiswa (nrp, nama, email, jurusan, gambar) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $nrp, $nama, $email, $jurusan, $gambar);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
}

//fungsi delete
function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Fungsi update
function update($data)
{
    global $conn;

    $id = htmlspecialchars($data["id"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $stmt = mysqli_prepare($conn, "UPDATE mahasiswa SET nrp = ?, nama = ?, email = ?, jurusan = ?, gambar = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sssssi", $nrp, $nama, $email, $jurusan, $gambar, $id);
    mysqli_stmt_execute($stmt);
    $affectedRows = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

//fungsi search
function search($keyword)
{
    $query = "SELECT * FROM mahasiswa 
            WHERE
            nrp LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR 
            jurusan LIKE '%$keyword%'";

    return query($query);
}
