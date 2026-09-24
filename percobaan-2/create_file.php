<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Politeknik Elektronika Negeri Surabaya, ";
fwrite($myfile, $txt);
$txt = "Kampus PENS, Sukolilo, Surabaya 60111";
fwrite($myfile, $txt);
fclose($myfile);
?>