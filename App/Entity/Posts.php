<?php
namespace app\entity;




class Posts
{

    private $_title;
    private $_content;
    private $_id;
    private $_online;
    private $_creation;
    private $_author;

    public function __construct($data) {
        if($data){
            $this->hydrate($data); 
            //var_dump($data);
        }     
    }

    public function title() {
       return $this->_title ;
    }

    public function content() {
        return $this->_content ;
    }

    public function id() {
        return $this->_id;
    }
    public function online(){
        return $this->_online;
    }
    public function creation() {
        return $this->_creation;
    }

    public function author() {
        return $this->_author;
    }

    public function setOnline($online){
        $this->_online = $online;
    }

    public function setTitle($title){
        if(is_string($title)) {
             $this->_title = $title;
        }
    }

    public function setContent($content) {
        if(is_string($content)) {
            $this->_content = $content;
       }
    }
    public function setId($id) {
        $id = (int) $id;
        if($id > 0) {
            $this->_id = $id;
        }
    }

    public function setCreation($creation) {
        
        $this->_creation = $creation;
    }

    public function setAuthor ($author) {
        if(is_string($author)) {
            $this->_author = $author;
        }
    }

   

    public function extrait(){
        
    $tag = '<p>' .substr($this->Content(),0, 300 ). '...</p>';
    $tag .='<p><a href="' . $this->getUrl() .'">voir la suite</a></p>';
    return $tag;
    }

    public function getUrl() {
        return '/monblog/post/'. $this->id();
    }

    public function getDate() {
        $date = $this->creation();
        
        $date = explode(' ',$date);
        $formatDate = new \DateTime($date[0]);
        return $formatDate->format('d-m-Y');
        

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