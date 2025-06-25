<?php
include 'auth_user.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard HRIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Selamat Datang di HRIS</h1>
            <p class="text-gray-700">Login sebagai: <strong><?= $_SESSION['admin']; ?></strong> (<?= $_SESSION['role']; ?>)</p>
        </div>
        <div class="space-x-2">
            <a href="ubah_password.php" class="bg-yellow-600 text-white px-3 py-2 rounded hover:bg-yellow-700">🔑 Ubah Password</a>
            <a href="logout.php" class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-700">👋 Logout</a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="karyawan/tambah.php" class="block bg-blue-600 text-white p-4 rounded hover:bg-blue-700">➕ Tambah Karyawan</a>
            <a href="jabatan/list.php" class="block bg-purple-600 text-white p-4 rounded hover:bg-purple-700">📋 Kelola Jabatan</a>
            <a href="buat_akun.php" class="block bg-green-600 text-white p-4 rounded hover:bg-green-700">👥 Buat Akun Baru</a>
        <?php endif; ?>

        <a href="karyawan/index.php" class="block bg-gray-600 text-white p-4 rounded hover:bg-gray-700">📁 Lihat Data Karyawan</a>
    </div>
</div>
</body>
</html>
