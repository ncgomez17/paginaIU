
<?php
//Script : Usuarios_Controller
//Creado el : 06-10-2019
//Creado por: ncgomez17
//Nos permitirá enviar los datos recogidos en las vistas de usuarios y enviarlos al modelo
//---

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';
	//comprobamos si el usuario esta autenticado
	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	
	//incluimos los modelos y las vistas
	include '../Model/USUARIOS_Model.php';
	include '../View/USUARIOS_SHOWALL_View.php';
	include '../View/USUARIOS_SEARCH_View.php';
	include '../View/USUARIOS_ADD_View.php';
	include '../View/USUARIOS_EDIT_View.php';
	include '../View/USUARIOS_DELETE_View.php';
	include '../View/USUARIOS_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve
	function get_data_form(){
		include '../Functions/Upload.php';
		$login = $_POST['login'];//valor recogido de login del formulario
		$password = $_POST['password'];//valor recogido de password del formulario
		$nombre = $_POST['nombre'];//valor recogido de nombre del formulario
		$apellidos = $_POST['apellidos'];//valor recogido de apellidos del formulario
		$telefono = $_POST['telefono'];//valor recogido de telefono del formulario
		$DNI = $_POST['DNI'];//valor recogido de DNI del formulario
		$Imagen=isUpload();
		$fotopersonal = $Imagen["ruta_imagen"];//ruta recogida de fotopersonal del formulario
		$FechaNacimiento = $_POST['FechaNacimiento'];//valor recogido de FechaNacimiento del formulario
		$sexo = $_POST['sexo'];//valor recogido de sexo del formulario
		$email = $_POST['email'];//valor recogido de email del formulario

		$action = $_POST['action'];//valor recogido de action del formulario

		
		$usuarios = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);//creamos un usuario con los datos recogidos
		return $usuarios;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					new USUARIOS_ADD();
				}
				else{
					$USUARIOS = get_data_form(); //se recogen los datos del formulario
					$respuesta = $USUARIOS->ADD();
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','','');
					$valores = $USUARIOS->RellenaDatos();
					new USUARIOS_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$USUARIOS = get_data_form();
					$respuesta = $USUARIOS->DELETE();
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); // Creo el objeto
					$valores = $USUARIOS->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new USUARIOS_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/USUARIOS_Controller.php');
					}
				}
				else{

					$USUARIOS = get_data_form(); //recojo los valores del formulario

					$respuesta = $USUARIOS->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new USUARIOS_SEARCH();
				}
				else{
					$USUARIOS = get_data_form();//recogemos los datos del formulario
					$datos = $USUARIOS->SEARCH();

					$lista = array('login','password','nombre','apellidos','email','DNI','telefono','FechaNacimiento','fotopersonal','sexo');//nombres de los atributos

					new USUARIOS_SHOWALL($lista, $datos);
				}
				break;
			case 'SHOWCURRENT':
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','','');
				$valores = $USUARIOS->RellenaDatos();//se rellenan los datos a partir de la clave
				new USUARIOS_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$USUARIOS = new USUARIOS_Model('','','','','','','','','','');
				}
				else{
					$USUARIOS = get_data_form();//recogemos los datos
				}
				$datos = $USUARIOS->SEARCH();
				$lista = array('login','password','nombre','apellidos','email','DNI','telefono','FechaNacimiento','fotopersonal','sexo');//nombres de los atributos
				new USUARIOS_SHOWALL($lista, $datos);//mostramos los datos
		}

?>
