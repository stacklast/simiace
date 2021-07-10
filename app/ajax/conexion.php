<?php  
/**
 *	@package Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com> <edwinrock1m@gmail.com>
 * 	@version 1.0
 * 	#file  : Conexion.php
 */
class Conexion
{
	//Atributos
	private $host;
	private $user;
	private $pass;
	private $bd;
	private $con;

	//Métodos
	function __construct()
	{

		//varibles de conexion Produccion
		$this->host = "localhost"; 
		$this->user = "root"; 
		$this->pass = "";  
		$this->bd   = "sek";

		$con = mysqli_connect($this->host, $this->user, $this->pass, $this->bd);
		// Pruebas
		//$con=mysqli_connect("localhost","traveler_usrprue","nSZa20T~alg!","traveler_dbprueba");

		ini_set('memory_limit', '-1');
		// Change character set to utf8
		mysqli_set_charset($con,"utf8");
		// Check connection
		if (mysqli_connect_errno()){
  			die(mysqli_error());
  		}
	}

	public function consultaSimple($sql)
	{
		//varibles de conexion Produccion
		$this->host = "localhost"; 
		$this->user = "root"; 
		$this->pass = "";  
		$this->bd   = "sek";

		$con = mysqli_connect($this->host, $this->user, $this->pass, $this->bd);
		ini_set('memory_limit', '-1');
		// Change character set to utf8
		mysqli_set_charset($con,"utf8");
		// Pruebas
		//$con=mysqli_connect("localhost","traveler_usrprue","nSZa20T~alg!","traveler_dbprueba");

		mysqli_query($con, $sql) or die(mysqli_error());
	}


	public function consultaRetorno($sql)
	{

		//varibles de conexion Produccion
		$this->host = "localhost"; 
		$this->user = "root"; 
		$this->pass = "";  
		$this->bd   = "sek";

		$con = mysqli_connect($this->host, $this->user, $this->pass, $this->bd);
		ini_set('memory_limit', '-1');
		// Change character set to utf8
		mysqli_set_charset($con,"utf8");
		// Pruebas
		//$con=mysqli_connect("localhost","traveler_usrprue","nSZa20T~alg!","traveler_dbprueba");

		$consulta = mysqli_query($con, $sql) or die(mysqli_error());;
            
		return $consulta;
	}
}

?>