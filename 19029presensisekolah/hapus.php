<?php
include 'koneksi.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $query = "DELETE FROM presensi WHERE id = $id"; 
   
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>