<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Sale;


$rows = Sale::getSales();

$data = array('rows' => $rows);

echo json_encode($data);