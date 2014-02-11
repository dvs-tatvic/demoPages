<?php
    $siteName = $_GET["mySite"];
   
$host = $siteName;
if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
echo 'online!';
fclose($socket);
} else {
echo 'offline.';
}

?>