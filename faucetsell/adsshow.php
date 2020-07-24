<?php
$bannerrand = $mysqli->query("SELECT * FROM banners order by RAND() limit 1")->fetch_object()->bannersize;
$changeads = $bannerrand;
if ($changeads == "120x60") {
$sqlre120x60 = "SELECT * FROM reptads where repads='120x60'";
$resultre120x60 = mysqli_query($mysqli, $sqlre120x60); 
$myrowre120x60 = mysqli_fetch_array($resultre120x60);
$reportnumrot120x60 = $myrowre120x60["numberr"];
$sqlban120x60 = "SELECT * FROM banners where bannersize='120x60' LIMIT $reportnumrot120x60,1";
$resultban120x60 = mysqli_query($mysqli, $sqlban120x60);
$myrowban120x60 = mysqli_fetch_array($resultban120x60);
$myrowban120x60 = $myrowban120x60["fbanercode"];
$bannerrot = $myrowban120x60;
if ($reportnumrot120x60 >= $totalrecord120x60-1) {
$queryreu120x60 = "UPDATE reptads Set numberr = '0' where  repads='120x60'";
$resultreu120x60 = mysqli_query($mysqli, $queryreu120x60);
}else{
$numberr120x60 = $myrowre120x60["numberr"]+1;
$queryreu120x60 = "UPDATE reptads Set numberr = '$numberr120x60' where  repads='120x60'";
$resultreu120x60 = mysqli_query($mysqli, $queryreu120x60);
}
$bannerwidth = "width:392px";
}elseif ($changeads == "120x90") {
$sqlre120x90 = "SELECT * FROM reptads where repads='120x90'";
$resultre120x90 = mysqli_query($mysqli, $sqlre120x90); 
$myrowre120x90 = mysqli_fetch_array($resultre120x90);
$reportnumrot120x90 = $myrowre120x90["numberr"];
$sqlban120x90 = "SELECT * FROM banners where bannersize='120x90' LIMIT $reportnumrot120x90,1";
$resultban120x90 = mysqli_query($mysqli, $sqlban120x90);
$myrowban120x90 = mysqli_fetch_array($resultban120x90);
$myrowban120x90 = $myrowban120x90["fbanercode"];
$bannerrot = $myrowban120x90;
if ($reportnumrot120x90 >= $totalrecord120x90-1) {
$queryreu120x90 = "UPDATE reptads Set numberr = '0' where  repads='120x90'";
$resultreu120x90 = mysqli_query($mysqli, $queryreu120x90);
}else{
$numberr120x90 = $myrowre120x90["numberr"]+1;
$queryreu120x90 = "UPDATE reptads Set numberr = '$numberr120x90' where  repads='120x90'";
$resultreu120x90 = mysqli_query($mysqli, $queryreu120x90);
}
$bannerwidth = "width:392px";
}elseif ($changeads == "120x240") {
$sqlre120x240 = "SELECT * FROM reptads where repads='120x240'";
$resultre120x240 = mysqli_query($mysqli, $sqlre120x240); 
$myrowre120x240 = mysqli_fetch_array($resultre120x240);
$reportnumrot120x240 = $myrowre120x240["numberr"];
$sqlban120x240 = "SELECT * FROM banners where bannersize='120x240' LIMIT $reportnumrot120x240,1";
$resultban120x240 = mysqli_query($mysqli, $sqlban120x240);
$myrowban120x240 = mysqli_fetch_array($resultban120x240);
$myrowban120x240 = $myrowban120x240["fbanercode"];
$bannerrot = $myrowban120x240;
if ($reportnumrot120x240 >= $totalrecord120x240-1) {
$queryreu120x240 = "UPDATE reptads Set numberr = '0' where  repads='120x240'";
$resultreu120x240 = mysqli_query($mysqli, $queryreu120x240);
}else{
$numberr120x240 = $myrowre120x240["numberr"]+1;
$queryreu120x240 = "UPDATE reptads Set numberr = '$numberr120x240' where  repads='120x240'";
$resultreu120x240 = mysqli_query($mysqli, $queryreu120x240);
}
$bannerwidth = "width:392px;margin:6px auto;";
}elseif ($changeads == "120x600") {
$sqlre120x600 = "SELECT * FROM reptads where repads='120x600'";
$resultre120x600 = mysqli_query($mysqli, $sqlre120x600); 
$myrowre120x600 = mysqli_fetch_array($resultre120x600);
$reportnumrot120x600 = $myrowre120x600["numberr"];
$sqlban120x600 = "SELECT * FROM banners where bannersize='120x600' LIMIT $reportnumrot120x600,1";
$resultban120x600 = mysqli_query($mysqli, $sqlban120x600);
$myrowban120x600 = mysqli_fetch_array($resultban120x600);
$myrowban120x600 = $myrowban120x600["fbanercode"];
$bannerrot = $myrowban120x600;
if ($reportnumrot120x600 >= $totalrecord120x600-1) {
$queryreu120x600 = "UPDATE reptads Set numberr = '0' where  repads='120x600'";
$resultreu120x600 = mysqli_query($mysqli, $queryreu120x600);
}else{
$numberr120x600 = $myrowre120x600["numberr"]+1;
$queryreu120x600 = "UPDATE reptads Set numberr = '$numberr120x600' where  repads='120x600'";
$resultreu120x600 = mysqli_query($mysqli, $queryreu120x600);
}
$bannerwidth = "width:392px;margin:6px auto;";
}elseif ($changeads == "125x125") {
$sqlre125x125 = "SELECT * FROM reptads where repads='125x125'";
$resultre125x125 = mysqli_query($mysqli, $sqlre125x125); 
$myrowre125x125 = mysqli_fetch_array($resultre125x125);
$reportnumrot125x125 = $myrowre125x125["numberr"];
$sqlban125x125 = "SELECT * FROM banners where bannersize='125x125' LIMIT $reportnumrot125x125,1";
$resultban125x125 = mysqli_query($mysqli, $sqlban125x125);
$myrowban125x125 = mysqli_fetch_array($resultban125x125);
$myrowban125x125 = $myrowban125x125["fbanercode"];
$bannerrot = $myrowban125x125;
if ($reportnumrot125x125 >= $totalrecord125x125-1) {
$queryreu125x125 = "UPDATE reptads Set numberr = '0' where  repads='125x125'";
$resultreu125x125 = mysqli_query($mysqli, $queryreu125x125);
}else{
$numberr125x125 = $myrowre125x125["numberr"]+1;
$queryreu125x125 = "UPDATE reptads Set numberr = '$numberr125x125' where  repads='125x125'";
$resultreu125x125 = mysqli_query($mysqli, $queryreu125x125);
}
$bannerwidth = "width:392px";
}elseif ($changeads == "160x600") {
$sqlre160x600 = "SELECT * FROM reptads where repads='160x600'";
$resultre160x600 = mysqli_query($mysqli, $sqlre160x600); 
$myrowre160x600 = mysqli_fetch_array($resultre160x600);
$reportnumrot160x600 = $myrowre160x600["numberr"];
$sqlban160x600 = "SELECT * FROM banners where bannersize='160x600' LIMIT $reportnumrot160x600,1";
$resultban160x600 = mysqli_query($mysqli, $sqlban160x600);
$myrowban160x600 = mysqli_fetch_array($resultban160x600);
$myrowban160x600 = $myrowban160x600["fbanercode"];
$bannerrot = $myrowban160x600;
if ($reportnumrot160x600 >= $totalrecord160x600-1) {
$queryreu160x600 = "UPDATE reptads Set numberr = '0' where  repads='160x600'";
$resultreu160x600 = mysqli_query($mysqli, $queryreu160x600);
}else{
$numberr160x600 = $myrowre160x600["numberr"]+1;
$queryreu160x600 = "UPDATE reptads Set numberr = '$numberr160x600' where  repads='160x600'";
$resultreu160x600 = mysqli_query($mysqli, $queryreu160x600);
}
$bannerwidth = "width:392px;margin:6px auto;";
}elseif ($changeads == "200x200") {
$sqlre200x200 = "SELECT * FROM reptads where repads='200x200'";
$resultre200x200 = mysqli_query($mysqli, $sqlre200x200); 
$myrowre200x200 = mysqli_fetch_array($resultre200x200);
$reportnumrot200x200 = $myrowre200x200["numberr"];
$sqlban200x200 = "SELECT * FROM banners where bannersize='200x200' LIMIT $reportnumrot200x200,1";
$resultban200x200 = mysqli_query($mysqli, $sqlban200x200);
$myrowban200x200 = mysqli_fetch_array($resultban200x200);
$myrowban200x200 = $myrowban200x200["fbanercode"];
$bannerrot = $myrowban200x200;
if ($reportnumrot200x200 >= $totalrecord200x200-1) {
$queryreu200x200 = "UPDATE reptads Set numberr = '0' where  repads='200x200'";
$resultreu200x200 = mysqli_query($mysqli, $queryreu200x200);
}else{
$numberr200x200 = $myrowre200x200["numberr"]+1;
$queryreu200x200 = "UPDATE reptads Set numberr = '$numberr200x200' where  repads='200x200'";
$resultreu200x200 = mysqli_query($mysqli, $queryreu200x200);
}
$bannerwidth = "width:392px";
}elseif ($changeads == "240x400") {
$sqlre240x400 = "SELECT * FROM reptads where repads='240x400'";
$resultre240x400 = mysqli_query($mysqli, $sqlre240x400); 
$myrowre240x400 = mysqli_fetch_array($resultre240x400);
$reportnumrot240x400 = $myrowre240x400["numberr"];
$sqlban240x400 = "SELECT * FROM banners where bannersize='240x400' LIMIT $reportnumrot240x400,1";
$resultban240x400 = mysqli_query($mysqli, $sqlban240x400);
$myrowban240x400 = mysqli_fetch_array($resultban240x400);
$myrowban240x400 = $myrowban240x400["fbanercode"];
$bannerrot = $myrowban240x400;
if ($reportnumrot240x400 >= $totalrecord240x400-1) {
$queryreu240x400 = "UPDATE reptads Set numberr = '0' where  repads='240x400'";
$resultreu240x400 = mysqli_query($mysqli, $queryreu240x400);
}else{
$numberr240x400 = $myrowre240x400["numberr"]+1;
$queryreu240x400 = "UPDATE reptads Set numberr = '$numberr240x400' where  repads='240x400'";
$resultreu240x400 = mysqli_query($mysqli, $queryreu240x400);
}
$bannerwidth = "width:392px;margin:80px auto;";
}elseif ($changeads == "250x250") {
$sqlre250x250 = "SELECT * FROM reptads where repads='250x250'";
$resultre250x250 = mysqli_query($mysqli, $sqlre250x250); 
$myrowre250x250 = mysqli_fetch_array($resultre250x250);
$reportnumrot250x250 = $myrowre250x250["numberr"];
$sqlban250x250 = "SELECT * FROM banners where bannersize='250x250' LIMIT $reportnumrot250x250,1";
$resultban250x250 = mysqli_query($mysqli, $sqlban250x250);
$myrowban250x250 = mysqli_fetch_array($resultban250x250);
$myrowban250x250 = $myrowban250x250["fbanercode"];
$bannerrot = $myrowban250x250;
if ($reportnumrot250x250 >= $totalrecord250x250-1) {
$queryreu250x250 = "UPDATE reptads Set numberr = '0' where  repads='250x250'";
$resultreu250x250 = mysqli_query($mysqli, $queryreu250x250);
}else{
$numberr250x250 = $myrowre250x250["numberr"]+1;
$queryreu250x250 = "UPDATE reptads Set numberr = '$numberr250x250' where  repads='250x250'";
$resultreu250x250 = mysqli_query($mysqli, $queryreu250x250);
}
$bannerwidth = "width:392px";
}elseif ($changeads == "300x250") {
$sqlre300x250 = "SELECT * FROM reptads where repads='300x250'";
$resultre300x250 = mysqli_query($mysqli, $sqlre300x250); 
$myrowre300x250 = mysqli_fetch_array($resultre300x250);
$reportnumrot300x250 = $myrowre300x250["numberr"];
$sqlban300x250 = "SELECT * FROM banners where bannersize='300x250' LIMIT $reportnumrot300x250,1";
$resultban300x250 = mysqli_query($mysqli, $sqlban300x250);
$myrowban300x250 = mysqli_fetch_array($resultban300x250);
$myrowban300x250 = $myrowban300x250["fbanercode"];
$bannerrot = $myrowban300x250;
if ($reportnumrot300x250 >= $totalrecord300x250-1) {
$queryreu300x250 = "UPDATE reptads Set numberr = '0' where  repads='300x250'";
$resultreu300x250 = mysqli_query($mysqli, $queryreu300x250);
}else{
$numberr300x250 = $myrowre300x250["numberr"]+1;
$queryreu300x250 = "UPDATE reptads Set numberr = '$numberr300x250' where  repads='300x250'";
$resultreu300x250 = mysqli_query($mysqli, $queryreu300x250);
}
$bannerwidth = "width:392px";
}elseif ($changeads == "320x50") {
$sqlre320x50 = "SELECT * FROM reptads where repads='320x50'";
$resultre320x50 = mysqli_query($mysqli, $sqlre320x50); 
$myrowre320x50 = mysqli_fetch_array($resultre320x50);
$reportnumrot320x50 = $myrowre320x50["numberr"];
$sqlban320x50 = "SELECT * FROM banners where bannersize='320x50' LIMIT $reportnumrot320x50,1";
$resultban320x50 = mysqli_query($mysqli, $sqlban320x50);
$myrowban320x50 = mysqli_fetch_array($resultban320x50);
$myrowban320x50 = $myrowban320x50["fbanercode"];
$bannerrot = $myrowban320x50;
if ($reportnumrot320x50 >= $totalrecord320x50-1) {
$queryreu320x50 = "UPDATE reptads Set numberr = '0' where  repads='320x50'";
$resultreu320x50 = mysqli_query($mysqli, $queryreu320x50);
}else{
$numberr320x50 = $myrowre320x50["numberr"]+1;
$queryreu320x50 = "UPDATE reptads Set numberr = '$numberr320x50' where  repads='320x50'";
$resultreu320x50 = mysqli_query($mysqli, $queryreu320x50);
}
$bannerwidth = "width:392px;";
}elseif ($changeads == "468x15") {
$sqlre468x15 = "SELECT * FROM reptads where repads='468x15'";
$resultre468x15 = mysqli_query($mysqli, $sqlre468x15); 
$myrowre468x15 = mysqli_fetch_array($resultre468x15);
$reportnumrot468x15 = $myrowre468x15["numberr"];
$sqlban468x15 = "SELECT * FROM banners where bannersize='468x15' LIMIT $reportnumrot468x15,1";
$resultban468x15 = mysqli_query($mysqli, $sqlban468x15);
$myrowban468x15 = mysqli_fetch_array($resultban468x15);
$myrowban468x15 = $myrowban468x15["fbanercode"];
$bannerrot = $myrowban468x15;
if ($reportnumrot468x15 >= $totalrecord468x15-1) {
$queryreu468x15 = "UPDATE reptads Set numberr = '0' where  repads='468x15'";
$resultreu468x15 = mysqli_query($mysqli, $queryreu468x15);
}else{
$numberr468x15 = $myrowre468x15["numberr"]+1;
$queryreu468x15 = "UPDATE reptads Set numberr = '$numberr468x15' where  repads='468x15'";
$resultreu468x15 = mysqli_query($mysqli, $queryreu468x15);
}
$bannerwidth = "width:540px";
}elseif ($changeads == "468x60") {
$sqlre468x60 = "SELECT * FROM reptads where repads='468x60'";
$resultre468x60 = mysqli_query($mysqli, $sqlre468x60); 
$myrowre468x60 = mysqli_fetch_array($resultre468x60);
$reportnumrot468x60 = $myrowre468x60["numberr"];
$sqlban468x60 = "SELECT * FROM banners where bannersize='468x60' LIMIT $reportnumrot468x60,1";
$resultban468x60 = mysqli_query($mysqli, $sqlban468x60);
$myrowban468x60 = mysqli_fetch_array($resultban468x60);
$myrowban468x60 = $myrowban468x60["fbanercode"];
$bannerrot = $myrowban468x60;
if ($reportnumrot468x60 >= $totalrecord468x60-1) {
$queryreu468x60 = "UPDATE reptads Set numberr = '0' where  repads='468x60'";
$resultreu468x60 = mysqli_query($mysqli, $queryreu468x60);
}else{
$numberr468x60 = $myrowre468x60["numberr"]+1;
$queryreu468x60 = "UPDATE reptads Set numberr = '$numberr468x60' where  repads='468x60'";
$resultreu468x60 = mysqli_query($mysqli, $queryreu468x60);
}
$bannerwidth = "width:540px;";
}elseif ($changeads == "728x90") {
$sqlre728x90 = "SELECT * FROM reptads where repads='728x90'";
$resultre728x90 = mysqli_query($mysqli, $sqlre728x90); 
$myrowre728x90 = mysqli_fetch_array($resultre728x90);
$reportnumrot728x90 = $myrowre728x90["numberr"];
$sqlban728x90 = "SELECT * FROM banners where bannersize='728x90' LIMIT $reportnumrot728x90,1";
$resultban728x90 = mysqli_query($mysqli, $sqlban728x90);
$myrowban728x90 = mysqli_fetch_array($resultban728x90);
$myrowban728x90 = $myrowban728x90["fbanercode"];
$bannerrot = $myrowban728x90;
if ($reportnumrot728x90 >= $totalrecord728x90-1) {
$queryreu728x90 = "UPDATE reptads Set numberr = '0' where  repads='728x90'";
$resultreu728x90 = mysqli_query($mysqli, $queryreu728x90);
}else{
$numberr728x90 = $myrowre728x90["numberr"]+1;
$queryreu728x90 = "UPDATE reptads Set numberr = '$numberr728x90' where  repads='728x90'";
$resultreu728x90 = mysqli_query($mysqli, $queryreu728x90);
}
$bannerwidth = "width:800px";
}elseif ($changeads == "990x90") {
$sqlre990x90 = "SELECT * FROM reptads where repads='990x90'";
$resultre990x90 = mysqli_query($mysqli, $sqlre990x90); 
$myrowre990x90 = mysqli_fetch_array($resultre990x90);
$reportnumrot990x90 = $myrowre990x90["numberr"];
$sqlban990x90 = "SELECT * FROM banners where bannersize='990x90' LIMIT $reportnumrot990x90,1";
$resultban990x90 = mysqli_query($mysqli, $sqlban990x90);
$myrowban990x90 = mysqli_fetch_array($resultban990x90);
$myrowban990x90 = $myrowban990x90["fbanercode"];
$bannerrot = $myrowban990x90;
if ($reportnumrot990x90 >= $totalrecord990x90-1) {
$queryreu990x90 = "UPDATE reptads Set numberr = '0' where  repads='990x90'";
$resultreu990x90 = mysqli_query($mysqli, $queryreu990x90);
}else{
$numberr990x90 = $myrowre990x90["numberr"]+1;
$queryreu990x90 = "UPDATE reptads Set numberr = '$numberr990x90' where  repads='990x90'";
$resultreu990x90 = mysqli_query($mysqli, $queryreu990x90);
}
$bannerwidth = "width:1002px;padding: 20px 0 20px 0;";
}
?>