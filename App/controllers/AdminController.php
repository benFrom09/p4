<?php
namespace App\Controllers;
use \App\lib\Auth;
use App\lib\Controller;
use App\lib\Config;
use \App;


class AdminController extends Controller 
{


    protected $data;
    protected $view_path;
    protected $db;

    public function __construct() {
       
        $this->loadModel('posts');
        $this->loadModel('comments');
    }
   
    public function index() {
        $auth = new Auth(App\App::connect());
       if(!$auth->logged()){
          
           header('location:login');
          
       } else {
            
            $posts = $this->posts->getAll('posts');
            
             $comments = $this->comments->All();
             
            
             
            $this->render('admin','index',compact('posts','comments'));
       }
        
    }

    public function edit($id) {
            $this->isAdmin();
            if(!empty($_POST)){
               
            $posts = $this->posts->update('posts',$id,[               
                'title'=>$_POST['title'],
                'content'=>$_POST['content'],
                'online' =>$_POST['online'],
                'creation' =>date("Y-m-d H:i:s")
            ]);           
            if($posts) {
                 
                 $_SESSION['msg']['success'] = 'l\'article a bien été édité :) ! ';

             } else {
                 '<div class="alert alert-danger">echec de l\enregistrement ! </div>';
             }
            
        }
        $posts = $this->posts->getPost($id);
        $form = new App\lib\html\Bootstrapform($posts); 
        $this->render('admin','edition',compact('posts','form'));
        
        
    }

    public function delete($id) {
        $this->isAdmin();
        if(!empty($_POST)) {
             $posts = $this->posts->delete('posts',$id);
             $comments = $this->comments->delete('comments',$id);
            if($posts || $comments) {
            
              
              header('location:../admin');
       
            }     
       }
    }

    public function add() {
        $this->isAdmin();
        if(!empty($_POST['content'])) {
            $posts = $this->posts->add('posts',[
                
               'title'=>$_POST['title'],
               'content'=>$_POST['content'],
               'online' =>$_POST['online'],
               'creation'=>date("Y-m-d H:i:s")      
           ]);           
            if($posts) {                  
                
                $_SESSION['msg']['success'] = "l'article a bien été ajouté :) ";
                //echo '<div class="alert alert-success">la requete à éte éffectué avec succes ! </div>';
                header('location:admin');
            } else {
       
                '<div class="alert alert-danger">echec de l\enregistrement ! </div>';
            }          
            
       }
            $_POST =[];
            
            $form = new App\lib\html\Bootstrapform($_POST); 
            $this->render('admin','ajouter',compact('posts','form'));
    }

    public function login() {
        
        $auth = new Auth(App\App::connect());
        if($auth->logged()){
               
            header('location:admin');
            
        }
        if(!empty($_POST)){
            
            if($auth->login($_POST['username'],$_POST['password'] )){
             
                // se souvenir de moi est coché
                $_SESSION['msg']['success'] = 'bienvenue';
                header('location:admin');
            }
            
            
            
                
        }
        
        $form = new \App\lib\html\Bootstrapform($_POST);
        $this->render('admin','login',compact('form'));
    }

    public function logout() {
        session_start();
        unset($_SESSION['auth']);
        $_SESSION['msg']['success'] = 'vous etes déconnecté';
        
        header('location:login');
    }

    public function register() {

        $form = new \App\lib\html\Bootstrapform($_POST);
        $this->render('admin','register',compact('form'));
    }

    public function comments($id) {
        $this->isAdmin();
            
        $comments = $this->comments->getFilteredCommentsByPost($id);
             
         $this->render('admin','comments',compact('comments'));
        
    }

    public function deleteComment($id) {
        if(!empty($_POST)) {
             
             $comments = $this->comments->delete('comments',$id);
            if($comments) {
            
              
              header('location:../admin');
       
            }     
       }
    }

    public function allComment() {
        $this->isAdmin();
        $posts = $this->posts->getAll('posts');
        $comments = $this->comments->getFilteredComments();
        $this->render('admin','allComment',compact('comments','posts'));
    }

    private function isAdmin() {
        if(!$_SESSION['auth']) {
            header('Location:/monblog/404');
        }
    }




}