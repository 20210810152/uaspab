<?php
include 'db_config.php';

$sql = "SELECT * FROM users";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image/buku5.jpg');
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }
        .btn-update {
            background-color: #4CAF50;
        }
        .btn-delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>JK</th>
                    <th>Fakultas</th>
                    <th>Kelas</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['nim'] . "</td>";
                        echo "<td>" . $row['jk'] . "</td>";
                        echo "<td>" . $row['fakultas'] . "</td>";
                        echo "<td>" . $row['kelas'] . "</td>";
                        echo "<td>" . $row['agama'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>";
                        echo "<a href='update_user.php?id=" . $row['id'] . "' class='btn btn-update'>Update</a>";
                        echo "<a href='delete_user.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$koneksi->close();
?>
