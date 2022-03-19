<?php

    session_start();
    require_once('connect.php');

    mysqli_query($connect, "DELETE FROM `tasks`");
    mysqli_query($connect, "ALTER TABLE tasks AUTO_INCREMENT = 1");
    header('Location: ../index.php');
    $_SESSION['msg'] = 'Tasks cleared!';
