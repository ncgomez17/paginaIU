<?php
//Clase : PROFESORES_ESPACIO_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---

	class PROF_ESPACIO_SHOWALL{

		//funcion constructor de la vista
		function __construct($lista,$datos){
			$this->datos = $datos;//informacion de las tuplas
			$this->lista = $lista;//nombre de los atributos de las tuplas	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){
			//creamos dos links con los metodos add y search
			include '../View/Header.php'; //header necesita los strings
?>

			<h1><label id='mostrartodos'></label> </h1>	
			<br>
			<br>
			<div class='metodos'>
			<a href='../Controller/PROF_ESPACIO_Controller.php?action=ADD'style="text-decoration: none;">
				<img src='../View/Img/agregar.png' width="30px" height="30px"> 
			</a>
			<a href='../Controller/PROF_ESPACIO_Controller.php?action=SEARCH'style="text-decoration: none;">
				<img src='../View/Img/lupa.png' width="30px" height="30px"> 
			</a>
			</div>
			<div class='tabla'>
		<table>
			<tr>
<?php
//mostramos la primera fila con los atributos que tiene la tupla
		foreach ($this->lista as $titulo) {
?>
				<th><?php echo $strings[$titulo]; ?></th>
<?php
		}
?>
			</tr>
<?php
//mostramos la infromacion de cada tupla
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
//creamos tres links con los metodos edit,delete y showcurrent
			}
?>
				<td>
					<a href='
						../Controller/PROF_ESPACIO_Controller.php?action=EDIT&DNI=
							<?php echo $fila['DNI']; ?>&CODESPACIO=
							<?php echo $fila['CODESPACIO']; ?>
							'> <img src='../View/Img/editar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/PROF_ESPACIO_Controller.php?action=DELETE&DNI=
							<?php echo $fila['DNI']; ?>&CODESPACIO=
							<?php echo $fila['CODESPACIO']; ?>
							'> <img src='../View/Img/borrar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/PROF_ESPACIO_Controller.php?action=SHOWCURRENT&DNI=
							<?php echo $fila['DNI']; ?>&CODESPACIO=
							<?php echo $fila['CODESPACIO']; ?>
							'><img src='../View/Img/informacion.png' width="30px" height="30px"> </a>
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