<div class="progress-container meter small width-full mb-2">
	<div class="progress-bar transition-10 linear" id="jackpot_counter" style="width: 100%"></div>
	<div class="progress-content grid split-column-3 gap-2 pr-2 pl-2 items-center">
		<div class="text-left pointer text-bold fair-results" id="fair_jackpot_results" data-fair="{}">Provably fair</div>
		<div class="text-center" id="jackpot_timer">WAITING FOR PLAYERS...</div>
	</div>
</div>

<div class="jackpot-case relative mb-1" id="jackpot_case">
	<div class="group-reel flex" id="jackpot_spinner">
		<div class="flex" id="jackpot_field"></div>
	</div>
	
	<div class="shadow shadow-left"></div>
	<div class="shadow shadow-right"></div>
	
	<div class="absolute top-0 bottom-0 left-0 right-0 flex justify-center">
		<div class="pointer flex items-center"></div>
	</div>
</div>

<div class="flex column gap-2 m-2">
	<div class="flex row gap-1 items-center responsive">
		<div class="width-8 responsive">
			<div class="input_field bet_input_field transition-5" data-border="#de4c41">
				<div class="field_container">
					<div class="field_content">
						<input type="text" class="field_element_input" id="betamount_jackpot" oninput="checkAmountBet($(this).val(), 'jackpot')" value="0.02">
						
						<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Bet Amount</div>
					</div>
					
					<div class="field_extra">
						<button class="site-button betshort_action" data-game="jackpot" data-action="0.02">+0.02</button>
						<button class="site-button betshort_action" data-game="jackpot" data-action="0.10">+0.10</button>
						<button class="site-button betshort_action" data-game="jackpot" data-action="0.50">+0.50</button>
						<button class="site-button betshort_action" data-game="jackpot" data-action="1.00">+1.00</button>
						<button class="site-button betshort_action" data-game="jackpot" data-action="5.00">+5.00</button>
						<button class="site-button betshort_action" data-game="jackpot" data-action="10.00">+10.00</button>
						<button class="site-button betshort_action" data-game="jackpot" data-action="25.00">+25.00</button>
						<button class="site-button purple snow" id="jackpot_bet">JOIN IN JACKPOT</button>
					</div>
				</div>
				
				<div class="field_bottom">
					<div class="field_error" data-error="required">This field is required</div>
					<div class="field_error" data-error="number">This field must be a number</div>
					<div class="field_error" data-error="greater">You must enter a greater value</div>
					<div class="field_error" data-error="lesser_jackpot">You must enter a lesser value</div>
				</div>
			</div>
		</div>
		
		<div class="width-4 responsive">
			<div class="jackpot-game grid split-column-2 gap-1 width-full">
				<div class="height-full bg-light flex column gap-1 items-center justify-center rounded-0">
					<div class="font-6 text-upper text-gray text-bold">Total amount</div>
					<div class="font-8"><div class="coins mr-1"></div><span id="jackpot_total">0.00</span></div>
				</div>
				
				<div class="height-full bg-light flex column gap-1 items-center justify-center rounded-0">
					<div class="font-6 text-upper text-gray text-bold">Your chance</div>
					<div class="font-8"><span id="jackpot_mychange">0.00</span>%</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="jackpot-grid-bets bg-light rounded-0 p-1" id="jackpot_betlist">
		<div class="in-grid flex justify-center items-center font-8 history_message">No users in game</div>
	</div>
	
	<div class="flex column gap-2" id="jackpot_histories"></div>
</div>