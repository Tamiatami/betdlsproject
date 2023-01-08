<?php if ($user['rank'] != 0  && $user['rank'] != 5 && $user['rank'] != 4 && $user['rank'] != 100) exit; ?>

<div class="flex column height-full width-full">
	<div class="wrapper-page flex row">
		<div class="flex column height-full width-full p-2">
			<div class="flex justify-start">
				<a href="<?php echo $site['root'];?>withdraw"><button class="site-button black"><i class="fa fa-arrow-left mr-1"></i> Back to Options</button></a>
			</div>
			
			<div class="flex justify-center mt-4 overflow-a">
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Withdraw Diamond Locks</div>
					
					<?php 
						$growid = "";
						if(isset($_GET['growid'])) $growid = test_input($_GET['growid']);
						
						function test_input($data) {
							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							
							return $data;
						}
					?>
					
					<form method="POST" action="<?php echo $site['root']; ?>withdraw/grow/start">
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" name="growid" id="growid" value="<?php echo $growid;?>">
										
										<div class="field_label transition-5">Enter your GrowId</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
								</div>
							</div>
						</div>
						
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" value="">
										
										<div class="field_label transition-5"><div class="input_coins coins mr-1"></div>Amount of DLS</div>
									</div>
									
									<div class="field_extra"></div>
								</div>
								
								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
									<div class="field_error" data-error="number">This field must be a number</div>
									<div class="field_error" data-error="greater">You must enter a greater value</div>
									<div class="field_error" data-error="lesser">You must enter a lesser value</div>
								</div>
							</div>

						<div class="mt-4">
							<button type="submit" name="submit" class="site-button purple">123</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
