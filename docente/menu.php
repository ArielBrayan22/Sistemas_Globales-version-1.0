<?php
 session_start();
 

 if(isset($_SESSION['Alias']))
 {
    $Alias_User=$_SESSION['Alias'];
    $Password_User=$_SESSION['Password'];
    $ID_User=$_SESSION['ID'];
  ?> 

<html>
<head>
	<title>Sistema de Planes Globales</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
  <link rel="stylesheet" type="text/css" href="Styles_Funciones.css">
</head>
<body>
	<header id="main-header">
    <a id="logo-header" href="#">
      <span class="site-name">PLANES GLOBALES Y PROGRAMAS ANALITICOS</span>
    </a> <!-- / #logo-header -->
 
    <nav>
      <ul>
        <li><a href="pagina_ayuda.html">Ayuda</a></li>
        <li><a href="#">Contactanos</a></li>
      </ul>
    </nav><!-- / nav -->
  </header><!-- / #main-header -->
   <hr></hr>
   <DIV ALIGN=RIGHT><a class="redireccion_salir" href="salir.php">salir</a></DIV>
	
	<aside id="menu">
    <div id="titulo"><a id="titulo" href="menu.php">Inicio</a></div>
    <div id="titulo">

    <a id="titulo" href="Plan_Global_Publico.php">Planes Globales</a>


    </div>
    <div id="titulo"><a id="titulo" href="Programa_Analitico_Publico.php">Programas Analiticos</a></div>
    <div id="titulo"><a id="titulo" href="Manual_de_Usuario.php">Manual de Usuario</a></div>

      <table id="tabla_user">
      <?php
           require ("coneccion.php");
           $query="SELECT * FROM `docente` WHERE ID_Docente=$ID_User";
          
           $resultado=mysql_query($query,$link);
   
           while($row=mysql_fetch_array($resultado))
           {
              echo "<tr><td></td><td><img src='user.jpg' width='120' height='120'></td></tr>";
              echo "<tr><td>Usuario :</td><td>".$row['Nombre_Completo']." "
              .$row['Apellido_Paterno']." ".$row['Apellido_Materno']."</td></tr>";
              echo "<tr><td>Cargo :</td><td>Docente</td></tr>";
              echo "<tr><td>Nivel de estudios :</td><td>".$row['Profesion']."<td></tr>";
              echo "<tr><td>login :</td><td>".$row['User_Login']."<td></tr>";
           }
       ?>
    </table>
    
	</aside>

<article id="cuerpo">
     

   <form method="post" action="obciones_docente.php">
   <input type="submit" name="btn_Materias" value="Materias">
 
   
   </form>
    <center><img src="/Sistemas_Globales-version-1.0/imagenes/slider4.jpg" width="80%" height="60%"></center>


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