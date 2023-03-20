<?php
require_once('utils.php');

$teldegis = substr($telno, 0, 3);
$teldegis2 = substr($telno, 3, 10);

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://www.izabella.com.tr/api/uye_islemleri.php",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
CURLOPT_HTTPHEADER => array(
    'accept: */*',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'origin: https://www.izabella.com.tr',
    'Pragma: no-cache',
    'referer: https://www.izabella.com.tr/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => 'isim=sdfasdg+sddasasd&mail=gasdgwerweasd%40sdfa.com&tel=('.$teldegis.')+'.$teldegis2.'&pass=asdfgsdfeqwdwq!a&mail_send=on&sms_send=on&sozlesme=on&islem=yeni'
));
$izabella = curl_exec($ch);
?>