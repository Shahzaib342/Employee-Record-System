<?php
ob_start();
include("../inc/header.php");

    $departments = mysqli_query($db_connect, "SELECT * FROM departments where active = 1");
    $departments = mysqli_fetch_all($departments, MYSQLI_ASSOC);

    ob_end_clean();
?>