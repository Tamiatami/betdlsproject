<div class="slider slider-left text-left slider-top flex justify-content transition-5 show_chat p-2 pullout_view" data-pullout="chat">
	<i class="fa fa-comments" aria-hidden="true"></i>
</div>

<div class="pullout pullout-left flex column transition-5" data-pullout="chat">
	<div class="m-2">
		<div class="flex justify-between items-center mb-2 font-7">
			<div>
				<i class="fa fa-user text-color" aria-hidden="true"></i>
				<span id="isonline">0</span> Online
			</div>
			
			<div class="pullout_view pointer" data-pullout="chat"><i class="fa fa-times" aria-hidden="true"></i></div>
		</div>


		<div class="grid split-column-full gap-1">
		<div class="flag rounded-1 flex items-center justify-center relative active" data-channel="gb" data-name="English"><img  src="<?php echo $site['root'];?>template/img/lang/gb.svg?v=<?php echo time(); ?>"><div class="sop-medium-right bg-danger rounded-full flex justify-center items-center new-messages hidden">0</div></div>
			<div class="flag rounded-1 flex items-center justify-center relative" data-channel="id" data-name="Bahasa indonesia"><img  src="<?php echo $site['root'];?>template/img/lang/id.svg?v=<?php echo time(); ?>"><div class="sop-medium-right bg-danger rounded-full flex justify-center items-center new-messages hidden">0</div></div>
			<div class="flag rounded-1 flex items-center justify-center relative" data-channel="lt" data-name="Lietuvis"><img  src="<?php echo $site['root'];?>template/img/lang/lt.svg?v=<?php echo time(); ?>"><div class="sop-medium-right bg-danger rounded-full flex justify-center items-center new-messages hidden">0</div></div>
			<div class="flag rounded-1 flex items-center justify-center relative" data-channel="tr" data-name="Türk"><img  src="<?php echo $site['root'];?>template/img/lang/tr.svg?v=<?php echo time(); ?>"><div class="sop-medium-right bg-danger rounded-full flex justify-center items-center new-messages hidden">0</div></div>
			<div class="flag rounded-1 flex items-center justify-center relative" data-channel="fi" data-name="Suomalainen"><img  src="<?php echo $site['root'];?>template/img/lang/fi.svg?v=<?php echo time(); ?>"><div class="sop-medium-right bg-danger rounded-full flex justify-center items-center new-messages hidden">0</div></div>
		</div>
	</div>
	
	<div class="rain_panel p-3 hidden">
		<div class="title-page flex items-center justify-center text-center">IT'S RAINING</div>
		
		<div class="rainJoin hidden">
			<div class="text-center font-8">Join to claim some free coins!</div>
			
			<div class="text-center">
				<button type="button" class="site-button purple" id="join_rain">JOIN</button>
			</div>
		</div>
		
		<div class="rainJoined hidden">
			<div class="text-center font-8">You have successfully joined the rain! You will receive your coins as soon as the rain is over.</div>
		</div>
		
		<div class="rainWait hidden">
			<div class="text-center font-8">The time to enter to rain has elapsed. You can enter the next rain.</div>
		</div>
	</div>
	
	<div class="chat-group flex column">
		<div id="chat-area"></div>
			
		<div class="emojis-panel text-center" style="display: none;">
			
			
			
		</div>
			
		<div class="chat-input">
			<div style="position: relative;">
				<div class="emojis-smile-icon flex hidden" data-type="show"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
				<div class="emojis-smile-icon flex hidden" data-type="hide"><i class="fa fa-times" aria-hidden="true"></i></div>
			
				<form id="chat-input-form"><input type="text" class="chat-input-field" placeholder="Say something" id="chat_message" maxlength="200" autocomplete="off"></form>
				<div class="chat-input-scroll flex items-center justify-center hidden">Scroll to recent messages</div>
			</div>
		</div>
	</div>
</div>

<div class="pullout pullout-left flex column transition-5" data-pullout="menu">
	<div class="header-menu-center wrapper-page flex column height-full width-full">
		<div class="flex column gap-4 pr-4 pl-4 pb-4" style="overflow: hidden; overflow-y: auto;">
			<div class="flex column gap-4">
<br><br><br>
				<div class="header-menu-button">
					<a href="<?php echo $site['root'];?>roulette">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'roulette') echo 'active';?>">
							<img src="<?php echo $site['root'];?>template/img/menu/roulette.png?v=<?php echo time(); ?>">
							<div class="ml-1">Roulette</div>
						</div>
					</a>
				</div>
				<div class="header-menu-button">
					<a href="<?php echo $site['root'];?>crash">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'crash') echo 'active';?>">
							<img src="<?php echo $site['root'];?>template/img/menu/crash.png?v=<?php echo time(); ?>">
							<div class="ml-1">Crash</div>
						</div>
					</a>
				</div>
				<div class="header-menu-button">
					<a href="<?php echo $site['root'];?>jackpot">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'jackpot') echo 'active';?>">
							<img src="<?php echo $site['root'];?>template/img/menu/jackpot.png?v=<?php echo time(); ?>">
							<div class="ml-1">Jackpot</div>
						</div>
					</a>
				</div>
				<div class="header-menu-button">
					<a href="<?php echo $site['root'];?>coinflip">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'coinflip') echo 'active';?>">
							<img src="<?php echo $site['root'];?>template/img/menu/coinflip.png?v=<?php echo time(); ?>">
							<div class="ml-1">Coinflip</div>
						</div>
					</a>
				</div>
				<div class="header-menu-button">
					<a href="<?php echo $site['root'];?>unbox">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'unbox') echo 'active';?>">
							<img src="<?php echo $site['root'];?>template/img/menu/unbox.png?v=<?php echo time(); ?>">
							<div class="ml-1">Unbox</div>
						</div>
					</a>
				</div>
				<div class="header-menu-button">
					<a href="<?php echo $site['root'];?>tower">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'tower') echo 'active';?>">
							<img src="<?php echo $site['root'];?>template/img/menu/tower.png?v=<?php echo time(); ?>">
							<div class="ml-1">Tower</div>
						</div>
					</a>
				</div>
			</div>
			
			<div class="flex column gap-2">
<br><br><br><br>
				<div class="header-menu-button"><a href="<?php echo $site['root'];?>deposit" class="<?php if($paths[0] == 'deposit') echo 'active';?>">Deposit</a></div>
				<div class="header-menu-button"><a href="<?php echo $site['root'];?>withdraw" class="<?php if($paths[0] == 'withdraw') echo 'active';?>">Withdraw</a></div>
				<div class="header-menu-button"><a href="<?php echo $site['root'];?>fair" class="<?php if($paths[0] == 'fair') echo 'active';?>">Provably Fair</a></div>
				<div class="header-menu-button"><a href="<?php echo $site['root'];?>faq" class="<?php if($paths[0] == 'faq') echo 'active';?>">FAQ</a></div>
				<div class="header-menu-button"><a href="<?php echo $site['root'];?>tos" class="<?php if($paths[0] == 'tos') echo 'active';?>">Terms Of Service</a></div>
				<div class="header-menu-button"><a href="<?php echo $site['root'];?>support" class="<?php if($paths[0] == 'support') echo 'active';?>">Support</a></div>
				<!-- <div class="header-menu-button"><a href="<?php echo $site['root'];?>leaderboard" class="<?php if($paths[0] == 'leaderboard') echo 'active';?>">Leaderboard</a></div> --!>
				<div class="header-menu-button"><a href="<?php echo $site['root'];?>rewards" class="<?php if($paths[0] == 'rewards') echo 'active';?>">Rewards</a></div>
				<div class="header-menu-button"><a href="<?php echo $site['root']; ?>affiliates" class="<?php if($paths[0] == 'rewards') echo 'active'; ?>">Affiliates</a></div>
				<div class="header-menu-button"><a href="<?php echo $site['root'];?>profile" class="text-success <?php if($paths[0] == 'history') echo 'active';?>">Profile</a></div>
				
				<?php if(in_array($user['userid'], $site['access']['admin'])){ ?><div class="header-menu-button"><a href="<?php echo $site['root']; ?>admin" class="text-success <?php if($paths[0] == 'admin') echo 'active'; ?>">Admin</a></div><?php } ?>
				<?php if(in_array($user['userid'], $site['access']['dashboard'])){ ?><div class="header-menu-button"><a href="<?php echo $site['root']; ?>dashboard" class="text-success <?php if($paths[0] == 'dashboard') echo 'active'; ?>">Dashboard</a></div><?php } ?>
				
				<div class="header-menu-button"><div class="text-success" data-modal="show" data-id="#modal_daily_cases">Daily Cases</div></div>
				
				<div class="header-menu-button"><div class="text-danger pointer" data-modal="show" data-id="#modal_auth_logout">Logout</div></div>
				
<!--
				<div class="flex gap-1 mt-2 font-10">
					<a href="<?php echo $site['link_twitter'];?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="<?php echo $site['link_steam'];?>" target="_blank"><i class="fa fa-steam" aria-hidden="true"></i></a>
				</div> --!>
			</div>
		</div>
	</div>
</div>