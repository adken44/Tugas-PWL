<?php
include '../koneksi.php';

$id_pelanggan = $_GET["id_pelanggan"];

$sql = "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'";

if ($conn->query($sql) === TRUE) {
  echo "<script>
          alert('Data pelanggan berhasil dihapus.');
          window.location.href = 'tampil_pelanggan.php';
        </script>";
} else {
  echo "<script>
          alert('Error: " . $sql . "<br>" . $conn->error . "');
          window.location.href = 'tampil_pelanggan.php';
        </script>";
}
?>