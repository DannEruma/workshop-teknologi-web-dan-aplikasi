<?php
$myfile = fopen("pens.txt", "r") or die("Unable to open file");
echo fread($myfile, filesize("pens.txt"));
fclose($myfile);
?>