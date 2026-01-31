<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $tahun = $_POST['tahun_rilis'];
    $rating = $_POST['rating'];
    
    $sql = "INSERT INTO film (judul, genre, tahun_rilis, rating) VALUES ('$judul', '$genre', '$tahun', '$rating')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Film berhasil ditambahkan!');
                window.location.href='tampil.php';
              </script>";
    } else {
        echo "<script>alert('Gagal menambahkan film!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Film Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
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
        .form-table {
            width: 100%;
            border-collapse: collapse;
        }
        .form-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .form-table input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .button-group {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"] {
            background-color: #28a745;
            color: white;
        }
        button[type="button"] {
            background-color: #6c757d;
            color: white;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Film Baru</h1>
        
        <form method="POST">
            <table class="form-table">
                <tr>
                    <td>Judul Film:</td>
                    <td><input type="text" name="judul" size="50" required></td>
                </tr>
                <tr>
                    <td>Genre:</td>
                    <td><input type="text" name="genre" size="30" required></td>
                </tr>
                <tr>
                    <td>Tahun Rilis:</td>
                    <td><input type="number" name="tahun_rilis" min="1900" max="2100" required></td>
                </tr>
                <tr>
                    <td>Rating:</td>
                    <td><input type="number" step="0.1" name="rating" min="0" max="10" required></td>
                </tr>
            </table>
            <div class="button-group">
                <button type="submit" name="tambah">Tambah Film</button>
                <a href="index.php"><button type="button">Kembali ke Menu</button></a>
                <a href="tampil.php"><button type="button">Lihat Data Film</button></a>
            </div>
        </form>
    </div>
</body>
</html>