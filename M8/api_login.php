<?php

// Set header untuk respons JSON
header('Content-Type: application/json');

// Data pengguna yang valid
$users = [
    [
        "username" => "admin",
        "password" => "12345",
        "role" => "administrator"
    ],
    [
        "username" => "user",
        "password" => "abcde",
        "role" => "member"
    ]
];

// Ambil data dari parameter GET
$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

// Inisialisasi respons
$response = [
    'status' => '',
    'message' => '',
    'status_code' => 0,
    'data' => null
];

// Validasi 1: Cek apakah username dan password diisi
if (empty($username) || empty($password)) {
    $response['status'] = 'error';
    $response['message'] = 'Username dan password harus diisi.';
    $response['status_code'] = 400;
    echo json_encode($response);
    exit;
}

// Validasi 2: Cek kecocokan username dan password
$login_success = false;
$user_data = null;

// Cek setiap pengguna dalam data
foreach ($users as $user) {
    if ($user['username'] === $username && $user['password'] === $password) {
        $login_success = true;
        $user_data = $user;
        break;
    }
}

// Jika login gagal, kirim respons gagal
if (!$login_success) {
    $response['status'] = 'failed';
    $response['message'] = 'Login gagal. Username atau password salah.';
    $response['status_code'] = 401;
    echo json_encode($response);
    exit;
}

// Jika login berhasil, kirim respons sukses
$response['status'] = 'success';
$response['message'] = 'Login berhasil!';
$response['status_code'] = 200;
$response['data'] = [
    'username' => $user_data['username'],
    'role' => $user_data['role']
];

// Kirim respons dalam format JSON
echo json_encode($response);
?>