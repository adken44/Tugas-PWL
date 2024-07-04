<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotik Rizal</title>
    <link rel="icon" href="favicon/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>

    <!-- MUHAMAD RIZAL_S6G_202143502816 -->

    <h1>Sistem Apotik</h1>

    <div class="menu">
        <a href="obat/tampil_obat.php">Obat
            <div class="submenu">
                <a href="obat/tambah_obat.php">Tambah Obat</a>
                <a href="obat/edit_obat.php">Edit Obat</a>
            </div>
        </a>
        <a href="pelanggan/tampil_pelanggan.php">Pelanggan
            <div class="submenu">
                <a href="pelanggan/tambah_pelanggan.php">Tambah Pelanggan</a>
                <a href="pelanggan/edit_pelanggan.php">Edit Pelanggan</a>
            </div>
        </a>
        <a href="transaksi/tampil_transaksi.php">Transaksi
            <div class="submenu">
                <a href="transaksi/tambah_transaksi.php">Tambah Transaksi</a>
                <a href="transaksi/edit_transaksi.php">Edit Transaksi</a>
            </div>
        </a>
    </div>

    <div id="tanggal"></div>
    <div id="waktu"></div>

    <script>
        $(document).ready(function() {
            var date = new Date();
            var tanggal = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
            var waktu = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
            $("#tanggal").text("Tanggal: " + tanggal);
            $("#waktu").text("Waktu: " + waktu);
        });
    </script>

</body>
</html>
