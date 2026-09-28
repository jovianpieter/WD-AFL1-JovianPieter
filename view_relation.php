<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Office Employees</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: white; margin: 0; padding: 30px; display: flex; justify-content: center;}
        .card { background-color: white; border: 1px solid #999; width: 450px; box-shadow: 2px 2px 5px rgba(0,0,0,0.1); padding-bottom: 40px;}
        .nav { background-color: #cce5ff; padding: 12px 20px; font-weight: bold; border-bottom: 1px solid #999; font-size: 15px;}
        .nav a { text-decoration: none; color: black; }
        h2 { text-align: center; color: #2b3a8c; font-weight: normal; margin-top: 30px; margin-bottom: 25px;}
        
        table { width: 85%; margin: 0 auto; border-collapse: collapse; margin-bottom: 40px; }
        th { background-color: #87ceeb; border: 1px solid #999; padding: 10px; text-align: left; font-weight: normal;}
        td { border: 1px solid #999; padding: 10px; font-size: 14px;}
        
        .form-box { width: 60%; margin: 0 auto; border: 1px solid #999; padding: 0; }
        .form-row { display: flex; border-bottom: 1px solid #999; align-items: center;}
        .form-row:last-child { border-bottom: none; }
        .form-row label { width: 40%; padding: 10px; font-size: 14px; text-align: left; border-right: 1px solid #999; margin:0;}
        .form-row select { width: 60%; padding: 10px; border: none; outline: none; appearance: auto; background-color: white; cursor: pointer;}
        
        .btn-container { text-align: center; margin-top: 25px; }
        .btn-save { background-color: #87ceeb; border: 1px solid #333; padding: 8px 40px; border-radius: 5px; cursor: pointer; font-size: 14px;}
    </style>
</head>
<body>

<div class="card">
    <div class="nav">
        <a href="controller.php">Employee</a> | <a href="controller.php?action=office">Office</a> | <a>Office-Employees</a>
    </div>
    <h2>Office Employees</h2>
    <table>
        <tr>
            <th>Employee</th>
            <th>Office</th>
        </tr>
        <?php foreach($relations as $rel): ?>
        <tr>
            <td><?= $rel['employee_name'] ?></td>
            <td><?= $rel['office_name'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form action="controller.php?action=relation" method="POST">
        <div class="form-box">
            <div class="form-row">
                <label>Employee</label>
                <select name="employee_id" required>
                    <?php foreach($employees as $emp): ?>
                        <option value="<?= $emp['id'] ?>"><?= $emp['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-row">
                <label>Office</label>
                <select name="office_id" required>
                    <?php foreach($offices as $off): ?>
                        <option value="<?= $off['id'] ?>"><?= $off['office_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="btn-container">
            <button type="submit" name="save_relation" class="btn-save">SAVE</button>
        </div>
    </form>
</div>

</body>
</html>