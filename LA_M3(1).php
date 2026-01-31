<!DOCTYPE html>
<html>
<head>
    <title>Hitung Diskon Toko Online</title>
</head>
<body>
    <h2>Hitung Diskon Toko Online</h2>
    <form method="post" action="">
        Total Belanja (Rp): 
        <input type="number" name="total_belanja" required><br><br>
        Status Member:
        <select name="member">
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
        </select><br><br>
        <input type="submit" name="hitung" value="Hitung Diskon">
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $total_belanja = $_POST['total_belanja'];
        $member = $_POST['member'];
        $diskon = 0;

        if ($member == "Ya") {
            if ($total_belanja >= 500000) {
                $diskon = 0.20; 
            } elseif ($total_belanja >= 300000) {
                $diskon = 0.10; 
            } else {
                $diskon = 0.05; 
            }
        } else {
            if ($total_belanja >= 500000) {
                $diskon = 0.10; 
            } elseif ($total_belanja >= 300000) {
                $diskon = 0.05; 
            } else {
                $diskon = 0; 
            }
        }

        $total_bayar = $total_belanja - ($total_belanja * $diskon);

        echo '<hr>';
        echo '<p>Total Belanja: Rp' . number_format($total_belanja, 0, ',', '') . '</p>';
        echo '<p>Status Member: ' . $member . '</p>';
        echo '<p>Diskon: ' . ($diskon * 100) . '%</p>';
        echo '<p>Total Bayar: <b>Rp' . number_format($total_bayar, 0, ',', '') . '</b></p>';
    }
    ?>
</body>
</html>