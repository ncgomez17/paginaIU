
<?php
//Script : Titulación_Controller
//Creado el : 07-10-2019
//Creado por: ncgomez17
//Nos permitirá enviar los datos recogidos en las vistas de titulacion y enviarlos al modelo
//---

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';
	//comprobamos si el usuario esta autenticado
	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	//incluimos las vistas y los modelos
	include '../Model/CENTRO_Model.php';
	include '../Model/TITULACIÓN_Model.php';
	include '../View/TITULACIÓN_SHOWALL_View.php';
	include '../View/PROF_TITULACION_SHOWALL_View.php';
	include '../View/TITULACIÓN_SEARCH_View.php';
	include '../View/TITULACIÓN_ADD_View.php';
	include '../View/TITULACIÓN_EDIT_View.php';
	include '../View/TITULACIÓN_DELETE_View.php';
	include '../View/TITULACIÓN_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve
	function get_data_form(){

		$codTitulacion=$_REQUEST['CODTITULACION'];//valor recogido de codtitulacion del formulario
		$codCentro=$_REQUEST['CODCENTRO'];//valor recogido de codcentro del formulario
		$nombreTitulacion=$_REQUEST['NOMBRETITULACION'];//valor recogido de nombretitulacion del formulario
		$responsableTitulacion=$_REQUEST['RESPONSABLETITULACION'];//valor recogido de responsabletitulacion del formulario   

		$action = $_POST['action'];

		
		$titulacion = new TITULACIÓN_Model($codTitulacion,$codCentro,$nombreTitulacion,$responsableTitulacion);//creamos una titulacion con los datos recogidos
		return $titulacion;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					$centro= new CENTRO_Model('','','','','');//creamos un centro vacio
					$tupla= $centro->SEARCH();//recogemos las tuplas de centros
					new TITULACIÓN_ADD($tupla);
				}
				else{
					$TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $TITULACION->ADD();
					new MESSAGE($respuesta, '../Controller/TITULACIÓN_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$TITULACION = new TITULACIÓN_Model($_REQUEST['CODTITULACION'],'','','');
					$valores = $TITULACION->RellenaDatos();
					new TITULACIÓN_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$TITULACION = get_data_form();
					$respuesta = $TITULACION->DELETE();
					new MESSAGE($respuesta, '../Controller/TITULACIÓN_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$TITULACION = new TITULACIÓN_Model($_REQUEST['CODTITULACION'],'','',''); // Creo el objeto
					$valores = $TITULACION->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						$centro= new CENTRO_Model('','','','','');//creamos un centro vacio
						$tupla= $centro->SEARCH();
						new TITULACIÓN_EDIT($valores,$tupla); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/TITULACIÓN_Controller.php');
					}
				}
				else{

					$TITULACION = get_data_form(); //recojo los valores del formulario

					$respuesta = $TITULACION->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/TITULACIÓN_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new TITULACIÓN_SEARCH();//invocamos a la vista search
				}
				else{
					$TITULACION = get_data_form();//recogemos los datos
					$datos = $TITULACION->SEARCH();//realizamos la busqueda

					$lista = array('CODTITULACION','CODCENTRO','NOMBRETITULACION','RESPONSABLETITULACION');//nombre de los atributos

					new TITULACIÓN_SHOWALL($lista, $datos);//mostramos lo datos que coinciden con los datos introducidos
				}
				break;
				case 'SEARCH2':
					$PROFESOR = new TITULACIÓN_Model($_REQUEST['CODTITULACION'],'','','');
					$datos = $PROFESOR->SEARCH2();

					$lista = array('DNI','CODTITULACION','ANHOACADEMICO');//lista de atributos 

					new PROF_TITULACION_SHOWALL($lista, $datos);//mostramos los datos
				break;
			case 'SHOWCURRENT':
				$TITULACION = new TITULACIÓN_Model($_REQUEST['CODTITULACION'],'','','');
				$valores = $TITULACION->RellenaDatos();//rellenamos los demas atributos a partir de la clave
				new TITULACIÓN_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$TITULACION = new TITULACIÓN_Model('','','','');
				}
				else{
					$TITULACION = get_data_form();//recogemos los datos
				}
				$datos = $TITULACION->SEARCH();
				$lista = array('CODTITULACION','CODCENTRO','NOMBRETITULACION','RESPONSABLETITULACION');//nombre de los atributos
				new TITULACIÓN_SHOWALL($lista, $datos);//mostramos los datos
		}

?>
