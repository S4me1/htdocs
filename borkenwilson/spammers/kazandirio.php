<?php

require_once('utils.php');


$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "http://nexus.kazandirio.io/bff/mobile/consumer/api/v1/privacy/userregister",
CURLOPT_POST => 0,
CURLOPT_HTTPHEADER => array(
    "Host: nexus.kazandirio.io",
    "Proxy-Connection: keep-alive",
    "User-Agent: Production/2.2.0 (com.pepsico.kazandirio; build:18; iOS 15.3.1) Alamofire/4.9.1",
    "X-Nexus-App-Build-Number: 18",
    "X-Nexus-App-Name: kazandirio",
    "X-Nexus-App-Version: 2.2.0",
    "X-Nexus-Channel-Name: IOS",
    "X-Nexus-Channel-Type: Mobile",
    "X-Nexus-Device-Brand: Apple",
    "X-Nexus-Device-Model: iPhone14,3",
    "X-Nexus-Device-Name: iPhone",
    "X-Nexus-Device-Os-Type: Ios",
    "X-Nexus-Os-Name: Ios",
    "X-Nexus-Os-Version: 15.3.1",
    "X-Nexus-Subscription-Key: c5a7f42ad78640a7950139252163f098",
    "X-Nexus-Unique-Device-Id: 39026DAC-8183-42B3-A478-2915F3DA133D",
),
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
));
$kzndr1 = curl_exec($ch);   

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "http://nexus.kazandirio.io/bff/mobile/consumer/api/v1/users/login/search/exist",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Host: nexus.kazandirio.io",
    "Proxy-Connection: keep-alive",
    "User-Agent: Production/2.2.0 (com.pepsico.kazandirio; build:18; iOS 15.3.1) Alamofire/4.9.1",
    "X-Nexus-App-Build-Number: 18",
    "X-Nexus-App-Name: kazandirio",
    "X-Nexus-App-Version: 2.2.0",
    "X-Nexus-Channel-Name: IOS",
    "X-Nexus-Channel-Type: Mobile",
    "X-Nexus-Device-Brand: Apple",
    "X-Nexus-Device-Model: iPhone14,3",
    "X-Nexus-Device-Name: iPhone",
    "X-Nexus-Device-Os-Type: Ios",
    "X-Nexus-Os-Name: Ios",
    "X-Nexus-Os-Version: 15.3.1",
    "X-Nexus-Subscription-Key: c5a7f42ad78640a7950139252163f098",
    "X-Nexus-Unique-Device-Id: 39026DAC-8183-42B3-A478-2915F3DA133D",
),
CURLOPT_POSTFIELDS => '{"phoneNumber":"'.$telno.'"}'
));
$kzndr2 = curl_exec($ch);


$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "http://nexus.kazandirio.io/bff/mobile/consumer/api/v1/users/register/search/exist",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Host: nexus.kazandirio.io",
    "Proxy-Connection: keep-alive",
    "User-Agent: Production/2.2.0 (com.pepsico.kazandirio; build:18; iOS 15.3.1) Alamofire/4.9.1",
    "X-Nexus-App-Build-Number: 18",
    "X-Nexus-App-Name: kazandirio",
    "X-Nexus-App-Version: 2.2.0",
    "X-Nexus-Channel-Name: IOS",
    "X-Nexus-Channel-Type: Mobile",
    "X-Nexus-Device-Brand: Apple",
    "X-Nexus-Device-Model: iPhone14,3",
    "X-Nexus-Device-Name: iPhone",
    "X-Nexus-Device-Os-Type: Ios",
    "X-Nexus-Os-Name: Ios",
    "X-Nexus-Os-Version: 15.3.1",
    "X-Nexus-Subscription-Key: c5a7f42ad78640a7950139252163f098",
    "X-Nexus-Unique-Device-Id: 39026DAC-8183-42B3-A478-2915F3DA133D",
),
CURLOPT_POSTFIELDS => '{"phoneNumber":"'.$telno.'","email":"qwdqwjdnqwjd@gmail.com"}'
));
$kzndr3 = curl_exec($ch);

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "http://nexus.kazandirio.io/bff/mobile/consumer/api/v1/usersmskeys/register",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Host: nexus.kazandirio.io",
    "Proxy-Connection: keep-alive",
    "User-Agent: Production/2.2.0 (com.pepsico.kazandirio; build:18; iOS 15.3.1) Alamofire/4.9.1",
    "X-Nexus-App-Build-Number: 18",
    "X-Nexus-App-Name: kazandirio",
    "X-Nexus-App-Version: 2.2.0",
    "X-Nexus-Channel-Name: IOS",
    "X-Nexus-Channel-Type: Mobile",
    "X-Nexus-Device-Brand: Apple",
    "X-Nexus-Device-Model: iPhone14,3",
    "X-Nexus-Device-Name: iPhone",
    "X-Nexus-Device-Os-Type: Ios",
    "X-Nexus-Os-Name: Ios",
    "X-Nexus-Os-Version: 15.3.1",
    "X-Nexus-Subscription-Key: c5a7f42ad78640a7950139252163f098",
    "X-Nexus-Unique-Device-Id: 39026DAC-8183-42B3-A478-2915F3DA133D",
),
CURLOPT_POSTFIELDS => '{"phoneNumber":"'.$telno.'"}'
));
$kzndr4 = curl_exec($ch);



?>