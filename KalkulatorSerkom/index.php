<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambah ruang di antara tombol */
        .btn-block {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Calculator</h2>
                <form action="calculate.php" method="post">
                    <input type="text" class="form-control mb-2" name="expression" id="expression" value="<?php echo isset($_GET['expression']) ? htmlspecialchars($_GET['expression']) : ''; ?>">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('7')">7</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('8')">8</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('9')">9</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('4')">4</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('5')">5</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('6')">6</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('1')">1</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('2')">2</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('3')">3</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('+')">+</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('0')">0</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('-')">-</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('*')">*</button></div>
                                <div class="col-md-4"><button type="button" class="btn btn-primary btn-block" onclick="addToExpression('/')">/</button></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success btn-block mb-2">Calculate</button>
                            <a href="history.php" class="btn btn-info btn-block">History</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        //
        function addToExpression(value) {
            document.getElementById('expression').value += value;
        }
    </script>
</body>
</html>
