<!DOCTYPE html>
<html>
<head>
    <title>Kondisi Pada PHP</title>
</head>
<body>
    <h2>Contoh Nested If</h2>
    <form method="post">
        Masukkan umur anda <input type="text" name="umur"><br><br>
        Masukkan status anda
        <select name="status">
            <option value="menikah">Sudah Menikah</option>
            <option value="belumMenikah">Belum Menikah</option>
        </select><br><br>
        <input type="submit" value="Cek"><br><br>
    </form>

    <?php
    if (isset($_POST['umur']) && isset($_POST['status'])) {
        $umur = $_POST['umur'];
        $status = $_POST['status'];

        if ($umur >= 18) {
            if ($status == "menikah") {
                echo "Selamat datang pak!";
            } else {
                echo "Selamat datang wahai pemuda!";
            }
        } else {
            echo "Maaf website ini hanya untuk yang sudah berumur 18+";
        }
    }
    ?>
</body>
</html>