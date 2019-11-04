<h1>Remember to remove this file when you are done :)</h1>
<?php
include("libs/database.php");

$mysqli->query("DROP TABLE `address_list` ,`banners` ,`failure` ,`fauclist` ,`ip_list` ,`link` ,`ptclist` ,`reptads` ,`settings` ,`short_link` ;");

$mysqli->query("
CREATE TABLE IF NOT EXISTS `address_list` (
`id` int(32) NOT NULL auto_increment,
`address` varchar(75) NOT NULL,
`referred_by` varchar(75) NOT NULL,
`last_claim` varchar(32) NOT NULL,
`status` varchar(10) NOT NULL,
KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");

$mysqli->query("
CREATE TABLE IF NOT EXISTS `banners` (
`fnum` int(10) NOT NULL auto_increment,
`fbanercode` text NOT NULL,
`websitename` varchar(250) NOT NULL,
`bannersize` varchar(10) NOT NULL,
KEY `fnum` (`fnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");

$mysqli->query("
CREATE TABLE IF NOT EXISTS `failure` (
`address` varchar(60) NOT NULL,
`ip_address` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");


$mysqli->query("
CREATE TABLE IF NOT EXISTS `fauclist` (
`fauid` int(22) NOT NULL auto_increment,
`webname` varchar(100) NOT NULL,
`secucode` varchar(100) NOT NULL,
`timers` varchar(10) NOT NULL,
`minimum` varchar(10) NOT NULL,
`maximum` varchar(10) NOT NULL,
`payment` varchar(20) NOT NULL,
`referral` varchar(20) NOT NULL,
`refurl` varchar(200) NOT NULL,
KEY `fauid` (`fauid`)    
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");

$mysqli->query("
CREATE TABLE IF NOT EXISTS `ip_list` (
`id` int(32) NOT NULL auto_increment,
`ip_address` varchar(50) NOT NULL,
`first_time` varchar(32) NOT NULL,
`last_claim` varchar(32) NOT NULL,
`short_link_id` varchar(20) NOT NULL,
`per_value_repirt` varchar(20) NOT NULL,
`count_value` varchar(20) NOT NULL,
`total_value` varchar(20) NOT NULL,
KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");

$mysqli->query("
CREATE TABLE IF NOT EXISTS `link` (
`address` varchar(50) NOT NULL,
`sec_key` varchar(50) NOT NULL,
`time_created` varchar(20) NOT NULL,
`currency` varchar(10) NOT NULL,
`reward` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");

$mysqli->query("
CREATE TABLE IF NOT EXISTS `ptclist` (
`ptcid` int(22) NOT NULL auto_increment,
`img` text NOT NULL,
`refurl` varchar(200) NOT NULL,
`secucode` varchar(100) NOT NULL,
`earnup` varchar(10) NOT NULL,
`adment` varchar(10) NOT NULL,
`referral` varchar(10) NOT NULL,
`dayopen` varchar(20) NOT NULL,
`minpayout` varchar(20) NOT NULL,
`withdraw` varchar(100) NOT NULL,
KEY `ptcid` (`ptcid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");

$mysqli->query("
CREATE TABLE IF NOT EXISTS `reptads` (
`repid` int(10) NOT NULL auto_increment,
`repads` varchar(20) NOT NULL,
`numberr` decimal(11,0) NOT NULL,
KEY `repid` (`repid`)
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
(12, '240x400', '3'),
(13, '250x250', '5'),
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
`id` int(32) NOT NULL auto_increment,
`name` varchar(50) NOT NULL,
`value` varchar(255) NOT NULL,
KEY `id` (`id`)
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
(9, 'Reward', '10'),
(10, 'Timer', '10'),
(11, 'Referral Commision', '10'),
(12, 'Remove All IP', '1572403470'),
(13, 'antibot', 'on'),
(14, 'Currency', 'BTC'),
(15, 'FaucetHub Api', ''),
(16, 'Short Link', 'off'),
(17, 'Short Link Reward', '10'),
(18, 'Force Short Link', 'on'),
(19, 'Captcha System', 'on'),
(20, 'Captcha System', 'Hcaptcha'),
(21, 'Recaptcha Public Key', '-x88ZWeT6m8XKZq-bbbbb'),
(22, 'Recaptcha Secret Key', ''),
(23, 'Hcaptcha Site Key', '8e9f1ea4-b02e-4aa0-873e-4362449212fb'),
(24, 'Hcaptcha Secret Key', '0xE68289e8f57BE54566e278BFbDA968616cF740a5'),
(25, 'Bitcaptcha Id For WWW Verson', ''),
(26, 'Bitcaptcha Key For WWW Verson', ''),
(27, 'SolveMedia Challenge Key', 'C.CxAtBRvGwarEDQuzQwzDgwtQJ5LHxH'),
(28, 'SolveMedia Private Key', 'jiBkCWdXFR7C2on-d2Ez6X8-2tvCWcvs'),
(29, 'SolveMedia Hash Key', 'yhbSyGaYXzdSfblzfpip11Wam2UPfA3t'),
(30, 'IpHub Api', 'NDk3OTpXeDQ4aHNEaDlQT05wQVg1d2VXRlZBY2VpM1JvSEs4Yw=='),
(31, 'Ads left fix', 'on'),
(32, 'Ads right fix', 'off'),
(33, 'Ads footer fix', 'off'),
(34, 'copyright', '2018-2020'),
(35, 'Meta Description', 'Claim free satoshi every minute'),
(36, 'Meta Keywords', 'btc');
");

$mysqli->query("
CREATE TABLE IF NOT EXISTS `short_link` (
`id` int(32) NOT NULL auto_increment,
`short_link` text NOT NULL,
`click` varchar(5) NOT NULL,
`dandi` varchar(5) NOT NULL,
KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
");

echo "<h1>Please delete me :)</h1>";

?>