<?php 

$conn = mysqli_connect("localhost", "root", "");
if ($conn) {
    echo "Koneksi Berhasil!";
} else {
    echo "Koneksi Gagal!";
}

?>