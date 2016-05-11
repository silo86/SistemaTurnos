<?php

class Controller {
    public $model = null;
    public $view = null;
  
    function __construct() {

    }
    
    function Controller($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }    
    
    function loadModel($model){
        $path = APPDIR.'Model/_'.$model.'.php';

        if(file_exists($path)){
            require APPDIR.'Model/_'.$model.'.php';
            
            $modelName = '_'.$model;
            $this->model = new $modelName();
        }
    }

}
?>
