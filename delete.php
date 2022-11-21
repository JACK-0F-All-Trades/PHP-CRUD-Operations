<?php
    include_once('./config/config.php');
    $id = $_GET['id'];
    mysqli_query($mysqlConnection, "DELETE FROM employees WHERE id=$id;");

    header("Location:index.php");
?>