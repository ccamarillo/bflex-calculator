<?php

require __DIR__ . '/vendor/autoload.php';

$calculator = new Calculator();

echo json_encode($calculator->getPrep());