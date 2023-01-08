<div class="flex responsive justify-center mt-2">
	<div class="width-8 responsive">
		<div class="width-12 flex responsive row items-center mb-2 gap-2">
			<div class="width-6 responsive flex justify-end">
				<div class="tower-grid">
					<?php for($i = 7; $i >= 0; $i--){ ?>
						<?php for($j = 0; $j < 3; $j++){ ?>
					<div class="tile flex justify-center items-center rounded-0 disabled" id="tower_tile" data-stage="<?php echo $i; ?>" data-button="<?php echo $j; ?>"><div class="vertical-center" id="tower_tile_amount"></div></div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
				
			<div class="width-6 responsive">
				<div class="input_field bet_input_field transition-5" data-border="#de4c41">
					<div class="field_container">
						<div class="field_content">
							<input type="text" class="field_element_input" id="betamount_tower" oninput="checkAmountBet($(this).val(), 'tower')" value="0.02">
							
							<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Bet Amount</div>
						</div>
						
						<div class="field_extra">
							<button class="site-button betshort_action" data-game="tower" data-action="0.02">+0.02</button>
							<button class="site-button betshort_action" data-game="tower" data-action="0.10">+0.10</button>
							<button class="site-button betshort_action" data-game="tower" data-action="0.50">+0.50</button>
							<button class="site-button betshort_action" data-game="tower" data-action="1.00">+1.00</button>
							<button class="site-button betshort_action" data-game="tower" data-action="5.00">+5.00</button>
							<button class="site-button betshort_action" data-game="tower" data-action="10.00">+10.00</button>
							<button class="site-button betshort_action" data-game="tower" data-action="25.00">+25.00</button>
						</div>
					</div>
					
					<div class="field_bottom">
						<div class="field_error" data-error="required">This field is required</div>
						<div class="field_error" data-error="number">This field must be a number</div>
						<div class="field_error" data-error="greater">You must enter a greater value</div>
						<div class="field_error" data-error="lesser_tower">You must enter a lesser value</div>
					</div>
				</div>
				
				<div class="mt-2">
					<button class="site-button purple width-full snow" id="tower_bet">PLACE BET</button>
					<button class="site-button pink hidden width-full" id="tower_cashout">CASHOUT</button>
				</div>
			</div>
		</div>
		
		<div class="width-12 table-container">
			<div class="table-header">
				<div class="table-row">
					<div class="table-column text-left">User</div>
					<div class="table-column text-left">Bet</div>
					<div class="table-column text-left">Stage</div>
					<div class="table-column text-left">Roll</div>
					<div class="table-column text-left">Profit</div>
				</div>
			</div>
			
			<div class="table-body" id="tower_history">
				<div class="table-row history_message"><div class="table-column">No data found</div></div>
			</div>
		</div>
	</div>
</div>