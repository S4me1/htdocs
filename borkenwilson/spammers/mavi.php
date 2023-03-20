<?php
require_once('utils.php');

function getStrmavi($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://www.mavi.com/register",
CURLOPT_POST => 0,
CURLOPT_HTTPHEADER => array(
    "authority: www.mavi.com",
    "method: GET",
    "scheme: https",
    'accept: */*',
    "content-type: application/x-www-form-urlencoded; charset=UTF-8",
    "cookie: JSESSIONID=5D7543D376676DB24372026391211908; _gcl_au=1.1.418646370.1668166390; _dc_gtm_UA-11524643-8=1; _dc_gtm_UA-11524643-1=1; _fbp=fb.1.1668166390302.1224667373; gp_e=0; gp_g=0; gp_s=955497093.1668166390; PW-ABC=93; _hjFirstSeen=1; _hjIncludedInSessionSample=0; _hjSession_2854020=eyJpZCI6IjJjNmY0YmY4LTU5NzItNDRjMC1hNDNiLWUxNWJjMDNjOTRhYiIsImNyZWF0ZWQiOjE2NjgxNjYzOTE4OTUsImluU2FtcGxlIjpmYWxzZX0=; _hjAbsoluteSessionInProgress=0; _hjSessionUser_2854020=eyJpZCI6ImNkMTViZWZkLTM5YjQtNWE3ZC1iYmJhLWE1MjkxY2YxYzVhNCIsImNyZWF0ZWQiOjE2NjgxNjYzOTE1MDgsImV4aXN0aW5nIjp0cnVlfQ==; H-App=app4|Y24zA; _ga_7WH23VFW0P=GS1.1.1668166389.1.1.1668166397.0.0.0; _ym_uid=1668166399224104176; _ym_d=1668166399; _ym_isad=2; _ym_visorc=w; CookieConsent={stamp:%27x4uCpdiB+fWgHjd49Lxn8uhPSOJlv90IZ7w+v/HzFSv2L8Bzj/iR9w==%27%2Cnecessary:true%2Cpreferences:false%2Cstatistics:false%2Cmarketing:false%2Cver:1%2Cutc:1668166402966%2Cregion:%27tr%27}",
    "origin: https://www.mavi.com",
    "pragma: no-cache",
    "referer: https://www.mavi.com/register",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36",
    "x-requested-with: XMLHttpRequest",
),
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
));
$mavi1 = curl_exec($ch);  

$mavicsrf = getStrmavi($mavi1, 'name="CSRFToken" value="', '" />');


$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://www.mavi.com/register/newcustomer",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    "authority: www.mavi.com",
    "method: POST",
    "scheme: https",
    'accept: */*',
    "content-type: application/x-www-form-urlencoded; charset=UTF-8",
    "cookie: JSESSIONID=5D7543D376676DB24372026391211908; _gcl_au=1.1.418646370.1668166390; _dc_gtm_UA-11524643-8=1; _dc_gtm_UA-11524643-1=1; _fbp=fb.1.1668166390302.1224667373; gp_e=0; gp_g=0; gp_s=955497093.1668166390; PW-ABC=93; _hjFirstSeen=1; _hjIncludedInSessionSample=0; _hjSession_2854020=eyJpZCI6IjJjNmY0YmY4LTU5NzItNDRjMC1hNDNiLWUxNWJjMDNjOTRhYiIsImNyZWF0ZWQiOjE2NjgxNjYzOTE4OTUsImluU2FtcGxlIjpmYWxzZX0=; _hjAbsoluteSessionInProgress=0; _hjSessionUser_2854020=eyJpZCI6ImNkMTViZWZkLTM5YjQtNWE3ZC1iYmJhLWE1MjkxY2YxYzVhNCIsImNyZWF0ZWQiOjE2NjgxNjYzOTE1MDgsImV4aXN0aW5nIjp0cnVlfQ==; H-App=app4|Y24zA; _ga_7WH23VFW0P=GS1.1.1668166389.1.1.1668166397.0.0.0; _ym_uid=1668166399224104176; _ym_d=1668166399; _ym_isad=2; _ym_visorc=w; CookieConsent={stamp:%27x4uCpdiB+fWgHjd49Lxn8uhPSOJlv90IZ7w+v/HzFSv2L8Bzj/iR9w==%27%2Cnecessary:true%2Cpreferences:false%2Cstatistics:false%2Cmarketing:false%2Cver:1%2Cutc:1668166402966%2Cregion:%27tr%27}",
    "origin: https://www.mavi.com",
    "pragma: no-cache",
    "referer: https://www.mavi.com/register",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36",
    "x-requested-with: XMLHttpRequest",
),CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
CURLOPT_POSTFIELDS => 'firstName=sdaf&lastName=sdaf&phoneNumber='.$telno.'&day=02&month=02&year=1995&gender=MALE&eMail=asdasdkqwb%40faasd.com&password=asdasd123A!&confirmPassword=asdasd123A!&smsPermission=false&emailPermission=false&acceptAgreement=false&CSRFToken='.$mavicsrf.''
));
$mavi = curl_exec($ch);



?>