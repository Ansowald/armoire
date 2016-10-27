<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
include "PhpSerial.php";

$serial = new phpSerial;
$serial->deviceSet("/dev/ttyACM0");
$serial->confBaudRate(9600);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->deviceOpen();
sleep(3);
$serial->sendMessage("1");
$test = $serial->readPort(5);
while(strlen($test) == 0){
	$test = $serial->readPort(5);
	$test = str_replace("\n", '', $test); // remove new lines
	$test = str_replace("\r", '', $test);
	usleep(100000);
}
$serial->deviceClose();
$output = shell_exec('python addUserRentHistory.py '.$test.' '.$_GET["objectID"]);
$obj = json_decode($output);
if(count($obj) > 0){
	shell_exec('python openBoxObject.py '.$_GET["objectID"]);
}
?>
<div><?php
echo 'Merci '.$obj[0][1];
?></div>