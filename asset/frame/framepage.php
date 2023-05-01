<style>
.table3{border-collapse: collapse;border: 2px solid #ddd;width: 100%;padding: 15px 10px;}
.bc{padding: 5px 15px;}
.bc1{padding: 15px 0px;}
.code{font:normal 16px/26px "Roboto", Arial, sans-serif;color:#2a3744;word-spacing: 5px;letter-spacing: 1px;font-size:20px;}
</style>
<table border="0" width="100%" cellspacing="0" cellpadding="0" >
<tr><td><table cellspacing="0" cellpadding="0" class="table3">
<tr rowspan="2">
<td style="background-color:<?php echo $socialc ?>;" <?php if ($colorid == "2") {?>id="mycolor"<?php } ?>>
<img src="asset/img/facebook.png" alt="Facebook" title="Share On Face Book" border="0"></a>
<img src="asset/img/twitter.png" alt="Twitter" title="Share On Twitter" border="0"></a>
<img src="asset/img/prat.png" alt="Pinterest" title="Post Pinterest" border="0"></a>
<img src="asset/img/tumbir.png" alt="Tumblr" title="Share On Tumblr" border="0"></a>
<img src="asset/img/linkin.png" alt="Linkin" title="Share On Link in" border="0"></a>
<img src="asset/img/download.png" alt="Download" title="Download Script" border="0"></a>
</td></tr>
<tr><td height="40" width="500" style="background-color:<?php echo $headerco ?>;" <?php if ($colorid == "3") {?>id="mycolor"<?php } ?>>
&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;Faucet List&nbsp;&nbsp;&nbsp;PTC Sites List
</td></tr></table></td>
<td width="350" align="center">
<?php if ($colorid == "2" or $colorid == "3") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr><tr><td class="bc" align="center">
<table cellspacing="0" cellpadding="0" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $balanceboxc ?>;" <?php if ($colorid == "4") {?>id="mycolor"<?php } ?>>
<h5>Bitcoin Faucet<br>Claim 5 satoshi (BTC) every 60 minutes<br>Faucet Balance:  satoshi</h5>
</td></tr></table></td><td width="350" align="center">
<?php if ($colorid == "4") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr><tr>
<td class="bc" align="center">
<table cellspacing="0" cellpadding="0" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $startpagec ?>;" <?php if ($colorid == "5") {?>id="mycolor"<?php } ?>>
<br>&nbsp;&nbsp;&nbsp;<button>Start</button>&nbsp;&nbsp;&nbsp;
<br><br></td></tr></table></td>
<td width="350" align="center">
<?php if ($colorid == "5") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr><tr>
<td class="bc" align="center">
<table cellspacing="0" cellpadding="5" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $rlboxc ?>;" <?php if ($colorid == "10") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $rlhc ?>;" <?php if ($colorid == "7") {?>id="mycolor"<?php } ?>>
Ref link
</td></tr><tr>
<td align="center" style="background-color:<?php echo $rlmc ?>;"  <?php if ($colorid == "9") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="0" width="250" class="bc1">
<tr>
<td align="center" style="background-color:<?php echo $rlbc ?>;" <?php if ($colorid == "8") {?>id="mycolor"<?php } ?>>
<p>Invite your friends and earn 10% referral comission</p>
</td></tr></table></td></tr></table></td></tr></table>
</td>
<td width="350" align="center">
<?php if ($colorid == "7" or $colorid == "8" or $colorid == "9" or $colorid == "10") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr><tr>
<td class="bc" align="center">
<table cellspacing="0" cellpadding="5" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $rlboxc ?>;" <?php if ($colorid == "14") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $rlhc ?>;" <?php if ($colorid == "11") {?>id="mycolor"<?php } ?>>
Recent Payouts
</td></tr><tr>
<td align="center" style="background-color:<?php echo $rlmc ?>;" <?php if ($colorid == "13") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="0" width="250" class="bc1">
<tr><td align="center" style="background-color:<?php echo $rlbc ?>;"<?php if ($colorid == "12") {?>id="mycolor"<?php } ?>>
<table width="100%">
<tr><td>Date</td><td>Address</td><td>Reward</td>
</tr></table></td></tr></table></td></tr></table></td></tr>
</table></td>
<td width="350" align="center">
<?php if ($colorid == "11" or $colorid == "12" or $colorid == "13" or $colorid == "14") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr><tr>
<td class="bc" align="center">
<table cellspacing="0" cellpadding="5" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $biboxc ?>;" <?php if ($colorid == "18") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $bihc ?>;" <?php if ($colorid == "15") {?>id="mycolor"<?php } ?>>
What is Bitcoin
</td></tr><tr>
<td align="center" style="background-color:<?php echo $bimc ?>;" <?php if ($colorid == "17") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="0" width="250" class="bc1">
<tr><td align="center" style="background-color:<?php echo $bibc ?>;" <?php if ($colorid == "16") {?>id="mycolor"<?php } ?>>
<p>Bitcoin is a cryptocurrency ...</p>
</td></tr></table></td></tr></table></td></tr></table></td>
<td width="350" align="center">
<?php if ($colorid == "15" or $colorid == "16" or $colorid == "17" or $colorid == "18") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr><tr>
<td class="bc" align="center">
<table cellspacing="0" cellpadding="5" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $bwboxc ?>;" <?php if ($colorid == "22") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $bwhc ?>;" <?php if ($colorid == "19") {?>id="mycolor"<?php } ?>>
What is Bitcoin wallet
</td></tr><tr>
<td align="center" style="background-color:<?php echo $bwmc ?>;" <?php if ($colorid == "21") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="0" width="250" class="bc1">
<tr><td align="center" style="background-color:<?php echo $bwbc ?>;" <?php if ($colorid == "20") {?>id="mycolor"<?php } ?>>
<p>A Bitcoin wallet address is ...</p>
</td></tr></table></td></tr></table></td></tr></table>
</td><td width="350" align="center">
<?php if ($colorid == "19" or $colorid == "20" or $colorid == "21" or $colorid == "22") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr><tr><td class="bc" align="center">
<table cellspacing="0" cellpadding="5" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $wfboxc ?>;" <?php if ($colorid == "26") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $wfhc ?>;" <?php if ($colorid == "23") {?>id="mycolor"<?php } ?>>
What is Bitcoin Faucet
</td></tr><tr><td align="center" style="background-color:<?php echo $wfmc ?>;" <?php if ($colorid == "25") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="0" width="250" class="bc1">
<tr><td align="center" style="background-color:<?php echo $wfbc ?>;" <?php if ($colorid == "24") {?>id="mycolor"<?php } ?>>
<p>bitcoin faucet is a reward ...</p>
</td></tr></table></td></tr></table></td></tr></table></td>
<td width="350" align="center">
<?php if ($colorid == "23" or $colorid == "24" or $colorid == "25" or $colorid == "26") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr><tr><td class="bc" align="center">
<table cellspacing="0" cellpadding="5" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $faqboxc ?>;" <?php if ($colorid == "30") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="1" width="250">
<tr><td align="center" style="background-color:<?php echo $faqhc ?>;" <?php if ($colorid == "27") {?>id="mycolor"<?php } ?>>
FAQ
</td></tr><tr><td align="center" style="background-color:<?php echo $faqmc ?>;" <?php if ($colorid == "29") {?>id="mycolor"<?php } ?>>
<table cellspacing="0" cellpadding="0" border="0" width="250" class="bc1">
<tr><td align="center" style="background-color:<?php echo $faqbc ?>;" <?php if ($colorid == "28") {?>id="mycolor"<?php } ?>>
<p>VPN/Proxy/Tor are not allowed ...</p>
</td></tr></table></td></tr></table></td></tr></table></td>
<td width="350" align="center">
<?php if ($colorid == "27" or $colorid == "28" or $colorid == "29" or $colorid == "30") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr><tr>
<td height="40" style="background-color:<?php echo $footc ?>;" <?php if ($colorid == "31") {?>id="mycolor"<?php } ?>>
Copyright &nbsp;&nbsp;2018-2020 All Rights Reserved.
</td><td width="350" align="center">
<?php if ($colorid == "31") {?>
<input type="hidden" name="bcid" value="<?php echo $colorid; ?>"><code><b><?php echo $framename; ?></b></code><br><input type="text" name="colorr" value="<?php echo $pcolor; ?>" id="myText">&nbsp;<input type="color" value="<?php echo $pcolor; ?>" id="colorWell" />&nbsp;<input type="submit" value="Save" name="updatecolorp" class="myButton">&nbsp;
<?php } ?>
</td></tr></table>