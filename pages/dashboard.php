<div class="p-2">
	<div class="grid split-column-full responsive gap-1 mb-2">
		<button class="site-button black dashboard-load switch_panel active" data-id="dashboard" data-panel="summary">Summary</button>
		<button class="site-button black dashboard-load switch_panel" data-id="dashboard" data-panel="games">Games</button>
		<button class="site-button black dashboard-load switch_panel" data-id="dashboard" data-panel="offers">Offers</button>
	</div>
	
	<div class="switch_content dashboard-content" data-id="dashboard" data-panel="summary">
		<div class="flex column gap-2 width-full mb-2">
			<div class="dashboard-stats-grid">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="users_registed">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Users Registered</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="users_initialized">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>%</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Users Initialized</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="users_verified">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>%</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Users Verified</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="users_online">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Users Online</div>
				</div>
			</div>
			
			<div class="dashboard-stats-grid">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="tickets_count">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Tickets Count</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="tickets_opened">
					<div class="flex items-center height-full font-12"><span class="stats">0</span>%</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Tickets Opened</div>
				</div>
			</div>
		</div>
		
		<div class="grid responsive split-column-3 gap-2">
			<div class="dashboard-chart flex column items-start gap-2" data-graph="unique_visitors">
				<div class="text-color font-8">Unique Visitors</div>
				<div class="width-full relative">
					<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
						<div class="loader">
							<div class="loader-part loader-part-1">
								<div class="loader-dot loader-dot-1"></div>
								<div class="loader-dot loader-dot-2"></div>
							</div>
							
							<div class="loader-part loader-part-2">
								<div class="loader-dot loader-dot-1"></div>
								<div class="loader-dot loader-dot-2"></div>
							</div>
						</div>
					</div>
				
					<div class="width-full">
						<canvas id="dashboard_chart_unique_visitors"></canvas>
					</div>
				</div>
				
				<div class="dashboard-select grid split-column-full width-full responsive gap-1">
					<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_unique_visitors" data-panel="day">This Day</button>
					<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_unique_visitors" data-panel="week">This Week</button>
					<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_unique_visitors" data-panel="month">This Month</button>
					<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_unique_visitors" data-panel="year">This Year</button>
				</div>
			</div>
			
			<div class="dashboard-chart flex column items-start gap-2" data-graph="all_visitors">
				<div class="text-color font-8">All Visitors</div>
				<div class="width-full relative">
					<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
						<div class="loader">
							<div class="loader-part loader-part-1">
								<div class="loader-dot loader-dot-1"></div>
								<div class="loader-dot loader-dot-2"></div>
							</div>
							
							<div class="loader-part loader-part-2">
								<div class="loader-dot loader-dot-1"></div>
								<div class="loader-dot loader-dot-2"></div>
							</div>
						</div>
					</div>
				
					<div class="width-full">
						<canvas id="dashboard_chart_all_visitors"></canvas>
					</div>
				</div>
				
				<div class="dashboard-select grid split-column-full width-full responsive gap-1">
					<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_all_visitors" data-panel="day">This Day</button>
					<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_all_visitors" data-panel="week">This Week</button>
					<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_all_visitors" data-panel="month">This Month</button>
					<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_all_visitors" data-panel="year">This Year</button>
				</div>
			</div>
			
			<div class="dashboard-chart flex column items-start gap-2" data-graph="users">
				<div class="text-color font-8">Users Joins</div>
				<div class="width-full relative">
					<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
						<div class="loader">
							<div class="loader-part loader-part-1">
								<div class="loader-dot loader-dot-1"></div>
								<div class="loader-dot loader-dot-2"></div>
							</div>
							
							<div class="loader-part loader-part-2">
								<div class="loader-dot loader-dot-1"></div>
								<div class="loader-dot loader-dot-2"></div>
							</div>
						</div>
					</div>
				
					<div class="width-full">
						<canvas id="dashboard_chart_users"></canvas>
					</div>
				</div>
				
				<div class="dashboard-select grid split-column-full width-full responsive gap-1">
					<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_users" data-panel="day">This Day</button>
					<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_users" data-panel="week">This Week</button>
					<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_users" data-panel="month">This Month</button>
					<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_users" data-panel="year">This Year</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="switch_content hidden" data-id="dashboard" data-panel="games">
		<div class="grid split-column-full responsive gap-1 mb-2">
			<button class="site-button black switch_panel dashboard-load active" data-id="games_dashboard" data-panel="summary">Summary</button>
			<button class="site-button black switch_panel dashboard-load" data-id="games_dashboard" data-panel="roulette">Roulette</button>
			<button class="site-button black switch_panel dashboard-load" data-id="games_dashboard" data-panel="crash">Crash</button>
			<button class="site-button black switch_panel dashboard-load" data-id="games_dashboard" data-panel="jackpot">Jackpot</button>
			<button class="site-button black switch_panel dashboard-load" data-id="games_dashboard" data-panel="coinflip">Coinflip</button>
			<button class="site-button black switch_panel dashboard-load" data-id="games_dashboard" data-panel="unbox">Unbox</button>
			<button class="site-button black switch_panel dashboard-load" data-id="games_dashboard" data-panel="tower">Tower</button>
		</div>
		
		<div class="switch_content dashboard-content" data-id="games_dashboard" data-panel="summary">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="count_games">
					<div class="text-color font-8">Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_count_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_count_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_count_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_count_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_count_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="total_profit">
					<div class="text-color font-8">Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_total_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_total_profit" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_total_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_total_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_total_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="games_dashboard" data-panel="roulette">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="roulette_total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="roulette_total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="roulette_total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="roulette_count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="roulette_games">
					<div class="text-color font-8">Roulette Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_roulette_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_roulette_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_roulette_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_roulette_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_roulette_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="roulette_profit">
					<div class="text-color font-8">Roulette Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_roulette_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_roulette_profit" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_roulette_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_roulette_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_roulette_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="games_dashboard" data-panel="crash">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="crash_total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="crash_total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="crash_total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="crash_count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="crash_games">
					<div class="text-color font-8">Crash Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_crash_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_crash_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_crash_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_crash_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_crash_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="crash_profit">
					<div class="text-color font-8">Crash Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_crash_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_crash_profit" data-panel="_day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_crash_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_crash_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_crash_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="games_dashboard" data-panel="jackpot">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="jackpot_total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="jackpot_total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="jackpot_total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="jackpot_count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="jackpot_games">
					<div class="text-color font-8">Jackpot Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_jackpot_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_jackpot_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_jackpot_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_jackpot_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_jackpot_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="jackpot_profit">
					<div class="text-color font-8">Jackpot Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_jackpot_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_jackpot_profit" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_jackpot_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_jackpot_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_jackpot_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="games_dashboard" data-panel="coinflip">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="coinflip_total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="coinflip_total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="coinflip_total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="coinflip_count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="coinflip_games">
					<div class="text-color font-8">Coinflip Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_coinflip_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_coinflip_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_coinflip_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_coinflip_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_coinflip_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="coinflip_profit">
					<div class="text-color font-8">Coinflip Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_coinflip_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_coinflip_profit" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_coinflip_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_coinflip_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_coinflip_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="games_dashboard" data-panel="dice">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="dice_total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="dice_total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="dice_total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="dice_count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="dice_games">
					<div class="text-color font-8">Dice Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_dice_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_dice_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_dice_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_dice_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_dice_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="dice_profit">
					<div class="text-color font-8">Dice Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_dice_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_dice_profit" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_dice_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_dice_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_dice_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="games_dashboard" data-panel="unbox">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="unbox_total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="unbox_total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="unbox_total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="unbox_count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="unbox_games">
					<div class="text-color font-8">Unbox Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_unbox_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_unbox_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_unbox_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_unbox_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_unbox_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="unbox_profit">
					<div class="text-color font-8">Unbox Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_unbox_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_unbox_profit" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_unbox_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_unbox_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_unbox_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="games_dashboard" data-panel="minesweeper">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="minesweeper_total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="minesweeper_total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="minesweeper_total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="minesweeper_count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="minesweeper_games">
					<div class="text-color font-8">Minesweeper Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_minesweeper_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_minesweeper_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_minesweeper_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_minesweeper_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_minesweeper_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="minesweeper_profit">
					<div class="text-color font-8">Minesweeper Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_minesweeper_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_minesweeper_profit" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_minesweeper_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_minesweeper_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_minesweeper_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="games_dashboard" data-panel="tower">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="tower_total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="tower_total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="tower_total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="tower_count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="tower_games">
					<div class="text-color font-8">Tower Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_tower_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_tower_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_tower_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_tower_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_tower_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="tower_profit">
					<div class="text-color font-8">Tower Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_tower_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_tower_profit" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_tower_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_tower_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_tower_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="games_dashboard" data-panel="plinko">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="plinko_total_bets">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Bets</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="plinko_total_winnings">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Winnings</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="plinko_total_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>DLS</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Profit</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="plinko_count_games">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Games</div>
				</div>
			</div>
			
			<div class="grid responsive split-column-2 gap-2">
				<div class="dashboard-chart flex column items-start gap-2" data-graph="plinko_games">
					<div class="text-color font-8">Plinko Games</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_plinko_games"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_plinko_games" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_plinko_games" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_plinko_games" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_plinko_games" data-panel="year">This Year</button>
					</div>
				</div>
				
				<div class="dashboard-chart flex column items-start gap-2" data-graph="plinko_profit">
					<div class="text-color font-8">Plinko Profit</div>
					<div class="width-full relative">
						<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
							<div class="loader">
								<div class="loader-part loader-part-1">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
								
								<div class="loader-part loader-part-2">
									<div class="loader-dot loader-dot-1"></div>
									<div class="loader-dot loader-dot-2"></div>
								</div>
							</div>
						</div>
					
						<div class="width-full">
							<canvas id="dashboard_chart_plinko_profit"></canvas>
						</div>
					</div>
					
					<div class="dashboard-select grid split-column-full width-full responsive gap-1">
						<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_plinko_profit" data-panel="day">This Day</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_plinko_profit" data-panel="week">This Week</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_plinko_profit" data-panel="month">This Month</button>
						<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_plinko_profit" data-panel="year">This Year</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="switch_content hidden" data-id="dashboard" data-panel="offers">
		<div class="grid split-column-full responsive gap-1 mb-2">
			<button class="site-button black switch_panel dashboard-load active" data-id="offers_dashboard" data-panel="summary">Summary</button>
			<button class="site-button black switch_panel dashboard-load" data-id="offers_dashboard" data-panel="deposit">Deposit</button>
			<button class="site-button black switch_panel dashboard-load" data-id="offers_dashboard" data-panel="withdraw">Withdraw</button>
			<button class="site-button black switch_panel dashboard-load" data-id="offers_dashboard" data-panel="p2p">P2P</button>
		</div>
		
		<div class="switch_content dashboard-content" data-id="offers_dashboard" data-panel="summary">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="total_deposits">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>$</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Deposits</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="count_deposits">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Count Deposits</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="total_withdrawls">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>$</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Total Withdrawals</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="count_withdrawls">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Count Withdrawals</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="offers_profit">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>$</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Profit</div>
				</div>
			</div>
			
			<div class="flex column gap-2">
				<div class="grid responsive split-column-2 gap-2">
					<div class="dashboard-chart flex column items-start gap-2" data-graph="deposit_count">
						<div class="text-color font-8">Deposit Count</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_deposit_count"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_deposit_count" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_deposit_count" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_deposit_count" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_deposit_count" data-panel="year">This Year</button>
						</div>
					</div>
					
					<div class="dashboard-chart flex column items-start gap-2" data-graph="deposit_total">
						<div class="text-color font-8">Deposit Total</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_deposit_total"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_deposit_total" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_deposit_total" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_deposit_total" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_deposit_total" data-panel="year">This Year</button>
						</div>
					</div>
				</div>
				
				<div class="grid responsive split-column-2 gap-2">
					<div class="dashboard-chart flex column items-start gap-2" data-graph="withdraw_count">
						<div class="text-color font-8">Withdraw Count</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_withdraw_count"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_withdraw_count" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_withdraw_count" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_withdraw_count" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_withdraw_count" data-panel="year">This Year</button>
						</div>
					</div>
					
					<div class="dashboard-chart flex column items-start gap-2" data-graph="withdraw_total">
						<div class="text-color font-8">Withdraw Total</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_withdraw_total"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_withdraw_total" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_withdraw_total" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_withdraw_total" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_withdraw_total" data-panel="year">This Year</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="offers_dashboard" data-panel="deposit">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="steam_total_deposits">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>$</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Steam Total Deposits</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="steam_count_deposits">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Steam Count Deposits</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="crypto_total_deposits">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>$</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Crypto Total Deposits</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="crypto_count_deposits">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Crypto Count Deposits</div>
				</div>
			</div>
			
			<div class="flex column gap-2">
				<div class="grid responsive split-column-2 gap-2">
					<div class="dashboard-chart flex column items-start gap-2" data-graph="crypto_deposit_count">
						<div class="text-color font-8">Crypto Deposit Count</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_crypto_deposit_count"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_crypto_deposit_count" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_crypto_deposit_count" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_crypto_deposit_count" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_crypto_deposit_count" data-panel="year">This Year</button>
						</div>
					</div>
					
					<div class="dashboard-chart flex column items-start gap-2" data-graph="crypto_deposit_total">
						<div class="text-color font-8">Crypto Deposit Total</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_crypto_deposit_total"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_crypto_deposit_total" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_crypto_deposit_total" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_crypto_deposit_total" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_crypto_deposit_total" data-panel="year">This Year</button>
						</div>
					</div>
				</div>
				
				<div class="grid responsive split-column-2 gap-2">
					<div class="dashboard-chart flex column items-start gap-2" data-graph="steam_deposit_count">
						<div class="text-color font-8">Steam Deposit Count</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_steam_deposit_count"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_steam_deposit_count" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_steam_deposit_count" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_steam_deposit_count" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_steam_deposit_count" data-panel="year">This Year</button>
						</div>
					</div>
					
					<div class="dashboard-chart flex column items-start gap-2" data-graph="steam_deposit_total">
						<div class="text-color font-8">Steam Deposit Total</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_steam_deposit_total"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_steam_deposit_total" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_steam_deposit_total" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_steam_deposit_total" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_steam_deposit_total" data-panel="year">This Year</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="offers_dashboard" data-panel="withdraw">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="steam_total_withdrawls">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>$</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Steam Total Withdrawls</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="steam_count_withdrawls">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Steam Count Withdrawls</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="crypto_total_withdrawls">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>$</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Crypto Total Withdrawls</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="crypto_count_withdrawls">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">Crypto Count Withdrawls</div>
				</div>
			</div>
			
			<div class="flex column gap-2">
				<div class="grid responsive split-column-2 gap-2">
					<div class="dashboard-chart flex column items-start gap-2" data-graph="crypto_withdraw_count">
						<div class="text-color font-8">Crypto Withdraw Count</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_crypto_withdraw_count"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_crypto_withdraw_count" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_crypto_withdraw_count" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_crypto_withdraw_count" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_crypto_withdraw_count" data-panel="year">This Year</button>
						</div>
					</div>
					
					<div class="dashboard-chart flex column items-start gap-2" data-graph="crypto_withdraw_total">
						<div class="text-color font-8">Crypto Withdraw Total</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_crypto_withdraw_total"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_crypto_withdraw_total" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_crypto_withdraw_total" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_crypto_withdraw_total" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_crypto_withdraw_total" data-panel="year">This Year</button>
						</div>
					</div>
				</div>
				
				<div class="grid responsive split-column-2 gap-2">
					<div class="dashboard-chart flex column items-start gap-2" data-graph="steam_withdraw_count">
						<div class="text-color font-8">Steam Withdraw Count</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_steam_withdraw_count"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_steam_withdraw_count" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_steam_withdraw_count" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_steam_withdraw_count" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_steam_withdraw_count" data-panel="year">This Year</button>
						</div>
					</div>
					
					<div class="dashboard-chart flex column items-start gap-2" data-graph="steam_withdraw_total">
						<div class="text-color font-8">Steam Withdraw Total</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_steam_withdraw_total"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_steam_withdraw_total" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_steam_withdraw_total" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_steam_withdraw_total" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_steam_withdraw_total" data-panel="year">This Year</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="switch_content dashboard-content hidden" data-id="offers_dashboard" data-panel="p2p">
			<div class="dashboard-stats-grid mb-2">
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="p2p_total">
					<div class="flex items-center height-full font-12"><span class="stats">0.00</span>$</div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">P2P Total</div>
				</div>
				
				<div class="dashboard-stats flex column items-center justify-between pl-2 pr-2" data-stats="p2p_count">
					<div class="flex items-center height-full font-12"><span class="stats">0</span></div>
					<div class="pt-2 pb-2 bt-l2 text-color width-full text-space-1">P2P Count</div>
				</div>
			</div>
			
			<div class="flex column gap-2">
				<div class="grid responsive split-column-2 gap-2">
					<div class="dashboard-chart flex column items-start gap-2" data-graph="p2p_count">
						<div class="text-color font-8">P2P Count</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_p2p_count"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_p2p_count" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_p2p_count" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_p2p_count" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_p2p_count" data-panel="year">This Year</button>
						</div>
					</div>
					
					<div class="dashboard-chart flex column items-start gap-2" data-graph="p2p_total">
						<div class="text-color font-8">P2P Total</div>
						<div class="width-full relative">
							<div class="dashboard-loader hidden bg-light-transparent flex justify-center items-center">
								<div class="loader">
									<div class="loader-part loader-part-1">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
									
									<div class="loader-part loader-part-2">
										<div class="loader-dot loader-dot-1"></div>
										<div class="loader-dot loader-dot-2"></div>
									</div>
								</div>
							</div>
						
							<div class="width-full">
								<canvas id="dashboard_chart_p2p_total"></canvas>
							</div>
						</div>
						
						<div class="dashboard-select grid split-column-full width-full responsive gap-1">
							<button class="site-button black dashboard-graph switch_panel active" data-date="day" data-id="chart_p2p_total" data-panel="day">This Day</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="week" data-id="chart_p2p_total" data-panel="week">This Week</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="month" data-id="chart_p2p_total" data-panel="month">This Month</button>
							<button class="site-button black dashboard-graph switch_panel" data-date="year" data-id="chart_p2p_total" data-panel="year">This Year</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>