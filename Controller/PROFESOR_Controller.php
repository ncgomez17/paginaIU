
<?php
//Script : PROFESORES_Controller
//Creado el : 03-10-2019
//Creado por: ncgomez17
//Nos permitirá enviar los datos recogidos en las vistas de profesor y enviarlos al modelo
//---

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';
	//comprobamos si el usuario esta identificado
	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	//incluimos todas las vistas y modelos
	include '../Model/PROFESOR_Model.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';
	include '../View/PROF_TITULACION_SHOWALL_View.php';
	include '../View/PROFESOR_SHOWALL_View.php';
	include '../View/PROFESOR_SEARCH_View.php';
	include '../View/PROFESOR_ADD_View.php';
	include '../View/PROFESOR_EDIT_View.php';
	include '../View/PROFESOR_DELETE_View.php';
	include '../View/PROFESOR_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROFESOR y la devuelve
	function get_data_form(){

		$DNI = $_POST['DNI'];//valor recogido de dni del formulario
		$NOMBREPROFESOR = $_POST['NOMBREPROFESOR'];//valor recogido de nombreprofesor del formulario
		$APELLIDOSPROFESOR = $_POST['APELLIDOSPROFESOR'];//valor recogido de apellidosprofesor del formulario
		$AREAPROFESOR = $_POST['AREAPROFESOR'];//valor recogido de areaprofesor del formulario
		$DEPARTAMENTOPROFESOR = $_POST['DEPARTAMENTOPROFESOR'];//valor recogido de departamentoprofesor del formulario

		$action = $_POST['action'];//valor recogido de accion del formulario

		
		$profesores = new PROFESOR_Model($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR);//creamos un profesor con los datos recogidos
		return $profesores;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					new PROFESOR_ADD();
				}
				else{
					$PROFESOR = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROFESOR->ADD();
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','','');
					$valores = $PROFESOR->RellenaDatos();
					new PROFESOR_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROFESOR = get_data_form();
					$respuesta = $PROFESOR->DELETE();
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','',''); // Creo el objeto
					$valores = $PROFESOR->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROFESOR_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROFESOR_Controller.php');
					}
				}
				else{

					$PROFESOR = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROFESOR->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new  PROFESOR_SEARCH();
				}
				else{
					$PROFESOR = get_data_form();//recogemos los datos
					$datos = $PROFESOR->SEARCH();//realizamos la busqueda

					$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR','DEPARTAMENTOPROFESOR');//nombres de los atributos

					new PROFESOR_SHOWALL($lista, $datos);
				}
				break;
			case 'SEARCH2':
					$ESPACIO = new PROFESOR_Model($_REQUEST['DNI'],'','','','');
					$datos = $ESPACIO->SEARCH2();

					$lista = array('DNI','CODESPACIO');//lista de atributos 

					new PROF_ESPACIO_SHOWALL($lista, $datos);//mostramos los datos
				break;
			case 'SEARCH3':
					$TITULACION = new PROFESOR_Model($_REQUEST['DNI'],'','','','');
					$datos = $TITULACION->SEARCH3();

					$lista = array('DNI','CODTITULACION','ANHOACADEMICO');//lista de atributos 

					new PROF_TITULACION_SHOWALL($lista, $datos);//mostramos los datos
				break;
			case 'SHOWCURRENT':
				$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','','');
				$valores = $PROFESOR->RellenaDatos();//rellenamos la demas informacion a partir de la clave dni
				new PROFESOR_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$PROFESOR = new PROFESOR_Model('','','','','');//creamos un profesor vacio
				}
				else{
					$PROFESOR = get_data_form();//recogemos los datos
				}
				$datos = $PROFESOR->SEARCH();
				$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR','DEPARTAMENTOPROFESOR');//nombre de los atributos
				new PROFESOR_SHOWALL($lista, $datos);//mostramos todos los datos
		}

?>
