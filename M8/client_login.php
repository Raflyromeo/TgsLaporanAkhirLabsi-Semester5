<?php
$username = isset($_GET['username']) ? $_GET['username'] : "";
$password = isset($_GET['password']) ? $_GET['password'] : "";

$url = "http://localhost/la_romeo/M8/api_login.php?username=" . urlencode($username) . "&password=" . urlencode($password);

$response = file_get_contents($url);

if ($response === FALSE) {
    echo "Gagal menghubungi API";
    exit;
}

$data = json_decode($response, true);

echo "<h3>Hasil Login</h3>";
echo "Status : " . $data['status'] . "<br>";
echo "Pesan : " . $data['message'] . "<br>";

if ($data['status'] === "success") {
    echo "Username : " . $data['data']['username'] . "<br>";
    echo "Role : " . $data['data']['role'] . "<br>";
}
?>