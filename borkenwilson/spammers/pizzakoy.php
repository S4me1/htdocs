<?php
require_once('utils.php');

function getStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}


$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://pizzakoy.com.tr/SignUp",
CURLOPT_POST => 0,
CURLOPT_HTTPHEADER => array(
    'accept: */*',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'origin: https://pizzakoy.com.tr',
    'Pragma: no-cache',
    'referer: https://pizzakoy.com.tr/SignUp',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
));
$reqtoken = curl_exec($ch);
$reqtoken = getStr($reqtoken, '"__RequestVerificationToken" type="hidden" value="', '" /><');


$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://pizzakoy.com.tr/Customer/AddTempUser",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
CURLOPT_HTTPHEADER => array(
    'accept: */*',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'origin: https://pizzakoy.com.tr',
    'Pragma: no-cache',
    'referer: https://pizzakoy.com.tr/SignUp',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => 'CountryPhoneCode=90&Name=asdfsd&Surname=sdafs&Phone='.$telno.'&EMail=sadfgasdfhbsdfas@gmail.com&Password=asdasd123&ComFirmPassword=asdasd123&number=&number=&number=&number=&number=&number=&userContract=true&__RequestVerificationToken='.$reqtoken.'&userContract=false&notifyMe=false&X-Requested-With=XMLHttpRequest'
));
$pizzakoy = curl_exec($ch);
?>