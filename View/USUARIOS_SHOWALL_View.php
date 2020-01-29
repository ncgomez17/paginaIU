<?php
//Clase : USUARIO_Vista
//Creado el : 03-10-2019
//Creado por: ncgomez17
//---

	class USUARIOS_SHOWALL{

		//Función construct de la vista 
		function __construct($lista,$datos){
			$this->datos = $datos;//Información de las tuplas
			$this->lista = $lista;//Lista de atributos de la entidad	
			$this->render();
		}
		//funcion render para crear la vista
		function render(){

			include '../View/Header.php'; //header necesita los strings
			//Creamos los links para acceder a los metodos add y search y le pasamos por get las claves

?>
			
			<div class='metodos'>
			<h1><label id='mostrartodo'></label> </h1>	
			<br>
			<br>
			<a href='../Controller/USUARIOS_Controller.php?action=ADD' style="text-decoration: none;">
				<img src='../View/Img/agregar.png' width="30px" height="30px"> 
			</a>
			<a href='../Controller/USUARIOS_Controller.php?action=SEARCH'style="text-decoration: none;">
				<img src='../View/Img/lupa.png' width="30px" height="30px"> 
			</a>
			</div>
			<div class='tabla'>	
				<table>
					<tr>

<?php
//Recorremos los atributos y mostramos 1 por columna
		foreach ($this->lista as $titulo) {
?>
				<th><?php echo $strings[$titulo]; ?></th>
<?php
		}
?>
					</tr>
<?php
//Recorremos las tuplas y las vamos mostrando
		foreach($this->datos as $fila)
		{
?>
					<tr>
<?php
			foreach ($this->lista as $columna) {
			if($columna=='fotopersonal'){
			?>
				<td><?php echo '<a href="'. $fila[$columna], '">Image</a>';?></td>
<?php
			}else{			
?>
					<td><?php echo $fila[$columna]; ?></td>
<?php
}
//Al lado de cada lista colacaremos tres links para acceder a edit,delete y showcurrent
			}
?>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=EDIT&login=
							<?php echo $fila['login']; ?>
							'> <img src='../View/Img/editar.png' width="30px" height="30px">  </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=DELETE&login=
							<?php echo $fila['login']; ?>
							'> <img src='../View/Img/borrar.png' width="30px" height="30px"> </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&login=
							<?php echo $fila['login']; ?>
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

	