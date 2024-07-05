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

header('Content-Type: application/json');
echo json_encode($users);
?>
