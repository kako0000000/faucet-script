<?php
$captchasystemonoff = $mysqli->query("SELECT * FROM settings WHERE id = '19'")->fetch_object()->value;
if ($captchasystemonoff == "on"){
$captchasystem = $mysqli->query("SELECT * FROM settings WHERE id = '20'")->fetch_object()->value;
if ($captchasystem == "Recaptcha"){
$recaptcha_secret_key = $mysqli->query("SELECT * FROM settings WHERE id = '22'")->fetch_object()->value;
$recaptcha_secret = $recaptcha_secret_key;
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
$response = json_decode($response, true);
if($response["success"] === true) {
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
$verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
$responseData = json_decode($verifyResponse);
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