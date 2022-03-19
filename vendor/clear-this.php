<?php 
    require_once('connect.php');
    session_start();

    mysqli_query();
    header('Location: ../index.php');
    $_SESSION['msg'] = 'Task cleared!';