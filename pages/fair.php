<div class="flex column responsive items-center p-2">
	<div class="title-page flex items-center justify-center text-center">Provably Fair</div>
	
	<div class="width-9 responsive text-left">
		<div class="text-bold mt-2 mb-1">To find out how we make sure that the outcomes are always random and never manipulated, choose a game from the list below.</div>
		<div><?php echo $site['name'];?> uses a provably fair approach, which prevents us from changing the results of a game once it has begun.</div>
		<div>Using tools like this <a class="text-color" href="https://www.tutorialspoint.com/execute_nodejs_online.php" target="_blank">this NodeJS tester</a>, You may run the code directly from your browser. Simply substitute the parameters from the round you want to check for.</div>
		
		<div class="fair-grid width-full rounded-1 overflow-h mt-2">
			<div class="fair-category transition-2">
				<div class="title font-8 pt-4 pb-4 pr-4 pl-4 pointer">Info</div>
				
				<div class="description transition-2 overflow-h pr-4 pl-4">
					<div class="flex column gap-2 pb-4">
						<div class="flex column">
							<div class="flex column gap-2 pb-4">
								<div>This is a passphrase or a randomly generated string that is determined by the player or their browser. This can be edited and changed regularly by yourself.</div>
								
								<div class="input_field transition" data-border="#de4c41">
									<div class="field_container">
										<div class="field_content">
											<input type="text" class="field_element_input" id="client_seed" value="<?php echo $response['fair']['client_seed']; ?>">
											
											<div class="field_label transition">Client Seed</div>
										</div>
										
										<div class="field_extra">
											<button class="site-button purple" id="save_clientseed">Save</button>
										</div>
									</div>
									
									<div class="field_bottom">
										<div class="field_error" data-error="required">This field is required</div>
									</div>
								</div>
							</div>
							
							<div class="flex column gap-2 pb-4">
								<div>To reveal the hashed server seed, the seed must be rotated by the player, which triggers the replacement with a newly generated seed. From this point you are able to verify any bets made with the previous server seed to verify both the legitimacy of the server seed with the encrypted hash that was provided.</div>
								<div>You can validate hashed server seed using this script. The hashed server seed is a SHA-256 hash of the seed so after you unhash it, you can check that it matches with the hashed version.</div>
								
								<div class="input_field transition" data-border="#de4c41">
									<div class="field_container">
										<div class="field_content">
											<input type="text" class="field_element_input" value="<?php echo $response['fair']['server_seed']; ?>">
											
											<div class="field_label transition">Server Seed Hashed</div>
										</div>
										
										<div class="field_extra">
											<button class="site-button purple" id="regenerate_serverseed">Generate</button>
										</div>
									</div>
									
									<div class="field_bottom">
										<div class="field_error" data-error="required">This field is required</div>
									</div>
								</div>
							</div>
						</div>
						
						<div>You can validate hashed server seed using this script. The hashed server seed is a SHA-256 hash of the seed so after you unhash it, you can check that it matches with the hashed version.</div>
						
						<code class="language-javascript">
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">sha256</span> <span class="operator">=</span> <span class="function">require</span><span class="punctuation">(</span><span class="string">'sha256'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">seed</span> <span class="operator">=</span> <span class="string">'f0c82c85ba6ef5cbba7406db81ee5451a1a795120e335116dc637d34a105e6e6'</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getHash256</span><span class="punctuation">(</span><span class="variable">seed</span><span class="punctuation">)</span><span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">sha256</span><span class="punctuation">(</span><span class="variable">seed</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="variable">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span><span class="string">'Hashed: '</span> <span class="operator">+</span> <span class="function">fair_getHash256</span><span class="punctuation">(</span><span class="variable">seed</span><span class="punctuation">)</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
						</code>
						
						<div class="table-container">
							<div class="table-header">
								<div class="table-row">
									<div class="table-column text-left">Id</div>
									<div class="table-column text-left">Server Seed</div>
									<div class="table-column text-left">Useds</div>
									<div class="table-column text-left">Created At</div>
								</div>
							</div>
							
							<div class="table-body">
								<?php if(sizeof($response['fair']['server_seeds']) > 0){?>
								<?php foreach($response['fair']['server_seeds'] as $key => $value){ ?>
								<div class="table-row <?php if($value['using']){ ?>text-danger<?php } ?>">
									<div class="table-column text-left"><?php echo $value['id']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['seed']; ?>"><?php if($value['using']){ ?>(hashed) <?php } ?><?php echo $value['seed']; ?></div>
									<div class="table-column text-left"><?php echo $value['nonce']; ?></div>
									<div class="table-column text-left"><?php echo makeDate($value['time']);?></div>
								</div>
								<?php } ?>
								<?php } else { ?>
								<div class="table-row">
									<div class="table-column text-center">No data found</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="fair-category transition-2">
				<div class="title font-8 pt-4 pb-4 pr-4 pl-4 pointer">Roulette Game</div>
				
				<div class="description transition-2 overflow-h pr-4 pl-4">
					<div class="flex column gap-2 pb-4">
						<div>Each section of the roll is assigned a number - and there are 15 potential numbers to land on. The resulting number from each spin is determined by a combination of three individual elements, which are fed into an algorithm:</div>
						<div>Client seed is SHA-256 hash generated daily from random 32 bytes. We show it to you the moment it's generated.</div>
						<div>Server seed is SHA-256 hash generated daily from random 32 bytes. We show you the encrypted version while it's in use.</div>
						<div>The nonce is based on numbers that is the round id. The first round ever played would have an nonce of 1. This number increases by 1 for each new round. The nonce's job in generating outcomes is to ensure that, even when the same public seed and server seed combination are used, the outcome generated in the next game would still be different, since the seed combination is paired with a unique nonce, the nonce for each game is always different, since the round id would have increased by one for every new game played.</div>
						
						<div>Since each roll, or outcome, is generated using cryptographically-secure randomness, the probability of a particular outcome will never change - even if you play 100,000,000 times. There’s no pattern or method used to determine which number will hit next - it’s sheer randomness.</div>

						<div>Today's server seed is currently in-use, therefore it is a secret and only the encrypted seed (hash) is visible to you. You can not verify today's results until the day is over and the (unhashed) server seed has been revealed.</div>
						
						<code class="language-javascript">
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">crypto</span> <span class="operator">=</span> <span class="function">require</span><span class="punctuation">(</span><span class="string">'crypto'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_server_seed</span> <span class="operator">=</span> <span class="string">'aed859a82f458f3111fb8dd813001a65a9d88fce5004a37a3648a4f3c745e9df'</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_public_seed</span> <span class="operator">=</span> <span class="string">'3e2a4be2d0eb744ea4b07b2773f881f035f84f5fcb1880ceb25929ad7563df34'</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">roll_nonce</span> <span class="operator">=</span> <span class="number">0</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="punctuation">[</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">]</span><span class="punctuation">.</span><span class="function">join</span><span class="punctuation">(</span><span class="string">'-'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">seed</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">crypto</span><span class="punctuation">.</span><span class="function">createHmac</span><span class="punctuation">(</span><span class="string">'sha256'</span><span class="punctuation">,</span> <span class="variable">seed</span><span class="punctuation">)</span><span class="punctuation">.</span><span class="function">digest</span><span class="punctuation">(</span><span class="string">'hex'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">,</span> <span class="function">max</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">abs</span><span class="punctuation">(</span><span class="function">parseInt</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">.</span><span class="function">substr</span><span class="punctuation">(</span><span class="number">0</span><span class="punctuation">,</span> <span class="number">12</span><span class="punctuation">)</span><span class="punctuation">,</span> <span class="number">16</span><span class="punctuation">)</span><span class="punctuation">)</span> <span class="operator">%</span> <span class="function">max</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_seed</span> <span class="operator">=</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">roll_server_seed</span><span class="punctuation">,</span> <span class="variable">roll_public_seed</span><span class="punctuation">,</span> <span class="variable">roll_nonce</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_salt</span> <span class="operator">=</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">generated_seed</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">generated_roll</span> <span class="operator">=</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">generated_salt</span><span class="punctuation">,</span> <span class="number">15</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="variable">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span><span class="string">'Roll: '</span> <span class="operator">+</span> <span class="variable">generated_roll</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
						</code>
						
						<div class="table-container">
							<div class="table-header">
								<div class="table-row">
									<div class="table-column text-left">Date</div>
									<div class="table-column text-left">Server Seed</div>
									<div class="table-column text-left">Public Seed</div>
									<div class="table-column text-center">Games</div>
								</div>
							</div>
							
							<div class="table-body">
								<?php if(sizeof($response['fair']['roulette']) > 0){?>
								<?php foreach($response['fair']['roulette'] as $key => $value){ ?>
								<div class="table-row">
									<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
									<div class="table-column text-left pointer <?php if($value['using']){ ?>text-danger<?php } ?>" data-copy="text" data-text="<?php echo $value['server_seed']; ?>"><?php if($value['using']){ ?>(hashed) <?php } ?><?php echo $value['server_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['public_seed']; ?>"><?php echo $value['public_seed']; ?></div>
									<div class="table-column text-center pointer fair-roulette-games" data-games='<?php echo json_encode($value['games']); ?>'><div class="flex justify-center items-center"><div class="b-m1 p-2 rounded-0"><?php echo $value['games'][0]['nonce']; ?> - <?php echo $value['games'][sizeof($value['games']) - 1]['nonce']; ?></div></div></div>
								</div>
								<?php } ?>
								<?php } else { ?>
								<div class="table-row">
									<div class="table-column text-center">No data found</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="fair-category transition-2">
				<div class="title font-8 pt-4 pb-4 pr-4 pl-4 pointer">Crash Game</div>
				
				<div class="description transition-2 overflow-h pr-4 pl-4">
					<div class="flex column gap-2 pb-4">
						<div>Each section of the roll is assigned a number - greater than or equal to 1.00 to land on. The resulting number from each crash is determined by a combination of three individual elements, which are fed into an algorithm:</div>
						<div>Client seed is SHA-256 hash generated daily from random 32 bytes. We show it to you the moment it's generated.</div>
						<div>Server seed is SHA-256 hash generated daily from random 32 bytes. We show you the encrypted version while it's in use.</div>
						<div>The nonce is based on numbers that is the round id. The first round ever played would have an nonce of 1. This number increases by 1 for each new round. The nonce's job in generating outcomes is to ensure that, even when the same public seed and server seed combination are used, the outcome generated in the next game would still be different, since the seed combination is paired with a unique nonce, the nonce for each game is always different, since the round id would have increased by one for every new game played.</div>
						
						<div>Since each roll, or outcome, is generated using cryptographically-secure randomness, the probability of a particular outcome will never change - even if you play 100,000,000 times. There’s no pattern or method used to determine which number will hit next - it’s sheer randomness.</div>

						<div>Today's server seed is currently in-use, therefore it is a secret and only the encrypted seed (hash) is visible to you. You can not verify today's results until the day is over and the (unhashed) server seed has been revealed.</div>
						
						<code class="language-javascript">
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">crypto</span> <span class="operator">=</span> <span class="function">require</span><span class="punctuation">(</span><span class="string">'crypto'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_server_seed</span> <span class="operator">=</span> <span class="string">'e581f85cab4f8f4ee22afc82b8299c4bd7f132049c9212b32e989b798246ac31'</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_public_seed</span> <span class="operator">=</span> <span class="string">'1b233defb3b6acc3ead30a62ded768e8db9950bb922db728f44dcf9fb464d21e'</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">roll_nonce</span> <span class="operator">=</span> <span class="number">0</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="punctuation">[</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">]</span><span class="punctuation">.</span><span class="function">join</span><span class="punctuation">(</span><span class="string">'-'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">seed</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">crypto</span><span class="punctuation">.</span><span class="function">createHmac</span><span class="punctuation">(</span><span class="string">'sha256'</span><span class="punctuation">,</span> <span class="variable">seed</span><span class="punctuation">)</span><span class="punctuation">.</span><span class="function">digest</span><span class="punctuation">(</span><span class="string">'hex'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getRollCrash</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">)</span><span class="punctuation">{</span></div>
							<div class="line end text-indent-1"><span class="keyword">var</span> <span class="variable">INSTANT_CRASH_PERCENTAGE</span> <span class="operator">=</span> <span class="number">5</span><span class="punctuation">.</span><span class="number">00</span><span class="punctuation">;</span></div>
							<div class="line text-indent-1"><span class="comment">// Use the most significant 52-bit from the salt to calculate the crash point</span></div>
							<div class="line text-indent-1"><span class="keyword">var</span> <span class="variable">h</span> <span class="operator">=</span> <span class="function">parseInt</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">.</span><span class="function">slice</span><span class="punctuation">(</span><span class="number">0</span><span class="punctuation">,</span> <span class="number">52</span> <span class="operator">/</span> <span class="number">4</span><span class="punctuation">)</span><span class="punctuation">,</span> <span class="number">16</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-1"><span class="keyword">var</span> <span class="variable">e</span> <span class="operator">=</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">pow</span><span class="punctuation">(</span><span class="number">2</span><span class="punctuation">,</span> <span class="number">52</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-1"><span class="keyword">var</span> <span class="variable">result</span> <span class="operator">=</span> <span class="punctuation">(</span><span class="number">100</span> <span class="operator">*</span> <span class="variable">e</span> <span class="operator">-</span> <span class="variable">h</span><span class="punctuation">)</span> <span class="operator">/</span> <span class="punctuation">(</span><span class="variable">e</span> <span class="operator">-</span> <span class="variable">h</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-1"><span class="comment">// INSTANT_CRASH_PERCENTAGE of 5.00 will result in modifier of 0.95 = 5.00% house edge with a lowest crashpoint of 1.00x</span></div>
							<div class="line text-indent-1"><span class="keyword">var</span> <span class="variable">houseEdgeModifier</span> <span class="operator">=</span> <span class="number">1</span> <span class="operator">-</span> <span class="variable">INSTANT_CRASH_PERCENTAGE</span> <span class="operator">/</span> <span class="number">100</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-1"><span class="keyword">var</span> <span class="variable">endResult</span> <span class="operator">=</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">max</span><span class="punctuation">(</span><span class="number">100</span><span class="punctuation">,</span> <span class="variable">result</span> <span class="operator">*</span> <span class="variable">houseEdgeModifier</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">floor</span><span class="punctuation">(</span><span class="variable">endResult</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_seed</span> <span class="operator">=</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">roll_server_seed</span><span class="punctuation">,</span> <span class="variable">roll_public_seed</span><span class="punctuation">,</span> <span class="variable">roll_nonce</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_salt</span> <span class="operator">=</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">generated_seed</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">generated_roll</span> <span class="operator">=</span> <span class="punctuation">(</span><span class="function">fair_getRollCrash</span><span class="punctuation">(</span><span class="variable">generated_salt</span><span class="punctuation">)</span> <span class="operator">/</span> <span class="number">100</span><span class="punctuation">)</span><span class="punctuation">.</span><span class="function">toFixed</span><span class="punctuation">(</span><span class="number">2</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="variable">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span><span class="string">'Roll: '</span> <span class="operator">+</span> <span class="variable">generated_roll</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
						</code>
						
						<div class="table-container">
							<div class="table-header">
								<div class="table-row">
									<div class="table-column text-left">Date</div>
									<div class="table-column text-left">Server Seed</div>
									<div class="table-column text-left">Public Seed</div>
									<div class="table-column text-center">Games</div>
								</div>
							</div>
							
							<div class="table-body">
								<?php if(sizeof($response['fair']['crash']) > 0){?>
								<?php foreach($response['fair']['crash'] as $key => $value){ ?>
								<div class="table-row">
									<div class="table-column text-left"><?php echo makeDate($value['time']); ?></div>
									<div class="table-column text-left pointer <?php if($value['using']){ ?>text-danger<?php } ?>" data-copy="text" data-text="<?php echo $value['server_seed']; ?>"><?php if($value['using']){ ?>(hashed) <?php } ?><?php echo $value['server_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['public_seed']; ?>"><?php echo $value['public_seed']; ?></div>
									<div class="table-column text-center pointer fair-crash-games" data-games='<?php echo json_encode($value['games']); ?>'><div class="flex justify-center items-center"><div class="b-m1 p-2 rounded-0"><?php echo $value['games'][0]['nonce']; ?> - <?php echo $value['games'][sizeof($value['games']) - 1]['nonce']; ?></div></div></div>
								</div>
								<?php } ?>
								<?php } else { ?>
								<div class="table-row">
									<div class="table-column text-center">No data found</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="fair-category transition-2">
				<div class="title font-8 pt-4 pb-4 pr-4 pl-4 pointer">Jackpot Game</div>
				
				<div class="description transition-2 overflow-h pr-4 pl-4">
					<div class="flex column gap-2 pb-4">
						<div>Jackpot uses a provably fair system in which the public seed is not known until after a jackpot game has started. The result for each round is generated using the SHA-256 hash of 3 separate inputs:</div>
						<div>The server seed is a securely random value, generated when a round is created. The SHA-256 hash of the server seed is displayed to all players immediately after a round is created. Players can check that the private seed revealed after the jackpot result is made known matches this SHA-256 hash.</div>
						<div>The public seed is the ID of an <a class="text-color" href="https://eosflare.io/" target="_black">EOS block</a>, which is to be generated after the countdown is finished. When the countdown is finished, our system chooses a block number on the EOS blockchain that will be generated in the near future. The ID of this block is what will be used as the public seed. This way, neither the players nor our system know what data will be used to generate the jackpot result until after both players have committed their bets.</div>
						<div>The nonce is based on numbers that is the round id.</div>
						
						<code class="language-javascript">
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">crypto</span> <span class="operator">=</span> <span class="function">require</span><span class="punctuation">(</span><span class="string">'crypto'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_server_seed</span> <span class="operator">=</span> <span class="string">'cc0fa67554c2e9fc0f6a4a833353080a6f0e7dd2e8a911efb8f6f05c75a93063'</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_client_seed</span> <span class="operator">=</span> <span class="string">'0d3ec17f8e156a06656107778fbb83211d96c8686bcaa6f0a957baf18ca21b5f'</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">roll_nonce</span> <span class="operator">=</span> <span class="number">5</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="punctuation">[</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">]</span><span class="punctuation">.</span><span class="function">join</span><span class="punctuation">(</span><span class="string">'-'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">seed</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">crypto</span><span class="punctuation">.</span><span class="function">createHmac</span><span class="punctuation">(</span><span class="string">'sha256'</span><span class="punctuation">,</span> <span class="variable">seed</span><span class="punctuation">)</span><span class="punctuation">.</span><span class="function">digest</span><span class="punctuation">(</span><span class="string">'hex'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">,</span> <span class="function">max</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">abs</span><span class="punctuation">(</span><span class="function">parseInt</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">.</span><span class="function">substr</span><span class="punctuation">(</span><span class="number">0</span><span class="punctuation">,</span> <span class="number">12</span><span class="punctuation">)</span><span class="punctuation">,</span> <span class="number">16</span><span class="punctuation">)</span><span class="punctuation">)</span> <span class="operator">%</span> <span class="function">max</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_seed</span> <span class="operator">=</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">roll_server_seed</span><span class="punctuation">,</span> <span class="variable">roll_client_seed</span><span class="punctuation">,</span> <span class="variable">roll_nonce</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_salt</span> <span class="operator">=</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">generated_seed</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">generated_roll</span> <span class="operator">=</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">generated_salt</span><span class="punctuation">,</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">pow</span><span class="punctuation">(</span><span class="number">10</span><span class="punctuation">,</span> <span class="number">8</span><span class="punctuation">)</span><span class="punctuation">)</span> <span class="operator">/</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">pow</span><span class="punctuation">(</span><span class="number">10</span><span class="punctuation">,</span> <span class="number">8</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="variable">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span><span class="string">'Roll: '</span> <span class="operator">+</span> <span class="variable">generated_roll</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
						</code>
						
						<div class="table-container">
							<div class="table-header">
								<div class="table-row">
									<div class="table-column text-left">Id</div>
									<div class="table-column text-left">Server Seed</div>
									<div class="table-column text-left">Public Seed</div>
									<div class="table-column text-left">Block id</div>
									<div class="table-column text-left">Roll</div>
									<div class="table-column text-left">Created At</div>
								</div>
							</div>
							
							<div class="table-body">
								<?php if(sizeof($response['fair']['jackpot']) > 0){?>
								<?php foreach($response['fair']['jackpot'] as $key => $value){ ?>
								<div class="table-row <?php if($value['using']){ ?>text-danger<?php } ?>">
									<div class="table-column text-left"><?php echo $value['id']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['server_seed']; ?>"><?php echo $value['server_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['public_seed']; ?>"><?php echo $value['public_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['blockid']; ?>"><?php echo $value['blockid']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['roll']; ?>"><?php echo $value['roll']; ?></div>
									<div class="table-column text-left"><?php echo makeDate($value['time']);?></div>
								</div>
								<?php } ?>
								<?php } else { ?>
								<div class="table-row">
									<div class="table-column text-center">No data found</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="fair-category transition-2">
				<div class="title font-8 pt-4 pb-4 pr-4 pl-4 pointer">Coinflip Game</div>
				
				<div class="description transition-2 overflow-h pr-4 pl-4">
					<div class="flex column gap-2 pb-4">
						<div>Coinflip uses a provably fair system in which the public seed is not known until after a coinflip game has started. The result for each round is generated using the SHA-256 hash of 3 separate inputs:</div>
						<div>The server seed is a securely random value, generated when a round is created. The SHA-256 hash of the server seed is displayed to all players immediately after a round is created. Players can check that the private seed revealed after the coinflip result is made known matches this SHA-256 hash.</div>
						<div>The public seed is the ID of an <a class="text-color" href="https://eosflare.io/" target="_black">EOS block</a>, which is to be generated after the countdown is finished. When the countdown is finished, our system chooses a block number on the EOS blockchain that will be generated in the near future. The ID of this block is what will be used as the public seed. This way, neither the players nor our system know what data will be used to generate the coinflip result until after both players have committed their bets.</div>
						<div>The nonce is based on numbers that is the round id.</div>
						
						<code class="language-javascript">
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">crypto</span> <span class="operator">=</span> <span class="function">require</span><span class="punctuation">(</span><span class="string">'crypto'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_server_seed</span> <span class="operator">=</span> <span class="string">'30dfbd2887ff70583787976bc3105fc992942f91985c7acd96cc5a2ff4de6e45'</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_public_seed</span> <span class="operator">=</span> <span class="string">'0d3a2d2c14fa35d5cec6c3940b05040e62ba57182661174dc48a35e6dab46e7d'</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">roll_nonce</span> <span class="operator">=</span> <span class="number">1</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="punctuation">[</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">]</span><span class="punctuation">.</span><span class="function">join</span><span class="punctuation">(</span><span class="string">'-'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">seed</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">crypto</span><span class="punctuation">.</span><span class="function">createHmac</span><span class="punctuation">(</span><span class="string">'sha256'</span><span class="punctuation">,</span> <span class="variable">seed</span><span class="punctuation">)</span><span class="punctuation">.</span><span class="function">digest</span><span class="punctuation">(</span><span class="string">'hex'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">,</span> <span class="function">max</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">abs</span><span class="punctuation">(</span><span class="function">parseInt</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">.</span><span class="function">substr</span><span class="punctuation">(</span><span class="number">0</span><span class="punctuation">,</span> <span class="number">12</span><span class="punctuation">)</span><span class="punctuation">,</span> <span class="number">16</span><span class="punctuation">)</span><span class="punctuation">)</span> <span class="operator">%</span> <span class="function">max</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_seed</span> <span class="operator">=</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">roll_server_seed</span><span class="punctuation">,</span> <span class="variable">roll_public_seed</span><span class="punctuation">,</span> <span class="variable">roll_nonce</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_salt</span> <span class="operator">=</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">generated_seed</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">generated_roll</span> <span class="operator">=</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">generated_salt</span><span class="punctuation">,</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">pow</span><span class="punctuation">(</span><span class="number">10</span><span class="punctuation">,</span> <span class="number">8</span><span class="punctuation">)</span><span class="punctuation">)</span> <span class="operator">/</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">pow</span><span class="punctuation">(</span><span class="number">10</span><span class="punctuation">,</span> <span class="number">8</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">generated_side</span> <span class="operator">=</span> <span class="punctuation">(</span><span class="variable">generated_roll</span> <span class="operator">&lt;</span> <span class="number">0</span><span class="punctuation">.</span><span class="number">5</span><span class="punctuation">)</span> <span class="punctuation">?</span> <span class="number">1</span> <span class="punctuation">:</span> <span class="number">2</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="variable">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span><span class="string">'Roll: '</span> <span class="operator">+</span> <span class="variable">generated_roll</span> <span class="operator">+</span> <span class="string">' | Side: '</span> <span class="operator">+</span> <span class="variable">generated_side</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
						</code>
						
						<div class="table-container">
							<div class="table-header">
								<div class="table-row">
									<div class="table-column text-left">Id</div>
									<div class="table-column text-left">Server Seed</div>
									<div class="table-column text-left">Public Seed</div>
									<div class="table-column text-left">Block id</div>
									<div class="table-column text-left">Roll</div>
									<div class="table-column text-left">Created At</div>
								</div>
							</div>
							
							<div class="table-body">
								<?php if(sizeof($response['fair']['coinflip']) > 0){?>
								<?php foreach($response['fair']['coinflip'] as $key => $value){ ?>
								<div class="table-row <?php if($value['using']){ ?>text-danger<?php } ?>">
									<div class="table-column text-left"><?php echo $value['id']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['server_seed']; ?>"><?php echo $value['server_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['public_seed']; ?>"><?php echo $value['public_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['blockid']; ?>"><?php echo $value['blockid']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['roll']; ?>"><?php echo $value['roll']; ?></div>
									<div class="table-column text-left"><?php echo makeDate($value['time']);?></div>
								</div>
								<?php } ?>
								<?php } else { ?>
								<div class="table-row">
									<div class="table-column text-center">No data found</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="fair-category transition-2">
				<div class="title font-8 pt-4 pb-4 pr-4 pl-4 pointer">Unbox Game</div>
				
				<div class="description transition-2 overflow-h pr-4 pl-4">
					<div class="flex column gap-2 pb-4">
						<div>In the <a class="text-color" href="<?php echo $site['root']; ?>profile" target="_blank">Provably Fair tab</a>, you can change the client seed and regenerate the server seed.</div>
						<div>Server seed is SHA-256 hash generated from random 32 bytes. You can regenerate server seed in any time. You cannot see the original server seed, yet you will be able to check that it was unmodified later after regenerating the server seed.</div>
						<div>Client seed is generated first time for user, same way like server seed. As the client seed affects every roll result, changing it to any seed of your choice at any time means you can ensure that it's impossible for us to manipulate the result.</div>
						<div>However, the SHA-256 function we use to generate the roll is deterministic, if the client seed is combined with the same server seed, it will generate exactly the same roll result every time. This could be used to abuse the system, so we use something called a 'nonce' which prevents this from being abusable. Each roll done using the same server seed & client seed pair will also be paired with a different nonce, which is simply a number starting at 0 and incremented by 1 for each roll done.</div>
						<div>The nonce is based on numbers that we can't manipulate (they naturally increment by 1 after each roll).</div>
						
						<div>The total tickets is based on sum of tickets from crates.</div>
						
						<div>SHA-256 returns the hash value for the salt hash combination in a hex-encoded form. We then take the first 8 characters from this hash and convert this hex string to a number.</div>
						<div>We apply a modulus of 'total_tickets' to converted number, giving us a number in the range of 0-'total_tickets'. Finally, incrementing by 1 produces a integer number in the range 1-'total_tickets' + 1.</div>
						
						<div>Each roll can be verified using this formula as soon as you have revealed your server seed for the previous rolls. The published unhashed server seeds can be checked by simply applying the SHA-256 function to it, this will produce the previously published hashed version of the server seed, which was made visible to you before any roll using it was ever made. Each user can check the integrity of every roll made using this information.</div>
						
						<code class="language-javascript">
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">crypto</span> <span class="operator">=</span> <span class="function">require</span><span class="punctuation">(</span><span class="string">'crypto'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_server_seed</span> <span class="operator">=</span> <span class="string">'2c3eea4603280f3cadfb0046b248e7b756930b0b6886997ac73f96d478c823f3'</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_client_seed</span> <span class="operator">=</span> <span class="string">'0b3eeb63c10796f00e3faff36207b369'</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">roll_nonce</span> <span class="operator">=</span> <span class="number">12</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">roll_total_tickets</span> <span class="operator">=</span> <span class="number">10000</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="punctuation">[</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">]</span><span class="punctuation">.</span><span class="function">join</span><span class="punctuation">(</span><span class="string">'-'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">seed</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">crypto</span><span class="punctuation">.</span><span class="function">createHmac</span><span class="punctuation">(</span><span class="string">'sha256'</span><span class="punctuation">,</span> <span class="variable">seed</span><span class="punctuation">)</span><span class="punctuation">.</span><span class="function">digest</span><span class="punctuation">(</span><span class="string">'hex'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">,</span> <span class="variable">max</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">abs</span><span class="punctuation">(</span><span class="function">parseInt</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">.</span><span class="function">substr</span><span class="punctuation">(</span><span class="number">0</span><span class="punctuation">,</span> <span class="number">12</span><span class="punctuation">)</span><span class="punctuation">,</span> <span class="number">16</span><span class="punctuation">)</span><span class="punctuation">)</span> <span class="operator">%</span> <span class="variable">max</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_seed</span> <span class="operator">=</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">roll_server_seed</span><span class="punctuation">,</span> <span class="variable">roll_client_seed</span><span class="punctuation">,</span> <span class="variable">roll_nonce</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_salt</span> <span class="operator">=</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">generated_seed</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">generated_roll</span> <span class="operator">=</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">generated_salt</span><span class="punctuation">,</span> <span class="variable">roll_total_tickets</span><span class="punctuation">)</span> <span class="operator">+</span> <span class="number">1</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="variable">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span><span class="string">'Roll: '</span> <span class="operator">+</span> <span class="variable">generated_roll</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
						</code>
						
						<div class="table-container">
							<div class="table-header">
								<div class="table-row">
									<div class="table-column text-left">Id</div>
									<div class="table-column text-left">Server Seed</div>
									<div class="table-column text-left">Client Seed</div>
									<div class="table-column text-left">Nonce</div>
									<div class="table-column text-left">Tickets</div>
									<div class="table-column text-left">Roll</div>
								</div>
							</div>
							
							<div class="table-body">
								<?php if(sizeof($response['fair']['histories']['unbox']) > 0){?>
								<?php foreach($response['fair']['histories']['unbox'] as $key => $value){ ?>
								<div class="table-row">
									<div class="table-column text-left"><?php echo $value['id']; ?></div>
									<div class="table-column text-left pointer <?php if($value['using']){ ?>text-danger<?php } ?>" data-copy="text" data-text="<?php echo $value['server_seed']; ?>"><?php if($value['using']){ ?>(hashed) <?php } ?><?php echo $value['server_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['client_seed']; ?>"><?php echo $value['client_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['nonce']; ?>"><?php echo $value['nonce']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['tickets']; ?>"><?php echo $value['tickets']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['roll']; ?>"><?php echo $value['roll']; ?></div>
								</div>
								<?php } ?>
								<?php } else { ?>
								<div class="table-row">
									<div class="table-column text-center">No data found</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="fair-category transition-2">
				<div class="title font-8 pt-4 pb-4 pr-4 pl-4 pointer">Tower Game</div>
				
				<div class="description transition-2 overflow-h pr-4 pl-4">
					<div class="flex column gap-2 pb-4">
						<div>In the <a class="text-color" href="<?php echo $site['root']; ?>profile" target="_blank">Provably Fair tab</a>, you can change the client seed and regenerate the server seed.</div>
						<div>Server seed is SHA-256 hash generated from random 32 bytes. You can regenerate server seed in any time. You cannot see the original server seed, yet you will be able to check that it was unmodified later after regenerating the server seed.</div>
						<div>Client seed is generated first time for user, same way like server seed. As the client seed affects every roll result, changing it to any seed of your choice at any time means you can ensure that it's impossible for us to manipulate the result.</div>
						<div>However, the SHA-256 function we use to generate the roll is deterministic, if the client seed is combined with the same server seed, it will generate exactly the same roll result every time. This could be used to abuse the system, so we use something called a 'nonce' which prevents this from being abusable. Each roll done using the same server seed & client seed pair will also be paired with a different nonce, which is simply a number starting at 0 and incremented by 1 for each roll done.</div>
						<div>The nonce is based on numbers that we can't manipulate (they naturally increment by 1 after each roll).</div>
						
						<div>SHA-256 returns the hash value for the salt hash combination in a hex-encoded form. We then take the first 8 characters from this hash and convert this hex string to a number.</div>
						<div>A tower game is generated with 10 separate salts. Each salt is generated by using the index of stage from board and the main salt who is generated using the server seed, client seed and the nonce. We apply for each output a modulus of 3 to this number, giving us a number in the range of 0-2, which represent the index of tile for a wrong move. The location of the tile is plotted using a grid position from bottom to top, left to right.</div>

						<div>Each roll can be verified using this formula as soon as you have revealed your server seed for the previous rolls. The published unhashed server seeds can be checked by simply applying the SHA-256 function to it, this will produce the previously published hashed version of the server seed, which was made visible to you before any roll using it was ever made. Each user can check the integrity of every roll made using this information.</div>
						
						<code class="language-javascript">
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">crypto</span> <span class="operator">=</span> <span class="function">require</span><span class="punctuation">(</span><span class="string">'crypto'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_server_seed</span> <span class="operator">=</span> <span class="string">'2c3eea4603280f3cadfb0046b248e7b756930b0b6886997ac73f96d478c823f3'</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">roll_client_seed</span> <span class="operator">=</span> <span class="string">'0b3eeb63c10796f00e3faff36207b369'</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">roll_nonce</span> <span class="operator">=</span> <span class="number">45</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="punctuation">[</span><span class="variable">server_seed</span><span class="punctuation">,</span> <span class="variable">public_seed</span><span class="punctuation">,</span> <span class="variable">nonce</span><span class="punctuation">]</span><span class="punctuation">.</span><span class="function">join</span><span class="punctuation">(</span><span class="string">'-'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">seed</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">crypto</span><span class="punctuation">.</span><span class="function">createHmac</span><span class="punctuation">(</span><span class="string">'sha256'</span><span class="punctuation">,</span> <span class="variable">seed</span><span class="punctuation">)</span><span class="punctuation">.</span><span class="function">digest</span><span class="punctuation">(</span><span class="string">'hex'</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">,</span> <span class="variable">max</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">Math</span><span class="punctuation">.</span><span class="function">abs</span><span class="punctuation">(</span><span class="function">parseInt</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">.</span><span class="function">substr</span><span class="punctuation">(</span><span class="number">0</span><span class="punctuation">,</span> <span class="number">12</span><span class="punctuation">)</span><span class="punctuation">,</span> <span class="number">16</span><span class="punctuation">)</span><span class="punctuation">)</span> <span class="operator">%</span> <span class="variable">max</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">function</span> <span class="function">fair_getRollTower</span><span class="punctuation">(</span><span class="variable">salt</span><span class="punctuation">)</span> <span class="punctuation">{</span></div>
							<div class="line  endtext-indent-1"><span class="keyword">var</span> <span class="variable">array</span> <span class="operator">=</span> <span class="punctuation">[</span><span class="punctuation">]</span><span class="punctuation">;</span></div>
							<div class="line text-indent-1"><span class="comment">//Get tower roll by stage</span></div>
							<div class="line text-indent-1"><span class="function">for</span><span class="punctuation">(</span><span class="keyword">var</span> <span class="variable">i</span> <span class="operator">=</span> <span class="number">0</span><span class="punctuation">;</span> <span class="variable">i</span> <span class="operator">&lt;</span> <span class="number">10</span><span class="punctuation">;</span> <span class="variable">i</span><span class="operator">++</span><span class="punctuation">)</span><span class="punctuation">{</span></div>
							<div class="line end text-indent-2"><span class="keyword">var</span> <span class="variable">salt_possition</span> <span class="operator">=</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">salt</span> <span class="operator">+</span> <span class="string">'-'</span> <span class="operator">+</span> <span class="variable">i</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-2"><span class="keyword">var</span> <span class="variable">roll</span> <span class="operator">=</span> <span class="function">fair_getRoll</span><span class="punctuation">(</span><span class="variable">salt_possition</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-2"><span class="variable">array</span><span class="punctuation">.</span><span class="function">push</span><span class="punctuation">(</span><span class="variable">roll</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-1"><span class="punctuation">}</span></div>
							<div class="line text-indent-1"><span class="keyword">return</span> <span class="variable">array</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="punctuation">}</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_seed</span> <span class="operator">=</span> <span class="function">fair_getCombinedSeed</span><span class="punctuation">(</span><span class="variable">roll_server_seed</span><span class="punctuation">,</span> <span class="variable">roll_client_seed</span><span class="punctuation">,</span> <span class="variable">roll_nonce</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_salt</span> <span class="operator">=</span> <span class="function">fair_generateSaltHash</span><span class="punctuation">(</span><span class="variable">generated_seed</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="keyword">var</span> <span class="variable">generated_array</span> <span class="operator">=</span> <span class="function">fair_getRollTower</span><span class="punctuation">(</span><span class="variable">generated_salt</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line end text-indent-0"><span class="keyword">var</span> <span class="variable">generated_roll</span> <span class="operator">=</span> <span class="variable">generated_array</span><span class="punctuation">.</span><span class="function">join</span><span class="punctuation">(</span><span class="string">''</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
							<div class="line text-indent-0"><span class="variable">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span><span class="string">'Roll: '</span> <span class="operator">+</span> <span class="variable">generated_roll</span><span class="punctuation">)</span><span class="punctuation">;</span></div>
						</code>
						
						<div class="table-container">
							<div class="table-header">
								<div class="table-row">
									<div class="table-column text-left">Id</div>
									<div class="table-column text-left">Server Seed</div>
									<div class="table-column text-left">Client Seed</div>
									<div class="table-column text-left">Nonce</div>
									<div class="table-column text-left">Roll</div>
								</div>
							</div>
							
							<div class="table-body">
								<?php if(sizeof($response['fair']['histories']['tower']) > 0){?>
								<?php foreach($response['fair']['histories']['tower'] as $key => $value){ ?>
								<div class="table-row">
									<div class="table-column text-left"><?php echo $value['id']; ?></div>
									<div class="table-column text-left pointer <?php if($value['using']){ ?>text-danger<?php } ?>" data-copy="text" data-text="<?php echo $value['server_seed']; ?>"><?php if($value['using']){ ?>(hashed) <?php } ?><?php echo $value['server_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['client_seed']; ?>"><?php echo $value['client_seed']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['nonce']; ?>"><?php echo $value['nonce']; ?></div>
									<div class="table-column text-left pointer" data-copy="text" data-text="<?php echo $value['roll']; ?>"><?php echo $value['roll']; ?></div>
								</div>
								<?php } ?>
								<?php } else { ?>
								<div class="table-row">
									<div class="table-column text-center">No data found</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>