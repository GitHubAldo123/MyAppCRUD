<?php
include '../auth_user.php';
include '../koneksi.php';

$query = mysqli_query($conn, "SELECT k.*, j.nama_jabatan FROM karyawan k LEFT JOIN jabatan j ON k.jabatan_id = j.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Karyawan</h1>
        <div class="space-x-2">
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="tambah.php" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">+ Karyawan</a>
            <?php endif; ?>
            <a href="../index.php" class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">← Kembali</a>
        </div>
    </div>

    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">No</th>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Jabatan</th>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <th class="px-4 py-2 text-center">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($query)): ?>
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2"><?= $no++ ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['nama']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['email']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['nama_jabatan']) ?></td>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <td class="px-4 py-2 text-center space-x-2">
                        <a href="edit.php?id=<?= $row['id'] ?>" class="text-yellow-500 hover:underline">Edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Hapus karyawan ini?')">Hapus</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
