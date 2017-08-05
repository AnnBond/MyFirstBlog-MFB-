<?php
include ('header.php');
include ('checkLogin.php');

?>

<form method="post">
    Login: <input type="text" name="userName">
    Password: <input type="password" name="userPass">
    <input type="submit" name="loginSubmit" value="Log in">
</form>

<?php include ('footer.php'); ?>