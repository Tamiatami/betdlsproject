<?php

function support_createTicket($data, $callback){
	if(strlen($data['title']) <= 0) return $callback('Invalid title. The title is required'); //ERROR
	if(strlen($data['message']) < 10) return $callback('Invalid message. At least 10 characters, all characters are allowed'); //ERROR
	if($data['department'] < 0 || $data['department'] > 5) return $callback('Invalid department'); //ERROR
	
	if($data['department'] == 1 || $data['department'] == 2 || $data['department'] == 4 || $data['department'] == 5) {
		$sql1 = $GLOBALS['db']->query('SELECT `userid`, `name`, `avatar`, `xp` FROM `users` WHERE `rank` = 1 || `rank` = 100');
	} else {
		$sql1 = $GLOBALS['db']->query('SELECT `userid`, `name`, `avatar`, `xp` FROM `users` WHERE `rank` = 1 || `rank` = 2 || `rank` = 100');
	}
	
	if($sql1->rowCount() <= 0) return $callback('Unable to create a new ticket (1)'); //ERROR
	
	$row1 = $sql1->fetchAll(PDO::FETCH_ASSOC);
	
	$receiver = $row1[rand(0, sizeof($row1) - 1)];
	if($receiver['userid'] == $data['user']['userid']) if(sizeof($row1) > 1) while($receiver['userid'] == $data['user']['userid']) $receiver = $row1[rand(0, sizeof($row1) - 1)];
	
	$sql2 = $GLOBALS['db']->prepare('INSERT INTO `support_tickets` SET `userid` = ' . $GLOBALS['db']->quote($data['user']['userid']) . ', `name` = ' . $GLOBALS['db']->quote($data['user']['name']) . ', `avatar` = ' . $GLOBALS['db']->quote($data['user']['avatar']) . ', `xp` = ' . $GLOBALS['db']->quote($data['user']['xp']) . ', `title` = ' . $GLOBALS['db']->quote($data['title']) . ', `department` = ' . $GLOBALS['db']->quote($data['department']) . ', `time` = ' . $GLOBALS['db']->quote(time()));
	$row2 = $sql2->execute();
	
	if(!$row2) return $callback('Unable to create a new ticket (2)'); //ERROR
	if($sql2->rowCount() <= 0) return $callback('Unable to create a new ticket (3)'); //ERROR
	
	$id = $GLOBALS['db']->lastInsertId();
	
	$sql3 = $GLOBALS['db']->prepare('INSERT INTO `support_receivers` SET `userid` = ' . $GLOBALS['db']->quote($receiver['userid']) . ', `name` = ' . $GLOBALS['db']->quote($receiver['name']) . ', `avatar` = ' . $GLOBALS['db']->quote($receiver['avatar']) . ', `xp` = ' . $GLOBALS['db']->quote($receiver['xp']) . ', `supportid` = ' . $GLOBALS['db']->quote($id) . ', `time` = ' . $GLOBALS['db']->quote(time()));
	$row3 = $sql3->execute();
	
	if(!$row3) return $callback('Unable to create a new ticket (4)'); //ERROR
	if($sql3->rowCount() <= 0) return $callback('Unable to create a new ticket (5)'); //ERROR
	
	$sql4 = $GLOBALS['db']->prepare('INSERT INTO `support_messages` SET `userid` = ' . $GLOBALS['db']->quote($data['user']['userid']) . ', `name` = ' . $GLOBALS['db']->quote($data['user']['name']) . ', `avatar` = ' . $GLOBALS['db']->quote($data['user']['avatar']) . ', `xp` = ' . $GLOBALS['db']->quote($data['user']['xp']) . ', `message` = ' . $GLOBALS['db']->quote($data['message']) . ', `supportid` = ' . $GLOBALS['db']->quote($id) . ', `time` = ' . $GLOBALS['db']->quote(time()));
	$row4 = $sql4->execute();
	
	if(!$row4) return $callback('Unable to create a new ticket (6)'); //ERROR
	if($sql4->rowCount() <= 0) return $callback('Unable to create a new ticket (7)'); //ERROR
	
	return $callback(null);
}

function support_replyTicket($data, $callback){
	if(strlen($data['message']) <= 0) return $callback('Invalid message. The message is required'); //ERROR
	
	$sql1 = $GLOBALS['db']->query('SELECT support_tickets.closed, support_tickets.userid AS `sender_userid`, support_receivers.userid AS `receiver_userid` FROM `support_tickets` INNER JOIN `support_receivers` ON support_tickets.id = support_receivers.supportid WHERE support_receivers.removed = 0 AND support_tickets.id = ' . $GLOBALS['db']->quote($data['id']));
	$row1 = $sql1->fetch(PDO::FETCH_ASSOC);
	
	if($sql1->rowCount() <= 0) return $callback('Unable to reply to ticket (1)'); //ERROR
	
	if($row1['sender_userid'] != $data['user']['userid'] && $row1['receiver_userid'] != $data['user']['userid'] && !in_array($GLOBALS['ranks_name'][$data['user']['rank']], $GLOBALS['support_allowed'])) return $callback('Unable to reply to ticket (2)'); //ERROR
	
	if(intval($row1['closed'])) return $callback('This ticket is closed'); //ERROR
	
	if($row1['receiver_userid'] == $data['user']['userid'] || in_array($GLOBALS['ranks_name'][$data['user']['rank']], $GLOBALS['support_allowed'])) $response = 1;
	
	$sql2 = $GLOBALS['db']->prepare('INSERT INTO `support_messages` SET `userid` = ' . $GLOBALS['db']->quote($data['user']['userid']) . ', `name` = ' . $GLOBALS['db']->quote($data['user']['name']) . ', `avatar` = '.$GLOBALS['db']->quote($data['user']['avatar']) . ', `xp` = '.$GLOBALS['db']->quote($data['user']['xp']) . ', `message` = ' . $GLOBALS['db']->quote($data['message']) . ', `supportid` = ' . $GLOBALS['db']->quote($data['id']) . ', `response` = ' . $GLOBALS['db']->quote($response) . ', `time` = ' . $GLOBALS['db']->quote(time()));
	$row2 = $sql2->execute();
	
	if(!$row2) return $callback('Unable to reply to ticket (3)'); //ERROR
	if($sql2->rowCount() <= 0) return $callback('Unable to reply to ticket (4)'); //ERROR
	
	return $callback(null);
}

function support_closeTicket($data, $callback){
	$sql1 = $GLOBALS['db']->query('SELECT support_tickets.closed, support_tickets.userid AS `sender_userid`, support_receivers.userid AS `receiver_userid` FROM `support_tickets` INNER JOIN `support_receivers` ON support_tickets.id = support_receivers.supportid WHERE support_receivers.removed = 0 AND support_tickets.id = ' . $GLOBALS['db']->quote($data['id']));
	$row1 = $sql1->fetch(PDO::FETCH_ASSOC);
	
	if($sql1->rowCount() <= 0) return $callback('Unable to close to ticket (1)'); //ERROR
	
	if($row1['sender_userid'] != $data['user']['userid'] && $row1['receiver_userid'] != $data['user']['userid'] && !in_array($GLOBALS['ranks_name'][$data['user']['rank']], $GLOBALS['support_allowed'])) return $callback('Unable to close to ticket (2)'); //ERROR
	
	if(intval($row1['closed'])) return $callback('This ticket is closed'); //ERROR
	
	$sql2 = $GLOBALS['db']->prepare('UPDATE `support_tickets` SET `closed` = 1 WHERE `id` = ' . $GLOBALS['db']->quote($data['id']));
	$row2 = $sql2->execute();
	
	if(!$row2) return $callback('Unable to close to ticket (3)'); //ERROR
	if($sql2->rowCount() <= 0) return $callback('Unable to close to ticket (4)'); //ERROR
	
	return $callback(null);
}

function support_redirectTicket($data, $callback){
	if($data['department'] < 0 || $data['department'] > 5) return $callback('Invalid department'); //ERROR
	
	$sql1 = $GLOBALS['db']->query('SELECT support_tickets.closed, support_tickets.userid AS `sender_userid`, support_receivers.userid AS `receiver_userid` FROM `support_tickets` INNER JOIN `support_receivers` ON support_tickets.id = support_receivers.supportid WHERE support_receivers.removed = 0 AND support_tickets.id = ' . $GLOBALS['db']->quote($data['id']));
	$row1 = $sql1->fetch(PDO::FETCH_ASSOC);
	
	if($sql1->rowCount() <= 0) return $callback('Unable to redirect to ticket (1)'); //ERROR
	
	if($row1['receiver_userid'] != $data['user']['userid'] && !in_array($GLOBALS['ranks_name'][$data['user']['rank']], $GLOBALS['support_allowed'])) return $callback('Unable to redirect to ticket (2)'); //ERROR
	
	if(intval($row1['closed'])) return $callback('This ticket is closed'); //ERROR
	
	if($data['department'] == 1 || $data['department'] == 2 || $data['department'] == 4 || $data['department'] == 5) {
		$sql2 = $GLOBALS['db']->query('SELECT `userid`, `name` FROM `users` WHERE `rank` = 1 || `rank` = 100');
	} else {
		$sql2 = $GLOBALS['db']->query('SELECT `userid`, `name` FROM `users` WHERE `rank` = 1 || `rank` = 2 || `rank` = 100');
	}
	
	if($sql2->rowCount() <= 0) return $callback('Unable to redirect a new ticket (3)'); //ERROR
	
	$row2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
	
	$receiver = $row2[rand(0, sizeof($row2) - 1)];
	if($receiver['userid'] == $data['user']['userid']) if(sizeof($row2) > 1) while($receiver['userid'] == $data['user']['userid']) $receiver = $row2[rand(0, sizeof($row2) - 1)];
	
	$message = 'I have gone ahead and sent your ticket to the proper department for further assistance.';
	
	$sql3 = $GLOBALS['db']->prepare('UPDATE `support_tickets` SET `department` = ' . $GLOBALS['db']->quote($data['department']) . ' WHERE `id` = ' . $GLOBALS['db']->quote($data['id']));
	$row3 = $sql3->execute();
	
	if(!$row3) return $callback('Unable to redirect a new ticket (4)'); //ERROR
	if($sql3->rowCount() <= 0) return $callback('Unable to redirect a new ticket (5)'); //ERROR
	
	$sql4 = $GLOBALS['db']->prepare('UPDATE `support_receivers` SET `removed` = 1 WHERE `supportid` = ' . $GLOBALS['db']->quote($data['id']));
	$row4 = $sql4->execute();
	
	if(!$row4) return $callback('Unable to redirect a new ticket (6)'); //ERROR
	if($sql4->rowCount() <= 0) return $callback('Unable to redirect a new ticket (7)'); //ERROR
	
	$sql5 = $GLOBALS['db']->prepare('INSERT INTO `support_receivers` SET `userid` = ' . $GLOBALS['db']->quote($receiver['userid']) . ', `name` = ' . $GLOBALS['db']->quote($receiver['name']) . ', `avatar` = ' . $GLOBALS['db']->quote($receiver['avatar']) . ', `xp` = ' . $GLOBALS['db']->quote($receiver['xp']) . ', `supportid` = ' . $GLOBALS['db']->quote($data['id']) . ', `time` = ' . $GLOBALS['db']->quote(time()));
	$row5 = $sql5->execute();
	
	if(!$row5) return $callback('Unable to redirect a new ticket (8)'); //ERROR
	if($sql5->rowCount() <= 0) return $callback('Unable to redirect a new ticket (9)'); //ERROR
	
	$sql6 = $GLOBALS['db']->prepare('INSERT INTO `support_messages` SET `userid` = ' . $GLOBALS['db']->quote($data['user']['userid']) . ', `name` = ' . $GLOBALS['db']->quote($data['user']['name']) . ', `avatar` = ' . $GLOBALS['db']->quote($data['user']['avatar']) . ', `xp` = ' . $GLOBALS['db']->quote($data['user']['xp']) . ', `message` = ' . $GLOBALS['db']->quote($message) . ', `supportid` = ' . $GLOBALS['db']->quote($data['id']) . ', `response` = 1, `time` = ' . $GLOBALS['db']->quote(time()));
	$row6 = $sql6->execute();
	
	if(!$row6) return $callback('Unable to redirect a new ticket (10)'); //ERROR
	if($sql6->rowCount() <= 0) return $callback('Unable to redirect a new ticket (11)'); //ERROR
	
	return $callback(null);
}

?>