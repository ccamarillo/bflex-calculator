<?php

require __DIR__ . '/vendor/autoload.php';

use mikehaertl\wkhtmlto\Pdf;

$query = http_build_query($_GET);

$pdf = new Pdf();
$pdf->addPage('http://localhost/pdf.php?' . $query);

if (!$pdf->send()) {
    throw new \Exception($pdf->getError());
}
