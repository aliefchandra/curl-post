<?php
include'curl-cookie.php' ;
$inbox = grab_tokopedia('https://www.tokopedia.com/fav-shop.pl') ;
echo $inbox ;
?>