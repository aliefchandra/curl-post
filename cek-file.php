<?php
$filename = getcwd().'/cookie.txt';

if (file_exists($filename)) {
    echo "File Ada";
} else {
    echo "File Tidak Ada !!!";
}
?>

