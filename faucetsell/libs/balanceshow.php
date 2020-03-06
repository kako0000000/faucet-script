<?php
$payoutwebsite = $mysqli->query("SELECT * FROM settings WHERE id = '38'")->fetch_object()->value;
if ($payoutwebsite == "Faucetpay.io") {
function balance() {
global $mysqli,$hacker_security;
$faucetpay_api = $mysqli->query("SELECT * FROM settings WHERE id = '39'")->fetch_object()->value;
$sec = md5($hacker_security);
$str = str_replace($sec,"",$faucetpay_api);
$currency = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
$param = array('api_key' => $str,'currency' => $currency);
$url = 'https://faucetpay.io/api/v1/balance';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, count($param));
curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
$result = curl_exec($ch);
curl_close($ch);
$jsonhis = json_decode($result, TRUE);
return $jsonhis['balance'];
}
?>
<h1>Faucet Balance: <?=balance()?> satoshi</h1>
<?php
}elseif ($payoutwebsite == "Expresscrypto.io") {
function balance() {
global $mysqli,$hacker_security;
$sec = md5($hacker_security);
$expresscrypto_api_token = $mysqli->query("SELECT * FROM settings WHERE id = '40'")->fetch_object()->value;
$expresscrypto_api_token = str_replace($sec,"",$expresscrypto_api_token);
$expresscrypto_user_token = $mysqli->query("SELECT * FROM settings WHERE id = '41'")->fetch_object()->value;
$expresscrypto_user_token = str_replace($sec,"",$expresscrypto_user_token);
$currency = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
$param = array('api_key' => $expresscrypto_api_token,'currency' => $currency,'user_token' => $expresscrypto_user_token);
$url = 'https://expresscrypto.io/public-api/v2/getBalance';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, count($param));
curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
$result = curl_exec($ch);
curl_close($ch);
$jsonhis = json_decode($result, TRUE);
return $jsonhis['balance'];
}
?>
<h1>Faucet Balance: <?=balance()?> satoshi</h1>
<?php
}elseif ($payoutwebsite == "Microwallet.co") {
function balance() {
global $mysqli,$hacker_security;
$microwallet = $mysqli->query("SELECT * FROM settings WHERE id = '41'")->fetch_object()->value;
$sec = md5($hacker_security);
$str = str_replace($sec,"",$microwallet);
$currency = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
$param = array('api_key' => $str,'currency' => $currency);
$url = 'https://api.microwallet.co/v1/balance';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, count($param));
curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
$result = curl_exec($ch);
curl_close($ch);
$jsonhis = json_decode($result, TRUE);
return $jsonhis['balance'];
}
?>
<h1>Faucet Balance: <?=balance()?> satoshi</h1>
<?php
}elseif ($payoutwebsite == "Faucethub.io") {
function balance() {
global $mysqli,$hacker_security;
$faucethub_api = $mysqli->query("SELECT * FROM settings WHERE id = '15'")->fetch_object()->value;
$sec = md5($hacker_security);
$str = str_replace($sec,"",$faucethub_api);
$currency = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
$param = array('api_key' => $str,'currency' => $currency);
$url = 'https://faucethub.io/api/v1/balance';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, count($param));
curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
$result = curl_exec($ch);
curl_close($ch);
$jsonhis = json_decode($result, TRUE);
return $jsonhis['balance'];
}
?>
<h1>Faucet Balance: <?=balance()?> satoshi</h1>
<?php
}
?>