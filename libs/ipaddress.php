<?php
function getIpAddress(){
$ipAddress = '';
if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
$ipAddress = $_SERVER['HTTP_CLIENT_IP'];
}else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
foreach ($ipAddressList as $ip) {
if (! empty($ip)) {
$ipAddress = $ip;
break;
}}}else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
$ipAddress = $_SERVER['HTTP_X_FORWARDED'];
}else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
$ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
}else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
$ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
}else if (! empty($_SERVER['HTTP_FORWARDED'])) {
$ipAddress = $_SERVER['HTTP_FORWARDED'];
}else if (! empty($_SERVER['REMOTE_ADDR'])) {
$ipAddress = $_SERVER['REMOTE_ADDR'];
}
return $ipAddress;
}?>
