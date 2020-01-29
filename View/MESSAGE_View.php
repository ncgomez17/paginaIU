<?php
//Clase : MESSAGE_Vista
//Creado el : 08-10-2019
//Creado por: ncgomez17
//---
class MESSAGE{

	private $string;//mensaje a mostrar 
	private $volver;//url que mandamos de vuelta
	//funcion construct de la vista
	function __construct($string, $volver){
		$this->string = $string;
		$this->volver = $volver;	
		$this->render();
	}
	//funcion render para crear la vista
	function render(){

		include '../Locale/Strings_'.$_SESSION['idioma'].'.php';
		include '../View/Header.php';
?>
		<br>
		<br>
		<br>
		<H3>
<?php
//comprobamos si se trata de un array,en tal caso realizamos el bucle para mostrar los errores
		if(!is_array($this->string)){


	//mostramos el mensaje
	?>
		
		<label id='<?php echo $this->string;?>'></label>
		</H3>
		<br>
		<br>
		<br>

<?php
//mostramos el link
?>

			
	<?php
		echo '<a href=\'' .$this->volver . "'>" . "<img src='../View/Img/volver.png' width='30px' height='30px'>". "</a>";
		include '../View/Footer.php';
	}else{
	?>
	<h1 id="fallos">Errores Producidos</h1>
	<table class='mensajetabla'>
		<tr>
			<th id="nombreatributo">Nombre atributo</th>
			<th id="codigoincidencia">Código incidencia</th>
			<th id="mensajerror">Mensaje error</th>
		</tr>
		<tr>
			<?php
			foreach ($this->string as $errores) {
				foreach ($errores as $error) {
					?>
					<td><?php echo $error['nombreatributo']; ?></td>
					<td><?php echo $error['codigoincidencia']; ?></td>
					<td><?php echo $error['mensajeerror']; ?></td>
				    </tr>
					<?php
				}
			}
			?>
		</table>
	<?php		
		echo '<a href=\'' .$this->volver . "'>" . "<img src='../View/Img/volver.png' width='30px' height='30px'>". "</a>";
		include '../View/Footer.php';
	} 

}
}
