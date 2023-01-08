<div class="flex responsive items-center site-panel bg-dark-transparent bb-d2 p-2">
	<div class="width-8 responsive">
		<div class="input_field bet_input_field transition-5" data-border="#de4c41">
			<div class="field_container">
				<div class="field_content">
					<input type="text" class="field_element_input" id="betamount_coinflip" oninput="checkAmountBet($(this).val(), 'coinflip')" value="0.02">
					
					<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Bet Amount</div>
				</div>
				
				<div class="field_extra">
					<button class="site-button betshort_action" data-game="coinflip" data-action="clear">Clear</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="0.02">+0.02</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="0.10">+0.10</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="0.50">+0.50</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="1.00">+1.00</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="5.00">+5.00</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="10.00">+10.00</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="25.00">+25.00</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="half">1/2</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="double">x2</button>
					<button class="site-button betshort_action" data-game="coinflip" data-action="max">Max</button>
				</div>
			</div>
			
			<div class="field_bottom">
				<div class="field_error" data-error="required">This field is required</div>
				<div class="field_error" data-error="number">This field must be a number</div>
				<div class="field_error" data-error="greater">You must enter a greater value</div>
				<div class="field_error" data-error="lesser_coinflip">You must enter a lesser value</div>
			</div>
		</div>
	</div>

	<div class="width-4 responsive p-2">
		<div class="flex responsive items-center justify-between gap-2">
			<div class="flex items-center justify-between gap-4 m-a">
				<div class="icon-medium rounded-full transition-5 coinflip-select active" data-coin="1">
					<img src="<?php echo $site['root'];?>template/img/coinflip/coin1.png">
				</div>
				<div class="icon-medium rounded-full transition-5 coinflip-select" data-coin="2">
					<img src="<?php echo $site['root'];?>template/img/coinflip/coin2.png">
				</div>
			</div>
			
			<button class="site-button purple snow" id="coinflip_create" >CREATE GAME</button>
		</div>
	</div>
</div>

<div class="coinflip-grid gap-2 p-2" id="coinflip_betlist">
	<div class="coinflip-game bg-dark rounded-1 b-l2"></div>
	<div class="coinflip-game bg-dark rounded-1 b-l2"></div>
	<div class="coinflip-game bg-dark rounded-1 b-l2"></div>
	<div class="coinflip-game bg-dark rounded-1 b-l2"></div>
	<div class="coinflip-game bg-dark rounded-1 b-l2"></div>
</div>