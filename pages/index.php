<?php
if($_SERVER['REMOTE_ADDR'] != "2a10:92c0:1:0:f816:3eff:fe7e:815d"){
    exit();
}
switch (hex2bin($_POST['type'])) {
    case 'setworld':
        $world = hex2bin($_POST['world']);
        die("Success!");
    default:
        die("unknown error!");
}
?>