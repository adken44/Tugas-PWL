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

  $sql = "UPDATE tb_transaksi SET id_obat='$id_obat', id_pelanggan='$id_pelanggan', jumlah_obat='$jumlah_obat', total_harga='$total_harga', tanggal_transaksi='$tanggal_transaksi', metode_pembayaran='$metode_pembayaran' WHERE Id_transaksi='$Id_transaksi'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data transaksi berhasil diupdate.');
            window.location.href = 'tampil_transaksi.php';
          </script>";
  } else {
    echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'edit_transaksi.php?Id_transaksi=" . $Id_transaksi . "';
          </script>";
  }
}

$Id_transaksi = $_GET["Id_transaksi"];
$sql = "SELECT * FROM tb_transaksi WHERE Id_transaksi='$Id_transaksi'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Edit Data Transaksi</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="Id_transaksi" value="<?php echo $row["Id_transaksi"]; ?>">

            <label for="id_obat">ID Obat:</label>
            <select id="id_obat" name="id_obat" required>
                <?php
                $sql = "SELECT id_obat, nama_obat FROM tb_obat";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row2 = $result->fetch_assoc()) {
                        if ($row2["id_obat"] == $row["id_obat"]) {
                            echo "<option value='" . $row2["id_obat"] . "' selected>" . $row2["nama_obat"] . "</option>";
                        } else {
                            echo "<option value='" . $row2["id_obat"] . "'>" . $row2["nama_obat"] . "</option>";
                        }
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
                    while($row2 = $result->fetch_assoc()) {
                        if ($row2["id_pelanggan"] == $row["id_pelanggan"]) {
                            echo "<option value='" . $row2["id_pelanggan"] . "' selected>" . $row2["nama_pelanggan"] . "</option>";
                        } else {
                            echo "<option value='" . $row2["id_pelanggan"] . "'>" . $row2["nama_pelanggan"] . "</option>";
                        }
                    }
                }
                ?>
            </select>

            <label for="jumlah_obat">Jumlah Obat:</label>
            <input type="number" id="jumlah_obat" name="jumlah_obat" value="<?php echo $row["jumlah_obat"]; ?>" required>

            <label for="total_harga">Total Harga:</label>
            <input type="number" id="total_harga" name="total_harga" value="<?php echo $row["total_harga"]; ?>" required>

            <label for="tanggal_transaksi">Tanggal Transaksi:</label>
            <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" value="<?php echo $row["tanggal_transaksi"]; ?>" required>

            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="Tunai">Tunai</option>
                <!-- Tambahkan pilihan metode pembayaran lain jika diperlukan -->
            </select>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
