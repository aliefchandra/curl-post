<?php
$filename = dirname(__FILE__) . '/cookie.txt' ;
echo $filename ;
if (file_exists($filename)) {
    echo "File Ada";
} else {
    echo "File Tidak Ada !!!";
}
?>