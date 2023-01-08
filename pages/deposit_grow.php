<div class="flex column height-full width-full">
	<div class="wrapper-page flex row">
		<div class="flex column height-full width-full p-2">
			<div class="flex justify-start">
				<a href="<?php echo $site['root']; ?>deposit"><button class="site-button black"><i class="fa fa-arrow-left mr-1"></i> Back to Options</button></a>
			</div>

			<div class="flex justify-center mt-4 overflow-a">
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive">
					<div class="title-page flex items-center justify-center mb-1">Deposit With Diamond Locks</div>
					
					<div class="<?php if($growid) echo "hidden"; ?>">
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" value="" id="dls_growid">
										
										<div class="field_label">Real Growtopia GrowID</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
								</div>
							</div>
						</div>
						<button class="site-button purple mt-2" id="save_dls_growid">Save GrowID</button>
					</div>
					<div class="<?php if(!$growid) echo "hidden"; ?>">
						<div>Your GrowID <span class="text-danger text-bold"><?php echo $growid; ?></span> registered! Change your GrowId <a class="text-color" href="<?php echo $site['root']; ?>profile" target="_blank">here</a></div>
						
						<div id="dls_panel_1">
							<button class="site-button purple mt-2" id="start_dls_deposit">Start Deposit</button>
						</div>
						
						<div class="flex column items-center gap-1 hidden" id="dls_panel_2">
							<div>Visit world: 
<span class="text-success">
<?php
	$level = $user['xp'];
  $ch = curl_init();
  $url = "http://betdls5215215.us.lt/botageawga2/bot21r1.php";
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST, 1);//post request boolean
  curl_setopt($ch,CURLOPT_POSTFIELDS,"&system=1&level=$level");
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  $response = curl_exec($ch);
  print($response);
  curl_close ($ch);
?></span> with your account</div>
							<a class="text-color"> Make sure to only put while bot is in the world!</a>
							<div><img class="icon-micro" src="https://media.tenor.com/On7kvXhzml4AAAAj/loading-gif.gif"> Waiting for your deposit into Donation Boxes</div>
							<div><a href="https://betdls.com/roulette">Deposited? Click here</a>
							
							<div class="bg-dark rounded-1 font-10 text-bold b-l2 pl-4 pr-4 pt-2 pb-2 ddl_time">00:00</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>