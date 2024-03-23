<?php
require_once 'Calculator.php';

$expression = $_POST['expression'] ?? '';

$calculator = new Calculator();
$result = $calculator->calculate($expression);

// Menyimpan hasil perhitungan ke database
$calculator->saveHistory($expression, $result);

header('Location: index.php');
?>
