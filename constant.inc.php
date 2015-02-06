<?php
//======================== Global constant ===============================
define('APPLICATION_PATH', realpath('../'));
define('DS', DIRECTORY_SEPARATOR);
define('BASE', basename(__DIR__)); // ==> '{project folder }'
define('SCHEME', $_SERVER['REQUEST_SCHEME']); // http | https
define('PROTOCOL', SCHEME.'://'); // http://
define('HOST', PROTOCOL.$_SERVER['SERVER_ADDR']); // ==> 'http://192.168.0.228/'
define('SITE_TITLE', "SITE TITLE");
define('SITE_NAME', "SITENAME.COM");
define('MAIL_ADMIN', 'admin@domain.com');

define('DIR', APPLICATION_PATH.DS.BASE); //==> /opt/lampp/htdocs/{project}
define('PATH_', HOST.DS.BASE.DS); // ==> 'http://192.168.0.228/{project}/

d(PATH_, DIR);

/**
 * DIR dont have trailing slash   << physical absolute location
 * PATH_ have trailing slash /  << URI
 *
 * any constant using DIR , appended with DS >> DIR.DS.[whatever]
 * any cosntact which use PATH_, ends with DS  >> PATH_.[whatever].DS
 */
//////////////////////////////////////////////////////////////////////////////////////
//***************************Constants For Front end*****************************// //
//////////////////////////////////////////////////////////////////////////////////////
 // including php file and images require physical location

define('INCLUDE_DIR', DIR.DS.'includes');
define('IMG_DIR', DIR.DS.'images');
define('CLASS_DIR', DIR.DS.'classes');

// including css , js and images require URI
define('CSSPATH', PATH_.'css'.DS);
define('JSPATH', PATH_.'js'.DS);
define('IMGPATH', PATH_.'images'.DS);

// +d(array_slice(get_defined_constants(), -15));

/////////////////////////////////////////////////////////////////////////////////////
//***************************Constants For back end*****************************// //
/////////////////////////////////////////////////////////////////////////////////////

define('A_DIR', DIR.DS.'admin');
define('A_PATH', PATH_.'admin'.DS);
define('A_JSPATH', A_PATH.'js'.DS);
define('A_IMGPATH', A_PATH.'images'.DS);
define('A_CSSPATH', A_PATH.'css'.DS);


///////////////////////////////////////////////////////////////////////////////////////
//************************************ Database Configurations *******************// //
///////////////////////////////////////////////////////////////////////////////////////
$localIP = getHostByName(getHostName());
switch($localIP) {
    case '127.0.0.1':
    default:
        define('DB_', 'db_timepass');
        define('USER_', 'root');
        define('PASS_', 'dots');
}

$dsn = 'mysql:dbname='.DB_.';host=localhost';
try {
        $pdo = new PDO($dsn, USER_, PASS_, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
        $pdo = null;
        trigger_error('Connection failed: ' . $e->getMessage());
        exit;
}
// d($pdo);
define('COOKIE_RUNTIME', 1209600); // 1209600 seconds = 2 weeks
define('COOKIE_DOMAIN', 'localhost'); // the domain where the cookie is valid for
