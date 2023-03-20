<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => 'https://uygulama.vomsis.com/api/register',
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    'Accept: */*',
    'Origin: https://www.vomsis.com',
    'Pragma: no-cache',
    'Referer: https://www.vomsis.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => 'type=normal&ref_id=&ref=vomsis.com&referer=https%3A%2F%2Fwww.google.com%2F&email=sdfasdgds%40sdaf.com&password=asdasd123&name=sfasdf+asdfsaa&phone=%2B905415179140&contracts=true&ref_code=&referer_data=%5B%7B%22action%22%3A%22register%22%2C%22source%22%3A%22https%3A%2F%2Fwww.google.com%2F%22%2C%22redirect%22%3A%22https%3A%2F%2Fwww.vomsis.com%2Fkayit%2F%22%2C%22date%22%3A%222022-04-07T16%3A50%3A00.700Z%22%7D%5D'
));
$vomsis = curl_exec($ch);

?>