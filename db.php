<?php
try {
    $DBH = new PDO("mysql:host=localhost;dbname=blog_project", 'root', '');
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

