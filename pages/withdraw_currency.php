<div class="flex column height-full width-full">
	<div class="wrapper-page flex row">
		<div class="flex column height-full width-full p-2">
			<div class="flex justify-start">
				<a href="<?php echo $site['root'];?>withdraw"><button class="site-button black"><i class="fa fa-arrow-left mr-1"></i> Back to Options</button></a>
			</div>
			
			<div class="flex justify-center mt-4 overflow-a">
				<?php if($paths[2] == 'btc') { ?>
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Withdraw With Bitcoin</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_withdraw_address" value="">
									
									<div class="field_label transition-5">Your personal BTC withdraw address</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
							</div>
						</div>
					</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_coin_from" oninput="offers_calculateCurrencyValue('from', 'BTC')" value="">
									
									<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount DLS</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="number">This field must be a number</div>
								<div class="field_error" data-error="greater">You must enter a greater value</div>
								<div class="field_error" data-error="lesser">You must enter a lesser value</div>
							</div>
						</div>
					</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_coin_to" oninput="offers_calculateCurrencyValue('to', 'BTC')" value="">
									
									<div class="field_label transition-5"><div class="input_coins btc-coins mr-1"></div>Amount Bitcoin</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="number">This field must be a number</div>
							</div>
						</div>
					</div>
					
					<div class="mt-4">
						<button type="button" class="site-button purple" id="crypto_withdraw" data-game="btc">WITHDRAW</button>
					</div>
				</div>
				<?php } else if($paths[2] == 'eth') { ?>
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Withdraw With Ethereum</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_withdraw_address" value="">
									
									<div class="field_label transition-5">Your personal ETH withdraw address</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
							</div>
						</div>
					</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_coin_from" oninput="offers_calculateCurrencyValue('from', 'ETH')" value="">
									
									<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount DLS</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="number">This field must be a number</div>
								<div class="field_error" data-error="greater">You must enter a greater value</div>
								<div class="field_error" data-error="lesser">You must enter a lesser value</div>
							</div>
						</div>
					</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_coin_to" oninput="offers_calculateCurrencyValue('to', 'ETH')" value="">
									
									<div class="field_label transition-5"><div class="input_coins eth-coins mr-1"></div>Amount Ethereum</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="number">This field must be a number</div>
							</div>
						</div>
					</div>
					
					<div class="mt-4">
						<button type="button" class="site-button purple" id="crypto_withdraw" data-game="eth">WITHDRAW</button>
					</div>
				</div>
				<?php } else if($paths[2] == 'ltc') { ?>
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Withdraw With Litecoin</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_withdraw_address" value="">
									
									<div class="field_label transition-5">Your personal LTC withdraw address</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
							</div>
						</div>
					</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_coin_from" oninput="offers_calculateCurrencyValue('from', 'LTC')" value="">
									
									<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount DLS</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="number">This field must be a number</div>
								<div class="field_error" data-error="greater">You must enter a greater value</div>
								<div class="field_error" data-error="lesser">You must enter a lesser value</div>
							</div>
						</div>
					</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_coin_to" oninput="offers_calculateCurrencyValue('to', 'LTC')" value="">
									
									<div class="field_label transition-5"><div class="input_coins ltc-coins mr-1"></div>Amount LTC</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="number">This field must be a number</div>
							</div>
						</div>
					</div>
					
					<div class="mt-4">
						<button type="button" class="site-button purple" id="crypto_withdraw" data-game="ltc">WITHDRAW</button>
					</div>
				</div>
				<?php } else if($paths[2] == 'bch') { ?>
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Withdraw With Bitcoin Cash</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_withdraw_address" value="">
									
									<div class="field_label transition-5">Your personal BCH withdraw address</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
							</div>
						</div>
					</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_coin_from" oninput="offers_calculateCurrencyValue('from', 'BCH')" value="">
									
									<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount DLS</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="required">This field is required</div>
								<div class="field_error" data-error="number">This field must be a number</div>
								<div class="field_error" data-error="greater">You must enter a greater value</div>
								<div class="field_error" data-error="lesser">You must enter a lesser value</div>
							</div>
						</div>
					</div>
					
					<div class="width-8 responsive m-a">
						<div class="input_field bet_input_field transition-5" data-border="#de4c41">
							<div class="field_container">
								<div class="field_content">
									<input type="text" class="field_element_input" id="currency_coin_to" oninput="offers_calculateCurrencyValue('to', 'BCH')" value="">
									
									<div class="field_label transition-5"><div class="input_coins bch-coins mr-1"></div>Amount Bitcoin Cash</div>
								</div>
								
								<div class="field_extra"></div>
							</div>
							
							<div class="field_bottom">
								<div class="field_error" data-error="number">This field must be a number</div>
							</div>
						</div>
					</div>
					
					<div class="mt-4">
						<button type="button" class="site-button purple" id="crypto_withdraw" data-game="bch">WITHDRAW</button>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
