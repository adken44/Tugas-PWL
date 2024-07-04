<?php
include '../koneksi.php';

$sql = "SELECT * FROM tb_obat";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat</title>
    <link rel="icon" href="favicon/favicon.png">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    
</head>
<body>
    <div class="container">
        <h1>Data Obat</h1>

        <a href="../index.php" class="btn btn-home">Home</a>
        <a href="input_obat.php" class="btn">Tambah Data</a>

        <table id="obatTable">
            <thead>
                <tr>
                    <th>ID Obat</th>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Harga Obat</th>
                    <th>Stok</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id_obat"] . "</td>
                                <td>" . $row["nama_obat"] . "</td>
                                <td>" . $row["jenis_obat"] . "</td>
                                <td>" . $row["harga_obat"] . "</td>
                                <td>" . $row["stok"] . "</td>
                                <td>" . $row["tanggal_kadaluarsa"] . "</td>
                                <td>
                                    <a href='edit_obat.php?id_obat=" . $row["id_obat"] . "' class='btn btn-edit'>Edit</a>
                                    <a href='hapus_obat.php?id_obat=" . $row["id_obat"] . "' class='btn btn-delete'>Hapus</a>
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
