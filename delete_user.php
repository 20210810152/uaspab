<?php
include 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Siapkan statement SQL menggunakan prepared statements
    if ($stmt = $koneksi->prepare("DELETE FROM users WHERE id = ?")) {
        $stmt->bind_param("i", $id);
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
    echo "ID not provided";
}

$koneksi->close();
?>
