<?php
//SITE
$port = 2053;
$root = '/';
$path = $_GET['page'];

$settings = '/var/server' . $root . 'settings.json';

$sitename = 'BetDls.com';
$sitekeywords = 'betdls, coinflip, growtopia, gambling, casino, growtopia casino, jackpot, g2g, growcasino, site, bloxflip, csgo, cs, go, global, offensive, cs:go, kingdom, bet, gambling, gamble, fair, best, great, csgoempire, csgoatse, csgo500, crypto, btc, eth, roulette, experience';
$siteauthor = 'legacy';
$siteurl = 'https://betdls.com';
$sitedescription = $sitename . ' - The best gamecurrency gambling platform!';
$themecolor = '#9370db';

//SOCIAL MEDIA
$link_instagram = 'https://instagram.com/betdls_com';
$link_twitter = 'https://twitter.com/betdls';
$link_discord = 'https://discord.gg/betdl';

$names_pages = array(
	'roulette' => 'Roulette',
	'crash' => 'Crash',
	'jackpot' => 'Jackpot',
	'coinflip' => 'Coinflip',
	'unbox' => 'Unbox',
	'tower' => 'Tower',
	'profile' => 'Profile',
	'rewards' => 'Rewards',
	'deposit' => 'Deposit',
	'withdraw' => 'Withdraw',
	'tos' => 'Terms Of Service',
	'support' => 'Support',
	'paypal' => 'Paypal',
	'fair' => 'Provably Fair',
	'faq' => 'Frequently Asked Questions',
	'maintenance' => 'Maintenance',
	'leaderboard' => 'Leaderboard',
	'banned' => 'Banned',
	'reset' => 'Reset Password',
	'home' => 'Home',
	'admin' => 'Admin',
	'dashboard' => 'Dashboard',
	'affiliates' => 'Affiliates',
);

$ranks_name = array('0' => 'member', '1' => 'admin', '2' => 'moderator', '3' => 'helper', '4' => 'promoter', '5' => 'pro', '6' => 'youtuber', '7' => 'test', '8' => 'developer', '9' => 'promoter', '100' => 'owner');

$banip_excluded = array('owner');
$ban_excluded = array('owner');
$maintenance_excluded = array('owner', 'developer', 'admin', 'moderator', 'helper');
$bonus_allowed = array('owner', 'admin');
$support_allowed = array('owner');
$profile_allowed = array('owner', 'admin');
$refillshop_allowed = array('owner');

$settings_json_object = file_get_contents($settings);
$settings_json_decoded = json_decode($settings_json_object, true);

$admin_allowed = $settings_json_decoded['allowed']['admin'];
$dashboard_allowed = $settings_json_decoded['allowed']['dashboard'];

$level_start = 500;
$level_next = 0.235;

$steam = array(
	'apikey' => 'EADD271CEF5CE8794AD3C1013A7F07B7'
);

$recaptcha = array(
	'sitekey' => '6LeZvMsiAAAAADd5dx7lGKc9J-vkJu9R-UdVh_47'
);

$google = array(
	'client' => '386582061681-t2lntrtdfppa8efp9hupp1r63auci3te.apps.googleusercontent.com',
	'secret' => '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'
);

$rewards_amounts = array(
	'google' => 0.50,
	'facebook' => 0.50,
	'steam' => 0.50,
	'refferal_code' => 0.05,
	'daily_start' => 0.20,
	'daily_step' => 0.02
);

$referral_commission_deposit = 3.00;

$affiliates_requirements = array(0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 25000.00, 50000.00, 75000.00, 100000.00);
$affiliates_commission = array('deposit' => 0.05, 'bet' => 0.1);

$sql_maintenance = $db->query('SELECT * FROM `maintenance` WHERE `removed` = 0 ORDER BY `id` DESC LIMIT 1');
$row_maintenance = $sql_maintenance->fetch(PDO::FETCH_ASSOC);

//HAVE SUPPORTS ACTIVE
$sql_support = $db->query('SELECT COUNT(*) AS `total` FROM `support_tickets` INNER JOIN `support_receivers` ON support_tickets.id = support_receivers.supportid WHERE (support_tickets.userid = ' . $db->quote($user['userid']) . ' || support_receivers.userid = ' . $db->quote($user['userid']) . ') AND support_tickets.closed = 0 AND support_receivers.removed = 0 AND (SELECT `response` FROM `support_messages` WHERE `id` = support_tickets.id ORDER BY `id` DESC LIMIT 1) = 0');
$row_support = $sql_support->fetch(PDO::FETCH_ASSOC);

//CALLBACK
$affiliates['requirements'] = $affiliates_requirements;
$affiliates['commission'] = $affiliates_commission;

$profile['have_supports'] = $row_support['total'] > 0;

$site['root'] = $root;
$site['port'] = $port;
$site['recaptcha'] = $recaptcha;
$site['path'] = $path;
$site['name'] = $sitename;
$site['keywords'] = $sitekeywords;
$site['author'] = $siteauthor;
$site['url'] = $siteurl;
$site['description'] = $sitedescription;
$site['link_steam'] = $link_steam;
$site['link_discord'] = $link_steam;
$site['link_twitter'] = $link_twitter;
$site['maintenance'] = $sql_maintenance->rowCount() > 0;
$site['theme_color'] = $themecolor;

$site['ranks_name'] = $ranks_name;
$site['permissions'] = array(
	'banip' => $banip_excluded,
	'ban' => $ban_excluded,
	'maintenance' => $maintenance_excluded,
	'bonus' => $bonus_allowed,
	'support' => $support_allowed,
	'profile' => $profile_allowed,
	'refillshop' => $refillshop_allowed
);

$site['access'] = array(
	'admin' => $admin_allowed,
	'dashboard' => $dashboard_allowed,
);

?>