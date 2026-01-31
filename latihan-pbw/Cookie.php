<?php
$batas = time() + 30; // Cookie berlaku selama 30 detik dari waktu dibuat
setcookie("KunjunganTerakhir", date('H:i:s'), $batas);

echo "Cookie telah dibuat, buka file CookieCek.php<br>";
echo "Untuk melihat hasilnya sebelum dan sesudah 30 detik.";
?>
