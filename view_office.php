<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Office</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="mb-4">
        <a href="controller.php">Employee</a> | <b>Office</b> | <a href="controller.php?action=relation">Office-Employees</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 mb-5 shadow-sm">
                <h5 class="text-primary mb-3 text-center">Create Karyawan Baru</h5>
                <form action="controller.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Karyawan" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="umur" class="form-control" placeholder="Umur" required>
                    </div>
                    <button type="submit" name="save_employee" class="btn btn-primary w-100">Save Employee</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>