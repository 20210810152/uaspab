<?php
include 'db_config.php';

$response = array();

// Periksa apakah semua variabel POST sudah diterima
if(isset($_POST['nama'], $_POST['nim'], $_POST['jk'], $_POST['fakultas'], $_POST['kelas'], $_POST['agama'], $_POST['alamat'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jk = $_POST['jk'];
    $fakultas = $_POST['fakultas'];
    $kelas = $_POST['kelas'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];

    // Siapkan statement SQL menggunakan prepared statements
    if ($stmt = $koneksi->prepare("INSERT INTO users (nama, nim, jk, fakultas, kelas, agama, alamat) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
        $stmt->bind_param("sssssss", $nama, $nim, $jk, $fakultas, $kelas, $agama, $alamat);
        if ($stmt->execute()) {
            header("Location: display_users.php");
            exit();
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error executing query: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error preparing statement: ' . $koneksi->error;
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'All fields are required';
}

$koneksi->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
