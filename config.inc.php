<?php
/**
 * THIS IS THE CONFIG FILE
 * @copyright  Dotsquares Technologies , Dec 10,2014
 * @package  strictly with PHP 5.3 +
 * @author Keshav Mohta
 * @access  private
 * @category  configuration file
 * @deprecated < PHP 5.3
 * @example  This if first file of project  and resides on project folder
 * http://php.net/manual/en/function.php-uname.php
 *
 */
ob_start();
session_start();
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
}
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 1);
ini_set('session.cache_limiter', 'private');
ini_set('log_errors', true);
// add a file `error_log` parallel to this file location
ini_set('error_log', dirname(__FILE__).'/error_log');
date_default_timezone_set('Aisa/kolkata');

$includePath = dirname(__FILE__);
set_include_path(get_include_path() . PATH_SEPARATOR . $includePath);

$dbug_lib = realpath('../kint/Kint.class.php');
include_once $dbug_lib;
require_once ('constant.inc.php');

// var_dump(get_include_path());
//******************************* Meta tags *******************************************
global $_meta;
$_meta['_title'] = "Website meta title";
$_meta['_keywords']  = "website, dotsquares, meta, keywords";
$_meta['_description']  = "This is the website developed by dotsquares ";

//********************************* include Necessray files ****************************//
// require_once(INCLUDE_DIR."/functions.inc.php");
spl_autoload_extensions(".php");
// store all folder on classes folder
spl_autoload_register(function ($class) {
    if (is_readable(CLASS_DIR."$class.class.php")) {
        include_once 'classes/' . $class . '.class.php';
    }
});
/* currently using ezsql class
* @ref :https://github.com/jv2222/ezSQL
*/
//$db = new ezsqlpdo(DSN,DB_USER,DB_PASSWORD);
// $db = new ezmysql(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
// $db->query('CALL changeAuctionStatus');
?>
