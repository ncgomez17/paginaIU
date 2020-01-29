//Script : Script_js
//Creado el : 28-10-2019
//Creado por: ncgomez17
//---

function comprobar_Login(){
  //Si las validaciones están bien devuelve true;  
     if( comprobarVacio('login') && comprobarLetrasNumeros('login',15) &&
       comprobarVacio('password') && comprobarLetrasNumeros('password',128)){

          return true;
     }
     else{
          // si alguna falla devuelve un false
          alert(cadenas['introducirCampo']);
          return false;
     }
}
//funcion para comprobar que los campos de usuarios cumplen todas las restricciones
function comprobar_registro()
{
 if(//realizamos todas las comprobaciones si se cumplen devolvemos true
  comprobarVacio('login') && comprobarLetrasNumeros('login',15) &&
  comprobarVacio('password') && comprobarLetrasNumeros('password',128) &&
  comprobarVacio('nombre') && comprobarAlfabetico('nombre',30) &&
  comprobarVacio('apellidos') && comprobarAlfabetico('apellidos',50) &&
  comprobarVacio('email') && comprobarEmail('email',60) &&
  comprobarVacio('DNI') && comprobarDni('DNI') &&
  comprobarVacio('telefono') && comprobarTelf('telefono') &&
  comprobarVacio('FechaNacimiento') &&
  comprobarVacio('fotopersonal') &&
  comprobarVacio('sexo'))
 {
  return true;
 }
 else{//devolvemos un alert indicandole al usuario que introduzca bien los campos
  alert(cadenas['introducirCampo']);
  return false;
 }
 }
 function comprobar_registro_edit()
{
 if(//realizamos todas las comprobaciones si se cumplen devolvemos true
  comprobarVacio('login') && comprobarAlfabetico('login',15) &&
  comprobarVacio('password') && comprobarLetrasNumeros('password',128) &&
  comprobarVacio('nombre') && comprobarAlfabetico('nombre',30) &&
  comprobarVacio('apellidos') && comprobarAlfabetico('apellidos',50) &&
  comprobarVacio('email') && comprobarEmail('email',60) &&
  comprobarVacio('DNI') && comprobarDni('DNI') &&
  comprobarVacio('telefono') && comprobarTelf('telefono') &&
  comprobarVacio('FechaNacimiento') &&
  comprobarVacio('sexo'))
 {
  return true;
 }
 else{//devolvemos un alert indicandole al usuario que introduzca bien los campos
  alert(cadenas['introducirCampo']);
  return false;
 }
 }
 //funcion para comprobar que los campos de centros cumplen todas las restricciones
function comprobar_centro()
{
 if(//realizamos todas las comprobaciones si se cumplen devolvemos true
  comprobarVacio('CODCENTRO') && comprobarLetrasNumeros('CODCENTRO',10) && 
  comprobarVacio('NOMBRECENTRO') && comprobarAlfabetico('NOMBRECENTRO',50) &&
  comprobarVacio('DIRECCIONCENTRO') && comprobarAlfabetico('DIRECCIONCENTRO',150) &&
  comprobarVacio('RESPONSABLECENTRO')&& comprobarAlfabetico('RESPONSABLECENTRO',60))
 {
  return true;
 }
 else{
  alert("Introduce bien los campos");//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
 }
 }
 //funcion para comprobar que los campos de edificios cumplen todas las restricciones
function comprobar_edificio()
{
 if(//realizamos todas las comprobaciones si se cumplen devolvemos true
  comprobarVacio('CODEDIFICIO') && comprobarLetrasNumeros('CODEDIFICIO',10) &&
  comprobarVacio('NOMBREEDIFICIO') && comprobarAlfabetico('NOMBREEDIFICIO',50) &&
  comprobarVacio('DIRECCIONEDIFICIO') && comprobarAlfabetico('DIRECCIONEDIFICIO',150)&&
  comprobarVacio('CAMPUSEDIFICIO') && comprobarAlfabetico('CAMPUSEDIFICIO',10)
  )
 {
  return true;
 }
 else{
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
 }
 }
 //funcion para comprobar que los campos de espacios cumplen todas las restricciones
 function comprobar_espacio()
{
 if(//realizamos todas las comprobaciones si se cumplen devolvemos true
  comprobarVacio('CODESPACIO') && comprobarLetrasNumeros('CODESPACIO',10) &&
  comprobarVacio('SUPERFICIEESPACIO') && comprobarEntero('SUPERFICIEESPACIO',0,9999) &&
  comprobarVacio('NUMINVENTARIOESPACIO') && comprobarEntero('NUMINVENTARIOESPACIO',0,99999999)
  )
 {
  return true;
 }
 else{
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
 }
 }
 //funcion para comprobar que los campos de profesores cumplen todas las restricciones
  function comprobar_profesor()
{
 if(//realizamos todas las comprobaciones si se cumplen devolvemos true
  comprobarVacio('DNI') && comprobarDni('DNI') &&
  comprobarVacio('NOMBREPROFESOR') && comprobarAlfabetico('NOMBREPROFESOR',15) &&
  comprobarVacio('APELLIDOSPROFESOR') && comprobarAlfabetico('APELLIDOSPROFESOR',30) &&
  comprobarVacio('AREAPROFESOR')  && comprobarAlfabetico('AREAPROFESOR',60) &&
  comprobarVacio('DEPARTAMENTOPROFESOR') && comprobarAlfabetico('DEPARTAMENTOPROFESOR',60)
  )
 {
  return true;
 }
 else{
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
 }
 }
 //funcion para comprobar que los campos de titulaciones cumplen todas las restricciones
   function comprobar_titulacion()
{
 if(//realizamos todas las comprobaciones si se cumplen devolvemos true
  comprobarVacio('CODTITULACION') && comprobarLetrasNumeros('CODTITULACION',10) &&
  comprobarVacio('NOMBRETITULACION') && comprobarAlfabetico('NOMBRETITULACION',50) &&
  comprobarVacio('RESPONSABLETITULACION') && comprobarAlfabetico('RESPONSABLETITULACION',60) 
  )
 {
  return true;
 }
 else{
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
 }
 }
 //funcion para comprobar que los campos de profesores cumplen todas las restricciones
  function comprobar_profesor_titulacion()
{
 if(//realizamos todas las comprobaciones si se cumplen devolvemos true
  comprobarVacio('ANHOACADEMICO')  && comprobarAnhoAcademico('ANHOACADEMICO',9) 
  )
 {
  return true;
 }
 else{
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
 }
 }
 //funcion para la comprobacion de todos los campos del search de usuarios
 function comprobar_registro_search () { //Comprueba que los atributos son correctos al añadir el usuario
    if(
        comprobarLetrasNumerosVacio('login',15) && 
        comprobarLetrasNumerosVacio('password', 128) &&
        comprobarAlfabeticoVacio('nombre', 30) &&
        comprobarAlfabeticoVacio('apellidos',50) &&
        comprobarEmailVacio('email',60) &&
        comprobarDniVacio('DNI') &&
        comprobarTelfVacio('telefono')
      ){
        // si todas estan correctas devuelve un true
        return true;
      }
      else{ //Si alguna está mal salta al else
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
      }
}
//funcion para la comprobacion de todos los campos del search de centro
function comprobar_centro_search () { //Comprueba que los atributos son correctos al buscar un centro
    if(
        comprobarLetrasNumerosVacio('CODCENTRO',10) &&
        comprobarAlfabeticoVacio('NOMBRECENTRO',50) &&
        comprobarLetrasNumerosVacio('DIRECCIONCENTRO',150) &&
        comprobarAlfabeticoVacio('RESPONSABLECENTRO',60) 
      ){
        // si todas estan correctas devuelve un true
        return true;
      }
      else{ //Si alguna está mal salta al else
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
      }
}
//funcion para la comprobacion de todos los campos del search de edificio
function comprobar_edificio_search () { //Comprueba que los atributos son correctos al añadir el edificio
    if(
        comprobarLetrasNumerosVacio('CODEDIFICIO',10) &&
        comprobarAlfabeticoVacio('NOMBREEDIFICIO',50) &&
        comprobarLetrasNumerosVacio('DIRECCIONEDIFICIO',150) &&
        comprobarLetrasNumerosVacio('CAMPUSEDIFICIO',10)
      ){
        // si todas estan correctas devuelve un true
        return true;
      }
      else{ //Si alguna está mal salta al else
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
      }
}
//funcion para la comprobacion de todos los campos del search de espacio
function comprobar_espacio_search () { //Comprueba que los atributos son correctos al añadir el espacio
    if(
        comprobarLetrasNumerosVacio('CODESPACIO',10) &&
        comprobarEnteroVacio('SUPERFICIEESPACIO',0,9999) &&
        comprobarEnteroVacio('NUMINVENTARIOESPACIO',0,99999999)
      ){
        // si todas estan correctas devuelve un true
        return true;
      }
      else{ //Si alguna está mal salta al else
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
      }
}
//funcion para la comprobacion de todos los campos del search de profesor
function comprobar_profesor_search () { //Comprueba que los atributos son correctos al añadir el centro
    if(
        comprobarDniVacio('DNI') && 
        comprobarAlfabeticoVacio('NOMBREPROFESOR',15) &&
        comprobarAlfabeticoVacio('APELLIDOSPROFESOR',30) &&
        comprobarLetrasNumerosVacio('AREAPROFESOR',60) &&
        comprobarLetrasNumerosVacio('DEPARTAMENTOPROFESOR',60) 
      ){
        // si todas estan correctas devuelve un true
        return true;
      }
      else{ //Si alguna está mal salta al else
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
      }
}
//funcion para la comprobacion de todos los campos del search de titulacion
function comprobar_titulacion_search () { //Comprueba que los atributos son correctos al añadir el espacio
    if(
        comprobarLetrasNumerosVacio('CODTITULACION',10) && 
        comprobarAlfabeticoVacio('NOMBRETITULACION',50) && 
        comprobarLetrasNumerosVacio('RESPONSABLETITULACION',60)
      ){
        // si todas estan correctas devuelve un true
        return true;
      }
      else{ //Si alguna está mal salta al else
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
      }
}
//funcion para la comprobacion de todos los campos del search de prof-titulacion
function comprobar_profesor_titulacion_search()
{
 if(//realizamos todas las comprobaciones si se cumplen devolvemos true
  comprobarLetrasNumerosVacio('ANHOACADEMICO',9)
  )
 {
  return true;
 }
 else{
  alert(cadenas['introducirCampo']);//devolvemos un alert indicandole al usuario que introduzca bien los campos
  return false;
 }
 }
 function abrirModal(idelemento, texto){
      document.getElementById("modal").style.display = "block";//tratamos el objeto modal como un bloque   
      document.getElementById("mensajeError").innerHTML = texto;//introducimos en el objeto mensajeError el texto que viene de argumento en la funcion
      document.getElementById("mensajeError").style.margin = "30px 0 0 160px";//establecemos el tamaño del objeto mensajeError
      document.getElementById("cerrar").focus();//hacemos focus al objeto cerrar
    } 
    function cerrarModal(){
      document.getElementById("modal").style.display = "none";//quitamos el tipo display del objeto modal 
    }
//funcion para comprobar si un campo esta vacio
function comprobarVacio(campo){

  var prueba=true;//boolean para comprobar si esta vacio
  var valor = document.getElementById(campo).value;//valor del campo
  if ((document.getElementById(campo).value.length==0)||(valor == null)){/*Comprueba si el campo esta vacío*/
     abrirModal(campo, cadenas['campoVacio']);
    document.getElementById(campo).style.borderColor = 'Red';//ponemos el color del input rojo
    prueba=false;
  } 
  else{
 document.getElementById(campo).style.borderColor = 'Green';//ponemos el color del input verde
  }
 
  return prueba;
}
//funcion para comprobar si un texto cumple con el tamaño introducido
function comprobarTexto(campo,size){
  var tamanho=document.getElementById(campo).value.length;//tamaño del campo
  if(tamanho>size){//si es mayor que le tamaño introducido devolvemos false
    return false;
  } 
  return true;
}
//funcion para comprobar si un campo cumple con los requisitos de un dni
function comprobarDni(campo) {

  var prueba=true;//boolean para realizar la comprobacion
  var valor=document.getElementById(campo).value; /*Meto el valor del atributo que estoy comprobando*/
  var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T']; /*Meto las letras para comprobar el dni*/
  if ( !(/^\d{8}[A-Z]$/.test(valor)) || valor.charAt(8) != letras[(valor.substring(0, 8))%23]) {
    prueba=false;
    abrirModal(campo,cadenas['mensajeErrorDniInvalido']);
    document.getElementById(campo).style.borderColor = 'Red';//ponemos el color del input rojo
  } 
  else{
  document.getElementById(campo).style.borderColor = 'Green';//ponemos el color del input verde
  }
  return prueba;
}
//funcion para comprobar si cumple los requisitos de dni,puede aceptarlo como vacio
function comprobarDniVacio(campo) { //Lo uso para poder meter un campo vacio en el search

  var prueba=true;//variable para comprobar que se cumple el patron
  var valor=document.getElementById(campo).value; /*Meto el valor del atributo que estoy comprobando*/
  var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T']; //Meto las letras para comprobar el dni
  if(comprobarLetrasNumerosVacio(campo,9)){
    if(document.getElementById(campo).value.length==9 && valor.charAt(8) != letras[(valor.substring(0,8))%23]){
    document.getElementById(campo).style.borderColor = 'red';//Si el campo es incorrecto pone el borde rojo
    prueba=false;
  } 
  else{
      document.getElementById(campo).style.borderColor = 'green'; // cambiamos el color del borde del elemento html a verde
      prueba=true;
    }
  }
  else{
    document.getElementById(campo).style.borderColor = 'red'; // cambiamos el color del borde del elemento html a verde
    prueba=false;
  }
  return prueba;
}
//funcion para comprobar si un campo cumple con los requisitos de un telefono
function comprobarTelf(campo) {

  var prueba=true;//boolean para realizar la comprobacion
  var valor=document.getElementById(campo).value; /*Meto el valor del atributo que estoy comprobando*/
  if( !(/^\d{9}$/.test(valor)) && !(/^34\d{9}$/).test(valor) && !(/^\d{3}-\d{3}-\d{3}$/.test(valor))) {//comprobamos si cumple con los requisitos de un telefono
    document.getElementById(campo).style.borderColor = 'Red';//ponemos el color del input rojo
    abrirModal(campo, cadenas['mensajeTelefonoIncorrecto']);
    return false;
  }
  else{
 document.getElementById(campo).style.borderColor = 'Green';//ponemos el color del input verde
  }
  return prueba;
}
//funcion para comprobar si cumple los requisitos de telefono,puede aceptarlo como vacio
function comprobarTelfVacio(campo) { //Lo uso para poder meter el campo vacio en el search

  var prueba=true;

  var valor=document.getElementById(campo).value; /*Meto el valor del atributo que estoy comprobando*/
  if(!comprobarEnteroVacio(campo,0,99999999999)){
    prueba=false;
    document.getElementById(campo).style.borderColor = 'Red';//Si el campo es correcto pone el borde verde
  }
  /*
  if( !(/^\d{9}$/.test(valor)) && !(/^\+34\s\d{9}$/).test(valor) && !(/^\d{3}-\d{3}-\d{3}$/.test(valor))) {
  document.getElementById(campo).style.borderColor = 'Red';//Si el campo es correcto pone el borde rojo
    prueba= false;
  }
  */
  if(document.getElementById(campo).value.length==0){
    document.getElementById(campo).style.borderColor = 'Green';//Si el campo es correcto pone el borde verde
    prueba=true;
  }
  if(prueba){
    document.getElementById(campo).style.borderColor = 'Green';//Si el campo es correcto pone el borde verde
  }
  return prueba;
}
//funcion para comprobar si el campo esta formado por letras o numeros
 function comprobarLetrasNumeros(idelemento,size) {

      var correcto = true;
      
      if (!comprobarTexto(idelemento,size)) {
        abrirModal(idelemento, cadenas['mensajeCapacidadSuperada']);
        correcto = false;
      }
      
      var patron = /^[a-zA-Z0-9]+$/; // establecemos un patron para cualquier numero de digitos
      if (!patron.test(document.getElementById(idelemento).value)){ // si no cumple el patron pq hay elementos que no son digitos
        abrirModal(idelemento, cadenas['mensajeExpresionIncorrecta']);
        correcto = false;
      }
      
      if (correcto){
        document.getElementById(idelemento).style.borderColor = "green"; // cambiamos el color del borde del elemento html a verde
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";//cambiamos el color del borde del elemento html a rojo
        return false;
      }

    }
    //funcion para comprobar si el campo esta formado por letras o numeros,acepta el campo vacio
    function comprobarLetrasNumerosVacio(campo,size) { //Lo uso para poder meter un campo vacio en el search

      var correcto = true;
      
      if (!comprobarTexto(campo,size)) {
        document.getElementById(campo).style.borderColor = 'Red';//Si el campo es incorrecto pone el borde rojo
        correcto = false;
      }
      
      var patron = /^[a-zA-Z0-9]+$/; // Creo un patrón solo con letras y dígitos
      if (!patron.test(document.getElementById(campo).value)){ // No cumple el patron
        document.getElementById(campo).style.borderColor = 'Red';//Si el campo es incorrecto pone el borde rojo
        correcto = false;
      }
      if(document.getElementById(campo).value.length==0){
        correcto= true;
      }
      if(correcto){
         document.getElementById(campo).style.borderColor = 'green'; // cambiamos el color del borde del elemento html a verde
      }
      return correcto;

    }
//funcion para comprobar el formato de email
      function comprobarEmail(idelemento,size) {
    
      var correcto = true;

      if (comprobarTexto(idelemento,size)==false) {
        abrirModal(idelemento, cadenas['mensajeCapacidadSuperada']);
        correcto = false;
      }
      
      var patron = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/; // establecemos un patron para un email
      if (!patron.test(document.getElementById(idelemento).value)){ // si no cumple el patron pq hay elementos que no son digitos
        abrirModal(idelemento,cadenas['mensajeEmailErroneo']);
        correcto = false;
      }

      if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green'; // cambiamos el color del borde del elemento html a verde
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';// cambiamos el color del borde del elemento html a rojo
        return false;
      }
      
    }
    //funcion para comprobar si cumple los requisitos de email,puede aceptarlo como vacio
      function comprobarEmailVacio(campo,size) { //Lo uso para poder meter el campo vacio en el search
    
      var correcto = true;

      if (comprobarTexto(campo,size)==false) {
        correcto=false;
      }
      
      var patron = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/; // establecemos un patron para un email
      if (!patron.test(document.getElementById(campo).value)){ // si no cumple el patron pq hay elementos que no son digitos
        document.getElementById(campo).style.borderColor = 'Red';//Si el campo es incorrecto pone el borde rojo
        correcto=false;
      }   
      if(document.getElementById(campo).value.length==0){
       correcto=true;
     }
     if(correcto){
      document.getElementById(campo).style.borderColor = 'green'; // cambiamos el color del borde del elemento html a verde
     }
      return correcto;  
    }
  //funcion para comprobar si cumple los requisitos de letras
 function comprobarAlfabetico(idelemento,size) {
     var patron =  /^([a-zA-Z]+(\s+[a-zA-Z]+)?)+$/;//patron que se usa para validar
     nombre = document.getElementById(idelemento).name; //nombre del campo
     longitud = document.getElementById(idelemento).value.length; //longitud del campo
     if (!comprobarTexto(idelemento,size)){//SI la longitud es mayor que el tamaño prestablecido se pone en rojo
          abrirModal(idelemento,cadenas['mensajeCapacidadSuperada']);
          document.getElementById(idelemento).style.borderColor = "red";
          return false;
     }
     if(!comprobarExpresionRegular(idelemento,patron,size)){ //Si no cumple la expReg o el tamaño
          abrirModal(idelemento,cadenas['mensajeAlfabeticoIncorrecto']);
          return false;
     }
     //Si lo cumple devuelve true 
       document.getElementById(idelemento).style.borderColor = "green";
     return true;
}
//funcion para comprobar letras(deja incluir el campo vacio)
 function comprobarAlfabeticoVacio(campo,size) { //Lo uso para poder meter el campo vacio en el search
     var patron =  /^([a-zA-Z]+(\s+[a-zA-Z]+)?)+$/;//Este es el patrón en el que meto solo letras
     nombre = document.getElementById(campo).name; //nombre del campo
     var prueba=true;
     if (!comprobarTexto(campo,size)){//Si la longitud del campo es demasiado grande da un error
      document.getElementById(campo).style.borderColor = 'Red';//Si el campo es incorrecto pone el borde rojo
          prueba = false;
     }
     if(!comprobarExpresionRegular(campo,patron,size)){ //Si no cumple el patrón devuelve false
      document.getElementById(campo).style.borderColor = 'Red';//Si el campo es incorrecto pone el borde rojo
          prueba = false;
     }
     if(document.getElementById(campo).value.length==0){
          prueba= true;
     }
     if(prueba){
      document.getElementById(campo).style.borderColor = 'green'; // cambiamos el color del borde del elemento html a verde
     }
     return prueba;
}
//funcion para comprobar si cumple los requisitos de tamaño de un numero
      function comprobarEntero(idelemento,tamañomenor,tamañomayor) {
      
      var correcto = true;

      var patron = /^\d+$/; // establecemos un patron para cualquier numero de digitos
      if (!patron.test(document.getElementById(idelemento).value)){ // si no cumple el patron pq hay elementos que no son digitos
        abrirModal(idelemento, cadenas['mensajeErrorNumeros']);
        correcto = false;
      }

      if (document.getElementById(idelemento).value<tamañomenor||document.getElementById(idelemento).value>tamañomayor) {
        abrirModal(idelemento, cadenas['mensajeFueraRango']);
        correcto = false;
      }

      if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green'; // ponemos el bordercolor a verde
        return true; // devolvemos true
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red'; // ponemos el bordercolor a rojo
        return false;
      }
      
    }
    //funcion para comprobar enteros(deja incluir el campo vacio)
     function comprobarEnteroVacio(campo,tamanhomenor,tamanhomayor) {
      
      var correcto = true;

      var patron = /^\d+$/; // establezco un patrón solo con números
      if (!patron.test(document.getElementById(campo).value)){ // si el valor no cumple el patrón hay valores que no son dígitos
        document.getElementById(campo).style.borderColor = 'red'; // pongo el borde del campo rojo
        correcto= false;
      }

      if (document.getElementById(campo).value<tamanhomenor||document.getElementById(campo).value>tamanhomayor) {
        document.getElementById(campo).style.borderColor = 'red'; // pongo el borde del campo rojo
        correcto= false;
      }
      if(document.getElementById(campo).value.length==0){
      correcto=true;
    }
    if(correcto){
        document.getElementById(campo).style.borderColor = 'green'; // pongo el borde del campo verde
    }
    return correcto;     
    }
    //funcion para comprobar numeros reales
   function comprobarReal(campo, numerodecimales, valormenor, valormayor){
     valor = document.getElementById(campo).value;
     nombre = document.getElementById(campo).name;
     correcto = false;

     if (valor % 1 != 0 ) {//Si no es un valor entero
          correcto = true;
          if (valor<valormenor) { //Si valor es menor que el valor minimo establecido
               abrirModal(campo, cadenas['mensajeFueraRango']);
               correcto = false;
          }
          if (valor>valormayor) { //Si el valor es mayor que el maximo establecido
               abrirModal(campo,  cadenas['mensajeFueraRango']);
               correcto = false;
          }
     }else//Si es entero
     {
          abrirModal(campo,  nombre +" es entero, no decimal");
          correcto = false;
     }
     if (correcto){
          document.getElementById(campo).style.borderColor = 'green';
          return true;
     }
     else{
          document.getElementById(campo).style.borderColor = "red";
          return false;
     }
}
      //funcion para comprobar expresiones regulares
      function comprobarExpresionRegular(campo, exprreg, size){
         var correcto = false; //bool que usamos para controlar
         valor = document.getElementById(campo).value; //valor del campo
         nombre = document.getElementById(campo).name; //nombre del campo
         longitud = document.getElementById(campo).value.length; //longitud del campo
         var patron = exprreg; //patron con una espresion regular

         if (longitud > size){
              abrirModal(campo,  cadenas['mensajeCapacidadSuperada']);
              correcto = false;
         }else{
              if(!patron.test(valor)) {
                   correcto = false;
              }
              else {
                   correcto =true;
              }
         }

         if (correcto){//SI todo pasa todas las comprobaciones
              document.getElementById(campo).style.borderColor = 'green';
              return true;
         }
         else{//Si no las pasa
              document.getElementById(campo).style.borderColor = "red";
              return false;
         }
    }
    //funcion para comprobar el campo anhoacademico
   function comprobarAnhoAcademico (campo) {
  var dato = document.getElementById(campo).value;//recogemos el valor del campo
  var expresion_regular = /^[0-9]{4}-[0-9]{4}$/;//establecemos el patron
  var correcto=false;
  if(expresion_regular.test(dato) == true) {//comprobamos si el campo cumple con el patron
    correcto=true;
  } else {//devolvemos un div indicando el error
    abrirModal(campo,cadenas['formatoAnhoAcademico']);
    correcto=false;
  }

         if (correcto){//SI todo pasa todas las comprobaciones
              document.getElementById(campo).style.borderColor = 'green';
              return true;
         }
         else{//Si no las pasa
              document.getElementById(campo).style.borderColor = "red";
              return false;
         }


}

    