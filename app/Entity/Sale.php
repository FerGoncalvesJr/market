<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Sale{

  /**
   * Identificador único da venda
   * @var integer
   */
  public $id;

  /**
   * Valor da venda 
   * @var string
   */
  public $value;

  /**
   * Imposto sobre a venda
   * @var int
   */
  public $tax;

  /**
   * Data da venda
   * @var string
   */
  public $data;

  /**
   * Método responsável por cadastrar uma nova venda no banco
   * @return boolean
   */
  public function create(){
    $this->data = date('Y-m-d H:i:s');

    $obDatabase = new Database('sales');
    $this->id = $obDatabase->insert(
      [
        'value' => $this->value,
        'tax' => $this->tax,
        'data' => $this->data
      ]
    );

    return true;
  }

  /**
   * Método responsável por atualizar a venda no banco
   * @return boolean
   */
  public function update()
  {
    return (new Database('sales'))->update(
      'id = '.$this->id,
      [
        'value'    => $this->value,
        'tax' => $this->tax,
        'data'      => $this->data
      ]
    );
  }

  /**
   * Método responsável por excluir a venda do banco
   * @return boolean
   */
  public function delete()
  {
    return (new Database('sales'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as vendas do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getSales($where = null, $order = null, $limit = null)
  {
    $data = [];

    $data = (new Database('sales'))->select($where,$order,$limit)
      ->fetchAll(PDO::FETCH_CLASS,self::class);
    
    return $data;
  }

  /**
   * Método responsável por buscar uma venda com base em seu ID
   * @param  integer $id
   * @return Sale
   */
  public static function getSale($id)
  {
    return (new Database('sales'))->select('id = '.$id)
      ->fetchObject(self::class);
  }

}