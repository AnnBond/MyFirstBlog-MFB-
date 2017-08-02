<?php
include_once('db.php');

$idPost = $_GET["id"];
$STH = $DBH->prepare("DELETE FROM post WHERE id = :id");
$STH->bindValue(':id', $_GET['id']);
$STH->execute();
header('Location:index.php');