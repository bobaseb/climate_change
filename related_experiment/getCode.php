<?php
header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

$sub = $_POST["sub"];


$r = 3.6;
$x = 0.3;

for ($i=0; $i<=$sub; $i++) {
  $x = $r*$x*(1-$x);
} 

echo $x;
?>
