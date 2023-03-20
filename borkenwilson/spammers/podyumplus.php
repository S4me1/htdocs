<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => 'https://www.podyumplus.com/index.php?route=account/account/control&telephone=0'.$telno.'',
CURLOPT_POST => 0,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1
));
$podyumplus = curl_exec($ch);
?>