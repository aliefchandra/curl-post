<?php
function cek_error($result){
    if ( $result == false){
        echo 'cURL Error: ' . curl_error($result); //echoes last session error
    }
}
/*
This script is an example of using curl in php to log into on one page and 
then get another page passing all cookies from the first page along with you.
If this script was a bit more advanced it might trick the server into 
thinking its netscape and even pass a fake referer, yo look like it surfed 
from a local page.
*/

function login($url,$data){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_CAINFO, getcwd().'/cacert.pem');
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/cookies.txt");
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    ob_start();      // prevent any output
    return curl_exec ($ch); // execute the curl command
    ob_end_clean();  // stop preventing output
    curl_close ($ch);
    //unset($ch);
}

// Masuk Ke Halaman Pesan -----------------------------------------------------
function grab_tokopedia($url_inbox){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_CAINFO, getcwd().'/cacert.pem');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/cookies.txt");
    curl_setopt($ch, CURLOPT_URL,$url_inbox) ;
    return curl_exec ($ch);
    curl_close ($ch);
}



//$login = login('https://www.tokopedia.com/login.pl','email=aliefchandra%40gmail.com&pwd=karsinah');
//$inbox = inbox('https://www.tokopedia.com/inbox-message.pl') ;
?>