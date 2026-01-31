<?php
include 'koneksi.php';

$sql = "SELECT * FROM film ORDER BY id_film ASC";
$films = mysqli_query($conn, $sql);

if (!$films) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Film</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
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
        .button-group {
            margin-bottom: 20px;
            text-align: center;
        }
        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .data-table th, .data-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .data-table th {
            background-color: #f8f9fa;
            color: #333;
        }
        .data-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .action-links a {
            text-decoration: none;
            margin: 0 5px;
            padding: 5px 10px;
            border-radius: 3px;
        }
        .edit-link {
            background-color: #ffc107;
            color: black;
        }
        .delete-link {
            background-color: #dc3545;
            color: white;
        }
        .total-film {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 4px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Semua Film</h1>

        <div class="button-group">
            <a href="index.php"><button class="btn-primary">Kembali ke Menu</button></a>
            <a href="input.php"><button class="btn-success">Tambah Film Baru</button></a>
        </div>

        <table class="data-table">
            <tr>
                <th>No</th>
                <th>ID Film</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>Tahun Rilis</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>

            <?php 
            $no = 1;
            while ($film = mysqli_fetch_assoc($films)): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $film['id_film']; ?></td>
                <td><?php echo $film['judul']; ?></td>
                <td><?php echo $film['genre']; ?></td>
                <td><?php echo $film['tahun_rilis']; ?></td>
                <td><?php echo $film['rating']; ?></td>
                <td class="action-links">
                    <a class="edit-link" href="update.php?id=<?php echo $film['id_film']; ?>">Edit</a>
                    <a class="delete-link" href="delete.php?id=<?php echo $film['id_film']; ?>" 
                       onclick="return confirm('Yakin ingin menghapus film ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>

            <?php if (mysqli_num_rows($films) == 0): ?>
            <tr>
                <td colspan="7" align="center">Belum ada data film</td>
            </tr>
            <?php endif; ?>
        </table>

        <div class="total-film">
            Total Film: <strong><?php echo mysqli_num_rows($films); ?></strong>
        </div>
    </div>
</body>
</html>