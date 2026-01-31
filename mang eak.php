<!DOCTYPE html>
<html>
<head>
    <title>Contoh If Else</title>
</head>
<body>
    <form method="post">
        Masukkan angka: <input type="number" name="angka">
        <input type="submit" value="Cek">
    </form>

    <?php
    if (isset($_POST['angka'])) {
        $angka = $_POST['angka'];

        if ($angka % 2 == 0) {
            echo "<p>Wah, ternyata angka $angka adalah bilangan GENAP.</p>";
        } else {
            echo "<p>Ohh, angka $angka adalah bilangan GANJIL.</p>";
        }
    }
    ?>
</body>
</html>