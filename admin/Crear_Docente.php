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
      <?php
           require ("coneccion.php");
           $query="SELECT * FROM `docente` WHERE ID_Docente=$ID_User";
          
           $resultado=mysql_query($query,$link);
   
           while($row=mysql_fetch_array($resultado))
           {
              echo "<tr><td></td><td><img src='user.jpg' width='120' height='120'></td></tr>";
              echo "<tr><td>Usuario :</td><td>".$row['Nombre_Completo']." "
              .$row['Apellido_Paterno']."".$row['Apellido_Materno']."</td></tr>";
              echo "<tr><td>Cargo :</td><td>Administrador</td></tr>";
              echo "<tr><td>Nivel de estudios :</td><td>".$row['Profesion']."<td></tr>";
              echo "<tr><td>login :</td><td>".$row['User_Login']."<td></tr>";
           }
       ?>
    </table>
    
  </aside>

<article id="cuerpo">
  <form method="post" action="">
  <center><input  type="submit" name='btn_Crear_Docente' value='Crear Docente' >
  <input type='submit' value='Listado de Docente' name='btn_Ver_Listado_Docente'></center>
  </form>
 
  <?php

  require('coneccion.php');
    //BOTON CREAR DOCENTES    
    if(isset($_POST['btn_Crear_Docente'])){
      
        echo "<form method='post' action=''>
        <table>
        <tr><td>Nombre Completo</td><td><input type='text' size='80' name='txt_Nombre'></td></tr>
        <tr><td>Apellido Paterno</td><td><input type='text' size='80' name='txt_Apellido_P'></td></tr>
        <tr><td>Apellido Materno</td><td><input type='text' size='80' name='txt_Apellido_M'></td></tr>
        <tr><td>Profesiones</td><td><textarea type='text' rows='3' cols='82' name='txt_Profesion'></textarea></tr>
        <tr><td>Telefono</td><td><input type='text' name='txt_Telefono'></td></tr>
        <tr><td>Celular</td><td><input type='text' name='txt_Celular'></td></tr>
        <tr><td>Correo</td><td><input type='text' size='80' name='txt_Correo'></td></tr>
        <tr><td>Direccion</td><td><textarea type='text' rows='3' cols='82' name='txt_Direcion'> </textarea></td>
        <tr><td>User Name</td><td><input type='text' name='txt_User' ></td></tr>
        <tr><td>Password</td><td><input type='password' name='txt_Password'></td></tr>
        <tr><td></td><td><input type='submit' size='80' name='btn_Registrar_Docente' value='Crear Docente'></td></tr></tr>";


      echo "</table></form>";
     }
     
     if (isset($_POST['btn_Registrar_Docente']))
     {
        $Nombre=$_POST['txt_Nombre'];
        $Apellido_P=$_POST['txt_Apellido_P'];
        $Apellido_M=$_POST['txt_Apellido_M'];
        $Profesiones=$_POST['txt_Profesion'];
        $Telefono=$_POST['txt_Telefono'];
        $Celular=$_POST['txt_Celular'];
        $Correo=$_POST['txt_Correo'];
        $Direccion=$_POST['txt_Direcion'];
        $User_Login=$_POST['txt_User'];
        $User_Password=$_POST['txt_Password'];



       $query="INSERT INTO `docente` VALUES (NULL, '$Nombre',
       '$Apellido_P', 
       '$Apellido_M',
       '$Profesiones', 
       '$Telefono', 
       '$Celular', 
       '$Correo', 
       '$Direccion',
       '$User_Login',
       '$User_Password');";

       $resultado=mysql_query($query,$link);

       echo "<script>alert('Docente Creado Correctamente');</script>";


        
     }



    //BOTON LISTADO DOCENTES
      if(isset($_POST['btn_Ver_Listado_Docente'])){
        echo "<table class='tabla_lista_docentes'><tr>
       <td colspan='2'>Nombres Completos</td>
       <td>Profesion</td>
       <td>Telefono</td>
       <td>Celular</td>
       <td>Correo</td>
       <td>Direccion</td>
       <td>User</td>
       <td>Password</td>
       </tr>";
        $query="SELECT * 
                 FROM docente";
       $resultado=mysql_query($query,$link);
      
      while($row=mysql_fetch_array($resultado))
      {
        echo "<form method='post' action=''>
         <input type='text' name='ID_Docente' style='visibility:hidden' value='".$row['ID_Docente']."'";
         echo "<tr><td>".$row['Nombre_Completo']."</td>";
         echo "<td>".$row['Apellido_Paterno']." ".$row['Apellido_Materno']."</td>";
         echo "<td>".$row['Profesion']."</td>";
         echo "<td>".$row['Telefono']."</td>";
         echo "<td>".$row['Celular']."</td>";
         echo "<td>".$row['Correo']."</td>";
         echo "<td>".$row['Direccion']."</td>";
         echo "<td>".$row['User_Login']."</td>";
         echo "<td>".$row['Password']."</td>
        
         <td>
         <input type='submit' name='btn_Editar_Docente'value='Editar'></td>
         <td><input type='submit' name='btn_Eliminar_Docente' value='Eliminar'></form></td></tr>";
      }
      echo "</table>";
        
      
     }
   
     if(isset($_POST['btn_Editar_Docente']))
     {
        $ID_Docente=$_POST['ID_Docente'];

        $query="SELECT * 
                 FROM docente WHERE ID_Docente=$ID_Docente";
        $resultado=mysql_query($query,$link);
        echo "<form method='post'><table>";

       while($row=mysql_fetch_array($resultado))
       {
        echo "<input type='text' name='ID_Docente' style='visibility:hidden' value='".$ID_Docente."'></p>";
         echo "<tr><td>Nombre Completo</td>
              <td><input type='text' name='Nombre_Completo' value='".$row['Nombre_Completo']."'></td></tr>";

         echo "<tr><td>Apellido Paterno</td>
               <td><input type='text' name='Apellido_Paterno' value='".$row['Apellido_Paterno']."'></td></tr>";

         echo "<tr><td>Apellido Materno</td>
               <td><input type='text' name='Apellido_Materno' value='".$row['Apellido_Materno']."'></td></tr>";
         
         echo "<tr><td>Profesion</td>
         <td><input type='text' name='Profesion' value='".$row['Profesion']."'></td></tr>";
         
         echo "<tr><td>Telefono</td>
         <td><input type='text' name='Telefono' value='".$row['Telefono']."'></td></tr>";

         echo "<tr><td>Celular</td>
         <td><input type='text' name='Celular' value='".$row['Celular']."'></td></tr>";
         
         echo "<tr><td>Correo</td>
         <td><input type='text' name='Correo' value='".$row['Correo']."'></td></tr>";
         
         echo "<tr><td>Direccion</td>
         <td><textarea name='Direccion' cols='80' rows='3' >".$row['Direccion']."</textarea></td></tr>"; 

         echo "<tr><td>User</td><td><input name='User' value='".$row['User_Login']."'></td></tr>";

         echo "<tr><td>Contrasena</td>
         <td><input type='text' name='Contrasena' value='".$row['Password']."'></td></tr>";

         echo "<tr><td><input type='submit' value='Realizar Editado' name='btn_Realizar_Editado'></td></tr>";
       }
       echo "</table></form>";

      }

      //BOTON EDITADO A LA BASE DE DATOS
      if(isset($_POST['btn_Realizar_Editado'])){
         
          $ID_Docente=$_POST['ID_Docente'];
          $Nombre=$_POST['Nombre_Completo'];
          $Apellido_Paterno=$_POST['Apellido_Paterno'];
          $Apellido_Materno= $_POST['Apellido_Materno'];
          $Profesion=$_POST['Profesion']." ";
          $Telefono=$_POST['Telefono']." ";
          $Celular=$_POST['Celular']." ";
          $Correo=$_POST['Correo']." ";
          $Direccion=$_POST['Direccion'];
         echo $User=$_POST['User'];
          echo $Password=$_POST['Contrasena'];

         $query="UPDATE docente
         SET Nombre_Completo = '$Nombre',
             Apellido_Paterno = '$Apellido_Paterno',
             Apellido_Materno = '$Apellido_Materno', 
             Profesion = '$Profesion', 
             Telefono = '$Telefono', 
             Celular = '$Celular', 
             Correo = '$Correo',
             Direccion = '$Direccion',
             User_Login='$User',
             Password='$Password'
             WHERE ID_Docente =$ID_Docente;";
             
             $resultado=mysql_query($query,$link);

             //echo "<script> alert('Datos Editados Correctamente');</script>";

      }
    
     
     if(isset($_POST['btn_Eliminar_Docente']))
     {
        $ID_Docente=$_POST['ID_Docente'];

        $query="DELETE FROM `docente` WHERE ID_Docente=$ID_Docente";
        $resultado=mysql_query($query,$link);
             echo "<script> alert('Datos Eliminados Correctamente');</script>";



      }

  ?>


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