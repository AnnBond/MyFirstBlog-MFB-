<?php
include_once('db.php');

/*For pagination*/
$postsCount = $DBH->query('SELECT COUNT(1) FROM post');
$blog_project = $postsCount->fetchAll();
$perPage = 4;
$allPostOnDB = $blog_project[0][0];
$pages = $allPostOnDB / $perPage;
$page = empty($_GET['page']) ? 1 : intval($_GET['page']);
$posts = ($page - 1) * $perPage;

$STH = $DBH->prepare("SELECT * FROM post ORDER BY id DESC LIMIT $perPage OFFSET $posts");
//$STH->bindValue(':limit', $perPage);
//$STH->bindParam(':offset', $posts);
$STH->setFetchMode(PDO::FETCH_ASSOC);
$STH->execute();
$blog_project = $STH->fetchAll();




