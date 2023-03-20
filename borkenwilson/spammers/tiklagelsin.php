<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://www.tiklagelsin.com/user/graphql",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    'accept: */*',
    'content-type: application/json',
    'origin: https://www.tiklagelsin.com',
    'Pragma: no-cache',
    'referer: https://www.tiklagelsin.com/a/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'x-device-type: 3',
    'x-merchant-type: 0',
    'x-no-auth: true',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => '{"operationName":"GENERATE_OTP","variables":{"phone":"+90'.$telno.'","challenge":"ff4c2243-42ed-457e-a8af-a8b1ab0a1c7b","deviceUniqueId":"web_f3745ef3-14e8-45a2-9d74-16277920f127"},"query":"mutation GENERATE_OTP($phone: String, $challenge: String, $deviceUniqueId: String) {\n  generateOtp(\n    phone: $phone\n    challenge: $challenge\n    deviceUniqueId: $deviceUniqueId\n  )\n}\n"}'
));
$tıklagelsin = curl_exec($ch);

?>