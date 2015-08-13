<?php
Header("Content-type: image/jpeg");
$new_image = imagecreatetruecolor(500, 331);
imagecopy($new_image,'20150312053712.png', 0, 0, 0, 0, 321, 11);
ImageJpeg($new_image);
?>