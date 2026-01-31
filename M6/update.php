<?php
include 'koneksi.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM film WHERE id_film=$id");
$film = mysqli_fetch_assoc($result);

if (!$film) {
    echo "<script>
            alert('Film tidak ditemukan!');
            window.location.href='tampil.php';
          </script>";
    exit;
}

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $tahun = $_POST['tahun_rilis'];
    $rating = $_POST['rating'];
    
    $sql = "UPDATE film SET judul='$judul', genre='$genre', tahun_rilis='$tahun', rating='$rating' WHERE id_film=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Film berhasil diupdate!');
                window.location.href='tampil.php';
              </script>";
    } else {
        echo "<script>alert('Gagal mengupdate film!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Film</title>
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
            background-color: #007bff;
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
        <h1>Edit Data Film</h1>
        
        <form method="POST">
            <table class="form-table">
                <tr>
                    <td>ID Film:</td>
                    <td><strong><?php echo $film['id_film']; ?></strong> (tidak bisa diubah)</td>
                </tr>
                <tr>
                    <td>Judul Film:</td>
                    <td><input type="text" name="judul" size="50" value="<?php echo $film['judul']; ?>" required></td>
                </tr>
                <tr>
                    <td>Genre:</td>
                    <td><input type="text" name="genre" size="30" value="<?php echo $film['genre']; ?>" required></td>
                </tr>
                <tr>
                    <td>Tahun Rilis:</td>
                    <td><input type="number" name="tahun_rilis" min="1900" max="2100" value="<?php echo $film['tahun_rilis']; ?>" required></td>
                </tr>
                <tr>
                    <td>Rating:</td>
                    <td><input type="number" step="0.1" name="rating" min="0" max="10" value="<?php echo $film['rating']; ?>" required></td>
                </tr>
            </table>
            <div class="button-group">
                <button type="submit" name="update">Update Film</button>
                <a href="tampil.php"><button type="button">Batal</button></a>
            </div>
        </form>
    </div>
</body>
</html>