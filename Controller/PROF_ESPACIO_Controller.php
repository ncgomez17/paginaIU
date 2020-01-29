
<?php
//Script : PROF_ESPACIO__Controller
//Creado el : 08-10-2019
//Creado por: ncgomez17
//Nos permitirá enviar los datos recogidos en las vistas de prof_espacio y enviarlos al modelo
//---

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';
	//comprobamos si el usuario esta identificado
	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	//incluimos las distintas vistas y modelos
	include '../Model/PROFESOR_Model.php';
    include '../Model/ESPACIO_Model.php';
	include '../Model/PROF_ESPACIO_Model.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';
	include '../View/PROF_ESPACIO_SEARCH_View.php';
	include '../View/PROF_ESPACIO_ADD_View.php';
	include '../View/PROF_ESPACIO_EDIT_View.php';
	include '../View/PROF_ESPACIO_DELETE_View.php';
	include '../View/PROF_ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROF_ESPACIO y la devuelve
	function get_data_form(){

		$DNI = $_POST['DNI'];//valor recogido de dni del formulario
		$CODESPACIO = $_POST['CODESPACIO'];//valor recogido de codespacio del formulario

		$action = $_POST['action'];//valor recogido de accion del formulario

		
		$profesores = new PROF_ESPACIO_Model($DNI,$CODESPACIO);//creamos PROF_ESPACIO a partir de los datos recogidos
		return $profesores;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de prof_espacio
					$espacio=new ESPACIO_MODEL('','','','','','');//creamos el espacio vacio
					$tupla=$espacio->SEARCH();//recogemos todos los espacios
					$profesor=new PROFESOR_MODEL('','','','','');//creamos profesor vacio
					$tupla2=$profesor->SEARCH();//recogemos todos los profesores
					new PROF_ESPACIO_ADD($tupla2,$tupla);
				}
				else{
					$PROFESOR_ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROFESOR_ESPACIO->ADD();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROFESOR_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']);
					$valores = $PROFESOR_ESPACIO->RellenaDatos();
					new PROF_ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROFESOR_ESPACIO = get_data_form();
					$respuesta = $PROFESOR_ESPACIO->DELETE();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROFESOR_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']); // Creo el objeto
					$valores = $PROFESOR_ESPACIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
					
						new PROF_ESPACIO_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROF_ESPACIO_Controller.php');
					}
				}
				else{

					$PROFESOR_ESPACIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROFESOR_ESPACIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					$espacio=new ESPACIO_MODEL('','','','','','');//creamos el espacio vacio
					$tupla=$espacio->SEARCH();//recogemos todos los espacios
					$profesor=new PROFESOR_MODEL('','','','','');//creamos profesor vacio
					$tupla2=$profesor->SEARCH();//recogemos todos los profesores
					new  PROF_ESPACIO_SEARCH($tupla2,$tupla);//invocamos la vista de search
				}
				else{
					$PROFESOR_ESPACIO = get_data_form();//recogemos los datos
					$datos = $PROFESOR_ESPACIO->SEARCH();//buscamos en la bd

					$lista = array('DNI','CODESPACIO');//nombre de los atributos

					new PROF_ESPACIO_SHOWALL($lista, $datos);//mostramos toda la informacion
				}
				break;
			case 'SHOWCURRENT':
				$PROFESOR_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']);//creamos una entidad profesor espacio con los datos recogidos
				$valores = $PROFESOR_ESPACIO->RellenaDatos();//rellenamos los datos a partir de las claves
				new PROF_ESPACIO_SHOWCURRENT($valores);//mostramos la vista showcurrent con los valores pasados
				break;
			default:
				if (!$_POST){
					$PROFESOR_ESPACIO = new PROF_ESPACIO_Model('','');//creamos un prof_espacio vacio
				}
				else{
					$PROFESOR_ESPACIO = get_data_form();//recogemos los datos
				}
				$datos = $PROFESOR_ESPACIO->SEARCH();//realizamos la búsqueda
				$lista = array('DNI','CODESPACIO');//nombres de los atributos
				new PROF_ESPACIO_SHOWALL($lista, $datos);//mostramos toda la informacion
		}

?>
