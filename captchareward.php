<?php
$captchasystemonoff = $mysqli->query("SELECT * FROM settings WHERE id = '19'")->fetch_object()->value;
if ($captchasystemonoff == "on"){
$captchasystem = $mysqli->query("SELECT * FROM settings WHERE id = '20'")->fetch_object()->value;
if ($captchasystem == "Recaptcha"){
$recaptcha_secret_key = $mysqli->query("SELECT * FROM settings WHERE id = '22'")->fetch_object()->value;
$secret = $recaptcha_secret_key;
$verifyResponse = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $verifyResponse);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
$responseData = json_decode($output);
if($responseData->success){
include_once("reward.php");	     
}else{
$error = 'You are a robot';
}}elseif ($captchasystem == "Solvemedia"){
require_once("libs/solvemedialib.php");
$solvemedia_response = solvemedia_check_answer($privkey,$_SERVER["REMOTE_ADDR"],$_POST["adcopy_challenge"],$_POST["adcopy_response"],$hashkey);
if (!$solvemedia_response->is_valid) {
$error = ucwords($solvemedia_response->error);
unset($_COOKIE['scode']);
}else{
include_once("reward.php");
}}elseif ($captchasystem == "Hcaptcha"){
if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response'])) {
$hcaptcha_secret_key = $mysqli->query("SELECT * FROM settings WHERE id = '24'")->fetch_object()->value;
$secret = $hcaptcha_secret_key;
$verifyResponse = 'https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $verifyResponse);   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
$responseData = json_decode($output);
if($responseData->success){
include_once("reward.php");
}else{
$error = 'hCaptcha verification failed. Please try again.';
}}else{
$error = 'Please click on the hCaptcha button.';
}}}else{
include_once("reward.php");
}
?>