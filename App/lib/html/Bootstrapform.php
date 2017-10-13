<?php
namespace App\lib\html;

use App\lib\html\Form;

class Bootstrapform extends Form
{


    

    protected function htmlTag($html) {

        return "<div class=\"form-group\">{$html}</div>";
    }

    protected function getValue($index){
        //var_dump($index);
        if(is_object($this->data)){
            //var_dump($this->data);
            return $this->data->$index();
        }

       
        
     return isset($this->data[$index]) ? $this->data[$index] : null;
        

        
    }

    public function input($name, $label) {
        return $this->htmlTag('<label>' . $label .'</label><input type="text" name="' . $name .'" value="'. $this->getValue($name) .'" class="form-control">');

    }

     public function password($name, $label) {
        return $this->htmlTag('<label>' . $label .'</label><input type="password" name="' . $name .'" value="'. $this->getValue($name) .'" class="form-control">');

    }

    public function textarea($name, $label) {

        return $this->htmlTag('<label>' . $label .'</label><textarea id="myTiny" name="' . $name .'" class="form-control">' . $this->getValue($name) .'</textarea>');
    }

    

    
     

    public function submit() {

        return $this->htmlTag('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }










}