<?php
include('db.php');
//search by post name
if (isset($_GET['search'])) {
    $STH = $DBH->prepare('SELECT * FROM post WHERE post.title LIKE :title');
    $STH->bindValue(':title', '%' . $_GET['search'] . '%');

    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $STH->execute();
    $blog_project = $STH->fetchAll();
}