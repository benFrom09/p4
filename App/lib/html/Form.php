<?php
namespace App\lib\html;


class Form
{


    protected $data;
    public $tag = 'p';

    public function __construct($data = array()) {
        $this->data = $data;
        
    }

    protected function htmlTag($html) {

        return "<{$this->tag}>{$html}</{$this->tag}>";
    }

    protected function getValue($index){

        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($name,$label) {
        return $this->htmlTag('<label>'.$label.'</label><input type="text" name="' . $name .'" value="'. $this->getValue($name) .'">');

    }

    public function password($name,$label) {
        return $this->htmlTag('<label>'. $label .'</label><input type="password" name="' . $name .'" value="'. $this->getValue($name) .'">');

    }

    public function submit() {

        return $this->htmlTag('<button type="submit">Envoyer</button>');
    }










}