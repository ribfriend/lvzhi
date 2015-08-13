<?php
echo "hello word!"
$link = mysql_connect('127.0.0.1', 'root', 'lvzhi');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>
