<?php
include('phpqrcode/qrlib.php');

$ip = "https://jfab.alwaysdata.net/qrshop/inizio.php?pc=parolachiave";
// generating
QRcode::png($ip, 'qr_inizio.png', QR_ECLEVEL_L, 10,0);


// displaying
echo '<img src="qr_inizio.png" />';


?>
