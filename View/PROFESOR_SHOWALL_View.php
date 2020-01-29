<?php
//Clase : PROFESORES_Vista
//Creado el : 03-10-2019
//Creado por: ncgomez17
//---

	class PROFESOR_SHOWALL{

		//funcion construct
		function __construct($lista,$datos){
			$this->datos = $datos;//recordset con todas las tuplas
			$this->lista = $lista;//informacion de los atributos	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
			//creamos dos links uno para el metodo add y el otro para search
?>
			<h1><label id='mostrartodo'></label> </h1>	
			<br>
			<br>
			<div class='metodos'>
			<a href='../Controller/PROFESOR_Controller.php?action=ADD'style="text-decoration: none;">
				<img src='../View/Img/agregar.png' width="30px" height="30px"> 
			</a>
			<a href='../Controller/PROFESOR_Controller.php?action=SEARCH'style="text-decoration: none;">
				<img src='../View/Img/lupa.png' width="30px" height="30px"> 
			</a>
			</div>
		<div class='tabla'>	
		<table>
			<tr>
<?php
//creamos la primera fila mostrando los atributos en cada columna
		foreach ($this->lista as $titulo) {
?>
				<th><?php echo $strings[$titulo]; ?></th>
<?php
		}
?>
			</tr>
<?php
//mostramos las tuplas
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
//creamos tres links al lado de cada tupla con los metodos delete,edity showcurrent
			}
?>
				<td>
					<a href='
						../Controller/PROFESOR_Controller.php?action=EDIT&DNI=
							<?php echo $fila['DNI']; ?>
							'><img src='../View/Img/editar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/PROFESOR_Controller.php?action=DELETE&DNI=
							<?php echo $fila['DNI']; ?>
							'><img src='../View/Img/borrar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/PROFESOR_Controller.php?action=SHOWCURRENT&DNI=
							<?php echo $fila['DNI']; ?>
							'><img src='../View/Img/informacion.png' width="30px" height="30px"> </a>
				</td>
					<td>
					<a href='
						../Controller/PROFESOR_Controller.php?action=SEARCH2&DNI=
							<?php echo $fila['DNI']; ?>
							'><?php echo $strings['Profesor-Espacio']; ?><img src='../View/Img/lupa.png' width="30px" height="30px"> </a>
				</td>
					</td>
					<td>
					<a href='
						../Controller/PROFESOR_Controller.php?action=SEARCH3&DNI=
							<?php echo $fila['DNI']; ?>
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