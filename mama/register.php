<?php
$PrivateGT = $_GET["privategt"]??null;
$RealGT = $_GET["realgt"]??null;

$link = mysqli_connect("localhost", "root", "wasv!NVv9n8N!na", "coins");
 
if($link === false){
    die("Connection Error");
}

$date = date('Y-m-d H:i:s');

$sql = "SELECT * FROM users_growid WHERE growid = '$RealGT'";

$result = $link->query($sql);

if ($result->num_rows > 0) {
	//checking if anyone registered with this growID
  while($row = $result->fetch_assoc()) {
    $link->query("UPDATE `users_growid` SET `userid`='$PrivateGT' WHERE growid='$RealGT'");
  }
} else {
if($PrivateGT == "" || 	$RealGT == "")
{
	die("use this api with right parameters");
}
$str = "INSERT INTO `user_growid` (`time`, `growid`, `userid`) VALUES ('$date', '$RealGT', '$PrivateGT');";
$result = $link->query($str);
}

mysqli_close($link);


?>