<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        echo "<h2>Data Login</h2>";
        echo "Username anda adalah: $username<br>";
        echo "Password anda adalah: $password<br><br>";
        echo "<a href='{$_SERVER['PHP_SELF']}'>Kembali ke Form</a>";
    } else {
    ?>
    
    <h2>Form Login</h2>
    <form name="popupForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
        Username: <br>
        <input type="text" name="username"><br><br>
        Password: <br>
        <input type="password" name="password"><br><br>
        <input type="submit" name="kirim" value="Login">
    </form>
    
    <?php } ?>
    
    <script>
        function validateForm(){
            let username = document.forms['popupForm']['username'].value;
            let password = document.forms['popupForm']['password'].value;

            if (username === "") {
                alert("Username tidak boleh kosong");
                return false;
            }
            
            if (password === "") {
                alert("Password tidak boleh kosong");
                return false;
            }

            if (password.length < 8) {
                alert("Password minimal 8 karakter");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>