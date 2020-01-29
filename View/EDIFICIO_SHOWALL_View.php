<?php
//Clase : EDIFICIO_Vista
//Creado el : 06-10-2019
//Creado por: ncgomez17
//---

	class EDIFICIO_SHOWALL{

		//CONSTRUCT DE LA VISTA
		function __construct($lista,$datos){
			$this->datos = $datos;//INFORMACION DE LAS TUPLAS
			$this->lista = $lista;//NOMBRE DE LOS ARTRIBUTOS	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){
			//creamos dos links para los metodos add y search
			include '../View/Header.php'; //header necesita los strings
?>
			<h1><label id='mostrartodo'></label> </h1>	
			<br>
			<br>
			<div class='metodos'>
			<a href='../Controller/EDIFICIO_Controller.php?action=ADD'style="text-decoration: none;">
				<img src='../View/Img/agregar.png' width="30px" height="30px">
				 </a>
			<a href='../Controller/EDIFICIO_Controller.php?action=SEARCH'style="text-decoration: none;">
				<img src='../View/Img/lupa.png' width="30px" height="30px"> 
			</a>
			</div>
			<div class='tabla'>
		<table>
			<tr>
<?php
//mostramos en la primera fila los nombres de los atributos
		foreach ($this->lista as $titulo) {
?>
				<th><?php echo $strings[$titulo]; ?></th>
<?php
		}
?>
			</tr>
<?php
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
//mostramos todas las tuplas
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
//mostramos los tres links para los metodos delete,edit y showcurrent
			}
?>
				<td>
					<a href='
						../Controller/EDIFICIO_Controller.php?action=EDIT&CODEDIFICIO=
							<?php echo $fila['CODEDIFICIO']; ?>
							'> <img src='../View/Img/editar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/EDIFICIO_Controller.php?action=DELETE&CODEDIFICIO=
							<?php echo $fila['CODEDIFICIO']; ?>
							'><img src='../View/Img/borrar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/EDIFICIO_Controller.php?action=SHOWCURRENT&CODEDIFICIO=
							<?php echo $fila['CODEDIFICIO']; ?>
							'><img src='../View/Img/informacion.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='../Controller/EDIFICIO_Controller.php?action=SEARCH2&CODEDIFICIO=<?php echo $fila['CODEDIFICIO']; ?>'style="text-decoration: none;"><?php echo $strings['Centro']; ?>
				<img src='../View/Img/lupa.png' width="30px" height="30px"> 
			</a>
				</td>
					<td>
					<a href='../Controller/EDIFICIO_Controller.php?action=SEARCH3&CODEDIFICIO=<?php echo $fila['CODEDIFICIO']; ?>'style="text-decoration: none;"><?php echo $strings['Espacio']; ?>
				<img src='../View/Img/lupa.png' width="30px" height="30px"> 
			</a>
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