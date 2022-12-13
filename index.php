<?php
session_start();
require_once('src/connect.php');
$_SESSION['msg'] = false;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="vendor/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
</head>
<body class="text-center">
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">ToDo</h1>
</div>
<div class="container">
    <form style="width: 100%; max-width: 320px; padding:10px; margin: 0 auto;" action="src/addition.php" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Please add new task</h1>
        <input type="text" name="task" class="form-control mb-3" placeholder="Enter Task"
               onkeyup="var yratext=/[''`']/; if(yratext.test(this.value)) this.value=''">
        <button class="btn btn-lg btn-primary btn-block" style="width: 300px;" type="submit">Add</button>
    </form>
    <form style="width: 100%; max-width: 320px; padding:10px;margin: 0 auto;" action="src/clear.php" method="post">
        <button class="btn btn-lg btn-secondary btn-block" style="width: 300px;" type="submit">Clear</button>
    </form>
    <?php include('src/msg.php') ?>
    <div class="container" style="width: auto; max-width: 500px;">
        <ul class="list-group">
            <?php
            include('src/output_task.php');
            ?>
        </ul>
    </div>
</div>
</body>
</html>
