<?php
include 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found";
        exit();
    }
} else {
    echo "ID not provided";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image/buku4.jpg');
            background-color: #f4f4f4;
            opacity: 0.8;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 50%;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            background-color: #f4f4f4; /* Warna latar belakang */
            opacity: 0.8;
            margin: 10px 0 5px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <form action="update_user_process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>

            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required>

            <label for="jk">JK</label>
            <select id="jk" name="jk" required>
                <option value="L" <?php echo ($row['jk'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="P" <?php echo ($row['jk'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
            </select>

            <label for="fakultas">Fakultas</label>
            <input type="text" id="fakultas" name="fakultas" value="<?php echo $row['fakultas']; ?>" required>

            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" value="<?php echo $row['kelas']; ?>" required>

            <label for="agama">Agama</label>
            <input type="text" id="agama" name="agama" value="<?php echo $row['agama']; ?>" required>

            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>

<?php
$koneksi->close();
?>
