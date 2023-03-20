<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://api.littlecaesars.com.tr/api/web/Member/Register",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    'authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6ImY0MWM2OGViODc5OTNhYjAzNjM3OTEwY2VkYjYwNGI0IiwidHlwIjoiSldUIn0.eyJuYmYiOjE2NDkzMzc3MDcsImV4cCI6MTY0OTk0MjUwNywiaXNzIjoiaHR0cHM6Ly9hdXRoLmxpdHRsZWNhZXNhcnMuY29tLnRyIiwiYXVkIjpbImh0dHBzOi8vYXV0aC5saXR0bGVjYWVzYXJzLmNvbS50ci9yZXNvdXJjZXMiLCJsaXR0bGVjYWVzYXJzYXBpIl0sImNsaWVudF9pZCI6IndlYiIsInN1YiI6InJvYnVzZXJAY2xvY2t3b3JrLmNvbS50ciIsImF1dGhfdGltZSI6MTY0OTMzNzcwNywiaWRwIjoibG9jYWwiLCJlbWFpbCI6InJvYnVzZXJAY2xvY2t3b3JrLmNvbS50ciIsInVpZCI6IjI0IiwicGVyc29uaWQiOiIyMDAwNTA4NTU0NjYiLCJuYW1lc3VybmFtZSI6IkxDIER1bW15IiwibGN0b2tlbiI6InlsUkxHUnREdmFyMTRiaC1DQ2stZW5NZlE0QkNELUxqdXJXek1VdDBBS3pvdW9ZVDY2WmYwVUtJN0lxZWNlWW5mVDczNFVNT0I3VUhHS2JmV3o3TFJOdExYQUZoblNROGRWaWp6QTI2OVJxd2ZJWHQwelZ1My1HMnlaVFBHQ3N1elZUclA2QnVXUmF1emxVSngyV284LUlmbjNmWUpPSVAwWldzTmtPaHdGeV9RMzdKcFg1VjFJTDgzYVd0VXNidWdlTmoxRHdtZV9zRjJOZGJUVUc0U0xsZDdpRHhuSWstOWV5TzZWQXVuaDUzS1lqenBSVmxKYk93and0VVgxaVZxS0pIeGVkajlZakdXcExpVUxtejR3a3A0eTUxenc0UXVqeVV2a3d2eUJjd2dieGJhTl9icVp4X3VPWGNIeG83SHg5VEhueEttejNZNkpEbDBoalluMnVwWk00NVItWlVVcEE0RkZjQXBrSXhIN1lOIiwibGNyZWZyZXNodG9rZW4iOiIzNmNkMWNiNzlmYTE0OTM1YWZkZWIxZjU1NDA3MDBkYyIsInBlcnNvbmVtYWlsIjoibGNAZHVtbXkuY29tIiwic2NvcGUiOlsibGl0dGxlY2Flc2Fyc2FwaSIsIm9mZmxpbmVfYWNjZXNzIl0sImFtciI6WyI3NjU2QkFGM0YxNUE2NTA0QkJGM0NFRTgyOTA5MkRGQSJdfQ.AQzXNwBiNRimn7upo-l5cjxPmsz1i85W9GB13g_DxnYf72mJn2MKgRaZJ_d1vIkpkCmZwOHPRvGDkKF5rgiRBjsQn6xssI-bYRycFJmidvdQDk1AnQbiuHEhlwYNRFW1RFn0TPrAV7v3ZTETYZI0OQCYQaYZ2MgdQYaJQ9X1IUu2n39x_gnNfvy4myER2Sjnf16gaA98l1hGvMCC_aPi0fOfVi_leTknXt4NvOYH8VL4YOsPJGanpPiZkAbVcVTn0Fy7IJLhIgtzDv5vrPrgyB7wMGnag2mr0BezHhfON9Fx_oqm048mCQFlBorYQEheomXmG0fARXqAOF4sK0Z3sw',
    'accept: application/json, text/plain, */*',
    'content-type: application/json;charset=UTF-8',
    'origin: https://www.littlecaesars.com.tr',
    'Pragma: no-cache',
    'referer: https://www.littlecaesars.com.tr/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => '{"NameSurname":"sdgf sdagasg","Email":"'.$mail.'","Phone":"'.$telno.'","Password":"sfsdffdsfa","CampaignInform":false,"SmsInform":false,"IsLoyaltyApproved":true}'
));
$littlecaes = curl_exec($ch);

?>