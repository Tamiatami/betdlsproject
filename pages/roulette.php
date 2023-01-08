
<div class="progress-container meter small width-full mb-2">
	<div class="progress-bar" id="roulette_counter" style="width: 100%"></div>
	<div class="progress-content grid split-column-3 gap-2 pr-2 pl-2 items-center">
		<div class="text-left ellipsis">Round id: #<span id="roulette_info_id">0</span></div>
		<div class="text-center ellipsis" id="roulette_timer">WAITING FOR PLAYERS...</div>
	</div>
</div>

<div class="roulette-case relative mb-1" id="roulette_case">
	<div class="group-reel flex" id="roulette_spinner">
		<?php 
			for($i = 0; $i <= 7; $i++){
				echo '<div class="flex">
					<div class="reel-item reel-red flex justify-center items-center"><span class="text-shadow">1</span></div>
					<div class="reel-item reel-black flex justify-center items-center"><span class="text-shadow">14</span></div>
					<div class="reel-item reel-red flex justify-center items-center"><span class="text-shadow">2</span></div>
					<div class="reel-item reel-black flex justify-center items-center"><span class="text-shadow">13</span></div>
					<div class="reel-item reel-red flex justify-center items-center"><span class="text-shadow">3</span></div>
					<div class="reel-item reel-black flex justify-center items-center"><span class="text-shadow">12</span></div>
					<div class="reel-item reel-red flex justify-center items-center"><span class="text-shadow">4</span></div>
					<div class="reel-item reel-purple flex justify-center items-center"><span class="text-shadow">0</span></div>
					<div class="reel-item reel-black flex justify-center items-center"><span class="text-shadow">11</span></div>
					<div class="reel-item reel-red flex justify-center items-center"><span class="text-shadow">5</span></div>
					<div class="reel-item reel-black flex justify-center items-center"><span class="text-shadow">10</span></div>
					<div class="reel-item reel-red flex justify-center items-center"><span class="text-shadow">6</span></div>
					<div class="reel-item reel-black flex justify-center items-center"><span class="text-shadow">9</span></div>
					<div class="reel-item reel-red flex justify-center items-center"><span class="text-shadow">7</span></div>
					<div class="reel-item reel-black flex justify-center items-center"><span class="text-shadow">8</span></div>
				</div>';
			}
		?>
	</div>
	
	<div class="shadow shadow-left"></div>
	<div class="shadow shadow-right"></div>
	
	<div class="absolute top-0 bottom-0 left-0 right-0 flex justify-center">
		<div class="pointer"></div>
	</div>
</div>

<div class="flex column gap-2 m-2">
	<div class="flex hidden" id="roulette_history">
		<div class="inline-block width-6 text-left">
			<span class="inline-block text-upper mr-1 font-6">Previous rolls </span>
			<div class="inline-block" id="roulette_rolls"></div>							
		</div>
		
		<div class="inline-block width-6 text-right">
			<span class="inline-block text-upper mr-1 font-6">Last 100 rolls </span>
			
			<div class="inline-block">
				<div class="pick-ball small pick-ball-red text-shadow flex items-center justify-center"><div class='widht-full height-full text-shadow flex items-center justify-center' id="roulette_hundred_red">0</div></div>
				<div class="pick-ball small pick-ball-purple text-shadow flex items-center justify-center"><div class='widht-full height-full text-shadow flex items-center justify-center' id="roulette_hundred_purple">0</div></div>
				<div class="pick-ball small pick-ball-black text-shadow flex items-center justify-center"><div class='widht-full height-full text-shadow flex items-center justify-center' id="roulette_hundred_black">0</div></div>
			</div>
		</div>
	</div>

	<div class="flex gap-1 responsive">
		<div class="width-9 responsive">
			<div class="input_field bet_input_field transition-5" data-border="#de4c41">
				<div class="field_container">
					<div class="field_content">
						<input type="text" class="field_element_input" id="betamount_roulette" oninput="checkAmountBet($(this).val(), 'roulette')" value="0.02">
						
						<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Bet Amount</div>
					</div>
					
					<div class="field_extra">
						<button class="site-button betshort_action" data-game="roulette" data-action="clear">Clear</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="0.02">+0.02</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="0.10">+0.10</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="0.5">+0.50</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="1.00">+1.00</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="5.00">+5.00</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="10.00">+10.00</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="25.00">+25.00</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="half">1/2</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="double">x2</button>
						<button class="site-button betshort_action" data-game="roulette" data-action="max">Max</button>
					</div>
				</div>
				
				<div class="field_bottom">
					<div class="field_error" data-error="required">This field is required</div>
					<div class="field_error" data-error="number">This field must be a number</div>
					<div class="field_error" data-error="greater">You must enter a greater value</div>
					<div class="field_error" data-error="lesser_roulette">You must enter a lesser value</div>
				</div>
			</div>
		</div>
		
		<div class="width-3 responsive">
			<div class="input_field bet_input_field width-3 transition-5" data-border="#de4c41">
				<div class="field_container">
					<div class="field_content">
						<input type="text" class="field_element_input" id="roulette_info_public_seed" value="hidden" readonly>
						
						<div class="field_label transition-5">Public Seed</div>
					</div>
					
					<div class="field_extra">
						<button class="site-button" data-copy="input" data-input="#roulette_info_public_seed">Copy</button>
					</div>
				</div>
				
				<div class="field_errors"></div>
			</div>
		</div>
	</div>
				
	<div class="flex gap-2 responsive">
		<div class="width-4 responsive" id="roulette_panel_red">
			<div>
				<button class="site-button bet-button roulette-bet snow" data-color="red">2x</button>
				
				<div class="mt-1">
					<div class="roulette-bet-mytotal items-center text-left text-bold mb-2 font-8">
						<div class="coins"></div>
						<span class="roulette-mytotal">0.00</span>
					</div>
					
					<div class="roulette-high bg-light-transparent flex items-center gap-2 p-2 mb-1">
						<div>
							<img class="roulette-highicon icon-large" src="https://betdls.com/favicon-16x16.png?v=1670521522">
						</div>
						
						<div class="text-left">
							<div class="text-upper font-9 text-bold">Highest Red</div>
							
							<div class="mt-1">
								<div class="roulette-highname">Nothing</div>
								<div>
									<div class="coins"></div>
									<span class="roulette-hightotal">0.00</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="roulette-bet-betstotal flex items-center justify-between mb-1">
						<div>
							<i class="fa fa-users" aria-hidden="true"></i>
							<span class="roulette-betscount">0</span>
						</div>
						
						<div class="roulette-betstotal">0.00</div>
					</div>
					
					<div class="roulette-betslist grid gap-1"></div>
				</div>
			</div>
		</div>
		
		<div class="width-4 responsive" id="roulette_panel_purple">
			<div>
				<button class="site-button bet-button roulette-bet snow" data-color="purple">14x</button>
				
				<div class="mt-1">
					<div class="roulette-bet-mytotal items-center text-left text-bold mb-2 font-8">
						<div class="coins"></div>
						<span class="roulette-mytotal">0.00</span>
					</div>
					
					<div class="roulette-high bg-light-transparent flex items-center gap-2 p-2 mb-1">
						<div>
							<img class="roulette-highicon icon-large" src="https://betdls.com/favicon-16x16.png?v=1670521522">
						</div>
						
						<div class="text-left">
							<div class="text-upper font-9 text-bold">Highest Purple</div>
							
							<div class="mt-1">
								<div class="roulette-highname">Nothing</div>
								<div>
									<div class="coins"></div>
									<span class="roulette-hightotal">0.00</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="roulette-bet-betstotal flex items-center justify-between mb-1">
						<div>
							<i class="fa fa-users" aria-hidden="true"></i>
							<span class="roulette-betscount">0</span>
						</div>
						
						<div class="roulette-betstotal">0.00</div>
					</div>
					
					<div class="roulette-betslist grid gap-1"></div>
				</div>
			</div>
		</div>
		
		<div class="width-4 responsive" id="roulette_panel_black">
			<div>
				<button class="site-button bet-button roulette-bet snow" data-color="black">2x</button>
				
				<div class="mt-1">
					<div class="roulette-bet-mytotal items-center text-left text-bold mb-2 font-8">
						<div class="coins"></div>
						<span class="roulette-mytotal">0.00</span>
					</div>
					
					<div class="roulette-high bg-light-transparent flex items-center gap-2 p-2 mb-1">
						<div>
							<img class="roulette-highicon icon-large" src="https://betdls.com/favicon-16x16.png?v=1670521522">
						</div>
						
						<div class="text-left">
							<div class="text-upper font-9 text-bold">Highest Black</div>
							
							<div class="mt-1">
								<div class="roulette-highname">Nothing</div>
								<div>
									<div class="coins"></div>
									<span class="roulette-hightotal">0.00</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="roulette-bet-betstotal flex items-center justify-between mb-1">
						<div>
							<i class="fa fa-users" aria-hidden="true"></i>
							<span class="roulette-betscount">0</span>
						</div>
						
						<div class="roulette-betstotal">0.00</div>
					</div>
					
					<div class="roulette-betslist grid gap-1"></div>
				</div>
			</div>
		</div>
	</div>
</div>