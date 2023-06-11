<?php
require_once __DIR__ . '/vendor/autoload.php';

// On html have img tag with absolute url https://mpdf-app.dev.cc:8890/ ...  => fix with str_replace
// qr_code not working
$html = '<div style=\"position: relative; font-size: 0;\">
<table style=\"margin-left: auto; margin-right: auto; text-align: center; border-width: 0;\">
<tbody><tr>
<td style=\"width:118.6046511627907px; height:168.6046511627907px; border: 3.625px solid #fff;\">
<div class=\"item\" data-target=\"1\" style=\"width:118.6046511627907px; height:168.6046511627907px; position: relative; overflow: hidden; border: 1px solid #ef3598; background: #fff;\" data-id=\"196\">
<img src=\"https://mpdf-app.dev.cc:8890/img/Capture.png\" style=\"position: absolute; top: 0px; left: 0px; object-fit: cover; height: 100%; width: 100%;\">
</div></td>
<td style=\"width:118.6046511627907px; height:168.6046511627907px; border: 3.625px solid #fff;\"><div class=\"item\" data-target=\"2\" style=\"width:118.6046511627907px; height:168.6046511627907px; position: relative; overflow: hidden; border: 1px solid #ef3598; background: #fff;\" data-id=\"196\"><img src=\"https://mpdf-app.dev.cc:8890/img/Capture.png\" style=\"position: absolute; top: 0px; left: 0px; object-fit: cover; height: 100%; width: 100%;\"></div></td></tr><tr><td style=\"width:118.6046511627907px; height:168.6046511627907px; border: 3.625px solid #fff;\"><div class=\"item\" data-target=\"3\" style=\"width:118.6046511627907px; height:168.6046511627907px; position: relative; overflow: hidden; border: 1px solid #ef3598; background: #fff;\" data-id=\"196\"><img src=\"https://mpdf-app.dev.cc:8890/img/Capture.png\" style=\"position: absolute; top: 0px; left: 0px; object-fit: cover; height: 100%; width: 100%;\"></div></td><td style=\"width:118.6046511627907px; height:168.6046511627907px; border: 3.625px solid #fff;\"><div class=\"item\" data-target=\"4\" style=\"width:118.6046511627907px; height:168.6046511627907px; position: relative; overflow: hidden; border: 1px solid #ef3598; background: #fff;\" data-id=\"196\"><img src=\"https://mpdf-app.dev.cc:8890/img/Capture.png\" style=\"position: absolute; top: 0px; left: 0px; object-fit: cover; height: 100%; width: 100%;\"></div></td></tr><tr><td style=\"width:118.6046511627907px; height:168.6046511627907px; border: 3.625px solid #fff;\"><div class=\"item\" data-target=\"5\" style=\"width:118.6046511627907px; height:168.6046511627907px; position: relative; overflow: hidden; border: 1px solid #ef3598; background: #fff;\" data-id=\"196\"><img src=\"https://mpdf-app.dev.cc:8890/img/Capture.png\" style=\"position: absolute; top: 0px; left: 0px; object-fit: cover; height: 100%; width: 100%;\"></div></td><td style=\"width:118.6046511627907px; height:168.6046511627907px; border: 3.625px solid #fff;\"><div class=\"item\" data-target=\"6\" style=\"width:118.6046511627907px; height:168.6046511627907px; position: relative; overflow: hidden; border: 1px solid #ef3598; background: #fff;\" data-id=\"196\"><img src=\"https://mpdf-app.dev.cc:8890/img/Capture.png\" style=\"position: absolute; top: 0px; left: 0px; object-fit: cover; height: 100%; width: 100%;\"></div></td></tr><tr><td style=\"width:118.6046511627907px; height:168.6046511627907px; border: 3.625px solid #fff;\"><div class=\"item\" data-target=\"7\" style=\"width:118.6046511627907px; height:168.6046511627907px; position: relative; overflow: hidden; border: 1px solid #ef3598; background: #fff;\" data-id=\"196\"><img src=\"https://mpdf-app.dev.cc:8890/img/Capture.png\" style=\"position: absolute; top: 0px; left: 0px; object-fit: cover; height: 100%; width: 100%;\"></div></td><td style=\"width:118.6046511627907px; height:168.6046511627907px; border: 3.625px solid #fff;\"><div class=\"item\" data-target=\"8\" style=\"width:118.6046511627907px; height:168.6046511627907px; position: relative; overflow: hidden; border: 1px solid #ef3598; background: #fff;\" data-id=\"196\"><img src=\"https://mpdf-app.dev.cc:8890/img/Capture.png\" style=\"position: absolute; top: 0px; left: 0px; object-fit: cover; height: 100%; width: 100%;\"></div></td></tr></tbody></table></div><div class=\"barcodeContainer\" style=\"position: absolute; top: 0px; left: 0px;\"><img src=\"qrcode.php?s=code-128&amp;sf=12&amp;sy=6&amp;wq=0&amp;pl=1&amp;pr=1&amp;pt=1&amp;pb=1&amp;ts=0&amp;th=10&amp;d=SDVSRE\" style=\"width: 17px; height: 8.5px;\"><div class=\"barcodeText\" style=\"text-align: center; font-size: 2.55px;\">18x24</div></div><div class=\"barcodeContainer\" style=\"position: absolute; top: unset; left: unset; bottom: 0px; right: 0px; transform: rotate(180deg);\"><img src=\"qrcode.php?s=code-128&amp;sf=12&amp;sy=6&amp;wq=0&amp;pl=1&amp;pr=1&amp;pt=1&amp;pb=1&amp;ts=0&amp;th=10&amp;d=SDVSRE\" style=\"width: 17px; height: 8.5px;\"><div class=\"barcodeText\" style=\"text-align: center; font-size: 2.55px;\">18x24</div></div>';
// remove absolute url and use relative url
$new_output = str_replace('https://mpdf-app.dev.cc:8890/', '', $html);
$new_output = stripslashes(html_entity_decode($new_output));
$new_output = '<div style="position: relative;">'.$new_output.'</div>';


$mpdf = new \Mpdf\Mpdf();
// $mpdf->showImageErrors = true;
$mpdf->WriteHTML($new_output);
$mpdf->Output('data/product.pdf', 'F');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mPDF test file</title>
</head>
<body style="margin: 40px;">
    <h1 style="text-align: center; margin: 100px auto 50px;">This screen only works to export pdf files, check <span style="color: red">data/product.pdf</span> to see the results</h1>

    <h2>Content HTML:</h2>
    <div style="border: 2px solid #333; padding: 20px;">
        <textarea name="html" id="html" cols="30" rows="30" style="width: 100%;">
            <?php echo trim($new_output) ?>
        </textarea>
    </div>

    <h2>Preview HTML</h2>
    <div style="border: 2px solid #333; padding: 20px;">
        <?php echo trim($new_output) ?>
    </div>
</body>
</html>