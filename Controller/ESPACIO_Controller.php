
<?php
//Script : Espacio_Controller
//Creado el : 08-10-2019
//Creado por: ncgomez17
//Nos permitirá enviar los datos recogidos en las vistas de espacio y enviarlos al modelo
//---
	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';
	//comprobamos si el usuario esta autenticado
	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	//incluimos modelos y vistas
	include '../Model/CENTRO_Model.php';
    include '../Model/ESPACIO_Model.php';
	include '../Model/EDIFICIO_Model.php';
	include '../View/ESPACIO_SHOWALL_View.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';
	include '../View/ESPACIO_SEARCH_View.php';
	include '../View/ESPACIO_ADD_View.php';
	include '../View/ESPACIO_EDIT_View.php';
	include '../View/ESPACIO_DELETE_View.php';
	include '../View/ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia ESPACIO y la devuelve


	function get_data_form(){

		$codEspacio = $_POST['CODESPACIO'];//valor recogido de codespacio del formulario
		$codEdificio = $_POST['CODEDIFICIO'];//valor recogido de codedificio del formulario
		$codCentro = $_POST['CODCENTRO'];//valor recogido de codcentro del formulario
		$tipo = $_POST['TIPO'];//valor recogido de tipo del formulario
		$superficieEspacio = $_POST['SUPERFICIEESPACIO'];//valor recogido de superficieEspacio del formulario
		$numInventarioEspacio = $_POST['NUMINVENTARIOESPACIO'];//valor recogido de numInventarioEspacio del formulario

		$action = $_POST['action'];//valor recogido de accion del formulario

		
		$espacio = new ESPACIO_Model($codEspacio,$codEdificio,$codCentro,$tipo,$superficieEspacio,$numInventarioEspacio);//creamos el edificio a partir de los datos recogidos
		return $espacio;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					
					$edificio=new EDIFICIO_MODEL('','','','');//creamos el edificio vacio
					$tupla=$edificio->SEARCH();//recogemos todos los edificios
					$centro=new CENTRO_MODEL('','','','','');//creamos centro vacio
					$tupla2=$centro->SEARCH();//recogemos todos los centros

					new ESPACIO_ADD($tupla,$tupla2);//vista de add
				}
				else{
					$ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $ESPACIO->ADD();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','','');
					$valores = $ESPACIO->RellenaDatos();
					new ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$ESPACIO = get_data_form();
					$respuesta = $ESPACIO->DELETE();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','',''); // Creo el objeto
					$valores = $ESPACIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						$edificio=new EDIFICIO_MODEL('','','','');//creamos un edificio vacio
						$tupla=$edificio->SEARCH();//cogemos todos los edificios
						$centro=new CENTRO_MODEL('','','','','');//creamos un centro vacio
						$tupla2=$centro->SEARCH();//recogemos todos los centros
						new ESPACIO_EDIT($valores,$tupla,$tupla2); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/ESPACIO_Controller.php');
					}
				}
				else{

					$ESPACIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $ESPACIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					$edificio=new EDIFICIO_MODEL('','','','');//creamos el edificio vacio
					$tupla=$edificio->SEARCH();//recogemos todos los edificios
					$centro=new CENTRO_MODEL('','','','','');//creamos centro vacio
					$tupla2=$centro->SEARCH();//recogemos todos los centros
					new ESPACIO_SEARCH($tupla,$tupla2);
				}
				else{

					$ESPACIO = get_data_form();
					$datos = $ESPACIO->SEARCH();

					$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','TIPO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');//lista de atributos

					new ESPACIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
				case 'SEARCH2':
					$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','','');
					$datos = $ESPACIO->SEARCH2();

					$lista = array('DNI','CODESPACIO');//lista de atributos 

					new PROF_ESPACIO_SHOWALL($lista, $datos);//mostramos los datos
				break;
			case 'SHOWCURRENT':
				$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','','');//espacio con su clave
				$valores = $ESPACIO->RellenaDatos();//rellenamos los demas datos a partir del anterior
				new ESPACIO_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$ESPACIO = new ESPACIO_Model('','','','','','');//espacio vacio
				}
				else{
					$ESPACIO = get_data_form();
				}
				$datos = $ESPACIO->SEARCH();
				$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','TIPO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');//lista de atributos
				new ESPACIO_SHOWALL($lista, $datos);//mostramos todos los datos
		}

?>