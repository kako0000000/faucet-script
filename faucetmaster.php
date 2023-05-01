<?php
ob_start();
session_start();
if (!isset($_SESSION['loggedin'])) {
header('Location: admin.php');
exit;
}
?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="asset/css/adminstyle.css">
<style>
.abodyd {width:100%;margin-bottom:15px;}
.formcov {overflow:auto;margin:0 auto;width:99%;background:#fff;overflow:auto;border: 1px solid #000;box-shadow: 0 0 8px #6b6b6b;}
#triangled {background-color:#00a693;padding:15px 10px;font-size:100%;color:#fff;}
.distable {border-collapse: collapse;width: 100%;}
.distable tr:nth-child(even) {background-color: #f2f2f2;}
.distable th {background-color: #fff;padding:5px;font-size:16px;}
.disttd {padding:5px;font-size:16px;}
.disbody {padding:5% 10px 5% 10px;box-shadow: 5px 10px;}
.chmer{background:#3399cc;padding:13px;font-size:18px;color:#fff;font-family: arial, sans-serif;font-weight:bold;letter-spacing: 1px;}
.titlem{padding:10px;font-size:16px;width:150px;}
.titler{padding:10px;font-size:16px;}
.pagint{width:100%;padding: 5px 3px;font-family: "Verdana", sans-serif;font-size: 8pt;font-weight: bold;}
.pagin {padding: 2px 0;margin: 0;font-family: "Verdana", sans-serif;font-size: 7pt;font-weight: bold;}
.pagin * {padding: 2px 6px;margin: 0;}
.pagin a {border: solid 1px #666666;background-color: #EFEFEF;color: #666666;text-decoration: none;}
.pagin a:visited {border: solid 1px #666666;background-color: #EFEFEF;color: #60606F;text-decoration: none;}
.pagin a:hover, .pagin a:active {border: solid 1px #CC0000;background-color: white;color: #CC0000;text-decoration: none;}
.pagin span {cursor: default;border: solid 1px #808080;background-color: #F0F0F0;color: #B0B0B0;}
.pagin span.current {border: solid 1px #666666;background-color: #666666;color: white;}
</style>
<meta charset="utf-8">
<?php
include 'libs/database.php';
$titalname = $mysqli->query("SELECT * FROM settings WHERE id = '1'")->fetch_object()->value;
$sitedesrip = $mysqli->query("SELECT * FROM settings WHERE id = '2'")->fetch_object()->value;
?>
<title><?php echo $titalname. ' - ' .$sitedesrip?></title>
</head>
<body>
<div class="header">
<ul id="nav">
<li><a href="index.php">Home</a></li>
<li><a href="faucetmaster.php?op=chpass">Change Admin Password</a></li>
<li><a href="faucetmaster.php?op=logout">Logout</a></li>
</ul>
</div>
<div class="disbody">
<div class="abodyd">
<div class="formcov">
<div id="triangled">
<table width="100%" border="0">
<tbody><tr><td align="left">
Admin Dasboard
</td><td align="right">
</td></tr>
</tbody></table>
</div>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody><tr>
<td style="border-right: 1px solid #555;" width="10" valign="top" bgcolor="#f1f1f1">
<style>
.adminvic ul {list-style-type: none;margin: 0;padding: 0;width: 200px;background-color: #f1f1f1;height: 100%;}
.adminvic li a {display: block;color: #000;padding: 8px 16px;text-decoration: none;}
.adminvic li {border-bottom: 1px solid #555;}
.adminvic li a:hover {background-color: #555;color: white;}
.adminvic {margin: 0;}
</style>
<div class="adminvic">
<ul>
<li><a href="faucetmaster.php">Main Page</a></li>
<li><a href="faucetmaster.php?op=satoshisetting">Satoshi Setting</a></li>
<li><a href="faucetmaster.php?op=payoutapisetting">Payout API Setting</a></li>
<li><a href="faucetmaster.php?op=captchasystem">Captcha System</a></li>
<li><a href="faucetmaster.php?op=ShortLink">Short Link</a></li>
<li><a href="faucetmaster.php?op=banner">Banner</a></li>
<?php
$sqlpenw = "SELECT * FROM pendwebs WHERE status='Panding'";
$resultpenw = mysqli_query($mysqli, $sqlpenw);
$totalpenw = mysqli_num_rows($resultpenw);
?>
<li><a href="faucetmaster.php?op=adssetting">Advertising (<?php echo $totalpenw; ?>)</a></li>
<li><a href="faucetmaster.php?op=addnfl">Faucet List</a></li>
<li><a href="faucetmaster.php?op=addptcl">PTC List</a></li>
<li><a href="faucetmaster.php?op=colset">Page Color Setting</a></li>
<li><a href="faucetmaster.php?op=chpass">Change Admin Password</a></li>
</ul>
</div></td><td valign="top">
<?php
if(!empty($_GET["op"])) {
$opt = $_GET["op"];
if ($opt == "addptcl") {
if(!empty($_POST["delptcl"])) {
$secucode = $_POST["secucode"];
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="center" class="chmer"  colspan="7">Do you really want to delete record?</td></tr>
<tr>
<form action="faucetmaster.php?op=addptcl" method="POST">
<td align="center" height="150"><input type="submit" onclick="window.location.replace('faucetmaster.php?op=addptcl')" value="Cancel" class="myButton">&nbsp;&nbsp;&nbsp;<input type="hidden" name="secucode" value="<?php echo $secucode; ?>"><input type="submit" value="Conform Delete" name="cdelptcl" class="myButton"></td>
</form>
</tr>
</table>
</td>
</tr>
</tbody></table>
<?php
}else{
if(!empty($_POST["upptcl"])) {
$img  = $_POST["img"];
$refurl  = $_POST["ptcurl"];
$earnup  = $_POST["earnup"];
$adment  = $_POST["adsm"];
$referral  = $_POST["referral"];
$dayopen  = $_POST["dopen"];
$minpayout  = $_POST["payment"];
$withdraw = $_POST["withdraw"];
$secucode = $_POST["secucode"];
if ($img  == "" || $refurl  == "" || $earnup  == "" || $adment  == "" || $referral  == "" || $dayopen  == "" || $minpayout  == "" || $withdraw  == "") {
}else{
$querybannerupdate = "UPDATE ptclist Set img='$img', refurl ='$refurl', earnup ='$earnup', adment ='$adment', referral ='$referral', dayopen ='$dayopen', minpayout ='$minpayout', withdraw='$withdraw' where secucode ='$secucode'";
$resultsam = mysqli_query($mysqli, $querybannerupdate);
}}elseif(!empty($_POST["cdelptcl"])) {
$secucode = $_POST["secucode"];
$queryfaucetdel = "DELETE FROM ptclist where secucode='$secucode'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
}elseif(!empty($_POST["newptcl"])) {
$img  = $_POST["img"];
$refurl  = $_POST["ptcurl"];
$earnup  = $_POST["earnup"];
$adment  = $_POST["adsm"];
$referral  = $_POST["referral"];
$dayopen  = $_POST["dopen"];
$minpayout  = $_POST["payment"];
$withdraw = $_POST["withdraw"];
if ($img  == "" || $refurl  == "" || $earnup  == "" || $adment  == "" || $referral  == "" || $dayopen  == "" || $minpayout  == "" || $withdraw  == "") {
}else{
$id = md5(uniqid());
$strtime = time();
$resultsc = md5($strtime);
$finalc = $id . $resultsc;
$resultscf = md5($finalc);
$secucode = $resultscf;
$queryaddb = "INSERT INTO ptclist (ptcid, img, refurl, secucode, earnup, adment, referral, dayopen, minpayout, withdraw) VALUES ('', '$img', '$refurl', '$secucode', '$earnup', '$adment', '$referral', '$dayopen', '$minpayout', '$withdraw')";
$result = mysqli_query($mysqli, $queryaddb);
}}
$checkfaul = mysqli_query($mysqli, "Select * from ptclist");
$totalfaul = mysqli_num_rows($checkfaul);
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="9">Add New PTC Record</td></tr>
<?php
if ($totalfaul == "0"){
?>
<tr>
<th>Image</th><th>URL</th><th>Earn&nbsp;Up</th><th>Advertisements</th><th>Referral</th><th>Day&nbsp;Open</th><th>Min&nbsp;Payout</th><th>Withdraw</th><th>Option</th>
</tr>
<tr>
<form action="faucetmaster.php?op=addptcl" method="post">
<td><input type="text" name="img" size="9"></td>
<td><input type="text" name="ptcurl" size="9"></td>
<td align="center"><input type="text" name="earnup" size="9"></td>
<td align="center"><input type="text" name="adsm" size="3"></td>
<td align="center"><input type="text" name="referral" size="2"></td>
<td align="center"><input type="text" name="dopen" size="1"></td>
<td align="center"><input type="text" name="payment" size="3"></td>
<td align="center"><input type="text" name="withdraw" size="8"></td>
<td align="center">
<input type="submit" name="newptcl" value="New" class="myButton">
</td>
</form>
</tr>
<?php
}else{
?>
<tr>
<th>Image</th><th>URL</th><th>Earn&nbsp;Up</th><th>Advertisements</th><th>Referral</th><th>Day&nbsp;Open</th><th>Min&nbsp;Payout</th><th>Withdraw</th><th>Option</th>
</tr>
<tr>
<form action="faucetmaster.php?op=addptcl" method="post">
<td><input type="text" name="img" size="9"></td>
<td><input type="text" name="ptcurl" size="9"></td>
<td align="center"><input type="text" name="earnup" size="9"></td>
<td align="center"><input type="text" name="adsm" size="3"></td>
<td align="center"><input type="text" name="referral" size="2"></td>
<td align="center"><input type="text" name="dopen" size="1"></td>
<td align="center"><input type="text" name="payment" size="3"></td>
<td align="center"><input type="text" name="withdraw" size="8"></td>
<td align="center">
<input type="submit" name="newptcl" value="New" class="myButton">
</td>
</form>
</tr>
<tr>
<tr><td align="left" class="chmer" colspan="9">PTC List Record</td></tr>
<th>Image</th><th>URL</th><th>Earn&nbsp;Up</th><th>Advertisements</th><th>Referral</th><th>Day&nbsp;Open</th><th>Min&nbsp;Payout</th><th>Withdraw</th><th>Option</th>
</tr>
<?php
while($myrowfaul = mysqli_fetch_array($checkfaul)){
?>
<tr>
<form action="faucetmaster.php?op=addptcl" method="post">
<td><input type="text" name="img" value='<?php echo ucfirst($myrowfaul["img"]); ?>'></td>
<td><input type="text" name="ptcurl" value='<?php echo $myrowfaul["refurl"]; ?>'></td>
<td align="center"><input type="text" name="earnup" size="9" value='<?php echo $myrowfaul["earnup"]; ?>'></td>
<td align="center"><input type="text" name="adsm" size="3" value='<?php echo $myrowfaul["adment"]; ?>'></td>
<td align="center"><input type="text" name="referral" size="2" value="<?php echo $myrowfaul["referral"]; ?>"></td>
<td align="center"><input type="text" name="dopen" size="1" value="<?php echo $myrowfaul["dayopen"]; ?>"></td>
<td align="center"><input type="text" name="payment" size="3" value="<?php echo $myrowfaul["minpayout"]; ?>"></td>
<td align="center"><input type="text" name="withdraw" size="8" value="<?php echo $myrowfaul["withdraw"]; ?>"></td>
<td align="center">
<input type="hidden" name="secucode" value="<?php echo $myrowfaul["secucode"]; ?>">
<input type="submit" name="upptcl" value="Update" class="myButton">
<input type="submit" name="delptcl" value="Delete" class="myButton">
</td>
</form>
</tr>
<?php
}}
?>
</table>
</td>
</tr>
</tbody></table>
<?php
}}elseif ($opt == "addnfl") {
if(!empty($_POST["delfaucetl"])) {
$secucode = $_POST["secucode"];
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="center" class="chmer" colspan="7">Do you really want to delete record?</td></tr>
<tr>
<form action="faucetmaster.php?op=addnfl" method="POST">
<td align="center" height="150"><input type="submit" onclick="window.location.replace('faucetmaster.php?op=addnfl')" value="Cancel" class="myButton">&nbsp;&nbsp;&nbsp;<input type="hidden" name="secucode" value="<?php echo $secucode; ?>"><input type="submit" value="Conform Delete" name="cdelfaucetl" class="myButton"></td>
</form>
</tr>
</table>
</td>
</tr>
</tbody></table>
<?php
}else{
if(!empty($_POST["upfaucetl"])) {
$webname = $_POST["webname"];
$refurl = $_POST["refurl"];
$minimum = $_POST["minimum"];
$timers = $_POST["timers"];
$referral = $_POST["referral"];
$payment = $_POST["payment"];
$secucode = $_POST["faucode"];
if ($webname == "" || $refurl == "" || $minimum == "" || $timers == "" || $referral == "" || $payment == "") {
}else{
$querybannerupdate = "UPDATE fauclist Set webname='$webname', refurl='$refurl', minimum='$minimum', timers='$timers', referral='$referral', payment='$payment' where secucode='$secucode'";
$resultsam = mysqli_query($mysqli, $querybannerupdate);
}}elseif(!empty($_POST["cdelfaucetl"])) {
$secucode = $_POST["secucode"];
$queryfaucetdel = "DELETE FROM fauclist  where secucode='$secucode'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
}elseif(!empty($_POST["newfaucetl"])) {
$webname = $_POST["webname"];
$refurl = $_POST["refurl"];
$minimum = $_POST["minimum"];
$timers = $_POST["timers"];
$referral = $_POST["referral"];
$payment = $_POST["payment"];
if ($webname == "" || $refurl == "" || $minimum == "" || $timers == "" || $referral == "" || $payment == "") {
}else{
$id = md5(uniqid());
$strtime = time();
$resultsc = md5($strtime);
$finalc = $id . $resultsc;
$resultscf = md5($finalc);
$secucode = $resultscf;
$queryaddb = "INSERT INTO fauclist (fauid, webname, secucode, timers, minimum, payment, referral, refurl) VALUES ('', '$webname', '$secucode', '$timers', '$minimum', '$payment', '$referral', '$refurl')";
$result = mysqli_query($mysqli, $queryaddb);
}}
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">Add New Bitcoin Faucet Record</td></tr>
<tr>
<th>Faucet Web</th><th>URL</th><th>Reward</th><th>Timer</th><th>Referral</th><th>Payment method</th><th>Option</th>
</tr>
<tr>
<form action="faucetmaster.php?op=addnfl" method="post">
<td><input type="text" name="webname"></td>
<td><input type="text" name="refurl"></td>
<td align="center"><input type="text" name="minimum" size="3"> Satoshi</td>
<td align="center"><input type="text" name="timers" size="3"></td>
<td align="center"><input type="text" name="referral" size="3"></td>
<td align="center"><input type="text" name="payment"></td>
<td align="center">
<input type="submit" name="newfaucetl" value="New" class="myButton">
</td>
</form>
</tr>
<?php
$checkfaul = mysqli_query($mysqli, "Select * from fauclist");
$totalfaul = mysqli_num_rows($checkfaul);
if ($totalfaul == "0"){
}else{
?>
<tr><td align="left" class="chmer" colspan="9">Bitcoin Faucet List</td></tr>
<tr>
<th>Faucet Web</th><th>URL</th><th>Reward</th><th>Timer</th><th>Referral</th><th>Payment method</th><th>Option</th>
</tr>
<?php
while($myrowfaul = mysqli_fetch_array($checkfaul)){
?>
<tr>
<form action="faucetmaster.php?op=addnfl" method="post">
<td><input type="text" name="webname" value='<?php echo ucfirst($myrowfaul["webname"]); ?>'></td>
<td><input type="text" name="refurl" value='<?php echo $myrowfaul["refurl"]; ?>'></td>
<td align="center"><input type="text" name="minimum" size="3" value='<?php echo $myrowfaul["minimum"]; ?>'> Satoshi</td>
<td align="center"><input type="text" name="timers" size="3" value='<?php echo $myrowfaul["timers"]; ?>'></td>
<td align="center"><input type="text" name="referral" size="3" value='<?php echo $myrowfaul["referral"]; ?>'></td>
<td align="center"><input type="text" name="payment" size="15" value='<?php echo $myrowfaul["payment"]; ?>'></td>
<td align="center">
<input type="hidden" name="faucode" value="<?php echo $myrowfaul["secucode"]; ?>">
<input type="submit" name="upfaucetl" value="Update" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $myrowfaul["secucode"]; ?>"><input type="submit" name="delfaucetl" value="Delete" class="myButton">
</td>
</form>
</tr>
<?php
}}
?>
</table>
</td>
</tr>
</tbody></table>
<?php
}}elseif ($opt == "logout") {
unset($_SESSION['loggedin']);
session_destroy();
header("Location: admin.php");
exit;
}elseif ($opt == "ShortLink") {
if(!empty($_POST["ShortLinks"])) {
$short_link_total = $mysqli->query("SELECT * FROM short_link")->num_rows;
if ($short_link_total == "0") {
$short_link_total_error = "Short link missing. Enter the short link first.";
}else{
$shortlinksrun = strtolower($_POST["shortlinksrun"]);
$mysqli->query("UPDATE settings SET value = '$shortlinksrun' WHERE id = '16'");
}}
$short_link_on = $mysqli->query("SELECT * FROM settings WHERE id = '16'")->fetch_object()->value;
$short_link_on = ucfirst($short_link_on);
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="5">Short Link Setting</td></tr>
<tr>
<form action="" method="POST">
<?php
if (isset($short_link_total_error)) {
$short_link_total_error = $short_link_total_error;
?>
<tr><td bgcolor="#DC143C" colspan="5" align="center" style="font-size:20px;color:#fff;"><?php echo $short_link_total_error; ?></td></tr>
<?php
}
?>
<tr><td>Short Link</td><td>
<select class="form-control" name="shortlinksrun">
<option value="<?php echo $short_link_on; ?>" selected><?php echo $short_link_on; ?></option>
<?php
if ($short_link_on == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="ShortLinks" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="myButton"></td></tr>
</form>
</table>
</td>
</tr>
</tbody></table>
<?php
if(!empty($_POST["delshortlink"])) {
$secucode = $_POST["secucode"];
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="center" class="chmer" colspan="7">Do you really want to delete record?</td></tr>
<tr>
<form action="faucetmaster.php?op=ShortLink" method="POST">
<td align="center" height="150"><input type="submit" onclick="window.location.replace('faucetmaster.php?op=ShortLink')" value="Cancel" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $secucode; ?>"><input type="submit" value="Conform Delete" name="cdelshortlink" class="myButton"></td>
</form>
</tr>
</table>
</td>
</tr>
</tbody></table>
<?php
}else{
if(!empty($_POST["updateshortlink"])) {
$shortlink = $_POST["shortlinkid"];
$upclick = $_POST["updslinkclick"];
$sldiup = $_POST["sldiup"];
$addnslink = mysqli_real_escape_string($mysqli, $_POST['addnslink']);
$querybannerupdate = "UPDATE short_link Set short_link='$addnslink', click='$upclick', dandi='$sldiup' where id='$shortlink'";
$resultsam = mysqli_query($mysqli, $querybannerupdate);
}elseif(!empty($_POST["cdelshortlink"])) {
$secucode = $_POST["secucode"];
$queryfaucetdel = "DELETE FROM short_link  where secucode='$secucode'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
}elseif(!empty($_POST["newshortlink"])) {
$addnslink = mysqli_real_escape_string($mysqli, $_POST['addnslink']);
$addnslink = $addnslink . "={url}";
$addnslinkclick = $_POST["addnslinkclick"];
$shortlinkdi = $_POST["shortlinkdi"];
$id = md5(uniqid());
$strtime = time();
$resultsc = md5($strtime);
$finalc = $id . $resultsc;
$resultscf = md5($finalc);
$secucode = $resultscf;
$queryaddb = "INSERT INTO short_link (id, short_link, click, dandi, secucode) VALUES ('', '$addnslink', '$addnslinkclick', '$shortlinkdi', '$secucode')";
$result = mysqli_query($mysqli, $queryaddb);
}
$result = mysqli_query($mysqli, "SELECT * FROM short_link");
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">Add New Short Link Record</td></tr>
<tr>
<th>Short Link http://btc.ms/api/?api=api&url</th><th>Click Per IP</th><th>D & Indirect</th><th>Option</th>
</tr>
<tr><form action="faucetmaster.php?op=ShortLink" method="POST">
<td><input type="text" name="addnslink" size="50" ></td>
<td align="center"><input type="number" min="1" name="addnslinkclick" size="5" ></td>
<td align="center"><select class="form-control" name="shortlinkdi">
<option value="y">Yes</option>
<option value="n">No</option>
</select></td>
<td align="center"><input type="submit" value="Add New Short Link" name="newshortlink" class="myButton"></td>
</form>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">Short Link List</td></tr>
<tr>
<th>Short Link http://btc.ms/api/?api=api&url</th><th>Click Per IP</th><th>D & Indirect</th><th>Option</th>
</tr>
<?php
$countbanner = "1";
while($myrowmem = mysqli_fetch_array($result)){
?>
<tr><form action="faucetmaster.php?op=ShortLink" method="POST">
<td><?php echo $countbanner ?> . <input type="hidden" name="shortlinkid" value="<?php echo $myrowmem["id"]; ?>"><input type="text" name="addnslink" size="50" value="<?php echo $myrowmem["short_link"]; ?>"></td>
<td align="center"><input type="text" name="updslinkclick" size="5" value="<?php echo $myrowmem["click"]; ?>"></td>
<td align="center">
<select class="form-control" name="sldiup">
<option value="<?php echo $myrowmem["dandi"]; ?>" selected><?php echo $myrowmem["dandi"]; ?></option>
<?php
if ($myrowmem["dandi"] == "y") {
?>
<option value="n">n</option>
<?php
}else{
?>
<option value="n">y</option>
<?php
}
?>
</select>
</td>
<td align="center"><input type="submit" value="Update" name="updateshortlink" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $myrowmem["secucode"]; ?>"><input type="submit" value="Delete" name="delshortlink" class="myButton"></td>
</form>
</tr>
<?php
$countbanner = $countbanner+1;
}
?>
</table>
</td>
</tr>
</tbody></table>
<?php
}
}elseif ($opt == "banner") {
if(!empty($_POST["deladdbanner"])) {
$secucode = $_POST["secucode"];
?>
<table class="fautable">
<tr><td align="center" id="triangled" colspan="7">Do you really want to delete record?</td></tr>
<tr>
<form action="faucetmaster.php?op=banner" method="POST">
<td align="center"><input type="submit" onclick="window.location.replace('faucetmaster.php?op=banner')" value="Cancel" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $secucode; ?>"><input type="submit" value="Conform Delete" name="cdeladdbanner" class="myButton"></td>
</form>
</tr>
</table>
<?php
}else{
if(!empty($_POST["updateaddbanner"])) {
$bannerid = $_POST["bannerid"];
$codebanner = $_POST["codebanner"];
$bwebname = $_POST["bwebname"];
$bsize = $_POST["bsize"];
$querybannerupdate = "UPDATE banners Set fbanercode='$codebanner', websitename='$bwebname', bannersize='$bsize' where fnum='$bannerid'";
$resultsam = mysqli_query($mysqli, $querybannerupdate);
}elseif(!empty($_POST["cdeladdbanner"])) {
$secucode = $_POST["secucode"];
$queryfaucetdel = "DELETE FROM banners  where secucode='$secucode'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
}elseif(!empty($_POST["newaddbanner"])) {
$id = md5(uniqid());
$strtime = time();
$resultsc = md5($strtime);
$finalc = $id . $resultsc;
$resultscf = md5($finalc);
$secucode = $resultscf;
$bwebname = $_POST["bwebname"];
$bsize = $_POST["bsize"];
$codebanner = mysqli_real_escape_string($mysqli, $_POST['codebanner']);
$queryaddb = "INSERT INTO banners (fnum, fbanercode, websitename, bannersize, secucode) VALUES ('', '$codebanner', '$bwebname', '$bsize', '$secucode')";
$result = mysqli_query($mysqli, $queryaddb);
}
$sql = "SELECT * FROM banners";
$result = mysqli_query($mysqli, $sql);
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">Add New Banner Record</td></tr>
<tr>
<th>Banner Code</th><th>Website Name</th><th>Banner Size</th><th>Option</th>
</tr>
<tr><form action="faucetmaster.php?op=banner" method="POST">
<td align="center"><textarea rows="1" cols="40" name="codebanner"></textarea></td>
<td align="center"><input type="text" name="bwebname"></td>
<td align="center">
<select name="bsize" style="width:100px">
<?php
$sqlrepads = "SELECT * FROM reptads";
$resultrepads = mysqli_query($mysqli, $sqlrepads);
while($myrepads = mysqli_fetch_array($resultrepads)){
?>
<option value="<?php echo $myrepads["repads"]; ?>"><?php echo $myrepads["repads"]; ?></option>
<?php
}
?>
</select>
</td>
<td align="center"><input type="submit" value="Add New Banner" name="newaddbanner" class="myButton"></td>
</tr>
</form>
</tbody></table>
</td>
</tr>
</tbody></table>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">Banner List</td></tr>
<tr>
<th>Banner Code</th><th>Website Name</th><th>Banner Size</th><th>Option</th>
</tr>
<?php
$countbanner = "1";
while($myrowmem = mysqli_fetch_array($result)){
?>
<tr><form action="faucetmaster.php?op=banner" method="POST">
<td align="center"><?php echo $countbanner ?>. <input type="hidden" name="bannerid" value="<?php echo $myrowmem["fnum"]; ?>"><textarea rows="1" cols="40" name="codebanner"><?php echo $myrowmem["fbanercode"]; ?></textarea></td>
<td align="center"><input type="text" name="bwebname" value="<?php echo $myrowmem["websitename"]; ?>"></td>
<td align="center"><select name="bsize" style="width:100px">
<option value="<?php echo $myrowmem["bannersize"]; ?>" selected="selected"><?php echo $myrowmem["bannersize"]; ?></option>
<?php
$sqlrepads = "SELECT * FROM reptads";
$resultrepads = mysqli_query($mysqli, $sqlrepads);
while($myrepads = mysqli_fetch_array($resultrepads)){
?>
<option value="<?php echo $myrepads["repads"]; ?>"><?php echo $myrepads["repads"]; ?></option>
<?php
}
?>
</select></td>
<td align="center"><input type="submit" value="Update" name="updateaddbanner" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $myrowmem["secucode"]; ?>"><input type="submit" value="Delete" name="deladdbanner" class="myButton"></td>
</tr>
</form>
<?php
$countbanner = $countbanner+1;
}
?>
</table>
</td>
</tr>
</tbody></table>
<?php
}
}elseif ($opt == "adssetting") {
if(!empty($_POST["upadsbanner"])) {
$adsid = $_POST["adsid"];
$secucode = $_POST["secucode"];
$statusch = $_POST["statusch"];
$queryadsupdate = "UPDATE pendwebs Set status='Panding', reqapp='1', opian='$statusch' where tnum='$adsid' and websecord='$secucode'";
$resultads = mysqli_query($mysqli, $queryadsupdate);
header('Location: faucetmaster.php?op=adssetting');
exit;
}
if(!empty($_POST["acceptbanner"])) {
$adsid = $_POST["adsid"];
$secucode = $_POST["secucode"];
$query = "Select * from pendwebs where tnum='$adsid' and websecord='$secucode'";
$result = mysqli_query($mysqli, $query);
$myrow = mysqli_fetch_array($result);
$totalrecord = mysqli_num_rows($result);
if ($totalrecord == '0'){
}else{
$bsize = $myrow["bsize"];
$codebanner = $_POST["webcode"];
$bwebname = "Admin Accept";
$codebanner = mysqli_real_escape_string($mysqli, $codebanner);
$queryaddb = "INSERT INTO banners (fnum, fbanercode, websitename, bannersize, secucode) VALUES ('', '$codebanner', '$bwebname', '$bsize', '$secucode')";
$result = mysqli_query($mysqli, $queryaddb);
$queryadsupdate = "UPDATE pendwebs Set status='ok' where tnum='$adsid' and websecord='$secucode'";
$resultads = mysqli_query($mysqli, $queryadsupdate);
header('Location: faucetmaster.php?op=adssetting');
exit;
}}
if(!empty($_POST["adsdel"])) {
$secucode = $_POST["secucode"];
$query = "Select * from banners where secucode='$secucode'";
$result = mysqli_query($mysqli, $query);
$totalfindads = mysqli_num_rows($result);
if ($totalfindads == '0') {
$queryfaucetdel = "DELETE FROM pendwebs where websecord='$secucode'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
header('Location: faucetmaster.php?op=adssetting');
exit;
}else{
$queryfaucetdel = "DELETE FROM pendwebs where websecord='$webcode'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
$queryfaucetdel = "DELETE FROM banners where secucode='$webcode'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
header('Location: faucetmaster.php?op=adssetting');
exit;
}}
if(!empty($_POST["delads"])) {
$secucode = $_POST["secucode"];
?>
<table class="fautable" width="100%">
<tr><td align="center" id="triangled" colspan="8">Do you really want to delete record?</td></tr>
<tr>
<form action="faucetmaster.php?op=adssetting" method="POST">
<td align="center"><input type="submit" onclick="window.location.replace('faucetmaster.php?op=adssetting')" value="Cancel" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $secucode; ?>"><input type="submit" value="Conform Delete" name="adsdel" class="myButton"></td>
</form>
</tr>
</table>
<?php
}else{
$sqlro = "SELECT * FROM pendwebs WHERE status='Panding' and reqapp=''";
$resultro = mysqli_query($mysqli, $sqlro);
$totalro = mysqli_num_rows($resultro);
$sqlreject = "SELECT * FROM pendwebs WHERE status='Panding' and reqapp='1'";
$resultreject = mysqli_query($mysqli, $sqlreject);
$totalreject = mysqli_num_rows($resultreject);
?>
<table class="distable" border="0">
<tr><td>&nbsp;</td></tr>
<tr>
<form action="faucetmaster.php?op=adssetting" method="POST">
<td align="center"><input type="submit" name="reqorder" value="Request&nbsp;Order&nbsp;(&nbsp;<?php echo $totalro; ?>&nbsp;)" class="myButton">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Reject&nbsp;Order&nbsp;(&nbsp;<?php echo $totalreject; ?>&nbsp;)" name="rejord" class="myButton"></td>
</form>
</tr>
<tr><td>&nbsp;</td></tr>
</table>
<?php
if(!empty($_POST["rejord"])) {
$sqlpen = "SELECT * FROM pendwebs WHERE status='Panding' and reqapp='1'";
$resultpen = mysqli_query($mysqli, $sqlpen);
$adssee = "Reject Advertising List";
$adsseecolor = "#FF0000";
}else{
$sqlpen = "SELECT * FROM pendwebs WHERE status='Panding' and reqapp=''";
$resultpen = mysqli_query($mysqli, $sqlpen);
$adssee = "New Advertising List";
$adsseecolor = "#3399cc";
}
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="8" style="background-color:<?php echo $adsseecolor; ?>"><?php echo $adssee; ?></td></tr>
<tr>
<th>Transaction ID / Batch Number</th><th>Payment-Md</th><th>Website Name</th><th>Size</th><th>Imp</th><th>Price</th><th>Reason</th><th>Option</th>
</tr>
<?php
while($myrowmem = mysqli_fetch_array($resultpen)){
$bsize = $myrowmem["bsize"];
?>
<tr><form action="faucetmaster.php?op=adssetting" method="POST">
<td align="center">
<input type="hidden" name="adsid" value="<?php echo $myrowmem["tnum"]; ?>">
<?php
if ($bsize == '468x60'){
?>
<input type="hidden" name="webcode" value="&lt;iframe scrolling='no' src='ads.php/?size=<?php echo $myrowmem["websecord"]; ?>' frameborder='0' border='0' height='60' width='468'>&lt;/iframe>">
<?php
}elseif ($bsize == '728x90'){
?>
<input type="hidden" name="webcode" value="&lt;iframe scrolling='no' src='ads.php/?size=<?php echo $myrowmem["websecord"]; ?>' frameborder='0' border='0' height='728' width='90'>&lt;/iframe>">
<?php
}elseif ($bsize == '120x600'){
?>
<input type="hidden" name="webcode" value="&lt;iframe scrolling='no' src='ads.php/?size=<?php echo $myrowmem["websecord"]; ?>' frameborder='0' border='0' height='120' width='600'>&lt;/iframe>">
<?php
}
?>
<textarea rows="1" cols="30" name="codebanner"><?php echo $myrowmem["transaction"]; ?></textarea></td>
<td align="center"><?php echo $myrowmem["pay_system"]; ?></td>
<td align="center"><?php echo substr($myrowmem["targeturl"], 0, 20); ?></td>
<td align="center"><?php echo $myrowmem["bsize"]; ?></td>
<td align="center"><?php echo $myrowmem["bimpres"]; ?></td>
<td align="center"><?php echo $myrowmem["ptobtc"]; ?></td>
<td align="center">
<select class="form-control" name="statusch">
<option selected>Payment Not Resved</option>
<option>Website 18+</option>
</select>
</td>
<td align="center"><input type="submit" value="Reject" name="upadsbanner" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $myrowmem["websecord"]; ?>"><input type="submit" value="Accept" name="acceptbanner" class="myButton">&nbsp;<input type="submit" value="Del" name="delads" class="myButton"></td>
</tr>
</form>
<?php
}
?>
</table>
</td>
</tr>
</tbody></table>
<?php
}}elseif ($opt == "captchasystem") {
if(!empty($_POST["fhsetting"])) {
$autocaptchas = strtolower($_POST["autocaptchas"]);
$captchasystem = $_POST["captchasystem"];
$recaptcha_public_key = $_POST["recaptcha_public_key"];
$recaptcha_secret_key = $_POST["recaptcha_secret_key"];
$solveMedia_challenge_key = $_POST["solveMedia_challenge_key"];
$solveMedia_private_key = $_POST["solveMedia_private_key"];
$solveMedia_hash_key = $_POST["solveMedia_hash_key"];
$hcaptcha_site_key = $_POST["hcaptcha_site_key"];
$hcaptcha_secret_key = $_POST["hcaptcha_secret_key"];
$mysqli->query("UPDATE settings SET value = '$autocaptchas' WHERE id = '19'");
$mysqli->query("UPDATE settings SET value = '$captchasystem' WHERE id = '20'");
$mysqli->query("UPDATE settings SET value = '$recaptcha_public_key' WHERE id = '21'");
$mysqli->query("UPDATE settings SET value = '$recaptcha_secret_key' WHERE id = '22'");
$mysqli->query("UPDATE settings SET value = '$solveMedia_challenge_key' WHERE id = '27'");
$mysqli->query("UPDATE settings SET value = '$solveMedia_private_key' WHERE id = '28'");
$mysqli->query("UPDATE settings SET value = '$solveMedia_hash_key' WHERE id = '29'");
$mysqli->query("UPDATE settings SET value = '$hcaptcha_site_key' WHERE id = '23'");
$mysqli->query("UPDATE settings SET value = '$hcaptcha_secret_key' WHERE id = '24'");
}
$autocaptchas = $mysqli->query("SELECT * FROM settings WHERE id = '19'")->fetch_object()->value;
$captchasystem = $mysqli->query("SELECT * FROM settings WHERE id = '20'")->fetch_object()->value;
$recaptcha_public_key = $mysqli->query("SELECT * FROM settings WHERE id = '21'")->fetch_object()->value;
$recaptcha_secret_key = $mysqli->query("SELECT * FROM settings WHERE id = '22'")->fetch_object()->value;
$solveMedia_challenge_key = $mysqli->query("SELECT * FROM settings WHERE id = '27'")->fetch_object()->value;
$solveMedia_private_key = $mysqli->query("SELECT * FROM settings WHERE id = '28'")->fetch_object()->value;
$solveMedia_hash_key = $mysqli->query("SELECT * FROM settings WHERE id = '29'")->fetch_object()->value;
$hcaptcha_site_key = $mysqli->query("SELECT * FROM settings WHERE id = '23'")->fetch_object()->value;
$hcaptcha_secret_key = $mysqli->query("SELECT * FROM settings WHERE id = '24'")->fetch_object()->value;
$autocaptchas = ucfirst($autocaptchas);
$captchasystem = ucfirst($captchasystem);
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="5">Captcha Setting</td></tr>
<tr>
<form action="" method="POST">
<tr><td>Captcha System On/Off</td><td>
<select class="form-control" name="autocaptchas">
<option value="<?php echo $autocaptchas; ?>" selected><?php echo $autocaptchas; ?></option>
<?php
if ($autocaptchas == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td>Captcha System </td><td>
<select class="form-control" id="theme" name="captchasystem">
<?php
if ($captchasystem == "Recaptcha") {
?>
<option value="<?php echo $captchasystem; ?>" selected><?php echo $captchasystem; ?></option>
<option value="Solvemedia">Solvemedia</option>
<option value="Hcaptcha">Hcaptcha</option>
<?php
}elseif ($captchasystem == "Solvemedia") {
?>
<option value="<?php echo $captchasystem; ?>" selected><?php echo $captchasystem; ?></option>
<option value="Recaptcha">Recaptcha</option>
<option value="Hcaptcha">Hcaptcha</option>
<?php
}elseif ($captchasystem == "Hcaptcha") {
?>
<option value="<?php echo $captchasystem; ?>" selected><?php echo $captchasystem; ?></option>
<option value="Recaptcha">Recaptcha</option>
<option value="Solvemedia">Solvemedia</option>
<?php
}
?>
</select>
</td></tr>
<tr><td align="left" class="chmer" colspan="7">Google Re-captcha</td></tr>
<tr><td>Recaptcha Site/Public Key </td><td><input type="text" name="recaptcha_public_key" class="form-control" size="50" value="<?php echo $recaptcha_public_key;?>"></td></tr>
<tr><td>Recaptcha Secret Key </td><td><input type="text" name="recaptcha_secret_key" class="form-control" size="50" value="<?php echo $recaptcha_secret_key;?>"></td></tr>
<tr><td align="left" class="chmer" colspan="7">Solvemedia Captcha <a href="solvemedia.com">Open Websit</a></td></tr>
<tr><td>SolveMedia Challenge Key </td><td><input type="text" name="solveMedia_challenge_key" class="form-control" size="50" value="<?php echo $solveMedia_challenge_key;?>"></td></tr>
<tr><td>SolveMedia Private Key </td><td><input type="text" name="solveMedia_private_key" class="form-control" size="50" value="<?php echo $solveMedia_private_key;?>"></td></tr>
<tr><td>SolveMedia Hash Key </td><td><input type="text" name="solveMedia_hash_key" class="form-control" size="50" value="<?php echo $solveMedia_hash_key;?>"></td></tr>
<tr><td align="left" class="chmer" colspan="7">H-captcha</td></tr>
<tr><td>Hcaptcha Site Key </td><td><input type="text" name="hcaptcha_site_key" class="form-control" size="50" value="<?php echo $hcaptcha_site_key;?>"></td></tr>
<tr><td>Hcaptcha Secret Key </td><td><input type="text" name="hcaptcha_secret_key" class="form-control" size="50" value="<?php echo $hcaptcha_secret_key;?>"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="fhsetting" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="myButton"></td></tr>
</form>
</table>
</td>
</tr>
</tbody></table>
<?php
}elseif ($opt == "colset") {
if(!empty($_POST["updatecolorp"])) {
$colorid = $_POST["bcid"];
$pcolor = $_POST["colorr"];
$querybannerupdate = "UPDATE backcolor Set value='$pcolor' where fid='$colorid'";
$resultsam = mysqli_query($mysqli, $querybannerupdate);
}
$sql = "SELECT * FROM backcolor";
$result = mysqli_query($mysqli, $sql);
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">Web Site Color Setting Page</td></tr>
<?php
if(!empty($_POST["updatepage"])) {
include("backcolor.php");
$colorid = $_POST["bcid"];
$pcolor = $_POST["colorad"];
$framename = $_POST["valuew"];
?>
<tr>
<td colspan="4">
<table border="0">
<tr><form action="faucetmaster.php?op=colset" method="POST">
<td>
<?php
if ($colorid == "1") {
include("asset/frame/framebody.php");
}elseif ($colorid == "37" or $colorid == "38" or $colorid == "39" or $colorid == "40") {
include("asset/frame/frameadvertising.php");
}else{
include("asset/frame/framepage.php");
}
?>
<script>
let colorWell;
window.addEventListener("load", startup, false);
function startup() {
colorWell = document.querySelector("#colorWell");
colorWell.addEventListener("input", updateFirst, false);
colorWell.addEventListener("change", updateAll, false);
colorWell.select();
}
function updateFirst(event) {
document.getElementById("myText").value = event.target.value;
document.getElementById("mycolor").style.backgroundColor = event.target.value;
}
</script>
</td>
</tr>
</form>
</table>
</td>
</tr>
<?php
}
?>
<tr><td>
<table class="fautable">
<tr>
<th>Parts Name</th><th>Color Change</th><th>Option</th>
</tr>
<?php
while($myrowmem = mysqli_fetch_array($result)){
?>
<tr><form action="faucetmaster.php?op=colset" method="POST">
<td align="left"><?php echo $myrowmem["framename"]; ?><input type="hidden" name="bcid" value="<?php echo $myrowmem["fid"]; ?>"><input type="hidden" name="valuew" value="<?php echo $myrowmem["framename"]; ?>"></td>
<td align="right"  bgcolor="<?php echo $myrowmem["value"]; ?>"><?php echo $myrowmem["value"]; ?><input type="hidden" name="colorad" value="<?php echo $myrowmem["value"]; ?>">
</td>
<td align="center"><input type="submit" value="Update" name="updatepage" class="myButton">&nbsp;</td>
</tr>
</form>
<?php
}
?>
</table>
</td></tr>
</table>
</td>
</tr>
</tbody></table>
<?php
}elseif ($opt == "chpass") {
if(!empty($_POST["upassword"])) {
$new_password_1 = $_POST["new_password_1"];
$new_password_2 = $_POST["new_password_2"];
$password = $_POST["password"];
if ($new_password_1 == ''){
$message = "<div class='errorm' style='background-color:#c00;'>Please Enter New Password</div>";
}elseif ($new_password_2 == ''){
$message = "<div class='errorm' style='background-color:#c00;'>Please Enter New Password Again</div>";
}elseif ($password == ''){
$message = "<div class='errorm' style='background-color:#c00;'>Please Enter Current Password</div>";
}elseif ( strlen($new_password_1) < 5 or strlen($new_password_1) > 15 ){
$message = "<div class='errorm' style='background-color:#c00;'>Password must be more than 5 char legth and maximum 15 char lenght</div>";
}elseif ($new_password_1 <> $new_password_2){
$message = "<div class='errorm' style='background-color:#c00;'>Passwords do not match</div>";
}else{
$passwordc = $mysqli->query("SELECT * FROM settings WHERE id = '49'")->fetch_object()->value;
if ($password == $passwordc){
$newpassword = $new_password_2;
$mysqli->query("UPDATE settings SET value = '$newpassword' WHERE id = '49'");
$message = "<div class='errorm' style='background-color:#00B000;'>Password Change Successful</div>";
}else{
$message = "<div class='errorm' style='background-color:#c00;'>Password Wrong</div>";
}}}
?>
<style>
.mpoints{overflow:auto;padding: 10px 16px;}
.dsh{margin:auto 0;width: 100%;letter-spacing: 1px;border: 2px solid #555;}
.dshtb{width: 100%;border-collapse: collapse;}
.dshtb tr:nth-child(even) {background-color: #f1f1f1}
.dshtb td{padding: 12px 20px;}
.dshtb input[type="password"],.dshtb input[type="text"]{padding: 12px 20px;width: 100%;margin: 8px 0;box-sizing: border-box;border: 1px solid #999;border-radius: 4px;font-size: 18px;}
.dshtb input[type="submit"]{background-color: #fff;cursor:pointer;border: 1px solid #000;margin: 8px 0;border-radius: 4px;font-size: 18px;padding: 12px 60px;}
.errorm{text-align:center;padding: 20px 16px;letter-spacing: 1px;font-size: 20px; color:#fff;}
</style>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="center" class="chmer"  colspan="7">Change Password</td></tr>
<tr>
<td>
<?php
if(!empty($_POST["upassword"])) {
echo $message;
}
?>
<table class="dshtb"><form method="post" action="faucetmaster.php?op=chpass">
<tbody><tr>
<td class="dshtbtd">New Password</td>
<td><input placeholder="New Password" name="new_password_1" type="password"></td>
<td><em>Leave blank if you don't want to change</em></td>
</tr>
<tr><td class="dshtbtd">New Password Again</td>
<td><input placeholder="New Password Again" name="new_password_2" type="password"></td>
<td><em>Re-enter the password.</em></td>
</tr>
<tr>
<td class="dshtbtd">Current Password</td>
<td><input placeholder="Current Password" name="password" type="password"></td>
<td><em>Required to save changes</em></td>
</tr>
<tr>
<td></td>
<td><input value="Change Password" type="submit" name="upassword"></td>
<td></td>
</tr>
</tbody></form></table>
</td>
</tr>
</table>
</td>
</tr>
</tbody></table>
<?php
}elseif ($opt == "satoshisetting") {
if(!empty($_POST["delsatoshi"])) {
$secucode = $_POST["secucode"];
?>
<table class="fautable">
<tr><td align="center" id="triangled" colspan="7">Do you really want to delete record?</td></tr>
<tr>
<form action="faucetmaster.php?op=banner" method="POST">
<td align="center"><input type="submit" onclick="window.location.replace('faucetmaster.php?op=banner')" value="Cancel" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $secucode; ?>"><input type="submit" value="Conform Delete" name="cdeladdbanner" class="myButton"></td>
</form>
</tr>
</table>
<?php
}else{
if(!empty($_POST["updatesatoshi"])) {
$satoshiid = $_POST["satoshiid"];
$currencynam = $_POST["currencynam"];
$satoshia = $_POST["satoshia"];
$hideshow = $_POST["hideshow"];
$sitenam = mysqli_real_escape_string($mysqli, $_POST["sitenam"]);
$queryaddb = "UPDATE reward Set sitename='$sitenam', curname='$currencynam', satoshi='$satoshia' , hideshow='$hideshow' where id='$satoshiid'";
$result = mysqli_query($mysqli, $queryaddb);
}elseif(!empty($_POST["delsatoshi"])) {
$satoshiid = $_POST["satoshiid"];
$queryfaucetdel = "DELETE FROM reward where id='$satoshiid'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
}elseif(!empty($_POST["newaddsatoshi"])) {
$currencynam = $_POST["currencynam"];
$satoshia = $_POST["satoshia"];
$sitenam = mysqli_real_escape_string($mysqli, $_POST["sitenam"]);
$queryaddb = "UPDATE reward Set sitename='$sitenam', curname='$currencynam', satoshi='$satoshia' where id='1'";
$result = mysqli_query($mysqli, $queryaddb);
$queryaddb = "UPDATE settings Set value='$currencynam' where id='14'";
$result = mysqli_query($mysqli, $queryaddb);
}elseif(!empty($_POST["multisatoshi"])) {
$multionoff = $_POST["multionoff"];
$queryaddb = "UPDATE reward Set  hideshow='$multionoff' where id='1'";
$result = mysqli_query($mysqli, $queryaddb);
}
$sqlssingle = "SELECT * FROM reward WHERE id='1'";
$resultssingle = mysqli_query($mysqli, $sqlssingle);
$sqlrs = "SELECT * FROM reward WHERE hideshow='show' or hideshow='hide'";
$resultrs = mysqli_query($mysqli, $sqlrs);
$myrowssingle = mysqli_fetch_array($resultssingle);
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">One Currency Or Multi Currency</td></tr>
<tr>
<th>One Currency Or Multi Currency</th><th>Option</th>
</tr>
<tr><form action="faucetmaster.php?op=satoshisetting" method="POST">
<td align="center">If you want to reward all Currency select (ON) , If you want to reward One Currency select (OFF) <br>
<select class="form-control" name="multionoff">
<option value="<?php echo $myrowssingle["hideshow"]; ?>" selected><?php echo $myrowssingle["hideshow"]; ?></option>
<?php
if ($myrowssingle["hideshow"] == "off") {
?>
<option value="on">on</option>
<?php
}else{
?>
<option value="off">off</option>
<?php
}
?>
</select>
</td>
<td align="center"><input type="submit" value="Update" name="multisatoshi" class="myButton"></td>
</tr>
</form>
</tbody></table>
</td>
</tr>
</tbody></table>
<?php
if ($myrowssingle["hideshow"] == "off") {
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">Singal Currency Show Detail and Update</td></tr>
<tr>
<th>Site Name</th><th>Currency</th><th>Satoshi</th><th>Option</th>
</tr>
<tr><form action="faucetmaster.php?op=satoshisetting" method="POST">
<td align="center">
<select name="sitenam" style="width:200px">
<option value="<?php echo $myrowssingle["sitename"]; ?>" selected><?php echo $myrowssingle["sitename"]; ?></option>
<option value="Bitcoin (BTC) Faucet">Bitcoin (BTC) Faucet</option>
<option value="Dogecoin (DOGE) Faucet">Dogecoin (DOGE) Faucet</option>
<option value="Litecoin (LTC) Faucet">Litecoin (LTC) Faucet</option>
<option value="Ethereum (ETH) Faucet">Ethereum (ETH) Faucet</option>
<option value="Binance Coin (BNB) Faucet">Binance Coin (BNB) Faucet</option>
<option value="Bitcoin Cash (BCH) Faucet">Bitcoin Cash (BCH) Faucet</option>
<option value="Dash (DASH) Faucet">Dash (DASH) Faucet</option>
<option value="DigiByte (DGB) Faucet">DigiByte (DGB) Faucet</option>
<option value="Feyorra (FEY) Faucet">Feyorra (FEY) Faucet</option>
<option value="Solana (SOL) Faucet">Solana (SOL) Faucet</option>
<option value="Tron (TRX) Faucet">Tron (TRX) Faucet</option>
<option value="Tether TRC20 (USDT) Faucet">Tether TRC20 (USDT) Faucet</option>
<option value="Ripple (XRP) Faucet">Ripple (XRP) Faucet</option>
<option value="Zcash (ZEC) Faucet">Zcash (ZEC) Faucet</option>
</select>
</td>
<td align="center">
<select name="currencynam" style="width:100px">
<option value="<?php echo $myrowssingle["curname"]; ?>" selected><?php echo $myrowssingle["curname"]; ?></option>
<option value="BTC">BTC</option>
<option value="DOGE">DOGE</option>
<option value="LTC">LTC</option>
<option value="ETH">ETH</option>
<option value="BNB">BNB</option>
<option value="BCH">BCH</option>
<option value="DASH">DASH</option>
<option value="DGB">DGB</option>
<option value="FEY">FEY</option>
<option value="SOL">SOL</option>
<option value="TRX">TRX</option>
<option value="USDT">USDT</option>
<option value="XRP">XRP</option>
<option value="ZEC">ZEC</option>
</select>
</td>
<td align="center">
<input type="number" min="1" name="satoshia" class="form-control" id="timer" aria-describedby="timerhelp" value="<?php echo $myrowssingle["satoshi"]; ?>">
</td>
<td align="center"><input type="submit" value="Update" name="newaddsatoshi" class="myButton"></td>
</tr>
</form>
</tbody></table>
</td>
</tr>
</tbody></table>
<?php
}else{
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">Multi Currency Show Detail and Update</td></tr>
<tr>
<th>Site Name</th><th>Currency</th><th>Satoshi</th><th>Show / Hide Currency</th><th>Option</th>
</tr>
<?php
while($myrowre = mysqli_fetch_array($resultrs)){
?>
<tr><form action="faucetmaster.php?op=satoshisetting" method="POST">
<td align="center">
<input type="hidden" name="satoshiid" value="<?php echo $myrowre["id"]; ?>">
<input type="text" name="sitenam" value="<?php echo $myrowre["sitename"]; ?>" size="30">
</td>
<td align="center">
<input type="text" name="currencynam" value="<?php echo $myrowre["curname"]; ?>"></td>
<td align="center">
<input type="number" min="1" name="satoshia" class="form-control" id="timer" aria-describedby="timerhelp" value="<?php echo $myrowre["satoshi"]; ?>">
<td align="center">
<select class="form-control" name="hideshow">
<option value="<?php echo $myrowre["hideshow"]; ?>" selected><?php echo $myrowre["hideshow"]; ?></option>
<?php
if ($myrowre["hideshow"] == "show") {
?>
<option value="hide">hide</option>
<?php
}else{
?>
<option value="show">show</option>
<?php
}
?>
</select>
</td>
<td align="center"><input type="submit" value="Update" name="updatesatoshi" class="myButton">&nbsp;<input type="submit" value="Delete" name="delsatoshi" class="myButton"></td>
</tr>
</form>
<?php
}
?>
</table>
</td>
</tr>
</tbody></table>
<?php
}
}
}elseif ($opt == "payoutapisetting") {
if(!empty($_POST["fhsetting"])) {
$payout_website = $_POST["payout_website"];
$fhapi = $_POST["fhapi"];
$currency = $_POST["currency"];
$fpapi = $_POST["fpapi"];
$exapi = $_POST["exapi"];
$exuser = $_POST["exuser"];
$micapi = $_POST["micapi"];
$currency = strtoupper($currency);
$cchar = strlen($fhapi);
$randn = (rand(1,$cchar));
$sec = md5($hacker_security);
$repone = substr($fhapi, 0, $randn);
$reptwo = substr($fhapi, $randn);
$replacecfhapi = $repone.$sec.$reptwo;
$cchar = strlen($fpapi);
$randn = (rand(1,$cchar));
$sec = md5($hacker_security);
$repone = substr($fpapi, 0, $randn);
$reptwo = substr($fpapi, $randn);
$replacecfpapi = $repone.$sec.$reptwo;
$cchar = strlen($exapi);
$randn = (rand(1,$cchar));
$sec = md5($hacker_security);
$repone = substr($exapi, 0, $randn);
$reptwo = substr($exapi, $randn);
$replacecexapi = $repone.$sec.$reptwo;
$cchar = strlen($exuser);
$randn = (rand(1,$cchar));
$sec = md5($hacker_security);
$repone = substr($exuser, 0, $randn);
$reptwo = substr($exuser, $randn);
$replacecexuser = $repone.$sec.$reptwo;
$cchar = strlen($micapi);
$randn = (rand(1,$cchar));
$sec = md5($hacker_security);
$repone = substr($micapi, 0, $randn);
$reptwo = substr($micapi, $randn);
$replacecmicapi = $repone.$sec.$reptwo;
$mysqli->query("UPDATE settings SET value = '$currency' WHERE id = '14'");
$mysqli->query("UPDATE settings SET value = '$replacecfhapi' WHERE id = '15'");
$mysqli->query("UPDATE settings SET value = '$payout_website' WHERE id = '38'");
$mysqli->query("UPDATE settings SET value = '$replacecfpapi' WHERE id = '39'");
$mysqli->query("UPDATE settings SET value = '$replacecexapi' WHERE id = '40'");
$mysqli->query("UPDATE settings SET value = '$replacecexuser' WHERE id = '41'");
$mysqli->query("UPDATE settings SET value = '$replacecmicapi' WHERE id = '42'");
}
$currency = $mysqli->query("SELECT * FROM settings WHERE id = '14'")->fetch_object()->value;
$payoutwebsite = $mysqli->query("SELECT * FROM settings WHERE id = '38'")->fetch_object()->value;
$faucetHub_api_key = $mysqli->query("SELECT * FROM settings WHERE id = '15'")->fetch_object()->value;
$faucetpay_api_token = $mysqli->query("SELECT * FROM settings WHERE id = '39'")->fetch_object()->value;
$expresscrypto_api_token = $mysqli->query("SELECT * FROM settings WHERE id = '40'")->fetch_object()->value;
$expresscrypto_user_token = $mysqli->query("SELECT * FROM settings WHERE id = '41'")->fetch_object()->value;
$microwallet_api = $mysqli->query("SELECT * FROM settings WHERE id = '42'")->fetch_object()->value;
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<form action="" method="POST">
<tr><td align="left" class="chmer" colspan="7">Payout Website Setting</td></tr>
<tr><td>Payout Website</td><td>
<select class="form-control" name="payout_website">
<option value="<?php echo $payoutwebsite; ?>" selected><?php echo $payoutwebsite; ?></option>
<option value="Expresscrypto.io">Expresscrypto.io</option>
<option value="Faucetpay.io">Faucetpay.io</option>
<option value="Microwallet.co">Microwallet.co</option>
<option value="Faucethub.io">Faucethub.io</option>
</select>
</td></tr>
<tr><td align="left" class="chmer" colspan="7">FaucetHub API Setting</td></tr>
<tr><td>FaucetHub Api </td><td><input type="text" name="fhapi" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$faucetHub_api = str_replace($sec,"",$faucetHub_api_key);
echo $faucetHub_api; ?>"></td></tr>
<tr><td align="left" class="chmer" colspan="7">Faucetpay API Setting</td></tr>
<tr><td>Faucetpay_api_token </td><td><input type="text" name="fpapi" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$faucetpay_api_token = str_replace($sec,"",$faucetpay_api_token);
echo $faucetpay_api_token; ?>"></td></tr>
<tr><td align="left" class="chmer" colspan="7">Expresscrypto API Setting</td></tr>
<tr><td>Expresscrypto_api_key </td><td><input type="text" name="exapi" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$expresscrypto_api_token = str_replace($sec,"",$expresscrypto_api_token);
echo $expresscrypto_api_token; ?>"></td></tr>
<tr><td>Expresscrypto_user_token </td><td><input type="text" name="exuser" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$expresscrypto_user_token = str_replace($sec,"",$expresscrypto_user_token);
echo $expresscrypto_user_token; ?>"></td></tr>
<tr><td align="left" class="chmer" colspan="7">Microwallet API Setting</td></tr>
<tr><td>Microwallet_API </td><td><input type="text" name="micapi" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$microwallet_api = str_replace($sec,"",$microwallet_api);
echo $microwallet_api; ?>"></td></tr>
<tr><td align="left" class="chmer" colspan="7">Payout Currency Setting</td></tr>
<tr><td>Currency </td><td>
<select class="form-control" name="currency">
<option value="<?php echo $currency; ?>" selected><?php echo $currency; ?></option>
<option value="BTC">BTC</option>
<option value="LTC">LTC</option>
<option value="DOGE">DOGE</option>
</select>
<tr><td colspan="2" align="center"><input type="submit" name="fhsetting" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="myButton"></td></tr>
</form>
</table>
</td>
</tr>
</tbody></table>
<?php
}}else{
if(!empty($_POST["mainpage"])) {
$titalname = $_POST["titalname"];
$sitedesrip = $_POST["sitedesrip"];
$siteurl = $_POST["siteurl"];
$blanceshow = strtolower($_POST["blanceshow"]);
$faucetonoff = strtolower($_POST["faucetonoff"]);
$Time_wait_page_load = $_POST["Time_wait_page_load"];
$Time_waite_button_show = $_POST["Time_waite_button_show"];
$timerreward = $_POST["timerreward"];
$referral_commision = $_POST["referral_commision"];
$copyright = $_POST["copyright"];
$antibot = strtolower($_POST["antibot"]);
$adfp = strtolower($_POST["adfp"]);
$adlf = strtolower($_POST["adlf"]);
$adrf = strtolower($_POST["adrf"]);
$adff = strtolower($_POST["adff"]);
$proxyc = strtolower($_POST["proxyc"]);
$meta_description = $_POST["meta_description"];
$meta_keywords = $_POST["meta_keywords"];
$pdurl = $_POST["pdurl"];
$pdmw = $_POST["pdmw"];
$mysqli->query("UPDATE settings SET value = '$titalname' WHERE id = '1'");
$mysqli->query("UPDATE settings SET value = '$sitedesrip' WHERE id = '2'");
$mysqli->query("UPDATE settings SET value = '$siteurl' WHERE id = '3'");
$mysqli->query("UPDATE settings SET value = '$blanceshow' WHERE id = '5'");
$mysqli->query("UPDATE settings SET value = '$faucetonoff' WHERE id = '6'");
$mysqli->query("UPDATE settings SET value = '$Time_wait_page_load' WHERE id = '7'");
$mysqli->query("UPDATE settings SET value = '$Time_waite_button_show' WHERE id = '8'");
$mysqli->query("UPDATE settings SET value = '$timerreward' WHERE id = '10'");
$mysqli->query("UPDATE settings SET value = '$referral_commision' WHERE id = '11'");
$mysqli->query("UPDATE settings SET value = '$antibot' WHERE id = '13'");
$mysqli->query("UPDATE settings SET value = '$adfp' WHERE id = '47'");
$mysqli->query("UPDATE settings SET value = '$adlf' WHERE id = '31'");
$mysqli->query("UPDATE settings SET value = '$adrf' WHERE id = '32'");
$mysqli->query("UPDATE settings SET value = '$adff' WHERE id = '33'");
$mysqli->query("UPDATE settings SET value = '$proxyc' WHERE id = '46'");
$mysqli->query("UPDATE settings SET value = '$copyright' WHERE id = '34'");
$mysqli->query("UPDATE settings SET value = '$meta_description' WHERE id = '35'");
$mysqli->query("UPDATE settings SET value = '$meta_keywords' WHERE id = '36'");
$mysqli->query("UPDATE settings SET value = '$pdurl' WHERE id = '37'");
$mysqli->query("UPDATE settings SET name = '$pdmw' WHERE id = '37'");
if ($faucetonoff == "off") {
$mysqli->query("UPDATE settings SET value = '0' WHERE id = '45'");
}}
$titalname = $mysqli->query("SELECT * FROM settings WHERE id = '1'")->fetch_object()->value;
$sitedesrip = $mysqli->query("SELECT * FROM settings WHERE id = '2'")->fetch_object()->value;
$siteurl = $mysqli->query("SELECT * FROM settings WHERE id = '3'")->fetch_object()->value;
$blanceshow = $mysqli->query("SELECT * FROM settings WHERE id = '5'")->fetch_object()->value;
$faucetonoff = $mysqli->query("SELECT * FROM settings WHERE id = '6'")->fetch_object()->value;
$Time_wait_page_load = $mysqli->query("SELECT * FROM settings WHERE id = '7'")->fetch_object()->value;
$Time_waite_button_show = $mysqli->query("SELECT * FROM settings WHERE id = '8'")->fetch_object()->value;
$timerreward = $mysqli->query("SELECT * FROM settings WHERE id = '10'")->fetch_object()->value;
$referral_commision = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$antibot = $mysqli->query("SELECT * FROM settings WHERE id = '13'")->fetch_object()->value;
$adfp = $mysqli->query("SELECT * FROM settings WHERE id = '47'")->fetch_object()->value;
$adlf = $mysqli->query("SELECT * FROM settings WHERE id = '31'")->fetch_object()->value;
$adrf = $mysqli->query("SELECT * FROM settings WHERE id = '32'")->fetch_object()->value;
$adff = $mysqli->query("SELECT * FROM settings WHERE id = '33'")->fetch_object()->value;
$proxyc = $mysqli->query("SELECT * FROM settings WHERE id = '46'")->fetch_object()->value;
$copyright = $mysqli->query("SELECT * FROM settings WHERE id = '34'")->fetch_object()->value;
$metadescription = $mysqli->query("SELECT * FROM settings WHERE id = '35'")->fetch_object()->value;
$metakeywords = $mysqli->query("SELECT * FROM settings WHERE id = '36'")->fetch_object()->value;
$ipaddressc = $mysqli->query("SELECT * FROM settings WHERE id = '37'")->fetch_object()->value;
$mword = $mysqli->query("SELECT * FROM settings WHERE id = '37'")->fetch_object()->name;
$blanceshow = ucfirst($blanceshow);
$faucetonoff = ucfirst($faucetonoff);
$antibot = ucfirst($antibot);
$adfp = ucfirst($adfp);
$adlf = ucfirst($adlf);
$adrf = ucfirst($adrf);
$adff = ucfirst($adff);
$proxyc = ucfirst($proxyc);
?>
<table class="distable" border="0">
<tbody><tr>
<td class="disttd">
<table class="distable" border="1">
<tr><td align="left" class="chmer" colspan="7">Website Setting</td></tr>
<tr>
<form action="" method="POST">
<tr><td>Website Name</td><td><input type="text" name="titalname" size="50" class="form-control" aria-describedby="namehelp" value="<?php echo $titalname?>"></td></tr>
<tr><td>Description </td><td><input type="text" name="sitedesrip" size="50" class="form-control" aria-describedby="descriptionhelp" value="<?php echo $sitedesrip?>"></td></tr>
<tr><td>Url </td><td><input type="text" name="siteurl" class="form-control" size="50" id="url" aria-describedby="urlhelp" value="<?php echo $siteurl?>"></td></tr>
<tr><td>Meta Description</td><td><input type="text" name="meta_description" size="50" class="form-control" aria-describedby="Meta Description" value="<?php echo $metadescription ?>"></td></tr>
<tr><td>Meta Keywords</td><td><input type="text" name="meta_keywords" size="50" class="form-control" aria-describedby="Meta Keywords" value="<?php echo $metakeywords ?>"></td></tr>
<tr><td>Balance Show </td><td>
<select class="form-control" name="blanceshow">
<option value="<?php echo $blanceshow; ?>" selected><?php echo $blanceshow; ?></option>
<?php
if ($blanceshow == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td>Faucet Run </td><td>
<select class="form-control" name="faucetonoff">
<option value="<?php echo $faucetonoff; ?>" selected><?php echo $faucetonoff; ?></option>
<?php
if ($faucetonoff == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td>Time wait Page Load </td><td><input type="number" min="1" name="Time_wait_page_load" class="form-control" id="timer" aria-describedby="timerhelp" value="<?php echo $Time_wait_page_load?>"></td></tr>
<tr><td>Time Waite Button Show </td><td><input type="number" min="1" name="Time_waite_button_show" class="form-control" id="timer" aria-describedby="timerhelp" value="<?php echo $Time_waite_button_show?>"></td></tr>
<tr><td>Timer Reward </td><td><input type="number" min="1" name="timerreward" class="form-control" id="timer" aria-describedby="timerhelp" value="<?php echo $timerreward?>"></td></tr>
<tr><td>Referral Commision </td><td><input type="number" min="1" name="referral_commision" class="form-control" id="timer" aria-describedby="timerhelp" value="<?php echo $referral_commision?>">%</td></tr>
<tr><td>Copyright </td><td><input type="text" name="copyright" class="form-control" id="timer" aria-describedby="timerhelp" value="<?php echo $copyright;?>"></td></tr>
<tr><td>Antibot </td><td>
<select class="form-control" name="antibot">
<option value="<?php echo $antibot; ?>" selected><?php echo $antibot; ?></option>
<?php
if ($antibot == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td align="left" class="chmer" colspan="7">Fixed Ad Setting</td></tr>
<tr><td>Ad Show Full Page </td><td>
<select class="form-control" name="adfp">
<option value="<?php echo $adfp; ?>" selected><?php echo $adfp; ?></option>
<?php
if ($adfp == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td>Ad Show Left </td><td>
<select class="form-control" name="adlf">
<option value="<?php echo $adlf; ?>" selected><?php echo $adlf; ?></option>
<?php
if ($adlf == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td>Ad Show Right </td><td>
<select class="form-control" name="adrf">
<option value="<?php echo $adrf; ?>" selected><?php echo $adrf; ?></option>
<?php
if ($adrf == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td>Ad Show Center </td><td>
<select class="form-control" name="adff">
<option value="<?php echo $adff; ?>" selected><?php echo $adff; ?></option>
<?php
if ($adff == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td align="left" class="chmer" colspan="7">Proxy URL Setting</td></tr>
<tr><td>Proxy Check Show </td><td>
<select class="form-control" name="proxyc">
<option value="<?php echo $proxyc; ?>" selected><?php echo $proxyc; ?></option>
<?php
if ($proxyc == "Off") {
?>
<option value="on">On</option>
<?php
}else{
?>
<option value="off">Off</option>
<?php
}
?>
</select>
</td></tr>
<tr><td>Proxy Detected URL </td><td><input type="text" size="50" name="pdurl" class="form-control" value="<?php echo $ipaddressc; ?>" required></td></tr>
<tr><td>Match Word </td><td><input type="text" name="pdmw" class="form-control" value="<?php echo $mword; ?>" required></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="mainpage" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="myButton"></td></tr>
</form>
</table>
</td>
</tr>
</tbody></table>
<?php
}
?>
</td></tr>
</tbody></table>
</div>
</div>
</div>
<footer>
<div class="fleft"><span class="fc"> Copyright © 2017 All Rights Reserved.</span></div>
</footer>
</body></html>
<?php
ob_end_flush(); // Flush the output from the buffer
?>