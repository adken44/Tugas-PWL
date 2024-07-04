<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_pelanggan = $_POST["id_pelanggan"];
  $nama_pelanggan = $_POST["nama_pelanggan"];
  $alamat = $_POST["alamat"];
  $no_telepon = $_POST["no_telepon"];
  $email = $_POST["email"];
  $tanggal_registrasi = $_POST["tanggal_registrasi"];

  $sql = "INSERT INTO tb_pelanggan (id_pelanggan, nama_pelanggan, alamat, no_telepon, email, tanggal_registrasi) 
          VALUES ('$id_pelanggan', '$nama_pelanggan', '$alamat', '$no_telepon', '$email', '$tanggal_registrasi')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data pelanggan berhasil ditambahkan.');
            window.location.href = 'tampil_pelanggan.php';
          </script>";
  } else {
    echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'input_pelanggan.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pelanggan</title>
    <link rel="icon" href="favicon/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Input Data Pelanggan</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="id_pelanggan">ID Pelanggan:</label>
    <input type="text" id="id_pelanggan" name="id_pelanggan" class="input-pelanggan" required>

  <label for="nama_pelanggan">Nama Pelanggan:</labe>
  <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="input-pelanggan" required>

  <label for="alamat">Alamat:</label>
  <textarea id="alamat" name="alamat" class="input-pelanggan" required></textarea>

  <label for="no_telepon">No. Telepon:</label>
  <input type="text" id="no_telepon" name="no_telepon" class="input-pelanggan" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" class="input-pelanggan" required>

  <label for="tanggal_registrasi">Tanggal Registrasi:</label>
  <input type="date" id="tanggal_registrasi" name="tanggal_registrasi" class="input-pelanggan" required>

  <button type="submit">Simpan</button>
        </form>
        <a href="tampil_pelanggan.php" class="btn-kembali">Kembali</a>
    </div>
</body>
</html>