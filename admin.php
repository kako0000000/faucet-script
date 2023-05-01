<?php
ob_start();
session_start();
if (isset($_SESSION['loggedin'])) {
header("location: faucetmaster.php");
exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
if ($_POST["user_name"] == "" or $_POST["password"] == "") {
$errorp = 'Please fill both the username and password fields!';
}else{
include 'libs/database.php';
$usernamec = $mysqli->query("SELECT * FROM settings WHERE id = '48'")->fetch_object()->value;
$passwordc = $mysqli->query("SELECT * FROM settings WHERE id = '49'")->fetch_object()->value;
if ($usernamec == $_POST["user_name"] and $passwordc == $_POST["password"]) {
$_SESSION["loggedin"] = $usernamec;
header('Location: faucetmaster.php');
exit;
}else{
$errorp = "Invalid Username or Password!";
}}}
?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="asset/css/adminstyle.css">
<meta charset="utf-8">
<?php
include 'libs/database.php';
$titalname = $mysqli->query("SELECT * FROM settings WHERE id = '1'")->fetch_object()->value;
$sitedesrip = $mysqli->query("SELECT * FROM settings WHERE id = '2'")->fetch_object()->value;
?>
<title><?php echo $titalname. ' - ' .$sitedesrip?></title>
</head>
<body>
<div class="header">
<ul id="nav">
<li><a href="index.php">Home</a></li>
</div>
<div class="abody">
<div id="login">
<div id="triangle"><h1>Login</h1></div>
<form action="" method="post">
<?php if(isset($errorp)) { echo $errorp; } ?>
<input name="user_name" type="text" placeholder="Username">
<input name="password" type="password" placeholder="Password">
<input type="submit" name="login" value="Login">
</form>
</div>
</div>
<footer>
<div class="fleft"><span class="fc"> Copyright © <?php
$copyright = $mysqli->query("SELECT * FROM settings WHERE id = '34'")->fetch_object()->value;
echo $copyright;
?> All Rights Reserved.</span></div>
</footer>
</body></html>
<?php
ob_end_flush(); // Flush the output from the buffer
?>