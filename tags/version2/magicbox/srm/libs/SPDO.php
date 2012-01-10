<?php
class SPDO extends PDO 
{
	private static $instance = null;

	public function __construct() 
	{
		$config = Config::singleton();
		try
		{
		
			$db = "oci://" . $config->get('dbhost') . "/".$config->get('dbname') ;
			parent::__construct($db,$config->get('dbuser'),$config->get('dbpass'));
		}
		catch (PDOException $e) 
		{
    		echo "Fallo la conexion a la base de datos: " . $e->getMessage() . "\n";
    		//exit;
  		}
	}

	public static function singleton() 
	{
		if( self::$instance == null ) 
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
}
?>