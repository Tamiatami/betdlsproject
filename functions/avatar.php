<?php

function avatar_changeAvatar($data, $callback){
	$image = $data['image']['name'];

 if ($data['image']['size'] > 700000) return $callback('Image size is too big!');

	if(empty($image)) return $callback('No file provided');
	
	$extension = explode('.', $image)[1];
	
	$extensions_allowed = array('jpg', 'jpeg', 'png');
	if(!in_array($extension, $extensions_allowed)) return $callback('Extension not allowed');

	$code = generateHexCode(32);
	
	$image_tmp_name = $data['image']['tmp_name'];
	$image_name = $code . '.' . explode('.', $image)[1];
	$image_folder = '/var/www/html/avatars/' . $image_name;
	
	if(!move_uploaded_file($image_tmp_name, $image_folder)) return $callback('No file uploaded');
	
	$avatar = $GLOBALS['siteurl'] . $GLOBALS['root'] . 'avatars/' . $image_name;
	
	$sql1 = $GLOBALS['db']->prepare('UPDATE `users` SET `avatar` = ' . $GLOBALS['db']->quote($avatar) . ' WHERE `userid` = ' . $GLOBALS['db']->quote($data['userid']));
	$row1 = $sql1->execute();
	
	if(!$row1) return $callback('User save avatar unsuccessfully (1)'); //ERROR
	if($sql1->rowCount() <= 0) return $callback('User save avatar unsuccessfully (2)'); //ERROR
	
	return $callback(null);
}

?>