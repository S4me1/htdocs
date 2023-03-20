<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "http://82.222.161.230/MusteriWS.asmx",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
CURLOPT_HTTPHEADER => array(
    'User-Agent: Mono Web Services Client Protocol 4.0.50524.0',
    'Content-Type: text/xml; charset=utf-8',
    'SOAPAction: "http://tempuri.org/Set_KullaniciGirisYap_v4"',
    'Content-Length: 868',
    'Expect: 100-continue',
    'Host: bckws.binbinapp.com'
 ),
CURLOPT_POSTFIELDS => '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"><soap:Header><SHG xmlns="http://tempuri.org/"><KIKI>p1wn3MpDdfiZ3JLzs7EcP/Jp1uxQ2S5CNHknygZx0jsFBVbKas6bJOnzAmXTa9N4WebZrRnj7nHZcv/hW24e5g==</KIKI><SESE>LAf3y3AVfTCeouVaGgPHlKwBLUUTxTAouV0a95zvCYecQgznmOehDEEfh+4fFqbPQEK8AuvZ6QVoP+ufe+bNWw==</SESE><TelefonKodu>0</TelefonKodu><TelefonNo /><Token /><KIDKID>0</KIDKID><Surum>1004</Surum><Dil>Türkçe</Dil><Ulke>Türkiye</Ulke></SHG></soap:Header><soap:Body><Set_KullaniciGirisYap_v4 xmlns="http://tempuri.org/"><Ulke>Türkiye</Ulke><TelefonKodu>90</TelefonKodu><TelefonNo>'.$telno.'</TelefonNo><Dil>Türkçe</Dil><AcikRizaMetni>1</AcikRizaMetni><TEI>1</TEI></Set_KullaniciGirisYap_v4></soap:Body></soap:Envelope>'
));
$binbin = curl_exec($ch);
?>