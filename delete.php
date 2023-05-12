<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Sale;

$obSale = Sale::getSale($_POST['id']);

$obSale->value = $_POST['value'];
$obSale->tax = $_POST['tax'];


if($obSale->delete()) {
    $data = array('res' => 'success');
} else{
    $data = array('res' => 'error');
}

echo json_encode($data);