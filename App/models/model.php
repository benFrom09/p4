<?php
namespace App\models;
use App\lib\Database;


class model extends Database
{
        
    //recupere tous les champs d'une table;

    public function getAll($table) {
        
        
       $data = $this->query("SELECT * FROM  $table ORDER BY ID DESC LIMIT 0, 50",null,null,true);
       $articles = array();
       foreach($data as $row){
           $articleId = $row->ID;          
           $articles[$articleId] = $this->build($row,$table);
           
       }
       return $articles;
    }

    //ajoute une entrée ans la base de donnée

    public function add($table,$option) {
        $sql_part = [];
            $attribute = [];
       foreach($option as $key => $value) {
         $sql_part[] = " $key = ?";
            $attribute[] = $value;
        }       
         $sql_part = implode(',', $sql_part);        
        $data = $this->prepare("INSERT INTO $table SET $sql_part", $attribute ,null,false);
        
        //$article = $this->build($data,$table);
        //return $article;
        return $data;
    }

    //efface une entrée dans la base de donnée

    public function delete($table,$id) {
             
        $data = $this->prepare("DELETE FROM $table WHERE id = ? ", [$id],null,false);
        return $data;
    }

    // mise a jour 

    public function update($table,$id, $option) {
        
        $sql_part = [];
        $attribute = [];
       foreach($option as $key => $value) {
        
         $sql_part[] = " $key = ?";
         $attribute[] = $value;
          }
        $attribute[]= $id;
        //var_dump($attribute);
        $sql_part = implode(',', $sql_part);
        
        $data = $this->prepare("UPDATE $table SET $sql_part WHERE ID = ?", $attribute ,null,false);

        return $data;
          

        
        
    }

    







}