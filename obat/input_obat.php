<?php
include '../koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_obat = $_POST["id_obat"];
  $nama_obat = $_POST["nama_obat"];
  $jenis_obat = $_POST["jenis_obat"];
  $harga_obat = $_POST["harga_obat"];
  $stok = $_POST["stok"];
  $tanggal_kadaluarsa = $_POST["tanggal_kadaluarsa"];

  $sql = "INSERT INTO tb_obat (id_obat, nama_obat, jenis_obat, harga_obat, stok, tanggal_kadaluarsa) 
          VALUES ('$id_obat', '$nama_obat', '$jenis_obat', '$harga_obat', '$stok', '$tanggal_kadaluarsa')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data obat berhasil ditambahkan.');
            window.location.href = 'tampil_obat.php';
          </script>";
  } else {
    echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'input_obat.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Obat</title>
    <link rel="icon" href="favicon/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Input Data Obat</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id_obat">ID Obat:</label>
            <input type="text" id="id_obat" name="id_obat" required>

            <label for="nama_obat">Nama Obat:</label>
            <input type="text" id="nama_obat" name="nama_obat" required>

            <label for="jenis_obat">Jenis Obat:</label>
            <input type="text" id="jenis_obat" name="jenis_obat" required>

            <label for="harga_obat">Harga Obat:</label>
            <input type="number" id="harga_obat" name="harga_obat" required>

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" required>

            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
            <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" required>

            <button type="submit">Simpan</button>
        </form>

        <a href="tampil_obat.php" class="btn-kembali">Kembali</a>
    </div>
</body>
</html>
