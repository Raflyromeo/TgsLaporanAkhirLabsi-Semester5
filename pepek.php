<!DOCTYPE html>
<html>
<head>
    <title>Contoh If</title>
</head>
<body>
    <form method="post">
        Masukkan usia: <input type="number" name="usia">
        <input type="submit" value="Cek">
    </form>

    <?php
    if (isset($_POST['usia'])) {
        $usia = $_POST['usia'];

        if ($usia > 17) {
            echo "<p>Anda sudah dewasa.</p>";
        }
    }
    ?>
</body>
</html>