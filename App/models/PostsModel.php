<?php
namespace App\models;



class PostsModel extends Model

{

    
    
    protected $name;

    
    public function getPost($id) {
       
        $data = $this->prepare("SELECT * FROM posts WHERE id = ? ",[$id], null ,false);
        //var_dump($data);
        $article = $this->build($data,'posts');
       return $article;
    }

    public function getPostsByPages($perPage,$cPage) {
        $postMini = $cPage * $perPage - $perPage;
        $sql = "SELECT * FROM posts  ORDER BY ID DESC LIMIT " . $postMini .",". $perPage;
        $req = $this->query($sql,null,null,true );
         //$req = $this->query("SELECT * FROM posts LIMIT 0,5",null,null,true );
        foreach($req as $row){
            $articleId = $row->ID;          
            $articles[$articleId] = $this->build($row,'posts');
            
        }
        return $articles;

    }

    public function getNbposts() {
        $sql = "SELECT COUNT(ID) as nbPosts FROM posts";
        $req = $this->query($sql,null,null,false);
        return $req->nbPosts;
    }





    






}



