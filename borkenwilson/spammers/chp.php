<?php

require_once('utils.php');

function tcKimlikOlustur() {
    
    $random_pool1 = str_split(rand(10000, 99999));
    $random_pool2 = str_split(rand(1000, 9999));

    $k1_sum = array_sum($random_pool1);
    $k2_sum = array_sum($random_pool2);
    
    $tckn = array_reduce(array_keys($random_pool2), function ($carry, $numKey) use ($random_pool1, $random_pool2) {
        return $carry . $random_pool1[$numKey] . $random_pool2[$numKey];
    }, "");
    
    $digit_10 = ($k1_sum * 7 - $k2_sum) % 10;
    $digit_11 = ($k1_sum + $k2_sum + $digit_10) % 10;

    return $tckn . substr(implode("",$random_pool1), -1) . $digit_10 . $digit_11;
}

$tc = tcKimlikOlustur();


$tel1 = substr($telno, '0', '3');
$tel2 = substr($telno, '3', '3');
$tel3 = substr($telno, '6', '2');
$tel4 = substr($telno, '8', '2');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://uyelik.chp.org.tr/Default.aspx",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    'accept: */*',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'cookie: ASP.NET_SessionId=zzmtdh54mvzakta2oth40hkt',
    'origin: https://uyelik.chp.org.tr',
    'pragma: no-cache',
    'referer: https://uyelik.chp.org.tr/Default.aspx',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36',
    'x-microsoftajax: Delta=true',
    'x-requested-with: XMLHttpRequest',
),
CURLOPT_POSTFIELDS => 'smkf=upPanel%7CbtnSorgula&txtTckn='.$tc.'&txtSifreTelefonNumarasi=('.$tel1.')-'.$tel2.'-'.$tel3.'-'.$tel4.'&hfFoto=&hdnFotoUrl=resimyok.jpg&hdnUyeID=0&hdnTckn=0&hdnKrediKartiID=0&hdnUyeIl=0&hdnUyeIlce=0&hdnTelefon=0&hdnYargitaySorguDurumu=0&__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=Xv0ICmSDo8uD8b%2FrlpjXz8oZq5kj53GHLu4dShU3NMG62B0Gus5qBh0DlBS%2Fnja3boOrvzVcPuxU%2BQufCozXcaiWiMRpoP1%2FyB6qw%2BIE1KJ5W3qFYiNaRjLMdWVszFtBR%2Ba%2BMnbCmSZ%2Bv1HPVGpBV%2FGXT8zqWhWtHzV5jIPBkgbTEQn5F95VrX44Jd6Rnpa6OrN2f3r2AHG%2FmfxKDCiMW40vHDqkg6tyrQ7lGpVJSr%2F9S3AUFDDHgOlE13TwpJ8EOWfr%2BixZsWDsxGNtE%2B5AYYb3DwdYnuXu1siNODD9Pi3ZPjCCqD2m75rSP5qepJiWK6kG%2B8QNZz2ZCsmPhGqQkEe6vuvM%2BDRB4Ab0NqJcWOV6B9HFjl3PdWV%2BX4nxFJduOnK6q6BotGVtdpBMvu%2FZ%2BDB71vGVGn%2FiN05Ekwu%2FQP9euvZ8MlSxHBcO%2BrSXxD1lOcHHStlMRTHWocYRN5FPx4vdRkgk274br0bqbP016s8B%2Bdi7q84yDTRXJTChavZ6UYCV4tCms4lK9ixVc%2FpDT0low3e0RbzbTTNhlgbutMA6fILO3CasCfytgyUDgVRHcaHANFlEhX8%2BYNqHaW0SqgcDm8b7TfLS8NeDqHSjPNlUX4uL08q6XOBxufnWDA%2F01KdvTcFKZWb4F%2BW%2FN%2BE%2Fc%2BCCVaCC8rF%2FISwpUBVlVPS%2F61e5CYIq3JZcbgtJsyKKuc%2F2vDR5UHXJuRTk79723VYUpES5o0QKZL981aJ9Jx2cBMrlrJBuUTTeaFHwfDbXyhjNaQgrVLkZ8OLjBzAZOpnaLIHwfeFEoSxztRGZTHqz%2BrvxRGlfHzMKLbUL9IFTSjm7ulTBfK5puQM6TcbCHfw6lyMMC%2Bs2ZHwS96acFh5REAIL%2FBS0bdEcNcFs4WQZEoZhyZZtoIjxx4Q0%2B7zrakt8FHq5BlxENydmj0TSyIxRiz3GJk2Cf9b%2BTBFKy%2Byo1XpJWvn4YzTKv3tq24idKk6Zd6YblXxSXywmXcH6kmDpdsCbcf969iRTV2WWikFaCQpYN5SgS6il87dTuZuZejj8nyoTcdAUPhyYzgAEE23P82I4HwwzkfrO1HtlzpwNqC3bd38nRShkdGtMuJ%2Bybf%2BaLrJuDQQ6wtvyA%2F2etfi905ratQHs2rdq%2BT2LPdnJQd8itFsBcmuGMhDy4wEdf3dCAzG%2FBu0I1Fn6xyY193l%2FzhsiWZPkPlxYeXVhyq%2F7saTG7O%2Byx1LEs7K4N2e01W2mWvPdPXAYFIRYBCb8DwCPX%2F%2BeGkqC7zvoDGs94lbRNZ19MZ%2BpUXcyi%2FtkLEvzQ3Z4win%2BYqkl2LBjNSiSeFv4KbH%2BTXLgLZJ990%2BGLk%2Fp%2F0prbp1YZXI8OHtut7%2BoMcLS8CK4ZmuGu0nBJF%2Bj9jo0LjWn5W%2FnbYqc8eFnh8Dg3yKJW0vPg6gqH3zi%2BQ3jLjyUzH9DcHXI0MV13nv5UerEch2y7qDa5F18zvMtmcSX11TWGW63ZG4efLhDwNB1h3cDnFLInqCnuRz8IZYhMt7x1M2M7%2BpN6qsInQND4fmS4CeBE%2B7E6R4yl0SW9nuLj%2FzhyR4Wpu0N1RIu6HghLvF3lWnKxZeGdexfKePYsE1jYXEj3QbFNZ%2FFYIAeDO8W13nxJrxUklIvz5iLUyNhUjOPjoK3I8ys41h6E9%2BtEAvv6pMCsiROkVQFL9fV1ERqJZZnpcIwD%2FXAS8ZPHqN9TGUNoOx3wUEIr9TEfI9ylEvNgl2sE77XYqf%2F8e9LKKZd4YY%2BUse9%2BsLTp0CUdWGr5OlXetRhSS%2BFD8QA9TFdE2LpR4ow2JcA2znW5uxCWuAnOHdMljC3WEvCmSx%2FNjAigFA0ltAUPFFHKTbRg%2FOnDuMosmWlYgoZiX1u%2B9Sn5wtwLKBZ%2B%2BNRLSuXv81G0O0efNhBkP9j6RSkZoohzXoJCcxCAqIBAcsDzsUzqTWX1evGtcz%2FtymZveY0zFcb3eTdK0%2BvDR909EzjJQOxbDS3t8BrEBFi285y6rcrMzHXLFmOarxu54R0lnxtga4sIxRxcl0T7WVZIqR5%2BxN2KYpsRJ%2BcXsHJol3qAgW7ztnFWrB%2BNrn4xWfNwOVsBvFkGj8BeTjNzlZ7VLDw9jX9qnuWJTGYBReAGr%2F%2FmRQ9KxYSSDOJj%2BUmGtyYWIrrQNfX8mPc18j90o%2Bw54FV7a2bF59VHOn1MgMSP7OqtDRtvKpNyht9Paa0BWFP6OZe6bM07o%2B8f7ynm5qTP4zsLw5FKlapiDALwY%2FvMvEGWvpeJSYIGBE%2BHsSp33Tr6MvEDEZ70mtzh%2BYtoBk3nMnvnNZxn4rUqbUOTGZ44ES9DT8BidhFA7PcLGIyfAT0g9OiVRakHGLpbcRiBqvMNLrUy0W8M0wev4d9ggDm4LIiY29iww5VNZzDBUh7rUeRrt9zQCnBzbNhWcFao12rI9dIrG3HAyx%2FZ7W5v%2FMtMz9qpGHxrD%2FEQ6jZ9zUkKh0srj9qg0ekDnAPlPS2ObbMVdvmnkcPthUIfKvsf0y3Nm%2FtSN2tN3ZCX1ll2QbP54u%2FfxLQebDLM2c%2BuR7LUf%2BwfdCWXNr%2BGshwk3klPb3XJyMbgYGbFbb%2BnNy1B5VhKn69b5XsTOsiXvnygz0eQq1Ut5g30pqaZ9UFYLZyFgWJKQ0akrPejwnH8j9hHzhhkec%3D&__VIEWSTATEGENERATOR=CA0B0334&__SCROLLPOSITIONX=0&__SCROLLPOSITIONY=0&__ASYNCPOST=true&btnSorgula=%C5%9Eifre%20g%C3%B6nder'
));
$chp = curl_exec($ch);


?>