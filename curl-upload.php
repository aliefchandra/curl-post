<form action="uploader.php" method="post" enctype="multipart/form-data">
      <input type="file" name="my_file" />
      <input type="submit" name="upload" value="Upload" />
</form>

<?php 
 
// Helper function courtesy of https://github.com/guzzle/guzzle/blob/3a0787217e6c0246b457e637ddd33332efea1d2a/src/Guzzle/Http/Message/PostFile.php#L90
function getCurlValue($filename, $contentType, $postname)
{
    // PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax
    // See: https://wiki.php.net/rfc/curl-file-upload
    if (function_exists('curl_file_create')) {
        return curl_file_create($filename, $contentType, $postname);
    }
 
    // Use the old style if using an older version of PHP
    $value = "@{$this->filename};filename=" . $postname;
    if ($contentType) {        $value .= ';type=' . $contentType;
    }
 
    return $value;
}
 
if(isset($_POST['upload'])){
    $ch = curl_init();
    $cfile = new curl_file_create($_FILES['my_file']['tmp_name'],$_FILES['my_file']['type'],$_FILES['my_file']['name']);
    $data =  array('my_image' => $cfile );
    $options = array(CURLOPT_URL => 'http://localhost/upload2/uploader.php',
             CURLOPT_RETURNTRANSFER => true,
             CURLINFO_HEADER_OUT => true, //Request header
             CURLOPT_HEADER => true, //Return header
             CURLOPT_SSL_VERIFYPEER => true, //Don't veryify server certificate
             CURLOPT_POST => true,
             CURLOPT_POSTFIELDS => $data,
            );
 
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
$header_info = curl_getinfo($ch,CURLINFO_HEADER_OUT);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($result, 0, $header_size);
$body = substr($result, $header_size);
if ($result === false){
    echo curl_error($ch) ;
 }
curl_close($ch);
}


