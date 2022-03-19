<?php

    session_start();
    require_once('connect.php');
    date_default_timezone_set('Europe/Warsaw');

    $task = $_POST['task'];
    $date = date("Y/m/d");
    $time = date("H:i");
    mysqli_query($connect, "INSERT INTO `tasks` (`id`, `name`, `date_create`, `time_create`) VALUES (NULL, '$task', '$date', '$time')");
    header('Location: ../index.php');
    $_SESSION['msg'] = 'Task added!';
