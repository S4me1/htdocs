<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://prod.fasapi.net/",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    'accept: */*',
    'content-type: application/json',
    'origin: https://www.istegelsin.com',
    'Pragma: no-cache',
    'referer: https://www.istegelsin.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => '{"query":"\n        mutation SendOtp2($phoneNumber: String!) {\n          sendOtp2(phoneNumber: $phoneNumber) {\n            alreadySent\n            remainingTime\n          }\n        }","variables":{"phoneNumber":"90'.$telno.'"}}'
));
$istegelsn = curl_exec($ch);

?>