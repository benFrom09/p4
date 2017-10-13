<?php
namespace app\entity;




class Comments
{

    private $_username;
    private $_comments;
    private $_comment_creation;
    private $_id_comment;
    private $_id;
    private $_alert;

    public function __construct($data) {
        if($data){
            $this->hydrate($data); 
            //var_dump($data);
        }      
    }

    public function username() {
       return $this->_username ;
    }

    public function comments() {
        return $this->_comments ;
    }

    public function id() {
        return $this->_id;
    }

    public function alert() {
        return $this->_alert;
    }

    public function comment_creation () {
        return $this->_comment_creation;
    }

    public function setUsername($username){
        if(is_string($username)) {
             $this->_username = $username;
        }
    }

    public function setComments($comments) {
        if(is_string($comments)) {
            $this->_comments = $comments;
       }
    }
    public function setId($id) {
        $id = (int) $id;
        if($id > 0) {
            $this->_id = $id;
        }
    }

    public function setAlert($alert) {
        $alert = (int) $alert;
        $this->_alert = $alert;
    }

    public function setComment_creation ($comment_creation) {
         $this->_comment_creation = $comment_creation;
    }

    

    public function hydrate($data) {
        
         if($data){
        
            foreach($data as $k => $v) {
                
                $method = 'set'.ucfirst($k);
                if(method_exists($this,$method)){
                            $this->$method($v);
                }
            }       
        }  
          
            
           
        
        
    }






}