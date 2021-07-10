<?php 
#CLASE Y MÉTODOS
#-------------------------------------------------------------
include ('conexion.php');

class Ajax{

	#LOGEO DE USUARIOS
	#----------------------------------------------------------
	public $usuario;
	public $clave;
	public $con;

	public $id_investigacion;

	public function loginAjax(){


		$sql2 = "SELECT id, usuario, clave FROM usuarios WHERE `usuario` = '{$this->usuario}' LIMIT 1";
		$resultado = $this->con->consultaRetorno($sql2);
		$row = mysqli_fetch_assoc($resultado);


		$resp = $status = $url = "";
		$datos = array("usuario" => $this->usuario,
			           "clave" => $this->clave);
      
		if($this->usuario == $row['usuario'] && md5($this->clave) == $row['clave']){
			$resp = "Ingreso Satisfactorio";
			$status = 1;
			$url = "app/dasboard.php";
			session_start();
			$_SESSION['usuario'] = $this->usuario;
			$_SESSION['id'] = $row['id'];
			$_SESSION['clave']   = $this->clave;
			
		}
		else{
			if($this->usuario != $row['usuario']){
				$resp = "Usuario Incorrecto";
				$status = 2;
			}
			elseif(md5($this->clave) != $row['clave']){
				$resp = "Clave Inválida";
				$status = 3;
			}
		}
		//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
		header('Content-type: application/json; charset=utf-8');
			//Guardamos los datos en un array
			$datos = array(
				"msj" => (string)$resp,
				"status" => (string)$status,
				"url" => (string)$url
			);
			//Devolvemos el array pasado a JSON como objeto
			echo json_encode($datos);
	}

	public function listarInvestigacionesAjax()
	{
		$limit = $offset = $search = null;
		if(isset($_GET['limit'])){
			$limit  = $_GET['limit'];
        	$offset = $_GET['offset'];
        	$search = $_GET['search'];
		}
		

		$str = $where = "";
		//paginacion del query
		if(!is_null($offset) && !is_null($limit)){
			$str = " LIMIT $limit OFFSET $offset";
		}

		//valido el parametro de busqueda
		if(!is_null($search)){
			$where = "AND (inv.titulo like '%$search%' OR est.descripcion like '%$search%')";
		}


		$sql="SELECT inv.id,inv.fecha, inv.titulo, inv.descripcion, est.descripcion AS estado, met.siglas AS metodo, us.usuario 
			FROM investigacion AS inv, usuarios AS us, metodos AS met, estados AS est
			WHERE met.id = inv.id_metodos
			AND est.id = inv.id_estados
			AND us.id = inv.id_usuarios ".$where . $str;

		$resultado = $this->con->consultaRetorno($sql);

		$sql2="SELECT COUNT(id) AS cant
		      FROM investigacion";
		$dataCant = $this->con->consultaRetorno($sql2);
		$dataCant = mysqli_fetch_assoc($dataCant);

        $array_temp = array();
        while($row = mysqli_fetch_assoc($resultado)){
                array_push($array_temp,array ('id' => (string)$row['id'],
                                        'fecha' => (string)$row['fecha'],
                                        'titulo' => (string)$row['titulo'],
                                        'descripcion' => (string)$row['descripcion'],
                                        'estado' => (string)$row['estado'],
                                        'metodo' => (string)$row['metodo'],
                                        'usuario' => (string)$row['usuario'])
                                    );
        }
        //echo $dataCant['cant'];
        //var_dump($ids);
        //Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
		header('Content-type: application/json; charset=utf-8');
		
		$datos = array(
			"rows" => $array_temp, 
			"total" => $dataCant['cant']
		);
		
		//echo json_last_error();
        echo json_encode($datos);
	}

	public function ListarMAACPerdidasAjax($filtro)
	{
		$limit = $offset = $search = null;
		if(isset($_GET['limit'])){
			$limit  = $_GET['limit'];
        	$offset = $_GET['offset'];
        	$search = $_GET['search'];
		}
		

		$str = $where = "";
		//paginacion del query
		if(!is_null($offset) && !is_null($limit)){
			$str = " LIMIT $limit OFFSET $offset";
		}

		//valido el parametro de busqueda
		if(!is_null($search)){
			$where = "";
		}


		$sql="SELECT * 
			FROM macc_perdidas 
			WHERE tipo = '$filtro' AND id_investigacion = '$this->id_investigacion' ";
		$resultado = $this->con->consultaRetorno($sql);

		$sql2="SELECT COUNT(id) AS cant
		      FROM macc_perdidas 
		      WHERE tipo = '$filtro' AND id_investigacion = '$this->id_investigacion' ";
		$dataCant = $this->con->consultaRetorno($sql2);
		$dataCant = mysqli_fetch_assoc($dataCant);

        $array_temp = array();
        while($row = mysqli_fetch_assoc($resultado)){
                array_push($array_temp,array ('id' => (string)$row['id'],
                                        'tipo' => (string)$row['tipo'],
                                        'descripcion' => (string)$row['descripcion'],
                                        'contactos' => (string)$row['contactos'],
                                        'actos' => (string)$row['actos'],
                                        'condiciones' => (string)$row['condiciones'])
                                    );
        }
        //echo $dataCant['cant'];
        //var_dump($ids);
        //Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
		header('Content-type: application/json; charset=utf-8');
		
		$datos = array(
			"rows" => $array_temp, 
			"total" => $dataCant['cant']
		);
		
		//echo json_last_error();
        echo json_encode($datos);
	}
}

$accion = $_REQUEST["accion"]; //POST OR GET
if($accion == "login"){
	$b = new Ajax();
	$b -> usuario   = trim($_POST["usuario"]);
	$b -> clave     = trim($_POST["clave"]);
	$b -> con = new Conexion();
	$b -> loginAjax();
}

if($accion == "listar_investigacion"){
    $b = new Ajax();
	$b -> con = new Conexion();
	$b -> listarInvestigacionesAjax();
}
if($accion == "listar_perdidas_personas"){
    $b = new Ajax();
    $b -> id_investigacion = trim($_REQUEST["id"]);
	$b -> con = new Conexion();
	$b -> ListarMAACPerdidasAjax("persona");
}
if($accion == "listar_perdidas_propiedad"){
    $b = new Ajax();
    $b -> id_investigacion = trim($_REQUEST["id"]);
	$b -> con = new Conexion();
	$b -> ListarMAACPerdidasAjax("propiedad");
}
if($accion == "listar_perdidas_proceso"){
    $b = new Ajax();
    $b -> id_investigacion = trim($_REQUEST["id"]);
	$b -> con = new Conexion();
	$b -> ListarMAACPerdidasAjax("proceso");
}
if($accion == "listar_perdidas_ambiente"){
    $b = new Ajax();
    $b -> id_investigacion = trim($_REQUEST["id"]);
	$b -> con = new Conexion();
	$b -> ListarMAACPerdidasAjax("ambiente");
}
?>