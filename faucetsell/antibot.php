<?php
$word_universe[]=array('green'=>'008000', 'blue'=>'0000FF', 'red'=>'FF0000', 'orange'=>'FFA500', 'black'=>'000000', 'brown'=>'A52A2A', 'purple'=>'800080', 'gray'=>'808080', 'magenta'=>'FF00FF');
$word_universe[]=array('008000'=>'green', '0000FF'=>'blue', 'FF0000'=>'red', 'FFA500'=>'orange', '000000'=>'black', 'A52A2A'=>'brown', '800080'=>'purple', '808080'=>'gray', 'FF00FF'=>'magenta');
$word_universe[]=array('2*A'=>'AA', '3*A'=>'AAA', '2*B'=>'BB', '3*B'=>'BBB', '1*A+1*B'=>'AB', '1*A+2*B'=>'ABB', '2*A+2*B'=>'AABB', '2*C'=>'CC', '3*C'=>'CCC', '1*C+1*A'=>'CA', '1*C+1*B'=>'CB', '1*C+2*A'=>'CAA', '1*C+2*B'=>'CBB', '2*C+1*A'=>'CCA');
$word_universe[]=array('1'=>'one', '2'=>'two', '3'=>'three', '4'=>'four', '5'=>'five', '6'=>'six', '7'=>'seven', '8'=>'eight', '9'=>'nine', '10'=>'ten');
$word_universe[]=array('1'=>'I', '2'=>'II', '3'=>'III', '4'=>'IV', '5'=>'V', '6'=>'VI', '7'=>'VII', '8'=>'VIII', '9'=>'IX', '10'=>'X');
$randc = (rand(0,4));
$universe = $word_universe[$randc];
$random_keys_two=array_rand($universe, 4);
function random_key($length) {
$str = "";
$chars = "123456789";
$size = strlen( $chars );
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
}
return $str;
}
$coden = random_key(16);
$capcode1 = substr($coden, 0, 4);
$capcode2 = substr($coden, 4, 4);
$capcode3 = substr($coden, 8, 4);
$capcode4 = substr($coden, 12, 4);
if ($randc == "0") {
$showantibot = $random_keys_two[0] . " , " . $random_keys_two[1] . " , " . $random_keys_two[2] . " , " . $random_keys_two[3];
$arrX = array($universe[$random_keys_two[0]].$capcode1, $universe[$random_keys_two[1]].$capcode2, $universe[$random_keys_two[2]].$capcode3, $universe[$random_keys_two[3]].$capcode4);
$randIndex = array_rand($arrX, 4);
shuffle($randIndex);
$color1 = substr($arrX[$randIndex[0]], 0, 6);
$capcode1 = substr($arrX[$randIndex[0]], 6, 4);
$color2 = substr($arrX[$randIndex[1]], 0, 6);
$capcode2 = substr($arrX[$randIndex[1]], 6, 4);
$color3 = substr($arrX[$randIndex[2]], 0, 6);
$capcode3 = substr($arrX[$randIndex[2]], 6, 4);
$color4 = substr($arrX[$randIndex[3]], 0, 6);
$capcode4 = substr($arrX[$randIndex[3]], 6, 4);
$antibot1 = "<div id='myDIV".$capcode1."' onclick='insertTextInInputValue(".$capcode1.");' style='cursor: pointer;display: inline-block;width: 140px;height:10;background-color: #" . $color1 . "'>&nbsp;</div>";
$antibot2 = "<div id='myDIV".$capcode2."' onclick='insertTextInInputValue(".$capcode2.");' style='cursor: pointer;display: inline-block;width: 140px;height:10;background-color: #" . $color2 . "'>&nbsp;</div>";
$antibot3 = "<div id='myDIV".$capcode3."' onclick='insertTextInInputValue(".$capcode3.");' style='cursor: pointer;display: inline-block;width: 140px;height:10;background-color: #" . $color3 . "'>&nbsp;</div>";
$antibot4 = "<div id='myDIV".$capcode4."' onclick='insertTextInInputValue(".$capcode4.");' style='cursor: pointer;display: inline-block;width: 140px;height:10;background-color: #" . $color4 . "'>&nbsp;</div>";
}elseif ($randc == "1") {
$showantibot = "<div style='display: inline-block;width: 20px;background-color: #" . $random_keys_two[0] . "'>&nbsp;</div> , <div style='display: inline-block;width: 20px;background-color: #" . $random_keys_two[1] . "'>&nbsp;</div> , <div style='display: inline-block;width: 20px;background-color: #" . $random_keys_two[2] . "'>&nbsp;</div> , <div style='display: inline-block;width: 20px;background-color: #" . $random_keys_two[3] . "'>&nbsp;</div>";
$arrX = array($universe[$random_keys_two[0]].$capcode1, $universe[$random_keys_two[1]].$capcode2, $universe[$random_keys_two[2]].$capcode3, $universe[$random_keys_two[3]].$capcode4);
$randIndex = array_rand($arrX, 4);
shuffle($randIndex);
$capcode1 = preg_replace('/[^0-9]/', '', $arrX[$randIndex[0]]);
$color1 = ucfirst(preg_replace('/[^a-zA-Z]+/', '', $arrX[$randIndex[0]]));
$capcode2 = preg_replace('/[^0-9]/', '', $arrX[$randIndex[1]]);
$color2 = ucfirst(preg_replace('/[^a-zA-Z]+/', '', $arrX[$randIndex[1]]));
$capcode3 = preg_replace('/[^0-9]/', '', $arrX[$randIndex[2]]);
$color3 = ucfirst(preg_replace('/[^a-zA-Z]+/', '', $arrX[$randIndex[2]]));
$capcode4 = preg_replace('/[^0-9]/', '', $arrX[$randIndex[3]]);
$color4 = ucfirst(preg_replace('/[^a-zA-Z]+/', '', $arrX[$randIndex[3]]));
$antibot1 = "<div id='myDIV".$capcode1."' onclick='insertTextInInputValue(".$capcode1.");' style='cursor: pointer;display: inline;width: 10px;height:10;'>" . $color1 . "</div>";
$antibot2 = "<div id='myDIV".$capcode2."' onclick='insertTextInInputValue(".$capcode2.");' style='cursor: pointer;display: inline;width: 10px;height:10;'>" . $color2 . "</div>";
$antibot3 = "<div id='myDIV".$capcode3."' onclick='insertTextInInputValue(".$capcode3.");' style='cursor: pointer;display: inline;width: 10px;height:10;'>" . $color3 . "</div>";
$antibot4 = "<div id='myDIV".$capcode4."' onclick='insertTextInInputValue(".$capcode4.");' style='cursor: pointer;display: inline;width: 10px;height:10;'>" . $color4 . "</div>";
}else{
$showantibot = $random_keys_two[0] . " , " . $random_keys_two[1] . " , " . $random_keys_two[2] . " , " . $random_keys_two[3];
$arrX = array($universe[$random_keys_two[0]].$capcode1, $universe[$random_keys_two[1]].$capcode2, $universe[$random_keys_two[2]].$capcode3, $universe[$random_keys_two[3]].$capcode4);
$randIndex = array_rand($arrX, 4);
shuffle($randIndex);
$capcode1 = preg_replace('/[^0-9]/', '', $arrX[$randIndex[0]]);
$color1 = preg_replace('/[^a-zA-Z]+/', '', $arrX[$randIndex[0]]);
$capcode2 = preg_replace('/[^0-9]/', '', $arrX[$randIndex[1]]);
$color2 = preg_replace('/[^a-zA-Z]+/', '', $arrX[$randIndex[1]]);
$capcode3 = preg_replace('/[^0-9]/', '', $arrX[$randIndex[2]]);
$color3 = preg_replace('/[^a-zA-Z]+/', '', $arrX[$randIndex[2]]);
$capcode4 = preg_replace('/[^0-9]/', '', $arrX[$randIndex[3]]);
$color4 = preg_replace('/[^a-zA-Z]+/', '', $arrX[$randIndex[3]]);
$antibot1 = "<div id='myDIV".$capcode1."' onclick='insertTextInInputValue(".$capcode1.");' style='cursor: pointer;display: inline;width: auto;height:10;'>" . $color1 . "</div>";
$antibot2 = "<div id='myDIV".$capcode2."' onclick='insertTextInInputValue(".$capcode2.");' style='cursor: pointer;display: inline;width: auto;height:10;'>" . $color2 . "</div>";
$antibot3 = "<div id='myDIV".$capcode3."' onclick='insertTextInInputValue(".$capcode3.");' style='cursor: pointer;display: inline;width: auto;height:10;'>" . $color3 . "</div>";
$antibot4 = "<div id='myDIV".$capcode4."' onclick='insertTextInInputValue(".$capcode4.");' style='cursor: pointer;display: inline;width: auto;height:10;'>" . $color4 . "</div>";
}
setcookie('anticodeaddress', $coden);
?>