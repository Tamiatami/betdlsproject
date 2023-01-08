<?php

include 'sql.php';
include 'functions/others.php';

$secret = 'bgNyyR';

if($_GET['secret'] != $secret) exit('Invalid authenticity');

$growid = $_GET['growid'];
$world = strtoupper($_GET['world']);
$amount = floatval($_GET['amount']);
if($amount > 0){
	$sql_request = $db->query('SELECT * FROM `dl_deposits_requests` WHERE `growid` = ' . $db->quote($growid) . ' AND `world` = ' . $db->quote($world) . ' AND `used` = 0 AND `expire` > ' . $db->quote(time()));
		if ($sql_request->rowCount() > 0) {
		
		$sql_transaction = $db->query('SELECT * FROM `dl_deposits` WHERE `inspected` = 0 AND `growid` = ' . $db->quote($growid));
		
		if ($sql_transaction->rowCount() <= 0) {
			$sql_growid = $db->query('SELECT * FROM `users` INNER JOIN `users_growid` ON users.userid = users_growid.userid WHERE users_growid.growid = ' . $db->quote($growid) . ' AND users_growid.removed = 0');

			if ($sql_growid->rowCount() > 0) {
				$row_growid = $sql_growid->fetch(PDO::FETCH_ASSOC);
					
				$db->exec('INSERT INTO `dl_deposits` SET `userid` = ' . $db->quote($row_growid['userid']) . ', `name` = ' . $db->quote($row_growid['name']) . ', `avatar` = ' . $db->quote($row_growid['avatar']) . ', `xp` = ' . $db->quote($row_growid['xp']) . ', `growid` = ' . $db->quote($growid) . ', `world` = ' . $db->quote($world) . ', `amount` = ' . $db->quote($amount) . ', `time` = '.$db->quote(time()));
				
				exit('Success');
			}
		}
	}
}

exit('Invalid request');

?>