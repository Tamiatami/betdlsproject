<div class="flex column height-full width-full">
	<div class="wrapper-page flex row">
		<div class="flex column height-full width-full p-2">
			<div class="flex justify-start">
				<a href="<?php echo $site['root'];?>deposit"><button class="site-button black"><i class="fa fa-arrow-left mr-1"></i> Back to Options</button></a>
			</div>
			
			<div class="flex justify-center mt-4 overflow-a">
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Deposit With Diamond Locks</div>
					<div class="mb-2">You will receive the DLS automatically on the website after dropping DLS to the world name displayed below.</div>
					
					<div class="hidden" id="panel_currency_top">
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" value="" readonly="">
										
										<div class="field_label transition-5">Your personal BTC deposit address</div>
									</div>
									
									<div class="field_extra">
										<button type="button" class="site-button purple" data-copy="input" data-input="#btc_address">Copy Address</button>
									</div>
								</div>
								
								<div class="field_bottom"></div>
							</div>
						</div>
						
						<div class="qrcode qrcode-crypto qrcode-btc"></div>
					</div>
					
					<div id="panel_currency_bottom">
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" value="">
										
										<div class="field_label transition-5">Enter your GrowId</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
								</div>
							</div>
						</div>
					
						<button type="button" class="site-button purple">You have 59 seconds left to join</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
