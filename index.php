

<?php
ini_set('display_errors', 'Off');



$default_page = 'roulette';

if (!isset($_GET['page'])) {
	header('location: ' . $root . $default_page);
	exit();
}

$paths_all = explode('/', $_GET['page']);
$paths = array();

foreach ($paths_all as $key => $path) if (!empty(trim($path))) array_push($paths, trim($path));

if (sizeof($paths) == 0 || empty($paths[0])) {
	header('location: ' . $root . $default_page);
	exit();
}

$page = $paths[0];

include 'sql.php';

include 'functions/others.php';

if (isset($_COOKIE['session'])) {
	$sql1 = $db->query('SELECT * FROM `users` INNER JOIN `users_sessions` ON users.userid = users_sessions.userid WHERE users_sessions.session = ' . $db->quote($_COOKIE['session']) . ' AND users_sessions.removed = 0 AND users_sessions.activated = 1 AND users_sessions.expire >= ' . $db->quote(time()));
	if ($sql1->rowCount() != 0) {
		$row1 = $sql1->fetch(PDO::FETCH_ASSOC);

		if ($_COOKIE['session'] == $row1['session']) $user = $row1;
	}
}

include 'config/config.php';

include 'functions/support.php';
include 'functions/auth.php';

include 'functions/avatar.php';

$sql2 = $db->prepare('INSERT INTO `users_visitors` SET `link` = ' . $db->quote(getSiteLink()) . ', `ip` = ' . $db->quote(getUserIp()) . ', `device` = ' . $GLOBALS['db']->quote(getUserDevice()) . ', `location` = ' . $db->quote(getUserLocation(getUserIp())) . ', `time` = ' . $db->quote(time()));
$row2 = $sql2->execute();

$array_page = array('user' => $user, 'site' => $site, 'profile' => $profile, 'rewards' => $rewards, 'affiliates' => $affiliates, 'paths' => $paths);

$sql_banip = $db->query('SELECT * FROM `bannedip` WHERE `ip` = ' . $db->quote(getUserIp()));
if ($sql_banip->rowCount() > 0 && !in_array($ranks_name[$user['rank']], $banip_excluded)) {
	$page_request = getTemplate('Your IP is banned.', 'empty');
	echo $page_request;
	exit();
}

if ($sql_maintenance->rowCount() > 0 && !in_array($ranks_name[$user['rank']], $maintenance_excluded) && !($page == 'auth' && in_array($paths[1], array('login', 'logout', 'register', 'steam', 'google', 'facebook', 'logout')))) {
	$page_request = getTemplate($names_pages['maintenance'], 'maintenance', $array_page, array('response' => array('maintenance' => array('reason' => $row_maintenance['reason'])))); //MAINTENANCE
	echo $page_request;
	exit();
}

$sql_bansite = $db->query('SELECT users_restrictions.reason, users_restrictions.expire, users.name FROM `users_restrictions` INNER JOIN `users` ON users_restrictions.byuserid = users.userid WHERE users_restrictions.restriction = "site" AND users_restrictions.removed = 0 AND (users_restrictions.expire = -1 OR users_restrictions.expire > ' . $db->quote(time()) . ') AND users_restrictions.userid = ' . $db->quote($user['userid']));
if ($sql_bansite->rowCount() > 0 && !in_array($ranks_name[$user['rank']], $ban_excluded) && $page != 'support' && $page != 'tos') {
	$row_bansite = $sql_bansite->fetch(PDO::FETCH_ASSOC);

	$page_request = getTemplatePage($names_pages['banned'], $page, 'banned', $array_page, array('response' => array('ban' => array('name' => $row_bansite['name'], 'reason' => $row_bansite['reason'], 'expire' => $row_bansite['expire'])))); //BANNED
	echo $page_request;
	exit();
}

switch ($page) {
	case 'r':
		if ($user) exit(json_encode(array('success' => false, 'error' => 'User logged in')));
		
		$sql_code = $db->query('SELECT * FROM `referral_uses` WHERE `userid` = ' . $db->quote($user['userid']));
		if ($sql_code->rowCount() > 0) exit(json_encode(array('success' => false, 'error' => 'A code already redeemed')));
		
		if(!isset($paths[1])) exit(json_encode(array('success' => false, 'error' => 'Invalid user id')));
		$userid = $paths[1];
		
		$sql_user = $db->query('SELECT * FROM `users` WHERE `userid` = ' . $db->quote($userid));
		if ($sql_user->rowCount() <= 0) exit(json_encode(array('success' => false, 'error' => 'Invalid user id')));
		
		$sql_referral = $db->query('SELECT * FROM `referral_codes` WHERE `userid` = ' . $db->quote($user['userid']));
		if ($sql_referral->rowCount() <= 0) exit(json_encode(array('success' => false, 'error' => 'Invalid user id')));
		
		$row_referral = $sql_referral->fetch(PDO::FETCH_ASSOC);
		
		session_start();
		$_SESSION['referral'] = $row_referral['code'];
		
		header('location: ' . $root);
		
		return;
	
	case 'avatar':
		if (!$user) exit(json_encode(array('success' => false, 'error' => 'User not logged in')));
		
		avatar_changeAvatar(array('userid' => $user['userid'], 'image' => $_FILES['image']), function($err1) {
			if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

			exit(json_encode(array('success' => true, 'message' => array('message' => 'Avatar successfully changed!'))));
		});
		
		return;
	
	case 'admin':
		if (!in_array($user['userid'], $site['access']['admin'])) break;

		if (!isset($paths[1])) {
			header('location: ' . $root . 'admin/control');
			exit();
		}

		$location = $page;

		switch ($paths[1]) {
			case 'control':
				$response = array();

				$maintenance = array('status' => $sql_maintenance->rowCount() > 0);
				if ($sql_maintenance->rowCount() > 0) $maintenance['reason'] = $row_maintenance['reason'];

				$response['settings'] = array_merge($settings_json_decoded, array('maintenance' => $maintenance));

				$location .= '_control';

				break;

			case 'users':
				$response = array();

				if (isset($paths[2])) {
					$sql_user = $db->query('SELECT * FROM `users` WHERE `userid` = ' . $db->quote($paths[2]));

					if ($sql_user->rowCount() <= 0) {
						header('location: ' . $root . 'admin/users');
						exit();
					}

					$row_user = $sql_user->fetch(PDO::FETCH_ASSOC);

					$response['user'] = array('profile' => $row_user);

					$sql_binds = $db->query('SELECT `bind`, `bindid` FROM `users_binds` WHERE `removed` = 0 AND `userid` = ' . $db->quote($paths[2]));
					$row_binds = $sql_binds->fetchAll(PDO::FETCH_ASSOC);

					$user_binds = array(
						'google' => array('bind' => false),
						'facebook' => array('bind' => false),
						'steam' => array('bind' => false)
					);
					foreach ($row_binds as $key => $value) {
						$user_binds[$value['bind']] = array('bind' => true, 'bindid' => $value['bindid']);
					}

					$response['user']['binds'] = $user_binds;

					$sql_restrictions = $db->query('SELECT `restriction`, `reason`, `expire` FROM `users_restrictions` WHERE `removed` = 0 AND (`expire` = -1 OR `expire` > ' . $db->quote(time()) . ') AND `userid` = ' . $db->quote($paths[2]));
					$row_restrictions = $sql_restrictions->fetchAll(PDO::FETCH_ASSOC);

					$user_restrictions = array(
						'play' => array('active' => false),
						'trade' => array('active' => false),
						'site' => array('active' => false),
						'mute' => array('active' => false)
					);
					foreach ($row_restrictions as $key => $value) {
						$user_restrictions[$value['restriction']] = array('active' => true, 'expire' => $value['expire']);
					}

					$response['user']['restrictions'] = $user_restrictions;

					$sql_ips = $db->query('SELECT DISTINCT `ip` FROM `users_logins` WHERE `userid` = ' . $db->quote($paths[2]) . ' ORDER BY `id` DESC LIMIT 5');
					$row_ips = $sql_ips->fetchAll(PDO::FETCH_ASSOC);

					$ips = array();
					foreach ($row_ips as $key => $value) {
						array_push($ips, $value['ip']);
					}

					$response['user']['ips'] = $ips;

					$sql_bannedips = $db->query('SELECT DISTINCT bannedip.ip FROM `bannedip` INNER JOIN `users_logins` ON bannedip.ip = users_logins.ip WHERE users_logins.userid = ' . $db->quote($paths[2]) . ' AND bannedip.removed = 0');
					$row_bannedips = $sql_bannedips->fetchAll(PDO::FETCH_ASSOC);

					$bannedips = array();
					foreach ($row_bannedips as $key => $value) {
						array_push($bannedips, $value['ip']);
					}

					$response['user']['bannedips'] = $bannedips;
				}

				$sql_users_list = $db->query('SELECT `userid`, `name`, `avatar`, `xp`,  `balance`, `rank`, `time_create` FROM `users` ORDER BY `id` ASC LIMIT 10');
				$row_users_list = $sql_users_list->fetchAll(PDO::FETCH_ASSOC);

				$sql_users_count = $db->query('SELECT COUNT(*) AS `count` FROM `users`');
				$row_users_count = $sql_users_count->fetch(PDO::FETCH_ASSOC);

				$users_count = intval($row_users_count['count'] / 10) + (($row_users_count['count'] % 10) > 0 ? 1 : 0);
				if ($users_count <= 0) $users_count = 1;

				$response['users'] = array('list' => $row_users_list, 'pages' => $users_count, 'page' => 1);

				$location .= '_users';

				break;

			case 'trades':
				$response = array();

				$maintenance = array('status' => $sql_maintenance->rowCount() > 0);
				if ($sql_maintenance->rowCount() > 0) $maintenance['reason'] = $row_maintenance['reason'];

				$response['settings'] = $settings_json_decoded;

				$sql_crypto_list = $db->query('SELECT `id`, `userid`, `amount`, `currency`, `time` FROM `crypto_listings` WHERE `confirmed` = 0 AND `canceled` = 0 ORDER BY `id` ASC LIMIT 10');
				$row_crypto_list = $sql_crypto_list->fetchAll(PDO::FETCH_ASSOC);

				$sql_crypto_count = $db->query('SELECT COUNT(*) AS `count` FROM `crypto_listings` WHERE `confirmed` = 0 AND `canceled` = 0');
				$row_crypto_count = $sql_crypto_count->fetch(PDO::FETCH_ASSOC);

				$crypto_count = intval($row_crypto_count['count'] / 10) + (($row_crypto_count['count'] % 10) > 0 ? 1 : 0);
				if ($crypto_count <= 0) $crypto_count = 1;
				
				
				$sql_dl_withdraw_automatically_list = $db->query('SELECT `id`, `userid`, `amount`, `time` FROM `dl_listings` WHERE `confirmed` = 0 AND `canceled` = 0 ORDER BY `id` ASC LIMIT 10');
				$row_dl_withdraw_automatically_list = $sql_dl_withdraw_automatically_list->fetchAll(PDO::FETCH_ASSOC);

				$sql_dl_withdraw_automatically_count = $db->query('SELECT COUNT(*) AS `count` FROM `dl_listings` WHERE `confirmed` = 0 AND `canceled` = 0');
				$row_dl_withdraw_automatically_count = $sql_dl_withdraw_automatically_count->fetch(PDO::FETCH_ASSOC);

				$dl_withdraw_automatically_count = intval($row_dl_withdraw_automatically_count['count'] / 10) + (($row_dl_withdraw_automatically_count['count'] % 10) > 0 ? 1 : 0);
				if ($dl_withdraw_automatically_count <= 0) $dl_withdraw_automatically_count = 1;

				$response['dl_withdraw_automatically'] = array('list' => $row_dl_withdraw_automatically_list, 'pages' => $dl_withdraw_automatically_count, 'page' => 1);
				
				
				$sql_dl_withdraw_manually_list = $db->query('SELECT `id`, `userid`, `world`, `growid`, `method`, `amount`, `time` FROM `dl_withdrawls_manually` WHERE `status` = 0 ORDER BY `id` ASC LIMIT 10');
				$row_dl_withdraw_manually_list = $sql_dl_withdraw_manually_list->fetchAll(PDO::FETCH_ASSOC);

				$sql_dl_withdraw_manually_count = $db->query('SELECT COUNT(*) AS `count` FROM `dl_withdrawls_manually` WHERE `status` = 0');
				$row_dl_withdraw_manually_count = $sql_dl_withdraw_manually_count->fetch(PDO::FETCH_ASSOC);

				$dl_withdraw_manually_count = intval($row_dl_withdraw_manually_count['count'] / 10) + (($row_dl_withdraw_manually_count['count'] % 10) > 0 ? 1 : 0);
				if ($dl_withdraw_manually_count <= 0) $dl_withdraw_manually_count = 1;

				$response['dl_withdraw_manually'] = array('list' => $row_dl_withdraw_manually_list, 'pages' => $dl_withdraw_manually_count, 'page' => 1);
				
				
				$sql_dl_licenses_list = $db->query('SELECT `license`, `amount` FROM `dl_licenses` WHERE `removed` = 0 AND `used` = 0 ORDER BY `id` ASC LIMIT 10');
				$row_dl_licenses_list = $sql_dl_licenses_list->fetchAll(PDO::FETCH_ASSOC);

				$sql_dl_licenses_count = $db->query('SELECT COUNT(*) AS `count` FROM `dl_licenses` WHERE `removed` = 0 AND `used` = 0');
				$row_dl_licenses_count = $sql_dl_licenses_count->fetch(PDO::FETCH_ASSOC);

				$dl_licenses_count = intval($row_dl_licenses_count['count'] / 10) + (($row_dl_licenses_count['count'] % 10) > 0 ? 1 : 0);
				if ($dl_licenses_count <= 0) $dl_licenses_count = 1;

				$response['dl_licenses'] = array('list' => $row_dl_licenses_list, 'pages' => $dl_licenses_count, 'page' => 1);

				$location .= '_trades';

				break;
		}

		$page_request = getTemplatePage($names_pages[$page], $page, $location, $array_page, array('response' => $response));
		echo $page_request;
		return;

	case 'dashboard':
		if (!in_array($user['userid'], $site['access']['dashboard'])) break;

		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page);
		echo $page_request;
		return;

	case 'home':
		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page);
		echo $page_request;
		return;

	case 'affiliates':
		$response_affiliates = array();

		$sql_referral = $db->query('SELECT * FROM `referral_codes` WHERE `userid` = ' . $db->quote($user['userid']));
		if ($sql_referral->rowCount() > 0) {
			$row_referral = $sql_referral->fetch(PDO::FETCH_ASSOC);

			$response_affiliates['collected'] = $row_referral['collected'];
			$response_affiliates['available'] = $row_referral['available'];
		}

		$response_affiliates['commission_wagered'] = 0;
		$response_affiliates['commission_deposited'] = 0;
		$response_affiliates['deposited'] = 0;

		$sql_deposited = $db->query('SELECT COALESCE(SUM(referral_deposited.amount), 0) AS `amount` FROM `referral_uses` INNER JOIN `referral_deposited` ON referral_uses.userid = referral_deposited.userid WHERE referral_deposited.referral = ' . $db->quote($user['userid']));
		if ($sql_deposited->rowCount() > 0) {
			$row_deposited = $sql_deposited->fetch(PDO::FETCH_ASSOC);

			$response_affiliates['deposited'] = $row_deposited['amount'];
		}

		$sql_affiliates_deposited = $db->query('SELECT COALESCE(SUM(referral_deposited.amount), 0) AS `amount`, COALESCE(SUM(referral_deposited.commission), 0) AS `commission`, referral_uses.userid FROM `referral_uses` LEFT JOIN `referral_deposited` ON referral_uses.userid = referral_deposited.userid WHERE referral_uses.referral = ' . $db->quote($user['userid']) . ' AND COALESCE(referral_deposited.referral, ' . $db->quote($user['userid']) . ') = ' . $db->quote($user['userid']) . ' GROUP BY referral_uses.userid ORDER BY `amount` DESC');
		$sql_affiliates_wagered = $db->query('SELECT COALESCE(SUM(referral_wagered.amount), 0) AS `amount`, COALESCE(SUM(referral_wagered.commission), 0) AS `commission`, referral_uses.userid FROM `referral_uses` LEFT JOIN `referral_wagered` ON referral_uses.userid = referral_wagered.userid WHERE referral_uses.referral = ' . $db->quote($user['userid']) . ' AND COALESCE(referral_wagered.referral, ' . $db->quote($user['userid']) . ') = ' . $db->quote($user['userid']) . ' GROUP BY referral_uses.userid ORDER BY `amount` DESC');
		$row_affiliates_deposited = $sql_affiliates_deposited->fetchAll(PDO::FETCH_ASSOC);
		$row_affiliates_wagered = $sql_affiliates_wagered->fetchAll(PDO::FETCH_ASSOC);

		$response_affiliates['referrals'] = array('list' => array(), 'pages' => 1, 'page' => 1, 'total' => 0);
		
		foreach ($row_affiliates_deposited as $key => $value) {
			$response_affiliates['referrals']['list'][$value['userid']]['userid'] = $value['userid'];
			$response_affiliates['referrals']['list'][$value['userid']]['deposited'] = $value['amount'];
			$response_affiliates['referrals']['list'][$value['userid']]['commission_deposited'] = $value['commission'];

			$response_affiliates['commission_deposited'] += $value['commission'];
		}

		foreach ($row_affiliates_wagered as $key => $value) {
			$response_affiliates['referrals']['list'][$value['userid']]['userid'] = $value['userid'];
			$response_affiliates['referrals']['list'][$value['userid']]['wagered'] = $value['amount'];
			$response_affiliates['referrals']['list'][$value['userid']]['commission_wagered'] = $value['commission'];

			$response_affiliates['commission_wagered'] += $value['commission'];
		}

		usort($response_affiliates['referrals']['list'], function ($first, $second) {
			return ($first['commission_deposited'] + $first['commission_wagered'] < $second['commission_deposited'] + $second['commission_wagered']);
		});
		
		$sql_affiliates_total = $db->query('SELECT COALESCE(COUNT(referral_uses.id), 0) AS `count` FROM `referral_uses` WHERE referral = ' . $db->quote($user['userid']));
		$row_affiliates_total = $sql_affiliates_total->fetch(PDO::FETCH_ASSOC);
		
		$response_affiliates['referrals']['total'] = intval($row_affiliates_total['count']);
		
		$affiliates_count = intval($response_affiliates['referrals']['total'] / 10) + (($response_affiliates['referrals']['total'] % 10) > 0 ? 1 : 0);
		if ($affiliates_count <= 0) $affiliates_count = 1;
		
		$response_affiliates['referrals']['pages'] = $affiliates_count;
		
		$response_affiliates['referrals']['list'] = array_slice($response_affiliates['referrals']['list'], 0, 10);

		$response['affiliates'] = $response_affiliates;

		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page, array('response' => $response));
		echo $page_request;
		return;

	case 'roulette':
		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page);
		echo $page_request;
		return;

	case 'crash':
		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page);
		echo $page_request;
		return;

	case 'jackpot':
		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page);
		echo $page_request;
		return;

	case 'coinflip':
		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page);
		echo $page_request;
		return;

	case 'unbox':
		$location = $page;
		$name_page = $names_pages[$page];

		if (isset($paths[1])) {
			$location .= '_case';

			$name_page = ucwords(implode(' ', explode('_', $paths[1])));
		}

		$page_request = getTemplatePage($name_page, $page, $location, $array_page);
		echo $page_request;
		return;

	case 'tower':
		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page);
		echo $page_request;
		return;

	case 'leaderboard':
		$total = 20;

		$sql_leaderboard = $db->query('SELECT users.userid, users.name, users.avatar, (SELECT SUM(amount) FROM `users_transactions` WHERE users_transactions.userid = users.userid AND `amount` > 0 GROUP BY users_transactions.userid) AS `winnings`, (SELECT SUM(amount) FROM `users_transactions` WHERE users_transactions.userid = users.userid AND `amount` < 0 GROUP BY users_transactions.userid) AS `bets`, (SELECT COUNT(users_transactions.userid) FROM `users_transactions` WHERE users_transactions.userid = users.userid AND `amount` < 0 GROUP BY users_transactions.userid) AS `games` FROM `users` INNER JOIN `users_transactions` ON users.userid = users_transactions.userid WHERE users.userid IN (SELECT users_transactions.userid FROM (SELECT users_transactions.userid, SUM(amount) AS `profit` FROM `users_transactions` WHERE `amount` < 0 GROUP BY users_transactions.userid ORDER BY `profit` ASC LIMIT ' . $total . ') AS `profit_tabel`) AND users_transactions.amount < 0 GROUP BY users.userid ORDER BY `bets` ASC');
		$row_leaderboard = $sql_leaderboard->fetchAll(PDO::FETCH_ASSOC);

		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page, array('response' => array('leaderboard' => $row_leaderboard)));
		echo $page_request;
		return;

	case 'profile':
		if (!$user && !isset($paths[1])) {
			$page_request = getTemplatePage($names_pages[$page], $page, 'login', $array_page);
			echo $page_request;
			return;
		}

		$userid = $user['userid'];
		$user_profile = $user;

		if (isset($paths[1])) $userid = $paths[1];

		$sql_user = $db->query('SELECT * FROM `users` WHERE `userid` = ' . $db->quote($userid));
		if ($sql_user->rowCount() > 0) {
			$user_profile = $sql_user->fetch(PDO::FETCH_ASSOC);
		} else {
			header('location: ' . $root);
			exit();
		}

		$response = array();
		$response['looking'] = isset($paths[1]);
		$response['profile'] = $user_profile;
		
		$sql_growid = $db->query('SELECT * FROM `users_growid` WHERE `userid` = ' . $db->quote($userid) . ' AND `removed` = 0 ORDER BY `id` DESC LIMIT 1');
		$row_growid = $sql_growid->fetch(PDO::FETCH_ASSOC);
		
		if($sql_growid->rowCount() > 0) {
			$response['profile']['growid'] = $row_growid['growid'];
		}

		//USER STATS
		if (in_array($ranks_name[$user['rank']], $profile_allowed) || !$response['profile']['private'] || !$response['looking']) {
			$sql_winnings = $db->query('SELECT SUM(`amount`) AS `total` FROM `users_transactions` WHERE `userid` = ' . $db->quote($userid) . ' AND `amount` > 0');
			$row_winnings = $sql_winnings->fetch(PDO::FETCH_ASSOC);

			$sql_bets = $db->query('SELECT SUM(`amount`) AS `total` FROM `users_transactions` WHERE `userid` = ' . $db->quote($userid) . ' AND `amount` < 0');
			$row_bets = $sql_bets->fetch(PDO::FETCH_ASSOC);

			$user_stats = array('win' => abs($row_winnings['total']), 'bet' => abs($row_bets['total']));

			$response['user_stats'] = $user_stats;
		}

		//USER TRANSFERS
		if (in_array($ranks_name[$user['rank']], $profile_allowed) || !$response['looking']) {
			$sql_user_transfers_list = $db->query('SELECT `id`, `from_userid`, `to_userid`, `amount`, `time` FROM `users_transfers` WHERE `to_userid` = ' . $db->quote($userid) . ' OR `from_userid` = ' . $db->quote($userid) . ' ORDER BY `id` DESC LIMIT 10');
			$row_user_transfers_list = $sql_user_transfers_list->fetchAll(PDO::FETCH_ASSOC);

			$sql_user_transfers_count = $db->query('SELECT COUNT(*) AS `count` FROM `users_transfers`  WHERE `to_userid` = ' . $db->quote($userid) . ' OR `from_userid` = ' . $db->quote($userid));
			$row_user_transfers_count = $sql_user_transfers_count->fetch(PDO::FETCH_ASSOC);

			$user_transfers_count = intval($row_user_transfers_count['count'] / 10) + (($row_user_transfers_count['count'] % 10) > 0 ? 1 : 0);
			if ($user_transfers_count <= 0) $user_transfers_count = 1;

			$response['user_transfers'] = array('list' => $row_user_transfers_list, 'pages' => $user_transfers_count, 'page' => 1);
		}

		//DIAMOND LOCKS AUTOMATICALLY TRANSACTIONS
		if (in_array($ranks_name[$user['rank']], $profile_allowed) || !$response['looking']) {
			$sql_dl_withdrawls_list = $db->query('SELECT `id`, `amount`, `license`, `time` FROM `dl_withdrawls_automatically` WHERE `userid` = ' . $db->quote($userid) . ' ORDER BY `id` DESC LIMIT 10');
			$row_dl_withdrawls_list = $sql_dl_withdrawls_list->fetchAll(PDO::FETCH_ASSOC);

			$sql_dl_withdrawls_count = $db->query('SELECT COUNT(*) AS `count` FROM `dl_withdrawls_automatically` WHERE `userid` = ' . $db->quote($userid));
			$row_dl_withdrawls_count = $sql_dl_withdrawls_count->fetch(PDO::FETCH_ASSOC);

			$dl_withdrawls_count = intval($row_dl_withdrawls_count['count'] / 10) + (($row_dl_withdrawls_count['count'] % 10) > 0 ? 1 : 0);
			if ($dl_withdrawls_count <= 0) $dl_withdrawls_count = 1;

			$response['dl_automatically_withdrawls'] = array('list' => $row_dl_withdrawls_list, 'pages' => $dl_withdrawls_count, 'page' => 1);
		}

		//DIAMOND LOCKS MALUALLY TRANSACTIONS
		if (in_array($ranks_name[$user['rank']], $profile_allowed) || !$response['looking']) {
			$sql_dl_withdrawls_list = $db->query('SELECT `id`, `world`, `growid`, `method`, `amount`, `status`, `time` FROM `dl_withdrawls_manually` WHERE `userid` = ' . $db->quote($userid) . ' ORDER BY `id` DESC LIMIT 10');
			$row_dl_withdrawls_list = $sql_dl_withdrawls_list->fetchAll(PDO::FETCH_ASSOC);

			$sql_dl_withdrawls_count = $db->query('SELECT COUNT(*) AS `count` FROM `dl_withdrawls_manually` WHERE `userid` = ' . $db->quote($userid));
			$row_dl_withdrawls_count = $sql_dl_withdrawls_count->fetch(PDO::FETCH_ASSOC);

			$dl_withdrawls_count = intval($row_dl_withdrawls_count['count'] / 10) + (($row_dl_withdrawls_count['count'] % 10) > 0 ? 1 : 0);
			if ($dl_withdrawls_count <= 0) $dl_withdrawls_count = 1;

			$response['dl_manually_withdrawls'] = array('list' => $row_dl_withdrawls_list, 'pages' => $dl_withdrawls_count, 'page' => 1);
		}

		//DIAMOND LOCKS DEPOSITS TRANSACTIONS
		if (in_array($ranks_name[$user['rank']], $profile_allowed) || !$response['looking']) {
			$sql_dl_deposits_list = $db->query('SELECT `id`, `inspected`, `world`, `growid`, `amount`, `time` FROM `dl_deposits` WHERE `userid` = ' . $db->quote($userid) . ' ORDER BY `id` DESC LIMIT 10');
			$row_dl_deposits_list = $sql_dl_deposits_list->fetchAll(PDO::FETCH_ASSOC);

			$sql_dl_deposits_count = $db->query('SELECT COUNT(*) AS `count` FROM `dl_deposits` WHERE `userid` = ' . $db->quote($userid));
			$row_dl_deposits_count = $sql_dl_deposits_count->fetch(PDO::FETCH_ASSOC);

			$dl_deposits_count = intval($row_dl_deposits_count['count'] / 10) + (($row_dl_deposits_count['count'] % 10) > 0 ? 1 : 0);
			if ($dl_deposits_count <= 0) $dl_deposits_count = 1;

			$response['dl_transactions_deposit'] = array('list' => $row_dl_deposits_list, 'pages' => $dl_deposits_count, 'page' => 1);
		}

		//CRYPTO TRANSACTIONS
		if (in_array($ranks_name[$user['rank']], $profile_allowed) || !$response['looking']) {
			$sql_crypto_transactions_list = $db->query('SELECT `id`, `status`, `txnid`, `amount`, `type`, `currency`, `time` FROM `crypto_transactions` WHERE `userid` = ' . $db->quote($userid) . ' ORDER BY `id` DESC LIMIT 10');
			$row_crypto_transactions_list = $sql_crypto_transactions_list->fetchAll(PDO::FETCH_ASSOC);

			$sql_crypto_transactions_count = $db->query('SELECT COUNT(*) AS `count` FROM `crypto_transactions` WHERE `userid` = ' . $db->quote($userid));
			$row_crypto_transactions_count = $sql_crypto_transactions_count->fetch(PDO::FETCH_ASSOC);

			$crypto_transactions_count = intval($row_crypto_transactions_count['count'] / 10) + (($row_crypto_transactions_count['count'] % 10) > 0 ? 1 : 0);
			if ($crypto_transactions_count <= 0) $crypto_transactions_count = 1;

			$response['crypto_transactions'] = array('list' => $row_crypto_transactions_list, 'pages' => $crypto_transactions_count, 'page' => 1);
		}

		//USER GAMES STATS
		if (in_array($ranks_name[$user['rank']], $profile_allowed) || !$response['profile']['private'] || !$response['looking']) {
			$sql_games_stats = $db->query('SELECT SUM(amount) AS `total`, `service` FROM `users_transactions` WHERE `service` IN ("roulette_bet", "roulette_win", "crash_bet", "crash_win", "jackpot_bet", "jackpot_win", "coinflip_bet", "coinflip_win", "coinflip_refund", "unbox_bet", "unbox_win", "tower_bet", "tower_win") AND `userid` = ' . $db->quote($userid) . ' GROUP BY `service`');
			$row_games_stats = $sql_games_stats->fetchAll(PDO::FETCH_ASSOC);

			$games_stats = array();
			foreach ($row_games_stats as $key => $value) {
				$service = explode('_', $value['service']);

				if (!isset($games_stats[$service[0]])) $games_stats[$service[0]] = array('bet' => 0, 'win' => 0, 'refund' => 0);

				$games_stats[$service[0]][$service[1]] = abs($value['total']);
			}

			$response['games_stats'] = $games_stats;
		}

		//USER OFFERS STATS
		if (!$response['profile']['private'] || !$response['looking']) {
			$sql_offers_stats = $db->query('SELECT SUM(amount) AS `total`, COUNT(amount) AS `count`, `type` FROM `users_trades` WHERE `userid` = ' . $db->quote($userid) . ' GROUP BY `type`');
			$row_offers_stats = $sql_offers_stats->fetchAll(PDO::FETCH_ASSOC);

			$offers_stats = array(
				'deposit' => array('count' => 0, 'total' => 0),
				'withdraw' => array('count' => 0, 'total' => 0)
			);
			foreach ($row_offers_stats as $key => $value) {
				$offers_stats[$value['type']] = array('count' => $value['count'], 'total' => $value['total']);
			}

			$response['offers_stats'] = $offers_stats;
		}

		//USER TRANSACTIONS
		if (in_array($ranks_name[$user['rank']], $profile_allowed) || !$response['looking']) {
			$sql_user_transactions_list = $db->query('SELECT `id`, `service`, `amount`, `time` FROM `users_transactions` WHERE `userid` = ' . $db->quote($userid) . ' ORDER BY `id` DESC LIMIT 10');
			$row_user_transactions_list = $sql_user_transactions_list->fetchAll(PDO::FETCH_ASSOC);

			$balance = 0;
			if ($sql_user_transactions_list->rowCount() > 0) {
				if (array_reverse($row_user_transactions_list)[0]['id'] > 0) {
					$sql8 = $db->query('SELECT SUM(amount) AS `balance` FROM `users_transactions` WHERE `userid` = ' . $db->quote($userid) . ' AND `id` < ' . array_reverse($row_user_transactions_list)[0]['id']);
					$row8 = $sql8->fetch(PDO::FETCH_ASSOC);

					$balance = floatval($row8['balance']);
				}
			}

			$user_transactions_list = array();
			foreach (array_reverse($row_user_transactions_list) as $key => $value) {
				array_push($user_transactions_list, array(
					'id' => $value['id'],
					'service' => $value['service'],
					'balance' => $balance,
					'amount' => $value['amount'],
					'time' => $value['time']
				));

				$balance += floatval($value['amount']);
			}

			$user_transactions_list = array_reverse($user_transactions_list);

			$sql_user_transactions_count = $db->query('SELECT COUNT(*) AS `count` FROM `users_transactions` WHERE `userid` = ' . $db->quote($userid));
			$row_user_transactions_count = $sql_user_transactions_count->fetch(PDO::FETCH_ASSOC);

			$user_transactions_count = intval($row_user_transactions_count['count'] / 10) + (($row_user_transactions_count['count'] % 10) > 0 ? 1 : 0);
			if ($user_transactions_count <= 0) $user_transactions_count = 1;

			$response['user_transactions'] = array('list' => $user_transactions_list, 'pages' => $user_transactions_count, 'page' => 1);
		}

		//BINDS
		if (in_array($ranks_name[$user['rank']], $profile_allowed) || !$response['looking']) {
			$sql_binds = $db->query('SELECT `bind`, `bindid` FROM `users_binds` WHERE `removed` = 0 AND `userid` = ' . $db->quote($userid));
			$row_binds = $sql_binds->fetchAll(PDO::FETCH_ASSOC);

			$user_binds = array(
				'google' => array('bind' => false),
				'facebook' => array('bind' => false),
				'steam' => array('bind' => false)
			);
			foreach ($row_binds as $key => $value) {
				$user_binds[$value['bind']] = array('bind' => true, 'bindid' => $value['bindid']);
			}

			$response['user_binds'] = $user_binds;
		}

		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page, array('response' => $response));
		echo $page_request;
		return;

	case 'rewards':
		if (!$user) {
			$page_request = getTemplatePage($names_pages[$page], $page, 'login', $array_page);
			echo $page_request;
			return;
		}

		$response = array();
		$response['rewards'] = array();

		$response['rewards']['amounts'] = $rewards_amounts;

		$response['rewards']['referral_have'] = 0;

		$sql_referral = $db->query('SELECT * FROM `referral_codes` WHERE `userid` = ' . $db->quote($user['userid']));
		if ($sql_referral->rowCount() > 0) {
			$row_referral = $sql_referral->fetch(PDO::FETCH_ASSOC);

			$response['rewards']['referral_have'] = 1;
			$response['rewards']['referral_code'] = $row_referral['code'];
		}

		$sql_code = $db->query('SELECT * FROM `referral_uses` WHERE `userid` = ' . $db->quote($user['userid']));
		$response['rewards']['collected_code'] = 0;

		if ($sql_code->rowCount() > 0) {
			$row_code = $sql_code->fetch(PDO::FETCH_ASSOC);

			$response['rewards']['collected_code'] = 1;

			$sql_referral_owner = $db->query('SELECT * FROM `users` WHERE `userid` = ' . $db->quote($row_code['referral']));
			$row_referral_owner = $sql_referral_owner->fetch(PDO::FETCH_ASSOC);

			$response['rewards']['referral_owner'] = $row_referral_owner['name'];
		}

		$sql_bind_google = $db->query('SELECT * FROM `users_rewards` WHERE `reward` = ' . $db->quote('google') . ' AND `userid` = ' . $db->quote($user['userid']));
		$sql_bind_facebook = $db->query('SELECT * FROM `users_rewards` WHERE `reward` = ' . $db->quote('facebook') . ' AND `userid` = ' . $db->quote($user['userid']));
		$sql_bind_steam = $db->query('SELECT * FROM `users_rewards` WHERE `reward` = ' . $db->quote('steam') . ' AND `userid` = ' . $db->quote($user['userid']));

		$sql_name = $db->query('SELECT * FROM `users_rewards` WHERE `reward` = ' . $db->quote('name') . ' AND `userid` = ' . $db->quote($user['userid']));
		$sql_group = $db->query('SELECT * FROM `users_rewards` WHERE `reward` = ' . $db->quote('group') . ' AND `userid` = ' . $db->quote($user['userid']));

		$response['rewards']['collected_google'] = $sql_bind_google->rowCount();
		$response['rewards']['collected_facebook'] = $sql_bind_facebook->rowCount();
		$response['rewards']['collected_steam'] = $sql_bind_steam->rowCount();

		$response['rewards']['collected_name'] = $sql_name->rowCount();
		$response['rewards']['collected_group'] = $sql_group->rowCount();

		//BINDS
		$sql_binds = $db->query('SELECT `bind`, `bindid` FROM `users_binds` WHERE `removed` = 0 AND `userid` = ' . $db->quote($user['userid']));
		$row_binds = $sql_binds->fetchAll(PDO::FETCH_ASSOC);

		$user_binds = array(
			'google' => array('bind' => false),
			'facebook' => array('bind' => false),
			'steam' => array('bind' => false)
		);
		foreach ($row_binds as $key => $value) {
			$user_binds[$value['bind']] = array('bind' => true, 'bindid' => $value['bindid']);
		}

		$response['user_binds'] = $user_binds;

		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page,  array('response' => $response));
		echo $page_request;
		return;

	case 'deposit':
		if (!$user) {
			$page_request = getTemplatePage($names_pages[$page], $page, 'login', $array_page);
			echo $page_request;
			return;
		}
		$location = $page;

		if (isset($paths[1])) {
			switch ($paths[1]) {
				case 'currency':
					if (isset($paths[2])) {
						$methodes = array('btc', 'eth', 'ltc', 'bch', 'paypal');
						if (in_array($paths[2], $methodes)) {
							$crypto_addresses = array('BTC' => null, 'ETH' => null, 'LTC' => null, 'BCH' => null);

							$sql = $db->query('SELECT * FROM `crypto_addresses` WHERE `userid` = ' . $db->quote($user['userid']));
							$row = $sql->fetchAll(PDO::FETCH_ASSOC);

							foreach ($row as $key => $value) {
								$crypto_addresses[$value['currency']] = $value['address'];
							}

							$array_page['addresses'] = $crypto_addresses;

							$location .= '_currency';

							break;
						}
					}

					header('location: ' . $root . 'deposit');
					exit();

					break;

				case 'grow':
					$sql_growid = $db->query('SELECT * FROM `users_growid` WHERE `userid` = ' . $db->quote($user['userid']) . ' AND `removed` = 0 ORDER BY `id` DESC LIMIT 1');
					$row_growid = $sql_growid->fetch(PDO::FETCH_ASSOC);
					
					if($sql_growid->rowCount() > 0) {
						$array_page['growid'] = strtolower($row_growid['growid']);
					}
					
					$location .= '_grow';

					break;

				default:
					header('location: ' . $root . 'deposit');
					exit();

					break;
			}
		}

		$page_request = getTemplatePage($names_pages[$page], $page, $location, $array_page);
		echo $page_request;
		return;

	case 'withdraw':
		if (!$user) {
			$page_request = getTemplatePage($names_pages[$page], $page, 'login', $array_page);
			echo $page_request;
			return;
		}
		$location = $page;

		if (isset($paths[1])) {
			switch ($paths[1]) {
				case 'currency':
					if (isset($paths[2])) {
						$methodes = array('btc', 'eth', 'ltc', 'bch');
						if (in_array($paths[2], $methodes)) {
							$crypto_addresses = array('BTC' => null, 'ETH' => null, 'LTC' => null, 'BCH' => null);

							$sql = $db->query('SELECT * FROM `crypto_addresses` WHERE `userid` = ' . $db->quote($user['userid']));
							$row = $sql->fetchAll(PDO::FETCH_ASSOC);

							foreach ($row as $key => $value) {
								$crypto_addresses[$value['currency']] = $value['address'];
							}

							$array_page['addresses'] = $crypto_addresses;

							$location .= '_currency';

							break;
						}
					}

					header('location: ' . $root . 'withdraw');
					exit();

					break;

				case 'grow':
					$location .= '_grow';

					break;

				default:
					header('location: ' . $root . 'withdraw');
					exit();

					break;
			}
		}

		$page_request = getTemplatePage($names_pages[$page], $page, $location, $array_page);
		echo $page_request;
		return;

	case 'tos':
		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page);
		echo $page_request;
		return;
	case 'support':
		$support = array();
		$tickets = array();

		if (!$user && (isset($_POST['new']) || isset($_POST['reply']) || isset($_POST['close']) || isset($_POST['redirect']))) exit(json_encode(array('success' => false, 'error' => 'Session expired or you are not logged in. Please refresh the page and try again.')));

		if (isset($_POST['new'])) {
			$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
			$department = $_POST['department'];
			$message = htmlspecialchars($_POST['message'], ENT_QUOTES);

			support_createTicket(array('user' => $user, 'title' => $title, 'department' => $department, 'message' => $message), function ($err1) {
				if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

				exit(json_encode(array('success' => true, 'message' => 'Successfully created a new ticket!')));
			});
		} else if (isset($_POST['reply'])) {
			$id = $_GET['id'];
			$message = htmlspecialchars($_POST['message'], ENT_QUOTES);

			support_replyTicket(array('user' => $user, 'id' => $id, 'message' => $message), function ($err1) {
				if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

				exit(json_encode(array('success' => true, 'message' => 'Successfully replied the ticket!')));
			});
		} else if (isset($_POST['close'])) {
			$id = $_GET['id'];

			support_closeTicket(array('user' => $user, 'id' => $id), function ($err1) {
				if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

				exit(json_encode(array('success' => true, 'message' => 'Successfully closed the ticket!')));
			});
		} else if (isset($_POST['redirect'])) {
			$id = $_GET['id'];
			$department = intval($_POST['department']);

			support_redirectTicket(array('user' => $user, 'id' => $id, 'department' => $department), function ($err1) {
				if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

				exit(json_encode(array('success' => true, 'message' => 'Successfully redirected the ticket!')));
			});
		}

		if ($user['rank'] == 100) $sql_support = $db->query('SELECT support_tickets.id, support_tickets.userid AS `sender_userid`, support_tickets.name AS `sender_name`, support_receivers.userid AS `receiver_userid`, support_receivers.name AS `receiver_name`, support_tickets.closed, support_tickets.title, support_tickets.department, support_tickets.time FROM `support_tickets` INNER JOIN `support_receivers` ON support_tickets.id = support_receivers.supportid WHERE support_receivers.removed = 0 ORDER BY support_tickets.id DESC');
		else $sql_support = $db->query('SELECT support_tickets.id, support_tickets.userid AS `sender_userid`, support_tickets.name AS `sender_name`, support_receivers.userid AS `receiver_userid`, support_receivers.name AS `receiver_name`, support_tickets.closed, support_tickets.title, support_tickets.department, support_tickets.time FROM `support_tickets` INNER JOIN `support_receivers` ON support_tickets.id = support_receivers.supportid WHERE (support_tickets.userid = ' . $db->quote($user['userid']) . ' || support_receivers.userid = ' . $db->quote($user['userid']) . ') AND support_receivers.removed = 0 ORDER BY support_tickets.id DESC');
		$row_support = $sql_support->fetchAll(PDO::FETCH_ASSOC);
		$support = $row_support;

		if ($user['rank'] == 100) $sql_tickets = $db->query('SELECT support_messages.id, support_messages.supportid, support_messages.message, support_messages.userid, support_messages.name, support_messages.avatar, support_messages.xp, support_messages.response, support_messages.time FROM `support_messages` INNER JOIN `support_tickets` ON support_messages.supportid = support_tickets.id INNER JOIN `support_receivers` ON support_tickets.id = support_receivers.supportid WHERE support_receivers.removed = 0');
		else $sql_tickets = $db->query('SELECT support_messages.id, support_messages.supportid, support_messages.message, support_messages.userid, support_messages.name, support_messages.avatar, support_messages.xp, support_messages.response, support_messages.time FROM `support_messages` INNER JOIN `support_tickets` ON support_messages.supportid = support_tickets.id INNER JOIN `support_receivers` ON support_tickets.id = support_receivers.supportid WHERE (support_tickets.userid = ' . $db->quote($user['userid']) . ' || support_receivers.userid = ' . $db->quote($user['userid']) . ') AND support_receivers.removed = 0');
		$row_tickets = $sql_tickets->fetchAll(PDO::FETCH_ASSOC);
		$tickets = $row_tickets;

		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page, array('response' => array('support' => $support, 'tickets' => $tickets)));
		echo $page_request;
		return;

	case 'fair':
		//USER
		$sql_fair_serverseeds = $db->query('SELECT * FROM `users_seeds_server` WHERE `userid` = ' . $db->quote($user['userid']) . ' ORDER BY `id` DESC LIMIT 5000');
		$row_sql_fair_serverseeds = $sql_fair_serverseeds->fetchAll(PDO::FETCH_ASSOC);

		$fair_serverseeds = array();
		foreach ($row_sql_fair_serverseeds as $key => $value) {
			$using = intval($value['removed']) == 0;

			array_push($fair_serverseeds, array(
				'id' => $value['id'],
				'using' => $using,
				'seed' => ($using) ? hash('sha256', $value['seed']) : $value['seed'],
				'nonce' => $value['nonce'],
				'time' => $value['time']
			));
		}

		$sql_fair_clientseed = $db->query('SELECT `seed` FROM `users_seeds_client` WHERE `userid` = ' . $db->quote($user['userid']) . ' AND `removed` = 0 ORDER BY `id` DESC LIMIT 1');
		$row_fair_clientseed = $sql_fair_clientseed->fetch(PDO::FETCH_ASSOC);

		//GAMES
		$sql_seeds_roulette = $db->query('SELECT * FROM `roulette_seeds` ORDER BY `id` DESC LIMIT 7');
		$row_seeds_roulette = $sql_seeds_roulette->fetchAll(PDO::FETCH_ASSOC);

		$seeds_roulette = array();
		foreach ($row_seeds_roulette as $key => $value) {
			$sql_games_roulette = $db->query('SELECT `roll`, `color`, `nonce` FROM `roulette_rolls` WHERE `ended` = 1 AND `seedid` = ' . $db->quote($value['id']) . ' ORDER BY `id` ASC');
			$row_games_roulette = $sql_games_roulette->fetchAll(PDO::FETCH_ASSOC);

			$using = $value['time'] > time() - (24 * 60 * 60);

			array_push($seeds_roulette, array(
				'id' => $value['id'],
				'using' => $using,
				'server_seed' => ($using) ? hash('sha256', $value['server_seed']) : $value['server_seed'],
				'public_seed' => $value['public_seed'],
				'games' => $row_games_roulette,
				'time' => $value['time']
			));
		}

		$sql_seeds_crash = $db->query('SELECT * FROM `crash_seeds` ORDER BY `id` DESC LIMIT 7');
		$row_seeds_crash = $sql_seeds_crash->fetchAll(PDO::FETCH_ASSOC);

		$seeds_crash = array();
		foreach ($row_seeds_crash as $key => $value) {
			$sql_games_roulette = $db->query('SELECT `point`, `nonce` FROM `crash_rolls` WHERE `ended` = 1 AND `seedid` = ' . $db->quote($value['id']) . ' ORDER BY `id` ASC');
			$row_games_roulette = $sql_games_roulette->fetchAll(PDO::FETCH_ASSOC);

			$using = $value['time'] > time() - (24 * 60 * 60);

			array_push($seeds_crash, array(
				'id' => $value['id'],
				'using' => $using,
				'server_seed' => ($using) ? hash('sha256', $value['server_seed']) : $value['server_seed'],
				'public_seed' => $value['public_seed'],
				'games' => $row_games_roulette,
				'time' => $value['time']
			));
		}

		$sql_histories_jackpot = $db->query('SELECT jackpot_games.id, jackpot_games.server_seed, jackpot_rolls.public_seed, jackpot_rolls.blockid, jackpot_rolls.roll, jackpot_games.time FROM `jackpot_games` INNER JOIN `jackpot_rolls` ON jackpot_games.id = jackpot_rolls.gameid WHERE jackpot_games.ended = 1 AND jackpot_rolls.removed = 0 ORDER BY jackpot_games.id DESC LIMIT 50');
		$row_histories_jackpot = $sql_histories_jackpot->fetchAll(PDO::FETCH_ASSOC);

		$sql_histories_coinflip = $db->query('SELECT coinflip_games.id, coinflip_games.server_seed, coinflip_rolls.public_seed, coinflip_rolls.blockid, coinflip_rolls.roll, coinflip_games.time FROM `coinflip_games` INNER JOIN `coinflip_rolls` ON coinflip_games.id = coinflip_rolls.gameid WHERE coinflip_games.ended = 1 AND coinflip_rolls.removed = 0 ORDER BY coinflip_games.id DESC LIMIT 50');
		$row_histories_coinflip = $sql_histories_coinflip->fetchAll(PDO::FETCH_ASSOC);

		$fair_histories = array();

		$sql_histories_unbox = $db->query('SELECT unbox_bets.id, users_seeds_server.removed, users_seeds_server.seed AS `server_seed`, users_seeds_client.seed AS `client_seed`, unbox_bets.nonce, unbox_bets.tickets, unbox_bets.roll FROM `unbox_bets` INNER JOIN `users_seeds_server` ON unbox_bets.server_seedid = users_seeds_server.id INNER JOIN `users_seeds_client` ON unbox_bets.client_seedid = users_seeds_client.id WHERE unbox_bets.userid = ' . $db->quote($user['userid']) . ' ORDER BY unbox_bets.id DESC LIMIT 50');
		$row_histories_unbox = $sql_histories_unbox->fetchAll(PDO::FETCH_ASSOC);

		foreach ($row_histories_unbox as $key => $value) {
			$using = intval($value['removed']) == 0;

			if (!isset($fair_histories['unbox'])) $fair_histories['unbox'] = array();

			array_push($fair_histories['unbox'], array(
				'id' => $value['id'],
				'using' => $using,
				'server_seed' => ($using) ? hash('sha256', $value['server_seed']) : $value['server_seed'],
				'client_seed' => $value['client_seed'],
				'nonce' => $value['nonce'],
				'tickets' => $value['tickets'],
				'roll' => $value['roll']
			));
		}

		$sql_histories_tower = $db->query('SELECT tower_bets.id, users_seeds_server.removed, users_seeds_server.seed AS `server_seed`, users_seeds_client.seed AS `client_seed`, tower_bets.nonce, tower_bets.roll FROM `tower_bets` INNER JOIN `users_seeds_server` ON tower_bets.server_seedid = users_seeds_server.id INNER JOIN `users_seeds_client` ON tower_bets.client_seedid = users_seeds_client.id WHERE tower_bets.userid = ' . $db->quote($user['userid']) . ' ORDER BY tower_bets.id DESC LIMIT 50');
		$row_histories_tower = $sql_histories_tower->fetchAll(PDO::FETCH_ASSOC);

		foreach ($row_histories_tower as $key => $value) {
			$using = intval($value['removed']) == 0;

			if (!isset($fair_histories['tower'])) $fair_histories['tower'] = array();

			array_push($fair_histories['tower'], array(
				'id' => $value['id'],
				'using' => $using,
				'server_seed' => ($using) ? hash('sha256', $value['server_seed']) : $value['server_seed'],
				'client_seed' => $value['client_seed'],
				'nonce' => $value['nonce'],
				'tickets' => $value['tickets'],
				'roll' => $value['roll']
			));
		}

		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page, array('response' => array('fair' => array('client_seed' => $row_fair_clientseed['seed'], 'server_seed' => $fair_serverseeds[0]['seed'], 'server_seeds' => $fair_serverseeds, 'roulette' => $seeds_roulette, 'crash' => $seeds_crash, 'jackpot' => $row_histories_jackpot, 'coinflip' => $row_histories_coinflip, 'histories' => $fair_histories))));
		echo $page_request;
		return;

	case 'faq':
		$page_request = getTemplatePage($names_pages[$page], $page, $page, $array_page);
		echo $page_request;
		return;

	case 'auth':
		switch ($paths[1]) {
			case 'login':
				if ($user) exit(json_encode(array('success' => false, 'error' => 'User logged in')));

				$username = $_POST['username'];
				$password = $_POST['password'];

				auth_authByLogin(array('username' => $username, 'password' => $password), function ($err1, $session) {
					if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

					setcookie('session', $session['session'], $session['expire'], $GLOBALS['root']);
					exit(json_encode(array('success' => true, 'refresh' => true, 'message' => array('have' => false))));
				});

				break;

			case 'register':
				session_start();
				
				$referral = '';
				if(isset($_SESSION['referral'])){
					$referral = $_SESSION['referral'];
					
					unset($_SESSION['referral']);
				}
			
				if ($user) exit(json_encode(array('success' => false, 'error' => 'User logged in')));

				$email = $_POST['email'];
				$username = $_POST['username'];
				$password = $_POST['password'];

				auth_authByRegister(array('email' => $email, 'username' => $username, 'password' => $password, 'referral' => $referral), function ($err1, $session) {
					if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

					setcookie('session', $session['session'], $session['expire'], $GLOBALS['root']);
					exit(json_encode(array('success' => true, 'refresh' => true)));
				});

				break;

			case 'steam':
				session_start();

				$data_parms = array();

				foreach ($_SESSION as $key => $value) {
					if($key != 'referral') unset($_SESSION[$key]);

					$data_parms[$key] = $value;
				}

				foreach ($_GET as $key => $value) {
					$_SESSION[$key] = $value;
				}

				include 'openid/steam/openid.php';
				try {
					$openid = new LightOpenID($_SERVER['SERVER_NAME'] . $root);

					if (!$openid->mode) {
						if ($user && !$_GET['assign']) return header('location: ' . $root . $_GET['return']);
						if (!$user && $_GET['assign']) return header('location: ' . $root . $_GET['return']);

						$openid->identity = 'http://steamcommunity.com/openid/';

						header('location: ' . $openid->authUrl());
					} elseif ($openid->mode == 'cancel') {
						header('location: ' . $root . $data_parms['return']);
					} else {
						if (!$openid->validate()) exit('Invalid Steam Login');

						$id = $openid->identity;
						$ptn = '/^https:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/';
						preg_match($ptn, $id, $matches);

						$link = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $GLOBALS['steam']['apikey'] . '&steamids=' . $matches[1];
						$json_object = file_get_contents($link);
						$json_decoded = json_decode($json_object, true);

						if (!isset($json_decoded['response'])) exit('Invalid Steam Login Response (1)');
						if (!isset($json_decoded['response']['players'])) exit('Invalid Steam Login Response (2)');
						if (sizeof($json_decoded['response']['players']) <= 0) exit('Invalid Steam Login Response (3)');

						$steamid = $json_decoded['response']['players'][0]['steamid'];
						$name = htmlspecialchars($json_decoded['response']['players'][0]['personaname'], ENT_QUOTES);
						$avatar = $json_decoded['response']['players'][0]['avatarfull'];

						if ($data_parms['assign']) {
							auth_bindAccount(array('user' => $user, 'bind' => 'steam', 'bindid' => $steamid), function ($err1) {
								if ($err1) exit($err1);
							});
						} else {
							auth_authBySteam(array('id' => $steamid, 'name' => $name, 'avatar' => $avatar, 'referral' => $_SESSION['referral']), function ($err1, $session) {
								if ($err1) exit($err1);
								
								if(isset($_SESSION['referral'])) unset($_SESSION['referral']);

								setcookie('session', $session['session'], $session['expire'], $GLOBALS['root']);
							});
						}

						header('location: ' . $root . $data_parms['return']);
					}
				} catch (ErrorException $e) {
					exit($e->getMessage());
				}

				break;

			case 'google':
				session_start();

				$data_parms = array();

				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);

					$data_parms[$key] = $value;
				}

				foreach ($_GET as $key => $value) {
					$_SESSION[$key] = $value;
				}

				require_once 'openid/google/vendor/autoload.php';
				try {
					$openid = new Google_Client();
					$openid->setClientId($google['client']);
					$openid->setClientSecret($google['secret']);
					$openid->setRedirectUri('https://' . $_SERVER['SERVER_NAME'] . $root . 'auth/google');
					$openid->addScope('email');
					$openid->addScope('profile');

					if (!isset($_GET['code'])) {
						if ($user && !$_GET['assign']) return header('location: ' . $root . $_GET['return']);
						if (!$user && $_GET['assign']) return header('location: ' . $root . $_GET['return']);

						header('location: ' . $openid->createAuthUrl());
					} else {
						$token = $openid->fetchAccessTokenWithAuthCode($_GET['code']);
						$openid->setAccessToken($token['access_token']);

						$google_oauth = new Google_Service_Oauth2($openid);

						if (!isset($google_oauth->userinfo)) exit('Invalid Google Login Response (1)');

						$google_account_info = $google_oauth->userinfo->get();

						$id =  $google_account_info->id;
						$email =  $google_account_info->email;
						$name =  htmlspecialchars($google_account_info->name, ENT_QUOTES);
						$avatar =  $google_account_info->picture;

						if ($data_parms['assign']) {
							auth_bindAccount(array('user' => $user, 'bind' => 'google', 'bindid' => $id), function ($err1) {
								if ($err1) exit($err1);
							});
						} else {
							auth_authByGoogle(array('id' => $id, 'email' => $email, 'name' => $name, 'avatar' => $avatar, 'referral' => $_SESSION['referral']), function ($err1, $session) {
								if ($err1) exit($err1);
	
								if(isset($_SESSION['referral'])) unset($_SESSION['referral']);
								
								setcookie('session', $session['session'], $session['expire'], $GLOBALS['root']);
							});
						}

						header('location: ' . $root . $data_parms['return']);
					}
				} catch (ErrorException $e) {
					exit($e->getMessage());
				}

				break;

			case 'facebook':
				session_start();

				$data_parms = array();

				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);

					$data_parms[$key] = $value;
				}

				foreach ($_GET as $key => $value) {
					$_SESSION[$key] = $value;
				}

				if ($user && !$_GET['assign']) return header('location: ' . $root . $_GET['return']);
				if (!$user && $_GET['assign']) return header('location: ' . $root . $_GET['return']);

				header('location: ' . $root . $_GET['return']);

				break;

			case 'logout':
				$return = $_GET['return'];

				if (!$user) return header('location: ' . $root . $return);

				$session = $_COOKIE['session'];
				$devices = intval($_GET['devices']);

				auth_logoutUserDevices(array('session' => $session, 'devices' => $devices), function ($err1) {
					if ($err1) return header('location: ' . $GLOBALS['root'] . $return);

					setcookie('session', '', time(), $GLOBALS['root']);
				});

				header('location: ' . $root . $return);

				break;

			case 'change_password':
				if (!$user) exit(json_encode(array('success' => false, 'error' => 'User not logged in')));

				$current_password = $_POST['current_password'];
				$password = $_POST['password'];
				$confirm_password = $_POST['confirm_password'];

				auth_changePassword(array('user' => $user, 'current_password' => $current_password, 'password' => $password, 'confirm_password' => $confirm_password), function ($err1) {
					if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

					exit(json_encode(array('success' => true, 'refresh' => false, 'message' => array('have' => true, 'message' => 'Your password has been changed!'))));
				});

				break;

			case 'recover':
				if ($user) return header('location: ' . $root);

				$key = $_GET['key'];

				$sql1 = $db->query('SELECT * FROM `link_keys` WHERE `key` = ' . $db->quote($key) . ' AND `expire` > ' . $db->quote(time()) . ' AND `used` = 0');
				if ($sql1->rowCount() > 0) {
					$row1 = $sql1->fetch(PDO::FETCH_ASSOC);

					$sql2 = $db->query('SELECT * FROM `users` WHERE `userid` = ' . $db->quote($row1['userid']));
					if ($sql2->rowCount() > 0) {
						$page_request = getTemplatePage($names_pages['reset'], 'reset', 'reset', $array_page, array('key' => $key));
						echo $page_request;
						return;
					}
				}

				header('location: ' . $root);

				break;

			case 'reset':
				if ($user) exit(json_encode(array('success' => false, 'error' => 'User logged in')));

				$key = $_GET['key'];
				$password = $_POST['password'];
				$confirm_password = $_POST['confirm_password'];

				auth_resetPassword(array('key' => $key, 'password' => $password, 'confirm_password' => $confirm_password), function ($err1) {
					if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

					exit(json_encode(array('success' => true, 'refresh' => true)));
				});

				break;

			case 'verifyprofile':
				if (!$user) return header('location: ' . $root);

				$session = $_COOKIE['session'];
				$key = $_GET['key'];

				auth_verifyProfile(array('session' => $session, 'key' => $key), function ($err1) {
					if ($err1) exit($err1);
				});

				header('location: ' . $root);

				break;

			case 'initializing':
				if (!$user) exit(json_encode(array('success' => false, 'error' => 'User not logged in')));

				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$confirm_password = $_POST['confirm_password'];

				auth_accountInitializing(array('user' => $user, 'username' => $username, 'email' => $email, 'password' => $password, 'confirm_password' => $confirm_password), function ($err1) {
					if ($err1) exit(json_encode(array('success' => false, 'error' => $err1)));

					exit(json_encode(array('success' => true, 'refresh' => false, 'message' => array('have' => true, 'message' => 'Your account has been initialized!'))));
				});

				break;
		}

		return;
}

$page_request = getTemplate('Page not Found (404)', 'empty');
echo $page_request;
exit();

function getTemplate($name, $page, $in1 = null, $in2 = null)
{
	if ($in1 != null) extract($in1);
	if ($in2 != null) extract($in2);

	ob_start();
	include 'template/' . $page . '.tpl';
	$text = ob_get_clean();
	return $text;
}

function getTemplatePage($name, $page, $name_page, $in1 = null, $in2 = null)
{
	if ($in1 != null) extract($in1);
	if ($in2 != null) extract($in2);

	ob_start();
	include 'template/page.tpl';
	$text = ob_get_clean();
	return $text;
}

function callAPi()
{
	$curl = curl_init();

	curl_setopt($curl, CURLOPT_URL, "https://193.108.200.12:4759/deposit/grow/start");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, "growid1=test");
	$response = curl_exec($curl);
	if (curl_errno($curl)) {
		return "error";
	}
	curl_close($curl);
	return $response;
}

