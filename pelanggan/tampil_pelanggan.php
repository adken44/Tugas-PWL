<?php
include '../koneksi.php';

$sql = "SELECT * FROM tb_pelanggan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <link rel="icon" href="favicon/favicon.png">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Data Pelanggan</h1>
        <a href="../index.php" class="btn btn-home">Home</a>
        <a href="input_pelanggan.php" class="btn">Tambah Data</a>

        <table id="pelangganTable">
            <thead>
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Tanggal Registrasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id_pelanggan"] . "</td>
                                <td>" . $row["nama_pelanggan"] . "</td>
                                <td>" . $row["alamat"] . "</td>
                                <td>" . $row["no_telepon"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["tanggal_registrasi"] . "</td>
                                <td>
                                    <a href='edit_pelanggan.php?id_pelanggan=" . $row["id_pelanggan"] . "' class='btn btn-edit'>Edit</a>
                                    <a href='hapus_pelanggan.php?id_pelanggan=" . $row["id_pelanggan"] . "' class='btn btn-delete'>Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>