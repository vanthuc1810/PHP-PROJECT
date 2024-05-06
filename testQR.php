<?php
include 'cloudinary/vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$text = "00020101021138540010A00000072701240006970422011009760493470208QRIBFTTA53037045802VN6304f1b3";
$qr_code = QrCode::create($text);
$writer = new PngWriter();

$result = $writer -> write($qr_code);

header('Content-Type: '. $result->getMimeType());

echo $result -> getString();
?>
 