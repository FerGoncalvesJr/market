<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Sale;

  
if ($row = Sale::getSale($_POST['id'])) {
  $data = array('res' => 'success', 'row' => $row);
}else{
  $data = array('res' => 'error');
}

echo json_encode($data);