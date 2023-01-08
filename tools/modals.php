<div class="modal medium" id="modal_auth">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper"></div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			
			<div class="modal-body text-left">
				<div class="grid split-column-2 gap-1 mb-2">
					<button class="site-button black switch_panel active" data-id="auth" data-panel="login">LOGIN</button>
					<button class="site-button black switch_panel" data-id="auth" data-panel="register">REGISTER</button>
				</div>
				
				<div class="switch_content" data-id="auth" data-panel="login">
					<div class="grid split-column-3 gap-2 mr-2 ml-2">
						<a href="<?php echo $site['root'];?>auth/steam?assign=0&return=<?php echo $site['path'];?>">
							<div class="social-login steam rounded-1 flex justify-center items-center width-full"></div>
						</a>
						
						<a href="<?php echo $site['root'];?>auth/google?assign=0&return=<?php echo $site['path'];?>">
							<div class="social-login google rounded-1 flex justify-center items-center width-full"></div>
						</a>
						
						<div class="social-login facebook rounded-1 flex justify-center items-center width-full disabled"></div>
					</div>
					
					<div class="title-text width-full flex items-center justify-center mt-1 mb-1">or</div>
				
					<form class="form_auth" autocomplete="login" method="POST" action="<?php echo $site['root'];?>auth/login?return=<?php echo $site['path'];?>">
						<div class="flex column items-center gap-2">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" name="username" value="" autocomplete="email">
										
										<div class="field_label">Username / E-mail</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
									<div class="field_error" data-error="username_email">This field must be a username or a email</div>
								</div>
							</div>
							
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="password" class="field_element_input" name="password" value="" autocomplete="password">
										
										<div class="field_label">Password</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
									<div class="field_error" data-error="password">At least 8 characters, one uppercase, one lowercase, one number and one symbol</div>
								</div>
							</div>
							
							<div class="flex justify-start width-full mt-2">
								<div class="text-gray pointer font-6" data-modal="show" data-id="#modal_auth_recover">Recover password</div>
							</div>
							
							<button type="submit" class="site-button purple mt-1">Submit</button>
						</div>
					</form>
				</div>
				
				<div class="switch_content hidden" data-id="auth" data-panel="register">
					<form class="form_auth" autocomplete="register" method="POST" action="<?php echo $site['root'];?>auth/register?return=<?php echo $site['path'];?>">
						<div class="flex column items-center gap-2">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" name="email" value="" autocomplete="email">
										
										<div class="field_label">E-mail</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
									<div class="field_error" data-error="email">This field must be a email</div>
								</div>
							</div>
							
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" name="username" value="" autocomplete="username">
										
										<div class="field_label">Username</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
									<div class="field_error" data-error="username">At least 6 characters, only lowercase, numbers and underscore are allowed</div>
								</div>
							</div>
							
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="password" class="field_element_input" name="password" value="" autocomplete="password">
										
										<div class="field_label">Password</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
									<div class="field_error" data-error="password">At least 8 characters, one uppercase, one lowercase, one number and one symbol</div>
								</div>
							</div>
							
							<button type="submit" class="site-button purple mt-1">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal medium" id="modal_auth_initializing">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Initialize Account</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			
			<div class="modal-body text-left">
				<form class="form_auth" autocomplete="initializing" method="POST" action="<?php echo $site['root'];?>auth/initializing?return=<?php echo $site['path'];?>">
					<div class="flex column items-center gap-2">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" name="username" value="<?php echo $user['username']; ?>">
									
									<div class="field_label">Username</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="username">At least 6 characters, only lowercase, numbers and underscore are allowed</div>
							</div>
						</div>
						
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" name="email" value="<?php echo $user['email']; ?>">
									
									<div class="field_label">E-mail</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="email">This field must be a email</div>
							</div>
						</div>
						
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="password" class="field_element_input" name="password" value="">
									
									<div class="field_label">Password</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="password">At least 8 characters, one uppercase, one lowercase, one number and one symbol</div>
							</div>
						</div>
						
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="password" class="field_element_input" name="confirm_password" value="">
									
									<div class="field_label">Confirm Password</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="password">At least 8 characters, one uppercase, one lowercase, one number and one symbol</div>
							</div>
						</div>
						
						<button type="submit" class="site-button purple mt-1">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal medium" id="modal_auth_settings">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Account Settings</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			
			<div class="modal-body text-left">
				<form class="form_auth_settings" autocomplete="settings">
					<div class="flex column items-center gap-2">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input disabled type="text" class="field_element_input" name="username" value="<?php echo $user['username']; ?>">
									
									<div class="field_label">Username</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
						</div>
						
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" name="email" value="<?php echo $user['email']; ?>">
									
									<div class="field_label">E-mail</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="email">By changing your email, you need to verify your profile again</div>
							</div>
						</div>
						
						<div class="flex column items-start width-full">
							<button type="button" class="site-button black" data-modal="show" data-id="#modal_auth_change_password">Change password</button>
						</div>
						
						<button type="submit" class="site-button purple mt-1">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal medium" id="modal_auth_change_password">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Change Password</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			
			<div class="modal-body text-left">
				<form class="form_auth" autocomplete="change_password" method="POST" action="<?php echo $site['root'];?>auth/change_password">
					<div class="flex column items-center gap-2">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="password" class="field_element_input" name="current_password" value="">
									
									<div class="field_label">Current password</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="password">This field must be a password</div>
							</div>
						</div>
						
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="password" class="field_element_input" name="password" value="">
									
									<div class="field_label">New password</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="password">At least 8 characters, one uppercase, one lowercase, one number and one symbol</div>
							</div>
						</div>
						
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="password" class="field_element_input" name="confirm_password" value="">
									
									<div class="field_label">Confirm new password</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="password">At least 8 characters, one uppercase, one lowercase, one number and one symbol</div>
							</div>
						</div>
						
						<button type="submit" class="site-button purple mt-1">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_auth_recover">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Recover password</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left font-8">
				<form class="form_auth_recover" autocomplete="recover">
					<div class="flex column items-center">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" name="username" value="" autocomplete="username">
									
									<div class="field_label">Username / E-mail</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="username_email">This field must be a username or a email</div>
							</div>
						</div>
						
						<button type="submit" class="site-button purple mt-1">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal small" id="modal_auth_logout">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">LOGOUT</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			
			<div class="modal-body text-left">
				<div class="text-center mb-2">Do you wish to log out?</div>
			
				<div class="grid split-column-2 gap-1 mb-2">
					<button class="site-button black" data-modal="hide">CANCEL</button>
					
					<a href="<?php echo $site['root'];?>auth/logout?devices=0&return=<?php echo $site['path'];?>">
						<button class="site-button purple width-full">LOGOUT</button>
					</a>
				</div>
				
				<a class="width-full" href="<?php echo $site['root'];?>auth/logout?devices=1&return=<?php echo $site['path'];?>">
					<button class="site-button purple width-full">LOGOUT FROM ALL DEVICES</button>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="modal large" id="modal_fair_games">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Game Results</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div class="fair-games">
				
				</div>
			</div>
			<div class="modal-footer text-center">
				<button type="button" class="site-button purple" data-modal="hide">CLOSE</button>
			</div>
		</div>
	</div>
</div>

<div class="modal medium" id="modal_fair_round">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Round Results</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div class="flex justify-center items-center column gap-2">
					<div class="font-6 width-full ellipsis"><span class="text-gray mr-1">Server Seed (hashed):</span><span class="pointer" id="fair_server_seed_hashed" data-copy="text" data-text="">-</span></div>
					<div class="font-6 width-full ellipsis"><span class="text-gray mr-1">Server Seed:</span><span class="pointer" id="fair_server_seed" data-copy="text" data-text="">-</span></div>
					<div class="font-6 width-full ellipsis"><span class="text-gray mr-1">Public Seed:</span><span class="pointer" id="fair_public_seed" data-copy="text" data-text="">-</span></div>
					<div class="font-6 width-full ellipsis"><span class="text-gray mr-1">Nonce:</span><span class="pointer" id="fair_nonce" data-copy="text" data-text="">-</span></div>
					<div class="font-6 width-full ellipsis"><span class="text-gray mr-1">EOS block:</span><a id="fair_block_link" href="" target="_black"><span id="fair_block">-</span></a></div>
				</div>
			</div>
			<div class="modal-footer text-center">
				<button type="button" class="site-button purple" data-modal="hide">CLOSE</button>
			</div>
		</div>
	</div>
</div>

<div class="modal large" id="modal_daily_cases">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Daily Cases</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div class="daily-cases">
				
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal huge" id="modal_daily_case">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Daily Cases - <span id="daily_case_name">none</span></div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div class="daily-case relative mt-2 transition-5" id="daily_case">
					<div class="group-reel flex" id="daily_spinner">
						<div class="flex" id="daily_field"></div>
					</div>
					
					<div class="shadow shadow-left"></div>
					<div class="shadow shadow-right"></div>
					
					<div class="absolute top-0 bottom-0 left-0 right-0 flex justify-center">
						<div class="pointer flex items-center"></div>
					</div>
				</div>

				<div class="mt-2 text-center">
					<button class="site-button pink" id="daily_open" data-id="">OPEN CASE (LVL. <span id="daily_case_level">0</span>)</button>
				</div>

				<div class="mt-2 p-2">
					<div class="text-left font-9">This case contains:</div>

					<div class="daily-list" id="daily_list"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal medium" id="modal_daily_result">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Skins from <span id="daily_result_case">none</span></div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body">
				<div class="flex row responsive">
					<div class="width-4 responsive">
						<img class="m-2" id="daily_result_image" src="">
					</div>
					
					<div class="width-8 responsive">
						<div class="font-10" id="daily_result_winning">none</div>
						
						<div class="mt-2 font-8">
							<div>Rolled: <span id="daily_result_roll">none</span></div>
							
							<button class="site-button purple mt-2" id="daily_result_price" disabled="">0 coins</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="site-button purple" data-modal="hide">CLOSE</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_send_coins">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Send DLs</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div class="input_field bet_input_field transition" data-border="#de4c41">
					<div class="field_container">
						<div class="field_content">
							<input type="text" class="field_element_input" id="send_coins_amount" value="0.01">
							
							<div class="field_label transition">Send Amount</div>
						</div>
						
						<div class="field_extra">
						</div>
					</div>
					
					<div class="field_bottom">
						<div class="field_error" data-error="required">This field is required</div>
						<div class="field_error" data-error="number">This field must be a number</div>
						<div class="field_error" data-error="greater">You must enter a greater value</div>
						<div class="field_error" data-error="lesser">You must enter a lesser value</div>
					</div>
				</div>
			</div>
			<div class="modal-footer text-center">
				<button type="button" class="site-button purple" data-modal="hide" id="send_coins_to_user" data-user="0">SEND</button>
				<button type="button" class="site-button purple" data-modal="hide">CLOSE</button>
			</div>
		</div>
	</div>
</div>

<div class="modal medium" id="modal_unbox_result">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Skins from <span id="unbox_result_case">none</span></div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body">
				<div class="flex row responsive">
					<div class="width-4 responsive">
						<img class="m-2" id="unbox_result_image" src="">
					</div>
					
					<div class="width-8 responsive">
						<div class="font-10" id="unbox_result_winning">none</div>
						
						<div class="mt-2 font-8">
							<div>Rolled: <span id="unbox_result_roll">none</span></div>
							
							<button class="site-button purple mt-2" id="unbox_result_price" disabled="">0 coins</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="site-button purple" data-modal="hide">CLOSE</button>
			</div>
		</div>
	</div>
</div>

<div class="modal small" id="modal_avatar">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Change Avatar</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<form class="form_avatar" method="POST" action="<?php echo $site['root'];?>avatar" enctype="image/jpeg">
					<div class="flex column items-center gap-2">
						<input type="file" name="image" class="site-button black width-full" id="avatar_upload">
						
						<div class="avatar-link hidden">
							<img class="avatar icon-huge rounded-full" src="">
						</div>
						
						<button type="submit" class="site-button purple mt-1">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal small" id="modal_confirm_action">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Confirmation</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div class="text-center mb-2">Do you confirm your next action?</div>
			
				<div class="grid split-column-2 gap-1">
					<button class="site-button black" id="confirm_action_no" data-modal="hide">CANCEL</button>
					<button class="site-button purple" id="confirm_action_yes" data-modal="hide">YES</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal small" id="modal_confirm_identity">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Confirmation</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div class="text-center mb-2">Confirm your identity by providing a secret code!</div>
				
				<div class="input_field transition" data-border="#de4c41">
					<div class="field_container">
						<div class="field_content">
							<input type="password" class="field_element_input" id="confirm_identity_secret" value="">
							
							<div class="field_label transition">Secret</div>
						</div>
						
						<div class="field_extra">
						</div>
					</div>
					
					<div class="field_bottom">
						<div class="field_error" data-error="required">This field is required</div>
					</div>
				</div>
			
				<div class="grid split-column-2 gap-1">
					<button class="site-button black" id="confirm_identity_no" data-modal="hide">CANCEL</button>
					<button class="site-button purple" id="confirm_identity_yes" data-modal="hide">YES</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal small" id="modal_insufficient_balance">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Oops, your balance is too low</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div class="text-left mb-2">You need <span class="amount">0.00</span> DLs more to continue your action.</div>
				
				<div class="flex justify-center items-center">
					<a href="<?php echo $site['root']; ?>deposit"><button class="site-button purple">DEPOSIT</button></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal medium" id="modal_online_list">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Online list</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div id="online_list">
				</div>
			</div>
			<div class="modal-footer text-center">
				<button type="button" class="site-button purple" data-modal="hide">CLOSE</button>
			</div>
		</div>
	</div>
</div>

<div class="modal small" id="modal_recaptcha">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">Verify Recaptcha</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body font-8">
				<div class="flex justify-center" id="g-recaptcha"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal small" id="modal_show_world">
	<div class="modal-dialog flex justify-center items-center">
		<div class="modal-content rounded-1">
			<div class="modal-header flex items-center justify-between">
				<div class="modal-title text-upper">IN GROWTOPIA PUT THIS IN ENTER WORLD WITH |</div>
				<div class="modal-close flex justify-center items-center rounded-0" data-modal="hide"><i aria-hidden="true" class="fa fa-times"></i></div>
			</div>
			<div class="modal-body text-left">
				<div class="text-left mb-2" id="world-license"></div>
				
				<div class="flex justify-center items-center">
					<button class="site-button purple copy-licence-text">Copy button</button>
				</div>
			</div>
		</div>
	</div>
</div>