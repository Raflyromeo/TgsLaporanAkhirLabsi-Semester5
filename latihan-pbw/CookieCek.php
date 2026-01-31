<?php
if (isset($_COOKIE['KunjunganTerakhir'])) {
    echo "Waktu kunjungan terakhir Anda: " . $_COOKIE['KunjunganTerakhir'];
} else {
    echo "Cookie belum tersedia atau sudah kedaluwarsa.";
}
?>
