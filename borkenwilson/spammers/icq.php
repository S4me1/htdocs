<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => 'https://u.icq.net/api/v70/rapi/auth/sendCode',
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    'accept: */*',
    'content-type: application/json',
    'origin: https://web.icq.com',
    'Pragma: no-cache',
    'referer: https://web.icq.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => '{"reqId":"99564-1649352843","params":{"phone":"90'.$telno.'","language":"en-US","route":"sms","devId":"ic1rtwz1s1Hj1O0r","application":"icq"}}'
));
$icq = curl_exec($ch);
?>