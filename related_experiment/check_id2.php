<?php
header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

$user="XXXX";
$password="XXXX";
$database="XXXX";
$con = mysqli_connect('XXXX',$user,$password, $database);

if (!$con) {
  die ("Failed to connect to MySQL: " . mysqli_error($con));
}

$mturk_id = mysqli_real_escape_string($con, $_POST["mturkid"]);

$qry = "SELECT `worker_id` FROM `XXXX_workers` WHERE `worker_id` = '$mturk_id' LIMIT 0 , 1";

$result = mysqli_query($con, $qry);

if ((mysqli_num_rows($result) == 0)) {
     // row not found, do stuff...
    $qry2 = "INSERT INTO  `XXXX_workers` (`worker_id`) VALUES ('$mturk_id')";
    mysqli_query($con, $qry2);
	echo "false";
} else if (($mturk_id === "") || ($mturk_id === "undefined")){
    // do other stuff...
    echo "false";
}
else{
    echo "true";
}

mysqli_close($con);
?>
