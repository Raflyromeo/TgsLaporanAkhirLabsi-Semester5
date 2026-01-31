<!DOCTYPE html>
<html>
<head>
    <title>Database Film</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .menu-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .menu-table td {
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
        }
        .menu-table a {
            text-decoration: none;
            color: #0066cc;
            font-weight: bold;
            display: block;
        }
        .menu-table a:hover {
            color: #004499;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Manajemen Database Film</h1>
        
        <h3>Menu Utama</h3>
        <table class="menu-table">
            <tr>
                <td><a href="tampil.php">Lihat Semua Film</a></td>
            </tr>
            <tr>
                <td><a href="input.php">Tambah Film Baru</a></td>
            </tr>
        </table>
    </div>
</body>
</html>