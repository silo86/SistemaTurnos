<?php

class Template {

    protected $file;
    protected $values = array();

    public function __construct($file) {
        $this->file = $file;
    }

    public function set($key, $value) {
        $this->values[$key] = $value;
    }

    public function output() {
        if (!file_exists($this->file)) {
            return "Error loading template file ($this->file).";
        }
        $output = file_get_contents($this->file);

        foreach ($this->values as $key => $value) {
            $tagToReplace = "[@$key]";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }

}

/** example **/
/*
 * 
include("template.class.php");
  
$profile = new Template("user_profile.tpl");
$profile->set("username", "monk3y");
$profile->set("photoURL", "photo.jpg");
$profile->set("name", "Monkey man");
$profile->set("age", "23");
$profile->set("location", "Portugal");
  
echo $profile->output();
 * 
 */
/*
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>[@title]</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
    <div id="header">
        <a href="http://www.broculos.net"><img src="broculo_small.gif" class="logo" alt="Broculos.net" /></a>
        <h1><a href="http://www.broculos.net">Broculos.net</a></h1>
        <h2>Simple PHP Template Engine</h2>
    </div>  
    <div id="menu">
        <h1>Navigation</h1>
        <ul>
            <li><a href="user_profile.php">User profile</a> - example of a user profile page</li>
            <li><a href="list_users.php">List users</a> - example table with listing of users</li>
        </ul>
    </div>
    <div id="content">
        [@content]
    </div>
    <div id="footer">
        Example usage of a simple PHP Template Engine.<br />
        Search <a href="http://www.broculos.net">Broculos.net</a> for more tutorials.
    </div>
</body>
</html> 
 */
/*
 include("template.class.php");
  
$profile = new Template("user_profile.tpl");
$profile->set("username", "monk3y");
$profile->set("photoURL", "photo.jpg");
$profile->set("name", "Monkey man");
$profile->set("age", "23");
$profile->set("location", "Portugal");
  
$layout = new Template("layout.tpl");
$layout->set("title", "User profile");
$layout->set("content", $profile->output());
  
echo $layout->output();
 */



?>
