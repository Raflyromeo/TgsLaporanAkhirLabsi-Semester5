<!DOCTYPE html>
<html>
<head>
    <title>Contoh Switch Case PHP</title>
</head>
<body>
    <h2>Contoh Program Switch Case</h2>
    <form method="post" action="">
        Pilih nomor:
        <select name="lulus">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <br><br>
        <input type="submit" value="Tampilkan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lulus = $_POST['lulus'];

        switch ($lulus) {
            case 1:
                echo "Lulus Sekolah Dasar";
                break;
            case 2:
                echo "Lulus Sekolah Menengah Pertama";
                break;
            case 3:
                echo "Lulus Sekolah Menengah Atas";
                break;
        }
    }
    ?>
</body>
</html>