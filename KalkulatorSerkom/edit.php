<?php
require_once 'Calculator.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil detail calculation dari database
    $calculator = new Calculator();
    $calculation = $calculator->getCalculationById($id);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update calculation di database
        $expression = $_POST['expression'];
        $result = $calculator->calculate($expression);
        $calculator->updateCalculation($id, $expression, $result);

        // Redirect back ke history page
        header('Location: history.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Calculation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Calculation</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="expression">Expression</label>
                <input type="text" class="form-control" name="expression" id="expression" value="<?php echo $calculation['expression']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
