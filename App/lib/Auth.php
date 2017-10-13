<?php
namespace App\lib;

use App\lib\Database;

class Auth 
{
        protected $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function login($username, $password) {
        $req = $this->db->prepare('SELECT * FROM user WHERE username = ?', [$username], null,false);
        if($req) {         
           if($req->password === sha1($password)){             
               $_SESSION['auth'] =['id' => $req->ID,
               'username'=> $req->username,
               'password'=>sha1($password)];
                
               return true;
           } 
 
                return false;
        } 
    }

    public function logged() {
        
        return isset($_SESSION['auth']);

    }

   





}

