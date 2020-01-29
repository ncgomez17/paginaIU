<?php
//Script : Function_Upload
//Creado el : 30-10-2019
//Creado por: ncgomez17
//nos permitira alamcenar la imagen en el fichero Files
//---

//Función para cargar las imágenes
function IsUpload(){
	$target_dir = "../Files/";//directorio donde depositaremos las images
	$target_file = $target_dir . basename($_FILES["fotopersonal"]["name"]);//ruta de la imagen
	$uploadOk = 1;//variable de comprobación
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//variable que contiene la extensión del archivo
	$devolver=array(//array de dos elementos uno boolean y otro con la ruta del fichero
		"comprobacion"=>True,
		"ruta_imagen"=>$target_file
	);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fotopersonal"]["tmp_name"]);
	    if($check !== false) {//si se cumple se trata de una imágen
	        $uploadOk = 1;
	    } else {//no se trata de una imagen
	        $uploadOk = 0;
	        $devolver["comprobacion"]=false;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {//comrpobamos que la imagen existe si no la variable boolean del array la ponemos como false
	    $uploadOk = 0;
	    $devolver["comprobacion"]=false;
	}
	// Check file size
	if ($_FILES["fotopersonal"]["size"] > 500000) {//comprobamos que el tamaño de la imagen no pase un cierto limite si no la variable boolean del array la ponemos como false
	    $uploadOk = 0;
	    $devolver["comprobacion"]=false;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {//comprobamos que la imagen solo pueda ser de tipo jpg,png,jpeg o gif si no la variable boolean del array la ponemos como false
	    $uploadOk = 0;
	    $devolver["comprobacion"]=false;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    $devolver["comprobacion"]=false;
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fotopersonal"]["tmp_name"], $target_file)) {//movemos la imagen al directorio que queremos
	    } else {
	       $devolver["comprobacion"]=false;
	    }
	}
	return  $devolver;
}
	?>