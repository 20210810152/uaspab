<?php
include 'db_config.php';

// Fetch data from database
$sql = "SELECT * FROM users";
$result = $koneksi->query($sql);
$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prnginputan Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image/buku2.png'); /* Ganti 'background.jpg' dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h2 {
            text-align: center;
            
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang semi-transparan */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        .form-container label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambahkan Data Mahasiswa</h2>
        <form action="add_user.php" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>

            <label for="jk">Jenis Kelamin:</label>
            <input type="text" id="jk" name="jk" required>

            <label for="fakultas">Fakultas:</label>
            <input type="text" id="fakultas" name="fakultas" required>

            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" required>

            <label for="agama">Agama:</label>
            <input type="text" id="agama" name="agama" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <input type="submit" value="Add User">
        </form>
    </div>
</body>
</html>
