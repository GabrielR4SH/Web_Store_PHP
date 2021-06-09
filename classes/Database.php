<?php 

namespace core\classes;

use PDO;


//class
class Database{

    private $ligacao;

    private function ligar(){
        //ligar ao banco de dados
        'mysql:'.
        'host='. MYSQL_SERVER.';'.
        'dbname='. MYSQL_DATABASE,
        'charset'. MYSQL_CHARSET,
        MYSQL_USER,
        MYSQL_PASS,
        array(PDO::ATTR_PERSISTENT => true);
    }

    //dubug

    $this->ligacao->setAttribute(PDO::ERRMODE_WARING);


    //desligar

    private function desligar(){

        $this->$ligacao = null;
    }

        //1-ligar, 2-comunicar, 3-fechar

    //CRUD

    public function select($sql, $parametros = null){

        // executar pesquisas de SQL
        $this->ligar();


        $resultados = null;


            try{

                // comunicação com BD

                if(!empty($parametros)){
                    $executar = $this->ligacao->prepare($sql);  
                    $executar->execute($parametros);

                    $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
                } else{

                    $executar = $this->ligacao->prepare($sql);  
                    $executar->execute();
                    $resultados = $executar->fetchAll(PDO::FETCH_CLASS);

                }

            } catch(PDOException $e){

                //caso exista erro
                return false;
            }

        //desligar do BD
        $this->desligar();
3

        return $resultados;
    }
 }

}




?>