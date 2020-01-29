<?php
//Clase : CENTRO_Vista
//Creado el : 06-10-2019
//Creado por: ncgomez17
//---

	class CENTRO_SHOWALL{

		//funcion construct de la vista
		function __construct($lista,$datos){
			$this->datos = $datos;//informacion de las tuplas
			$this->lista = $lista;//nombres de los atributos	
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
			<a href='../Controller/CENTRO_Controller.php?action=ADD'style="text-decoration: none;">
				<img src='../View/Img/agregar.png' width="30px" height="30px"> 
			</a>
			<a href='../Controller/CENTRO_Controller.php?action=SEARCH'style="text-decoration: none;">
				<img src='../View/Img/lupa.png' width="30px" height="30px"> 
			</a>
			</div>
			<div class='tabla'>
		<table>
			<tr>
<?php
//mostramos en la primera fila el nombre de cada atributo
		foreach ($this->lista as $titulo) {
?>
				<th><?php echo $strings[$titulo]; ?></th>
<?php
		}
?>
			</tr>
<?php
//mostramos la informacion de cada tupla
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
//creamos tres links para los metodos edit,delete y showcurrent al lado de cada tupla
			}
?>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=EDIT&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'><img src='../View/Img/editar.png' width="30px" height="30px">  </a>
				</td>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=DELETE&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'> <img src='../View/Img/borrar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=SHOWCURRENT&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'><img src='../View/Img/informacion.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=SEARCH2&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'><?php echo $strings['Espacio']; ?><img src='../View/Img/lupa.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=SEARCH3&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'><?php echo $strings['Titulación']; ?><img src='../View/Img/lupa.png' width="30px" height="30px"> </a>
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