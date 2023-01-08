<div class="p-2">
	<div class="responsive">

		<div class="responsive">
			<div class="flex column gap-2">
				<div class="bg-dark-transparent b-d2 p-2 rounded-1 grid split-column-2 gap-2">
					<div class="flex column items-center justify-center">
						<div class="text-upper font-9">0.50% bet commission!</div>
						<div class="text-color font-7">Get a cut of the bets placed by your referrals!</div>
					</div>
					
					<div class="flex column items-center justify-center">
						<div class="text-upper font-9">0.25% deposit commission!</div>
						<div class="text-color font-7">Get DLS when your referrals deposit! (crypto only)</div>
					</div>
				</div>
				
				<?php if(!$response['looking']){ ?>
				<div class="grid split-column-5 gap-2 responsive">
					<div class="flex justify-between bg-light b-d2 p-2 rounded-1">
						<div class="flex column gap-1 text-left">
							<div class="text-upper text-bold text-gray font-6">Bet commission</div>
							<div class="font-8"><div class="coins mr-1"></div><?php echo number_format(roundedToFixed($response['affiliates']['commission_wagered'], 5), 5, '.', ''); ?></div>
						</div>
					</div>
					<div class="flex justify-between bg-light b-d2 p-2 rounded-1">
						<div class="flex column gap-1 text-left">
							<div class="text-upper text-bold text-gray font-6">Deposit commission</div>
							<div class="font-8"><div class="coins mr-1"></div><?php echo number_format(roundedToFixed($response['affiliates']['commission_deposited'], 5), 5, '.', ''); ?></div>
						</div>
					</div>
					<div class="flex justify-between bg-light b-d2 p-2 rounded-1">
						<div class="flex column gap-1 text-left">
							<div class="text-upper text-bold text-gray font-6">Collected</div>
							<div class="font-8"><div class="coins mr-1"></div><?php echo getFormatAmountString($response['affiliates']['collected']);?></div>
						</div>
					</div>
					<div class="flex justify-between bg-light b-d2 p-2 rounded-1">
						<div class="flex column gap-1 text-left">
							<div class="text-upper text-bold text-gray font-6">Total Users</div>
							<div class="font-8"><div class="coins mr-1"></div><?php echo $response['affiliates']['referrals']['total']; ?></div>
						</div>
					</div>
					<div class="flex justify-between bg-light b-d2 p-2 rounded-1">
						<div class="flex column gap-1 text-left">
							<div class="text-upper text-bold text-gray font-6">Available</div>
							<div class="font-8"><div class="coins mr-1"></div><?php echo number_format(roundedToFixed($response['affiliates']['available'], 5), 5, '.', '');?></div>
						</div>
						
						<button class="site-button purple" id="collect_affiliates_referral_available">Collect</button>
					</div>
				</div>
				<?php } else { ?>
				<div class="grid split-column-3 gap-2 responsive">
					<div class="flex justify-between bg-light b-d2 p-2 rounded-1">
						<div class="flex column gap-1 text-left">
							<div class="text-upper text-bold text-gray font-6">Bet commission</div>
							<div class="font-8"><div class="coins mr-1"></div><?php echo number_format(roundedToFixed($response['affiliates']['commission_wagered'], 5), 5, '.', ''); ?></div>
						</div>
					</div>
					<div class="flex justify-between bg-light b-d2 p-2 rounded-1">
						<div class="flex column gap-1 text-left">
							<div class="text-upper text-bold text-gray font-6">Deposit commission</div>
							<div class="font-8"><div class="coins mr-1"></div><?php echo number_format(roundedToFixed($response['affiliates']['commission_deposited'], 5), 5, '.', ''); ?></div>
						</div>
					</div>
					<div class="flex justify-between bg-light b-d2 p-2 rounded-1">
						<div class="flex column gap-1 text-left">
							<div class="text-upper text-bold text-gray font-6">Collected</div>
							<div class="font-8"><div class="coins mr-1"></div><?php echo getFormatAmountString($response['affiliates']['collected']);?></div>
						</div>
					</div>
				</div>
				<?php } ?>
			
				<div class="table-container">
					<div class="table-header">
						<div class="table-row">
							<div class="table-column text-left">User Id</div>
							<div class="table-column text-left">Wagered</div>
							<div class="table-column text-left">Deposited</div>
							<div class="table-column text-left">Commission wagered</div>
							<div class="table-column text-left">Commission deposited</div>
							<div class="table-column text-left">Total</div>
						</div>
					</div>
					
					<div class="table-body" id="user_affiliates">
						<?php if(sizeof($response['affiliates']['referrals']['list']) > 0){?>
						<?php foreach($response['affiliates']['referrals']['list'] as $key => $value){ ?>
						<div class="table-row">
							<div class="table-column text-left"><?php echo $value['userid']; ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($value['wagered']); ?></div>
							<div class="table-column text-left"><?php echo getFormatAmountString($value['deposited']);?></div>
							<div class="table-column text-left"><?php echo number_format(roundedToFixed($value['commission_wagered'], 5), 5, '.', ''); ?></div>
							<div class="table-column text-left"><?php echo number_format(roundedToFixed($value['commission_deposited'], 5), 5, '.', ''); ?></div>
							<div class="table-column text-left"><?php echo number_format(roundedToFixed($value['commission_deposited'] + $value['commission_wagered'], 5), 5, '.', ''); ?></div>
						</div>
						<?php } ?>
						<?php } else { ?>
						<div class="table-row">
							<div class="table-column">No data found</div>
						</div>
						<?php } ?>
					</div>
			
					<div class="table-footer">
						<div class="flex items-center justify-center bg-dark p-2">
							<div class="pagination-content flex row gap-2" id="pagination_user_affiliates">
								<div class="pagination-item flex items-center justify-center" data-page="1">«</div>
								
								<div class="flex row gap-1">
									<?php $imin_page = $response['affiliates']['referrals']['page'] - 3; ?>
									<?php $imax_page = $response['affiliates']['referrals']['page'] + 3; ?>
									
									<?php $min_page = max(1, ($imin_page - (($imax_page > $response['affiliates']['referrals']['pages']) ? $imax_page - $response['affiliates']['referrals']['pages'] : 0))); ?>
									<?php $max_page = min($response['affiliates']['referrals']['pages'], ($imax_page + (($imin_page < 1) ? 1 - $imin_page : 0))); ?>
								
									<?php for($i = $min_page; $i <= $max_page; $i++){ ?>
									<div class="pagination-item flex items-center justify-center <?php if($response['affiliates']['referrals']['page'] == $i) { ?>active<?php } ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></div>
									<?php } ?>
								</div>
								
								<div class="pagination-item flex items-center justify-center" data-page="<?php echo $response['affiliates']['referrals']['pages']; ?>">»</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>