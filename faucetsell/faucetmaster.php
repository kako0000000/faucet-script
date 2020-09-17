<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
a:link, a:visited {background-color: #4CAF50;color: white;padding: 8px 5px;text-align: center;text-decoration: none;display: inline-block;}
a:hover, a:active {background-color: #f44336;color: black;}
.fautable{border-collapse: collapse;border: 1px solid #ddd;width: 100%;background:#e7f9eb;}
.fautable th{border: 1px solid #ddd;background:#a88e42;padding:10px;}
.fautable tr:nth-child(even) {background-color: #DFF7E4;}
.fautable td {padding:4px;border: 1px solid #ddd;}
.faubtil{padding:10px;}
#triangled {background-color:#00a693;padding:15px 10px;font-size:20px;color:#fff;text-shadow: 1px 1px #000;}
.myButton {box-shadow:inset 0px 0px 15px 3px #23395e;background:linear-gradient(to bottom, #2e466e 5%, #415989 100%);background-color:#2e466e;border-radius:17px;border:1px solid #1f2f47;display:inline-block;cursor:pointer;color:#ffffff;font-size:12px;padding:6px 13px;text-decoration:none;text-shadow:0px 1px 0px #263666;}
.myButton:hover {background:linear-gradient(to bottom, #415989 5%, #2e466e 100%);background-color:#415989;}
.myButton:active {position:relative;top:1px;}
</style>
<?php
include 'libs/database.php';
$titalname = $mysqli->query("SELECT * FROM settings WHERE id = '1'")->fetch_object()->value;
$sitedesrip = $mysqli->query("SELECT * FROM settings WHERE id = '2'")->fetch_object()->value;
?>
<title><?php echo $titalname. ' - ' .$sitedesrip?></title>
</head>
<body>
<?php
if (isset($_SESSION["adminfaucet"])) { 
?>
<table border="0" width="100%">
<tr><td><a href="faucetmaster.php">Main Page</a> <a href="faucetmaster.php?op=FaucetHubSetting">Payout API Setting</a> <a href="faucetmaster.php?op=captchasystem">Captcha System</a> <a href="faucetmaster.php?op=ShortLink">Short Link</a> <a href="faucetmaster.php?op=banner">Banner</a> <a href="faucetmaster.php?op=addnfl">Faucet List</a> <a href="faucetmaster.php?op=addptcl">PTC List</a> <a href="faucetmaster.php?op=logout">Logout</a></td></tr>
</table>
<?php
if(!empty($_GET["op"])) {
$opt = $_GET["op"];
if ($opt == "addptcl") {
if(!empty($_POST["delptcl"])) {
$secucode = $_POST["secucode"];
?>
<table class="fautable">
<tr><td align="center" id="triangled" colspan="7">Do you really want to delete record?</td></tr>
<tr>
<form action="faucetmaster.php?op=addptcl" method="POST">
<td align="center"><input type="submit" onclick="window.location.replace('faucetmaster.php?op=addptcl')" value="Cancel" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $secucode; ?>"><input type="submit" value="Conform Delete" name="cdelptcl" class="myButton"></td>
</form>
</tr>
</table>
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
$queryfaucetdel = "DELETE FROM ptclist  where secucode='$secucode'";
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
<table class="fautable">
<tr><td align="left" id="triangled" colspan="9">PTC List</td></tr>
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
<?php
}}elseif ($opt == "addnfl") {
if(!empty($_POST["delfaucetl"])) {
$secucode = $_POST["secucode"];
?>
<table class="fautable">
<tr><td align="center" id="triangled" colspan="7">Do you really want to delete record?</td></tr>
<tr>
<form action="faucetmaster.php?op=addnfl" method="POST">
<td align="center"><input type="submit" onclick="window.location.replace('faucetmaster.php?op=addnfl')" value="Cancel" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $secucode; ?>"><input type="submit" value="Conform Delete" name="cdelfaucetl" class="myButton"></td>
</form>
</tr>
</table>
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
<table class="fautable">
<tr><td align="left" id="triangled" colspan="7">Bitcoin Faucet List</td></tr>
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
<?php
}}elseif ($opt == "logout") {
setcookie("adminfaucet", "adminlogin", time()-3600);
header('Location: faucetmaster.php');
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
<table class="fautable">
<tr><td align="left" id="triangled" colspan="5">Short Link Setting</td></tr>
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
<tr><td colspan="2" align="right"><input type="submit" name="ShortLinks" value="SAVE" class="myButton"></td></tr>
</form>
</table>
<?php
if(!empty($_POST["delshortlink"])) {
$secucode = $_POST["secucode"];
?>
<table class="fautable">
<tr><td align="center" id="triangled" colspan="7">Do you really want to delete record?</td></tr>
<tr>
<form action="faucetmaster.php?op=ShortLink" method="POST">
<td align="center"><input type="submit" onclick="window.location.replace('faucetmaster.php?op=ShortLink')" value="Cancel" class="myButton">&nbsp;<input type="hidden" name="secucode" value="<?php echo $secucode; ?>"><input type="submit" value="Conform Delete" name="cdelshortlink" class="myButton"></td>
</form>
</tr>
</table>
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
<table class="fautable">
<tr><td align="left" id="triangled" colspan="7">Short Link List</td></tr>
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
<?php
}}elseif ($opt == 'banner') {
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
<table class="fautable">
<tr><td align="left" id="triangled" colspan="7">Banner Page</td></tr>
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
<?php
}
}elseif ($opt == "captchasystem") {
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
<table class="fautable">
<tr><td align="left" id="triangled" colspan="5">Captcha Setting</td></tr>
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
<tr><td align="left" id="triangled" colspan="7">Google Re-captcha</td></tr>
<tr><td>Recaptcha Public Key </td><td><input type="text" name="recaptcha_public_key" class="form-control" size="50" value="<?php echo $recaptcha_public_key;?>"></td></tr>
<tr><td>Recaptcha Secret Key </td><td><input type="text" name="recaptcha_secret_key" class="form-control" size="50" value="<?php echo $recaptcha_secret_key;?>"></td></tr>
<tr><td align="left" id="triangled" colspan="7">Solvemedia Captcha</td></tr>
<tr><td>SolveMedia Challenge Key </td><td><input type="text" name="solveMedia_challenge_key" class="form-control" size="50" value="<?php echo $solveMedia_challenge_key;?>"></td></tr>
<tr><td>SolveMedia Private Key </td><td><input type="text" name="solveMedia_private_key" class="form-control" size="50" value="<?php echo $solveMedia_private_key;?>"></td></tr>
<tr><td>SolveMedia Hash Key </td><td><input type="text" name="solveMedia_hash_key" class="form-control" size="50" value="<?php echo $solveMedia_hash_key;?>"></td></tr>
<tr><td align="left" id="triangled" colspan="7">H-captcha</td></tr>
<tr><td>Hcaptcha Site Key </td><td><input type="text" name="hcaptcha_site_key" class="form-control" size="50" value="<?php echo $hcaptcha_site_key;?>"></td></tr>
<tr><td>Hcaptcha Secret Key </td><td><input type="text" name="hcaptcha_secret_key" class="form-control" size="50" value="<?php echo $hcaptcha_secret_key;?>"></td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="fhsetting" value="SAVE" class="myButton"></td></tr>
</form>
</table>
<?php
}elseif ($opt == "FaucetHubSetting") {
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
<table class="fautable">
<form action="" method="POST">
<tr><td align="left" id="triangled" colspan="7">Payout Website Setting</td></tr>
<tr><td>Payout Website</td><td>
<select class="form-control" name="payout_website">
<option value="<?php echo $payoutwebsite; ?>" selected><?php echo $payoutwebsite; ?></option>
<option value="Expresscrypto.io">Expresscrypto.io</option>
<option value="Faucetpay.io">Faucetpay.io</option>
<option value="Microwallet.co">Microwallet.co</option>
<option value="Faucethub.io">Faucethub.io</option>
</select>
</td></tr>
<tr><td align="left" id="triangled" colspan="7">FaucetHub API Setting</td></tr>
<tr><td>FaucetHub Api </td><td><input type="text" name="fhapi" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$faucetHub_api = str_replace($sec,"",$faucetHub_api_key);
 echo $faucetHub_api; ?>"></td></tr>
<tr><td align="left" id="triangled" colspan="7">Faucetpay API Setting</td></tr>
<tr><td>Faucetpay_api_token </td><td><input type="text" name="fpapi" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$faucetpay_api_token = str_replace($sec,"",$faucetpay_api_token);
 echo $faucetpay_api_token; ?>"></td></tr> 
<tr><td align="left" id="triangled" colspan="7">Expresscrypto API Setting</td></tr>
<tr><td>Expresscrypto_api_key </td><td><input type="text" name="exapi" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$expresscrypto_api_token = str_replace($sec,"",$expresscrypto_api_token);
 echo $expresscrypto_api_token; ?>"></td></tr> 
 <tr><td>Expresscrypto_user_token </td><td><input type="text" name="exuser" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$expresscrypto_user_token = str_replace($sec,"",$expresscrypto_user_token);
 echo $expresscrypto_user_token; ?>"></td></tr> 
<tr><td align="left" id="triangled" colspan="7">Microwallet API Setting</td></tr>
<tr><td>Microwallet_API </td><td><input type="text" name="micapi" size="50" class="form-control" id="api" aria-describedby="apihelp" value="<?php
$sec = md5($hacker_security);
$microwallet_api = str_replace($sec,"",$microwallet_api);
 echo $microwallet_api; ?>"></td></tr> 
 <tr><td align="left" id="triangled" colspan="7">Payout Currency Setting</td></tr>
 <tr><td>Currency </td><td>
<select class="form-control" name="currency">
<option value="<?php echo $currency; ?>" selected><?php echo $currency; ?></option>
<option value="BTC">BTC</option>
<option value="LTC">LTC</option>
<option value="DOGE">DOGE</option>
</select>
<tr><td colspan="2" align="right"><input type="submit" name="fhsetting" value="SAVE" class="myButton"></td></tr>
</form>
</table>
<?php
}}else{
if(!empty($_POST["mainpage"])) {
$titalname = $_POST["titalname"];
$sitedesrip = $_POST["sitedesrip"];
$siteurl = $_POST["siteurl"];
$sitename = $_POST["sitename"];
$blanceshow = strtolower($_POST["blanceshow"]);
$faucetonoff = strtolower($_POST["faucetonoff"]);
$Time_wait_page_load = $_POST["Time_wait_page_load"];
$Time_waite_button_show = $_POST["Time_waite_button_show"];
$reward = $_POST["reward"];
$timerreward = $_POST["timerreward"];
$referral_commision = $_POST["referral_commision"];
$copyright = $_POST["copyright"];
$antibot = strtolower($_POST["antibot"]);
$adlf = strtolower($_POST["adlf"]);
$adrf = strtolower($_POST["adrf"]);
$adff = strtolower($_POST["adff"]);
$meta_description = $_POST["meta_description"];
$meta_keywords = $_POST["meta_keywords"];
$pdurl = $_POST["pdurl"];
$pdmw = $_POST["pdmw"];
$mysqli->query("UPDATE settings SET value = '$titalname' WHERE id = '1'");
$mysqli->query("UPDATE settings SET value = '$sitedesrip' WHERE id = '2'");
$mysqli->query("UPDATE settings SET value = '$siteurl' WHERE id = '3'");
$mysqli->query("UPDATE settings SET value = '$sitename' WHERE id = '4'");
$mysqli->query("UPDATE settings SET value = '$blanceshow' WHERE id = '5'");
$mysqli->query("UPDATE settings SET value = '$faucetonoff' WHERE id = '6'");
$mysqli->query("UPDATE settings SET value = '$Time_wait_page_load' WHERE id = '7'");
$mysqli->query("UPDATE settings SET value = '$Time_waite_button_show' WHERE id = '8'");
$mysqli->query("UPDATE settings SET value = '$reward' WHERE id = '9'");
$mysqli->query("UPDATE settings SET value = '$timerreward' WHERE id = '10'");
$mysqli->query("UPDATE settings SET value = '$referral_commision' WHERE id = '11'");
$mysqli->query("UPDATE settings SET value = '$antibot' WHERE id = '13'"); 
$mysqli->query("UPDATE settings SET value = '$adlf' WHERE id = '31'");
$mysqli->query("UPDATE settings SET value = '$adrf' WHERE id = '32'");
$mysqli->query("UPDATE settings SET value = '$adff' WHERE id = '33'");
$mysqli->query("UPDATE settings SET value = '$copyright' WHERE id = '34'");
$mysqli->query("UPDATE settings SET value = '$meta_description' WHERE id = '35'");
$mysqli->query("UPDATE settings SET value = '$meta_keywords' WHERE id = '36'");
$mysqli->query("UPDATE settings SET value = '$pdurl' WHERE id = '37'");
$mysqli->query("UPDATE settings SET name = '$pdmw' WHERE id = '37'");
}
$titalname = $mysqli->query("SELECT * FROM settings WHERE id = '1'")->fetch_object()->value;
$sitedesrip = $mysqli->query("SELECT * FROM settings WHERE id = '2'")->fetch_object()->value;
$siteurl = $mysqli->query("SELECT * FROM settings WHERE id = '3'")->fetch_object()->value;
$sitename = $mysqli->query("SELECT * FROM settings WHERE id = '4'")->fetch_object()->value;
$blanceshow = $mysqli->query("SELECT * FROM settings WHERE id = '5'")->fetch_object()->value;
$faucetonoff = $mysqli->query("SELECT * FROM settings WHERE id = '6'")->fetch_object()->value;
$Time_wait_page_load = $mysqli->query("SELECT * FROM settings WHERE id = '7'")->fetch_object()->value;
$Time_waite_button_show = $mysqli->query("SELECT * FROM settings WHERE id = '8'")->fetch_object()->value;
$reward = $mysqli->query("SELECT * FROM settings WHERE id = '9'")->fetch_object()->value;
$timerreward = $mysqli->query("SELECT * FROM settings WHERE id = '10'")->fetch_object()->value;
$referral_commision = $mysqli->query("SELECT * FROM settings WHERE id = '11'")->fetch_object()->value;
$antibot = $mysqli->query("SELECT * FROM settings WHERE id = '13'")->fetch_object()->value;
$adlf = $mysqli->query("SELECT * FROM settings WHERE id = '31'")->fetch_object()->value;
$adrf = $mysqli->query("SELECT * FROM settings WHERE id = '32'")->fetch_object()->value;
$adff = $mysqli->query("SELECT * FROM settings WHERE id = '33'")->fetch_object()->value;
$copyright = $mysqli->query("SELECT * FROM settings WHERE id = '34'")->fetch_object()->value;
$metadescription = $mysqli->query("SELECT * FROM settings WHERE id = '35'")->fetch_object()->value;
$metakeywords = $mysqli->query("SELECT * FROM settings WHERE id = '36'")->fetch_object()->value;
$ipaddressc = $mysqli->query("SELECT * FROM settings WHERE id = '37'")->fetch_object()->value;
$mword = $mysqli->query("SELECT * FROM settings WHERE id = '37'")->fetch_object()->name;
$blanceshow = ucfirst($blanceshow);
$faucetonoff = ucfirst($faucetonoff);
$antibot = ucfirst($antibot);
$adlf = ucfirst($adlf);
$adrf = ucfirst($adrf);
$adff = ucfirst($adff);
?>
<table class="fautable">
<tr><td align="left" id="triangled" colspan="7">Website Setting</td></tr>
<tr>
<form action="" method="POST">
<tr><td>Website Name</td><td><input type="text" name="titalname" size="50" class="form-control" aria-describedby="namehelp" value="<?php echo $titalname?>"></td></tr>
<tr><td>Description </td><td><input type="text" name="sitedesrip" size="50" class="form-control" aria-describedby="descriptionhelp" value="<?php echo $sitedesrip?>"></td></tr>
<tr><td>Url </td><td><input type="url" name="siteurl" class="form-control" size="50" id="url" aria-describedby="urlhelp" value="<?php echo $siteurl?>"></td></tr>
<tr><td>Site Name</td><td><input type="text" name="sitename" size="50" class="form-control" aria-describedby="Site name help" value="<?php echo $sitename?>"></td></tr>
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
<tr><td>Reward </td><td><input type="number" min="1" name="reward" class="form-control" id="timer" aria-describedby="timerhelp" value="<?php echo $reward?>"></td></tr>
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
<tr><td align="left" id="triangled" colspan="7">Fixed Ad Setting</td></tr>
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
<tr><td align="left" id="triangled" colspan="7">Proxy URL Setting</td></tr>
<tr><td>Proxy Detected URL </td><td><input type="text" size="50" name="pdurl" class="form-control" value="<?php echo $ipaddressc; ?>" required></td></tr>
<tr><td>Match Word </td><td><input type="text" name="pdmw" class="form-control" value="<?php echo $mword; ?>" required></td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="mainpage" value="SAVE" class="myButton"></td></tr>
</form>
</table>
<?php
}}else{
if (isset($_POST['loginsubmit'])) {
$username = $_POST['username'];
$adpass = $_POST['adminlogin'];
if ($adpass == $admin_password and $username == $admin_username) {
$_SESSION["adminfaucet"] = $username;
$_SESSION["password"] = $adpass;
header('Location: faucetmaster.php');
}}
?>
<style>
html { height: 100% }
::-moz-selection { background: #fe57a1; color: #fff; text-shadow: none; }
::selection { background: #fe57a1; color: #fff; text-shadow: none; }
body { background-image: radial-gradient( cover, rgba(92,100,111,1) 0%,rgba(31,35,40,1) 100%) }
.login {background: #eceeee;border: 1px solid #42464b;border-radius: 6px;height: 300px;margin: 20px auto 0;width: 298px;}
.login h1 {background-image: linear-gradient(top, #f1f3f3, #d4dae0);border-bottom: 1px solid #a6abaf;border-radius: 6px 6px 0 0;box-sizing: border-box;color: #727678;display: block;height: 43px;font: 600 14px/1 'Open Sans', sans-serif;padding-top: 14px;margin: 0;text-align: center;text-shadow: 0 -1px 0 rgba(0,0,0,0.2), 0 1px 0 #fff;}
input[type="password"], input[type="text"] {
background: url('') center left no-repeat, linear-gradient(top, #d6d7d7, #dee0e0);
border: 1px solid #a1a3a3;border-radius: 4px;box-shadow: 0 1px #fff;box-sizing: border-box;color: #696969;height: 39px;margin: 31px 0 0 29px;padding-left: 37px;transition: box-shadow 0.3s;width: 240px;}
input[type="password"]:focus, input[type="text"]:focus {box-shadow: 0 0 4px 1px rgba(55, 166, 155, 0.3);outline: 0;}
.show-password {display: block;height: 16px;margin: 26px 0 0 28px;width: 87px;}
input[type="checkbox"] {cursor: pointer;height: 16px;opacity: 0;position: relative;width: 64px;}
input[type="checkbox"]:checked {left: 29px;width: 58px;}
.toggle {display: block;
height: 16px;margin-top: -20px;width: 87px;z-index: -1;}
input[type="checkbox"]:checked + .toggle { background-position: 0 -16px }
.forgot {color: #7f7f7f;display: inline-block;float: right;font: 12px/1 sans-serif;left: -19px;position: relative;text-decoration: none;top: 5px;transition: color .4s;}
.forgot:hover { color: #3b3b3b }
input[type="submit"] {width:240px;height:35px;display:block;font-family:Arial, "Helvetica", sans-serif;font-size:16px;font-weight:bold;color:#fff;text-decoration:none;text-transform:uppercase;text-align:center;text-shadow:1px 1px 0px #37a69b;padding-top:6px;margin: 29px 0 0 29px;position:relative;cursor:pointer;border: none;background-color: #37a69b;background-image: linear-gradient(top,#3db0a6,#3111);border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;border-bottom-left-radius:5px;box-shadow: inset 0px 1px 0px #2ab7ec, 0px 5px 0px 0px #497a78, 0px 10px 5px #999;}
input[type="submit"]:active {top:3px;box-shadow: inset 0px 1px 0px #2ab7ec, 0px 2px 0px 0px #31524d, 0px 5px 3px #999;}
</style>
<div class="login">
<h1>Admin Login</h1>
<form action="" method="post">
<input type="text"  name="username" placeholder="Username" id="username">  
<input type="password"  name="adminlogin" placeholder="password" id="password">  
<input type="submit" name="loginsubmit" value="Login">
</form>  
</div>
<div class="shadow"></div>
<?php
}
?>
</body>
</html>
