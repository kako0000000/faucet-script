<?php
include 'libs/database.php';
if(!empty($_POST["faucode"])) {
$faucode = $_POST["faucode"];
$checkfaul = "Select * from fauclist where secucode='$faucode'";
$checkfaul = mysqli_query($mysqli, $checkfaul);
$totalfaul = mysqli_num_rows($checkfaul);
$myrowfaul = mysqli_fetch_array($checkfaul);
$openurl = $myrowfaul["refurl"];
if ($totalfaul == "0"){
}else{
header("Location: $openurl");
}}else{
header("Location: index.php?op=faucets-list");
}
?>
