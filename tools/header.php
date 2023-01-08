
<div class="header-max">
	<div class="header layout flex">
		<div class="header-logo flex justify-center items-center">
			<a class="flex justify-center items-center" href="<?php echo $site['root']; ?>">
				<img src="<?php echo $site['root']; ?>template/img/logo.png?v=<?php echo time(); ?>">
			</a>
		</div>
		
		<div class="header-menu-top flex items-center justify-between">
			<div class="inline-block">

			</div>

		</div>
		
		<div class="header-menu-bottom flex items-center justify-between">
			<div class="flex items-center gap-4 height-full" id="favorite_game">
				<div class="main-game header-menu-button hidden" data-game="crash">
					<a href="<?php echo $site['root']; ?>crash">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'crash') echo 'active'; ?>">
							<img src="<?php echo $site['root']; ?>template/img/menu/crash.png?v=<?php echo time(); ?>">
							<div class="ml-1">Crash</div>
						</div>
					</a>
				</div>
				<div class="main-game header-menu-button hidden" data-game="jackpot">
					<a href="<?php echo $site['root']; ?>jackpot">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'jackpot') echo 'active'; ?>">
							<img src="<?php echo $site['root']; ?>template/img/menu/jackpot.png?v=<?php echo time(); ?>">
							<div class="ml-1">Jackpot</div>
						</div>
					</a>
				</div>
				<div class="main-game header-menu-button hidden" data-game="coinflip">
					<a href="<?php echo $site['root']; ?>coinflip">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'coinflip') echo 'active'; ?>">
							<img src="<?php echo $site['root']; ?>template/img/menu/coinflip.png?v=<?php echo time(); ?>">
							<div class="ml-1">Coinflip</div>
						</div>
					</a>
				</div>
				<div class="main-game header-menu-button hidden" data-game="unbox">
					<a href="<?php echo $site['root']; ?>unbox">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'unbox') echo 'active'; ?>">
							<img src="<?php echo $site['root']; ?>template/img/menu/unbox.png?v=<?php echo time(); ?>">
							<div class="ml-1">Unbox</div>
						</div>
					</a>
				</div>
				<div class="main-game header-menu-button hidden" data-game="tower">
					<a href="<?php echo $site['root']; ?>tower">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'tower') echo 'active'; ?>">
							<img src="<?php echo $site['root']; ?>template/img/menu/tower.png?v=<?php echo time(); ?>">
							<div class="ml-1">Tower</div>
						</div>
					</a>
				</div>
				
				<div class="header-menu-button">
					<div class="header-button-games flex items-center">
						<div class="mr-1">games</div>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
						
						<div class="header-games">
							<div class="header-list-games bg-dark items-center justify-center p-2">
								<a href="<?php echo $site['root']; ?>roulette">
									<div class="header-list-game flex items-center justify-center rounded-1 transition-2">
										<img src="<?php echo $site['root']; ?>template/img/menu/roulette.png?v=<?php echo time(); ?>">
										<div class="ml-1">Roulette</div>
									</div>
								</a>
								<a href="<?php echo $site['root']; ?>crash">
									<div class="header-list-game flex items-center justify-center rounded-1 transition-2">
										<img src="<?php echo $site['root']; ?>template/img/menu/crash.png?v=<?php echo time(); ?>">
										<div class="ml-1">Crash</div>
									</div>
								</a>
								<a href="<?php echo $site['root']; ?>jackpot">
									<div class="header-list-game flex items-center justify-center rounded-1 transition-2">
										<img src="<?php echo $site['root']; ?>template/img/menu/jackpot.png?v=<?php echo time(); ?>">
										<div class="ml-1">Jackpot</div>
									</div>
								</a>
								<a href="<?php echo $site['root']; ?>coinflip">
									<div class="header-list-game flex items-center justify-center rounded-1 transition-2">
										<img src="<?php echo $site['root']; ?>template/img/menu/coinflip.png?v=<?php echo time(); ?>">
										<div class="ml-1">Coinflip</div>
									</div>
								</a>
								<a href="<?php echo $site['root']; ?>unbox">
									<div class="header-list-game flex items-center justify-center rounded-1 transition-2">
										<img src="<?php echo $site['root']; ?>template/img/menu/unbox.png?v=<?php echo time(); ?>">
										<div class="ml-1">Unbox</div>
									</div>
								</a>
								<a href="<?php echo $site['root']; ?>tower">
									<div class="header-list-game flex items-center justify-center rounded-1 transition-2">
										<img src="<?php echo $site['root']; ?>template/img/menu/tower.png?v=<?php echo time(); ?>">
										<div class="ml-1">Tower</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="header-menu-button">
					<a href="<?php echo $site['root']; ?>deposit">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'deposit') echo 'active'; ?>">
							<div class="ml-1">Deposit</div>
						</div>
					</a>
				</div>
				
				<div class="header-menu-button">
					<a href="<?php echo $site['root']; ?>withdraw/grow">
						<div class="header-side-button flex items-center <?php if($paths[0] == 'withdraw') echo 'active'; ?>">
							<div class="ml-1">Withdraw</div>
						</div>
					</a>
				</div>
				
				<div class="header-menu-button" data-modal="show" data-id="#modal_daily_cases">
					<div class="header-side-button flex items-center <?php if($paths[0] == 'withdraw') echo 'active'; ?>">
						<div class="ml-1 text-success">Daily Cases</div>
					</div>
				</div>
<div class="header-menu-button">
<div class="header-button-games flex items-center">
<div class="mr-1">Referral</div>
<i class="fa fa-caret-down" aria-hidden="true"></i>
<div class="header-games">
<div class="header-list-games bg-dark items-center justify-center p-2">
<div class="header-menu-button">
<a href="/rewards">
<div class="header-side-button flex items-center ">
<div class="ml-1">Referral</div>
</div>
</a>
</div>
<div class="header-menu-button">
<a href="/affiliates">
<div class="header-side-button flex items-center ">
<div class="ml-1">Affiliates</div>
</div>
</a>
</div>

					<?php if($user['rank'] == 100 && in_array($user['userid'], $site['access']['admin'])){ ?><div class="header-menu-button inline-block mr-2"><a href="<?php echo $site['root']; ?>admin" class="text-success <?php if($paths[0] == 'admin') echo 'active'; ?>">Admin</a></div><?php } ?>
					<?php if($user['rank'] == 100 && in_array($user['userid'], $site['access']['dashboard'])){ ?><div class="header-menu-button inline-block mr-2"><a href="<?php echo $site['root']; ?>dashboard" class="text-success <?php if($paths[0] == 'dashboard') echo 'active'; ?>">Dashboard</a></div><?php } ?>



</div>
</div>
</div>
</div>


			</div>
			
<!-- 
				<div class="inline-block ml-2">
					<div class="inline-block mr-1"><a href="https://twitter.com/betdls" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
					<div class="inline-block mr-1"><a href="https://instagram.com/betdls_com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>

					<div class="inline-block mr-1"><a href="https://discord.gg/betdls"><img src="https://assets-global.website-files.com/6257adef93867e50d84d30e2/636e0a6cc3c481a15a141738_icon_clyde_white_RGB.png" width="14" height="12"></a></div>
				</div> --!> 

			<div class="flex items-center gap-2 height-full pr-2">
				<?php if($user){ ?>
				<a class="header-panel" href="<?php echo $site['root']; ?>deposit">
					<div class="balances bg-light rounded-1 b-l2 pl-2 pr-2 flex row items-center justify-center height-full relative">
						<div class="balance flex row items-center justify-center gap-1" data-balance="total">
							<div class="coins"></div>
							<span class="amount">0.00</span>
						</div>
						
						<!--<div class="balances-panel b-m2 bg-light rounded-1 p-2 flex column items-start justify-center gap-1 hidden">
							<div class="balance flex row items-center justify-center gap-1" data-balance="balance">
								<span>Balance:</span>
								<span class="amount">0.00</span>
							</div>
						</div>-->
					</div>
				</a>
						<div class="flex items-center gap-2 height-full pr-2">
				<?php if($user){ ?>
				<div class="level-bar flex items-center gap-1">
					<div class="text-bold">Lvl. <span id="level_count">0</span></div>
					
					<div class="progress-container rounded-0">
						<div class="progress-bar transition-2 linear rounded-0" id="level_bar" style="width: 0%;"></div>
						<div class="progress-content flex justify-center items_center text-bold"><span id="level_have">0</span> / <span id="level_next">100</span></div>
					</div>
				</div>
				
				<div class="pointer" data-modal="show" data-id="#modal_auth_settings"><i class="fa fa-cog" aria-hidden="true"></i></div>
				
				<div class="pointer" data-modal="show" data-id="#modal_auth_logout"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
				<?php } ?>
			</div>

				<a class="header-panel" href="<?php echo $site['root']; ?>profile">

					<div class="bg-main-transparent rounded-1 b-l2 pl-2 pr-2 flex items-center justify-center height-full">
						<img class="rounded-full" src="<?php echo $user['avatar']; ?>">
						
						<div class="ml-2"><?php echo $user['name']; ?></div>
					</div>
				</a>
				<?php }else{ ?>
				<div class="header-panel bg-light rounded-1 b-l2 flex items-center justify-center">
					<button class="site-button black height-full flex justify-center items-center pt-0 pb-0" data-modal="show" data-id="#modal_auth">LOGIN</button>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div class="header-min">
	<div class="header layout flex">
		<div class="header-logo justify-center">
			<a class="justify-center flex" href="<?php echo $site['root']; ?>">
				<img src="<?php echo $site['root']; ?>template/img/logo.png?v=<?php echo time(); ?>">
			</a>
		</div>
		
		<div class="flex items-center justify-end gap-2 height-full pr-2">
			<?php if($user){ ?>
			<a href="<?php echo $site['root']; ?>deposit">
				<div class="balances bg-light rounded-1 b-l2 pl-2 pr-2 flex row items-center justify-center height-full relative">
					<div class="balance flex row items-center justify-center gap-1" data-balance="total">
						<div class="coins"></div>
						<span class="amount">0.00</span>
					</div>
					
					<!--<div class="balances-panel b-m2 bg-light rounded-1 p-2 flex column items-start justify-center gap-1 hidden">
						<div class="balance flex row items-center justify-center gap-1" data-balance="balance">
							<span>Balance:</span>
							<span class="amount">0.00</span>
						</div>
					</div>-->
				</div>
			</a>
			<?php }else{ ?>
			<div class="header-panel bg-light rounded-1 b-l2 flex items-center justify-center">
				<button class="site-button black height-full flex justify-center items-center pt-0 pb-0" data-modal="show" data-id="#modal_auth">LOGIN</button>
			</div>
			<?php } ?>
		
			<button class="site-button pullout_view" data-pullout="menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
		</div>
	</div>
</div>