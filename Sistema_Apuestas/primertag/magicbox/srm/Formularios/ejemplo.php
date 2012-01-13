<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

// Replace the path with where you installed log4php
require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');
// Start logging//
/* $log->trace("Mensajee"); 
// Not logged because TRACE < WARN
$log->debug("My sjeje");
// Not logged because DEBUG < WARN
$log->info("jejej"); 
// Not logged because INFO < WARN
$log->warn("jejej"); 
// Logged because WARN >= WARN
$log->error("jjaja"); 
// Logged because ERROR >= WARN
$log->fatal("papap");  */
// Logged because FATAL >= WARN



//define the following in your application
/*define('LOG4PHP_DIR', 'log4php'); // the name of the log4php directory
//The log4php-<version>/src/log4php directory is the directory the above variable should point to.
define('LOG4PHP_CONFIGURATION','log_configuration.xml');
//echo LOG4PHP_DIR;
require_once(LOG4PHP_DIR."/LoggerManager.php");


// You can create new logger managers for each script/function you call so you can determine where the logging is
//occuring. I suggest naming it the same as the script that it is in.
$logger = & LoggerManager::getLogger('ejemploooo.txt');
$logger->debug('place a debugging log statement here');
$logger->info('place a info log statement here');
$logger->warn('place a warning log statement here');
$logger->error('place a error log statement here');
$logger->fatal('place a fatal log statement here');
LoggerManager::shutdown();
?>


<?php 

require_once ('log4php/Logger.php');
 
 class MyApp {
   private $logger;

   public function __construct() {
        $this->logger = Logger::getLogger('MyApp');
        $this->logger->debug('Hello!');
   }
   
   public function doSomething() {
         $this->logger->info("Entering application.");
     $bar = new Bar();
     $bar->doIt();
     $this->logger->info("Exiting application.");
   }
 }
 
 //echo "hola";
*/
?>

</body>
</html>