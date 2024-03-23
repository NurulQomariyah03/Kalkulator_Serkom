<?php
require_once 'Calculator.php';

$calculator = new Calculator();
$history = $calculator->getHistory();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Kalkulator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div>
          <a href="index.php" class="btn btn-primary">Back to Calculate</a>
        </div>
        <h2 class="text-center mb-4">History Kalkulator</h2> 
        <table class="table">
            <thead>
                <tr>
                    <th>Perhitungan</th>
                    <th>Hasil</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($history as $calculation): ?>
                    <tr>
                        <td><?php echo $calculation['expression']; ?></td>
                        <td><?php echo $calculation['result']; ?></td>
                        <td>
                            <a href="index.php?expression=<?php echo urlencode($calculation['result']); ?>" class="btn btn-primary btn-sm">Gunakan Kembali</a>
                            <a href="edit.php?id=<?php echo $calculation['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $calculation['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
