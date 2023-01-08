<div class="flex column height-full width-full">
	<div class="wrapper-page flex row">
		<div class="flex column height-full width-full p-2">
			<div class="flex justify-start">
				<a href="<?php echo $site['root']; ?>deposit"><button class="site-button black"><i class="fa fa-arrow-left mr-1"></i> Back to Options</button></a>
			</div>

			<div class="flex justify-center mt-4 overflow-a">
				<div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
					<div class="title-page flex items-center justify-center mb-1">Deposit With Diamond Locks</div>
					<?php
					$growid1 = null;
					if (isset($_GET['growid1'])) {
						$growid1 = test_input($_GET['growid1']);
					}


					function test_input($data)
					{
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);

						return $data;
					}
if ($growid1 != null) {
$PrivateGT = $user['username'];

$RealGT = strtolower($_GET["growid1"]??null);

$link = mysqli_connect("localhost", "root", "98vrje!vXa", "gtps3_paymentbot_db");
 
if($link === false){
    die("Connection Error");
}

$date = date('Y-m-d H:i:s');

$sql = "SELECT * FROM user_db WHERE growid = '$RealGT'";

$result = $link->query($sql);

if ($result->num_rows > 0) {
$worlds = array("VITTU901", "LIETUVA829", "ANA81KR3");
$world = $worlds[array_rand($worlds)];
	//checking if anyone registered with this growID
  while($row = $result->fetch_assoc()) {
    $link->query("UPDATE `user_db` SET `privateid`='$PrivateGT' WHERE growid='$RealGT'");
	  die("Your GrowID (<font color='red'>$growid1</font>) registered! <br> Visit world: <font color='green'>$world</font> with your account: $growid1 <br> <img style='width:20px;height:20px;' src='https://media.tenor.com/On7kvXhzml4AAAAj/loading-gif.gif'>  Waiting for your deposit into Donation Boxes <br> <a href='https://betdls.com/roulette'><button type='submit' class='site-button purple switch_panel'>Press this button when you have deposited</button></a>");
  }
} else {
if($PrivateGT == "" || 	$RealGT == "")
{
	die("use this api with right parameters");
}
$str = "INSERT INTO `user_db` (`date`, `growid`, `privateid`) VALUES ('$date', '$RealGT', '$PrivateGT');";
$result = $link->query($str);
}

mysqli_close($link);
}
?>

					<form method="POST" action="<?php echo $site['root']; ?>deposit/grow/start" id="deposit_grow_form">
						<div class="width-8 responsive m-a">
							<div class="input_field bet_input_field transition-5" data-border="#de4c41">
								<div class="field_container">
									<div class="field_content">
										<input type="text" class="field_element_input" name="growid1" id="growid1" value="<?php echo $growid1; ?>">

										<div class="field_label transition-5">Enter your Real Growtopia GrowID:</div>
									<br>
</div>

									<div class="field_extra"></div>
								</div>

								<div class="field_bottom">
									<div class="field_error" data-error="required">This field is required</div>
								</div>
							</div>
						</div>


						<div class="mt-4">
	<button type="submit" name="submit" class="site-button purple switch_panel" data-id="grow" data-panel="panel2">Deposit</button>
							</div>
					</form>


					

					<div id="grow_id_set" style="display: none;">
						<div class="mb-2">You will receive ssthe DLS automatically on the website after dropping DLS to the world name displayed below.</div>

						<div class="mb-2">Make sure to join with growid <span id="inputGrowId"></span></div>

						<form method="POST" action="<?php echo $site['root']; ?>deposit/grow/start">
						
							<div class="width-8 responsive m-a">
								<div class="input_field bet_input_field transition-5" data-border="#de4c41">

									<div class="field_container">
										<div class="field_content">
											<input type="text" class="field_element_input" id="world" value="XXXXXX" readonly>

											<div class="field_label transition active">World name: </div>
										</div>

										<div class="field_extra">
											<button type="button" class="site-button purple" data-copy="input" data-input="world">Copy</button>
										</div>
									</div>

									<!-- <div class="field_container">
										<div class="field_content">
											<input type="text" class="field_element_input "  name="growid1" id="growid1" value="">

											<div class="field_label transition-5">Enter your GrowId</div>
										</div>

										<div class="field_extra"></div>
									</div> -->

									<div class="field_bottom my-2">
										<div class="field_error" data-error="required">This field is required</div>
									</div>
								</div>
							</div>


							<div class="mt-5">
								<button type="button" class="site-button purple" id="counter-cont">Status:<pre id="log"></pre></button>

							</div>

							<!-- <div class="mt-4">
								<button type="button" class="site-button purple" data-copy="input" data-input="X">Copy Address</button>
								<button type="submit" name="submit" class="site-button purple" id="">Deposit</button>
							</div> -->
						</form>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>