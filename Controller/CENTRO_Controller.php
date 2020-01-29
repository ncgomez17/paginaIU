
<?php
//Script : Centro_Controller
//Creado el : 06-10-2019
//Creado por: ncgomez17
//Nos permitirá enviar los datos recogidos en las vistas de centro y enviarlos al modelo
//---
	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	//Comprobamos si el usuario esta autenticado
	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	//Incluimos las distintas vistas y modelos
	include '../Model/CENTRO_Model.php';
	include '../Model/EDIFICIO_Model.php';
	include '../View/CENTRO_SHOWALL_View.php';
	include '../View/ESPACIO_SHOWALL_View.php';
	include '../View/TITULACIÓN_SHOWALL_View.php';
	include '../View/CENTRO_SEARCH_View.php';
	include '../View/CENTRO_ADD_View.php';
	include '../View/CENTRO_EDIT_View.php';
	include '../View/CENTRO_DELETE_View.php';
	include '../View/CENTRO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve
	function get_data_form(){

		$codCentro = $_POST['CODCENTRO'];//recoge el codigo del centro
		$codEdificio = $_POST['CODEDIFICIO'];//recoge el codigo del edificio
		$nombreCentro = $_POST['NOMBRECENTRO'];//recoge el nombre del centro
		$direccionCentro = $_POST['DIRECCIONCENTRO'];//recoge la direccion del centro
		$responsableCentro = $_POST['RESPONSABLECENTRO'];//recoge el responsable del centro

		$action = $_POST['action'];//recoge una acccion

		
		$centro = new CENTRO_Model($codCentro,$codEdificio,$nombreCentro,$direccionCentro,$responsableCentro);//creamos un centro con los datos recogidos
		return $centro;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					$edificio=new EDIFICIO_Model('','','','');//creamos un edificio vacio
					$tupla=$edificio->SEARCH();//recogemos todas las tuplas de la tabla EDIFICIOS
					new CENTRO_ADD($tupla);//Realizamos el metodo add del centro
				}
				else{
					$CENTRO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $CENTRO->ADD();
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','','');
					$valores = $CENTRO->RellenaDatos();
					new CENTRO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$CENTRO = get_data_form();//recogemos los datos
					$respuesta = $CENTRO->DELETE();//realizamos el borrado
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','',''); // Creo el objeto
					$valores = $CENTRO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
					$edificio=new EDIFICIO_Model('','','','');//creo un edificio vacio
					$tupla=$edificio->SEARCH();//consigo todas las tuplas de la tabla EDIFICIOS
						new CENTRO_EDIT($valores,$tupla); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/CENTRO_Controller.php');
					}
				}
				else{

					$CENTRO = get_data_form(); //recojo los valores del formulario

					$respuesta = $CENTRO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					$edificio=new EDIFICIO_Model('','','','');//creo un edificio vacio
					$tupla=$edificio->SEARCH();//reccogemos todas las tuplas de EDIFICIO
					new CENTRO_SEARCH($tupla);
				}
				else{
					$CENTRO = get_data_form();//recogemos los datos
					$datos = $CENTRO->SEARCH();//realizamos la busqueda

					$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO','DIRECCIONCENTRO','RESPONSABLECENTRO');//lista de los nombres de atributos

					new CENTRO_SHOWALL($lista, $datos);//mostramos los datos
				}
				break;
			case 'SEARCH2':
					$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','','');
					$datos = $CENTRO->SEARCH2();

					$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','TIPO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');//lista de atributos 

					new ESPACIO_SHOWALL($lista, $datos);//mostramos los datos
				break;
			case 'SEARCH3':
					$TITULACION = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','','');
					$datos = $TITULACION->SEARCH3();

					$lista = array('CODTITULACION','CODCENTRO','NOMBRETITULACION','RESPONSABLETITULACION');//lista de atributos 

					new TITULACIÓN_SHOWALL($lista, $datos);//mostramos los datos
				break;
			case 'SHOWCURRENT':
				$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','','');//creamos un centro pasandole la clave
				$valores = $CENTRO->RellenaDatos();//rellena los datos con los demas atributos
				new CENTRO_SHOWCURRENT($valores);//muestra la informacion
				break;
			default:
				if (!$_POST){
					$CENTRO = new CENTRO_Model('','','','','');//creamos un centro vacio
				}
				else{
					$CENTRO = get_data_form();//recogemos los datos
				}
				$datos = $CENTRO->SEARCH();//tuplas de centro
				$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO','DIRECCIONCENTRO','RESPONSABLECENTRO');//lista de atributos de la tabla
				new CENTRO_SHOWALL($lista, $datos);//mostramos todos los datos
		}

?>