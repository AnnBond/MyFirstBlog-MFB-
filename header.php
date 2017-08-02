<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="homeBtn"><!--BTN to HOME-->
            <?php if (!empty($_GET) || !empty($_POST)): ?>
                <a href="index.php" class="backHome">Home</a>
            <?php endif; ?>
        </div>
        <div class="search">
            <form method="get">
                <input value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" placeholder="Enter a post name" required name="search" />
                <input type="submit" value="SEARCH" class="searchBtn">
            </form>
        </div>
