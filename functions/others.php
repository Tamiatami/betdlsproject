<?php

function createAvatarField($user, $type, $more){
	if($user['level'] >= 100) $level_class = 'tier-diamond';
	else if($user['level'] >= 75) $level_class = 'tier-gold';
	else if($user['level'] >= 50) $level_class = 'tier-silver';
	else if($user['level'] >= 25) $level_class = 'tier-bronze';
	else if($user['level'] >= 0) $level_class = 'tier-steel';
	
	$DIV = '<div class="avatar-field ' . $level_class . ' relative">';
		$DIV .= '<img class="avatar icon-' . $type . ' rounded-full" src="' . $user['avatar'] . '">';
		$DIV .= '<div class="level sup-' . $type . '-left flex justify-center items-center b-d2 bg-dark rounded-full">' . $user['level'] . '</div>';
		$DIV .= $more;
	$DIV .= '</div>';
	
	return $DIV;
}

function checkgrowid($growid){	
	//if(strlen($growid) <= 0) return "111";
							
	return $growid;
}

function roundedToFixed($number, $decimals) {
	$number = round($number, 5);
	
	$number_string = strval($number);
	$decimals_string = 0;
	
	if(isset(explode('.', $number_string)[1])) $decimals_string = strlen(explode('.', $number_string)[1]);
	
	while($decimals_string - $decimals > 0) {
		$number_string = substr($number_string, 0, -1);
		
		$decimals_string--;
	}
	
	return (float)$number_string;
}

function getFormatAmount($amount) {
	return roundedToFixed((float)$amount, 2);
}

function getFormatAmountString($amount) {
	return number_format(getFormatAmount($amount), 2, '.', ''); 
}

function makeDate($date){
	$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	
	$type_time = (date('G', $date) < 12) ? 'AM' : 'PM';
	
	return substr('0' . date('d', $date), -2) . ' ' . $months[(int)date('m', $date) - 1] . ' ' . date('Y', $date) . ', ' . substr('0' . (date('g', $date) % 12), -2) . ':' . substr('0' . date('i', $date), -2) . ' ' . $type_time;
}

function calculateLevel($xp){
	global $level_start, $level_next;
	
	$start = 0;
	$next = $level_start;
	
	$level = 0;
	
	for($i = 1; $next <= $xp && $level < 100; $i++){
		$start = $next;
		$next += intval($next * $level_next * (1.00 - 0.0095 * $level));
		
		$level++;
	}
	
	return array(
		'level' => $level,
		'start' => 0,
		'next' => $next - $start,
		'have' => (($xp > $next) ? $next : $xp) - $start
	);
}

function generateHexCode($length) {
    $text = '';
    $possible = 'abcdef0123456789';

    for($i = 0; $i < $length; $i++) $text .= $possible[rand(0, strlen($possible) - 1)];

    return $text;
}

function getUserIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    } elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
	
    return $ip;
}

function getUserDevice(){
    $device  = $_SERVER['HTTP_USER_AGENT'];
	
    return $device;
}

function getUserLocation($ip){
    $json = file_get_contents('http://ipinfo.io/' . $ip . '/geo');
	$json = json_decode($json, true);
	$country = $json['country'];
	$region = $json['region'];
	$city = $json['city'];
	
    return $city . ', ' . $region . ', ' . $country;
}

function getSiteUrl(){
	return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
}

function getSiteLink(){
	return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

?>