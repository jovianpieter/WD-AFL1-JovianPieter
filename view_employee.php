<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="mb-4">
        <b>Employee</b> | <a href="controller.php?action=office">Office</a> | <a href="controller.php?action=relation">Office-Employees</a>
    </div>

    <h3 class="text-primary mb-4">Daftar Karyawan</h3>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($employees as $emp): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $emp['nama'] ?></td>
                <td><?= $emp['jabatan'] ?></td>
                <td><?= $emp['umur'] ?></td>
                <td><a href="controller.php?action=delete_emp&id=<?= $emp['id'] ?>" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>