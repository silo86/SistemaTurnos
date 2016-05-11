<?php


class Error extends Controller {

    const PATH_ERROR_LOG = "tmp/errors.log";

    function __construct() {
        parent::__construct();
/*        $this->view->msg = 'this page doesnt exist';
        $this->view->render('error/index');*/
    }

    function Error(){
        parent::__construct();
    }

    public static function debug_to_console($data) {
        if(is_array($data) || is_object($data))
        {
            echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
        } else {
            echo("<script>console.log('PHP: ".$data."');</script>");
        }

        error_log($data, 0);
        error_log($data, 3, PATH_ERROR_LOG);
    }

}






/*
INCLUDE THE FOLLOWING VARS AS MEMBER WITHIN THIS CLASS

$hook['pre_controller'] = array(
                                'class'    => 'PHPE',
                                'function' => 'reload',
                                'filename' => 'phpe.php',
                                'filepath' => 'hooks'
                                );
*/


?>
