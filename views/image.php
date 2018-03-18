<?php
$im = imagecreate(120, 30);
$bg = imagecolorallocate($im, rand(200,255), rand(200,255), rand(200,255));
$textcolor = imagecolorallocate($im, rand(0,100), rand(0,100), rand(0,100));
imagestring($im, 5, 16, 8, $_SESSION['one']." + ".$_SESSION['two']." = ?", $textcolor);
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>