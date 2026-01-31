<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator BMI</title>
</head>
<body>
    <h2>Kalkulator BMI</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="tinggi">Tinggi (cm):</label>
        <input type="number" name="tinggi" id="tinggi" step="0.1" required><br><br>

        <label for="berat">Berat Badan (kg):</label>
        <input type="number" name="berat" id="berat" step="0.1" required><br><br>

        <input type="submit" value="Hitung BMI">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $tinggi = $_POST['tinggi'];
        $berat = $_POST['berat'];

        // Ubah tinggi ke meter
        $tinggi_m = $tinggi / 100;

        // Hitung BMI
        $bmi = $berat / ($tinggi_m * $tinggi_m);

        // Tentukan kategori BMI
        if ($bmi < 18.5) {
            $kategori = "Kurus";
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $kategori = "Normal";
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $kategori = "Gemuk";
        } else {
            $kategori = "Obesitas";
        }

        echo "<h3>Halo, $nama</h3>";
        echo "BMI kamu: " . number_format($bmi, 2) . "<br>";
        echo "Kamu masuk kategori: <strong>$kategori</strong>";
    }
    ?>
</body>
</html>