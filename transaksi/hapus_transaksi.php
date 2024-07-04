<?php
include '../koneksi.php';

$Id_transaksi = $_GET["Id_transaksi"];

$sql = "DELETE FROM tb_transaksi WHERE Id_transaksi='$Id_transaksi'";

if ($conn->query($sql) === TRUE) {
  echo "<script>
          alert('Data transaksi berhasil dihapus.');
          window.location.href = 'tampil_transaksi.php';
        </script>";
} else {
  echo "<script>
          alert('Error: ". $sql. "<br>". $conn->error. "');
          window.location.href = 'tampil_transaksi.php';
        </script>";
}
?>