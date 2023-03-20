<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://tr.uspoloassn.com/users/registration/",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
CURLOPT_HTTPHEADER => array(
    'accept: */*',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'origin: https://www.uspoloassn.com.tr',
    'Pragma: no-cache',
    'origin: https://www.uspoloassn.com.tr/register',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => 'first_name=sadgfsdg&last_name=dgasgsd&email=dasgsdg%40sdaf.com&phone=0'.$telno.'&password=ASDFNJasbdhasDH!31131&password2=ASDFNJasbdhasDH!31131&confirm=true&email_allowed=false&sms_allowed=false'
));
$uspoloassn = curl_exec($ch);
?>