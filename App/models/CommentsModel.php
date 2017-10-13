<?php
namespace App\models;


class CommentsModel extends Model

{



    public function All() {
        $data = $this->query('SELECT * FROM comments ',null,null,true);
        return $data;
    }

    public function getcomments($ID_comment) {
        
       $data = $this->prepare('SELECT ID, username, comments, id_comment,comment_creation,alert
        FROM comments WHERE id_comment = ?', [$ID_comment],null,true);
        if($data){
            foreach($data as $k =>$v ) {
        
             $comments[$k] = $this->build($v,'comments');
       
         }
       
        return $comments;
        } 
       
       
    }
    

    public function updateComment() {
        $data = $this->prepare("UPDATE comments SET alert = ? WHERE id =?",[$_POST['alert'],$_POST['id']],null,false);
        //var_dump($data);
        return $data;
    }

    
    
    public function getFilteredComments() {
        $sql = "SELECT * FROM comments ORDER BY alert DESC ";
        
        $data = $this->query($sql,null,null,true);
        
        foreach($data as $k =>$v ) {
         
        $comments[$k] = $this->build($v,'comments');
        
     }
         return $comments;
        
     }

     public function getFilteredCommentsByPost($id) {
        $sql = "SELECT * FROM comments WHERE id_comment = ? ORDER BY alert DESC ";
        
        $data = $this->prepare($sql,[$id],null,true);
        //$data = $req->fetchAll();

        if($data){
            foreach($data as $k =>$v ) {
        
             $comments[$k] = $this->build($v,'comments');
       
         }
       
        return $comments;
        } 
        
     }
    

   


}