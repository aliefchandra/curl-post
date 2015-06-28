<?php
//HANYA BISA MENGGUNAKAN XAMPP
//Upload a blank cookie.txt to the same directory as this file with a CHMOD/Permission to 777
function login($url,$data){
    $fp = fopen("cookie.txt", "w");
    fclose($fp);
    $login = curl_init();
<<<<<<< HEAD
    curl_setopt($login, CURLOPT_URL, $url);
    //SSL option
    curl_setopt($login, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($login, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt ($login, CURLOPT_CAINFO, getcwd().'/cacert.pem');
    
    //COOKIE option
    curl_setopt($login, CURLOPT_COOKIESESSION, TRUE); 
    
    curl_setopt($login, CURLOPT_COOKIESESSION, TRUE); 
    curl_setopt($login, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/cookies.txt");
    curl_setopt($login, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/cookies.txt");
    
    //CORE option
    curl_setopt($login, CURLOPT_REFERER, 'https://www.google.com'); 
    curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($login, CURLOPT_POST, TRUE);
    curl_setopt($login, CURLOPT_POSTFIELDS, $data);
    curl_setopt($login, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($login, CURLOPT_TIMEOUT, 40000);
    curl_setopt($login, CURLOPT_HEADER, false);  // Apakah Header Ditampilkan pada Output
    
=======
    curl_setopt($login, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($login, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($login, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($login, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($login, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($login, CURLOPT_TIMEOUT, 40000);
    curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($login, CURLOPT_URL, $url);
    curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($login, CURLOPT_POST, TRUE);
    curl_setopt($login, CURLOPT_POSTFIELDS, $data);
>>>>>>> c9c7cd60b3cfce3cba15f12495b11a826bb4a26b
    ob_start();
    return curl_exec ($login);
    ob_end_clean();
    curl_close ($login);
    unset($login);    
}                  

function grab_page($site){
<<<<<<< HEAD
    $http_headers = array(
                    'Host: www.tokopedia.com',
                    'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:6.0.2) Gecko/20100101 Firefox/6.0.2',
                    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Accept-Language: id,en-US;q=0.7,en;q=0.3',
                    'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
                    'Accept-Encoding	gzip, deflate',
                    'Connection: keep-alive'
                  );
=======
>>>>>>> c9c7cd60b3cfce3cba15f12495b11a826bb4a26b
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
<<<<<<< HEAD
    curl_setopt($ch, CURLOPT_CAINFO, getcwd().'/cacert.pem');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $http_headers);
=======
    curl_setopt ($ch, CURLOPT_CAINFO, getcwd().'/cacert.pem');
>>>>>>> c9c7cd60b3cfce3cba15f12495b11a826bb4a26b
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_TIMEOUT, 40);
    //curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_URL, $site);
    ob_start();
    return curl_exec ($ch);
    ob_end_clean();
    curl_close ($ch);
}

function post_data($site,$data){
    $datapost = curl_init();
	$headers = array("Expect:");
    curl_setopt($datapost, CURLOPT_URL, $site);
	curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);
	curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt($datapost, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
	curl_setopt($datapost, CURLOPT_COOKIEFILE, "cookie.txt");
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost);    
}
function cek_error($result){
    if ( $result == false){
        echo 'cURL Error: ' . curl_error($result); //echoes last session error
    }
}
function cek_err_no($result){
    if ( $result == false){
        echo 'cURL Error: ' . curl_errno($result); //echoes last session error
    }
}
<<<<<<< HEAD

$res = login('https://www.tokopedia.com/login.pl','email=aliefchandra%40gmail.com&pwd=karsinah');
//$res = grab_page('https://www.tokopedia.com') ;
//$res = login('https://www.kaskus.co.id/user/login','username=aliefchandra&password=&md5password=0af5619bebb1f0d7cbd551d2b632804b&md5password_utf=0af5619bebb1f0d7cbd551d2b632804b&securitytoken=1435501003-282e3f85015ec0de125163aa4956a419&url=%252F');
//$res = grab_page('https://kaskus.co.id') ;
$res = grab_page('https://www.tokopedia.com/people/824818') ;
echo $res ;
cek_error($res) ;
=======
$res = grab_page('https://www.tokopedia.com') ;
echo $res ;
cek_error($res) ;


>>>>>>> c9c7cd60b3cfce3cba15f12495b11a826bb4a26b
?>