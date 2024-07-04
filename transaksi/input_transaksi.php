<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Id_transaksi = $_POST["Id_transaksi"];
  $id_obat = $_POST["id_obat"];
  $id_pelanggan = $_POST["id_pelanggan"];
  $jumlah_obat = $_POST["jumlah_obat"];
  $total_harga = $_POST["total_harga"];
  $tanggal_transaksi = $_POST["tanggal_transaksi"];
  $metode_pembayaran = $_POST["metode_pembayaran"];

  $sql = "INSERT INTO tb_transaksi (Id_transaksi, id_obat, id_pelanggan, jumlah_obat, total_harga, tanggal_transaksi, metode_pembayaran) 
          VALUES ('$Id_transaksi', '$id_obat', '$id_pelanggan', '$jumlah_obat', '$total_harga', '$tanggal_transaksi', '$metode_pembayaran')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data transaksi berhasil ditambahkan.');
            window.location.href = 'tampil_transaksi.php';
          </script>";
  } else {
    echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'input_transaksi.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Transaksi</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Input Data Transaksi</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="Id_transaksi">ID Transaksi:</label>
            <input type="text" id="Id_transaksi" name="Id_transaksi" required>

            <label for="id_obat">ID Obat:</label>
            <select id="id_obat" name="id_obat" required>
                <?php
                $sql = "SELECT id_obat, nama_obat FROM tb_obat";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id_obat"] . "'>" . $row["nama_obat"] . "</option>";
                    }
                }
                ?>
            </select>

            <label for="id_pelanggan">ID Pelanggan:</label>
            <select id="id_pelanggan" name="id_pelanggan" required>
                <?php
                $sql = "SELECT id_pelanggan, nama_pelanggan FROM tb_pelanggan";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id_pelanggan"] . "'>" . $row["nama_pelanggan"] . "</option>";
                    }
                }
                ?>
            </select>

            <label for="jumlah_obat">Jumlah Obat:</label>
            <input type="number" id="jumlah_obat" name="jumlah_obat" required>

            <label for="total_harga">Total Harga:</label>
            <input type="number" id="total_harga" name="total_harga" required>

            <label for="tanggal_transaksi">Tanggal Transaksi:</label>
            <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" required>

            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="Tunai">Tunai</option>
                <option value="Debit">Debit</option>
                <option value="Kredit">Kredit</option>
            </select>

            <button type="submit">Simpan</button>
        </form>
        <a href="tampil_transaksi.php" class="btn-kembali">Kembali</a>
    </div>
</body>
</html>