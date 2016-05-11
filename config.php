<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
//ini_set('session.save_path', 'D:\xampp\htdocs\webapp\tmp');
ini_set('session.gc_probability',0);

$config['enterprise'] = 'Sistema Reclamo';
$config['address'] = 'Address xxx';
$config['city'] = 'San Miguel de TucumÃ¡n';
$config['zip'] = 'T4107AON';
$config['province'] = 'TUCUMAN';
$config['CUIT'] = '30-XXXXXX-8';
$config['IIBB'] = '924-391538-9 CONV. MULTILAT.';


//PHP error_reporting reference:
//
//// Turn off all error reporting
//error_reporting(0);
//
//// Report simple running errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
//
//// Reporting E_NOTICE can be good too (to report uninitialized
//// variables or catch variable name misspellings ...)
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//
//// Report all errors except E_NOTICE
//// This is the default value set in php.ini
//error_reporting(E_ALL ^ E_NOTICE);
//
//// Report all PHP errors (see changelog)
//error_reporting(E_ALL);
//
//// Report all PHP errors
//error_reporting(-1);
//
//// Same as error_reporting(E_ALL);
//ini_set('error_reporting', E_ALL);

error_reporting(E_ALL);

//error_reporting(E_ALL);
ini_set("display_errors", 1);

define('URL', $_SERVER['PHP_SELF']);
define('APPDIR', 'API/');
define('DBTYPE','mysql');
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASSWORD','');
define('DBNAME','reclamos');


/*define('URL', $_SERVER['PHP_SELF']);
define('APPDIR', 'application/');
define('DBTYPE','mysql');
define('DBHOST','localhost');
define('DBUSER','wi121631_root');
define('DBPASSWORD','Cesar1987');
define('DBNAME','wi121631_favadb');*/


/*
define('URL', 'http://www.favaemprendimientos.com/webapp/');
define('APPDIR', 'application/');
define('DBTYPE','mysql');
define('DBHOST','localhost');
//define('DBUSER','wi121631_favadb');
define('DBUSER','wi121631_root');
define('DBPASSWORD','Cesar1987');
//define('DBPASSWORD','kokeso59GE');
//define('DBPASSWORD','wiriMO68fu');
define('DBNAME','wi121631_favadb');
*/


/** @params **/

define('DELETED','1');



/** @extra **/
//error_reporting(E_ALL);
//ini_set('display_errors', true);


/*
function md5_encrypt($plain_text, $password='thecodeiswithu', $iv_len = 16)
{
   $plain_text .= "\x13";
   $n = strlen($plain_text);
   if ($n % 16) $plain_text .= str_repeat("\0", 16 - ($n % 16));
   $i = 0;
   $enc_text = get_rnd_iv($iv_len);
   $iv = substr($password ^ $enc_text, 0, 512);
   while ($i < $n) {
       $block = substr($plain_text, $i, 16) ^ pack('H*', md5($iv));
       $enc_text .= $block;
       $iv = substr($block . $iv, 0, 512) ^ $password;
       $i += 16;
   }
   return base64_encode($enc_text);
}

function md5_decrypt($enc_text, $password='thecodeiswithu', $iv_len = 16)
{
   $enc_text = base64_decode($enc_text);
   $n = strlen($enc_text);
   $i = $iv_len;
   $plain_text = '';
   $iv = substr($password ^ substr($enc_text, 0, $iv_len), 0, 512);
   while ($i < $n) {
       $block = substr($enc_text, $i, 16);
       $plain_text .= $block ^ pack('H*', md5($iv));
       $iv = substr($block . $iv, 0, 512) ^ $password;
       $i += 16;
   }
   return preg_replace('/\\x13\\x00*$/', '', $plain_text);
}
*/

//echo md5('cristhian14');


function showErrorMessage($type, $message, $modal = null){
    $notification = array('type' => $type, 'message' => $message);
    if($modal) $notification['modal'] = $modal;
    echo json_encode($notification);
}


function debug_to_console($data) {
    if(is_array($data) || is_object($data))
    {
        echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
    } else {
        echo("<script>console.log('PHP: ".$data."');</script>");
    }

    error_log($data, 0);
    error_log($data, 3, PATH_ERROR_LOG);
}



?>