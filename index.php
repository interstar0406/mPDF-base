<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Image('/Users/apple/Documents/cnb/mPDF/img/Capture.png', 10, 10, 50, 50, 'png');
$mpdf->Output('data/test.pdf', 'F');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mPDF test file</title>
</head>
<body>
    <h1 style="text-align: center; margin: 200px auto;">This screen only works to export pdf files, check <span style="color: red">data/test.pdf</span> to see the results</h1>
</body>
</html>