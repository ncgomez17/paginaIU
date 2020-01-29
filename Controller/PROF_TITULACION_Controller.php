
<?php
//Script : PROF_TITULACION__Controller
//Creado el : 08-10-2019
//Creado por: ncgomez17
//Nos permitirá enviar los datos recogidos en las vistas de prof_titulacion y enviarlos al modelo
//---

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';
	//comprobamos si el usuario esta identificado
	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	//incluimos las distintas vistas y modelos
	include '../Model/PROFESOR_Model.php';
    include '../Model/TITULACIÓN_Model.php';
	include '../Model/PROF_TITULACION_Model.php';
	include '../View/PROF_TITULACION_SHOWALL_View.php';
	include '../View/PROF_TITULACION_SEARCH_View.php';
	include '../View/PROF_TITULACION_ADD_View.php';
	include '../View/PROF_TITULACION_EDIT_View.php';
	include '../View/PROF_TITULACION_DELETE_View.php';
	include '../View/PROF_TITULACION_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROF_TITULACION y la devuelve
	function get_data_form(){

		$DNI = $_POST['DNI'];//valor recogido de dni del formulario
		$CODTITULACION = $_POST['CODTITULACION'];//valor recogido de codtitulacion del formulario
		$ANHOACADEMICO = $_POST['ANHOACADEMICO'];//valor recogido de anhoacademico del formulario

		$action = $_POST['action'];//valor recogido de accion del formulario

		
		$profesores = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO);//creamos un prof_titulacion a partir de los datos recogidos
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
					$titulacion=new TITULACIÓN_MODEL('','','','');//creamos la titulacion vacio
					$tupla=$titulacion->SEARCH();//recogemos todas las titulaciones
					$profesor=new PROFESOR_MODEL('','','','','');//creamos profesor vacio
					$tupla2=$profesor->SEARCH();//recogemos todos los profesores
					new PROF_TITULACION_ADD($tupla2,$tupla);
				}
				else{
					$PROFESOR_TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROFESOR_TITULACION->ADD();
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROFESOR_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],'');
					$valores = $PROFESOR_TITULACION->RellenaDatos();
					new PROF_TITULACION_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROFESOR_TITULACION = get_data_form();
					$respuesta = $PROFESOR_TITULACION->DELETE();
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROFESOR_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],''); // Creo el objeto
					$valores = $PROFESOR_TITULACION->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
					
						new PROF_TITULACION_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROF_TITULACION_Controller.php');
					}
				}
				else{

					$PROFESOR_TITULACION = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROFESOR_TITULACION->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					$titulacion=new TITULACIÓN_MODEL('','','','');//creamos la titulacion vacio
					$tupla=$titulacion->SEARCH();//recogemos todas las titulaciones
					$profesor=new PROFESOR_MODEL('','','','','');//creamos profesor vacio
					$tupla2=$profesor->SEARCH();//recogemos todos los profesores
					new  PROF_TITULACION_SEARCH($tupla2,$tupla);//invocamos a la vista de search
				}
				else{
					$PROFESOR_TITULACION = get_data_form();//recogemos los datos
					$datos = $PROFESOR_TITULACION->SEARCH();//realizamos la busqueda en la bd

					$lista = array('DNI','CODTITULACION','ANHOACADEMICO');//nombres de los atributos

					new PROF_TITULACION_SHOWALL($lista, $datos);
				}
				break;
			case 'SHOWCURRENT':
				$PROFESOR_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],'');
				$valores = $PROFESOR_TITULACION->RellenaDatos();//rellenamos los demas datos a partir de las claves
				new PROF_TITULACION_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$PROFESOR_TITULACION = new PROF_TITULACION_Model('','','');
				}
				else{
					$PROFESOR_TITULACION = get_data_form();//recogemos los datos
				}
				$datos = $PROFESOR_TITULACION->SEARCH();
				$lista = array('DNI','CODTITULACION','ANHOACADEMICO');//nombres de los datos
				new PROF_TITULACION_SHOWALL($lista, $datos);//mostramos todos los datos
		}

?>
