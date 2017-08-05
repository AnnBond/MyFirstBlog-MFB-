<?php
include_once('db.php');

if (isset($_POST['loginSubmit'])) {
    if (!empty($_POST['userName']) && !empty($_POST['userPass'])) {
        $STH = $DBH->prepare("SELECT * FROM users WHERE users.name = :userName AND users.password = :userPass");
        $STH->bindParam(":userName", $_POST["userName"]);
        $STH->bindParam(":userPass", $_POST["userPass"]);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $STH->execute();
        $blog_project = $STH->fetch();
        //print_r( $blog_project['name']);
        if (empty($blog_project)) {
            echo "I don't know who you are";
        } else {
            setcookie('userName', $blog_project['name']);
            header('Location:index.php');
        }
    }
}

if(isset($_COOKIE['userName'])) {
    $url = '?log=logout';
    $switchLog = 'Log Out';

} else {
    $url = 'login.php';
    $switchLog = 'Log in';
}

if(isset($_GET['log'])) {
    //unset($_COOKIE['userName']);
    setcookie ("userName", "");
}


