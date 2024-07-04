<?php
include '../koneksi.php';

$sql = "SELECT * FROM tb_transaksi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="icon" href="favicon/favicon.png">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Data Transaksi</h1>
        <a href="../index.php" class="btn btn-home">Home</a>
        <a href="input_transaksi.php" class="btn">Tambah Data</a>

        <table id="transaksiTable">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>ID Obat</th>
                    <th>ID Pelanggan</th>
                    <th>Jumlah Obat</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                    <th>Metode Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["Id_transaksi"] . "</td>
                                <td>" . $row["id_obat"] . "</td>
                                <td>" . $row["id_pelanggan"] . "</td>
                                <td>" . $row["jumlah_obat"] . "</td>
                                <td>" . $row["total_harga"] . "</td>
                                <td>" . $row["tanggal_transaksi"] . "</td>
                                <td>" . $row["metode_pembayaran"] . "</td>
                                <td>
                                    <a href='edit_transaksi.php?Id_transaksi=" . $row["Id_transaksi"] . "' class='btn btn-edit'>Edit</a>
                                    <a href='hapus_transaksi.php?Id_transaksi=" . $row["Id_transaksi"] . "' class='btn btn-delete'>Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>