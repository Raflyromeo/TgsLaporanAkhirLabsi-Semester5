<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            font-weight: bold;
        }
        input[type="text"], 
        input[type="email"], 
        input[type="password"], 
        input[type="tel"] {
            width: 95%;
            padding: 8px;
            margin: 5px 0 15px 0;
        }
        input[type="submit"] {
            padding: 8px 20px;
            background-color: #e0e0e0;
            color: black;
            border: 1px solid #999;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #d0d0d0;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $jenisKelamin = $_POST['jenisKelamin'];
    
    echo '<div class="container">';
    echo '<h2>Data Berhasil Diterima</h2>';
    echo '<p><strong>Nama:</strong> ' . htmlspecialchars($nama) . '</p>';
    echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';
    echo '<p><strong>Nomor Telepon:</strong> ' . htmlspecialchars($telepon) . '</p>';
    echo '<p><strong>Jenis Kelamin:</strong> ' . htmlspecialchars($jenisKelamin) . '</p>';
    echo '<br><a href="">Kembali ke Form</a>';
    echo '</div>';
} else {
?>

<div class="container">
    <h2>Form Pendaftaran</h2>
    
    <form name="registrationForm" method="post" onsubmit="return validateForm(event)">
        Nama:<br>
        <input type="text" name="nama" id="nama">
        <span id="errorNama" class="error"></span><br>
        
        Email:<br>
        <input type="email" name="email" id="email">
        <span id="errorEmail" class="error"></span><br>
        
        Nomor Telepon:<br>
        <input type="tel" name="telepon" id="telepon">
        <span id="errorTelepon" class="error"></span><br>
        
        Password:<br>
        <input type="password" name="password" id="password">
        <span id="errorPassword" class="error"></span><br>
        
        Konfirmasi Password:<br>
        <input type="password" name="password2" id="password2">
        <span id="errorPassword2" class="error"></span><br>
        
        Jenis Kelamin:<br>
        <input type="radio" name="jenisKelamin" value="Laki-laki" id="lakiLaki"> Laki-laki
        <input type="radio" name="jenisKelamin" value="Perempuan" id="perempuan"> Perempuan
        <span id="errorJenisKelamin" class="error"></span><br><br>
        
        <input type="submit" value="Daftar">
    </form>
</div>

<script>
    function validateForm(event) {
        let nama = document.getElementById("nama").value.trim();
        let email = document.getElementById("email").value.trim();
        let telepon = document.getElementById("telepon").value.trim();
        let password = document.getElementById("password").value;
        let password2 = document.getElementById("password2").value;
        let jenisKelamin = document.querySelector('input[name="jenisKelamin"]:checked');

        let isValid = true;

        // Reset semua pesan error
        document.getElementById('errorNama').textContent = '';
        document.getElementById('errorEmail').textContent = '';
        document.getElementById('errorTelepon').textContent = '';
        document.getElementById('errorPassword').textContent = '';
        document.getElementById('errorPassword2').textContent = '';
        document.getElementById('errorJenisKelamin').textContent = '';

        // Validasi Nama
        if (nama === "") {
            document.getElementById('errorNama').textContent = 'Nama harus diisi.';
            isValid = false;
        } else if (nama.length < 3) {
            document.getElementById('errorNama').textContent = 'Nama minimal 3 huruf.';
            isValid = false;
        }

        // Validasi Email
        if (email === "") {
            document.getElementById('errorEmail').textContent = 'Email harus diisi.';
            isValid = false;
        } else if (!email.includes('@') || !email.includes('.')) {
            document.getElementById('errorEmail').textContent = 'Format email tidak valid.';
            isValid = false;
        }

        // Validasi Nomor Telepon
        if (telepon === "") {
            document.getElementById('errorTelepon').textContent = 'Nomor telepon harus diisi.';
            isValid = false;
        } else if (telepon.length < 10 || telepon.length > 13) {
            document.getElementById('errorTelepon').textContent = 'Nomor telepon harus 10-13 digit.';
            isValid = false;
        }

        // Validasi Password
        if (password === "") {
            document.getElementById('errorPassword').textContent = 'Password harus diisi.';
            isValid = false;
        } else if (password.length < 8) {
            document.getElementById('errorPassword').textContent = 'Password minimal 8 karakter.';
            isValid = false;
        }

        // Validasi Konfirmasi Password
        if (password2 === "") {
            document.getElementById('errorPassword2').textContent = 'Konfirmasi password harus diisi.';
            isValid = false;
        } else if (password2 !== password) {
            document.getElementById('errorPassword2').textContent = 'Konfirmasi harus sama dengan password.';
            isValid = false;
        }

        // Validasi Jenis Kelamin
        if (!jenisKelamin) {
            document.getElementById('errorJenisKelamin').textContent = 'Pilih jenis kelamin.';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
            return false;
        }
        
        alert("Proses Pendaftaran Berhasil!");
        return true;
    }
</script>

<?php
}
?>

</body>
</html>