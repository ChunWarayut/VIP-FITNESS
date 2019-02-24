<?php
$server="localhost";
$dbname="vip_fitness";
$username="root";
$password="";
$con = mysqli_connect($server,$username,$password,$dbname);
$res = mysqli_query($con,"SET NAMES UTF8");
abstract class BaseModel{
    public static $db;
	protected $host="localhost";
    
    protected $username="root";
	protected $password="";
	protected $db_name="vip_fitness";

	function __construct(){
        static::$db = mysqli_connect($host, $username, $password, $db_name);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
}
?>