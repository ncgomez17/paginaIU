
<?php
//Script : EDIFICIO_Controller
//Creado el : 06-10-2019
//Creado por: ncgomez17
//Nos permitirá enviar los datos recogidos en las vistas de edificio y enviarlos al modelo
//---

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';
	//comprobamos si el usuario esta autenticado
	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
 	//incluimos las distintas vistas y modelos
	include '../Model/EDIFICIO_Model.php';
	include '../View/EDIFICIO_SHOWALL_View.php';
	include '../View/ESPACIO_SHOWALL_View.php';
	include '../View/CENTRO_SHOWALL_View.php';
	include '../View/EDIFICIO_SEARCH_View.php';
	include '../View/EDIFICIO_ADD_View.php';
	include '../View/EDIFICIO_EDIT_View.php';
	include '../View/EDIFICIO_DELETE_View.php';
	include '../View/EDIFICIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia EDIFICIO y la devuelve
	function get_data_form(){

		$codEdificio = $_POST['CODEDIFICIO'];//valor recogido de codedificio del formulario
		$nombreEdificio = $_POST['NOMBREEDIFICIO'];//valor recogido de nombreEdificio del formulario
		$direccionEdificio = $_POST['DIRECCIONEDIFICIO'];//valor recogido de DireccionEdificio del formulario
		$campusEdificio = $_POST['CAMPUSEDIFICIO'];//valor recogido de campusEdificio del formulario

		$action = $_POST['action'];//valor recogido de la accion del formulario

		
		$edificio = new EDIFICIO_Model($codEdificio,$nombreEdificio,$direccionEdificio,$campusEdificio);//creamos un edificio con los datos recogidos
		return $edificio;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					new EDIFICIO_ADD();
				}
				else{
					$EDIFICIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $EDIFICIO->ADD();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','','');
					$valores = $EDIFICIO->RellenaDatos();//rellenamos los datos a partir de la clave
					new EDIFICIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$EDIFICIO = get_data_form();
					$respuesta = $EDIFICIO->DELETE();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','',''); // Creo el objeto
					$valores = $EDIFICIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new EDIFICIO_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/EDIFICIO_Controller.php');
					}
				}
				else{

					$EDIFICIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $EDIFICIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new EDIFICIO_SEARCH();//invocamos la vista de search
				}
				else{
					$EDIFICIO = get_data_form();//recogemos los datos
					$datos = $EDIFICIO->SEARCH();

					$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO','CAMPUSEDIFICIO');//lista de atributos 

					new EDIFICIO_SHOWALL($lista, $datos);//mostramos los datos
				}
				break;
			case 'SEARCH2':
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','','');
					$datos = $EDIFICIO->SEARCH2();

					$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO','DIRECCIONCENTRO','RESPONSABLECENTRO');//lista de atributos 

					new CENTRO_SHOWALL($lista, $datos);//mostramos los datos
				break;
			case 'SEARCH3':
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','','');
					$datos = $EDIFICIO->SEARCH3();

					$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');//lista de atributos 

					new CENTRO_SHOWALL($lista, $datos);//mostramos los datos
				break;

			case 'SHOWCURRENT':
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','','');//creamos un edificio a partir de su clave
				$valores = $EDIFICIO->RellenaDatos();//rellenamos los datos
				new EDIFICIO_SHOWCURRENT($valores);//mostramos los datos de la tupla
				break;
			default:
				if (!$_POST){
					$EDIFICIO = new EDIFICIO_Model('','','','');//creamos un edificio vacio
				}
				else{
					$EDIFICIO = get_data_form();//recogemos los datos
				}
				$datos = $EDIFICIO->SEARCH();
				$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO','CAMPUSEDIFICIO');//lista de atributos
				new EDIFICIO_SHOWALL($lista, $datos);//mostramos todos los datos
		}

?>