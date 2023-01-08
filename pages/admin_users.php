<?php if ($user['rank'] != 100) exit; ?>
<div class="p-2">
	<div class="grid split-column-full responsive gap-1 mb-2">
		<a href="<?php echo $site['root']; ?>admin/control"><button class="site-button black width-full">Control</button></a>
		<a href="<?php echo $site['root']; ?>admin/users"><button class="site-button black active width-full">Users</button></a>
		<a href="<?php echo $site['root']; ?>admin/trades"><button class="site-button black width-full">Trades</button></a>
	</div>
	
	<div class="<?php if($response['user']) { ?>hidden<?php } ?>">
		<div class="flex column gap-1">
			<div class="flex gap-1">
				<div class="input_field bet_input_field transition-5" data-border="#de4c41">
					<div class="field_container">
						<div class="field_content">
							<input type="text" class="field_element_input" id="admin_users_filter" value="">
							
							<div class="field_label transition-5">Search User</div>
						</div>
						
						<div class="field_extra">
							<button class="site-button purple" id="admin_users_search">Search</button>
						</div>
					</div>
					
					<div class="field_bottom"></div>
				</div>
				
				<div class="dropdown_field transition-5">
					<div class="field_container">
						<div class="field_content">
							<input type="text" class="field_element_input" id="admin_users_order" value="0">
							<div class="field_dropdown"></div>
						
							<div class="field_element_dropdowns">
								<div class="field_element_dropdown" value="0" data-index="0">Registed date</div>
								<div class="field_element_dropdown" value="1" data-index="1">Name A-Z</div>
								<div class="field_element_dropdown" value="2" data-index="2">Name Z-A</div>
								<div class="field_element_dropdown" value="3" data-index="3">Balance acending</div>
								<div class="field_element_dropdown" value="4" data-index="4">Balance descending</div>
								<div class="field_element_dropdown" value="5" data-index="5">Rank</div>
							</div>
						
							<div class="field_label active transition-5">Order by</div>
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
		</div>
		
		<div class="table-container">
			<div class="table-header">
				<div class="table-row">
					<div class="table-column text-left">User</div>
					<div class="table-column text-left">User Id</div>
					<div class="table-column text-left">Balance</div>
					<div class="table-column text-left">Rank</div>
					<div class="table-column text-left">Registed date</div>
					<div class="table-column text-right">Action</div>
				</div>
			</div>
			<div class="table-body" id="admin_users_list">
				<?php if(sizeof($response['users']['list']) > 0){?>
				<?php foreach($response['users']['list'] as $key => $value){ ?>
				
				<?php
				
				$level = calculateLevel($value['xp']);
				
				$level_class = array('tier-steel', 'tier-bronze', 'tier-silver', 'tier-gold', 'tier-diamond')[intval($level['level'] / 25)];
				$rank_name = $site['ranks_name'][$value['rank']];
				
				?>
				
				<div class="table-row">
					<div class="table-column text-left">
						<div class="flex items-center gap-1">
							<div class="avatar-field <?php echo $level_class; ?> relative">
								<img class="avatar icon-small rounded-full" src="<?php echo $value['avatar']; ?>">
								<div class="level sup-small-left flex justify-center items-center b-d2 bg-dark rounded-full"><?php echo $level['level']; ?></div>
							</div>
							
							<div class="text-left width-full ellipsis"><?php echo $value['name']; ?></div>
						</div>
					</div>
					
					<div class="table-column text-left"><?php echo $value['userid']; ?></div>
					<div class="table-column text-left"><?php echo getFormatAmountString($value['balance']); ?> DLS</div>
					<div class="table-column text-left text-bold chat-link-<?php echo $rank_name; ?>"><?php echo strtoupper($rank_name); ?></div>
					<div class="table-column text-left"><?php echo makeDate($value['time_create']); ?></div>
					
					<div class="table-column text-right"><a href="<?php echo $site['root']; ?>admin/users/<?php echo $value['userid']; ?>"><button class="site-button purple">Moderate</button></a></div>
				</div>
				<?php } ?>
				<?php } else { ?>
				<div class="table-row table_message">
					<div class="table-column">No data found</div>
				</div>
				<?php } ?>
			</div>
			<div class="table-footer">
				<div class="flex items-center justify-center bg-dark p-2">
					<div class="pagination-content flex row gap-2" id="pagination_admin_users">
						<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
						
						<div class="flex row gap-1">
							<?php $imin_page = $response['users']['page'] - 3; ?>
							<?php $imax_page = $response['users']['page'] + 3; ?>
							
							<?php $min_page = max(1, ($imin_page - (($imax_page > $response['users']['pages']) ? $imax_page - $response['users']['pages'] : 0))); ?>
							<?php $max_page = min($response['users']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
						
							<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
							<div class="pagination-item flex items-center justify-center <?php if($response['users']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
							<?php } ?>
						</div>
						
						<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['users']['pages']; ?>">»</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<div class="<?php if(!$response['user']['profile']) { ?>hidden<?php } ?>">
		<div class="flex column gap-1">
			<div class="flex justify-start">
				<a href="<?php echo $site['root']; ?>admin/users"><button class="site-button black"><i class="fa fa-arrow-left mr-1"></i> Back to list</button></a>
			</div>
			
			<?php
				
			$level = calculateLevel($response['user']['profile']['xp']);
			
			$level_class = array('tier-steel', 'tier-bronze', 'tier-silver', 'tier-gold', 'tier-diamond')[intval($level['level'] / 25)];
			$rank_name = $site['ranks_name'][$response['user']['profile']['rank']];
			
			?>
			
			<div class="width-12 flex row responsive gap-2">
				<div class="width-5 responsive flex column gap-2 height-full bg-light-transparent rounded-1 b-l2 p-2">
					<div class="flex row responsive items-center justify-between gap-2 p-2 bb-l2">
						<div class="flex row items-center gap-2">
							<div class="avatar-field <?php echo $level_class; ?>">
								<div class="inline-block relative">
									<img class="avatar icon-large rounded-full" src="<?php echo $response['user']['profile']['avatar']; ?>">
									<div class="level sup-large-left flex justify-center items-center b-d2 bg-dark rounded-full"><?php echo $level['level']; ?></div>
								</div>
							</div>
							
							<div class="flex column items-start">
								<div class="flex justify-start gap-2 text-upper text-bold ellipsis">
									<div class="chat-link-<?php echo $rank_name; ?>"><?php echo $rank_name; ?></div>
									<div><?php echo $response['user']['profile']['name']; ?></div>
								</div>
								
								<div class="ellipsis font-6"><?php echo $response['user']['profile']['username']; ?> (<?php echo $response['user']['profile']['userid']; ?>)</div>
							</div>
						</div>
						
						<a href="<?php echo $site['root']; ?>profile/<?php echo $response['user']['profile']['userid']; ?>" target="_blank"><button class="site-button purple">Profile</button></a>
					</div>
					
					<div class="flex column mt-2 gap-2 text-left">
						<div class="font-8">Registed - <?php echo makeDate($response['user']['profile']['time_create']); ?></div>
						
						<?php if(sizeof($response['user']['ips']) > 0){ ?>
						<div class="font-8">IP Logins - <span class="text-success"><?php echo implode(', ', $response['user']['ips']); ?></span></div>
						<?php } ?>
						
						<div class="font-8">Balance - <span class="text-success"><?php echo getFormatAmountString($response['user']['profile']['balance']); ?></span></div>
						<div class="font-8">Available Withdraw - <span class="text-success"><?php echo $response['user']['profile']['available']; ?></span></div>
						<div class="font-8">Profile Status - <?php if($response['user']['profile']['verified']) { ?><span class="text-success">Verified</span><?php } else { ?><span class="text-danger">Unverified</span><?php } ?></div>
						<div class="font-8">Anonymous - <?php if($response['user']['profile']['anonymous']) { ?><span class="text-danger">Active</span><?php } else { ?><span class="text-success">Inactive</span><?php } ?></div>
						<div class="font-8">Private Mode - <?php if($response['user']['profile']['private']) { ?><span class="text-danger">Private</span><?php } else { ?><span class="text-success">Public</span><?php } ?></div>
						<div class="font-8">Bind Account Steam - <?php if($response['user']['binds']['steam']['bind']) { ?><a class="text-success" href="https://steamcommunity.com/profiles/<?php echo $response['user']['binds']['steam']['bindid']; ?>" target="_blank">Yes (<?php echo $response['user']['binds']['steam']['bindid']; ?>)</a><?php } else { ?><span class="text-danger">No</span><?php } ?></div>
						<div class="font-8">Bind Account Google - <?php if($response['user']['binds']['google']['bind']) { ?><span class="text-success">Yes (<?php echo $response['user']['binds']['google']['bindid']; ?>)</span><?php } else { ?><span class="text-danger">No</span><?php } ?></div>
						<div class="font-8">Bind Account Facebook - <?php if($response['user']['binds']['facebook']['bind']) { ?><span class="text-success">Yes (<?php echo $response['user']['binds']['facebook']['bindid']; ?>)</span><?php } else { ?><span class="text-danger">No</span><?php } ?></div>
						
						<?php if($response['user']['profile']['exclusion'] > time()) { ?>
						<div class="text-left font-8 text-success">Self Exclusion Active - Expires <?php echo makeDate($response['user']['profile']['exclusion']); ?></div>
						<?php } else { ?>
						<div class="text-left font-8 text-danger">Self Exclusion Inactive</div>
						<?php } ?>
						
						<?php if($response['user']['profile']['tradelink']) { ?>
						<div class="text-left font-8">Steam Trade Link - <a class="text-success" href="<?php echo $response['user']['profile']['tradelink']; ?>" target="_blank"><?php echo $response['user']['profile']['tradelink']; ?></a></div>
						<?php } ?>
						
						<?php if($response['user']['profile']['apikey']) { ?>
						<div class="text-left font-8">Steam API Key - <span class="text-success"><?php echo $response['user']['profile']['apikey']; ?></span></div>
						<?php } ?>
					</div>
				</div>
			
				<div class="width-7 responsive flex column gap-2 height-full">
					<div class="bg-light-transparent rounded-1 b-l2 p-2">
						<div class="grid split-column-full responsive gap-1 mb-2">
							<button class="site-button black dashboard-load switch_panel active" data-id="user_control" data-panel="summary">Summary</button>
							<button class="site-button black dashboard-load switch_panel" data-id="user_control" data-panel="restrictions">Restrictions</button>
						</div>
						
						<div class="switch_content" data-id="user_control" data-panel="summary">
							<div class="flex column gap-2 text-left">
								<div class="flex column items-start gap-1 width-full">
									<div class="text-left font-8">Remove Binds</div>
									
									<div class="grid split-column-3 responsive gap-1 width-full">
										<?php if($response['user']['binds']['google']['bind']) { ?>
										<button class="site-button purple width-full admin_user_remove_bind" data-bind="google">Remove Google Bind</button>
										<?php } else { ?>
										<button class="site-button disabled purple width-full">Not binded with Google</button>
										<?php } ?>
										
										<?php if($response['user']['binds']['steam']['bind']) { ?>
										<button class="site-button purple width-full admin_user_remove_bind" data-bind="steam">Remove Steam Bind</button>
										<?php } else { ?>
										<button class="site-button disabled purple width-full">Not binded with Steam</button>
										<?php } ?>
										
										<?php if($response['user']['binds']['facebook']['bind']) { ?>
										<button class="site-button purple width-full admin_user_remove_bind" data-bind="facebook">Remove Facebook Bind</button>
										<?php } else { ?>
										<button class="site-button disabled purple width-full">Not binded with Facebook</button>
										<?php } ?>
									</div>
								</div>
								
								<div class="flex column items-start gap-2">
									<div class="text-left font-8">User Exclusion - <?php if($response['user']['profile']['exclusion'] > time()) { ?><span class="text-success">Active - Expires <?php echo makeDate($response['user']['profile']['exclusion']); ?></span><?php } else { ?><span class="text-danger">Inactive</span><?php } ?></div>
									
									<?php if($response['user']['profile']['exclusion'] > time()) { ?>
									<button class="site-button purple" id="admin_user_remove_exclusion">Remove Exclusion</button>
									<?php } else { ?>
									<button class="site-button purple disabled">Remove Exclusion</button>
									<?php } ?>
								</div>
								
								<div class="flex column items-start gap-2">
									<div class="text-left font-8">Ban IP Login - <?php if(sizeof($response['user']['bannedips']) > 0){ ?><span class="text-success">Banned IPs - <?php echo implode(', ', $response['user']['bannedips']); ?></span><?php } else { ?><span class="text-success">No IPs Banned</span><?php } ?></div>
									
									<div class="input_field transition" data-border="#de4c41">
										<div class="field_container">
											<div class="field_content">
												<input type="text" class="field_element_input" id="admin_user_ip_value" value="">
												
												<div class="field_label transition">IP</div>
											</div>
											
											<div class="field_extra">
												<button class="site-button purple" id="admin_user_ip_ban">Ban</button>
												<button class="site-button purple" id="admin_user_ip_unban">Unban</button>
											</div>
										</div>
										
										<div class="field_bottom">
											<div class="field_error" data-error="required">This field is required</div>
										</div>
									</div>
								</div>
								
								<div class="flex column items-start gap-2">
									<div class="text-left font-8">Set Rank - <span class="text-success">Active Rank - <?php echo ucwords($rank_name); ?></span></div>
									
									<div class="flex row responsive items-center gap-2">
										<div class="dropdown_field transition-5">
											<div class="field_container">
												<div class="field_content">
													<input type="text" class="field_element_input" id="admin_user_rank_value" value="<?php echo $response['user']['profile']['rank']; ?>">
													<div class="field_dropdown"></div>
												
													<div class="field_element_dropdowns">
														<div class="field_element_dropdown" value="0" data-index="0">Member</div>
														<div class="field_element_dropdown" value="2" data-index="2">Moderator</div>
														<div class="field_element_dropdown" value="3" data-index="3">Helper</div>
														<div class="field_element_dropdown" value="4" data-index="4">Veteran</div>
														<div class="field_element_dropdown" value="5" data-index="5">Pro</div>
														<div class="field_element_dropdown" value="6" data-index="6">Youtuber</div>
														<div class="field_element_dropdown" value="7" data-index="7">Streamer</div>
														<div class="field_element_dropdown" value="9" data-index="9">Promoter</div>
													</div>
												
													<div class="field_label active transition-5">Rank</div>
												</div>
												
												<div class="field_extra">
													<div class="field_caret">
														<i class="fa fa-caret-down"></i>
													</div>
												</div>
											</div>
											
											<div class="field_bottom"></div>
										</div>
										
										<button class="site-button purple" id="admin_user_rank_set">Confirm</button>
									</div>
								</div>
								
							</div>
						</div>
						
						<div class="switch_content hidden" data-id="user_control" data-panel="restrictions">
							<div class="flex column items-start gap-2 text-left">
								<div class="flex column items-start gap-1 width-full">
									<div class="text-left font-8">User Restriction - <?php if($response['user']['restrictions']['site']['active']) { ?> <span class="text-danger">Site Ban - This user is already restricted. The restriction expires <?php echo ($response['user']['restrictions']['site']['expire'] == -1) ? 'never' : makeDate($response['user']['restrictions']['site']['expire']); ?></span><?php } else { ?><span class="text-success">Site Ban - This user is not restricted</span><?php } ?></div>
									
									<div class="flex row responsive items-center justify-center gap-2 width-full">
										<div class="input_field transition" data-border="#de4c41">
											<div class="field_container">
												<div class="field_content">
													<input type="text" class="field_element_input admin_user_restriction_reason" data-restriction="site" value="">
													
													<div class="field_label transition">Reason</div>
												</div>
												
												<div class="field_extra"></div>
											</div>
											
											<div class="field_bottom">
												<div class="field_error" data-error="required">This field is required</div>
											</div>
										</div>
										
										<div class="dropdown_field transition-5">
											<div class="field_container">
												<div class="field_content">
													<input type="text" class="field_element_input admin_user_restriction_date" data-restriction="site" value="minutes">
													<div class="field_dropdown"></div>
												
													<div class="field_element_dropdowns">
														<div class="field_element_dropdown" value="minutes" data-index="0">Minutes</div>
														<div class="field_element_dropdown" value="hours" data-index="1">Hours</div>
														<div class="field_element_dropdown" value="days" data-index="2">Days</div>
														<div class="field_element_dropdown" value="months" data-index="3">Months</div>
														<div class="field_element_dropdown" value="years" data-index="4">Years</div>
													</div>
													
													<div class="field_label active transition-5">Format Date</div>
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
													<input type="text" class="field_element_input admin_user_restriction_amount" data-restriction="site" value="5">
													
													<div class="field_label transition">Amount</div>
												</div>
												
												<div class="field_extra">
													<button class="site-button purple admin_user_restriction_set" data-restriction="site">Confirm</button>
													<button class="site-button purple admin_user_restriction_permanently" data-restriction="site">Permanently</button>
													<?php if($response['user']['restrictions']['site']['active']) { ?><button class="site-button purple admin_user_restriction_unset" data-restriction="site">Unban</button><?php } ?>
												</div>
											</div>
											
											<div class="field_bottom">
												<div class="field_error" data-error="required">This field is required</div>
												<div class="field_error" data-error="number">This field must be a number</div>
												<div class="field_error" data-error="positive_integer">This field must be a positive integer number</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="flex column items-start gap-1 width-full">
									<div class="text-left font-8">User Restriction - <?php if($response['user']['restrictions']['play']['active']) { ?> <span class="text-danger">Play Ban - This user is already restricted. The restriction expires <?php echo ($response['user']['restrictions']['play']['expire'] == -1) ? 'never' : makeDate($response['user']['restrictions']['play']['expire']); ?></span><?php } else { ?><span class="text-success">Play Ban - This user is not restricted</span><?php } ?></div>
									
									<div class="flex row responsive items-center justify-center gap-2 width-full">
										<div class="input_field transition" data-border="#de4c41">
											<div class="field_container">
												<div class="field_content">
													<input type="text" class="field_element_input admin_user_restriction_reason" data-restriction="play" value="">
													
													<div class="field_label transition">Reason</div>
												</div>
												
												<div class="field_extra"></div>
											</div>
											
											<div class="field_bottom">
												<div class="field_error" data-error="required">This field is required</div>
											</div>
										</div>
										
										<div class="dropdown_field transition-5">
											<div class="field_container">
												<div class="field_content">
													<input type="text" class="field_element_input admin_user_restriction_date" data-restriction="play" value="minutes">
													<div class="field_dropdown"></div>
												
													<div class="field_element_dropdowns">
														<div class="field_element_dropdown" value="minutes" data-index="0">Minutes</div>
														<div class="field_element_dropdown" value="hours" data-index="1">Hours</div>
														<div class="field_element_dropdown" value="days" data-index="2">Days</div>
														<div class="field_element_dropdown" value="months" data-index="3">Months</div>
														<div class="field_element_dropdown" value="years" data-index="4">Years</div>
													</div>
													
													<div class="field_label active transition-5">Format Date</div>
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
													<input type="text" class="field_element_input admin_user_restriction_amount" data-restriction="play" value="5">
													
													<div class="field_label transition">Amount</div>
												</div>
												
												<div class="field_extra">
													<button class="site-button purple admin_user_restriction_set" data-restriction="play">Confirm</button>
													<button class="site-button purple admin_user_restriction_permanently" data-restriction="play">Permanently</button>
													<?php if($response['user']['restrictions']['play']['active']) { ?><button class="site-button purple admin_user_restriction_unset" data-restriction="play">Unban</button><?php } ?>
												</div>
											</div>
											
											<div class="field_bottom">
												<div class="field_error" data-error="required">This field is required</div>
												<div class="field_error" data-error="number">This field must be a number</div>
												<div class="field_error" data-error="positive_integer">This field must be a positive integer number</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="flex column items-start gap-1 width-full">
									<div class="text-left font-8">User Restriction - <?php if($response['user']['restrictions']['trade']['active']) { ?> <span class="text-danger">Trade Ban - This user is already restricted. The restriction expires <?php echo ($response['user']['restrictions']['trade']['expire'] == -1) ? 'never' : makeDate($response['user']['restrictions']['trade']['expire']); ?></span><?php } else { ?><span class="text-success">Trade Ban - This user is not restricted</span><?php } ?></div>
									
									<div class="flex row responsive items-center justify-center gap-2 width-full">
										<div class="input_field transition" data-border="#de4c41">
											<div class="field_container">
												<div class="field_content">
													<input type="text" class="field_element_input admin_user_restriction_reason" data-restriction="trade" value="">
													
													<div class="field_label transition">Reason</div>
												</div>
												
												<div class="field_extra"></div>
											</div>
											
											<div class="field_bottom">
												<div class="field_error" data-error="required">This field is required</div>
											</div>
										</div>
										
										<div class="dropdown_field transition-5">
											<div class="field_container">
												<div class="field_content">
													<input type="text" class="field_element_input admin_user_restriction_date" data-restriction="trade" value="minutes">
													<div class="field_dropdown"></div>
												
													<div class="field_element_dropdowns">
														<div class="field_element_dropdown" value="minutes" data-index="0">Minutes</div>
														<div class="field_element_dropdown" value="hours" data-index="1">Hours</div>
														<div class="field_element_dropdown" value="days" data-index="2">Days</div>
														<div class="field_element_dropdown" value="months" data-index="3">Months</div>
														<div class="field_element_dropdown" value="years" data-index="4">Years</div>
													</div>
													
													<div class="field_label active transition-5">Format Date</div>
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
													<input type="text" class="field_element_input admin_user_restriction_amount" data-restriction="trade" value="5">
													
													<div class="field_label transition">Amount</div>
												</div>
												
												<div class="field_extra">
													<button class="site-button purple admin_user_restriction_set" data-restriction="trade">Confirm</button>
													<button class="site-button purple admin_user_restriction_permanently" data-restriction="trade">Permanently</button>
													<?php if($response['user']['restrictions']['trade']['active']) { ?><button class="site-button purple admin_user_restriction_unset" data-restriction="trade">Unban</button><?php } ?>
												</div>
											</div>
											
											<div class="field_bottom">
												<div class="field_error" data-error="required">This field is required</div>
												<div class="field_error" data-error="number">This field must be a number</div>
												<div class="field_error" data-error="positive_integer">This field must be a positive integer number</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="flex column items-start gap-1 width-full">
									<div class="text-left font-8">User Restriction - <?php if($response['user']['restrictions']['mute']['active']) { ?> <span class="text-danger">Chat Mute - This user is already restricted. The restriction expires <?php echo ($response['user']['restrictions']['mute']['expire'] == -1) ? 'never' : makeDate($response['user']['restrictions']['mute']['expire']); ?></span><?php } else { ?><span class="text-success">Chat Mute - This user is not restricted</span><?php } ?></div>
									
									<div class="flex row responsive items-center justify-center gap-2 width-full">
										<div class="input_field transition" data-border="#de4c41">
											<div class="field_container">
												<div class="field_content">
													<input type="text" class="field_element_input admin_user_restriction_reason" data-restriction="mute" value="">
													
													<div class="field_label transition">Reason</div>
												</div>
												
												<div class="field_extra"></div>
											</div>
											
											<div class="field_bottom">
												<div class="field_error" data-error="required">This field is required</div>
											</div>
										</div>
										
										<div class="dropdown_field transition-5">
											<div class="field_container">
												<div class="field_content">
													<input type="text" class="field_element_input admin_user_restriction_date" data-restriction="mute" value="minutes">
													<div class="field_dropdown"></div>
												
													<div class="field_element_dropdowns">
														<div class="field_element_dropdown" value="minutes" data-index="0">Minutes</div>
														<div class="field_element_dropdown" value="hours" data-index="1">Hours</div>
														<div class="field_element_dropdown" value="days" data-index="2">Days</div>
														<div class="field_element_dropdown" value="months" data-index="3">Months</div>
														<div class="field_element_dropdown" value="years" data-index="4">Years</div>
													</div>
													
													<div class="field_label active transition-5">Format Date</div>
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
													<input type="text" class="field_element_input admin_user_restriction_amount" data-restriction="mute" value="5">
													
													<div class="field_label transition">Amount</div>
												</div>
												
												<div class="field_extra">
													<button class="site-button purple admin_user_restriction_set" data-restriction="mute">Confirm</button>
													<button class="site-button purple admin_user_restriction_permanently" data-restriction="mute">Permanently</button>
													<?php if($response['user']['restrictions']['mute']['active']) { ?><button class="site-button purple admin_user_restriction_unset" data-restriction="mute">Unmute</button><?php } ?>
												</div>
											</div>
											
											<div class="field_bottom">
												<div class="field_error" data-error="required">This field is required</div>
												<div class="field_error" data-error="number">This field must be a number</div>
												<div class="field_error" data-error="positive_integer">This field must be a positive integer number</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>