<?php
namespace App\controllers;
use \App\App;
use \App\lib\Config;
use App\lib\Controller;


class PostController extends Controller
{   


   

    public function __construct() {
        
        $this->loadModel('posts');
        $this->loadModel('comments');
    }

    // rends la vue index
   
    public function index($id = 1) {

        $nbposts = $this->posts->getNbPosts();   
        
        $index = Config::get('post_per_page');
        $nbPage = ceil($nbposts / $index);

        if(is_numeric($id) && $id <= $nbPage){
        // pagination 
       
            $cPage = $id;
        } else {
            $cPage = 1;
        }
        
        $posts = $this->posts->getPostsByPages($index,$cPage);
        
        
        
        $this->render('posts','index',compact('posts','nbPage','cPage'));
    }

    //rend la vue d'un article

    public function show($id) {
        
       
        if(!empty($_POST['username'])){
            $req = $this->comments->add('comments',['ID_comment'=>$id,'username'=>$_POST['username'],
                
                'comments'=>$_POST['comments'],'comment_creation'=>date("Y-m-d H:i:s")
                
        
            ]);
         
            if($req) {
                
                $_SESSION['sucess'] = true;
                 
                 
             } else {
                 '<div class="alert alert-danger">echec de l\enregistrement ! </div>';
             }
            
             header('location:/monblog/post/' . $id);
        }
        $_POST['username'] = '';
        if(!empty($_POST) && !empty($_POST['alert'])){
            
           $comments = $this->comments->updateComment();    
           
        }
          
        $comments = $this->comments->getComments($id);   
        $post = $this->posts->getPost($id);  
        $this->render('posts','single',compact('post','comments'));
        
    }

    




}