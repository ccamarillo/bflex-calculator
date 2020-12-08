<?php

require __DIR__ . '/vendor/autoload.php';

$calculator = new Calculator(1000, 750, 265, 30, 2200, 'low', 7.23);

echo '<pre>';
var_dump($calculator->calculate());
echo '</pre>';

