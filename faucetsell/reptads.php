<?php
$sqlre320x50 = "SELECT * FROM reptads where repads='320x50'";
$resultre320x50 = mysqli_query($mysqli, $sqlre320x50); 
$myrowre320x50 = mysqli_fetch_array($resultre320x50);
$reportnumrot320x50 = $myrowre320x50["numberr"];
$sqlban320x50 = "SELECT * FROM banners where bannersize='320x50' LIMIT $reportnumrot320x50,1";
$resultban320x50 = mysqli_query($mysqli, $sqlban320x50);
$myrowban320x50 = mysqli_fetch_array($resultban320x50);
if ($reportnumrot320x50 >= $totalrecord320x50-1) {
$queryreu320x50 = "UPDATE reptads Set numberr = '0' where  repads='320x50'";
$resultreu320x50 = mysqli_query($mysqli, $queryreu320x50);
}else{
$numberr320x50 = $myrowre320x50["numberr"]+1;
$queryreu320x50 = "UPDATE reptads Set numberr = '$numberr320x50' where  repads='320x50'";
$resultreu320x50 = mysqli_query($mysqli, $queryreu320x50);
}

$sqlre320x501 = "SELECT * FROM reptads where repads='320x50'";
$resultre320x501 = mysqli_query($mysqli, $sqlre320x501); 
$myrowre320x501 = mysqli_fetch_array($resultre320x501);
$reportnumrot320x501 = $myrowre320x501["numberr"];
$sqlban320x501 = "SELECT * FROM banners where bannersize='320x50' LIMIT $reportnumrot320x501,1";
$resultban320x501 = mysqli_query($mysqli, $sqlban320x501);
$myrowban320x501 = mysqli_fetch_array($resultban320x501);
if ($reportnumrot320x501 >= $totalrecord320x50-1) {
$queryreu320x501 = "UPDATE reptads Set numberr = '0' where  repads='320x50'";
$resultreu320x501 = mysqli_query($mysqli, $queryreu320x501);
}else{
$numberr320x501 = $myrowre320x501["numberr"]+1;
$queryreu320x501 = "UPDATE reptads Set numberr = '$numberr320x501' where  repads='320x50'";
$resultreu320x501 = mysqli_query($mysqli, $queryreu320x501);
}

$sqlre320x502 = "SELECT * FROM reptads where repads='320x50'";
$resultre320x502 = mysqli_query($mysqli, $sqlre320x502); 
$myrowre320x502 = mysqli_fetch_array($resultre320x502);
$reportnumrot320x502 = $myrowre320x502["numberr"];
$sqlban320x502 = "SELECT * FROM banners where bannersize='320x50' LIMIT $reportnumrot320x502,1";
$resultban320x502 = mysqli_query($mysqli, $sqlban320x502);
$myrowban320x502 = mysqli_fetch_array($resultban320x502);
if ($reportnumrot320x502 >= $totalrecord320x50-1) {
$queryreu320x502 = "UPDATE reptads Set numberr = '0' where  repads='320x50'";
$resultreu320x502 = mysqli_query($mysqli, $queryreu320x502);
}else{
$numberr320x502 = $myrowre320x502["numberr"]+1;
$queryreu320x502 = "UPDATE reptads Set numberr = '$numberr320x502' where  repads='320x50'";
$resultreu320x502 = mysqli_query($mysqli, $queryreu320x502);
}

$sqlre320x503 = "SELECT * FROM reptads where repads='320x50'";
$resultre320x503 = mysqli_query($mysqli, $sqlre320x503); 
$myrowre320x503 = mysqli_fetch_array($resultre320x503);
$reportnumrot320x503 = $myrowre320x503["numberr"];
$sqlban320x503 = "SELECT * FROM banners where bannersize='320x50' LIMIT $reportnumrot320x503,1";
$resultban320x503 = mysqli_query($mysqli, $sqlban320x503);
$myrowban320x503 = mysqli_fetch_array($resultban320x503);
if ($reportnumrot320x503 >= $totalrecord320x50-1) {
$queryreu320x503 = "UPDATE reptads Set numberr = '0' where  repads='320x50'";
$resultreu320x503 = mysqli_query($mysqli, $queryreu320x503);
}else{
$numberr320x503 = $myrowre320x503["numberr"]+1;
$queryreu320x503 = "UPDATE reptads Set numberr = '$numberr320x503' where  repads='320x50'";
$resultreu320x503 = mysqli_query($mysqli, $queryreu320x503);
}


$sqlre468x60 = "SELECT * FROM reptads where repads='468x60'";
$resultre468x60 = mysqli_query($mysqli, $sqlre468x60); 
$myrowre468x60 = mysqli_fetch_array($resultre468x60);
$reportnumrot468x60 = $myrowre468x60["numberr"];
$sqlban468x60 = "SELECT * FROM banners where bannersize='468x60' LIMIT $reportnumrot468x60,1";
$resultban468x60 = mysqli_query($mysqli, $sqlban468x60);
$myrowban468x60 = mysqli_fetch_array($resultban468x60);
if ($reportnumrot468x60 >= $totalrecord468x60-1) {
$queryreu468x60 = "UPDATE reptads Set numberr = '0' where  repads='468x60'";
$resultreu468x60 = mysqli_query($mysqli, $queryreu468x60);
}else{
$numberr468x60 = $myrowre468x60["numberr"]+1;
$queryreu468x60 = "UPDATE reptads Set numberr = '$numberr468x60' where  repads='468x60'";
$resultreu468x60 = mysqli_query($mysqli, $queryreu468x60);
}
$sqlre468x601 = "SELECT * FROM reptads where repads='468x60'";
$resultre468x601 = mysqli_query($mysqli, $sqlre468x601); 
$myrowre468x601 = mysqli_fetch_array($resultre468x601);
$reportnumrot468x601 = $myrowre468x601["numberr"];
$sqlban468x601 = "SELECT * FROM banners where bannersize='468x60' LIMIT $reportnumrot468x601,1";
$resultban468x601 = mysqli_query($mysqli, $sqlban468x601);
$myrowban468x601 = mysqli_fetch_array($resultban468x601);
if ($reportnumrot468x601 >= $totalrecord468x60-1) {
$queryreu468x601 = "UPDATE reptads Set numberr = '0' where  repads='468x60'";
$resultreu468x601 = mysqli_query($mysqli, $queryreu468x601);
}else{
$numberr468x601 = $myrowre468x601["numberr"]+1;
$queryreu468x601 = "UPDATE reptads Set numberr = '$numberr468x601' where  repads='468x60'";
$resultreu468x601 = mysqli_query($mysqli, $queryreu468x601);
}

$sqlre468x602 = "SELECT * FROM reptads where repads='468x60'";
$resultre468x602 = mysqli_query($mysqli, $sqlre468x602); 
$myrowre468x602 = mysqli_fetch_array($resultre468x602);
$reportnumrot468x602 = $myrowre468x602["numberr"];
$sqlban468x602 = "SELECT * FROM banners where bannersize='468x60' LIMIT $reportnumrot468x602,1";
$resultban468x602 = mysqli_query($mysqli, $sqlban468x602);
$myrowban468x602 = mysqli_fetch_array($resultban468x602);
if ($reportnumrot468x602 >= $totalrecord468x60-1) {
$queryreu468x602 = "UPDATE reptads Set numberr = '0' where  repads='468x60'";
$resultreu468x602 = mysqli_query($mysqli, $queryreu468x602);
}else{
$numberr468x602 = $myrowre468x602["numberr"]+1;
$queryreu468x602 = "UPDATE reptads Set numberr = '$numberr468x602' where  repads='468x60'";
$resultreu468x602 = mysqli_query($mysqli, $queryreu468x602);
}

$sqlre468x603 = "SELECT * FROM reptads where repads='468x60'";
$resultre468x603 = mysqli_query($mysqli, $sqlre468x603); 
$myrowre468x603 = mysqli_fetch_array($resultre468x603);
$reportnumrot468x603 = $myrowre468x603["numberr"];
$sqlban468x603 = "SELECT * FROM banners where bannersize='468x60' LIMIT $reportnumrot468x603,1";
$resultban468x603 = mysqli_query($mysqli, $sqlban468x603);
$myrowban468x603 = mysqli_fetch_array($resultban468x603);
if ($reportnumrot468x603 >= $totalrecord468x60-1) {
$queryreu468x603 = "UPDATE reptads Set numberr = '0' where  repads='468x60'";
$resultreu468x603 = mysqli_query($mysqli, $queryreu468x603);
}else{
$numberr468x603 = $myrowre468x603["numberr"]+1;
$queryreu468x603 = "UPDATE reptads Set numberr = '$numberr468x603' where  repads='468x60'";
$resultreu468x603 = mysqli_query($mysqli, $queryreu468x603);
}

$sqlre468x604 = "SELECT * FROM reptads where repads='468x60'";
$resultre468x604 = mysqli_query($mysqli, $sqlre468x604); 
$myrowre468x604 = mysqli_fetch_array($resultre468x604);
$reportnumrot468x604 = $myrowre468x604["numberr"];
$sqlban468x604 = "SELECT * FROM banners where bannersize='468x60' LIMIT $reportnumrot468x604,1";
$resultban468x604 = mysqli_query($mysqli, $sqlban468x604);
$myrowban468x604 = mysqli_fetch_array($resultban468x604);
if ($reportnumrot468x604 >= $totalrecord468x60-1) {
$queryreu468x604 = "UPDATE reptads Set numberr = '0' where  repads='468x60'";
$resultreu468x604 = mysqli_query($mysqli, $queryreu468x604);
}else{
$numberr468x604 = $myrowre468x604["numberr"]+1;
$queryreu468x604 = "UPDATE reptads Set numberr = '$numberr468x604' where  repads='468x60'";
$resultreu468x604 = mysqli_query($mysqli, $queryreu468x604);
}

$sqlre468x605 = "SELECT * FROM reptads where repads='468x60'";
$resultre468x605 = mysqli_query($mysqli, $sqlre468x605); 
$myrowre468x605 = mysqli_fetch_array($resultre468x605);
$reportnumrot468x605 = $myrowre468x605["numberr"];
$sqlban468x605 = "SELECT * FROM banners where bannersize='468x60' LIMIT $reportnumrot468x605,1";
$resultban468x605 = mysqli_query($mysqli, $sqlban468x605);
$myrowban468x605 = mysqli_fetch_array($resultban468x605);
if ($reportnumrot468x605 >= $totalrecord468x60-1) {
$queryreu468x605 = "UPDATE reptads Set numberr = '0' where  repads='468x60'";
$resultreu468x605 = mysqli_query($mysqli, $queryreu468x605);
}else{
$numberr468x605 = $myrowre468x605["numberr"]+1;
$queryreu468x605 = "UPDATE reptads Set numberr = '$numberr468x605' where  repads='468x60'";
$resultreu468x605 = mysqli_query($mysqli, $queryreu468x605);
}

$sqlre728x90 = "SELECT * FROM reptads where repads='728x90'";
$resultre728x90 = mysqli_query($mysqli, $sqlre728x90); 
$myrowre728x90 = mysqli_fetch_array($resultre728x90);
$reportnumrot728x90 = $myrowre728x90["numberr"];
$sqlban728x90 = "SELECT * FROM banners where bannersize='728x90' LIMIT $reportnumrot728x90,1";
$resultban728x90 = mysqli_query($mysqli, $sqlban728x90);
$myrowban728x90 = mysqli_fetch_array($resultban728x90);
if ($reportnumrot728x90 >= $totalrecord728x90-1) {
$queryreu728x90 = "UPDATE reptads Set numberr = '0' where  repads='728x90'";
$resultreu728x90 = mysqli_query($mysqli, $queryreu728x90);
}else{
$numberr728x90 = $myrowre728x90["numberr"]+1;
$queryreu728x90 = "UPDATE reptads Set numberr = '$numberr728x90' where  repads='728x90'";
$resultreu728x90 = mysqli_query($mysqli, $queryreu728x90);
}
$sqlre728x901 = "SELECT * FROM reptads where repads='728x90'";
$resultre728x901 = mysqli_query($mysqli, $sqlre728x901); 
$myrowre728x901 = mysqli_fetch_array($resultre728x901);
$reportnumrot728x901 = $myrowre728x901["numberr"];
$sqlban728x901 = "SELECT * FROM banners where bannersize='728x90' LIMIT $reportnumrot728x901,1";
$resultban728x901 = mysqli_query($mysqli, $sqlban728x901);
$myrowban728x901 = mysqli_fetch_array($resultban728x901);
if ($reportnumrot728x901 >= $totalrecord728x90-1) {
$queryreu728x901 = "UPDATE reptads Set numberr = '0' where  repads='728x90'";
$resultreu728x901 = mysqli_query($mysqli, $queryreu728x901);
}else{
$numberr728x901 = $myrowre728x901["numberr"]+1;
$queryreu728x901 = "UPDATE reptads Set numberr = '$numberr728x901' where  repads='728x90'";
$resultreu728x901 = mysqli_query($mysqli, $queryreu728x901);
}
$sqlre728x902 = "SELECT * FROM reptads where repads='728x90'";
$resultre728x902 = mysqli_query($mysqli, $sqlre728x902); 
$myrowre728x902 = mysqli_fetch_array($resultre728x902);
$reportnumrot728x902 = $myrowre728x902["numberr"];
$sqlban728x902 = "SELECT * FROM banners where bannersize='728x90' LIMIT $reportnumrot728x902,1";
$resultban728x902 = mysqli_query($mysqli, $sqlban728x902);
$myrowban728x902 = mysqli_fetch_array($resultban728x902);
if ($reportnumrot728x902 >= $totalrecord728x90-1) {
$queryreu728x902 = "UPDATE reptads Set numberr = '0' where  repads='728x90'";
$resultreu728x902 = mysqli_query($mysqli, $queryreu728x902);
}else{
$numberr728x902 = $myrowre728x902["numberr"]+1;
$queryreu728x902 = "UPDATE reptads Set numberr = '$numberr728x902' where  repads='728x90'";
$resultreu728x902 = mysqli_query($mysqli, $queryreu728x902);
}
$sqlre728x903 = "SELECT * FROM reptads where repads='728x90'";
$resultre728x903 = mysqli_query($mysqli, $sqlre728x903); 
$myrowre728x903 = mysqli_fetch_array($resultre728x903);
$reportnumrot728x903 = $myrowre728x903["numberr"];
$sqlban728x903 = "SELECT * FROM banners where bannersize='728x90' LIMIT $reportnumrot728x903,1";
$resultban728x903 = mysqli_query($mysqli, $sqlban728x903);
$myrowban728x903 = mysqli_fetch_array($resultban728x903);
if ($reportnumrot728x903 >= $totalrecord728x90-1) {
$queryreu728x903 = "UPDATE reptads Set numberr = '0' where  repads='728x90'";
$resultreu728x903 = mysqli_query($mysqli, $queryreu728x903);
}else{
$numberr728x903 = $myrowre728x903["numberr"]+1;
$queryreu728x903 = "UPDATE reptads Set numberr = '$numberr728x903' where  repads='728x90'";
$resultreu728x903 = mysqli_query($mysqli, $queryreu728x903);
}
$sqlre120x600 = "SELECT * FROM reptads where repads='120x600'";
$resultre120x600 = mysqli_query($mysqli, $sqlre120x600); 
$myrowre120x600 = mysqli_fetch_array($resultre120x600);
$reportnumrot120x600 = $myrowre120x600["numberr"];
$sqlban120x600 = "SELECT * FROM banners where bannersize='120x600' LIMIT $reportnumrot120x600,1";
$resultban120x600 = mysqli_query($mysqli, $sqlban120x600);
$myrowban120x600 = mysqli_fetch_array($resultban120x600);
if ($reportnumrot120x600 >= $totalrecord120x600-1) {
$queryreu120x600 = "UPDATE reptads Set numberr = '0' where  repads='120x600'";
$resultreu120x600 = mysqli_query($mysqli, $queryreu120x600);
}else{
$numberr120x600 = $myrowre120x600["numberr"]+1;
$queryreu120x600 = "UPDATE reptads Set numberr = '$numberr120x600' where  repads='120x600'";
$resultreu120x600 = mysqli_query($mysqli, $queryreu120x600);
}
$sqlre120x6001 = "SELECT * FROM reptads where repads='120x600'";
$resultre120x6001 = mysqli_query($mysqli, $sqlre120x6001); 
$myrowre120x6001 = mysqli_fetch_array($resultre120x6001);
$reportnumrot120x6001 = $myrowre120x6001["numberr"];
$sqlban120x6001 = "SELECT * FROM banners where bannersize='120x600' LIMIT $reportnumrot120x6001,1";
$resultban120x6001 = mysqli_query($mysqli, $sqlban120x6001);
$myrowban120x6001 = mysqli_fetch_array($resultban120x6001);
if ($reportnumrot120x6001 >= $totalrecord120x600-1) {
$queryreu120x6001 = "UPDATE reptads Set numberr = '0' where  repads='120x600'";
$resultreu120x6001 = mysqli_query($mysqli, $queryreu120x6001);
}else{
$numberr120x6001 = $myrowre120x6001["numberr"]+1;
$queryreu120x6001 = "UPDATE reptads Set numberr = '$numberr120x6001' where  repads='120x600'";
$resultreu120x6001 = mysqli_query($mysqli, $queryreu120x6001);
}
$sqlre300x250 = "SELECT * FROM reptads where repads='300x250'";
$resultre300x250 = mysqli_query($mysqli, $sqlre300x250); 
$myrowre300x250 = mysqli_fetch_array($resultre300x250);
$reportnumrot300x250 = $myrowre300x250["numberr"];
$sqlban300x250 = "SELECT * FROM banners where bannersize='300x250' LIMIT $reportnumrot300x250,1";
$resultban300x250 = mysqli_query($mysqli, $sqlban300x250);
$myrowban300x250 = mysqli_fetch_array($resultban300x250);
if ($reportnumrot300x250 >= $totalrecord300x250-1) {
$queryreu300x250 = "UPDATE reptads Set numberr = '0' where  repads='300x250'";
$resultreu300x250 = mysqli_query($mysqli, $queryreu300x250);
}else{
$numberr300x250 = $myrowre300x250["numberr"]+1;
$queryreu300x250 = "UPDATE reptads Set numberr = '$numberr300x250' where  repads='300x250'";
$resultreu300x250 = mysqli_query($mysqli, $queryreu300x250);
}

$sqlre300x2501 = "SELECT * FROM reptads where repads='300x250'";
$resultre300x2501 = mysqli_query($mysqli, $sqlre300x2501); 
$myrowre300x2501 = mysqli_fetch_array($resultre300x2501);
$reportnumrot300x2501 = $myrowre300x2501["numberr"];
$sqlban300x2501 = "SELECT * FROM banners where bannersize='300x250' LIMIT $reportnumrot300x2501,1";
$resultban300x2501 = mysqli_query($mysqli, $sqlban300x2501);
$myrowban300x2501 = mysqli_fetch_array($resultban300x2501);
if ($reportnumrot300x2501 >= $totalrecord300x250-1) {
$queryreu300x2501 = "UPDATE reptads Set numberr = '0' where  repads='300x250'";
$resultreu300x2501 = mysqli_query($mysqli, $queryreu300x2501);
}else{
$numberr300x2501 = $myrowre300x2501["numberr"]+1;
$queryreu300x2501 = "UPDATE reptads Set numberr = '$numberr300x2501' where  repads='300x250'";
$resultreu300x2501 = mysqli_query($mysqli, $queryreu300x2501);
}

$sqlre300x2502 = "SELECT * FROM reptads where repads='300x250'";
$resultre300x2502 = mysqli_query($mysqli, $sqlre300x2502); 
$myrowre300x2502 = mysqli_fetch_array($resultre300x2502);
$reportnumrot300x2502 = $myrowre300x2502["numberr"];
$sqlban300x2502 = "SELECT * FROM banners where bannersize='300x250' LIMIT $reportnumrot300x2502,1";
$resultban300x2502 = mysqli_query($mysqli, $sqlban300x2502);
$myrowban300x2502 = mysqli_fetch_array($resultban300x2502);
if ($reportnumrot300x2502 >= $totalrecord300x250-1) {
$queryreu300x2502 = "UPDATE reptads Set numberr = '0' where  repads='300x250'";
$resultreu300x2502 = mysqli_query($mysqli, $queryreu300x2502);
}else{
$numberr300x2502 = $myrowre300x2502["numberr"]+1;
$queryreu300x2502 = "UPDATE reptads Set numberr = '$numberr300x2502' where  repads='300x250'";
$resultreu300x2502 = mysqli_query($mysqli, $queryreu300x2502);
}
$sqlre300x2503 = "SELECT * FROM reptads where repads='300x250'";
$resultre300x2503 = mysqli_query($mysqli, $sqlre300x2503); 
$myrowre300x2503 = mysqli_fetch_array($resultre300x2503);
$reportnumrot300x2503 = $myrowre300x2503["numberr"];
$sqlban300x2503 = "SELECT * FROM banners where bannersize='300x250' LIMIT $reportnumrot300x2503,1";
$resultban300x2503 = mysqli_query($mysqli, $sqlban300x2503);
$myrowban300x2503 = mysqli_fetch_array($resultban300x2503);
if ($reportnumrot300x2503 >= $totalrecord300x250-1) {
$queryreu300x2503 = "UPDATE reptads Set numberr = '0' where  repads='300x250'";
$resultreu300x2503 = mysqli_query($mysqli, $queryreu300x2503);
}else{
$numberr300x2503 = $myrowre300x2503["numberr"]+1;
$queryreu300x2503 = "UPDATE reptads Set numberr = '$numberr300x2503' where  repads='300x250'";
$resultreu300x2503 = mysqli_query($mysqli, $queryreu300x2503);
}
$sqlre990x90 = "SELECT * FROM reptads where repads='990x90'";
$resultre990x90 = mysqli_query($mysqli, $sqlre990x90); 
$myrowre990x90 = mysqli_fetch_array($resultre990x90);
$reportnumrot990x90 = $myrowre990x90["numberr"];
$sqlban990x90 = "SELECT * FROM banners where bannersize='990x90' LIMIT $reportnumrot990x90,1";
$resultban990x90 = mysqli_query($mysqli, $sqlban990x90);
$myrowban990x90 = mysqli_fetch_array($resultban990x90);
if ($reportnumrot990x90 >= $totalrecord990x90-1) {
$queryreu990x90 = "UPDATE reptads Set numberr = '0' where  repads='990x90'";
$resultreu990x90 = mysqli_query($mysqli, $queryreu990x90);
}else{
$numberr990x90 = $myrowre990x90["numberr"]+1;
$queryreu990x90 = "UPDATE reptads Set numberr = '$numberr990x90' where  repads='990x90'";
$resultreu990x90 = mysqli_query($mysqli, $queryreu990x90);
}
$sqlre990x901 = "SELECT * FROM reptads where repads='990x90'";
$resultre990x901 = mysqli_query($mysqli, $sqlre990x901); 
$myrowre990x901 = mysqli_fetch_array($resultre990x901);
$reportnumrot990x901 = $myrowre990x901["numberr"];
$sqlban990x901 = "SELECT * FROM banners where bannersize='990x90' LIMIT $reportnumrot990x901,1";
$resultban990x901 = mysqli_query($mysqli, $sqlban990x901);
$myrowban990x901 = mysqli_fetch_array($resultban990x901);
if ($reportnumrot990x901 >= $totalrecord990x90-1) {
$queryreu990x901 = "UPDATE reptads Set numberr = '0' where  repads='990x90'";
$resultreu990x901 = mysqli_query($mysqli, $queryreu990x901);
}else{
$numberr990x901 = $myrowre990x901["numberr"]+1;
$queryreu990x901 = "UPDATE reptads Set numberr = '$numberr990x901' where  repads='990x90'";
$resultreu990x901 = mysqli_query($mysqli, $queryreu990x901);
}
?>