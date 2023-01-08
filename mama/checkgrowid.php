<?php
include 'config_server.php';
$RealGT = $_GET["realgt"]??null;
$RealGT = strtolower($RealGT);

$link = mysqli_connect("localhost", "root", $db_pass, "coins");
 
if($link === false){
    die("Connection Error");
}

$date = date('Y-m-d H:i:s');

$sql = "SELECT * FROM users_growid WHERE growid = '$RealGT'";

$result = $link->query($sql);

if ($result->num_rows > 0) {
	//checking if anyone registered with this growID
  while($row = $result->fetch_assoc()) {
  die("registered|true\nprivateid|". $row["user"]);
  }
} else {
  die("registered|false\nprivateid|-1");
}

mysqli_close($link);


?>