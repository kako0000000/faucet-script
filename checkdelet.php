<?php

include("libs/database.php");

$key = "hYFkzDNVh40xD7iJl86D";

$check = $mysqli->query("SELECT * FROM link WHERE sec_key = '$key'");
$link = $check->fetch_assoc();

$currency = $link['currency'];

$reward = $link['reward'];




echo $currency . "<br>";
echo $reward . "<br>";

?>