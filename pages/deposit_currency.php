<div class="flex column height-full width-full">
	<div class="wrapper-page flex row">
		<div class="flex column height-full width-full p-2">
			<div class="flex justify-start">
				<a href="<?php echo $site['root'];?>deposit"><button class="site-button black"><i class="fa fa-arrow-left mr-1"></i> Back to Options</button></a>
			</div>
			
			<script>
				$(document).ready(function() {	
					$(".qrcode-crypto").empty();
							
					var qrcode = new QRCode($(".qrcode-crypto")[0], {
						text: "<?php echo $addresses[strtoupper($paths[2])]; ?>",
						width: 192,
						height: 192,
					});
				});
			</script>
			
			<div class="flex justify-center mt-4 overflow-a">
				<?php if($paths[2] == 'btc') { ?>
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Deposit With Bitcoin</div>
					<div class="mb-2">You will receive your DLS automatically on the website after sending BTC to the address displayed below.</div>
					
					<div class="<?php if($addresses['BTC'] == null) echo "hidden";?>" id="panel_currency_top">
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="btc_address" value="<?php echo $addresses['BTC'];?>" readonly="">
										
										<div class="field_label transition-5">Your personal BTC deposit address</div>
									</div>
									
									<div class="field_extra">
										<button type="button" class="site-button purple" data-copy="input" data-input="btc_address">Copy Address</button>
									</div>
								</div>
								
								<div class="field_bottom"></div>
							</div>
						</div>
						
						<div class="qrcode qrcode-crypto qrcode-btc"></div>
					</div>
					
					<div class="<?php if($addresses['BTC'] != null) echo "hidden";?>" id="panel_currency_bottom">
						<button type="button" class="site-button purple" id="generate_address" data-currency="BTC">GENERATE MY DEPOSIT ADDRESS</button>
					</div>
					
					<div class="mt-2">
						<div class="text-upper font-8">DLS to BTC calculator</div>
						
						<div class="width-8 responsive m-a flex">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="currency_coin_from" oninput="offers_calculateCurrencyValue('from', 'BTC')" value="">
										
										<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount DLS</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="number">This field must be a number</div>
									<div class="field_error" data-error="greater">You must enter a greater value</div>
								</div>
							</div>
							
							<div class="flex justify-center items-center pr-2 pl-2 font-10">=</div>
							
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
					</div>
				</div>
				<?php } else if($paths[2] == 'eth') { ?>
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Deposit With Ethereum</div>
					<div class="mb-2">You will receive DLS automatically on the website after sending ETH to the address displayed below.</div>
					
					<div class="<?php if($addresses['ETH'] == null) echo "hidden";?>" id="panel_currency_top">
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="eth_address" value="<?php echo $addresses['ETH'];?>" readonly="">
										
										<div class="field_label transition-5">Your personal ETH deposit address</div>
									</div>
									
									<div class="field_extra">
										<button type="button" class="site-button purple" data-copy="input" data-input="eth_address">Copy Address</button>
									</div>
								</div>
								
								<div class="field_bottom"></div>
							</div>
						</div>
						
						<div class="qrcode qrcode-crypto qrcode-eth"></div>
					</div>
					
					<div class="<?php if($addresses['ETH'] != null) echo "hidden";?>" id="panel_currency_bottom">
						<button type="button" class="site-button purple" id="generate_address" data-currency="ETH">GENERATE MY DEPOSIT ADDRESS</button>
					</div>
					
					<div class="mt-2">
						<div class="text-upper font-8">DLS to ETH calculator</div>
						
						<div class="width-8 responsive m-a flex">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="currency_coin_from" oninput="offers_calculateCurrencyValue('from', 'ETH')" value="">
										
										<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount DLS</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="number">This field must be a number</div>
									<div class="field_error" data-error="greater">You must enter a greater value</div>
								</div>
							</div>
							
							<div class="flex justify-center items-center pr-2 pl-2 font-10">=</div>
							
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
					</div>
				</div>
				<?php } else if($paths[2] == 'paypal') { ?>
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Deposit With PayPal</div>
					<div class="mb-2">You will receive DLS instantly after your payment is verified by our system, we only accept Friends & Family payments, please do not send normal payments.</div>
					<div class="mb-2">INCLUDE THIS IN YOUR PAYMENT NOTE: (BETDLS NAME <font color="red"><?php echo $user['username']; ?></font>) <input type="text" value="BETDLS NAME <?php echo $user['username']; ?>" hidden id="myInput"><button class="site-button purple mt-2" onclick="myFunction()">Copy</button></div>

<img height="230" width="350" src="https://betdls.com/random_pictures/paypal.png"><br><br>
					<div class="mb-2">Send <font color="blue">Friends & Family</font> payment to: </div><div><font color="green">paymentsfor.j@gmail.com</font></div>					<div class="" id="panel_currency_bottom">
					<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}
</script>

					<div class="mt-2">
						<div class="text-upper font-8">DLS to EUR calculator</div>
						
						<div class="width-8 responsive m-a flex">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="currency_coin_from" oninput="offers_calculateCurrencyValues('from', 'ETH')" value="">
										
										<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount DLS</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="number">This field must be a number</div>
									<div class="field_error" data-error="greater">You must enter a greater value</div>
								</div>
							</div>
							
							<div class="flex justify-center items-center pr-2 pl-2 font-10">=</div>
							
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="currency_coin_to" oninput="offers_calculateCurrencyValues('to', 'ETH')" value="">
										
										<div class="field_label transition-5"><div class="input_coins eth-coins mr-1"></div>Amount Euro</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="number">This field must be a number</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } else if($paths[2] == 'ltc') { ?>
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Deposit With Litecoin</div>
					<div class="mb-2">You will receive DLS automatically on the website after sending LTC to the address displayed below.</div>
					
					<div class="<?php if($addresses['LTC'] == null) echo "hidden";?>" id="panel_currency_top">
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="ltc_address" value="<?php echo $addresses['LTC'];?>" readonly="">
										
										<div class="field_label transition-5">Your personal LTC deposit address</div>
									</div>
									
									<div class="field_extra">
										<button type="button" class="site-button purple" data-copy="input" data-input="ltc_address">Copy Address</button>
									</div>
								</div>
								
								<div class="field_bottom"></div>
							</div>
						</div>
						
						<div class="qrcode qrcode-crypto qrcode-ltc"></div>
					</div>
					
					<div class="<?php if($addresses['LTC'] != null) echo "hidden";?>" id="panel_currency_bottom">
						<button type="button" class="site-button purple" id="generate_address" data-currency="LTC">GENERATE MY DEPOSIT ADDRESS</button>
					</div>
					
					<div class="mt-2">
						<div class="text-upper font-8">DLS to LTC calculator</div>
						
						<div class="width-8 responsive m-a flex">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="currency_coin_from" oninput="offers_calculateCurrencyValue('from', 'LTC')" value="">
										
										<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount DLS</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="number">This field must be a number</div>
									<div class="field_error" data-error="greater">You must enter a greater value</div>
								</div>
							</div>
							
							<div class="flex justify-center items-center pr-2 pl-2 font-10">=</div>
							
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
					</div>
				</div>
				<?php }else if($paths[2] == 'bch') { ?>
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Deposit With Bitcoin Cash</div>
					<div class="mb-2">You will receive DLS automatically on the website after sending BCH to the address displayed below.</div>
					
					<div class="<?php if($addresses['BCH'] == null) echo "hidden";?>" id="panel_currency_top">
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="bch_address" value="<?php echo $addresses['BCH'];?>" readonly="">
										
										<div class="field_label transition-5">Your personal BCH deposit address</div>
									</div>
									
									<div class="field_extra">
										<button type="button" class="site-button purple" data-copy="input" data-input="bch_address">Copy Address</button>
									</div>
								</div>
								
								<div class="field_bottom"></div>
							</div>
						</div>
						
						<div class="qrcode qrcode-crypto qrcode-bch"></div>
					</div>
					
					<div class="<?php if($addresses['BCH'] != null) echo "hidden";?>" id="panel_currency_bottom">
						<button type="button" class="site-button purple" id="generate_address" data-currency="BCH">GENERATE MY DEPOSIT ADDRESS</button>
					</div>
					
					<div class="mt-2">
						<div class="text-upper font-8">DLS to BCH calculator</div>
						
						<div class="width-8 responsive m-a flex">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="currency_coin_from" oninput="offers_calculateCurrencyValue('from', 'BCH')" value="">
										
										<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount DLS</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="number">This field must be a number</div>
									<div class="field_error" data-error="greater">You must enter a greater value</div>
								</div>
							</div>
							
							<div class="flex justify-center items-center pr-2 pl-2 font-10">=</div>
							
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" id="currency_coin_to" oninput="offers_calculateCurrencyValue('to', 'BCH')" value="">
										
										<div class="field_label transition-5"><div class="input_coins bch-coins mr-1"></div>Amount BCH</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="number">This field must be a number</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
