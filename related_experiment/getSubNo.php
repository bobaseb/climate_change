<?php
header('Content-Type: text/javascript');
header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

$user="XXXX";
$password="XXXX";
$database="XXXX";
$con = mysqli_connect('XXXX',$user,$password,$database);

if (!$con) {
  die ("Failed to connect to MySQL: " . mysqli_error($con));
}

$qry = "SELECT `subNo`
FROM `XXXX_conditions`
WHERE
	`timestamp` < ADDTIME(NOW(), '-01:00:00.0')
	AND `completed` !=1
LIMIT 0, 1";

$result = mysqli_query($con, $qry);

if (mysqli_num_rows($result) == 0) {
    // i.e. doesn't exist
    $qryTemp = "SELECT MAX(subNo) FROM `XXXX_conditions`";
    $resultTemp = mysqli_query($con, $qryTemp);
    $rowTemp = mysqli_fetch_array($resultTemp);
    $newSub = $rowTemp[0] + 1;

    $query2 = "INSERT INTO `XXXX_conditions` VALUES ('$newSub', '0', now())";
    mysqli_query($con, $query2);
    $qry3 = "SELECT MAX(subNo) FROM `XXXX_conditions`";
    $result = mysqli_query($con, $qry3);

    $row = mysqli_fetch_array($result);
    echo $row[0];
    }

else{
    $row = mysqli_fetch_array($result);
    $oldSub = $row['subNo'];
    $qry_update = "UPDATE `XXXX_conditions` SET `timestamp`=now() WHERE `subNo`='$oldSub'" ;
    $result_update = mysqli_query($con, $qry_update);

  echo $row['subNo'];
}

mysqli_close($con);
?>
