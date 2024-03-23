<?php
require_once 'Calculator.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete calculation dari database
    $calculator = new Calculator();
    $calculator->deleteCalculation($id);

    // Redirect back ke history page
    header('Location: history.php');
    exit;
}
?>