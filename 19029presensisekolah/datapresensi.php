<?php
include 'koneksi.php'; // Menggunakan koneksi.php yang telah dibuat sebelumnya

// Menyiapkan dan menjalankan query untuk mengambil semua data presensi
$query = "SELECT * FROM presensi";
$result = mysqli_query($conn, $query);

// Memeriksa apakah query berhasil
if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

// Mengambil semua data presensi
$presensi = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Menutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Sekolah</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Umum */
body {
    font-family: 'Poppins', sans-serif;
    background: #1f1f2e;
    color: #f1f1f1;
    line-height: 1.6;
}

/* Header */
header {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 2em;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 3px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

/* Sidebar */
#sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background: #1e1e2f;
    overflow-y: auto;
    transition: all 0.3s ease-in-out;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
}

#sidebar h2 {
    background: #27293d;
    color: #00c6ff;
    text-align: center;
    padding: 20px 0;
    font-size: 1.5em;
    border-bottom: 2px solid #00c6ff;
    letter-spacing: 1px;
    text-transform: uppercase;
}

#sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#sidebar ul li {
    position: relative;
}

#sidebar ul li a {
    display: block;
    color: #f1f1f1;
    text-decoration: none;
    padding: 15px 20px;
    font-size: 1.2em;
    border-bottom: 1px solid #333;
    transition: all 0.3s ease;
}

#sidebar ul li a:hover {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    color: white;
    padding-left: 30px;
    border-left: 5px solid #0072ff;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.3);
}

/* Content */
#content {
    margin-left: 270px;
    padding: 30px;
    background: #28293d;
    min-height: 100vh;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}

#content h1 {
    font-size: 2.5em;
    color: #00c6ff;
    margin-bottom: 20px;
    text-transform: uppercase;
}

#content p {
    font-size: 1.1em;
    line-height: 1.8;
    color: #cfcfcf;
}

/* Footer */
footer {
    background: #1e1e2f;
    color: white;
    text-align: center;
    padding: 15px 0;
    font-size: 1em;
    border-top: 2px solid #00c6ff;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.3);
}

/* Animasi interaktif */
#sidebar ul li a::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 5px;
    height: 100%;
    background: #00c6ff;
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

#sidebar ul li a:hover::before {
    transform: scaleY(1);
}

/* Responsif */
@media (max-width: 768px) {
    #sidebar {
        width: 200px;
    }

    #content {
        margin-left: 210px;
    }

    #sidebar ul li a {
        font-size: 1em;
    }
}

@media (max-width: 480px) {
    #sidebar {
        width: 100%;
        position: relative;
        height: auto;
    }

    #content {
        margin-left: 0;
    }

    #sidebar ul li {
        text-align: center;
    }
}
/* Tabel */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
    background: #fff;
    color: #333;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Header Tabel */
table thead th {
    background: #0072ff;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    padding: 15px;
}

/* Baris Tabel */
table tbody tr {
    border-bottom: 1px solid #dddddd;
}

table tbody tr:nth-of-type(even) {
    background-color: #f9f9f9;
}

table tbody tr:last-of-type {
    border-bottom: 2px solid #0072ff;
}

/* Sel Tabel */
table td, table th {
    padding: 15px;
}

/* Tombol Aksi */
table .btn {
    padding: 8px 15px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

/* Tombol Edit */
table .btn-edit {
    background: #ffc107;
    color: #333;
}

table .btn-edit:hover {
    background: #e0a800;
}

/* Tombol Hapus */
table .btn-delete {
    background: #dc3545;
    color: #fff;
}

table .btn-delete:hover {
    background: #b02a37;
}

/* Responsif */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }
}

</style>
<body>
    <h3 class="welcome-text text-center">PRESENSI SISWA XI RPL</h3><br>
    <div style="text-align: center;">
        <a href="add_presensi.php" class="btn btn-primary">Tambah Presensi</a>
        <table>
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($presensi as $row): ?>
                <tr>
               
                    <td><?= htmlspecialchars($row['nama_siswa']); ?></td>
                    <td><?= htmlspecialchars($row['tanggal']); ?></td>
                    <td><?= htmlspecialchars($row['status']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>  