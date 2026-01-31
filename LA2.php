<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator BMI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h2, h3 {
            font-family: Georgia, serif;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="number"] {
            margin-top: 5px;
            margin-bottom: 10px;
            padding: 5px;
        }
        input[type="submit"] {
            padding: 6px 12px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Kalkulator BMI</h2>
    <form method="post" action="">
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Tinggi (cm):</label>
        <input type="number" name="tinggi" required>

        <label>Berat Badan (kg):</label>
        <input type="number" name="berat" required>

        <br>
        <input type="submit" value="Hitung BMI">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $tinggi = $_POST['tinggi'];
        $berat = $_POST['berat'];

        // Konversi tinggi dari cm ke meter
        $tinggi_m = $tinggi / 100;

        // Hitung BMI
        $bmi = $berat / ($tinggi_m * $tinggi_m);
        $bmi = round($bmi, 2);

        // Tentukan kategori BMI
        if ($bmi < 18.5) {
            $kategori = "Kurus";
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            $kategori = "Normal";
        } elseif ($bmi >= 25 && $bmi < 30) {
            $kategori = "Gemuk";
        } else {
            $kategori = "Obesitas";
        }

        echo "<h3>Halo, $nama</h3>";
        echo "BMI kamu: <strong>$bmi</strong><br>";
        echo "Kamu masuk kategori <strong>$kategori</strong>";
    }
    ?>
</body>
</html>