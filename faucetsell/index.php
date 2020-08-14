<?php
include("libs/database.php");
$removeip = $mysqli->query("SELECT * FROM settings WHERE id = '12'")->fetch_object()->value;
if (time() >= $removeip){
$mysqli->query("TRUNCATE TABLE ip_list");
$timerr = time()+86400;
$mysqli->query("UPDATE settings SET value='$timerr' WHERE id=12");
}
if (isset($_COOKIE['ipaddress'])) {
$ip = $mysqli->real_escape_string($_COOKIE['ipaddress']);}
else{
$ip = mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']);
setcookie('ipaddress', $ip);
}
$total_short_link = $mysqli->query("SELECT * FROM ip_list WHERE ip_address = '$ip'");
$data = $total_short_link->fetch_assoc();
$checkip = $mysqli->query("SELECT * FROM ip_list WHERE ip_address = '$ip'");
if ($checkip->num_rows == 1) {
$data = $checkip->fetch_assoc();
$claimwtime = $mysqli->query("SELECT * FROM settings WHERE id = '10'")->fetch_object()->value;
$time = $data['last_claim'] - time();
if ($time > 0) {
$waiteclaim = "waiteclaim";}
else{
$short_link = $mysqli->query("SELECT * FROM settings WHERE id = '16'")->fetch_object()->value;
if ($short_link == 'on') {
$count_short_link = $mysqli->query("SELECT * FROM ip_list WHERE ip_address = '$ip'")->fetch_object()->count_value;
$total_short_link = $mysqli->query("SELECT * FROM ip_list WHERE ip_address = '$ip'")->fetch_object()->total_value;
if ($count_short_link == $total_short_link) {
$waiteclaim = "wait hours";}
else{
$waiteclaim = "claim";}}
else{
$waiteclaim = "claim";}
}}
else{
$clickc = $mysqli->query("SELECT * FROM short_link");
$qty= 0;
while($num = $clickc->fetch_assoc()) {
$qty += $num['click'];
}
$time = time();
$mysqli->query("INSERT INTO ip_list (ip_address, first_time, last_claim, short_link_id, per_value_repirt, count_value, total_value) VALUES ('$ip', '$time','0','0','1','0','$qty')");
$waiteclaim = "claim";
}
if (isset($_POST['claim'])) {
include("proxycheck.php");
$token = $_POST['token'];
$payoutwebsite = $mysqli->query("SELECT * FROM settings WHERE id = '38'")->fetch_object()->value;
if ($payoutwebsite == "Expresscrypto.io") {
$address = $_POST['address'];
}else{
$address = mysqli_real_escape_string($mysqli,preg_replace("/[^ \w]+/", "",trim($_POST['address'])));
}
$faucetsiteonoff = $mysqli->query("SELECT * FROM settings WHERE id = '6'")->fetch_object()->value;
if (preg_match("/\b$mword\b/i", $content, $match))  {
$proxycheck = "noproxy";}
else{
$proxycheck = "yesproxy";}
if ($proxycheck == "yesproxy") {
$mysqli->query("INSERT INTO failure (address, ip_address) VALUES ('$address', '$ip')");
$error = 'Request blocked as you appear to be browsing from a VPN or Proxy Server.';}
elseif (strlen($address) < 10 or strlen($address) > 60) {
$error = 'Invalid Address';
unset($_COOKIE['scode']);}
elseif ($token !== $_COOKIE['scode']) {
$error = 'Invalid Session Key';
unset($_COOKIE['scode']);}
elseif ($faucetsiteonoff == "off") {
$error = 'The side is temporarily closed. <br> Please wait or refresh the page';
unset($_COOKIE['scode']);}
else{
$checkfa = $mysqli->query("SELECT * FROM failure WHERE address = '$address'")->num_rows;
$checkfip = $mysqli->query("SELECT * FROM failure WHERE ip_address = '$ip'")->num_rows;
if ($checkfa >= 4) {
$error = 'You Are Banned';}
elseif ($checkfip >= 4) {
$error = 'You Are Banned';}
else{
$antibot = $mysqli->query("SELECT * FROM settings WHERE id = '13'")->fetch_object()->value;
if ($antibot == "off") {
include_once("captchareward.php");}
else{
$anticode = $_POST['anticode'];
if ($anticode == $_COOKIE['anticodeaddress']) {
include_once("captchareward.php");}
else{
$error = 'Invalid AntiBot verification!';
}}}}}
$antibot = $mysqli->query("SELECT * FROM settings WHERE id = '13'")->fetch_object()->value;
if ($antibot == "off") {}
else{
include("antibot.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<?php
include("bannerrotrate.php");
include("reptads.php");
$titalname = $mysqli->query("SELECT * FROM settings WHERE id = '1'")->fetch_object()->value;
$sitedesrip = $mysqli->query("SELECT * FROM settings WHERE id = '2'")->fetch_object()->value;
$siteurl = $mysqli->query("SELECT * FROM settings WHERE id = '3'")->fetch_object()->value;
$metadescription = $mysqli->query("SELECT * FROM settings WHERE id = '35'")->fetch_object()->value;
$metakeywords = $mysqli->query("SELECT * FROM settings WHERE id = '36'")->fetch_object()->value;
?>
<meta charset="utf-8" />
<meta name="description" content="<?php echo $metadescription ; ?>" />
<meta name="keywords" content="<?php echo $metakeywords ; ?>" />
<meta name="subject" content="Crypto currency free reward" />
<meta name="robots" content="All" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="asset/css/stylemain.css" />
<title><?php echo $titalname. ' - ' .$sitedesrip?></title>
</head>
<body>
<?php
$adslf = $mysqli->query("SELECT * FROM settings WHERE id = '31'")->fetch_object()->value;
$adsrf = $mysqli->query("SELECT * FROM settings WHERE id = '32'")->fetch_object()->value;
$adsff = $mysqli->query("SELECT * FROM settings WHERE id = '33'")->fetch_object()->value;
if ($adslf == "on") {
?>
<div style="width:300px;height:280px;position:fixed;bottom:0px;left:0px;" id="wcfloatDivl">
<span style="float:left;" onclick="document.getElementById('wcfloatDivl').style.display='none'">
<font style="cursor:pointer;size:20px;font-family:arial;color:red"><b>[Close X]</b></font>
</span>
<div>
<center>
<?php
echo $myrowban300x2502["fbanercode"];
?>
</center>
</div>
</div>
<?php
}
if ($adsrf == "on") {
?>
<div style="width:300px;height:280px;position:fixed;bottom:0px;right:0px;" id="wcfloatDivr">
<span style="float:right;" onclick="document.getElementById('wcfloatDivr').style.display='none'">
<font style="cursor:pointer;size:20px;font-family:arial;color:red"><b>[Close X]</b></font>
</span>
<div>
<center>
<?php
echo $myrowban300x2503["fbanercode"];
?>
</center>
</div>
</div>
<?php
}
if ($adsff == "on") {
?>
<div style="width: 100%; height: 98px;position:fixed;bottom:0px;right:0px;" id="wcfloatDivf">
<span style="float:left;" onclick="document.getElementById('wcfloatDivf').style.display='none'">
<font style="cursor:pointer;size:20px;font-family:arial;color:red"><b>[Close X]</b></font>
</span>
<div>
<center>
<?php
echo $myrowban990x901["fbanercode"];
?>
</center>
</div>
</div>
<?php
}
?>
<style>
.Social1 {margin:0 20px;}
.alert-news{letter-spacing: 2px;font-weight: bold;font-size:16px;}
</style>
<div style="background-color:#a88e42;">
<div class="Social1">
<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $siteurl; ?>" target="_blank"><img src="asset/img/facebook.png" alt="Facebook" title="Share On Face Book" border="0"></a>
<a href="https://twitter.com/home?status=<?php echo $siteurl; ?>" target="_blank"><img src="asset/img/twitter.png" alt="Twitter" title="Share On Twitter" border="0"></a>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo $siteurl; ?>&description=<?php echo $sitedesrip; ?>" class="pin-it-button" count-layout="horizontal"><img src="asset/img/prat.png" alt="Pinterest" title="Post Pinterest" border="0"></a>
<a href="http://www.tumblr.com/share/link?url=<?php echo $siteurl; ?>&amp;title=<?php echo $titalname; ?>" target="_blank"><img src="asset/img/tumbir.png" alt="Tumblr" title="Share On Tumblr" border="0"></a>
<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $siteurl; ?>" target="_blank"><img src="asset/img/linkin.png" alt="Linkin" title="Share On Link in" border="0"></a>
<a href="http://itcollegeall.blogspot.com/p/faucet-script.html" target="_blank"><img src="asset/img/download.png" alt="Download" title="Download Script" border="0"></a>
</div>
</div><div class="header">
<ul id="nav">
<li><a href="index.php">Home</a></li>
<li><a href="?op=faucets-list">Faucet List</a></li>
<li><a href="?op=ptc-list">PTC Sites List</a></li>
</ul>
</div>
<div class="disbody">
<table class="distable" border="0">
<tbody>
<tr>
<td align="center">
<?php
echo $myrowban728x90["fbanercode"];
?>
</td>
</tr>
<?php
if(!empty($_GET["op"])) {
$opt = $_GET["op"];
if ($opt == "ptc-list") {
?>
<tr>
<td>
<div class="clearfixa">
<div class="bodyc">
<?php
$ptc_list = $mysqli->query("Select * from ptclist");
if ($ptc_list->num_rows  == "0") {
}else{
?>
<style>
.btctable {border-collapse: collapse;border: 1px solid #000;width: 100%;background-color: #f0f0f0;letter-spacing: 1px;margin:0;}
.btctable1 {border-collapse: collapse;border: 1px solid #000;background-color: #36aade;width: 100%;color:#000;font-size:12px;margin:0;letter-spacing: 1px;}
.btctable1 td {border: 1px solid #fff;text-align:center;}
.fautable{border-collapse: collapse;border: 1px solid #ddd;width: 100%;background:#e7f9eb;}
.fautable th{border: 1px solid #ddd;background:#a88e42;padding:10px;}
.fautable tr:nth-child(even) {background-color: #DFF7E4;}
.fautable td {padding:4px;border: 1px solid #ddd;}
#triangled {background-color:#00a693;padding:15px 10px;font-size:25px;color:#fff;text-shadow: 1px 1px #000;}
</style>
<table border="0" width="100%">
<tbody>
<tr><td width="120" valign="top">
<?php
echo $myrowban120x6001["fbanercode"];
?></td><td valign="top">
<table class="fautable">
<tr><td align="left" id="triangled" colspan="6">PTC Website List</td></tr>
<?php
while($myrowfaul = $ptc_list->fetch_assoc()) {
?>
<tr>
<td>
<table class="btctable">
<tr>
<td align=center><a href="ptcopen.php?o=<?php echo $myrowfaul["secucode"]; ?>" target="_blank"><img border="0" height="60" src="<?php echo $myrowfaul["img"]; ?>" width="468" /></a></td>
</tr>
<tr>
<td>
<table class="btctable1">
<tr>
<td>Earn Up</td>
<td>Advertisements</td>
<td>Referral</td>
</tr> 
<tr>
<td><?php echo $myrowfaul["earnup"]; ?></td>
<td><?php echo $myrowfaul["adment"]; ?></td>
<td><?php echo $myrowfaul["referral"]; ?></td>
</tr> 
<tr>
<td>Day Open</td>
<td>Minimum Payout</td>
<td>Withdraw</td>
</tr> 
<tr>
<td><?php echo $myrowfaul["dayopen"]; ?></td>
<td><?php echo $myrowfaul["minpayout"]; ?></td>
<td><?php echo $myrowfaul["withdraw"]; ?></td>
</tr> 
</table>
</td>
</tr>
</table> 
</td>
</tr>
<?php
}}
?>
</table>
</td><td width="120" valign="top">
<?php
echo $myrowban120x600["fbanercode"];
?></td></tr>
<tr><td colspan="3"><table border="0" width="100%">
<tr><td><?php
echo $myrowban468x60["fbanercode"];
?></td><td><?php
echo $myrowban468x601["fbanercode"];
?></td></tr>
</table></td></tr>
</tbody>
</table>
</div>
</div>
</td>
</tr>
<?php
}elseif ($opt == "faucets-list") {
?>
<tr>
<td>
<div class="clearfixa">
<div class="bodyc">
<?php
$fauc_list = $mysqli->query("Select * from fauclist");
if ($fauc_list->num_rows  == "0") {
}else{
?>
<style>
.fautable{border-collapse: collapse;border: 1px solid #ddd;width: 100%;background:#e7f9eb;}
.fautable th{border: 1px solid #ddd;background:#a88e42;padding:10px;}
.fautable tr:nth-child(even) {background-color: #DFF7E4;}
.fautable td {padding:4px;border: 1px solid #ddd;}
.submit {width:100%;background:#3399cc;border:0;padding:4%;font-family:Verdana, sans-serif;text-shadow: 1px 1px #000;font-size:100%;color:#fff;cursor:pointer;}
.submit:hover{background:#2288bb;}
.faubtil{padding:20px;}
#triangled {background-color:#00a693;padding:15px 10px;font-size:25px;color:#fff;text-shadow: 1px 1px #000;}
</style>
<table border="0" width="100%">
<tbody>
<tr><td width="120" valign="top">
<?php
echo $myrowban120x6001["fbanercode"];
?></td><td valign="top">
<table class="fautable">
<tr><td align="left" id="triangled" colspan="6">Bitcoin Faucet List</td></tr>
<tr>
<th>Faucet Web</th><th>Reward</th><th>Timer</th><th>Referral</th><th>Payment</th><th></th>
</tr>
<?php
while($myrowfaul = $fauc_list->fetch_assoc()) {
?>
<tr>
<td><?php echo ucfirst($myrowfaul["webname"]); ?></td>
<td align="center"><?php echo $myrowfaul["minimum"]; ?> Satoshi</td>
<td align="center"><?php echo $myrowfaul["timers"]; ?></td>
<td align="center"><?php echo $myrowfaul["referral"]; ?>%</td>
<td align="center"><?php echo $myrowfaul["payment"]; ?></td>
<form action="faucetearn.php" method="post" target="_blank">
<td align="center">
<input type="hidden" name="faucode" value="<?php echo $myrowfaul["secucode"]; ?>">
<input type="submit" name="submit" value="Visit" class="submit">
</td>
</form>
</tr>
<?php
}}
?>
</table>
</td><td width="120" valign="top">
<?php
echo $myrowban120x600["fbanercode"];
?></td></tr>
<tr><td colspan="3"><table border="0" width="100%">
<tr><td><?php
echo $myrowban468x60["fbanercode"];
?></td><td><?php
echo $myrowban468x601["fbanercode"];
?></td></tr>
</table></td></tr>
</tbody>
</table>
</div></div>
</td>
</tr>
<?php
}}else{
$sitename = $mysqli->query("SELECT * FROM settings WHERE id = '4'")->fetch_object()->value;
$claimsatoshi = $mysqli->query("SELECT * FROM settings WHERE id = '9'")->fetch_object()->value;
$claimwtime = $mysqli->query("SELECT * FROM settings WHERE id = '10'")->fetch_object()->value;
$claimcurencyn = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
?>
<tr>
<td>
<div class="clearfixa">
<div class="bodyc">
<h1><?=$sitename ?></h1>
<h1>Claim <?php echo $claimsatoshi ?> satoshi (<?php echo $claimcurencyn ?>) every <?php echo $claimwtime ?> minutes</h1>
<?php
$payoutwebsite = $mysqli->query("SELECT * FROM settings WHERE id = '38'")->fetch_object()->value;
if ($payoutwebsite == "Faucethub.io") {
$regwebsite = "<p class='alert-news'>Faucet moved to <a target='_blank' href='https://faucethub.io/?r=76287'>on Faucethub.io</a>. Register, link your BTC address and start claiming.</p>";
}elseif ($payoutwebsite == "Expresscrypto.io") {
$regwebsite = "<p class='alert-news'>Faucet moved to <a target='_blank' href='https://expresscrypto.io/signup?referral=17665'>on Expresscrypto.io</a>. Register, link your BTC address and start claiming.</p>";
}elseif ($payoutwebsite == "Faucetpay.io") {
$regwebsite = "<p class='alert-news'>Faucet moved to <a target='_blank' href='https://faucetpay.io/?r=76287'>on FaucetPay.io</a>. Register, link your BTC address and start claiming.</p>";
}elseif ($payoutwebsite == "Microwallet.co") {
$regwebsite = "<p class='alert-news'>Faucet moved to <a target='_blank' href='https://microwallet.co/?r=76287'>on Microwallet.co</a>. Register, link your BTC address and start claiming.</p>";
}
?>
<h1><?php echo $regwebsite ?></h1>
<?php
$faucetonoff = $mysqli->query("SELECT * FROM settings WHERE id = '5'")->fetch_object()->value;
if ($faucetonoff == "on") {
include("libs/balanceshow.php");
}
?>
</div>
</div>
</td>
</tr>
<tr>
<td align="center">
<?php
echo $myrowban990x90["fbanercode"];
?>
</td>
</tr>
<?php 
if (isset($_POST['c'])) {
$e = $_POST['c'];
?>
<style>
.alert-danger{padding: 35px;letter-spacing: 2px;font-weight: bold;background-color: #F2DEDE;border-radius: 5px;text-align: center;line-height: 1.8;font-family: "Times New Roman", Times, serif;}
.alert-success{padding: 35px;letter-spacing: 2px;font-weight: bold;background-color: #DFF0D8;border-radius: 5px;}
</style>
<?php
if($e == "1"){
$event = '<p class="alert-danger">You have cookies disabled. Please try again</p>';
}
if($e == "2"){
$claimsatoshi = $mysqli->query("SELECT * FROM settings WHERE id = '9'")->fetch_object()->value;
$address = $_COOKIE['address'];
$payoutwebsite = $mysqli->query("SELECT * FROM settings WHERE id = '38'")->fetch_object()->value;
if ($payoutwebsite == "Faucethub.io") {
$event = "<p class='alert-success'>$claimsatoshi satoshi was sent to you <a target='_blank' href='https://faucethub.io/check/$address'>on FaucetHub.io</a>.</p>";
}elseif ($payoutwebsite == "Expresscrypto.io") {
$event = "<p class='alert-success'>$claimsatoshi satoshi was sent to you <a target='_blank' href='https://expresscrypto.io/check/$address'>on Expresscrypto.io</a>.</p>";
}elseif ($payoutwebsite == "Faucetpay.io") {
$event = "<p class='alert-success'>$claimsatoshi satoshi was sent to you <a target='_blank' href='https://faucetpay.io/check/$address'>on Faucetpay.io</a>.</p>";
}elseif ($payoutwebsite == "Microwallet.co") {
$event = "<p class='alert-success'>$claimsatoshi satoshi was sent to you <a target='_blank' href='https://microwallet.co/check/$address'>on Microwallet.co</a>.</p>";
}}
if($e == "3"){
$event = '<p class="alert-danger">Link Expire ( Please Try Again ).</p>';
}
if($e == "4"){
$shortlinkip = "SELECT * FROM ip_list WHERE ip_address = '$ip'";
$resultslip = mysqli_query($mysqli, $shortlinkip); 
$myrowslip = mysqli_fetch_array($resultslip);
$first_time = $myrowslip["first_time"];
$waite24h = time();
$timeleft = $first_time-$waite24h;
$dayleft = gmdate("H:i:s",$timeleft);
$event = "<p class='alert-danger'>You have reached the daily claim limit of this faucet.<br> Please come back in $dayleft .</p>";
}	
if($e == "5"){
$event = '<p class="alert-danger">Connection error ( Please Try Again ).</p>';
}	
?>
<tr><td>
<div class="clearfixa">
<div class="bodyc">
<table border="0" width="100%">
<tbody>
<tr><td width="150" valign="top">
<?php
echo $myrowban120x600["fbanercode"];
?></td><td valign="top">
<table border="0" width="100%">
<tbody>
<tr><td align="center"><?php
echo $myrowban468x60["fbanercode"];
?></td></tr>
<tr><td><center>
<?php
echo $event;
?>
</center></td></tr>
<tr><td align="center"><?php
echo $myrowban468x601["fbanercode"];
?></td></tr>
<tr><td align="center"><?php
echo $myrowban468x602["fbanercode"];
?></td></tr>
<tr><td align="center"><?php
echo $myrowban468x603["fbanercode"];
?></td></tr>
<tr><td align="center"><?php
echo $myrowban468x604["fbanercode"];
?></td></tr>
</tbody>
</table>
</td><td width="150" valign="top" valign="right" >
<?php
echo $myrowban120x6001["fbanercode"];
?></td></tr>
</tbody>
</table>
</div>
</div>
</td></tr>	
<?php	
}else{
if ($waiteclaim == "claim") { ?>
<tr>
<td>
<style>
#wait{width:90%;background:#3399cc;border:0;padding:2%;font-family:Verdana, sans-serif;text-shadow: 1px 1px #000;font-size:100%;color:#fff;}
</style>
<script type="text/javascript">
<?php
$waitepload = $mysqli->query("SELECT * FROM settings WHERE id = '7'")->fetch_object()->value;
$waitebshow = $mysqli->query("SELECT * FROM settings WHERE id = '8'")->fetch_object()->value;
?>	
pltime = <?php echo $waitepload * 1000; ?>;
var myVar = setInterval(myTimer, pltime);
function myTimer() {
clearInterval(myVar);
var myTimer = setInterval("showNextButton()",1000);
}
var counter = "<?php echo $waitebshow ?>";
function showNextButton() {
if(counter == 0)  {
document.getElementById("nextbutton").style.display = "block";
document.getElementById("wait").style.display = "none";
clearInterval(myTimer);
}else{
document.getElementById("countdown-link").innerHTML = counter + ' Please wait';
counter--;
}}

</script>
<div class="clearfixa">
<div class="bodyc">
<div id="login">
<table border="0" width="100%">
<tbody>
<tr><td width="150" valign="top">
<?php
echo $myrowban120x600["fbanercode"];
?>
</td><td valign="top">
<?php
if (isset($proxyerror)) {
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tbody>
<tr><td align="center"><?php echo $myrowban468x60["fbanercode"]; ?></td></tr>
<tr><td align="center"><?php echo $myrowban468x601["fbanercode"]; ?></td></tr>
<?php
echo "<tr><td class='errors'>" . $proxyerror . "</td></tr>";
?>
<tr><td align="center"><?php echo $myrowban468x602["fbanercode"]; ?></td></tr>
<tr><td align="center"><?php echo $myrowban468x603["fbanercode"]; ?></td></tr>
<tr><td align="center"><?php echo $myrowban468x604["fbanercode"]; ?></td></tr>
</tbody>
</table>
<?php
}else{
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tbody>
<tr><td align="center"><?php echo $myrowban468x60["fbanercode"]; ?></td></tr>
<?php
if (isset($error)) {
echo "<tr><td class='errors'>" . $error . "</td></tr>";
}
$id = md5(uniqid());
$strtime = time();
$resultsc = md5($strtime);
$finalc = $id . $resultsc;
$resultscf = md5($finalc);
$secucode = $resultscf;
if (isset($_POST['gologin'])) {
$scode = $_POST['sec'];
$address = $_POST['address'];
if ($scode == $_COOKIE['scode']) {
setcookie('scode', $secucode);
setcookie('address', $address, time()+86400);
?>
<tr><td align="center"><?php echo $myrowban468x601["fbanercode"]; ?></td></tr>
<tr><td align="center">
<form action="" method="post">
<input type="text" name="address" value="<?php echo $address; ?>" required>
<input type="hidden" name="currency" value="BTC" />
<?php
$captchasystemonoff = $mysqli->query("SELECT * FROM settings WHERE id = '19'")->fetch_object()->value;
if ($captchasystemonoff == "on"){
$captchasystem = $mysqli->query("SELECT * FROM settings WHERE id = '20'")->fetch_object()->value;
if ($captchasystem == "Recaptcha"){
$recaptcha_public_key = $mysqli->query("SELECT * FROM settings WHERE id = '21'")->fetch_object()->value;
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="g-recaptcha" data-sitekey="<?php echo $recaptcha_public_key;?>"></div>
<?php
}elseif ($captchasystem == "Solvemedia"){
require_once("libs/solvemedialib.php");
echo $startsolvemedia;
}elseif ($captchasystem == "Hcaptcha"){
$hcaptcha_site_key = $mysqli->query("SELECT * FROM settings WHERE id = '23'")->fetch_object()->value;
?>
<script src="https://hcaptcha.com/1/api.js"></script>
<div class="h-captcha" data-sitekey="<?php echo $hcaptcha_site_key; ?>"></div>
<?php
}}
?>
<?php echo $myrowban468x602["fbanercode"]; ?><br>
<?php echo $myrowban468x603["fbanercode"]; ?><br>
<?php echo $myrowban468x604["fbanercode"]; ?><br>
<input type="hidden" name="token" value="<?php echo $secucode; ?>">
<div id="wait" style="display: block"><a id='countdown-link'>Please wait</a></div>
<?php
$antibot = $mysqli->query("SELECT * FROM settings WHERE id = '13'")->fetch_object()->value;
if ($antibot == "off") {
include("adsshow.php");
?>
<script type="text/javascript">
<?php
$waitepload = $mysqli->query("SELECT * FROM settings WHERE id = '8'")->fetch_object()->value;
?>	
var myTimerb = setInterval("showNextButtonb()",1000);
var counter1 = "<?php echo $waitepload; ?>";
function showNextButtonb() {
if(counter1 == 0)  {
document.getElementById("openpop").style.display = "block";
clearInterval(myTimerb);
}else{
counter1--;
}}
</script>
<div id="btnclaim">
<button id="nextbutton" style="display: none" type="submit" name="claim">Claim Your Coin</button>
</div>
<style>
#openpop{display:none;position:fixed;z-index:2;background:lightgreen;width:100%;height:100%;left:0;top:0;opacity:0.8;}
#popup{margin:170px auto;padding:20px;background:#fff;border-radius:5px;width:40%;position:relative;border:1px solid black;}
#popup h2{text-align:center;margin-top:0;color:#333;font-family:Tahoma, Arial, sans-serif;}
#popup .content{max-height:30%;overflow:auto;text-align:center;}
</style>
<script>
function bannerclick() {
document.getElementById("openpop").style.display = "none";
}
</script>
<div id="openpop">
<div id="popup" style="<?php echo $bannerwidth; ?>">
<h2 align="center">Click&nbsp;On&nbsp;Banner&nbsp;</h2>
<div class="content"><center>
<div onclick="bannerclick()">
<?php
echo $bannerrot;
?>
</div>
</center>
</div>
</div>
</div>
<?php
}else{
?>
<div class="cobutton">
<button  type="button" id="nextbutton" style="display: none" onclick="myFunction()">Continue</button>
</div>
<?php
}
echo $myrowban468x605["fbanercode"]; ?>
<div id="freenmads" class="modal">
<div class="modal-content">
<div class="clbutton">
<span class="close">X</span>
</div>
<div class="modal-bodyfree">
<center>
<table border="0" width="100%">
<tr><td colspan="2" align="center"><?php echo $showantibot; ?> <span id='myDIV' onclick='resentall()' style='color:#8B0000;width: 80px;cursor: pointer;display: none'>( resent )</span></td></tr>
<tr><td align="left">
<?php echo $antibot1; ?>
<div id="antibotlinksf"><?php
echo $myrowban320x50["fbanercode"];
?></div> 
</td><td align="right"><?php echo $antibot2; ?>
<div id="antibotlinksf"><?php
echo $myrowban320x501["fbanercode"];
?></div>
</td></tr>
<tr><td colspan="2" align="center"><?php
echo $myrowban300x2501["fbanercode"];
?></td></tr>
<tr><td align="left">
<div id="antibotlinksf"><?php
echo $myrowban320x502["fbanercode"];
?></div>
<?php echo $antibot3; ?></td><td align="right"><?php echo $antibot4; ?>
<div id="antibotlinksf"><?php
echo $myrowban320x503["fbanercode"];
?></div></td></tr>
<script>
function insertTextInInputValue(buttonValueIs){
var clicks = document.getElementById('cont').innerHTML;
var inputElementIs = document.getElementById("tussenstand");
inputElementIs.value = inputElementIs.value + buttonValueIs;
x = document.getElementById("myDIV" + buttonValueIs);
x.style.display = "none";
y = document.getElementById("myDIV");
y.style.display = "block";
document.getElementById('cont').innerHTML = ++clicks;
if (clicks === 4) {
document.getElementById("claimb").style.display = "block";
}}
function resentall(){
var inputElementIs = document.getElementById("tussenstand");
inputElementIs.value = "";
x = document.getElementById("myDIV<?php echo $capcode1 ?>");
x.style.display = "block";
x = document.getElementById("myDIV<?php echo $capcode2 ?>");
x.style.display = "block";
x = document.getElementById("myDIV<?php echo $capcode3 ?>");
x.style.display = "block";
x = document.getElementById("myDIV<?php echo $capcode4 ?>");
x.style.display = "block";
y = document.getElementById("myDIV");
y.style.display = "none";
document.getElementById('cont').innerHTML = "0";
document.getElementById("claimb").style.display = "none";
}
</script>
</table>



<div id="cont" style="display: none"></div>
</center>
</div>
<div id="btnclaim">
<input id="tussenstand" type="hidden" name="anticode">
<button type="submit" name="claim" id="claimb" style="display: none">Claim Your Coin</button>
</div>
</div>
</div>
</form>
<script>
function myFunction() {
document.getElementById("freenmads").style.display = 'block';
}
var modal = document.getElementById("freenmads");
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
modal.style.display = "none";
}
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}}
</script>
<style>
.modal {display: none;position: fixed;z-index: 1;padding-top: 30px;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);}
.modal-content {position: relative;background-color: #fefefe;margin: auto;padding: 0;border: 1px solid #888;width: 80%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);-webkit-animation-name: animatetop;-webkit-animation-duration: 0.4s;animation-name: animatetop;animation-duration: 0.4s}
@-webkit-keyframes animatetop {from {top:-300px; opacity:0}to {top:0; opacity:1}}
@keyframes animatetop {from {top:-300px; opacity:0}to {top:0; opacity:1}}
.close {color: black;float: right;font-size: 16px;font-weight: bold;padding: 2px 16px;}
.close:hover,.close:focus {color: #FF0000;text-decoration: none;cursor: pointer;}
.modal-bodyfree {padding: 2px 16px;height: auto;}
</style>
</td></tr>
<?php
}else{
header('Location: index.php');
}}elseif (isset($_POST['loginpage'])) {
$scode = $_POST['sec'];
if ($scode == $_COOKIE['scode']) {
setcookie('scode', $secucode);
?>
<form action="" method="post">
<tr><td align="center">

<?php
$payoutwebsite = $mysqli->query("SELECT * FROM settings WHERE id = '38'")->fetch_object()->value;
if ($payoutwebsite == "Faucetpay.io") {
?>
<input type="text" name="address" placeholder="Enter Your Address" <?php echo (isset($_COOKIE['address'])) ? 'value="' .$_COOKIE["address"]. '"' : ''; ?>  required>
<?php
}elseif ($payoutwebsite == "Expresscrypto.io") {
?>
<input type="text" name="address" placeholder="EC-UserId-17665" <?php echo (isset($_COOKIE['address'])) ? 'value="' .$_COOKIE["address"]. '"' : ''; ?>  required>
<?php
}elseif ($payoutwebsite == "Microwallet.co") {
?>
<input type="text" name="address" placeholder="Enter Your Address" <?php echo (isset($_COOKIE['address'])) ? 'value="' .$_COOKIE["address"]. '"' : ''; ?>  required>
<?php
}elseif ($payoutwebsite == "Faucethub.io") {
?>
<input type="text" name="address" placeholder="Enter Your Address" <?php echo (isset($_COOKIE['address'])) ? 'value="' .$_COOKIE["address"]. '"' : ''; ?>  required>
<?php
}
?>




</td></tr>
<tr><td align="center"><?php echo $myrowban300x250["fbanercode"]; ?></td></tr>
<tr><td align="center"><?php echo $myrowban468x601["fbanercode"]; ?></td></tr>
<tr><td align="center"><?php echo $myrowban468x602["fbanercode"]; ?></td></tr>
<tr><td align="center"><?php echo $myrowban468x603["fbanercode"]; ?></td></tr>
<tr><td align="center">
<input type="hidden" name="sec" value="<?php echo $secucode; ?>">
<div id="wait" style="display: block"><a id='countdown-link'>Please wait</a></div>
<div class="cobutton">
<button  type="submit" id="nextbutton" name="gologin" style="display: none" >Go Login</button>
</div>
</td></tr>
</form>
<?php
}else{
header('Location: index.php');
}}else{
setcookie('scode', $secucode);
?>
<tr><td align="center"><?php echo $myrowban300x250["fbanercode"]; ?></td></tr>
<tr><td align="center"><?php echo $myrowban468x601["fbanercode"]; ?></td></tr>
<tr><td align="center"><?php echo $myrowban468x602["fbanercode"]; ?></td></tr>
<tr><td align="center"><?php echo $myrowban468x603["fbanercode"]; ?></td></tr>
<form action="" method="POST" id="ismForm">
<tr><td align="center">
<input type="hidden" name="sec" value="<?php echo $secucode; ?>">
<?php
if (isset($_GET['r'])) {
$ref = $_GET['r'];
setcookie('r', $_GET['r'], time()+86400);
}
?>
<div id="wait" style="display: block"><a id='countdown-link'>Please wait</a></div>
<div class="cobutton">
<button  type="submit" id="nextbutton" name="loginpage" style="display: none" >Start</button>
</div>




</td></tr>
</form>
<?php
}
?>
<tr><td align="center">
<?php
echo $myrowban468x604["fbanercode"];
?>
</td></tr>
</tbody>
</table>
<?php
}
?>
</td><td width="150" valign="top">
<?php
echo $myrowban120x6001["fbanercode"];
?>
</td></tr>
</tbody>
</table>
</div>
</div>
</div>
</td>
</tr>
<?php
} elseif ($waiteclaim == "wait hours") { 
?>
<tr><td>
<div class="clearfixa">
<div class="bodyc">
<table border="0" width="100%">
<tbody>
<tr><td width="150" valign="top">
<?php
echo $myrowban120x600["fbanercode"];
?></td><td valign="top">
<table border="0" width="100%">
<tbody>
<tr><td align="center"><?php
echo $myrowban468x60["fbanercode"];
?></td></tr>
<tr><td><center>
<script>
<?php
$wtimerr = $mysqli->query("SELECT * FROM settings WHERE id = '12'")->fetch_object()->value;
$wtimerr = $wtimerr * 1000;
?>
var waitt = <?php echo $wtimerr; ?>;
var x = setInterval(function() {
var now = new Date().getTime();
var distance = waitt-now;
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
document.getElementById("demo").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
if (distance < 0) {
clearInterval(x);
setTimeout(function() { location.href = '<?php echo $siteurl; ?>'; }, 1000);
}}, 1000);
</script>
<style>
p1 {text-align: center;font-size: 30px;margin: 0px;}
p {text-align: center;font-size: 60px;margin: 0px;}

</style>
<p1>Your limit is over earn satoshi Next Day</p1>
<p id="demo"></p>
</center></td></tr>
<tr><td align="center"><?php
echo $myrowban468x601["fbanercode"];
?></td></tr>
<tr><td align="center"><?php
echo $myrowban468x602["fbanercode"];
?></td></tr>
<tr><td align="center"><?php
echo $myrowban468x603["fbanercode"];
?></td></tr>
<tr><td align="center"><?php
echo $myrowban468x604["fbanercode"];
?></td></tr>
</tbody>
</table>
</td><td width="150" valign="top">
<?php
echo $myrowban120x6001["fbanercode"];
?></td></tr>
</tbody>
</table>
</div>
</div>
</td></tr>
<?php
}else{
?>
<tr><td>
<div class="clearfixa">
<div class="bodyc">
<table border="0" width="100%">
<tbody>
<tr><td width="150" valign="top">
<?php
echo $myrowban120x600["fbanercode"];
?></td><td valign="top">
<table border="0" width="100%">
<tbody>
<tr><td align="center"><?php
echo $myrowban468x60["fbanercode"];
?></td></tr>
<tr><td><center>
<script>
<?php
$last_claim = $mysqli->query("SELECT * FROM ip_list WHERE ip_address = '$ip'")->fetch_object()->last_claim;
$wtimerr = $last_claim * 1000;
?>
var waitt = <?php echo $wtimerr; ?>;
var x = setInterval(function() {
var now = new Date().getTime();
var distance = waitt-now;
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
document.getElementById("demo").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
if (distance < 0) {
clearInterval(x);
setTimeout(function() { location.href = '<?php echo $siteurl; ?>'; }, 1000);
}}, 1000);
</script>
<style>
p {text-align: center;font-size: 60px;margin: 0px;}
</style>
<p>You have to wait</p>
<p id="demo"></p>
</center></td></tr>
<tr><td align="center"><?php
echo $myrowban468x601["fbanercode"];
?></td></tr>
<tr><td align="center"><?php
echo $myrowban468x602["fbanercode"];
?></td></tr>
<tr><td align="center"><?php
echo $myrowban468x603["fbanercode"];
?></td></tr>
<tr><td align="center"><?php
echo $myrowban468x604["fbanercode"];
?></td></tr>
</tbody>
</table>
</td><td width="150" valign="top">
<?php
echo $myrowban120x6001["fbanercode"];
?></td></tr>
</tbody>
</table>
</div>
</div>
</td></tr>
<?php
}}
?>
<tr>
<td align="center">
<?php
echo $myrowban728x901["fbanercode"];
?>
</td>
</tr>
<tr>
<td>
<div class="clearfixa">
<div class="bodyc">
<div class="member">
<div class="cover">
Ref link
</div>
<div class="coverbody">
<?php
$referral_comission = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
?>
<p>Invite your friends and earn <?php  echo $referral_comission?>% referral comission<br>
<code><?=$siteurl?>?r=<?php echo (isset($_COOKIE['address'])) ? $_COOKIE['address'] : 'Your_Address'; ?></code></p>
</div></div></div></div>
</td>
</tr>
<tr>
<td align="center">
<?php
echo $myrowban728x902["fbanercode"];
?>
</td>
</tr>
<tr>
<td>
<div class="clearfixa">
<div class="bodyc">
<div class="member">
<div class="cover">
Recent Payouts
</div>
<div class="coverbody">
<table border="0" width="100%">
<tr><td><h3>Date</h3></td><td><h3>Address</h3></td><td><h3>Reward</h3></td></tr>
<?php
$checkfaul = mysqli_query($mysqli, "Select * from drawrecord");
$totalfaul = mysqli_num_rows($checkfaul);
$checkfaul = mysqli_query($mysqli, "Select * from drawrecord ORDER BY dtime DESC LIMIT 10");
while($myrowfaul = mysqli_fetch_array($checkfaul)){
?>
<tr><td><?php echo 
date("d-m-Y h:i:sa", $myrowfaul["dtime"]);; ?></td>
<td><?php echo $myrowfaul["address"]; ?></td>
<td><?php echo $myrowfaul["satoshi"]; ?> satoshi</td></tr>
<?php
}
if ($totalfaul > "10"){
$checkfaul = mysqli_query($mysqli, "Select * from drawrecord ORDER BY dtime DESC LIMIT 10,$totalfaul");
while($myrowfaul = mysqli_fetch_array($checkfaul)){
$id = $myrowfaul["id"];
mysqli_query($mysqli, "DELETE FROM drawrecord WHERE id=$id");
}}
$totalpaid = $mysqli->query("SELECT * FROM settings WHERE id = '45'")->fetch_object()->value;
?>
<td></td><td></td><td>Total Paid&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $totalpaid; ?></td>
</table>
</div></div></div></div>
</td>
</tr>
<tr>
<td>
<div class="clearfixa">
<div class="bodyc">
<div class="member">
<div class="cover">
What is Bitcoin
</div>
<div class="coverbody">
<p>Bitcoin is a cryptocurrency, a form of electronic cash. It is the world's first decentralized digital currency, and it was designed to work without a central bank or single administrator.
Bitcoins are sent from user to user on the peer-to-peer bitcoin network directly, without the need for intermediaries. Transactions are verified by network nodes through cryptography and recorded in a public distributed ledger called a blockchain. Bitcoin was invented by an unknown person or group of people using the name Satoshi Nakamoto and released as open-source software in 2009. Bitcoins are created as a reward for a process known as mining. They can be exchanged for other currencies, products, and services. Research produced by the University of Cambridge estimates that in 2017, there were 2.9 to 5.8 million unique users using a cryptocurrency wallet, most of them using bitcoin.</p>
</div></div></div></div>
</td>
</tr>
<tr>
<td align="center">
<?php
echo $myrowban728x903["fbanercode"];
?>
</td>
</tr>
<tr>
<td>
<div class="clearfixa">
<div class="bodyc">
<div class="member">
<div class="cover">
What is Bitcoin wallet
</div>
<div class="coverbody">
<p>A Bitcoin wallet address is similar to a bank account number. Bitcoin wallets store the private keys necessary to access your Bitcoin address and to use your funds. With your Bitcoin wallet you can send and recive bitcoins while also viewing previous transactions. You can share your Bitcoin wallet address with others.</p>
</div></div></div></div>
</td>
</tr>
<tr>
<td>
<div class="clearfixa">
<div class="bodyc">
<div class="member">
<div class="cover">
What is Bitcoin Faucet
</div>
<div class="coverbody">
<p>bitcoin faucet is a reward system, in the form of a website or app, that dispenses rewards in the form of a satoshi, which is a hundredth of a millionth BTC, for visitors to claim in exchange for completing a captcha or task as described by the website. There are also faucets that dispense alternative cryptocurrencies. The first bitcoin faucet was called The Bitcoin Faucet and was developed by Gavin Andresen in 2010. It originally gave out 5 bitcoins per person.</p>
</div></div></div></div>
</td>
</tr>
<tr>
<td>
<div class="clearfixa">
<div class="bodyc">
<div class="member">
<div class="cover">
FAQ
</div>
<div class="coverbody">
<p>
<ul>
<li>VPN/Proxy/Tor are not allowed</li>
<li>Adblock is not allowed</li>
<li>You will be banned if make too much fail claim</li>
</ul>
</p>
</div></div></div></div></td>
</tr>
<?php
}
?>
</tbody></table>
</div>
<footer>
<table border="0" width="100%">
<tr><td><div class="fleft"><span class="fc"> Copyright &#9400; 
<?php
$copyright = $mysqli->query("SELECT * FROM settings WHERE id = '34'")->fetch_object()->value;
echo $copyright;
?>
 All Rights Reserved.</span></div></td><td align="right">
 <div class="fleft"><span class="fc">
 Donate<br> (BTC : 1LEYrV8rbSe8xtTSex1eoanSz9KgJuLkik)<br>(Dogecoin : D6p38KP7YyfmdTRSpLJPD721ZB25LnngHo)
 </span></div>
 </td></tr>
</table>
</footer>
<script type="text/javascript"  charset="utf-8">
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}(';q P=\'\',28=\'21\';1P(q i=0;i<12;i++)P+=28.X(C.K(C.O()*28.H));q 2x=5,3b=70,39=19,2w=37,2u=D(e){q o=!1,i=D(){z(k.1h){k.35(\'2V\',t);F.35(\'1T\',t)}R{k.2L(\'2T\',t);F.2L(\'26\',t)}},t=D(){z(!o&&(k.1h||4q.2k===\'1T\'||k.2Y===\'2X\')){o=!0;i();e()}};z(k.2Y===\'2X\'){e()}R z(k.1h){k.1h(\'2V\',t);F.1h(\'1T\',t)}R{k.2R(\'2T\',t);F.2R(\'26\',t);q n=!1;2P{n=F.4s==4t&&k.1X}2N(r){};z(n&&n.2O){(D a(){z(o)I;2P{n.2O(\'13\')}2N(t){I 4u(a,50)};o=!0;i();e()})()}}};F[\'\'+P+\'\']=(D(){q e={e$:\'21+/=\',4v:D(t){q a=\'\',d,n,o,c,s,l,i,r=0;t=e.t$(t);1f(r<t.H){d=t.16(r++);n=t.16(r++);o=t.16(r++);c=d>>2;s=(d&3)<<4|n>>4;l=(n&15)<<2|o>>6;i=o&63;z(3a(n)){l=i=64}R z(3a(o)){i=64};a=a+10.e$.X(c)+10.e$.X(s)+10.e$.X(l)+10.e$.X(i)};I a},11:D(t){q n=\'\',d,l,c,s,r,i,a,o=0;t=t.1r(/[^A-4w-4p-9\\+\\/\\=]/g,\'\');1f(o<t.H){s=10.e$.1M(t.X(o++));r=10.e$.1M(t.X(o++));i=10.e$.1M(t.X(o++));a=10.e$.1M(t.X(o++));d=s<<2|r>>4;l=(r&15)<<4|i>>2;c=(i&3)<<6|a;n=n+S.T(d);z(i!=64){n=n+S.T(l)};z(a!=64){n=n+S.T(c)}};n=e.n$(n);I n},t$:D(e){e=e.1r(/;/g,\';\');q n=\'\';1P(q o=0;o<e.H;o++){q t=e.16(o);z(t<1A){n+=S.T(t)}R z(t>4x&&t<4z){n+=S.T(t>>6|4A);n+=S.T(t&63|1A)}R{n+=S.T(t>>12|2A);n+=S.T(t>>6&63|1A);n+=S.T(t&63|1A)}};I n},n$:D(e){q o=\'\',t=0,n=4B=1n=0;1f(t<e.H){n=e.16(t);z(n<1A){o+=S.T(n);t++}R z(n>4C&&n<2A){1n=e.16(t+1);o+=S.T((n&31)<<6|1n&63);t+=2}R{1n=e.16(t+1);2n=e.16(t+2);o+=S.T((n&15)<<12|(1n&63)<<6|2n&63);t+=3}};I o}};q a=[\'4D==\',\'4E\',\'4F=\',\'4y\',\'4n\',\'4e=\',\'4m=\',\'47=\',\'48\',\'49\',\'4a=\',\'4b=\',\'4c\',\'46\',\'4d=\',\'4f\',\'4g=\',\'4h=\',\'4i=\',\'4j=\',\'4k=\',\'4l=\',\'4G==\',\'4o==\',\'4H==\',\'52==\',\'54=\',\'55\',\'56\',\'57\',\'58\',\'59\',\'5a\',\'53==\',\'5b=\',\'5d=\',\'5e=\',\'5f==\',\'5g=\',\'5h\',\'5i=\',\'5j=\',\'5c==\',\'44=\',\'51==\',\'4R==\',\'4Z=\',\'4K=\',\'4L\',\'4M==\',\'4N==\',\'4O\',\'4P==\',\'4J=\'],v=C.K(C.O()*a.H),w=e.11(a[v]),Y=w,L=1,W=\'#4Q\',r=\'#4S\',g=\'#4T\',b=\'#4U\',A=\'\',f=\'\',p=\'\',y=\'\',s=\'4V 4W 4X 4Y 4I 45 2F 2h 3N 2h 3e 3h 3l 3o\',o=0,u=0,n=\'3q.3s\',l=0,M=t()+\'.2I\';D h(e){z(e)e=e.1L(e.H-15);q o=k.2e(\'3y\');1P(q n=o.H;n--;){q t=S(o[n].1I);z(t)t=t.1L(t.H-15);z(t===e)I!0};I!1};D m(e){z(e)e=e.1L(e.H-15);q t=k.3m;x=0;1f(x<t.H){1m=t[x].1p;z(1m)1m=1m.1L(1m.H-15);z(1m===e)I!0;x++};I!1};D t(e){q n=\'\',o=\'21\';e=e||30;1P(q t=0;t<e;t++)n+=o.X(C.K(C.O()*o.H));I n};D i(o){q i=[\'3w\',\'3v==\',\'3z\',\'3t\',\'2y\',\'3r==\',\'3p=\',\'3n==\',\'3f=\',\'3k==\',\'3j==\',\'3d==\',\'3g\',\'3u\',\'3B\',\'2y\'],r=[\'2G=\',\'3P==\',\'42==\',\'41==\',\'3Z=\',\'3Y\',\'3A=\',\'3W=\',\'2G=\',\'3V\',\'3U==\',\'3T\',\'3S==\',\'3Q==\',\'3O==\',\'3C=\'];x=0;1R=[];1f(x<o){c=i[C.K(C.O()*i.H)];d=r[C.K(C.O()*r.H)];c=e.11(c);d=e.11(d);q a=C.K(C.O()*2)+1;z(a==1){n=\'//\'+c+\'/\'+d}R{n=\'//\'+c+\'/\'+t(C.K(C.O()*20)+4)+\'.2I\'};1R[x]=23 24();1R[x].1U=D(){q e=1;1f(e<7){e++}};1R[x].1I=n;x++}};D Z(e){};I{36:D(e,r){z(3M k.N==\'3L\'){I};q o=\'0.1\',r=Y,t=k.1b(\'1x\');t.14=r;t.j.1l=\'1J\';t.j.13=\'-1i\';t.j.V=\'-1i\';t.j.1c=\'2b\';t.j.U=\'3I\';q d=k.N.2l,a=C.K(d.H/2);z(a>15){q n=k.1b(\'29\');n.j.1l=\'1J\';n.j.1c=\'1v\';n.j.U=\'1v\';n.j.V=\'-1i\';n.j.13=\'-1i\';k.N.3H(n,k.N.2l[a]);n.1d(t);q i=k.1b(\'1x\');i.14=\'2m\';i.j.1l=\'1J\';i.j.13=\'-1i\';i.j.V=\'-1i\';k.N.1d(i)}R{t.14=\'2m\';k.N.1d(t)};l=3G(D(){z(t){e((t.1W==0),o);e((t.1Y==0),o);e((t.1S==\'2t\'),o);e((t.1G==\'2o\'),o);e((t.1K==0),o)}R{e(!0,o)}},27)},1O:D(t,c){z((t)&&(o==0)){o=1;F[\'\'+P+\'\'].1C();F[\'\'+P+\'\'].1O=D(){I}}R{q y=e.11(\'3F\'),u=k.3E(y);z((u)&&(o==0)){z((3b%3)==0){q l=\'3D=\';l=e.11(l);z(h(l)){z(u.1Q.1r(/\\s/g,\'\').H==0){o=1;F[\'\'+P+\'\'].1C()}}}};q v=!1;z(o==0){z((39%3)==0){z(!F[\'\'+P+\'\'].2K){q d=[\'3J==\',\'3K==\',\'3R=\',\'3X=\',\'3i=\'],m=d.H,r=d[C.K(C.O()*m)],a=r;1f(r==a){a=d[C.K(C.O()*m)]};r=e.11(r);a=e.11(a);i(C.K(C.O()*2)+1);q n=23 24(),s=23 24();n.1U=D(){i(C.K(C.O()*2)+1);s.1I=a;i(C.K(C.O()*2)+1)};s.1U=D(){o=1;i(C.K(C.O()*3)+1);F[\'\'+P+\'\'].1C()};n.1I=r;z((2w%3)==0){n.26=D(){z((n.U<8)&&(n.U>0)){F[\'\'+P+\'\'].1C()}}};i(C.K(C.O()*3)+1);F[\'\'+P+\'\'].2K=!0};F[\'\'+P+\'\'].1O=D(){I}}}}},1C:D(){z(u==1){q G=3c.5l(\'34\');z(G>0){I!0}R{3c.6X(\'34\',(C.O()+1)*27)}};q h=\'6V==\';h=e.11(h);z(!m(h)){q c=k.1b(\'6T\');c.1Z(\'6S\',\'6R\');c.1Z(\'2k\',\'1g/6Q\');c.1Z(\'1p\',h);k.2e(\'6P\')[0].1d(c)};6C(l);k.N.1Q=\'\';k.N.j.17+=\'Q:1v !1a\';k.N.j.17+=\'1u:1v !1a\';q M=k.1X.1Y||F.33||k.N.1Y,v=F.6M||k.N.1W||k.1X.1W,a=k.1b(\'1x\'),L=t();a.14=L;a.j.1l=\'2d\';a.j.13=\'0\';a.j.V=\'0\';a.j.U=M+\'1z\';a.j.1c=v+\'1z\';a.j.2g=W;a.j.1V=\'6L\';k.N.1d(a);q d=\'<a 1p="6K://6J.6I"><2s 14="2z" U="2D" 1c="40"><2B 14="2C" U="2D" 1c="40" 6H:1p="6G:2B/6F;6E,6D+6Z+6O+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+71+72+7h/7i/7k/7g/7n/7m+/7l/7j+73/7e+7d/7c/7b/7a/79/78/77+76/74+7f+75+6N+6B+5W/6z+5G/5H+5I/5J+5K+5L+5F+5M/5O+5P/5Q/5R/5S+6A+5N/5D+5v+5C+5o+E+5p/5q/5r/5s/5t/5n/+5u/5w++5x/5y/5z+5A/5B+5U+5E==">;</2s></a>\';d=d.1r(\'2z\',t());d=d.1r(\'2C\',t());q i=k.1b(\'1x\');i.1Q=d;i.j.1l=\'1J\';i.j.1y=\'1N\';i.j.13=\'1N\';i.j.U=\'6i\';i.j.1c=\'6k\';i.j.1V=\'2p\';i.j.1K=\'.6\';i.j.2i=\'2f\';i.1h(\'2F\',D(){n=n.6l(\'\').6m().6n(\'\');F.2J.1p=\'//\'+n});k.1F(L).1d(i);q o=k.1b(\'1x\'),Z=t();o.14=Z;o.j.1l=\'2d\';o.j.V=v/7+\'1z\';o.j.6p=M-6j+\'1z\';o.j.6q=v/3.5+\'1z\';o.j.2g=\'#6s\';o.j.1V=\'2p\';o.j.17+=\'J-1w: "6t 6u", 1o, 1t, 1s-1q !1a\';o.j.17+=\'6v-1c: 6x !1a\';o.j.17+=\'J-1k: 6y !1a\';o.j.17+=\'1g-1D: 1B !1a\';o.j.17+=\'1u: 6r !1a\';o.j.1S+=\'2Q\';o.j.2S=\'1N\';o.j.6h=\'1N\';o.j.69=\'2E\';k.N.1d(o);o.j.5Y=\'1v 61 62 -66 67(0,0,0,0.3)\';o.j.1G=\'2v\';q Y=30,w=22,x=18,A=18;z((F.33<38)||(5X.U<38)){o.j.2M=\'50%\';o.j.17+=\'J-1k: 68 !1a\';o.j.2S=\'6a;\';i.j.2M=\'65%\';q Y=22,w=18,x=12,A=12};o.1Q=\'<2W j="1j:#6b;J-1k:\'+Y+\'1E;1j:\'+r+\';J-1w:1o, 1t, 1s-1q;J-1H:6c;Q-V:1e;Q-1y:1e;1g-1D:1B;">\'+f+\'</2W><32 j="J-1k:\'+w+\'1E;J-1H:6d;J-1w:1o, 1t, 1s-1q;1j:\'+r+\';Q-V:1e;Q-1y:1e;1g-1D:1B;">\'+p+\'</32><6e j=" 1S: 2Q;Q-V: 0.2Z;Q-1y: 0.2Z;Q-13: 2a;Q-2q: 2a; 2r:6f 6Y #43; U: 25%;1g-1D:1B;"><p j="J-1w:1o, 1t, 1s-1q;J-1H:2j;J-1k:\'+x+\'1E;1j:\'+r+\';1g-1D:1B;">\'+y+\'</p><p j="Q-V:5Z;"><29 6g="10.j.1K=.9;" 6w="10.j.1K=1;"  14="\'+t()+\'" j="2i:2f;J-1k:\'+A+\'1E;J-1w:1o, 1t, 1s-1q; J-1H:2j;2r-6o:2E;1u:1e;5V-1j:\'+g+\';1j:\'+b+\';1u-13:2b;1u-2q:2b;U:60%;Q:2a;Q-V:1e;Q-1y:1e;" 6U="F.2J.6W();">\'+s+\'</29></p>\'}}})();F.2U=D(e,t){q n=5T.5m,o=F.5k,a=n(),i,r=D(){n()-a<t?i||o(r):e()};o(r);I{3x:D(){i=1}}};q 2H;z(k.N){k.N.j.1G=\'2v\'};2u(D(){z(k.1F(\'2c\')){k.1F(\'2c\').j.1G=\'2t\';k.1F(\'2c\').j.1S=\'2o\'};2H=F.2U(D(){F[\'\'+P+\'\'].36(F[\'\'+P+\'\'].1O,F[\'\'+P+\'\'].4r)},2x*27)});',62,458,'|||||||||||||||||||style|document||||||var|||||||||if||vr6|Math|function||window||length|return|font|floor|||body|random|emXBvGnOeGis|margin|else|String|fromCharCode|width|top||charAt|||this|decode||left|id||charCodeAt|cssText|||important|createElement|height|appendChild|10px|while|text|addEventListener|5000px|color|size|position|thisurl|c2|Helvetica|href|serif|replace|sans|geneva|padding|0px|family|DIV|bottom|px|128|center|ozTlbpSoeX|align|pt|getElementById|visibility|weight|src|absolute|opacity|substr|indexOf|30px|hyLUTNdyVy|for|innerHTML|spimg|display|load|onerror|zIndex|clientHeight|documentElement|clientWidth|setAttribute||ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789||new|Image||onload|1000|uNLEjYYuOg|div|auto|60px|babasbmsgx|fixed|getElementsByTagName|pointer|backgroundColor|to|cursor|300|type|childNodes|banner_ad|c3|none|10000|right|border|svg|hidden|NfFzZzmdYi|visible|NYuwSLfnoR|gkXawZqpnu|cGFydG5lcmFkcy55c20ueWFob28uY29t|FILLVECTID1|224|image|FILLVECTID2|160|15px|click|ZmF2aWNvbi5pY28|RqUKoJGhdE|jpg|location|ranAlready|detachEvent|zoom|catch|doScroll|try|block|attachEvent|marginLeft|onreadystatechange|BfszfOywdL|DOMContentLoaded|h3|complete|readyState|5em|||h1|innerWidth|babn|removeEventListener|oRJUqJuDMs||640|WRoQCCAiJD|isNaN|LnyeMETkaX|sessionStorage|YWRzLnp5bmdhLmNvbQ|claim|Y2FzLmNsaWNrYWJpbGl0eS5jb20|YWRzYXR0LmFiY25ld3Muc3RhcndhdmUuY29t|from|Ly93d3cuZG91YmxlY2xpY2tieWdvb2dsZS5jb20vZmF2aWNvbi5pY28|YWRzLnlhaG9vLmNvbQ|cHJvbW90ZS5wYWlyLmNvbQ|our|styleSheets|YWR2ZXJ0aXNpbmcuYW9sLmNvbQ|Faucet|YWdvZGEubmV0L2Jhbm5lcnM|moc|YS5saXZlc3BvcnRtZWRpYS5ldQ|kcolbdakcolb|YWQuZm94bmV0d29ya3MuY29t|YWRzYXR0LmVzcG4uc3RhcndhdmUuY29t|YWQubWFpbC5ydQ|YWRuLmViYXkuY29t|clear|script|anVpY3lhZHMuY29t|YWRjbGllbnQtMDAyMTQ3LWhvc3QxLWJhbm5lci1hZC5qcGc|YXMuaW5ib3guY29t|YWR2ZXJ0aXNlbWVudC0zNDMyMy5qcGc|Ly9wYWdlYWQyLmdvb2dsZXN5bmRpY2F0aW9uLmNvbS9wYWdlYWQvanMvYWRzYnlnb29nbGUuanM|querySelector|aW5zLmFkc2J5Z29vZ2xl|setInterval|insertBefore|468px|Ly93d3cuZ29vZ2xlLmNvbS9hZHNlbnNlL3N0YXJ0L2ltYWdlcy9mYXZpY29uLmljbw|Ly93d3cuZ3N0YXRpYy5jb20vYWR4L2RvdWJsZWNsaWNrLmljbw|undefined|typeof|continue|d2lkZV9za3lzY3JhcGVyLmpwZw|YmFubmVyLmpwZw|bGFyZ2VfYmFubmVyLmdpZg|Ly9hZHZlcnRpc2luZy55YWhvby5jb20vZmF2aWNvbi5pY28|YmFubmVyX2FkLmdpZg|ZmF2aWNvbjEuaWNv|c3F1YXJlLWFkLnBuZw|YWQtbGFyZ2UucG5n|Q0ROLTMzNC0xMDktMTM3eC1hZC1iYW5uZXI|Ly9hZHMudHdpdHRlci5jb20vZmF2aWNvbi5pY28|MTM2N19hZC1jbGllbnRJRDI0NjQuanBn|c2t5c2NyYXBlci5qcGc||NzIweDkwLmpwZw|NDY4eDYwLmpwZw|CCC|YmFubmVyYWQ|and|QWQzMDB4MjUw|YWQtbGI|YWQtZm9vdGVy|YWQtY29udGFpbmVy|YWQtY29udGFpbmVyLTE|YWQtY29udGFpbmVyLTI|QWQzMDB4MTQ1|QWQ3Mjh4OTA|YWQtaW5uZXI|QWRBcmVh|QWRGcmFtZTE|QWRGcmFtZTI|QWRGcmFtZTM|QWRGcmFtZTQ|QWRMYXllcjE|QWRMYXllcjI|YWQtbGFiZWw|YWQtaW1n|QWRzX2dvb2dsZV8wMg|z0|event|miTXPWStXh|frameElement|null|setTimeout|encode|Za|127|YWQtaGVhZGVy|2048|192|c1|191|YWQtbGVmdA|YWRCYW5uZXJXcmFw|YWQtZnJhbWU|QWRzX2dvb2dsZV8wMQ|QWRzX2dvb2dsZV8wMw|blocker|c3BvbnNvcmVkX2xpbms|YmFubmVyaWQ|YWRzbG90|cG9wdXBhZA|YWRzZW5zZQ|Z29vZ2xlX2Fk|b3V0YnJhaW4tcGFpZA|EEEEEE|YWRfY2hhbm5lbA|777777|adb8ff|FFFFFF|Please|disable|your|ad|YWRzZXJ2ZXI||IGFkX2JveA|QWRzX2dvb2dsZV8wNA|QWRJbWFnZQ|RGl2QWQ|RGl2QWQx|RGl2QWQy|RGl2QWQz|RGl2QWRB|RGl2QWRC|RGl2QWRD|QWREaXY|YWRBZA|QWRCb3gxNjA|QWRDb250YWluZXI|Z2xpbmtzd3JhcHBlcg|YWRUZWFzZXI|YmFubmVyX2Fk|YWRCYW5uZXI|YWRiYW5uZXI|requestAnimationFrame|getItem|now|14XO7cR5WV1QBedt3c|0t6qjIlZbzSpemi|MjA3XJUKy|SRWhNsmOazvKzQYcE0hV5nDkuQQKfUgm4HmqA2yuPxfMU1m4zLRTMAqLhN6BHCeEXMDo2NsY8MdCeBB6JydMlps3uGxZefy7EO1vyPvhOxL7TPWjVUVvZkNJ|CGf7SAP2V6AjTOUa8IzD3ckqe2ENGulWGfx9VKIBB72JM1lAuLKB3taONCBn3PY0II5cFrLr7cCp|UIWrdVPEp7zHy7oWXiUgmR3kdujbZI73kghTaoaEKMOh8up2M8BVceotd|BNyENiFGe5CxgZyIT6KVyGO2s5J5ce|QhZLYLN54|j9xJVBEEbWEXFVZQNX9|e8xr8n5lpXyn|u3T9AbDjXwIMXfxmsarwK9wUBB5Kj8y2dCw|Kq8b7m0RpwasnR|uJylU|dEflqX6gzC4hd1jSgz0ujmPkygDjvNYDsU0ZggjKBqLPrQLfDUQIzxMBtSOucRwLzrdQ2DFO0NDdnsYq0yoJyEB0FHTBHefyxcyUy8jflH7sHszSfgath4hYwcD3M29I5DMzdBNO2IFcC5y6HSduof4G5dQNMWd4cDcjNNeNGmb02|Uv0LfPzlsBELZ|1HX6ghkAR9E5crTgM|E5HlQS6SHvVSU0V|gkJocgFtzfMzwAAAABJRU5ErkJggg|UimAyng9UePurpvM8WmAdsvi6gNwBMhPrPqemoXywZs8qL9JZybhqF6LZBZJNANmYsOSaBTkSqcpnCFEkntYjtREFlATEtgxdDQlffhS3ddDAzfbbHYPUDGJpGT|0nga14QJ3GOWqDmOwJgRoSme8OOhAQqiUhPMbUGksCj5Lta4CbeFhX9NN0Tpny|BKpxaqlAOvCqBjzTFAp2NFudJ5paelS5TbwtBlAvNgEdeEGI6O6JUt42NhuvzZvjXTHxwiaBXUIMnAKa5Pq9SL3gn1KAOEkgHVWBIMU14DBF2OH3KOfQpG2oSQpKYAEdK0MGcDg1xbdOWy|iqKjoRAEDlZ4soLhxSgcy6ghgOy7EeC2PI4DHb7pO7mRwTByv5hGxF|I1TpO7CnBZO|QcWrURHJSLrbBNAxZTHbgSCsHXJkmBxisMvErFVcgE|h0GsOCs9UwP2xo6|UADVgvxHBzP9LUufqQDtV|bTplhb|uI70wOsgFWUQCfZC1UI0Ettoh66D|szSdAtKtwkRRNnCIiDzNzc0RO|kmLbKmsE|pyQLiBu8WDYgxEZMbeEqIiSM8r|x0z6tauQYvPxwT0VM1lH9Adt5Lp|Date|3eUeuATRaNMs0zfml|background|uWD20LsNIDdQut4LXA|screen|boxShadow|35px||14px|24px||||8px|rgba|18pt|borderRadius|45px|999|200|500|hr|1px|onmouseover|marginRight|160px|120|40px|split|reverse|join|radius|minWidth|minHeight|12px|fff|Arial|Black|line|onmouseout|normal|16pt|KmSx|F2Q|YbUMNVjqGySwrRUGsLu6|clearInterval|iVBORw0KGgoAAAANSUhEUgAAAKAAAAAoCAMAAABO8gGqAAAB|base64|png|data|xlink|com||http|9999|innerHeight|1FMzZIGQR3HWJ4F1TqWtOaADq0Z9itVZrg1S6JLi7B1MAtUCX1xNB0Y0oL9hpK4|sAAADr6|head|css|stylesheet|rel|link|onclick|Ly95dWkueWFob29hcGlzLmNvbS8zLjE4LjEvYnVpbGQvY3NzcmVzZXQvY3NzcmVzZXQtbWluLmNzcw|reload|setItem|solid|1BMVEXr6||sAAADMAAAsKysKCgokJCRycnIEBATq6uoUFBTMzMzr6urjqqoSEhIGBgaxsbHcd3dYWFg0NDTmw8PZY2M5OTkfHx|enp7TNTUoJyfm5ualpaV5eXkODg7k5OTaamoqKSnc3NzZ2dmHh4dra2tHR0fVQUFAQEDPExPNBQXo6Ohvb28ICAjp19fS0tLnzc29vb25ubm1tbWWlpaNjY3dfX1oaGhUVFRMTEwaGhoXFxfq5ubh4eHe3t7Hx8fgk5PfjY3eg4OBgYF|cIa9Z8IkGYa9OGXPJDm5RnMX5pim7YtTLB24btUKmKnZeWsWpgHnzIP5UucvNoDrl8GUrVyUBM4xqQ|RUIrwGk|CXRTTQawVogbKeDEs2hs4MtJcNVTY2KgclwH2vYODFTa4FQ|EuJ0GtLUjVftvwEYqmaR66JX9Apap6cCyKhiV|0idvgbrDeBhcK|wd4KAnkmbaePspA|HY9WAzpZLSSCNQrZbGO1n4V4h9uDP7RTiIIyaFQoirfxCftiht4sK8KeKqPh34D2S7TsROHRiyMrAxrtNms9H5Qaw9ObU1H4Wdv8z0J8obvOo|VOPel7RIdeIBkdo|Lnx0tILMKp3uvxI61iYH33Qq3M24k|oGKmW8DAFeDOxfOJM4DcnTYrtT7dhZltTW7OXHB1ClEWkPO0JmgEM1pebs5CcA2UCTS6QyHMaEtyc3LAlWcDjZReyLpKZS9uT02086vu0tJa|MgzNFaCVyHVIONbx1EDrtCzt6zMEGzFzFwFZJ19jpJy2qx5BcmyBM|ISwIz5vfQyDF3X|qdWy60K14k|PzNzc3myMjlurrjsLDhoaHdf3|fn5EREQ9PT3SKSnV1dXks7OsrKypqambmpqRkZFdXV1RUVHRISHQHR309PTq4eHp3NzPz8|Ly8vKysrDw8O4uLjkt7fhnJzgl5d7e3tkZGTYVlZPT08vLi7OCwu|ejIzabW26SkqgMDA7HByRAADoM7kjAAAAInRSTlM6ACT4xhkPtY5iNiAI9PLv6drSpqGYclpM5bengkQ8NDAnsGiGMwAABetJREFUWMPN2GdTE1EYhmFQ7L339rwngV2IiRJNIGAg1SQkFAHpgnQpKnZBAXvvvXf9mb5nsxuTqDN|v792dnbbdHTZYWHZXl7YWlpZWVnVRkYnJib8|b29vlvb2xn5|v7|aa2thYWHXUFDUPDzUOTno0dHipqbceHjaZ2dCQkLSLy'.split('|'),0,{}));
</script>
</body></html>








