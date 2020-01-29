
<?php
//Clase : Login_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
	class Login{

		//funcion construct de la vista
		function __construct(){	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; 
?>			
			<h1><label id='rogin'></label> </h1>	 
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_Login();">
				<fieldset>
				<div class="Formulario">
				 	<label id='Login'></label> : <input type = 'text' name = 'login' id='login' placeholder = ''  value = '' onblur="comprobarVacio('login')  && comprobarLetrasNumeros('login',15)" ><br>
				 	
					<label id='Password'></label> : <input type = 'password' name = 'password' id='password' placeholder = ''  value = '' onblur="comprobarVacio('password')  && comprobarLetrasNumeros('password',128)"  ><br>

					<button type='submit' name='action' value='Login'><img src='../View/Img/login.png'></button>
					<div/>
				</fieldset>
			</form>
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
