<?php

class View {

    protected $file;
    protected $values = array();

    public function __construct($file = null) {
        if(isset($file)) $this->file = $file;
    }

    public function set($key, $value) {
        $this->values[$key] = $value;
    }
    

    public function output() {
        if (!file_exists($this->file)) {
            return "Error al cargar el archivo del template ($this->file).";
        }
        $output = file_get_contents($this->file);

        foreach ($this->values as $key => $value) {
            $tagToReplace = "[@$key]";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }
    
    public function display(){
        echo $this->output();
    }
    
    /*
     *  [05/12/2014]
     */
    public function render($file, array $values){
        if(file_exists($file)){
            $content = file_get_contents($file);
            foreach($values as $key => $value){
                $tagToReplace = "[@$key]";
                $content = str_replace($tagToReplace, $value, $content);
            }
        }
        echo $content;
    }    
    
}

?>
