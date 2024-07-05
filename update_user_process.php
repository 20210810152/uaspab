<?php
include 'db_config.php';

if (isset($_POST['id'], $_POST['nama'], $_POST['nim'], $_POST['jk'], $_POST['fakultas'], $_POST['kelas'], $_POST['agama'], $_POST['alamat'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jk = $_POST['jk'];
    $fakultas = $_POST['fakultas'];
    $kelas = $_POST['kelas'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];

    // Siapkan statement SQL menggunakan prepared statements
    if ($stmt = $koneksi->prepare("UPDATE users SET nama = ?, nim = ?, jk = ?, fakultas = ?, kelas = ?, agama = ?, alamat = ? WHERE id = ?")) {
        $stmt->bind_param("sssssssi", $nama, $nim, $jk, $fakultas, $kelas, $agama, $alamat, $id);
        if ($stmt->execute()) {
            header("Location: display_users.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $koneksi->error;
    }
} else {
    echo "All fields are required";
}

$koneksi->close();
?>
