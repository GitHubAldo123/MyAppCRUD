<?php
include 'auth_admin.php';
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];

    $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Username sudah digunakan.";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO admin (username, password, role) VALUES ('$username', '$hashed', '$role')");
        $success = "Akun berhasil dibuat.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buat Akun</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Buat Akun Baru</h1>

        <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
        <?php if (isset($success)) echo "<p class='text-green-600'>$success</p>"; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block mb-1">Username</label>
                <input type="text" name="username" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block mb-1">Password</label>
                <input type="password" name="password" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block mb-1">Role</label>
                <select name="role" required class="w-full border p-2 rounded">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="flex justify-between">
                <a href="index.php" class="text-gray-600 hover:underline">← Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Buat Akun</button>
            </div>
        </form>
    </div>
</body>
</html>
