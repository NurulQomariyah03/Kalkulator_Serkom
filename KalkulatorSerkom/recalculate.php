<?php
require_once 'Calculator.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil detail calculation dari database
    $calculator = new Calculator();
    $calculation = $calculator->getCalculationById($id);

    // Menghitung ulang hasil perhitungan
    $result = $calculator->calculate($calculation['expression']);

    // Update hasil perhitungan di database
    $calculator->updateCalculationResult($id, $result);

    // Redirect back ke history page
    header('Location: history.php');
    exit;
}
?>
