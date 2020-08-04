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
  echo "false";
}

$mturk_id = mysqli_real_escape_string ($con, $_POST["mturk_id"]);
$sub = mysqli_real_escape_string ($con, $_POST["sub"]);
$completed = mysqli_real_escape_string ($con, $_POST["completed"]);
$data = mysqli_real_escape_string ($con, $_POST["data"]);

    // Now timestamp the completion `finished_timestamp` = NOW()
//$query0 = "DELETE FROM `XXXX_conditions` WHERE `subNo`='$sub'";
//mysqli_query($con, $query0);
    //$query1 = "INSERT INTO `XXXX_conditions` VALUES ('$sub', '1', now())";
    //mysqli_query($con, $query1);
    $qry_update = "UPDATE `XXXX_conditions` SET `completed`='1', `timestamp`=now() WHERE `subNo`='$sub'" ;
    $result_update = mysqli_query($con, $qry_update);

// Save results

    $query2 = "INSERT INTO `XXXX` VALUES ('$sub', '$mturk_id', '$completed', '$data')";
    mysqli_query($con, $query2);

mysqli_close($con);
echo "true";
?>
