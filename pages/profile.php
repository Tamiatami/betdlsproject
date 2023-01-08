<div class="p-2">
	<?php if(in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile']) || !$response['looking'] || !$response['profile']['private']){ ?>
	<div class="grid split-column-full responsive gap-1 mb-2">
		<button class="site-button black switch_panel active" data-id="profile" data-panel="summary">Summary</button>
		<?php if(in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile']) || !$response['looking']){ ?>
		<button class="site-button black switch_panel" data-id="profile" data-panel="crypto_offers">Crypto Order</button>
		<button class="site-button black switch_panel" data-id="profile" data-panel="dl_deposits_offers">Deposits DL Order</button>
		<button class="site-button black switch_panel" data-id="profile" data-panel="dl_automatically_offers">Automatic DL Order</button>
		<button class="site-button black switch_panel" data-id="profile" data-panel="dl_manually_offers">Manual DL Order</button>
		<button class="site-button black switch_panel" data-id="profile" data-panel="transactions">Transactions</button>
		<button class="site-button black switch_panel" data-id="profile" data-panel="transfers">Transfers</button>
		<?php } ?> 
		<button class="site-button black switch_panel" data-id="profile" data-panel="stats">Stats</button>
	</div>
	
	<?php
	
	$level = calculateLevel($response['profile']['xp']);
	
	$level_class = array('tier-steel', 'tier-bronze', 'tier-silver', 'tier-gold', 'tier-diamond')[intval($level['level'] / 25)];
	$rank_name = $site['ranks_name'][$response['profile']['rank']];
	
	?>
	
	<div class="switch_content" data-id="profile" data-panel="summary">
		<div class="flex column responsive gap-1">
			<div class="grid split-column-2 responsive gap-1">
				<div class="flex column gap-2 bg-light-transparent rounded-1 b-l2 p-2">
					<div class="flex column justify-center gap-2">
						<div class="avatar-field <?php echo $level_class; ?>">
							<div class="inline-block relative">
								<img class="avatar icon-large rounded-full" src="<?php if($response['profile']['anonymous'] && !in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile']) && $response['looking']) { ?>http://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg<?php } else { ?><?php echo $response['profile']['avatar']; ?><?php } ?>">
							</div>
						</div>
						
						<div>
							<div class="flex justify-center gap-2 text-upper text-bold ellipsis">
								<div class="chat-link-<?php echo $rank_name; ?>"><?php echo $rank_name; ?></div>
								
								<div><?php if($response['profile']['anonymous'] && !in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile']) && $response['looking']) { ?>[anonymous]<?php } else { ?><?php echo $response['profile']['name']; ?><?php } ?></div>
							</div>
							
							<div class="ellipsis font-6"><?php echo $response['profile']['username']; ?> (<?php echo $response['profile']['userid']; ?>)</div>
						</div>
					</div>
					
					<div class="flex justify-center">
						<button class="site-button purple" data-modal="show" data-id="#modal_avatar">Change Profile Picture</button>
					</div>
					
					<div class="flex responsive justify-center items-center">
						<div class="flex column items-center justify-center">
							<div class="text-color font-10"><?php echo getFormatAmountString($response['user_stats']['win']);?></div>
							<div>WIN</div>
						</div>
						
						<div class="bg-main-transparent rounded-full b-m2 p-3 ml-2 mr-2 flex justify-center items-center text-bold font-8"><div class="absolute">-</div></div>
						
						<div class="flex column items-center justify-center">
							<div class="text-color font-10"><?php echo getFormatAmountString($response['user_stats']['bet']);?></div>
							<div>BET</div>
						</div>
						
						<div class="bg-main-transparent rounded-full b-m2 p-3 ml-2 mr-2 flex justify-center items-center text-bold font-8"><div class="absolute">=</div></div>
						
						<div class="flex column items-center justify-center">
							<div class="text-color font-10"><?php echo getFormatAmountString($response['user_stats']['win'] - $response['user_stats']['bet']);?></div>
							<div>PROFIT</div>
						</div>
					</div>
				</div>
				
				<div class="bg-light-transparent rounded-1 b-l2 p-2">
					<div class="text-left">
						<?php if(!$response['looking']){ ?>
							<div class="font-8">Gain xp by playing any of our games!</div>
							<div class="font-12">Lvl <?php echo $level['level']; ?>.</div>
							
							<div class="font-8">You got <?php echo $level['have']; ?> / <?php echo $level['next']; ?> of the xp needed to level up.</div>
							<div class="font-8">Level completion status: <?php echo number_format(roundedToFixed(($level['have'] - $level['start']) / ($level['next'] - $level['start']) * 100, 2), 2, '.', ''); ?>%.</div>
						<?php } else { ?>
							<div class="font-12"><?php if($response['profile']['anonymous'] && !in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile']) && $response['looking']) { ?>[anonymous]<?php } else { ?><?php echo $response['profile']['name']; ?><?php } ?> Lvl <?php echo $level['level']; ?>.</div>
							
							<div class="font-8"><?php if($response['profile']['anonymous'] && !in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile']) && $response['looking']) { ?>[anonymous]<?php } else { ?><?php echo $response['profile']['name']; ?><?php } ?> has <?php echo $level['have']; ?> / <?php echo $level['next']; ?> xp needed for the next level.</div>
							<div class="font-8">Level completion status: <?php echo number_format(roundedToFixed(($level['have'] - $level['start']) / ($level['next'] - $level['start']) * 100, 2), 2, '.', ''); ?>%.</div>
						<?php } ?>
					</div>
					
					<div class="progress-container small width-full rounded-0 mt-2">
						<div class="progress-bar rounded-0" style="width: <?php echo number_format(roundedToFixed(($level['have'] - $level['start']) / ($level['next'] - $level['start']) * 100, 2), 2, '.', ''); ?>%"></div>
					</div>
				</div>
			</div>

			<div class="grid split-column-2 responsive gap-1">
				<div class="bg-light-transparent rounded-1 b-l2 p-2">
					<div class="title-page flex items-center justify-center mb-2">Profile Overview</div>
					
					<?php if(!$response['looking']){ ?>
					<div class="flex column items-start gap-1">
						<div class="text-left font-8">Registed - <?php echo makeDate($response['profile']['time_create']) ?></div>
						
						<div class="text-left font-8">Balance - <span class="text-success"><?php echo getFormatAmountString($response['profile']['balance']); ?></span></div>

						
						<div class="flex column items-start gap-1">
							<div class="text-left font-8">Profile Status - <?php if($response['profile']['verified']) { ?><span class="text-success">Verified</span><?php } else { ?><span class="text-danger">Unverified</span><?php } ?></div>
							<?php if(!$response['profile']['verified']) { ?>
							<div class="text-left">If you haven not recieved a verification e-mail you can resend it.</div>
							<button class="site-button purple" id="resend_verify">Send verification e-mail</button>
							<?php } ?>
						</div>
					
						<div class="flex row gap-2">
							<div class="switch_field height-full transition-5">
								<div class="field_container">
									<div class="field_content">
										<input type="checkbox" class="field_element_input change-setting" data-setting="sounds">
										
										<div class="field_switch">
											<div class="field_switch_bar"></div>
										</div>
										
										<div class="field_label active transition-5">Sounds</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom"></div>
							</div>
							
							<div class="text-left mt-2">If enabled, Game sounds will be ON.</div>
						</div>
						
						<!--<div class="flex row gap-2">
							<div class="switch_field height-full transition-5">
								<div class="field_container">
									<div class="field_content">
										<input type="checkbox" class="field_element_input change-setting" data-setting="anonymous">
										
										<div class="field_switch">
											<div class="field_switch_bar"></div>
										</div>
										
										<div class="field_label active transition-5">Anonymous</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom"></div>
							</div>
							
							<div class="text-left mt-2"> If enabled, your avatar and profile name will be anonymous.</div>
						</div> 						<div class="flex row gap-2">
							<div class="switch_field height-full transition-5">
								<div class="field_container">
									<div class="field_content">
										<input type="checkbox" class="field_element_input change-setting" data-setting="private">
										
										<div class="field_switch">
											<div class="field_switch_bar"></div>
										</div>
										
										<div class="field_label active transition-5">Private Mode</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom"></div>
							</div>
							
							<div class="text-left mt-2">If enabled, your profile will be set to private.</div>
						</div>
						
						<div class="flex column items-start gap-1">
							<div class="text-left font-8">Choose the game to be displayed as main game in the menu.</div>
							
							<div class="dropdown_field transition-5" data-dropdown="0">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input change-setting" data-setting="game" value="roulette">
										<div class="field_dropdown"></div>
									
										<div class="field_element_dropdowns">
											<div class="field_element_dropdown" value="roulette" data-index="0">Roulette</div>
											<div class="field_element_dropdown" value="crash" data-index="1">Crash</div>
											<div class="field_element_dropdown" value="coinflip" data-index="3">Coinflip</div>
										</div>
									
										<div class="field_label active transition-5">Favorite game</div>
									</div>
									
									<div class="field_extra">
										<div class="field_caret">
											<i class="fa fa-caret-down"></i>
										</div>
									</div>
								</div>
								
								<div class="field_bottom"></div>
							</div>
						</div>
						
						<div class="flex column items-start gap-1 width-full">
							<div class="text-left font-8">Bind Account</div>
							
							<div class="grid split-column-3 gap-1 width-full">
								<?php if(!$response['user_binds']['google']['bind']){ ?>
								<a href="<?php echo $site['root'];?>auth/google?assign=1&return=<?php echo $site['path'];?>">
									<button class="site-button purple width-full">Bind with Google</button>
								</a>
								<?php } else { ?>
								<button class="site-button disabled purple width-full">Binded with Google</button>
								<?php } ?>
								
								<?php if(!$response['user_binds']['steam']['bind']){ ?>
								<a href="<?php echo $site['root'];?>auth/steam?assign=1&return=<?php echo $site['path'];?>">
									<button class="site-button purple width-full">Bind with Steam</button>
								</a>
								<?php } else { ?>
								<button class="site-button disabled purple width-full">Binded with Steam</button>
								<?php } ?>
								
								<?php if(!$profile['user_binds']['facebook']['bind']){ ?>
								<a class="disabled" href="<?php echo $site['root'];?>auth/facebook?assign=1&return=<?php echo $site['path'];?>">
									<button class="site-button purple width-full">Bind with Facebook</button>
								</a>
								<?php } else { ?>
								<button class="site-button disabled purple width-full">Binded with Facebook</button>
								<?php } ?>
							</div>
						</div> -->
						
						<div class="flex column items-start gap-1 width-full">
							<div class="text-left font-8">Self Exclusion - <?php if($response['profile']['exclusion'] > time()) { ?><span class="text-success">Active - Expires <?php echo makeDate($response['profile']['exclusion']); ?></span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
							
							<div class="grid split-column-3 gap-1 width-full">
								<button class="site-button purple self_exclision" data-exclusion="24hours">24 hours</button>
								<button class="site-button purple self_exclision" data-exclusion="7days">7 days</button>
								<button class="site-button purple self_exclision" data-exclusion="30days">30 days</button>
							</div>
							
							<div class="flex column items-start gap-1 text-left">
								<div class="text-indent-1">By enabling self exclusion you will not be able to claim rewards, place bets or deposit until the restriction expires.</div>
								<div>The chat option and Withdrawals will remain as usual. Use this option if you would like to take a break for some time. If you wish to do custom restrictions please contact us on Discord by creating a ticket or on the website.</div>
								<div class="text-danger">While active, we will NOT remove the self exclusion for ANY reason, even if you change your mind.</div>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="flex column items-start gap-2">
						<div class="text-left font-8">Registed - <?php echo makeDate($response['profile']['time_create']) ?></div>
						
						<?php if(in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile'])){ ?>
						<div class="text-left font-8">Balance - <span class="text-success"><?php echo getFormatAmountString($response['profile']['balance']); ?></span></div>
						<?php } ?>
						
						<?php if(in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile'])){ ?>
						<div class="text-left font-8">Available Withdraw - <span class="text-success"><?php echo getFormatAmountString($response['profile']['available']); ?></span></div>
						<?php } ?>
						
						<?php if(in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile'])){ ?>
						<div class="text-left font-8">Profile Status - <?php if($response['profile']['verified']) { ?><span class="text-success">Verified</span><?php } else { ?><span class="text-danger">Unverified</span><?php } ?></div>
						<div class="text-left font-8">Anonymous - <?php if($response['profile']['anonymous']) { ?><span class="text-danger">Active</span><?php } else { ?><span class="text-success">Inactive</span><?php } ?></div>
						<div class="text-left font-8">Private Mode - <?php if($response['profile']['private']) { ?><span class="text-danger">Private</span><?php } else { ?><span class="text-success">Public</span><?php } ?></div>
						
						<div class="text-left font-8">Bind Account Steam - <?php if($response['user_binds']['steam']['bind']) { ?><a class="text-success" href="https://steamcommunity.com/profiles/<?php echo $response['user_binds']['steam']['bindid']; ?>" target="_blank">Yes (<?php echo $response['user_binds']['steam']['bindid']; ?>)</a><?php } else { ?><span class="text-danger">No</span><?php } ?></div>
						<div class="text-left font-8">Bind Account Google - <?php if($response['user_binds']['google']['bind']) { ?><span class="text-success">Yes (<?php echo $response['user_binds']['google']['bindid']; ?>)</span><?php } else { ?><span class="text-danger">No</span><?php } ?></div>
						<div class="text-left font-8">Bind Account Facebook - <?php if($response['user_binds']['facebook']['bind']) { ?><span class="text-success">Yes (<?php echo $response['user_binds']['facebook']['bindid']; ?>)</span><?php } else { ?><span class="text-danger">No</span><?php } ?></div>
						
						<?php if($response['profile']['exclusion'] > time()) { ?>
						<div class="text-left font-8 text-success">Self Exclusion Active - Expires <?php echo makeDate($response['profile']['exclusion']); ?></div>
						<?php } else { ?>
						<div class="text-left font-8 text-danger">Self Exclusion Inactive</div>
						<?php } ?>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				
				<?php if(!$response['looking']){ ?>
				<div class="bg-light-transparent rounded-1 b-l2 p-2">
					<div class="title-page flex items-center justify-center mb-2">Grow Settings</div>
				
					<div class="flex column items-start gap-2">
						<div class="input_field transition" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="dls_growid" value="<?php echo $response['profile']['growid'];?>">
									
									<div class="field_label transition">Real Growtopia GrowID</div>
								</div>
								
								<div class="field_extra">
									<button class="site-button purple" id="save_dls_growid">Confirm</button>
								</div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<?php if(in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile']) || !$response['looking']){ ?>
	<div class="switch_content hidden" data-id="profile" data-panel="crypto_offers">
		<div class="table-container">
			<div class="table-header">
				<div class="table-row">
					<div class="table-column text-left">Id</div>
					<div class="table-column text-left">TXN Id</div>
					<div class="table-column text-left">Amount</div>
					<div class="table-column text-left">Type</div>
					<div class="table-column text-left">Currency</div>
					<div class="table-column text-left">Status</div>
					<div class="table-column text-left">Date</div>
				</div>
			</div>
			
			<div class="table-body" id="crypto_transactions">
				<?php if(sizeof($response['crypto_transactions']['list']) > 0){?>
				<?php foreach($response['crypto_transactions']['list'] as $key => $value){ ?>
				<div class="table-row text-<?php if($value['status'] == 100 || ($value['status'] == 2 && $value['type'] == 'withdraw')) { ?>success<?php } else if($value['status'] < 0) { ?>danger<?php } else {?>warning<?php } ?>">
					<div class="table-column text-left">#<?php echo $value['id']; ?></div>
					<div class="table-column text-left"><?php echo $value['txnid']; ?></div>
					<div class="table-column text-left"><?php echo $value['amount']; ?></div>
					<div class="table-column text-left"><?php echo ucfirst($value['type']); ?></div>
					<div class="table-column text-left"><?php echo strtoupper($value['currency']); ?></div>
					<div class="table-column text-left"><?php if($value['status'] == 100 || ($value['status'] == 2 && $value['type'] == 'withdraw')){ ?>Completed<?php } else if($value['status'] < 0){ ?>Declined<?php } else {?>In progress<?php } ?></div>
					<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
				</div>
				<?php } ?>
				<?php } else { ?>
				<div class="table-row">
					<div class="table-column">No data found</div>
				</div>
				<?php } ?>
			</div>
			
			<div class="table-footer">
				<div class="flex items-center justify-center bg-dark p-2">
					<div class="pagination-content flex row gap-2" id="pagination_crypto_transactions">
						<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
						
						<div class="flex row gap-1">
							<?php $imin_page = $response['crypto_transactions']['page'] - 3; ?>
							<?php $imax_page = $response['crypto_transactions']['page'] + 3; ?>
							
							<?php $min_page = max(1, ($imin_page - (($imax_page > $response['crypto_transactions']['pages']) ? $imax_page - $response['crypto_transactions']['pages'] : 0))); ?>
							<?php $max_page = min($response['crypto_transactions']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
						
							<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
							<div class="pagination-item flex items-center justify-center <?php if($response['crypto_transactions']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
							<?php } ?>
						</div>
						
						<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['crypto_transactions']['pages']; ?>">»</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="switch_content hidden" data-id="profile" data-panel="dl_deposits_offers">
		<div class="table-container">
			<div class="table-header">
				<div class="table-row">
					<div class="table-column text-left">Id</div>
					<div class="table-column text-left">Amount</div>
					<div class="table-column text-left">Type</div>
					<div class="table-column text-left">World</div>
					<div class="table-column text-left">Growid</div>
					<div class="table-column text-left">Status</div>
					<div class="table-column text-left">Date</div>
				</div>
			</div>
			
			<div class="table-body" id="dl_transactions_deposit">
				<?php if(sizeof($response['dl_transactions_deposit']['list']) > 0){?>
				<?php foreach($response['dl_transactions_deposit']['list'] as $key => $value){ ?>
				<div class="table-row text-success">
					<div class="table-column text-left">#<?php echo $value['id']; ?></div>
					<div class="table-column text-left"><?php echo getFormatAmountString($value['amount']); ?></div>
					<div class="table-column text-left">Deposit</div>
					<div class="table-column text-left"><?php echo $value['world']; ?></div>
					<div class="table-column text-left"><?php echo $value['growid']; ?></div>
					<div class="table-column text-left"><?php if($value['inspected'] == 1){ ?>Completed<?php } else {?>In progress<?php } ?></div>
					<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
				</div>
				<?php } ?>
				<?php } else { ?>
				<div class="table-row">
					<div class="table-column">No data found</div>
				</div>
				<?php } ?>
			</div>
			
			<div class="table-footer">
				<div class="flex items-center justify-center bg-dark p-2">
					<div class="pagination-content flex row gap-2" id="pagination_dl_transactions_deposit">
						<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
						
						<div class="flex row gap-1">
							<?php $imin_page = $response['dl_transactions_deposit']['page'] - 3; ?>
							<?php $imax_page = $response['dl_transactions_deposit']['page'] + 3; ?>
							
							<?php $min_page = max(1, ($imin_page - (($imax_page > $response['dl_transactions_deposit']['pages']) ? $imax_page - $response['dl_transactions_deposit']['pages'] : 0))); ?>
							<?php $max_page = min($response['dl_transactions_deposit']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
						
							<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
							<div class="pagination-item flex items-center justify-center <?php if($response['dl_transactions_deposit']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
							<?php } ?>
						</div>
						
						<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['dl_transactions_deposit']['pages']; ?>">»</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="switch_content hidden" data-id="profile" data-panel="dl_automatically_offers">
		<div class="table-container">
			<div class="table-header">
				<div class="table-row">
					<div class="table-column text-left">Id</div>
					<div class="table-column text-left">Amount</div>
					<div class="table-column text-left">Type</div>
					<div class="table-column text-left">License</div>
					<div class="table-column text-left">Status</div>
					<div class="table-column text-left">Date</div>
				</div>
			</div>
			
			<div class="table-body" id="dl_transactions_automatically">
				<?php if(sizeof($response['dl_automatically_withdrawls']['list']) > 0){?>
				<?php foreach($response['dl_automatically_withdrawls']['list'] as $key => $value){ ?>
				<div class="table-row text-success">
					<div class="table-column text-left">#<?php echo $value['id']; ?></div>
					<div class="table-column text-left"><?php echo getFormatAmountString($value['amount']); ?></div>
					<div class="table-column text-left">Withdraw</div>
					<div class="table-column text-left">
						<button class="site-button purple show-world-license" id="show-world-licence" data-modal="show" data-id="#modal_show_world">
							Show World!	
						</button>
						<div style="display:none" id="world-licence-text"><?php echo $value['license']; ?></div>
					</div>
					<div class="table-column text-left">Completed</div>
					<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
				</div>
				<?php } ?>
				<?php } else { ?>
				<div class="table-row">
					<div class="table-column">No data found</div>
				</div>
				<?php } ?>
			</div>
			
			<div class="table-footer">
				<div class="flex items-center justify-center bg-dark p-2">
					<div class="pagination-content flex row gap-2" id="pagination_dl_transactions_automatically">
						<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
						
						<div class="flex row gap-1">
							<?php $imin_page = $response['dl_automatically_withdrawls']['page'] - 3; ?>
							<?php $imax_page = $response['dl_automatically_withdrawls']['page'] + 3; ?>
							
							<?php $min_page = max(1, ($imin_page - (($imax_page > $response['dl_automatically_withdrawls']['pages']) ? $imax_page - $response['dl_automatically_withdrawls']['pages'] : 0))); ?>
							<?php $max_page = min($response['dl_automatically_withdrawls']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
						
							<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
							<div class="pagination-item flex items-center justify-center <?php if($response['dl_automatically_withdrawls']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
							<?php } ?>
						</div>
						
						<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['dl_automatically_withdrawls']['pages']; ?>">»</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="switch_content hidden" data-id="profile" data-panel="dl_manually_offers">
		<div class="table-container">
			<div class="table-header">
				<div class="table-row">
					<div class="table-column text-left">Id</div>
					<div class="table-column text-left">Amount</div>
					<div class="table-column text-left">Type</div>
					<div class="table-column text-left">World</div>
					<div class="table-column text-left">GrowId</div>
					<div class="table-column text-left">Method</div>
					<div class="table-column text-left">Status</div>
					<div class="table-column text-left">Date</div>
				</div>
			</div>
			
			<div class="table-body" id="dl_transactions_manually">
				<?php if(sizeof($response['dl_manually_withdrawls']['list']) > 0){?>
				<?php foreach($response['dl_manually_withdrawls']['list'] as $key => $value){ ?>
				<div class="table-row text-<?php if($value['status'] == 1) { ?>success<?php } else if($value['status'] == -1) { ?>danger<?php } else {?>warning<?php } ?>">
					<div class="table-column text-left">#<?php echo $value['id']; ?></div>
					<div class="table-column text-left"><?php echo getFormatAmountString($value['amount']); ?></div>
					<div class="table-column text-left">Withdraw</div>
					<div class="table-column text-left"><?php echo $value['world']; ?></div>
					<div class="table-column text-left"><?php echo $value['growid']; ?></div>
					<div class="table-column text-left"><?php echo $value['method']; ?></div>
					<div class="table-column text-left"><div class="table-column text-left"><?php if($value['status'] == 1){ ?>Completed<?php } else if($value['status'] == -1){ ?>Declined<?php } else {?>In progress<?php } ?></div></div>
					<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
				</div>
				<?php } ?>
				<?php } else { ?>
				<div class="table-row">
					<div class="table-column">No data found</div>
				</div>
				<?php } ?>
			</div>
			
			<div class="table-footer">
				<div class="flex items-center justify-center bg-dark p-2">
					<div class="pagination-content flex row gap-2" id="pagination_dl_transactions_manually">
						<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
						
						<div class="flex row gap-1">
							<?php $imin_page = $response['dl_manually_withdrawls']['page'] - 3; ?>
							<?php $imax_page = $response['dl_manually_withdrawls']['page'] + 3; ?>
							
							<?php $min_page = max(1, ($imin_page - (($imax_page > $response['dl_manually_withdrawls']['pages']) ? $imax_page - $response['dl_manually_withdrawls']['pages'] : 0))); ?>
							<?php $max_page = min($response['dl_manually_withdrawls']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
						
							<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
							<div class="pagination-item flex items-center justify-center <?php if($response['dl_manually_withdrawls']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
							<?php } ?>
						</div>
						
						<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['dl_manually_withdrawls']['pages']; ?>">»</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="switch_content hidden" data-id="profile" data-panel="transactions">
		<div class="table-container">
			<div class="table-header">
				<div class="table-row">
					<div class="table-column text-left">Id</div>
					<div class="table-column text-left">Service</div>
					<div class="table-column text-left"> Amount (DLS)</div>
					<div class="table-column text-left">Date</div>
				</div>
			</div>
			
			<div class="table-body" id="user_transactions">
				<?php if(sizeof($response['user_transactions']['list']) > 0){ ?>
				<?php foreach($response['user_transactions']['list'] as $key => $value){ ?>
				<div class="table-row text-<?php if($value['amount'] < 0) { ?>danger<?php } else { ?>success<?php } ?>">
					<div class="table-column text-left">#<?php echo $value['id']; ?></div>
					<div class="table-column text-left"><?php echo ucfirst(implode(' ', explode('_', $value['service']))); ?></div>
					<div class="table-column text-left"><?php echo getFormatAmountString($value['balance']) . ' ' . (($value['amount'] < 0) ? '-' : '+') . ' ' . getFormatAmountString(abs($value['amount'])) . ' = ' . getFormatAmountString($value['balance'] + $value['amount']); ?></div>
					<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
				</div>
				<?php } ?>
				<?php } else { ?>
				<div class="table-row">
					<div class="table-column">No data found</div>
				</div>
				<?php } ?>
			</div>
			
			<div class="table-footer">
				<div class="flex items-center justify-center bg-dark p-2">
					<div class="pagination-content flex row gap-2" id="pagination_user_transactions">
						<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
						
						<div class="flex row gap-1">
							<?php $imin_page = $response['user_transactions']['page'] - 3; ?>
							<?php $imax_page = $response['user_transactions']['page'] + 3; ?>
							
							<?php $min_page = max(1, ($imin_page - (($imax_page > $response['user_transactions']['pages']) ? $imax_page - $response['user_transactions']['pages'] : 0))); ?>
							<?php $max_page = min($response['user_transactions']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
						
							<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
							<div class="pagination-item flex items-center justify-center <?php if($response['user_transactions']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
							<?php } ?>
						</div>
						
						<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['user_transactions']['pages']; ?>">»</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="switch_content hidden" data-id="profile" data-panel="transfers">
		<div class="table-container">
			<div class="table-header">
				<div class="table-row">
					<div class="table-column text-left">Id</div>
					<div class="table-column text-left">From</div>
					<div class="table-column text-left">To</div>
					<div class="table-column text-left">Amount</div>
					<div class="table-column text-left">Date</div>
				</div>
			</div>
			
			<div class="table-body" id="user_transfers">
				<?php if(sizeof($response['user_transfers']['list']) > 0){?>
				<?php foreach($response['user_transfers']['list'] as $key => $value){ ?>
					<div class="table-row text-<?php if($value['to_userid'] == $response['profile']['userid']) { ?>success<?php } else { ?>danger<?php } ?>">
						<div class="table-column text-left"><?php echo $value['id']; ?></div>
						<div class="table-column text-left"><?php echo ($value['from_userid'] == $response['profile']['userid']) ? (in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile']) && $response['looking'] ? 'HIM' : 'YOU') : $value['from_userid']; ?></div>
						<div class="table-column text-left"><?php echo ($value['to_userid'] == $response['profile']['userid']) ? (in_array($site['ranks_name'][$user['rank']], $site['permissions']['profile']) && $response['looking'] ? 'HIM' : 'YOU') : $value['to_userid']; ?></div>
						<div class="table-column text-left">$<?php echo getFormatAmountString($value['amount']); ?></div>
						<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
					</div>
				<?php } ?>
				<?php } else { ?>
				<div class="table-row">
					<div class="table-column">No data found</div>
				</div>
				<?php } ?>
			</div>
			
			<div class="table-footer">
				<div class="flex items-center justify-center bg-dark p-2">
					<div class="pagination-content flex row gap-2" id="pagination_user_transfers">
						<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
						
						<div class="flex row gap-1">
							<?php $imin_page = $response['user_transfers']['page'] - 3; ?>
							<?php $imax_page = $response['user_transfers']['page'] + 3; ?>
							
							<?php $min_page = max(1, ($imin_page - (($imax_page > $response['user_transfers']['pages']) ? $imax_page - $response['user_transfers']['pages'] : 0))); ?>
							<?php $max_page = min($response['user_transfers']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
						
							<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
							<div class="pagination-item flex items-center justify-center <?php if($response['user_transfers']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
							<?php } ?>
						</div>
						
						<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['user_transfers']['pages']; ?>">»</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	
	<div class="switch_content hidden" data-id="profile" data-panel="stats">
		<div class="flex responsive gap-1">
			<div class="width-6 responsive text-left">
				<div class="text-color mb-1 font-8">Games Stats</div>
				
				<div class="table-container">
					<div class="table-header">
						<div class="table-row">
							<div class="table-column text-left">Game</div>
							<div class="table-column text-left">Bets</div>
							<div class="table-column text-left">Wins</div>
							<div class="table-column text-left">Profit</div>
						</div>
					</div>
					
					<div class="table-body">
						<div class="table-row">
							<?php $profit_roulette = $response['games_stats']['roulette']['win'] - $response['games_stats']['roulette']['bet']; ?>
							
							<div class="table-column text-left">Roulette</div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['roulette']['bet']); ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['roulette']['win']); ?></div>
							<div class="table-column text-left <?php echo $profit_roulette > 0 ? 'text-success' : 'text-danger'; ?>"><?php echo getFormatAmountString($response['games_stats']['roulette']['win'] - $response['games_stats']['roulette']['bet']); ?></div>
						</div>
						
						<div class="table-row">
							<?php $profit_crash = $response['games_stats']['crash']['win'] - $response['games_stats']['crash']['bet']; ?>
							
							<div class="table-column text-left">Crash</div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['crash']['bet']); ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['crash']['win']); ?></div>
							<div class="table-column text-left <?php echo $profit_crash > 0 ? 'text-success' : 'text-danger'; ?>"><?php echo getFormatAmountString($response['games_stats']['crash']['win'] - $response['games_stats']['crash']['bet']); ?></div>
						</div>
						
						<div class="table-row">
							<?php $profit_jackpot = $response['games_stats']['jackpot']['win'] - $response['games_stats']['jackpot']['bet']; ?>
							
							<div class="table-column text-left">Jackpot</div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['jackpot']['bet']); ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['jackpot']['win']); ?></div>
							<div class="table-column text-left <?php echo $profit_jackpot > 0 ? 'text-success' : 'text-danger'; ?>"><?php echo getFormatAmountString($response['games_stats']['jackpot']['win'] - $response['games_stats']['jackpot']['bet']); ?></div>
						</div>
						
						<div class="table-row">
							<?php $profit_coinflip = $response['games_stats']['coinflip']['win'] - $response['games_stats']['coinflip']['bet']; ?>
							
							<div class="table-column text-left">Coinflip</div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['coinflip']['bet']); ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['coinflip']['win']); ?></div>
							<div class="table-column text-left <?php echo $profit_coinflip > 0 ? 'text-success' : 'text-danger'; ?>"><?php echo getFormatAmountString($response['games_stats']['coinflip']['win'] - $response['games_stats']['coinflip']['bet']); ?></div>
						</div>
						
						<div class="table-row">
							<?php $profit_unbox = $response['games_stats']['unbox']['win'] - $response['games_stats']['unbox']['bet']; ?>
							
							<div class="table-column text-left">Unbox</div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['unbox']['bet']); ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['unbox']['win']); ?></div>
							<div class="table-column text-left <?php echo $profit_unbox > 0 ? 'text-success' : 'text-danger'; ?>"><?php echo getFormatAmountString($response['games_stats']['unbox']['win'] - $response['games_stats']['unbox']['bet']); ?></div>
						</div>
						
						<div class="table-row">
							<?php $profit_tower = $response['games_stats']['tower']['win'] - $response['games_stats']['tower']['bet']; ?>
							
							<div class="table-column text-left">Tower</div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['tower']['bet']); ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['games_stats']['tower']['win']); ?></div>
							<div class="table-column text-left <?php echo $profit_tower > 0 ? 'text-success' : 'text-danger'; ?>"><?php echo getFormatAmountString($response['games_stats']['tower']['win'] - $response['games_stats']['tower']['bet']); ?></div>
						</div>
					</div>
					
					<div class="table-footer">
						<div class="table-row">
							<?php $profit_total = ($response['games_stats']['roulette']['win'] + $response['games_stats']['crash']['win'] + $response['games_stats']['jackpot']['win'] + $response['games_stats']['coinflip']['win'] + $response['games_stats']['coinflip']['refund']) - ($response['games_stats']['roulette']['bet'] + $response['games_stats']['crash']['bet'] + $response['games_stats']['jackpot']['bet'] + $response['games_stats']['coinflip']['bet'] + $response['games_stats']['unbox']['bet'] + $response['games_stats']['tower']['bet']); ?>
							
							<div class="table-column text-left">Total:</div>
							<div class="table-column text-left text-color"><?php echo getFormatAmountString($response['games_stats']['roulette']['bet'] + $response['games_stats']['crash']['bet'] + $response['games_stats']['jackpot']['bet'] + $response['games_stats']['coinflip']['bet'] + $response['games_stats']['unbox']['bet'] + $response['games_stats']['tower']['bet']); ?></div>
							<div class="table-column text-left text-color"><?php echo getFormatAmountString($response['games_stats']['roulette']['win'] + $response['games_stats']['crash']['win'] + $response['games_stats']['jackpot']['win'] + $response['games_stats']['coinflip']['win'] + $response['games_stats']['coinflip']['refund'] + $response['games_stats']['unbox']['win'] + $response['games_stats']['tower']['win']); ?></div>
							<div class="table-column text-left <?php echo $profit_total > 0 ? 'text-success' : 'test-danger'; ?>"><?php echo getFormatAmountString($profit_total); ?></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="width-6 responsive text-left">
				<div class="text-color mb-1 font-8">Offers stats</div>
				
				<div class="table-container">
					<div class="table-header">
						<div class="table-row">
							<div class="table-column text-left">Offer</div>
							<div class="table-column text-left">Count</div>
							<div class="table-column text-left">Total</div>
						</div>
					</div>
					
					<div class="table-body">
						<div class="table-row">
							<div class="table-column text-left">Deposit</div>
							<div class="table-column text-left"><?php echo $response['offers_stats']['deposit']['count']; ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['offers_stats']['deposit']['total']); ?></div>
						</div>
						
						<div class="table-row">
							<div class="table-column text-left">Withdraw</div>
							<div class="table-column text-left"><?php echo $response['offers_stats']['withdraw']['count']; ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($response['offers_stats']['withdraw']['total']); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } else { ?>
	<div>This profile is private.</div>
	<?php } ?>