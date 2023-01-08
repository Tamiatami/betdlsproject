<?php
if (($_GET["wl"] != "" && $_GET["growid"] != "") or ($_POST["wl"] != "" && $_POST["growid"] != "")) {
$deposit = $_GET["deposit"]??null;
if ($deposit == "") $deposit = "(SYSTEM)";
$balance = $_GET["wl"]??null;
$username = $_GET["growid"]??null;
if ($username == "") {
echo "post req";
$balance = $_POST["wl"]??null;
$username = $_POST["growid"]??null;
}
$amount = $balance;
$balance /= 100;
$link = mysqli_connect("localhost", "root", "wasv!NVv9n8N!na", "coins");
if($link === false) die("Connection Error");
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $link->query($sql);
$bgl = floor($amount / 10000);
$dls = floor(($amount - $bgl * 10000) / 100);
$wls = floor($amount - ($bgl * 10000 + $dls * 100));
if ($bgl != 0) $bgla = "$bgl<img width='13' height='13' src='bgl.png'>";
if ($dls != 0) $dla = "$dls<img width='13' height='13' src='dl.png'>";
if ($wls != 0) $wla = "$wls<img width='13' height='13' src='wl.png'>";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
$balance +=$row["balance"];
if ($balance < 0) $balance = 0;
    $link->query("UPDATE `users` SET `balance`='$balance' WHERE username='$username'");
file_put_contents('logs.txt', "<tr><td>$username</td><td>$deposit</td><td>$bgla $dla $wla </td><td>" . date("Y/m/d") . " - " . date("h:i:sa") . "</td></tr>", FILE_APPEND);

  $ch = curl_init();
  $url = "https://betdls.com/diamondLocksIpnUrl.php?secret=bgNyyR&growid=$username&world=Lietuva829($deposit)&amount=$amount";
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  print($response);
  curl_close ($ch);
 die("Depositted! User: $username now has,  " . $balance. " balance!");
  }
}
else die("User not found.");
mysqli_close($link);
}
?>