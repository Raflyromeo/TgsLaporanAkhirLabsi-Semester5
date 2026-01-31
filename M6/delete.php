<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM film WHERE id_film=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Film berhasil dihapus!');
            window.location.href='tampil.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus film!');
            window.location.href='tampil.php';
          </script>";
}
?>