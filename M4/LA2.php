<?php
session_start();

if (!isset($_SESSION['data_buku'])) {
    $_SESSION['data_buku'] = [];
}

$data_buku = $_SESSION['data_buku'];
$pesan_status = "";

if (isset($_POST['tambah_buku'])) {
    $kategori = htmlspecialchars($_POST['kategori']);
    $judul = htmlspecialchars($_POST['judul_buku']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $tahun = (int)$_POST['tahun_terbit'];

    if (!empty($judul) && !empty($penulis) && $tahun > 1900) {
        if (!isset($_SESSION['data_buku'][$kategori])) {
            $_SESSION['data_buku'][$kategori] = [];
        }
        
        $_SESSION['data_buku'][$kategori][] = [$judul, $penulis, $tahun];

        header("Location: " . $_SERVER['PHP_SELF'] . "?status=success&judul=" . urlencode($judul) . "&kategori=" . urlencode($kategori));
        exit();
    } else {
         header("Location: " . $_SERVER['PHP_SELF'] . "?status=error");
         exit();
    }
}

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success' && isset($_GET['judul']) && isset($_GET['kategori'])) {
        $judul = htmlspecialchars($_GET['judul']);
        $kategori = htmlspecialchars($_GET['kategori']);
        $pesan_status = "<div class='message success'>Input berhasil! Buku '$judul' udah tersimpan di kategori $kategori.</div>";
    } elseif ($_GET['status'] == 'error') {
        $pesan_status = "<div class='message error'>Gagal input data buku. Coba periksa lagi, jangan ada yang null.</div>";
    }
}

$data_buku = $_SESSION['data_buku'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku Perpustakaan</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 30px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            gap: 30px;
        }
        .form-section {
            flex: 1;
            max-width: 350px;
            background: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .table-section {
            flex: 2;
            background: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h3 {
            color: #333;
            margin-bottom: 20px;
            font-size: 20px;
        }
        h4 {
            color: #555;
            margin: 25px 0 15px 0;
            font-size: 18px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 14px;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 20px;
            width: 100%;
        }
        button:hover { background: #45a049; }
        .table-wrapper {
            overflow-x: auto;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f0f0f0;
            font-weight: bold;
        }
        td:nth-child(2) {
            text-align: left;
        }
        tr:hover { background: #f9f9f9; }
        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 3px;
            font-weight: bold;
        }
        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
        @media (max-width: 968px) {
            .container {
                flex-direction: column;
            }
            .form-section {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    
    <div class="form-section">
        <h3>Tambah Buku Baru</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <label for="kategori">Kategori:</label>
            <select id="kategori" name="kategori" required>
                <?php 
                if (!empty($_SESSION['data_buku'])) {
                    $semua_kategori = array_keys($_SESSION['data_buku']);
                    foreach (array_unique($semua_kategori) as $k) {
                        echo "<option value=\"$k\">$k</option>";
                    }
                }
                echo "<option value=\"Komputer\">Komputer</option>";
                echo "<option value=\"Novel\">Novel</option>";
                echo "<option value=\"Pengembangan Diri\">Pengembangan Diri</option>";
                echo "<option value=\"Ebook\">Ebook</option>";
                ?>
            </select>

            <label for="judul_buku">Judul Buku:</label>
            <input type="text" id="judul_buku" name="judul_buku" required>

            <label for="penulis">Penulis:</label>
            <input type="text" id="penulis" name="penulis" required>

            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" required min="1900" max="<?php echo date("Y"); ?>">

            <button type="submit" name="tambah_buku">Tambah Buku</button>
        </form>
    </div>

    <div class="table-section">
        <h3>Daftar Buku Perpustakaan</h3>
        
        <?php echo $pesan_status; ?>

        <?php
        if (empty($data_buku)) {
            echo "<div class='empty-state'>Wah, rak bukunya masih kosong 😅 Tambah buku baru dulu yuk!</div>";
        } else {
            foreach ($data_buku as $kategori => $daftar_buku) {
                if (empty($daftar_buku)) continue;

                echo "<h4>Kategori: " . $kategori . "</h4>";
                
                echo "<div class='table-wrapper'>";
                echo "<table>";
                echo "<tr><th>No</th><th>Judul Buku</th><th>Penulis</th><th>Tahun Terbit</th></tr>";
                
                $nomor = 1;
                foreach ($daftar_buku as $buku) {
                    echo "<tr>";
                    echo "<td>" . $nomor++ . "</td>";
                    echo "<td>" . $buku[0] . "</td>"; 
                    echo "<td>" . $buku[1] . "</td>";
                    echo "<td>" . $buku[2] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            }
        }
        ?>
    </div>

</div>

</body>
</html>