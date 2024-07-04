<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_pelanggan = $_POST["id_pelanggan"];
  $nama_pelanggan = $_POST["nama_pelanggan"];
  $alamat = $_POST["alamat"];
  $no_telepon = $_POST["no_telepon"];
  $email = $_POST["email"];
  $tanggal_registrasi = $_POST["tanggal_registrasi"];

  $sql = "UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', no_telepon='$no_telepon', email='$email', tanggal_registrasi='$tanggal_registrasi' WHERE id_pelanggan='$id_pelanggan'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data pelanggan berhasil diupdate.');
            window.location.href = 'tampil_pelanggan.php';
          </script>";
  } else {
    echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'edit_pelanggan.php?id_pelanggan=" . $id_pelanggan . "';
          </script>";
  }
}

$id_pelanggan = $_GET["id_pelanggan"];
$sql = "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Edit Data Pelanggan</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id_pelanggan" value="<?php echo $row["id_pelanggan"]; ?>">

            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $row["nama_pelanggan"]; ?>" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required><?php echo $row["alamat"]; ?></textarea>

            <label for="no_telepon">No. Telepon:</label>
            <input type="text" id="no_telepon" name="no_telepon" value="<?php echo $row["no_telepon"]; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>" required>

            <label for="tanggal_registrasi">Tanggal Registrasi:</label>
            <input type="date" id="tanggal_registrasi" name="tanggal_registrasi" value="<?php echo $row["tanggal_registrasi"]; ?>" required>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>