<?php if ($user['rank'] != 100) exit; ?>
<div class="p-2">
	<div class="grid split-column-full responsive gap-1 mb-2">
		<a href="<?php echo $site['root']; ?>admin/control"><button class="site-button black active width-full">Control</button></a>
		<a href="<?php echo $site['root']; ?>admin/users"><button class="site-button black width-full">Users</button></a>
		<a href="<?php echo $site['root']; ?>admin/trades"><button class="site-button black width-full">Trades</button></a>
	</div>
	
	<div class="width-12 flex row responsive gap-2">
		<div class="width-5 responsive flex column gap-2 height-full bg-light-transparent rounded-1 b-l2 p-2">
			<div class="flex column mt-2 gap-2 text-left">
				<div class="font-8">Status Server - <span class="text-success">Running</span></div>
				<div class="font-8">Maintenance - <?php if($response['settings']['maintenance']['status']){ ?><span class="text-success">Active - Reason: <?php echo $response['settings']['maintenance']['reason']; ?></span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
				<div class="font-8">Status Games - <?php if($response['settings']['games']['status']){ ?><span class="text-success">Active</span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
				<div class="font-8">Status Trades - <?php if($response['settings']['trades']['status']){ ?><span class="text-success">Active</span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
			</div>
			
			<div class="flex column mt-2 gap-2 text-left">
				<div class="font-8">Roulette - <?php if($response['settings']['games']['enable']['roulette']){ ?><span class="text-success">Active</span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
				<div class="font-8">Crash - <?php if($response['settings']['games']['enable']['crash']){ ?><span class="text-success">Active</span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
				<div class="font-8">Jackpot - <?php if($response['settings']['games']['enable']['jackpot']){ ?><span class="text-success">Active</span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
				<div class="font-8">Coinflip - <?php if($response['settings']['games']['enable']['coinflip']){ ?><span class="text-success">Active</span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
				<div class="font-8">Unbox - <?php if($response['settings']['games']['enable']['unbox']){ ?><span class="text-success">Active</span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
				<div class="font-8">Tower - <?php if($response['settings']['games']['enable']['tower']){ ?><span class="text-success">Active</span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
			</div>
		</div>

		<div class="width-7 responsive flex column gap-2 height-full bg-light-transparent rounded-1 b-l2 p-2">
			<div class="flex column gap-2 text-left">
				<div class="flex column items-start gap-2">
					<div class="text-left font-8">Maintenance</div>
					
					<div class="flex row responsive gap-2 width-full">
						<div class="dropdown_field transition-5">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="admin_maintenance_status" value="1">
									<div class="field_dropdown"></div>
								
									<div class="field_element_dropdowns">
										<div class="field_element_dropdown" value="1" data-index="0">Enable</div>
										<div class="field_element_dropdown" value="0" data-index="1">Disable</div>
									</div>
								
									<div class="field_label active transition-5">Status</div>
								</div>
								
								<div class="field_extra">
									<div class="field_caret">
										<i class="fa fa-caret-down"></i>
									</div>
								</div>
							</div>
							
							<div class="field_bottom"></div>
						</div>
						
						<div class="input_field transition" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="admin_maintenance_reason" value="">
									
									<div class="field_label transition">Reason</div>
								</div>
								
								<div class="field_extra">
									<button class="site-button purple" id="admin_maintenance_set">Set</button>
								</div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="flex column items-start gap-2">
					<div class="text-left font-8">Games</div>
					
					<div class="flex row responsive items-center gap-2">
						<div class="dropdown_field transition-5">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input admin_control_settings" data-settings="games_status" value="<?php echo $response['settings']['games']['status'] ? '1' : '0'; ?>">
									<div class="field_dropdown"></div>
								
									<div class="field_element_dropdowns">
										<div class="field_element_dropdown" value="1" data-index="0">Enable</div>
										<div class="field_element_dropdown" value="0" data-index="1">Disable</div>
									</div>
								
									<div class="field_label active transition-5">Status</div>
								</div>
								
								<div class="field_extra">
									<div class="field_caret">
										<i class="fa fa-caret-down"></i>
									</div>
								</div>
							</div>
							
							<div class="field_bottom"></div>
						</div>
						
						<button class="site-button purple admin_settings_set" data-settings="games_status">Set</button>
					</div>
				</div>
				
				<div class="flex column items-start gap-2">
					<div class="text-left font-8">Trades</div>
					
					<div class="flex row responsive items-center gap-2">
						<div class="dropdown_field transition-5">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input admin_control_settings" data-settings="trades_status" value="<?php echo $response['settings']['trades']['status'] ? '1' : '0'; ?>">
									<div class="field_dropdown"></div>
								
									<div class="field_element_dropdowns">
										<div class="field_element_dropdown" value="1" data-index="0">Enable</div>
										<div class="field_element_dropdown" value="0" data-index="1">Disable</div>
									</div>
								
									<div class="field_label active transition-5">Status</div>
								</div>
								
								<div class="field_extra">
									<div class="field_caret">
										<i class="fa fa-caret-down"></i>
									</div>
								</div>
							</div>
							
							<div class="field_bottom"></div>
						</div>
						
						<button class="site-button purple admin_settings_set" data-settings="trades_status">Set</button>
					</div>
				</div>
				
				<div class="flex column items-start gap-2">
					<div class="text-left font-8">Games</div>
					
					<div class="inline-block width-full">
						<div class="switch_field height-full transition-5">
							<div class="field_container">
								<div class="field_content">
									<input type="checkbox" class="field_element_input admin_games_settings" data-settings="games_enable_roulette" <?php if($response['settings']['games']['enable']['roulette']){ ?>checked<?php } ?>>
									
									<div class="field_switch">
										<div class="field_switch_bar"></div>
									</div>
									
									<div class="field_label active transition-5">Roulette</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom"></div>
						</div>
						
						<div class="switch_field height-full transition-5">
							<div class="field_container">
								<div class="field_content">
									<input type="checkbox" class="field_element_input admin_games_settings" data-settings="games_enable_crash" <?php if($response['settings']['games']['enable']['crash']){ ?>checked<?php } ?>>
									
									<div class="field_switch">
										<div class="field_switch_bar"></div>
									</div>
									
									<div class="field_label active transition-5">Crash</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom"></div>
						</div>
						
						<div class="switch_field height-full transition-5">
							<div class="field_container">
								<div class="field_content">
									<input type="checkbox" class="field_element_input admin_games_settings" data-settings="games_enable_jackpot" <?php if($response['settings']['games']['enable']['jackpot']){ ?>checked<?php } ?>>
									
									<div class="field_switch">
										<div class="field_switch_bar"></div>
									</div>
									
									<div class="field_label active transition-5">Jackpot</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom"></div>
						</div>
						
						<div class="switch_field height-full transition-5">
							<div class="field_container">
								<div class="field_content">
									<input type="checkbox" class="field_element_input admin_games_settings" data-settings="games_enable_coinflip" <?php if($response['settings']['games']['enable']['coinflip']){ ?>checked<?php } ?>>
									
									<div class="field_switch">
										<div class="field_switch_bar"></div>
									</div>
									
									<div class="field_label active transition-5">Coinflip</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom"></div>
						</div>
						
						<div class="switch_field height-full transition-5">
							<div class="field_container">
								<div class="field_content">
									<input type="checkbox" class="field_element_input admin_games_settings" data-settings="games_enable_unbox" <?php if($response['settings']['games']['enable']['unbox']){ ?>checked<?php } ?>>
									
									<div class="field_switch">
										<div class="field_switch_bar"></div>
									</div>
									
									<div class="field_label active transition-5">Unbox</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom"></div>
						</div>
						
						<div class="switch_field height-full transition-5">
							<div class="field_container">
								<div class="field_content">
									<input type="checkbox" class="field_element_input admin_games_settings" data-settings="games_enable_tower" <?php if($response['settings']['games']['enable']['tower']){ ?>checked<?php } ?>>
									
									<div class="field_switch">
										<div class="field_switch_bar"></div>
									</div>
									
									<div class="field_label active transition-5">Tower</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom"></div>
						</div>
					</div>
				</div>
				
				<div class="flex column items-start gap-2">
					<div class="text-left font-8">Admin Access - <span class="text-success"><?php echo implode(', ', $response['settings']['allowed']['admin']); ?></span></div>
					
					<div class="input_field transition" data-border="#de4c41">
						<div class="field_container">
							<div class="field_content">
								<input type="text" class="field_element_input" id="admin_admin_access_userid" value="">
								
								<div class="field_label transition">User Id</div>
							</div>
							
							<div class="field_extra">
								<button class="site-button purple" id="admin_admin_access_set">Set</button>
								<button class="site-button purple" id="admin_admin_access_unset">Unset</button>
							</div>
						</div>
						
						<div class="field_bottom">
							<div class="field_error" data-error="required">This field is required</div>
						</div>
					</div>
				</div>
				
				<div class="flex column items-start gap-2">
					<div class="text-left font-8">Dashboard Access - <span class="text-success"><?php echo implode(', ', $response['settings']['allowed']['dashboard']); ?></span></div>
					
					<div class="input_field transition" data-border="#de4c41">
						<div class="field_container">
							<div class="field_content">
								<input type="text" class="field_element_input" id="admin_dashboard_access_userid" value="">
								
								<div class="field_label transition">User Id</div>
							</div>
							
							<div class="field_extra">
								<button class="site-button purple" id="admin_dashboard_access_set">Set</button>
								<button class="site-button purple" id="admin_dashboard_access_unset">Unset</button>
							</div>
						</div>
						
						<div class="field_bottom">
							<div class="field_error" data-error="required">This field is required</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>