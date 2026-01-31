<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Restoran</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        h2 { margin-top: 0; border-bottom: 2px solid #333; padding-bottom: 10px; }
        label { display: block; margin: 10px 0 5px; }
        input, select { padding: 5px; margin-bottom: 15px; width: 100%; max-width: 300px; box-sizing: border-box; }
        input[type="submit"] { padding: 8px 20px; cursor: pointer; background-color: #e0e0e0; color: #000; border: 1px solid #999; border-radius: 3px; width: auto; }
        .rincian { margin-top: 30px; padding-top: 20px; border-top: 2px solid #333; }
        .rincian h3 { margin-top: 0; margin-bottom: 15px; }
        .rincian p { margin: 8px 0; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h2>Menu Restoran</h2>
    <form method="POST" action="">
        <label>Pilihan Menu Makanan</label>
        <select name="food" id="food">
            <option value="Nasi Goreng">Nasi Goreng</option>
            <option value="Mie Ayam">Mie Ayam</option>
            <option value="Sate Ayam">Sate Ayam</option>
            <option value="Bubur Ayam">Bubur Ayam</option>
        </select>
        <label>Jumlah Pesanan</label>
        <input type="number" name="foodQty" id="foodQty" min="0" value="0">
        <label>Pilihan Menu Minuman</label>
        <select name="drink" id="drink">
            <option value="Air Mineral">Air Mineral</option>
            <option value="Es Jeruk">Es Jeruk</option>
            <option value="Es Teh">Es Teh</option>
            <option value="Milo">Milo</option>
        </select>
        <label>Jumlah Pesanan</label>
        <input type="number" name="drinkQty" id="drinkQty" min="0" value="0">
        <input type="submit" name="submit" value="Kirim">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $food = $_POST['food'];
        $foodQty = (int)$_POST['foodQty'];
        $drink = $_POST['drink'];
        $drinkQty = (int)$_POST['drinkQty'];
        
        // List Harga Makanan
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
        
        // List Harga Minuman
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
        
        $subtotalMakanan = $foodQty * $hargaMakanan;
        $subtotalMinuman = $drinkQty * $hargaMinuman;
        $totalBayar = $subtotalMakanan + $subtotalMinuman;
        
        function formatRupiah($angka) {
            return 'Rp' . number_format($angka, 0, ',', '.');
        }
        
        echo '<div class="rincian">';
        echo '<h3>Rincian Pesanan</h3>';
        echo '<p>Makanan: ' . $food . ' x ' . $foodQty . ' → ' . formatRupiah($subtotalMakanan) . '</p>';
        echo '<p>Minuman: ' . $drink . ' x ' . $drinkQty . ' → ' . formatRupiah($subtotalMinuman) . '</p>';
        echo '<p class="total">Total Bayar: ' . formatRupiah($totalBayar) . '</p>';
        echo '</div>';
    }
    ?>
</div>
</body>
</html>