<?php

$curl = curl_init();
$json = file_get_contents('php://input');
$data = json_decode($json);
$growid = $_GET['growid'];
$storage = $_GET['storage'];
$world = $_GET['world'];
$amount = $_GET['amount'];
$via = $_GET['via'];
curl_setopt_array($curl, [
  CURLOPT_URL => "http://45.138.16.254:8081/queue?growid=$growid&world=$world&storage=$storage&amount=$amount&via=$via",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{\n\"world\":\"1\",\n\"growID\": \"1\",\n\"amount\": \"1\",\n\"via\": \"drop\"\n}",
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json"
  ],
]);


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo json_encode(array('success' => 0));//echo "cURL Error #:" . $err;
} else {
  echo json_encode(array('success' => 1));
  // echo $response;
}
?>

<?php
if ($growid != "") $growid = "\n[GROWID: $growid]";
$webhookurl = "https://discord.com/api/webhooks/1051950789100327004/bDYnpvwW755uo79pmBEnRNPQzhmKeyCmsjMiVFsBmzssjsjdfQq1fpdUHYQnqRATJmSc";
$msg = "
```\n
[WORLD: $world] [AMOUNT: $amount]
$growid```
";
$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode(array ('content'=>"$msg")));
$response = curl_exec( $ch );
if ($_GET['system'] == "1") header("Location: https://betdls.com/admin/trades");
else header("Location: withdraw_test.php");
?>