<?php
if (isset($_GET["size"])) {
$adstext  = $_GET["size"];
require('libs/database.php');
$sqlrc = "SELECT * FROM pendwebs where websecord='$adstext'";
$resultrc = mysqli_query($mysqli, $sqlrc);
$totalrc = mysqli_num_rows($resultrc);
$myrowopenweb = mysqli_fetch_array($resultrc);
if ($totalrc == '0') {
?>
<style>
body {margin:0;}
.disptextadson {overflow:hidden;padding: 3px 5px 0 5px; border: 1px solid #ccc; margin: 0;width: 456px;height: 55px;position: relative;}
.disptextadsto {font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0; text-align: left;font-size: 13px;line-height: 1.4;overflow: hidden;word-wrap: break-word;}
.disptextadsfo {color: #093; display: inline-block; font-size: 13px; word-break: break-all;}
.disptextadsth {text-decoration: underline; color: #00C; font-weight: bold;font-size: 16px; display: inline-block; margin-bottom: 2px; line-height: 1;}
</style>
<div class='disptextadson'>
<div class="disptextadsto">
<a href="../?op=advertising" target="_blank" class='disptextadsth'>Increase traffic of your website.</a>
<br><span>Increase traffic of your website. Many Website see your ads.</span><br>
</div>
</div>
<?php
}else{
$reportadsnum = '0';
if ($reportadsnum == '0') {
$webcode = $myrowopenweb["websecord"];
$totalview = $myrowopenweb["viewads"]+1;
$query = "UPDATE pendwebs Set viewads = '$totalview' where websecord='$webcode'";
$result = mysqli_query($mysqli, $query);
$totalv = $myrowopenweb["bimpres"];
if ($totalview > $totalv) {
$queryfaucetdel = "DELETE FROM pendwebs where websecord='$webcode'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
$queryfaucetdel = "DELETE FROM banners where secucode='$webcode'";
$resultsam = mysqli_query($mysqli, $queryfaucetdel);
}
?>
<style>
body {margin:0;}
.disptextadson {overflow:hidden;padding: 3px 5px 0 5px; border: 1px solid #ccc; margin:0;width: 456px;height: 55px;position: relative;}
.disptextadsto {font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0; text-align: left;font-size: 13px;line-height: 1.4;overflow: hidden;word-wrap: break-word;}
.disptextadsfo {color: #093; display: inline-block; font-size: 13px; word-break: break-all;position:relative; top:-3px;}
.disptextadsth {text-decoration: underline; color: #00C; font-weight: bold;font-size: 16px; display: inline-block; margin-bottom: 2px; line-height: 1;}
</style>
<div class='disptextadson'>
<div class="disptextadsto">
<a href="../ad/?ad=<?php echo $myrowopenweb["websecord"]; ?>" target="_blank" class='disptextadsth'><?php echo $myrowopenweb["headline"]; ?></a>
<br><span><?php echo $myrowopenweb["descri"]; ?></span><br>
<span class="disptextadsfo"><?php echo $myrowopenweb["displayurl"]; ?></span>
</div>
</div>
<?php
}}}else{
?>
<style>
body {margin:0;}
.disptextadson {overflow:hidden;padding: 3px 5px 0 5px; border: 1px solid #ccc; margin: 0;width: 456px;height: 55px;position: relative;}
.disptextadsto {font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0; text-align: left;font-size: 13px;line-height: 1.4;overflow: hidden;word-wrap: break-word;}
.disptextadsfo {color: #093; display: inline-block; font-size: 13px; word-break: break-all;}
.disptextadsth {text-decoration: underline; color: #00C; font-weight: bold;font-size: 16px; display: inline-block; margin-bottom: 2px; line-height: 1;}
</style>
<div class='disptextadson'>
<div class="disptextadsto">
<a href="../?op=advertising" target="_blank" class='disptextadsth'>Free Traffic Exchange</a>
<br><span>Increase traffic of your website. Many Website see your ads.</span><br>
</div>
</div>
<?php
}
?>