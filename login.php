<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['admin'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        header('Location: index.php');
        exit;
    } else {
        $error = 'Username atau password salah';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login HRIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
<div class="bg-white p-6 rounded shadow-md w-96">
    <h1 class="text-2xl font-bold mb-4">Login HRIS</h1>
    <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
    <form method="POST" class="space-y-4">
        <input type="text" name="username" placeholder="Username" class="w-full border p-2 rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full border p-2 rounded" required>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
    </form>
    <p class="text-center text-sm mt-4">Belum punya akun? 
        <a href="register.php" class="text-blue-600 hover:underline">Create Akun</a>
    </p>
</div>
</body>
</html>
