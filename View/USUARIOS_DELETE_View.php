<?php
//Clase : USUARIO_Vista
//Creado el : 03-10-2019
//Creado por: ncgomez17
//---

	class USUARIOS_DELETE{

		//Función construct de la vista
		function __construct($tupla){	
			$this->tupla = $tupla;//informacion de la tupla recogida
			$this->render();
		}
		//función render para mostrar la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='borrar'></label>:</h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' enctype="multipart/form-data" >
					<fieldset>
				 	<label id='Login'></label>: <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '15' maxlength="15" value = '<?php echo $this->tupla['login']; ?>' onblur="comprobarVacio('login')  && comprobarAlfabetico('login',15)" readonly><br>

					<label id='Password'></label>  : <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '128' maxlength="128"value = '<?php echo $this->tupla['password']; ?>' onblur="comprobarVacio('password')  && comprobarLetrasNumeros('password',128)" readonly><br>

					<label id='Nombre'></label> : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' maxlength="30" value = '<?php echo $this->tupla['nombre']; ?>' onblur="comprobarVacio('nombre')  && comprobarAlfabetico('nombre',30)" readonly><br>

					<label id='Apellidos'></label> : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' maxlength="50" value = '<?php echo $this->tupla['apellidos']; ?>' onblur="comprobarVacio('apellidos')  && comprobarAlfabetico('apellidos',50)" readonly><br>
					<label id='telefono'></label>  : <input type = 'text' name = 'telefono' id = 'telefono' placeholder = '' size = '11' maxlength="11" value = '<?php echo $this->tupla['telefono']; ?>' onblur="comprobarVacio('telefono') && comprobarTelf('telefono')"   readonly=""><br>

					<label id='Email'></label> : <input type = 'text' name = 'email' id = 'email' size = '60' maxlength="60" value = '<?php echo $this->tupla['email']; ?>' onblur="comprobarVacio('email')  && comprobarEmail('email',60)" readonly><br>

					<label id='dni'></label> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' maxlength="9" value = '<?php echo $this->tupla['DNI']; ?>' onblur="comprobarVacio('DNI')  && comprobarDni('DNI')"readonly ><br>
					<label id='Fechanacimiento'></label> : <input type = 'date' name = 'FechaNacimiento' id = 'FechaNacimiento'  value = '<?php echo $this->tupla['FechaNacimiento']; ?>' onblur="comprobarVacio('FechaNacimiento')" onkeydown="return false"readonly ><br>
					<label id='foto'></label>:	<div style="display: none">
									      		<span ><?php echo $strings['Subir archivo'] ;?></span>
									      		<input type="file" name="fotopersonal" id="fotopersonal">
									      	</div>
					<?php echo '<a href="'. $this->tupla['fotopersonal'], '">Image</a>';?><br>
					<label id='Sexo'></label> :<input type = 'text' name='sexo' id='sexo'  value = '<?php echo $this->tupla['sexo']; ?>'  onblur="comprobarVacio('sexo')" readonly><br>

					<button type='submit' name='action' value='DELETE'><img src='../View/Img/borrar.png' width="30px" height="30px"></button>
				</fieldset>
			</form>
			<br>
				
		
			<div class='volver'>
			<a href='../Controller/USUARIOS_Controller.php'>
			 <img  src='../View/Img/volver.png' width="30px" height="30px"> 
			</a>
			</div>
		
		<?php
		//Fin Formulario
			include '../View/Footer.php';
			//Incluimos el pie de la vista
		} //fin metodo render

	} //fin DELETE

?>

	