<?php
include '../koneksi.php';

$id_obat = $_GET["id_obat"];

$sql = "DELETE FROM tb_obat WHERE id_obat='$id_obat'";

if ($conn->query($sql) === TRUE) {
  echo "<script>
          alert('Data obat berhasil dihapus.');
          window.location.href = 'tampil_obat.php';
        </script>";
} else {
  echo "<script>
          alert('Error: " . $sql . "<br>" . $conn->error . "');
          window.location.href = 'tampil_obat.php';
        </script>";
}
?>