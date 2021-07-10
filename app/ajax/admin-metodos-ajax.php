<?php 
#CLASE Y MÉTODOS
#-------------------------------------------------------------
include ('conexion.php');
/**
 * 
 */
class MetodosAjax
{
	//InsertarInvestigacionAjax
	public $metodo;
	public $titulo;
	public $descripcion;
	public $con;

	//InsertarPerdidaMAAC
	public $perdidatipo;
	public $descripcionperdida;
	public $contactos;
	public $acto;
	public $condicion;
	public $id_investigacion;

	//Insertar MAAC
	public $falta_control;
	public $factor_trabajo;
	public $factor_personal;

	//Insertar MSRAC

	public $que;
    public $quien;
    public $donde;
    public $cuando;
    public $como;
    public $porque;
    public $accidente;
    public $causa;
    public $causa1;
    public $causa2;
    public $causa3;
    public $causareal;

	public function InsertarInvestigacionAjax()
	{
		$resp = $status = $url = "";
		$sql = "INSERT INTO investigacion (titulo, descripcion, id_estados, id_metodos, id_usuarios) 
		VALUES ('$this->titulo','$this->descripcion',1,$this->metodo,$this->id_usuarios)";

		try {
			$this->con->consultaSimple($sql);
			$resp = "Ingreso de Registro Correcto";
			$status = 1;
			$url = "app/metodo".$this->metodo.".php";
		} catch (Exception $e) {
			$resp = "Error: Al ingresar los datos ";
			$status = 0;
		}
		//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
		header('Content-type: application/json; charset=utf-8');
			//Guardamos los datos en un array
			$datos = array(
				"msj" => (string)$resp,
				"status" => (string)$status,
				"url" => $url
			);
			//Devolvemos el array pasado a JSON como objeto
			echo json_encode($datos);
	}
	public function InsertarPerdidaMAAC()
	{
		$resp = $status = $url = "";
		$sql = "INSERT INTO macc_perdidas(tipo, descripcion, contactos, actos, condiciones, id_investigacion) 
		VALUES ('$this->perdidatipo','$this->descripcionperdida','$this->contactos','$this->acto', '$this->condicion', '$this->id_investigacion')";

		try {
			$this->con->consultaSimple($sql);
			$resp = "Ingreso de Registro Correcto";
			$status = 1;
			$url = "app/metodo".$this->metodo.".php";
		} catch (Exception $e) {
			$resp = "Error: Al ingresar los datos ";
			$status = 0;
		}
		//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
		header('Content-type: application/json; charset=utf-8');
			//Guardamos los datos en un array
			$datos = array(
				"msj" => (string)$resp,
				"status" => (string)$status,
				"url" => $url
			);
			//Devolvemos el array pasado a JSON como objeto
			echo json_encode($datos);
	}
	public function InsertarMAAC()
	{
		$resp = $status = $url = "";
		$sql = "INSERT INTO maac(factor_personal, factor_trabajo, falta_control, id_investigacion) 
		VALUES ('$this->factor_personal','$this->factor_trabajo','$this->falta_control','$this->id_investigacion')";

		try {
			$this->con->consultaSimple($sql);
			$resp = "Ingreso de Registro Correcto";
			$status = 1;
			$url = "app/metodo".$this->metodo.".php";
		} catch (Exception $e) {
			$resp = "Error: Al ingresar los datos ";
			$status = 0;
		}
		//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
		header('Content-type: application/json; charset=utf-8');
			//Guardamos los datos en un array
			$datos = array(
				"msj" => (string)$resp,
				"status" => (string)$status,
				"url" => $url
			);
			//Devolvemos el array pasado a JSON como objeto
			echo json_encode($datos);
	}
}

$accion = $_REQUEST["accion"]; //POST OR GET
if($accion == "InsertarInvestigacion"){
	$b = new MetodosAjax();
	$b -> metodo   		= trim($_POST["metodo"]);
	$b -> titulo     	= trim($_POST["titulo"]);
	$b -> descripcion   = trim($_POST["descripcion"]);
	session_start();
	$b -> id_usuarios   = $_SESSION['id'];
	$b -> con = new Conexion();
	$b -> InsertarInvestigacionAjax();
}
if($accion == "InsertarPerdidaMAAC"){
	$b = new MetodosAjax();
	$b -> perdidatipo   = trim($_POST["perdidatipo"]);
	$b -> descripcionperdida     = trim($_POST["descripcionperdida"]);
	$b -> contactos     = trim($_POST["contactos"]);
	$b -> acto     = trim($_POST["acto"]);
	$b -> condicion     = trim($_POST["condicion"]);
	$b -> id_investigacion     = trim($_POST["id_investigacion"]);
	$b -> con = new Conexion();
	$b -> InsertarPerdidaMAAC();
}

if($accion == "InsertarMAAC"){
	$b = new MetodosAjax();
	$b -> falta_control   = trim($_POST["falta_control"]);
	$b -> factor_trabajo     = trim($_POST["factor_trabajo"]);
	$b -> factor_personal     = trim($_POST["factor_personal"]);
	$b -> id_investigacion     = trim($_POST["id_investigacion"]);
	$b -> con = new Conexion();
	$b -> InsertarMAAC();
}

if($accion == "InsertarMSCRA"){
	$b = new MetodosAjax();
	$b -> que   = trim($_POST["que"]);
	$b -> quien     = trim($_POST["quien"]);
	$b -> donde     = trim($_POST["donde"]);
	$b -> cuando     = trim($_POST["cuando"]);
	$b -> como     = trim($_POST["como"]);
	$b -> porque     = trim($_POST["porque"]);
	$b -> accidente     = trim($_POST["accidente"]);
	$b -> causa     = trim($_POST["causa"]);
	$b -> causa1     = trim($_POST["causa1"]);
	$b -> causa2     = trim($_POST["causa2"]);
	$b -> causa3     = trim($_POST["causa3"]);
	$b -> causareal     = trim($_POST["causareal"]);
	$b -> causa2     = trim($_POST["causa2"]);
	$b -> con = new Conexion();
	$b -> InsertarMAAC();
}
?>