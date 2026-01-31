<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Restoran</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f7f7f7; 
            padding: 20px; 
        }
        .container { 
            max-width: 600px; 
            margin: auto; 
            background: #fff; 
            padding: 20px; 
            border: 1px solid #ccc; 
            border-radius: 5px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
        }
        input, select { 
            padding: 5px; 
            margin-bottom: 10px; 
            width: 200px; 
        }
        input[type="submit"] { 
            padding: 8px 20px; 
            cursor: pointer; 
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .rincian {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Menu Restoran</h2>
    <form method="POST" action="">
        <label>Pilihan Menu Makanan</label><br>
        <select name="food">
            <option value="Nasi Goreng">Nasi Goreng</option>
            <option value="Mie Ayam">Mie Ayam</option>
            <option value="Sate Ayam">Sate Ayam</option>
            <option value="Bubur Ayam">Bubur Ayam</option>
        </select><br>

        <label>Jumlah Pesanan</label><br>
        <input type="number" name="foodQty" min="0" value="0" required><br>

        <label>Pilihan Menu Minuman</label><br>
        <select name="drink">
            <option value="Air Mineral">Air Mineral</option>
            <option value="Es Jeruk">Es Jeruk</option>
            <option value="Es Teh">Es Teh</option>
            <option value="Milo">Milo</option>
        </select><br>

        <label>Jumlah Pesanan</label><br>
        <input type="number" name="drinkQty" min="0" value="0" required><br>

        <input type="submit" name="kirim" value="Kirim">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $food = $_POST['food'];
        $foodQty = (int)$_POST['foodQty'];
        $drink = $_POST['drink'];
        $drinkQty = (int)$_POST['drinkQty'];

        // Menggunakan struktur SWITCH untuk menentukan harga makanan
        switch ($food) {
            case 'Nasi Goreng':
                $hargaMakanan = 25000;
                break;
            case 'Mie Ayam':
                $hargaMakanan = 20000;
                break;
            case 'Sate Ayam':
                $hargaMakanan = 30000;
                break;
            case 'Bubur Ayam':
                $hargaMakanan = 15000;
                break;
            default:
                $hargaMakanan = 0;
        }

        // Menggunakan struktur SWITCH untuk menentukan harga minuman
        switch ($drink) {
            case 'Air Mineral':
                $hargaMinuman = 5000;
                break;
            case 'Es Jeruk':
                $hargaMinuman = 7000;
                break;
            case 'Es Teh':
                $hargaMinuman = 8000;
                break;
            case 'Milo':
                $hargaMinuman = 10000;
                break;
            default:
                $hargaMinuman = 0;
        }

        // Hitung subtotal
        $subtotalMakanan = $foodQty * $hargaMakanan;
        $subtotalMinuman = $drinkQty * $hargaMinuman;
        $totalBayar = $subtotalMakanan + $subtotalMinuman;

        // Tampilkan rincian pesanan
        echo "<div class='rincian'>";
        echo "<h3>Rincian Pesanan</h3>";
        echo "<p><strong>Makanan:</strong> $food x $foodQty → Rp" . number_format($subtotalMakanan, 0, ',', '.') . "</p>";
        echo "<p><strong>Minuman:</strong> $drink x $drinkQty → Rp" . number_format($subtotalMinuman, 0, ',', '.') . "</p>";
        echo "<p><strong>Total Bayar: Rp" . number_format($totalBayar, 0, ',', '.') . "</strong></p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>