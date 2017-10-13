<?php
namespace App\lib;

use \PDO;

class Database
{     
    protected $dsn = 'mysql:dbname=blog;host=localhost;charset=utf8';
    
    protected $user = 'root';
    protected $password = '';

     protected $db;
     protected $pdo;


    public function __construct($db) {
        $this->db = $db;
        
    }

    // instancie un nouvel objet PDO

    private function pdo() 
        {
            if($this->pdo === null) {
                $pdo = new PDO($this->dsn,$this->user,$this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            }
            
                return $this->pdo;

        }

        public function query($statement, $class = null,$value = null, $all = false) {

            $req = $this->pdo()->query($statement);

            if($class === null) {
                $req->setFetchMode(PDO::FETCH_OBJ);
            } else {
                $req->setFetchMode(PDO::FETCH_CLASS,$class) ;
            }
            if($all){
                 $data = $req->fetchAll();
            } else {
                $data = $req->fetch();
            }
               
                return $data;
            
        }

        public function prepare($statement, $value = [] ,$class = null, $all = false) {
             $req = $this->pdo()->prepare($statement,$value);
             
              $exec = $req->execute($value);
              
             
             if(strpos($statement, 'UPDATE') === 0 || strpos($statement,'INSERT') === 0 || strpos($statement,'DELETE') === 0  ) {
              // echo 'bien enregitré';
                return $exec;
             }

            if($class === null) {
                $req->setFetchMode(PDO::FETCH_OBJ);
            } else {
                $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$class) ;
            }
            if($all){
                $data = $req->fetchAll();
            } else {
                $data = $req->fetch();
            }
                
                return $data;
        }

        //recupere le dernier id inséré 

        public function lastId() {
            return $this->pdo()->lastInsertId();
        }

      // instancie une nouvelle entité

        public function build($row,$class) {
           $class = 'App\Entity' . DS . $class;           
           $entity = new $class($row);
           return $entity;
        }


}