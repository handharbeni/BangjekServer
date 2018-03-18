<?php
class database{
	public $user		= "root";
	public $password	= "beni123";
	public $database	= "bangjeck";
}
$database	= new database();
$conn	= new mysqli('localhost',$database->user,$database->password,$database->database);
?>