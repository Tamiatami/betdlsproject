<?php

$curl = curl_init();
$json = file_get_contents('php://input');
$data = json_decode($json);

curl_setopt_array($curl, [
  CURLOPT_URL => "https://trump.betdls.com/5642716037:AAFADyRYKsUOo-RvnU-OejjC4rTDl6fqTHA",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\"world\":\"$data->world\",\n\"growID\": \"$data->growID\",\n\"amount\": \"$data->amount\",\n\"via\": \"$data->via\"\n}",
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