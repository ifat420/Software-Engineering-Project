<?php 
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

    defined('SITE_ROOT') ? null :
        define('SITE_ROOT',DS.'xampp'.DS.'htdocs'.DS.'challenge_project');

    defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'include');

    // load config file first
    require_once(LIB_PATH.DS.'config.php');

    // load basic function
    require_once(LIB_PATH.DS.'function.php');

    //local core object
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'database.php');

    // load database require classes
    require_once(LIB_PATH.DS.'student.php');

?>