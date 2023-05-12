<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar venda');

use \App\Entity\Sale;
$obSale = new Sale;

//VALIDAÇÃO DO POST
if(isset($_POST['value'],$_POST['tax'])){

  $obSale->value = $_POST['value'];
  $obSale->tax = $_POST['tax'];
  $obSale->create();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';