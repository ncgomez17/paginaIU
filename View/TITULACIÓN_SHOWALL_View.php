<?php
//Clase : TITULACIÓN_Vista
//Creado el : 07-10-2019
//Creado por: ncgomez17
//---

	class TITULACIÓN_SHOWALL{

		//Función construct
		function __construct($lista,$datos){
			$this->datos = $datos;//Datos de las tuplas
			$this->lista = $lista;//Nombres de los atributos	
			$this->render();
		}
		//Funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
			//Creamos los links para acceder a los metodos add y search
?>

			<h1><label id='mostrartodo'></label> </h1>	
			<br>
			<br>
			<div class='metodos'>
			<a href='../Controller/TITULACIÓN_Controller.php?action=ADD'style="text-decoration: none;">
				<img src='../View/Img/agregar.png' width="30px" height="30px"> 
			</a>
			<a href='../Controller/TITULACIÓN_Controller.php?action=SEARCH'style="text-decoration: none;">
				<img src='../View/Img/lupa.png' width="30px" height="30px"> 
			</a>
			</div>
		<div class='tabla'>	
		<table>
			<tr>
<?php
//mostramos un atributo por columna
		foreach ($this->lista as $titulo) {
?>
				<th><?php echo $strings[$titulo]; ?></th>
<?php
		}
?>
			</tr>
<?php
//Mostramos todas las tuplas
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
//Creamos los links para  acceder a los metodos edit,showcurrent y delete
			}
?>
				<td>
					<a href='
						../Controller/TITULACIÓN_Controller.php?action=EDIT&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
							'> <img src='../View/Img/editar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/TITULACIÓN_Controller.php?action=DELETE&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
							'> <img src='../View/Img/borrar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/TITULACIÓN_Controller.php?action=SHOWCURRENT&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
							'><img src='../View/Img/informacion.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/TITULACIÓN_Controller.php?action=SEARCH2&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
							'><?php echo $strings['Profesor-Titulacion']; ?><img src='../View/Img/lupa.png' width="30px" height="30px"> </a>
				</td>
			</tr>

<?php

		}
?>


		</table>
		</div>		
		
					
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWALL

?>