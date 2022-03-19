<?php
    session_start();
    require_once('vendor/connect.php')
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ToDo</title>
        <link rel="stylesheet" href="assets/css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </head>
<body class="text-center">
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">ToDo</h1>
</div>  

<div class="container">
    <form style = "width: 100%; max-width: 320px; padding:10px; margin: 0 auto;" action="vendor/addition.php" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Please add new task</h1>
        <input type="text" name="task" class="form-control mb-3" placeholder="Enter Task" required="" autofocus="">
        <button class="btn btn-lg btn-primary btn-block" style="width: 300px;"type="submit">Add</button>
    </form>
    <form style="width: 100%; max-width: 320px; padding:10px;margin: 0 auto;" action="vendor/clear.php" method="post">
        <button class="btn btn-lg btn-secondary btn-block" style="width: 300px;" type="submit">Clear</button>
    </form>
    <?php
             if ($_SESSION['msg']){
                 echo '<div class="container alert alert-warning alert-dismissible fade show" style="width: auto; max-width: 300px;" onclick="choose_clear()" role="alert">
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                 . $_SESSION["msg"] .
                 '</div>';
                //  echo "<p class='msg'>". $_SESSION['msg'] ."</p>";
              }
             unset($_SESSION['msg']);
        ?>
    <div class="container" style="width: auto; max-width: 500px;">
        <ul class="list-group">
            <?php
            $db_host='127.0.0.1'; // ваш хост
            $db_name='todo'; // ваша бд
            $db_user='root'; // пользователь бд
            $db_pass=''; // пароль к бд
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
            $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
            $mysqli->set_charset("utf8mb4"); // задаем кодировку
            
                $result = $mysqli->query('SELECT * FROM `tasks`'); // запрос на выборку
                while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
                {
                    echo '<li class="list-group-item" align="left"><p class="task"><input class="form-check-input me-1" type="checkbox" value="" aria-label="...">Task '.$row['id'].'.'.$row['name'].'<p class="date">Date: '.$row['date_create'].'<p class="date">Time: '.$row['time_create'].'</p></p></p></li>';// выводим данные
                }
            ?>
        </ul>
    </div>
</div>

    
</body>
</html>
