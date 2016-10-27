<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
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
$test = $serial->readPort();
$i = 0;
while(strlen($test) == 0){
	$test = $serial->readPort();
	$test = str_replace("\n", '', $test); // remove new lines
	$test = str_replace("\r", '', $test);
	usleep(100000);
}

$serial->deviceClose();
if($test != '0'){
	$output = shell_exec('python addUserRent.py '.$test.' '.$_GET["objectID"]);
	$obj = json_decode($output);
	if(count($obj) > 0){
		shell_exec('python openBoxObject.py '.$_GET["objectID"]);
	}
}
?>
<?php
if($test == '0'){
	echo 'Réessayer';
}else{

echo '<div>';
echo $test;
echo 'Merci '.$obj[0][1];
echo '</div>';
}
?>