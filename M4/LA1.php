<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Nilai Mahasiswa</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 30px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h2, h3 { color: #333; margin-bottom: 20px; }
        h3 { font-size: 18px; font-weight: normal; }
        h4 { margin: 20px 0 10px 0; color: #555; font-size: 16px; }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
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
        }
        button:hover { background: #45a049; }
        .table-wrapper {
            overflow-x: auto;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            white-space: nowrap;
        }
        th {
            background: #f0f0f0;
            font-weight: bold;
            cursor: pointer;
            user-select: none;
        }
        th:hover { background: #e0e0e0; }
        tr:hover { background: #f9f9f9; }
        
        @media (max-width: 768px) {
            body { padding: 15px; }
            .container { padding: 20px; }
            input[type="text"], input[type="number"] { font-size: 16px; }
        }
        .grade-A { color: #4CAF50; font-weight: bold; }
        .grade-B { color: #2196F3; font-weight: bold; }
        .grade-C { color: #FF9800; font-weight: bold; }
        .grade-D { color: #F44336; font-weight: bold; }
        .grade-E { color: #F44336; font-weight: bold; }
        .status-lulus { color: #4CAF50; font-weight: bold; }
        .status-tidak { color: #F44336; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Simulasi Nilai Mahasiswa dengan Perulangan</h2>

        <?php
        if (isset($_POST['hitung_nilai'])) {
            $jumlah_mhs = count($_POST['nama']);
            $hasil = [];

            for ($i = 0; $i < $jumlah_mhs; $i++) {
                $nama = htmlspecialchars($_POST['nama'][$i]);
                $tugas = (int)$_POST['tugas'][$i];
                $uts = (int)$_POST['uts'][$i];
                $uas = (int)$_POST['uas'][$i];

                $nilai_akhir = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
                $nilai_akhir = round($nilai_akhir, 2);

                if ($nilai_akhir >= 85) $grade = 'A';
                elseif ($nilai_akhir >= 70) $grade = 'B';
                elseif ($nilai_akhir >= 60) $grade = 'C';
                elseif ($nilai_akhir >= 50) $grade = 'D';
                else $grade = 'E';

                $status = ($nilai_akhir >= 60) ? 'Lulus' : 'Tidak Lulus';

                $hasil[] = [
                    'no' => $i + 1, 'nama' => $nama, 'tugas' => $tugas,
                    'uts' => $uts, 'uas' => $uas, 'nilai_akhir' => $nilai_akhir,
                    'grade' => $grade, 'status' => $status
                ];
            }

            echo "<h3>Hasil Perhitungan Nilai Mahasiswa</h3>";
            echo "<div class='table-wrapper'>";
            echo "<table><thead><tr>";
            echo "<th onclick='sortTable(0)'>No</th>";
            echo "<th onclick='sortTable(1)'>Nama</th>";
            echo "<th onclick='sortTable(2)'>Tugas</th>";
            echo "<th onclick='sortTable(3)'>UTS</th>";
            echo "<th onclick='sortTable(4)'>UAS</th>";
            echo "<th onclick='sortTable(5)'>Nilai Akhir</th>";
            echo "<th onclick='sortTable(6)'>Grade</th>";
            echo "<th onclick='sortTable(7)'>Status</th>";
            echo "</tr></thead><tbody>";

            foreach ($hasil as $data) {
                $gradeClass = 'grade-' . $data['grade'];
                $statusClass = $data['status'] == 'Lulus' ? 'status-lulus' : 'status-tidak';
                
                echo "<tr>";
                echo "<td>{$data['no']}</td>";
                echo "<td>{$data['nama']}</td>";
                echo "<td>{$data['tugas']}</td>";
                echo "<td>{$data['uts']}</td>";
                echo "<td>{$data['uas']}</td>";
                echo "<td><b>{$data['nilai_akhir']}</b></td>";
                echo "<td class='{$gradeClass}'>{$data['grade']}</td>";
                echo "<td class='{$statusClass}'>{$data['status']}</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";

        } elseif (isset($_POST['jumlah_mhs']) && $_POST['jumlah_mhs'] > 0) {
            $jumlah_mhs = (int)$_POST['jumlah_mhs'];
            
            echo "<h3>Input Nilai Mahasiswa ($jumlah_mhs orang)</h3>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='hitung_nilai' value='1'>";

            for ($i = 0; $i < $jumlah_mhs; $i++) {
                echo "<h4>Mahasiswa ke-" . ($i + 1) . "</h4>";
                echo "Nama: <input type='text' name='nama[]' required><br>";
                echo "Nilai Tugas: <input type='number' name='tugas[]' min='0' max='100' required><br>";
                echo "Nilai UTS: <input type='number' name='uts[]' min='0' max='100' required><br>";
                echo "Nilai UAS: <input type='number' name='uas[]' min='0' max='100' required><br>";
            }
            
            echo "<button type='submit'>Hitung Nilai</button></form>";
            
        } else {
            echo "<h3>Masukkan jumlah mahasiswa:</h3>";
            echo "<form method='post'>";
            echo "<input type='number' name='jumlah_mhs' min='1' required style='width:200px;'><br>";
            echo "<button type='submit'>Selanjutnya</button>";
            echo "</form>";
        }
        ?>
    </div>

    <script>
        function sortTable(col) {
            const table = document.querySelector('table');
            const rows = Array.from(table.querySelectorAll('tbody tr'));
            const isAsc = table.querySelectorAll('th')[col].classList.contains('asc');
            
            rows.sort((a, b) => {
                const aVal = a.cells[col].textContent.trim();
                const bVal = b.cells[col].textContent.trim();
                const aNum = parseFloat(aVal);
                const bNum = parseFloat(bVal);
                
                if (!isNaN(aNum) && !isNaN(bNum)) {
                    return isAsc ? bNum - aNum : aNum - bNum;
                }
                return isAsc ? bVal.localeCompare(aVal) : aVal.localeCompare(bVal);
            });
            
            rows.forEach(row => table.querySelector('tbody').appendChild(row));
            
            table.querySelectorAll('th').forEach(th => th.classList.remove('asc', 'desc'));
            table.querySelectorAll('th')[col].classList.toggle('asc', !isAsc);
            table.querySelectorAll('th')[col].classList.toggle('desc', isAsc);
        }
    </script>
</body>
</html>