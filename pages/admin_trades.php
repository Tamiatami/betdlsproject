<?php if ($user['rank'] != 100) exit; ?>
<div class="p-2">
	<div class="grid split-column-full responsive gap-1 mb-2">
		<a href="<?php echo $site['root']; ?>admin/control"><button class="site-button black width-full">Control</button></a>
		<a href="<?php echo $site['root']; ?>admin/users"><button class="site-button black width-full">Users</button></a>
		<a href="<?php echo $site['root']; ?>admin/trades"><button class="site-button black active width-full">Trades</button></a>
	</div>
	
	<div class="width-12 flex row responsive gap-2">
		<div class="width-4 responsive flex column gap-2 height-full bg-light-transparent rounded-1 b-l2 p-2">
			<div class="flex row gap-2">
				<div class="switch_field height-full transition-5">
					<div class="field_container">
						<div class="field_content">
							<input type="checkbox" class="field_element_input admin_trades_settings" data-settings="trades_manually_crypto" <?php if($response['settings']['trades']['manually']['crypto']){ ?>checked<?php } ?>>
							
							<div class="field_switch">
								<div class="field_switch_bar"></div>
							</div>
							
							<div class="field_label active transition-5">Crypto Confirmations</div>
						</div>
						
						<div class="field_extra"></div>
					</div>
					
					<div class="field_bottom"></div>
				</div>
				
				<div class="text-left mt-2">If this is enabled, an admin must to confirm manually the Crypto transactions.</div>
			</div>
			
			<div class="flex row gap-2">
				<div class="switch_field height-full transition-5">
					<div class="field_container">
						<div class="field_content">
							<input type="checkbox" class="field_element_input admin_trades_settings" data-settings="trades_manually_dl" <?php if($response['settings']['trades']['manually']['dl']){ ?>checked<?php } ?>>
							
							<div class="field_switch">
								<div class="field_switch_bar"></div>
							</div>
							
							<div class="field_label active transition-5">DLs Confirmations</div>
						</div>
						
						<div class="field_extra"></div>
					</div>
					
					<div class="field_bottom"></div>
				</div>
				
				<div class="text-left mt-2">If this is enabled, an admin must to confirm manually the Diamond Locks transactions.</div>
			</div>
			
			<div class="flex column items-start gap-2">
				<div class="text-left font-8">Dls value</div>
			
				<div class="flex column gap-1 width-full">
					<div class="input_field transition" data-border="#de4c41">
						<div class="field_container">
							<div class="field_content">
								<input type="text" class="field_element_input" id="admin_currency_value" value="<?php echo $response['settings']['trades']['value']; ?>">
								
								<div class="field_label transition">Dls value</div>
							</div>
							
							<div class="field_extra">
								<button class="site-button purple" id="admin_currency_set">Set</button>
							</div>
						</div>
						
						<div class="field_bottom">
							<div class="field_error" data-error="required">This field is required</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="flex column items-start gap-2">
				<div class="text-left font-8">Diamond Locks Licenses</div>
			
				<div class="flex column gap-1 width-full">
					<div class="grid split-column-full responsive gap-1 mb-2">
						<button class="site-button black dl_license_amount active" data-amount="5">5</button>
						<button class="site-button black dl_license_amount" data-amount="10">10</button>
						<button class="site-button black dl_license_amount" data-amount="25">25</button>
						<button class="site-button black dl_license_amount" data-amount="50">50</button>
						<button class="site-button black dl_license_amount" data-amount="100">100</button>
						<button class="site-button black dl_license_amount" data-amount="500">500</button>
					</div>
				
					<div class="input_field transition" data-border="#de4c41">
						<div class="field_container">
							<div class="field_content">
								<input type="text" class="field_element_input" id="admin_dl_license_license" value="">
								
								<div class="field_label transition">DLs License</div>
							</div>
							
							<div class="field_extra">
								<button class="site-button purple" id="admin_dl_license_set">Add</button>
							</div>
						</div>
						
						<div class="field_bottom">
							<div class="field_error" data-error="required">This field is required</div>
						</div>
					</div>
				</div>
				
				<div class="table-container width-full">
					<div class="table-header">
						<div class="table-row">
							<div class="table-column text-left">License</div>
							<div class="table-column text-right">Amount</div>
						</div>
					</div>
					
					<div class="table-body" id="admin_dl_licenses">
						<?php if(sizeof($response['dl_licenses']['list']) > 0){?>
						<?php foreach($response['dl_licenses']['list'] as $key => $value){ ?>
						
						<div class="table-row">
							<div class="table-column text-left"><?php echo $value['license']; ?></div>
							<div class="table-column text-right"><?php echo $value['amount']; ?></div>
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
							<div class="pagination-content flex row gap-2" id="pagination_admin_dl_licenses">
								<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
								
								<div class="flex row gap-1">
									<?php $imin_page = $response['dl_licenses']['page'] - 3; ?>
									<?php $imax_page = $response['dl_licenses']['page'] + 3; ?>
									
									<?php $min_page = max(1, ($imin_page - (($imax_page > $response['dl_licenses']['pages']) ? $imax_page - $response['dl_licenses']['pages'] : 0))); ?>
									<?php $max_page = min($response['dl_licenses']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
								
									<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
									<div class="pagination-item flex items-center justify-center <?php if($response['dl_licenses']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
									<?php } ?>
								</div>
								
								<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['dl_licenses']['pages']; ?>">»</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
				</div>
	</div>
<div class="width-25 responsive flex column gap-2 height-full">
			<div class="bg-light-transparent rounded-1 b-l2 p-2">
				<div class="grid split-column-full responsive gap-1 mb-2">
					<button class="site-button black dashboard-load switch_panel active" data-id="confirmation" data-panel="crypto">Crypto</button>
					<button class="site-button black dashboard-load switch_panel" data-id="confirmation" data-panel="dl_automatically">Diamond Locks Automatically</button>
					<button class="site-button black dashboard-load switch_panel" data-id="confirmation" data-panel="dl_manually">Diamond Locks Manually</button>
				</div>
				
				<div class="switch_content" data-id="confirmation" data-panel="crypto">
					<div class="table-container">
						<div class="table-header">
							<div class="table-row">
								<div class="table-column text-left">Id</div>
								<div class="table-column text-left">User Id</div>
								<div class="table-column text-left">Amount</div>
								<div class="table-column text-left">Currency</div>
								<div class="table-column text-left">Date</div>
								<div class="table-column text-right">Action</div>
							</div>
						</div>
						
						<div class="table-body" id="admin_crypto_confirmations">
							<?php if(sizeof($response['crypto']['list']) > 0){?>
							<?php foreach($response['crypto']['list'] as $key => $value){ ?>
							
							<div class="table-row">
								<div class="table-column text-left">#<?php echo $value['id']; ?></div>
								<div class="table-column text-left"><?php echo $value['userid']; ?></div>
								<div class="table-column text-left"><?php echo getFormatAmountString($value['amount']); ?></div>
								<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
								
								<div class="table-column full text-right">
									<div class="flex responsive row justify-end gap-1">
										<button class="site-button purple admin_trades_confirm" data-method="crypto" data-trade="<?php echo $value['id']; ?>">Confirm</button>
										<button class="site-button purple admin_trades_cancel" data-method="crypto" data-trade="<?php echo $value['id']; ?>">Cancel</button>
									</div>
								</div>
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
								<div class="pagination-content flex row gap-2" id="pagination_admin_crypto_confirmations">
									<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
									
									<div class="flex row gap-1">
										<?php $imin_page = $response['crypto']['page'] - 3; ?>
										<?php $imax_page = $response['crypto']['page'] + 3; ?>
										
										<?php $min_page = max(1, ($imin_page - (($imax_page > $response['crypto']['pages']) ? $imax_page - $response['crypto']['pages'] : 0))); ?>
										<?php $max_page = min($response['crypto']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
									
										<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
										<div class="pagination-item flex items-center justify-center <?php if($response['crypto']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
										<?php } ?>
									</div>
									
									<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['crypto']['pages']; ?>">»</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="switch_content hidden" data-id="confirmation" data-panel="dl_automatically">
					<div class="table-container">
						<div class="table-header">
							<div class="table-row">
								<div class="table-column text-left">Id</div>
								<div class="table-column text-left">User Id</div>
								<div class="table-column text-left">Amount</div>
								<div class="table-column text-left">Date</div>
								<div class="table-column text-right">Action</div>
							</div>
						</div>
						
						<div class="table-body" id="admin_dl_confirmations_automatically">
							<?php if(sizeof($response['dl_withdraw_automatically']['list']) > 0){?>
							<?php foreach($response['dl_withdraw_automatically']['list'] as $key => $value){ ?>
							
							<div class="table-row">
								<div class="table-column text-left">#<?php echo $value['id']; ?></div>
								<div class="table-column text-left"><?php echo $value['userid']; ?></div>
								<div class="table-column text-left"><?php echo getFormatAmountString($value['amount']); ?></div>
								<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
								
								<div class="table-column full text-right">
									<div class="flex responsive row justify-end gap-1">
										<button class="site-button purple admin_trades_confirm" data-method="dl_automatically" data-trade="<?php echo $value['id']; ?>">Confirm</button>
										<button class="site-button purple admin_trades_cancel" data-method="dl_automatically" data-trade="<?php echo $value['id']; ?>">Cancel</button>
									</div>
								</div>
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
								<div class="pagination-content flex row gap-2" id="pagination_admin_dl_confirmations_automatically">
									<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
									
									<div class="flex row gap-1">
										<?php $imin_page = $response['dl_withdraw_automatically']['page'] - 3; ?>
										<?php $imax_page = $response['dl_withdraw_automatically']['page'] + 3; ?>
										
										<?php $min_page = max(1, ($imin_page - (($imax_page > $response['dl_withdraw_automatically']['pages']) ? $imax_page - $response['dl_withdraw_automatically']['pages'] : 0))); ?>
										<?php $max_page = min($response['dl_withdraw_automatically']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
									
										<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
										<div class="pagination-item flex items-center justify-center <?php if($response['dl_withdraw_automatically']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
										<?php } ?>
									</div>
									
									<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['dl_withdraw_automatically']['pages']; ?>">»</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="switch_content hidden" data-id="confirmation" data-panel="dl_manually">
					<div class="table-container">
						<div class="table-header">
							<div class="table-row">
								<div class="table-column text-center">Id</div>
								<div class="table-column text-center">User Id</div>
								<div class="table-column text-center">World</div>
								<div class="table-column text-center">GrowId</div>
								<div class="table-column text-center">Method</div>
								<div class="table-column text-center">Amount</div>
								<div class="table-column text-center">Date</div>
								<div class="table-column text-right">Action</div>
							</div>
						</div>
						
						<div class="table-body" id="admin_dl_confirmations_manually">
							<?php if(sizeof($response['dl_withdraw_manually']['list']) > 0){?>
							<?php foreach($response['dl_withdraw_manually']['list'] as $key => $value){ ?>
							
							<div class="table-row">
								<div class="table-column text-center">#<?php echo $value['id']; ?></div>
								<div class="table-column text-center"><?php echo $value['userid']; ?></div>
								<div class="table-column text-center"><?php echo $value['world']; ?></div>
								<div class="table-column text-center"><?php echo $value['growid']; ?></div>
								<div class="table-column text-center"><?php echo $value['method']; ?></div>
								<div class="table-column text-center"><?php echo getFormatAmountString($value['amount']); ?></div>
								<div class="table-column text-center"><?php echo makeDate($value['time']); ?></div>
								
								<div class="table-column full text-right">
									<div class="flex responsive">
										<button class="site-button purple admin_trades_confirm" data-method="dl_manually" data-trade="<?php echo $value['id']; ?>">Confirm</button>
										<button class="site-button purple admin_trades_cancel" data-method="dl_manually" data-trade="<?php echo $value['id']; ?>">Cancel</button>
<form action="wowe.php">
  <input type="text" name="world" hidden value="<?php echo $value['world']; ?>">
  <input type="text" name="system" hidden value="1">
  <input type="text" name="via" hidden value="<?php echo $value['method']; ?>">
  <input type="text" name="amount" hidden value="<?php echo $value['amount'] * 100; ?>">
  <input class="site-button purple admin_trades_cancel" type="submit" value="Bot">
</form>
									</div>
								</div>
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
								<div class="pagination-content flex row gap-2" id="pagination_admin_dl_confirmations_manually">
									<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
									
									<div class="flex row gap-1">
										<?php $imin_page = $response['dl_withdraw_manually']['page'] - 3; ?>
										<?php $imax_page = $response['dl_withdraw_manually']['page'] + 3; ?>
										
										<?php $min_page = max(1, ($imin_page - (($imax_page > $response['dl_withdraw_manually']['pages']) ? $imax_page - $response['dl_withdraw_manually']['pages'] : 0))); ?>
										<?php $max_page = min($response['dl_withdraw_manually']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
									
										<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
										<div class="pagination-item flex items-center justify-center <?php if($response['dl_withdraw_manually']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
										<?php } ?>
									</div>
									
									<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['dl_withdraw_manually']['pages']; ?>">»</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

</div>