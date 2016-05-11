<?php

//class Session {
//
//    protected static $_sessionStarted = false;
//    
//    function __construct() {
//    }
//    
//    public static function start(){
//       if(self::$_sessionStarted == false){
//           session_start();
//           self::$_sessionStarted = true;
//       }
//    }
//    
//    public static function isLogged(){
//        return self::$_sessionStarted;
//               
//    }
//
//    public static function set($key, $value){
//       $_SESSION[$key] = $value;
//    }
//    
//    public static function get($key, $secondKey = false){
//        if($secondKey == true){
//            if(isset($_SESSION[$key][$secondKey]))
//            return $_SESSION[$key][$secondKey];
//        }else{
//            if(isset($_SESSION[$key]))
//            return $_SESSION[$key];
//        }
//        return false;
//    }
//    
//    public static function display(){
//        echo '<pre>';
//        print_r($_SESSION);
//        echo '</pre>';
//    }
//    
//    public static function destroy(){
//       if(self::$_sessionStarted == true){
//           session_unset();
//           session_destroy();
//           self::$_sessionStarted = false;
//       }
//    }
//
//}


/**
* Session
* -Static Session Wrapper Class
* -Convienience Methods (do Error Checking),
* -Measures To Prevent Session Hijacking,
* -Handles Single Variables or Associative
* Arrays through autodetecting the type
* passed in.
* @package sandboxphp
* @author hskitts
* @copyright 2012
* @version $Id$
* @access public
*/
class Session{
    
    
    /**
* Session::start()
* Start A Secure Session
* Helps Prevent Session Hijacking
* @return void
*/
    public static function start(){
        if (session_id() == false){
            session_start();
            //session_regenerate_id();//vs session hijacking
        }
    }
    
    /**
* Session::set()
* Sets Session Variables
* Handles Arrays and Single Variables by detecting $key type
* in the case of $key being an array:
* $value will be an array of key value
* pairs in the $key array
* @param mixed $key
* @param mixed $value if key is an array $value must be array
* @return void
*/
    public static function set($key, $value) {
        if (is_array($value)){ //if value is an array update and existing variable
            $ARRAY = &$_SESSION[$key]; //save the current session array
            foreach($value as $k => $v){ //for each key=value pair in the value passed in
                $ARRAY[$k] = $v; //push
            }
            $_SESSION[$key] = $ARRAY;
            return;
        }
        $_SESSION[$key] = $value;
        return;
    }

    /**
* Session::get()
* Get The Value Of A Session Variable
* (Handles Arrays As well)
* @param mixed $key session variable to get
* @param bool $key2 only to access an array
* @return
*/
    public static function get($key,$key2=false){
        if(isset($_SESSION[$key])){
            if($key2){
               return $_SESSION[$key][$key2];
            }else{
                
               return $_SESSION[$key];
               
            }
            
        }else{
            return false;
        }
    }
    
    /**
* Session::del()
* Delete A Session Variable
* (This Does Not Destroy The
* Whole Session)
* @param mixed $key
* @return void
*/
    public static function del($key,$key2=false){
        if(isset($_SESSION[$key])){
            if($key2){
               unset($_SESSION[$key][$key2]);
            }else{
               unset($_SESSION[$key]);
            }
        }
    }
    
    /**
* Session::destroy()
* Destroy The Current Session With All Variables
* @return void
*/
    public static function destroy(){
        if (session_id() == true){
            session_destroy();
        }
    }
    
    /**
* Session::dump()
* Display The Current $_SESSION Array
* (for debugging purposes)
* @return void
*/
    public static function dump(){
        if (session_id() == true){
            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
        }
    }
    
    public static function toArray(){
        return $_SESSION;
    }
    
}


?>