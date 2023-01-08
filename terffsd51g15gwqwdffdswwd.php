<?php

if($_SERVER['HTTP_X_FORWARDED_FOR'] != "2a10:92c0:1:0:f816:3eff:fe7e:815d" || $_POST['password'] != "gf471sWqAv235tJwqTvns"){
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