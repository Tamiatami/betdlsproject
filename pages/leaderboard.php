<?php exit; ?>
<div class="p-2">
	<div class="title-page flex items-center justify-center text-center">Leaderboard</div>

	<div class="table-container mt-2">
		<div class="table-header">
			<div class="table-row">
				<div class="table-column text-left">Rank</div>
				<div class="table-column text-left">User</div>
				<div class="table-column text-left">Games played</div>
				<div class="table-column text-left">Total played (DLS)</div>
				<div class="table-column text-left">Total winnings (DLS)</div>
			</div>
		</div>
		
		<div class="table-body">
			<?php if(sizeof($response['leaderboard']) > 0){ ?>
			<?php $id = 1; ?>
			<?php foreach($response['leaderboard'] as $key => $dl){ ?>
				<div class="table-row">
					<div class="table-column text-left">#<?php echo $id; ?></div>
					<div class="table-column text-left">
						<div class="flex items-center height-full gap-1">
							<img class="icon-small rounded-full" src="<?php echo $dl['avatar']; ?>">
							<div class="text-left ellipsis pr-1"><?php echo $dl['name']; ?></div>
						</div>
					</div>
					<div class="table-column text-left"><?php echo $dl['games']; ?></div>
					<div class="table-column text-left"><?php echo getFormatAmountString(-$dl['bets']); ?></div>
					<div class="table-column text-left"><?php echo getFormatAmountString($dl['winnings']); ?></div>
				</div>
				<?php $id++; ?>
				
			<?php } ?>
			<?php } else { ?>
				<div class="table-row">
					<div class="table-column text-center">No players have bet on the site!</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>