<?php
require_once('utils.php');

$tel1 = substr($telno, '0', '3');
$tel2 = substr($telno, '3', '3');
$tel3 = substr($telno, '6', '2');
$tel4 = substr($telno, '8', '2');

$hummel = file_get_contents("https://hummel.com.tr/Uye/CheckPhoneAndSendSms?phone=($tel1)+$tel2+$tel3+$tel4");
?>