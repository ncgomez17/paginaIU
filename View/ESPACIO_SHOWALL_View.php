<?php
//Clase : ESPACIO_Vista
//Creado el : 06-10-2019
//Creado por: ncgomez17
//---

	class ESPACIO_SHOWALL{

		//funcion construct de la vista
		function __construct($lista,$datos){
			$this->datos = $datos;//informacion de las tuplas
			$this->lista = $lista;//nombres de los atributos	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
			//creamos tres links con los metodos add y search
?>
			<h1><label id='mostrartodo'></label> </h1>	
			<br>
			<br>
			<div class='metodos'>
			<a href='../Controller/ESPACIO_Controller.php?action=ADD'style="text-decoration: none;">
				<img src='../View/Img/agregar.png' width="30px" height="30px"> 
			</a>
			<a href='../Controller/ESPACIO_Controller.php?action=SEARCH'style="text-decoration: none;">
				<img src='../View/Img/lupa.png' width="30px" height="30px"> 
			</a>
			</div>
		<div class='tabla'>	
		<table>
			<tr>
<?php
//mostramos el nombre de las atributos en la primera fila
		foreach ($this->lista as $titulo) {
?>
				<th><?php echo $strings[$titulo]; ?></th>
<?php
		}
?>
			</tr>
<?php
//mostramos la informacion de todas las tuplas
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
//mostramos tres links al lado de cada tupla de los metodos edit,delete y showcurrent
			}
?>
				<td>
					<a href='
						../Controller/ESPACIO_Controller.php?action=EDIT&CODESPACIO=
							<?php echo $fila['CODESPACIO']; ?>
							'> <img src='../View/Img/editar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/ESPACIO_Controller.php?action=DELETE&CODESPACIO=
							<?php echo $fila['CODESPACIO']; ?>
							'><img src='../View/Img/borrar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/ESPACIO_Controller.php?action=SHOWCURRENT&CODESPACIO=
							<?php echo $fila['CODESPACIO']; ?>
							'><img src='../View/Img/informacion.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/ESPACIO_Controller.php?action=SEARCH2&CODESPACIO=
							<?php echo $fila['CODESPACIO']; ?>
							'><?php echo $strings['Profesor-Espacio']; ?><img src='../View/Img/lupa.png' width="30px" height="30px"> </a>
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