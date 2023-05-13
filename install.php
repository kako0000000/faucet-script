<?php
include("libs/database.php");
$querycheck='SELECT 1 FROM `address_list`';
$query_result=$mysqli->query($querycheck);
if ($query_result !== FALSE){
echo "<center><br><br><h1>Your installed complete. <br><br><br> Please&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETETE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'<font color='red'>install.php</font>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; File<br><br><br>Go to <a href='index.php'>Home PAGE</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='admin.php'>ADMIN PAGE</a> and Type <br><br><font color='red'>username:  admin</font><br><font color='red'>password: adminadmin</font><br><br> <font color='blue'>Change password</font> <font color='red'>adminamin</font> to <font color='blue'>own password</font> and Save. </h1></center>";
}else{
$mysqli->query("DROP TABLE `address_list` ,`banners` , `drawrecord` , `failure` ,`fauclist` ,`ip_list` ,`ip_list_address` ,`link` ,`ptclist` ,`reptads` ,`settings` ,`short_link` ,`backcolor` ,`adssetting` ,`pendwebs` ,`reward`;");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `address_list` (
`id` int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`address` varchar(150) NOT NULL,
`referred_by` varchar(75) NOT NULL,
`last_claim` varchar(32) NOT NULL,
`status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `adssetting` (
`aid` int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`banrsize` varchar(10) NOT NULL,
`banrimp1` varchar(10) NOT NULL,
`banrpric1` varchar(25) NOT NULL,
`banrimp2` varchar(10) NOT NULL,
`banrpric2` varchar(25) NOT NULL,
`banrimp3` varchar(10) NOT NULL,
`banrpric3` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
INSERT INTO `adssetting` (`aid`, `banrsize`, `banrimp1`, `banrpric1`, `banrimp2`, `banrpric2`, `banrimp3`, `banrpric3`) VALUES
(1, '468x60', '10000', '0.00015', '25000', '0.00035', '50000', '0.00072'),
(2, '728x90', '10000', '0.00015', '25000', '0.00035', '50000', '0.00072'),
(3, '120x600', '10000', '0.00015', '25000', '0.00035', '50000', '0.00072');
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `banners` (
`fnum` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`fbanercode` text NOT NULL,
`websitename` varchar(250) NOT NULL,
`bannersize` varchar(10) NOT NULL,
`secucode` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
INSERT INTO `banners` (`fnum`, `fbanercode`, `websitename`, `bannersize`, `secucode`) VALUES
(1, '<a href=\"index.php?op=advertising\" target=\"_blank\"><img src=\"asset/img/youradshere.jpg\" border=\"0\"></a>', 'btcearns.xyz', '468x60', '718bacbd063f3f197db0bee7b4e4838b');
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `drawrecord` (
`id` int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`address` varchar(150) NOT NULL,
`dtime` varchar(20) NOT NULL,
`satoshi` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `reward` (
`id` int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`sitename` varchar(50) NOT NULL,
`curname` varchar(20) NOT NULL,
`satoshi` varchar(20) NOT NULL,
`hideshow` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
");
$mysqli->query("
INSERT INTO `reward` (`id`, `sitename`, `curname`, `satoshi`, `hideshow`) VALUES
(1, 'Bitcoin (BTC) Faucet', 'BTC', '1', 'on'),
(2, 'Bitcoin (BTC) Faucet', 'BTC', '1', 'show'),
(3, 'Dogecoin (DOGE) Faucet', 'DOGE', '20000', 'show'),
(4, 'Litecoin (LTC) Faucet', 'LTC', '20000', 'show'),
(5, 'Ethereum (ETH) Faucet', 'ETH', '30000', 'show'),
(6, 'Binance Coin (BNB) Faucet', 'BNB', '200', 'show'),
(7, 'Bitcoin Cash (BCH) Faucet', 'BCH', '500000', 'show'),
(8, 'Dash (DASH) Faucet', 'DASH', '500000', 'show'),
(9, 'DigiByte (DGB) Faucet', 'DGB', '500000', 'show'),
(10, 'Feyorra (FEY) Faucet', 'FEY', '500000', 'show'),
(11, 'Solana (SOL) Faucet', 'SOL', '500000', 'show'),
(12, 'Tron (TRX) Faucet', 'TRX', '500000', 'show'),
(13, 'Tether TRC20 (USDT) Faucet', 'USDT', '500000', 'show'),
(14, 'Ripple (XRP) Faucet', 'XRP', '500000', 'show'),
(15, 'Zcash (ZEC) Faucet', 'ZEC', '500000', 'show');
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `failure` (
`address` varchar(150) NOT NULL,
`ip_address` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `fauclist` (
`fauid` int(22) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`webname` varchar(100) NOT NULL,
`secucode` varchar(100) NOT NULL,
`timers` varchar(10) NOT NULL,
`minimum` varchar(10) NOT NULL,
`maximum` varchar(10) NOT NULL,
`payment` varchar(20) NOT NULL,
`referral` varchar(20) NOT NULL,
`refurl` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `ip_list` (
`id` int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`claim_address` varchar(150) NOT NULL,
`ip_address` varchar(50) NOT NULL,
`first_time` varchar(32) NOT NULL,
`last_claim` varchar(32) NOT NULL,
`short_link_id` varchar(20) NOT NULL,
`per_value_repirt` varchar(20) NOT NULL,
`count_value` varchar(20) NOT NULL,
`total_value` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");

$mysqli->query("
CREATE TABLE IF NOT EXISTS `ip_list_address` (
`id` int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`claim_address` varchar(150) NOT NULL,
`ip_address` varchar(50) NOT NULL,
`first_time` varchar(32) NOT NULL,
`last_claim` varchar(32) NOT NULL,
`short_link_id` varchar(20) NOT NULL,
`per_value_repirt` varchar(20) NOT NULL,
`count_value` varchar(20) NOT NULL,
`total_value` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");


$mysqli->query("
CREATE TABLE IF NOT EXISTS `pendwebs` (
`tnum` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`usersecode` varchar(220) NOT NULL,
`pay_system` varchar(10) NOT NULL,
`bsize` varchar(10) NOT NULL,
`bimpres` varchar(10) NOT NULL,
`ptobtc` varchar(15) NOT NULL,
`transaction` text NOT NULL,
`headline` varchar(25) NOT NULL,
`descri` varchar(78) NOT NULL,
`describecol` varchar(41) NOT NULL,
`displayurl` varchar(250) NOT NULL,
`targeturl` varchar(255) NOT NULL,
`websecord` varchar(35) NOT NULL,
`savedate` varchar(10) NOT NULL,
`status` varchar(10) NOT NULL,
`viewads` varchar(15) NOT NULL,
`reqapp` varchar(5) NOT NULL,
`opian` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `link` (
`idl` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`address` varchar(150) NOT NULL,
`token` varchar(200) NOT NULL,
`sec_key` varchar(50) NOT NULL,
`time_created` varchar(20) NOT NULL,
`currency` varchar(10) NOT NULL,
`reward` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `ptclist` (
`ptcid` int(22) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`img` text NOT NULL,
`refurl` varchar(200) NOT NULL,
`secucode` varchar(100) NOT NULL,
`earnup` varchar(10) NOT NULL,
`adment` varchar(10) NOT NULL,
`referral` varchar(10) NOT NULL,
`dayopen` varchar(20) NOT NULL,
`minpayout` varchar(20) NOT NULL,
`withdraw` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `reptads` (
`repid` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`repads` varchar(20) NOT NULL,
`numberr` decimal(11,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
INSERT INTO `reptads` (`repid`, `repads`, `numberr`) VALUES
(1, '120x90', '0'),
(2, '120x240', '0'),
(3, '120x600', '0'),
(4, '125x125', '0'),
(5, '160x90', '0'),
(6, '160x600', '0'),
(7, '180x90', '0'),
(8, '180x150', '0'),
(9, '200x90', '0'),
(10, '200x200', '0'),
(11, '234x60', '0'),
(12, '240x400', '0'),
(13, '250x250', '0'),
(14, '300x250', '0'),
(15, '320x50', '0'),
(16, '336x280', '0'),
(17, '468x15', '0'),
(18, '468x60', '0'),
(19, '728x15', '0'),
(20, '728x90', '0'),
(21, '990x90', '0');
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `settings` (
`id` int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` varchar(50) NOT NULL,
`value` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'Tital Name', 'BTC Earn Daily'),
(2, 'Description', 'BTC Faucet Daily many satoshi earn using solved captcha'),
(3, 'Url', 'http://btcearn.ueuo.com/'),
(4, 'Site Name', 'Bitcoin Faucet'),
(5, 'Balance Show or Not', 'on'),
(6, 'Faucet Run', 'on'),
(7, 'Time wait Page Load', '10'),
(8, 'Time Waite Button Show', '10'),
(9, 'Reward', '5'),
(10, 'Timer', '60'),
(11, 'Referral Commision', '10'),
(12, 'Remove All IP', '1595650315'),
(13, 'antibot', 'on'),
(14, 'Currency', 'BTC'),
(15, 'FaucetHub Api', ''),
(16, 'Short Link', 'off'),
(17, 'Short Link Reward', '10'),
(18, 'Force Short Link', 'on'),
(19, 'Captcha System', 'on'),
(20, 'Captcha System', 'Solvemedia'),
(21, 'Recaptcha Public Key', ''),
(22, 'Recaptcha Secret Key', ''),
(23, 'Hcaptcha Site Key', ''),
(24, 'Hcaptcha Secret Key', ''),
(25, 'Bitcaptcha Id For WWW Verson', ''),
(26, 'Bitcaptcha Key For WWW Verson', ''),
(27, 'SolveMedia Challenge Key', ''),
(28, 'SolveMedia Private Key', ''),
(29, 'SolveMedia Hash Key', ''),
(30, 'IpHub Api', 'NDk3OTpXeDQ4aHNEaDlQT05wQVg1d2VXRlZBY2VpM1JvSEs4Yw=='),
(31, 'Ads left fix', 'on'),
(32, 'Ads right fix', 'on'),
(33, 'Ads footer fix', 'on'),
(34, 'copyright', '2018-2020'),
(35, 'Meta Description', 'Claim free satoshi every minute'),
(36, 'Meta Keywords', 'bitcoin faucet, earn bitcoin, free bitcoin, best bitcoin faucet, earn money online, free money, claim bitcoin, i-bits, faucethub faucet'),
(37, 'None detected', 'http://whatismyipaddress.com/ip/'),
(38, 'Payout Website', 'Faucetpay.io'),
(39, 'faucetpay_api_token', ''),
(40, 'expresscrypto_api_token', ''),
(41, 'expresscrypto_user_token', ''),
(42, 'microwallet_api', ''),
(43, 'Blockio_Api_Key', ''),
(44, 'Blockio_Pin', ''),
(45, 'Total Paid', '0'),
(46, 'Proxy Check', 'off'),
(47, 'Block Page Banner', 'on'),
(48, 'User Name', 'admin'),
(49, 'Password', 'adminadmin'),
(50, 'TBcheck', '5');
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `short_link` (
`id` int(32) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`short_link` text NOT NULL,
`click` varchar(5) NOT NULL,
`dandi` varchar(5) NOT NULL,
`secucode` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
CREATE TABLE IF NOT EXISTS `backcolor` (
`fid` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`framename` varchar(45) NOT NULL,
`value` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");
$mysqli->query("
INSERT INTO `backcolor` (`fid`, `framename`, `value`) VALUES
(1, 'Body Color', '#aadae8'),
(2, 'Social Color', '#0277BD'),
(3, 'Header Color', '#0277BD'),
(4, 'Balance Box Color', '#4FC3F7'),
(5, 'Start Box Color', '#4FC3F7'),
(6, 'Wait Box Color', '#CCFFCF'),
(7, 'Ref link Header Color', '#0277BD'),
(8, 'Ref link Body Color', '#4FC3F7'),
(9, 'Ref link Body Color 2', '#4FC3F7'),
(10, 'Ref link Box Color', '#FFFFFF'),
(11, 'Recent Payouts Header Col', '#0277BD'),
(12, 'Recent Payouts Body Color', '#4FC3F7'),
(13, 'Recent Payouts Body Color', '#4FC3F7'),
(14, 'Recent Payouts Box Color', '#FFFFFF'),
(15, 'Bitcoin Inf Header Color', '#0277BD'),
(16, 'Bitcoin Inf Body Color', '#4FC3F7'),
(17, 'Bitcoin Inf Body Color 2', '#4FC3F7'),
(18, 'Bitcoin Inf Box Color', '#FFFFFF'),
(19, 'Bitcoin wallet Header Col', '#0277BD'),
(20, 'Bitcoin wallet Body Color', '#4FC3F7'),
(21, 'Bitcoin wallet Body Color', '#4FC3F7'),
(22, 'Bitcoin wallet Box Color', '#FFFFFF'),
(23, 'Bitcoin Faucet Header Col', '#0277BD'),
(24, 'Bitcoin Faucet Body Color', '#4FC3F7'),
(25, 'Bitcoin Faucet Body Color', '#4FC3F7'),
(26, 'Bitcoin Faucet Box Color', '#FFFFFF'),
(27, 'FAQ Header Color', '#0277BD'),
(28, 'FAQ Body Color', '#4FC3F7'),
(29, 'FAQ Body Color 2', '#4FC3F7'),
(30, 'FAQ Box Color', '#FFFFFF'),
(31, 'Footer Body Color', '#0277BD'),
(32, 'Faucet List Box Color', '#FCCCCF'),
(33, 'Faucet List Title Color', '#008A04'),
(34, 'Faucet List Header Color', '#CCEE00'),
(35, 'PTC List Box Color', '#0077DD'),
(36, 'PTC List Cell Color', '#00B4AA'),
(37, 'Advertising Box Color', '#548C57'),
(38, 'Advertising Details Color', '#deda1f'),
(39, 'Advertising Header Color', '#CFFCFC'),
(40, 'Advertising No Record Found Box Color', '#CCFFCF');
");
echo '<script> window.location.href = "install.php"; </script>';
}
?>