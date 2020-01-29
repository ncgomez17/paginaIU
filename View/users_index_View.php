
<?php
//Clase : users_index_Vista
//Creado el : 28-10-2019
//Creado por: ncgomez17
//---
//Página Principal
class Index {
//Funcion construct
	function __construct(){
		$this->render();
	}
	//Funcion render para crear la vista
	function render(){
	
		include '../Locale/Strings_SPANISH.php';
		include '../View/Header.php';
?>      <div class="Inicio">
		<H1><label id='bienvenido'></label></H1>
		<BR>
	    <H1><label id='introducion'></label></H1>
	    <h1><label id='gestion'></label></h1>
		</div>
		<img src='../View/Icons/universidadevigo.jpg' width="700px" height="500px"  margin-left="120px">
	    <div id="Imagenes">
	    <img src='../View/Img/agregar.png' width="30px" height="30px"><label id='añadirentidades'></label>
	    <img src='../View/Img/borrar.png' width="30px" height="30px"><label id='borrarentidades'></label>
	    <img src='../View/Img/editar.png' width="30px" height="30px"><label id='editarentidades'></label>  
	    <img src='../View/Img/informacion.png' width="30px" height="30px"><label id='informacionentidades'></label>  
	    <img src='../View/Img/lupa.png' width="30px" height="30px"><label id='lupaentidades'></label>
	    <h2><label id='fin'></label></h2> 
		</div>


		
<?php
		include '../View/Footer.php';
	}

}

?>