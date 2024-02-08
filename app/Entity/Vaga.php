<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Vaga {
    public $id;
    /**
     * Titulo de vaga
     * @var string
     */
    public $titulo;

     /**
     * Descricao de vaga
     * @var string
     */
    public $descricao;

     /**
     * TDefine se a vaga ativa
     * @var string(s/n)
     */
    public $status;

     /**
     * Data da publicação da vaga
     * @var string
     */
    public $data;

    public function cadastrar(){
        date_default_timezone_set("America/Sao_Paulo");

        $this->data = date('Y-m-d H:i:s');

        $obDatabase = new Database('vagas');
        
        $this->id = $obDatabase->insert([
                                        'titulo' => $this->titulo,
                                        'descricao' => $this->descricao,
                                        'status' => $this->status,
                                        'data' => $this->data
                                        ]);
        return true;
    }

    public static function getVagas($where = null, $order = null, $limit = null) {
        return (new Database('vagas'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function getVaga($id) {
        return (new Database('vagas'))->select('id = '.$id)
                                      ->fetchObject(self::class);
                              
    }
}