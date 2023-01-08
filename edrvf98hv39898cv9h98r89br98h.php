<?php

if($_SERVER['HTTP_X_FORWARDED_FOR'] != "s" || $_POST['password'] != "s"){
    exit();
}

include 'sql.php';

switch ($_POST['type']) {
    case 'setworld':
		$getGrowid = $_POST['growid'];
		$getWorld = $_POST['world'];
		$sqlx = $db->prepare("UPDATE `dls` SET `world` = '$getWorld' WHERE `growid` = '$getGrowid'");
		$rowx = $sqlx->execute();
        die("Success!");
		
    default:
        die("unknown error!");
}
?>