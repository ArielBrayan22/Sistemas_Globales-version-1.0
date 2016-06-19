<?php
 session_start();
 

 if(isset($_SESSION['Alias']))
 {
    $Alias_User=$_SESSION['Alias']."</br>";
    $Password_User=$_SESSION['Password']."</br>";
    $ID_User=$_SESSION['ID']."</br>";
  ?> 

<html>
<head>
  <title>Sistema de Planes Globales</title>
  <link rel="stylesheet" type="text/css" href="Style.css">
  <link rel="stylesheet" type="text/css" href="Styles_funciones.css">
</head>
<body>
  <header><center><h2 id="titulo_Principal">Sistema de Planes Globales y Programas Analiticos</h2></center>

  <hr></hr>
   <DIV ALIGN=RIGHT><a class="redireccion_salir" href="salir.php">salir</a></DIV>
  </header>
  
   <aside id="menu">
     
    <div id="titulo"><a id="titulo" href="menu_root.php">Inicio</a></div>

    <div id="titulo"><a id="titulo" href="Crear_Plan_Global.php">Crear Plan Global</a></div>
    <div id="titulo"><a id="titulo" href="Crear_Materia.php">Crear Materia</a></div>
    <div id="titulo"><a id="titulo" href="Crear_Docente.php">Crear Docente</a></div>

    
    <div id="titulo"><a id="titulo" href="Programa_Analitico_Publico.php">Programas Analiticos</a></div>
    <div id="titulo"><a id="titulo" href="Operaciones_Manual_de_Usuario.php">Manual de Usuario</a></div>
      
   <table id="tabla_user">
      <tr><td></td><td><img src="user.jpg" width="120" height="120"></td></tr>
      <tr><td>usuario:</td><td>Ariel Brayan</td></tr>
      <tr><td>cargo:</td><td>Administrador</td></tr>
      <tr><td>nivel de estudios:</td><td>Prof. Doc. Masc. Ing. de Sistemas</td></tr>
       <tr><td>codigo:</td><td>2</td></tr>

    </table>
    
  </aside>

<article id="cuerpo">
 <center><img src="imagen.JPG"></center>


</article>

</body>


<footer>




<article id="footer">
<hr>
 <center>

 <h3 id="titulo_footer">Paginas Amigas</br>
 <a id="link_footer" href=""> Fcyt </a>
 <a id="link_footer" href=""> Umss </a>
 <a id="link_footer" href=""> Saga </a>
 <a id="link_footer" href=""> Moodle </a>
 <a id="link_footer" href=""> Caroline </a>
 </h3>
 

 </center>


</article>



</footer>
</html>

<?php  } 
else {
   header("location: Planes_Globales/index.php");
 } ?>