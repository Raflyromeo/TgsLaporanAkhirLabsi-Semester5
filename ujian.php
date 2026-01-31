<!DOCTYPE html>
<html>
<head>
    <title>Contoh If Elseif Else</title>
</head>
<body>
    <form method="get">
        Masukkan nilai ujian: <input type="number" name="nilai">
        <input type="submit" value="Cek Nilai">
    </form>

    <?php
    if (isset($_GET['nilai'])) {
        $nilai = $_GET['nilai'];

        if ($nilai >= 90) {
            echo "<p>Nilai ujian kamu Sangat Baik!</p>";
        } elseif ($nilai >= 75) {
            echo "<p>Nilai ujian kamu Baik!</p>";
        } elseif ($nilai >= 60) {
            echo "<p>Nilai ujian kamu Cukup, tingkatkan lagi ya!</p>";
        } else {
            echo "<p>Nilai ujian kamu Kurang, tingkatkan lagi ya!</p>";
        }
    }
    ?>
</body>
</html>