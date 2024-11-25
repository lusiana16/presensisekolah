<?php


$host = 'localhost';
$dbname = '19029_psas';
$username = 'root'; 
$password = '';  

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>