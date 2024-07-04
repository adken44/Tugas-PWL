<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_obat = $_POST["id_obat"];
  $nama_obat = $_POST["nama_obat"];
  $jenis_obat = $_POST["jenis_obat"];
  $harga_obat = $_POST["harga_obat"];
  $stok = $_POST["stok"];
  $tanggal_kadaluarsa = $_POST["tanggal_kadaluarsa"];

  $sql = "UPDATE tb_obat SET nama_obat='$nama_obat', jenis_obat='$jenis_obat', harga_obat='$harga_obat', stok='$stok', tanggal_kadaluarsa='$tanggal_kadaluarsa' WHERE id_obat='$id_obat'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data obat berhasil diupdate.');
            window.location.href = 'tampil_obat.php';
          </script>";
  } else {
    echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'edit_obat.php?id_obat=" . $id_obat . "';
          </script>";
  }
}

$id_obat = $_GET["id_obat"];
$sql = "SELECT * FROM tb_obat WHERE id_obat='$id_obat'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
    <link rel="icon" href="favicon/favicon.png">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Edit Data Obat</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id_obat" value="<?php echo $row["id_obat"]; ?>">

            <label for="nama_obat">Nama Obat:</label>
            <input type="text" id="nama_obat" name="nama_obat" value="<?php echo $row["nama_obat"]; ?>" required>

            <label for="jenis_obat">Jenis Obat:</label>
            <input type="text" id="jenis_obat" name="jenis_obat" value="<?php echo $row["jenis_obat"]; ?>" required>

            <label for="harga_obat">Harga Obat:</label>
            <input type="number" id="harga_obat" name="harga_obat" value="<?php echo $row["harga_obat"]; ?>" required>

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" value="<?php echo $row["stok"]; ?>" required>

            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
            <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="<?php echo $row["tanggal_kadaluarsa"]; ?>" required>

            <button type="submit">Simpan Perubahan</button>
        </form>
        
    </div>
</body>
</html>