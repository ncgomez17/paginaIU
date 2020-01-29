<?php
//Clase : PROFESORES_TITULACION_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---

	class PROF_TITULACION_SHOWALL{

		//funcion construct de la vista
		function __construct($lista,$datos){
			$this->datos = $datos;//tuplas de la tabla
			$this->lista = $lista;//informcion de las tablas	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
			//creamos dos links para los metodos add y buscar
?>
			<h1><label id='mostrartodos'></label> </h1>	
			<br>
			<br>
			<div class='metodos'>
			<a href='../Controller/PROF_TITULACION_Controller.php?action=ADD'style="text-decoration: none;">
				<img src='../View/Img/agregar.png' width="30px" height="30px"> 
			</a>
			<a href='../Controller/PROF_TITULACION_Controller.php?action=SEARCH'style="text-decoration: none;">
				<img src='../View/Img/lupa.png' width="30px" height="30px">
				</a> 
			</div>
		<div class='tabla'>
		<table>
			<tr>
<?php
//metemos un atributo por columna en la primera fila
		foreach ($this->lista as $titulo) {
?>
				<th><?php echo $strings[$titulo];?></th>
<?php
		}
?>
			</tr>
<?php
//mostramos la informacion de las tuplas
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
//creamos tres links al lado de cada tupla con los metodos delete,edit y showcurrent
			}
?>
				<td>
					<a href='
						../Controller/PROF_TITULACION_Controller.php?action=EDIT&DNI=
							<?php echo $fila['DNI']; ?>&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
							'><img src='../View/Img/editar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/PROF_TITULACION_Controller.php?action=DELETE&DNI=
							<?php echo $fila['DNI']; ?>&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
							'> <img src='../View/Img/borrar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/PROF_TITULACION_Controller.php?action=SHOWCURRENT&DNI=
							<?php echo $fila['DNI']; ?>&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
							'> <img src='../View/Img/informacion.png' width="30px" height="30px"> </a>
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