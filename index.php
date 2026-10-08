<?php

session_start();

$_SESSION['logged'] = false;

if(isset($_POST['passwd'])){
    require_once("passwords.php");
    if($_POST['passwd'] == $normalPassword){
        $_SESSION['logged'] = true;
        header("Location: plan.php");
        exit();
    }
    $errno = 1;
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="links.js"></script>
    <title>InfaPlan - Plany Zajęć</title>
</head>
<body>
<header>

</header>
<main>
    <div id="main">
        <form action="index.php" method="post">
            <input type="password" name="passwd" id="" placeholder="Enter PassCode">
            <input type="submit" value="OK">
        </form>
        <?php
        if(isset($errno) && $errno = 1){
            echo '<p>Wrong PassCode!</p>';
        }
        ?>
    </div>
</main>