<?php
ob_start(); // Initiate the output buffer
include("libs/database.php");
if(!empty($_POST["newweb"])){
$email = $_POST["email"];
$pay_system = $_POST["pay_system"];
$trbanumber = $_POST["trbanumber"];
$headline = $_POST["headline"];
$describe = $_POST["describe"];
$descricol = $_POST["descricol"];
$displayurl = $_POST["displayurl"];
$targeturl = $_POST["targeturl"];
$ordern = $_POST["ordern"];
if ($ordern == "order_1") {
$sql = "SELECT * FROM adssetting WHERE aid='1'";
$result = mysqli_query($mysqli, $sql); 
$myrow468 = mysqli_fetch_array($result);
$bsize = $myrow468["banrsize"];
$bimpres = $myrow468["banrimp1"];
$ptobtc = $myrow468["banrpric1"];
}elseif ($ordern == "order_2") {
$sql = "SELECT * FROM adssetting WHERE aid='1'";
$result = mysqli_query($mysqli, $sql); 
$myrow468 = mysqli_fetch_array($result);
$bsize = $myrow468["banrsize"];
$bimpres = $myrow468["banrimp2"];
$ptobtc = $myrow468["banrpric2"];
}elseif ($ordern == "order_3") {
$sql = "SELECT * FROM adssetting WHERE aid='1'";
$result = mysqli_query($mysqli, $sql); 
$myrow468 = mysqli_fetch_array($result);
$bsize = $myrow468["banrsize"];
$bimpres = $myrow468["banrimp3"];
$ptobtc = $myrow468["banrpric3"];
}elseif ($ordern == "order_4") {
$sql = "SELECT * FROM adssetting WHERE aid='2'";
$result = mysqli_query($mysqli, $sql); 
$myrow728 = mysqli_fetch_array($result);
$bsize = $myrow728["banrsize"];
$bimpres = $myrow728["banrimp1"];
$ptobtc = $myrow728["banrpric1"];
}elseif ($ordern == "order_5") {
$sql = "SELECT * FROM adssetting WHERE aid='2'";
$result = mysqli_query($mysqli, $sql); 
$myrow728 = mysqli_fetch_array($result);
$bsize = $myrow728["banrsize"];
$bimpres = $myrow728["banrimp2"];
$ptobtc = $myrow728["banrpric2"];
}elseif ($ordern == "order_6") {
$sql = "SELECT * FROM adssetting WHERE aid='2'";
$result = mysqli_query($mysqli, $sql); 
$myrow728 = mysqli_fetch_array($result);
$bsize = $myrow728["banrsize"];
$bimpres = $myrow728["banrimp3"];
$ptobtc = $myrow728["banrpric3"];
}elseif ($ordern == "order_7") {
$sql = "SELECT * FROM adssetting WHERE aid='3'";
$result = mysqli_query($mysqli, $sql); 
$myrow120 = mysqli_fetch_array($result);
$bsize = $myrow120["banrsize"];
$bimpres = $myrow120["banrimp1"];
$ptobtc = $myrow120["banrpric1"];
}elseif ($ordern == "order_8") {
$sql = "SELECT * FROM adssetting WHERE aid='3'";
$result = mysqli_query($mysqli, $sql); 
$myrow120 = mysqli_fetch_array($result);
$bsize = $myrow120["banrsize"];
$bimpres = $myrow120["banrimp2"];
$ptobtc = $myrow120["banrpric2"];
}elseif ($ordern == "order_9") {
$sql = "SELECT * FROM adssetting WHERE aid='3'";
$result = mysqli_query($mysqli, $sql); 
$myrow120 = mysqli_fetch_array($result);
$bsize = $myrow120["banrsize"];
$bimpres = $myrow120["banrimp3"];
$ptobtc = $myrow120["banrpric3"];
}else{
header("Location: advertising.php");
exit();
}
if ($email == '' || $pay_system == '' || $trbanumber == '' || $ordern == '' || $headline == '' || $describe == '' || $descricol == '' || $displayurl == '' || $targeturl == ''){
$message = "Please Enter All";
}elseif ($headline == ''){
$message = "Please Enter Headline";
}elseif ($describe == ''){
$message = "Please Enter Describe";
}elseif ($descricol == ''){
$message = "Please Enter Describe 2 columns";
}elseif ($displayurl == ''){
$message = "Please Enter Display URL";
}elseif ($targeturl == ''){
$message = "Please enter the Target URL";
}elseif ( strlen($headline) < 5 or strlen($headline) > 25 ){
$message = "Headline lenght maximum 25 characters";
}elseif ( strlen($describe) < 5 or strlen($describe) > 78 ){
$message = "Describe lenght maximum 78 characters";
}elseif ( strlen($descricol) < 5 or strlen($descricol) > 41 ){
$message = "Descricol lenght maximum 41 characters";
}elseif ($displayurl == "http://" || $displayurl == "") {
$message = "Please enter the website address.";
}elseif (! preg_match ( "/http/", $displayurl )) {
$message = "Display URL must include http:// or https://.";
}elseif (! preg_match ( '|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $displayurl )) {
$message = "Please do not use special characters in the Display URL.";
}elseif ($targeturl == "http://" || $targeturl == "") {
$message = "Please enter the Target URL.";
}elseif (! preg_match ( "/http/", $targeturl )) {
$message = "Target URL must include http:// or https://.";
}elseif (! preg_match ( '|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $targeturl )) {
$message = "Please do not use special characters in the Target URL.";
}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$message = "E-Mail invalid";
}else{
if(!empty($_POST["newweb"])) {
$query = "Select * from pendwebs where usersecode='$email' and bsize='$bsize' and bimpres='$bimpres' and targeturl='$targeturl'";
$result = mysqli_query($mysqli, $query); 
$totalrecord = mysqli_num_rows($result);
if ($totalrecord == '0'){
$datetime = date("d-m-Y g.i a");
$securitycodeweb = md5(rand().time().rand());
$opian = "Wait : Payment confirmed.";
$query = "INSERT INTO pendwebs (tnum, usersecode, pay_system, bsize, bimpres, ptobtc, transaction, headline, descri, describecol, displayurl, targeturl, websecord, savedate, status, viewads, opian)  VALUES ('','$email','$pay_system','$bsize','$bimpres','$ptobtc','$trbanumber','$headline','$describe','$descricol','$displayurl','$targeturl','$securitycodeweb','$datetime','Panding','0','$opian')";
$result = mysqli_query($mysqli, $query);
$message = "gggggggggggggggg";
}else{
$message = "This website has already added.";
}}}}
echo $message;
ob_end_flush(); // Flush the output from the buffer
?>