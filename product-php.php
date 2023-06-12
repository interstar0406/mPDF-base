<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'format' => 'A4']);
$sku = 'AADC2134';

// START html
$mpdf->WriteHTML('<html><head>');
$mpdf->WriteHTML('<style>
body {
    font-family: sans-serif;
	font-size: 7pt;
}
.barcode {
	padding: 1.5mm;
	margin: 0;
	vertical-align: top;
	color: #000000;
}
td{
    border: 1pt solid #ef3598;
    overflow: hidden;
}
</style>');
$mpdf->WriteHTML('</head>');
$mpdf->WriteHTML('<body>');
$mpdf->writeBarcode($sku,0.2,0.1,1,0.6,0,1,1,1,1,1,false,false,'C128A');
$mpdf->WriteText(3.5,9, $sku);

//Content Layout 1

// PDF properties 8.26 × 11.69 in (portrait) ~ 210 × 297 mm
$widthPDF = 210; // mm
$heightPDF = 297; // mm

// Layout 1 have 8 box/side, 4 row, 2 column
// box ratio 18:24 ~ 3:4
$gap = 2; // mm
$distanceTopBottom = 2; // mm
$widthBox = 50.25; // mm
$heightBox = 67; // (297 - (gap * 3)) / 2 ~ 400
// $xBox = $widthPDF / 2 - $widthBox - $gap/2; // mm
// $yBox = $heightPDF / 2 - $heightBox - $gap/2; // mm

$mpdf->WriteHTML('<table style="margin: '.$distanceTopBottom.'mm auto"><tbody>');
    $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td width="'.$widthBox.'mm" height="'.$heightBox.'mm">');
        $mpdf->WriteHTML('<img src="img/Capture.png" width="'.$widthBox.'mm" height="'.$heightBox.'mm" />');
        $mpdf->WriteHTML('</td>');
        $mpdf->WriteHTML('<td width="'.$widthBox.'mm" height="'.$heightBox.'mm">');
        $mpdf->WriteHTML('<div style="overflow: hidden" width="'.$widthBox.'mm" height="'.$heightBox.'mm">');
        $mpdf->WriteHTML('<img style="transform: rotate(90deg)" src="img/Capture.png" width="'.$widthBox.'mm" height="'.$heightBox.'mm" />');
        $mpdf->WriteHTML('</div>');
        $mpdf->WriteHTML('</td>');
    $mpdf->WriteHTML('</tr>');
    $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td width="'.$widthBox.'mm" height="'.$heightBox.'mm">');
        $mpdf->WriteHTML('<img src="img/Capture.png" width="'.$widthBox.'mm" height="'.$heightBox.'mm" />');
        $mpdf->WriteHTML('</td>');
        $mpdf->WriteHTML('<td width="'.$widthBox.'mm" height="'.$heightBox.'mm">');
        $mpdf->WriteHTML('<img src="img/Capture.png" width="'.$widthBox.'mm" height="'.$heightBox.'mm" />');
        $mpdf->WriteHTML('</td>');
    $mpdf->WriteHTML('</tr>');
    $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td width="'.$widthBox.'mm" height="'.$heightBox.'mm">');
        $mpdf->WriteHTML('<img src="img/Capture.png" width="'.$widthBox.'mm" height="'.$heightBox.'mm" />');
        $mpdf->WriteHTML('</td>');
        $mpdf->WriteHTML('<td width="'.$widthBox.'mm" height="'.$heightBox.'mm">');
        $mpdf->WriteHTML('<img src="img/Capture.png" width="'.$widthBox.'mm" height="'.$heightBox.'mm" />');
        $mpdf->WriteHTML('</td>');
    $mpdf->WriteHTML('</tr>');
    $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td width="'.$widthBox.'mm" height="'.$heightBox.'mm">');
        $mpdf->WriteHTML('<img src="img/Capture.png" width="'.$widthBox.'mm" height="'.$heightBox.'mm" />');
        $mpdf->WriteHTML('</td>');
        $mpdf->WriteHTML('<td width="'.$widthBox.'mm" height="'.$heightBox.'mm">');
        $mpdf->WriteHTML('<img src="img/Capture.png" width="'.$widthBox.'mm" height="'.$heightBox.'mm" />');
        $mpdf->WriteHTML('</td>');
    $mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('</tbody></table>');


// END html
$mpdf->WriteHTML('</tbody></table>');

// $mpdf->Output('data/product-php.pdf', 'F');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mPDF test file</title>
</head>
<body style="margin: 40px;">
    <h1 style="text-align: center; margin: 100px auto 50px;">This screen only works to export pdf files, check <a href="data/product-php.pdf" target="_blank" style="color: red">data/product-php.pdf</a> to see the results</h1>

    <div style="border: 2px solid #333; padding: 20px;">
        <textarea name="html" id="html" cols="30" rows="30" style="width: 100%;">
            <?php $mpdf->OutputHttpInline(); ?>
        </textarea>
    </div>
    
</body>
</html>