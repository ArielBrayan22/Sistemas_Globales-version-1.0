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
  <center><input  type="submit" name='btn_Crear_Materia' value='Crear Materia' >
  <input type='submit' value='Listado de Materias' name='btn_Ver_Listado_Materias'></center>
  </form>
 
  <?php

  require('coneccion.php');
        
    if(isset($_POST['btn_Crear_Materia'])){
      
        echo "<form method='post' action=''>
        <table>
        <tr><td>Seleccione la Facultad :</td><td><select name='select_F[]'>";

      
        $query="SELECT * 
                 FROM facultad";
       $resultado=mysql_query($query,$link);
   
      while($row=mysql_fetch_array($resultado))
      {
         echo "<option value=".$row['ID_Facultad'].">".$row['Facultad']."</option>";
      }
        
      echo "</select></td><td><input type='submit' value='Ingresar' name='btn_Facultad'></td><td></td></tr></table></form>";
     }

     if(isset($_POST['btn_Facultad'])){
        $Seleccion_F=$_POST['select_F'];

       for ($i=0;$i<count($Seleccion_F);$i++) 
       {  $ID_Facultad=$Seleccion_F[$i];} 

         $query="SELECT * FROM facultad 
         WHERE ID_Facultad=$ID_Facultad";

        $resultado=mysql_query($query,$link);
        echo "<center><h3>".mysql_result($resultado, 0, "Facultad")."</h3></center>";

        
        echo "<form method='post'>
             <table>
             <tr><td>Seleccione la Carrera :</td><td><select name='select_C[]'>";
             $query="SELECT * 
             FROM carrera 
             WHERE id_facultad=$ID_Facultad";
            $resultado=mysql_query($query,$link);
            while($row=mysql_fetch_array($resultado))
            {
              echo "<option value='".$row['ID_Carrera']."'>".$row['nombre_carrera']."</option>";
            }


         echo "</select></td><td><input type='submit' name='btn_Carrera' value='Crear Materia en'></td></tr></table>
         </form>";

         }

        if(isset($_POST['btn_Carrera']))
        {
            $Seleccion_C=$_POST['select_C'];

          for ($i=0;$i<count($Seleccion_C);$i++) 
            {  $ID_Carrera=$Seleccion_C[$i];} 

          //echo "el ID DE LA CARRERA :".$ID_Carrera."";
          
          
          $query="SELECT * FROM carrera 
                  WHERE id_carrera=$ID_Carrera";

          $resultado=mysql_query($query,$link);
          
          echo "<center><h3>".mysql_result($resultado, 0, "nombre_carrera")."</h3></center>";

          echo "<h3>Ingrese los datos de la Materia a crear :</h3>";

          echo "<form method='post' action=''>
                <table>
                <input type='text' value='$ID_Carrera' name='txt_Codigo_C' style='visibility:hidden'>

                <tr><td>Nombre Materia</td><td><input type='text' size='80' name='txt_Nombre_M'></td></tr>
                <tr><td>Codigo</td><td><input type='text' name='txt_Codigo_M'></td></tr>
                <tr><td>Nivel</td><td><input type='text' size='5' name='txt_Nivel_M'></td></tr>
                <tr><td>Grupo</td><td><input type='text' size='5' name='txt_Grupo_M'></td></tr>
                <tr><td>Carga Horaria</td><td><input type='text' name='txt_Carga_M'></td></tr>
                <tr><td>Materias Relacionadas</td><td><textarea name='txt_Materias_R' cols='85' rows='3'> </textarea></td></tr>
                <tr><td></td><td><input type='submit' name='btn_Ingresar_Materia' value='Crear Materia'></td></tr>
                
                </table></form>";
         
        }

        if(isset($_POST['btn_Ingresar_Materia'])){
          //echo "materia ingresada correctamente";
          $Nombre_M=$_POST['txt_Nombre_M'];
          $Codigo_M=$_POST['txt_Codigo_M'];
          $Grupo_M=$_POST['txt_Grupo_M'];
          $Nivel_M=$_POST['txt_Nivel_M'];
          $CargaH_M=$_POST['txt_Carga_M'];
          $Materias_R=$_POST['txt_Materias_R'];
          $ID_Carrera=$_POST['txt_Codigo_C'];


          $query="INSERT INTO `materia` (`ID_Materia`, `Nombre_Materia`, `Codigo`, `Grupo`, 
                                         `Nivel_Materia`, `Carga_Horaria`, `Materias_Relacionadas`, `ID_Carrera`) 
          VALUES (NULL, '$Nombre_M', '$Codigo_M', '$Grupo_M', '$Nivel_M', '$CargaH_M', '$Materias_R', '$ID_Carrera');";
          $resultado=mysql_query($query,$link);

          echo "<script>alert('Materia Creada Correctamente');</script>";

        }

        // BOTON LISTADO DE MATERIAS

         if(isset($_POST['btn_Ver_Listado_Materias']))
         {
           //echo "Estamos dentro";
          $query="SELECT * FROM materia m,carrera c WHERE m.ID_Carrera=c.ID_Carrera
                  ORDER BY m.Nivel_Materia ASC";
          
          $resultado=mysql_query($query,$link);
          echo "  <table class='tabla_lista_docentes'>
          <tr><td>Materia</td><td>Codigo</td><td>Grupo</td><td>Nivel</td><td>Carga Horaria</td><td>Carrera</td><td></td><td></td></tr>";

          while($row=mysql_fetch_array($resultado))
          {
              echo "<form method='post' action=''>
                    
                     <tr> <input type='text' value='".$row['ID_Materia']."' name='txt_ID_M' style='visibility:hidden'>
                     <td>".$row['Nombre_Materia']."</td>
                     <td>".$row['Codigo']."</td>
                     <td>".$row['Grupo']."</td>
                     <td>".$row['Nivel_Materia']."</td>
                     <td>".$row['Carga_Horaria']."</td>
                     <td>".$row['nombre_carrera']."</td>
                    
                     <td> <input type='submit' value='Editar' name='btn_Editar_M'></td>
                     <td> <input type='submit' value='Eliminar' name='btn_Eliminar_M'></td></tr>
                     </form>";
          }

          echo "  </table>";

         }



         if(isset($_POST['btn_Editar_M'])){
          echo "<H3>Editado de Materia</H3>";
          $ID_Materia=$_POST['txt_ID_M'];

           $query="SELECT * FROM materia 
                  WHERE ID_Materia=$ID_Materia";

          $resultado=mysql_query($query,$link);
          
         echo "  
          <table>";

          while($row=mysql_fetch_array($resultado))
          {
              echo "<form method='post' action=''>
                    
                     <input type='text' value='".$row['ID_Materia']."' name='txt_ID_M' style='visibility:hidden'>
                     <tr><td><input type='text' size='100' name='txt_Nombre_M' value='".$row['Nombre_Materia']."'></td></tr>
                     <tr><td><input name='txt_Codigo_M' value='".$row['Codigo']."'></td></tr>
                     <tr> <td><input name='txt_Grupo_M' value='".$row['Grupo']."'></td></tr>
                     <tr><td><input name='txt_Nivel_M' value='".$row['Nivel_Materia']."'></td></tr>
                     <tr><td><input name='txt_Carga_M' value='".$row['Carga_Horaria']."'></td></tr>
                     <tr><td><textarea cols='100' rows='5' name='txt_Materias_R'>".$row['Materias_Relacionadas']."</textarea></td></tr>
                     <tr><td> <input type='submit' value='Cambiar de Carrera' name='btn_Cambiar_Carrera'></td>
                     </tr> <tr><td> <input type='submit' value='Editar' name='btn_Editar_Materia'></td></tr>
                     </form>";
          }

          echo "  </table>";
         }

      
      if(isset($_POST['btn_Editar_Materia']))
      {
        echo "MATERIA EDITADA CORRECTAMENTE";
           $ID_Materia=$_POST['txt_ID_M'];
           $Nombre_M=$_POST['txt_Nombre_M'];
           $Codigo_M=$_POST['txt_Codigo_M'];
           $Grupo_M=$_POST['txt_Grupo_M'];
           $Nivel_M=$_POST['txt_Nivel_M'];
           $CargaH_M=$_POST['txt_Carga_M'];
           $Materias_R=$_POST['txt_Materias_R'];

          $query="UPDATE `materia` 
                 SET `Nombre_Materia` = '$Nombre_M',
                     `Codigo` = '$Codigo_M', 
                     `Grupo` = '$Grupo_M', 
                     `Nivel_Materia` = '$Nivel_M',
                     `Carga_Horaria` = '$CargaH_M',
                     `Materias_Relacionadas` = '$Materias_R' 
                      WHERE `materia`.`ID_Materia` = $ID_Materia;";

          $resultado=mysql_query($query,$link);

          echo "<script>alert('Materia Editada Correctamente');</script>";

      }
 


     if(isset($_POST['btn_Cambiar_Carrera']))
     {
        echo "REALICE EL CAMBIO DE CARRERA A LA MATERIA";
         $Codigo_M=$_POST['txt_ID_M'];

        echo "<form method='post' action=''>
        <table>
        <input type='text' value='". $Codigo_M."' name='txt_ID_M' style='visibility:hidden'>
        <tr><td>Seleccione la Facultad :</td><td><select name='select_F[]'>";
       
        $query="SELECT * FROM facultad";
        $resultado=mysql_query($query,$link);
   
      while($row=mysql_fetch_array($resultado))
      {
         echo "<option value=".$row['ID_Facultad'].">".$row['Facultad']."</option>";
      }
        
      echo "</select></td>
           <td><input type='submit' value='Ingresar' name='btn_Facultad_Materia'></td>
           <td></td></tr></table></form>";
     }


     if(isset($_POST['btn_Facultad_Materia'])){
         $Seleccion_F=$_POST['select_F'];
        echo "</p>";
        $Codigo_M=$_POST['txt_ID_M'];

       for ($i=0;$i<count($Seleccion_F);$i++) 
       {  $ID_Facultad=$Seleccion_F[$i];} 

         $query="SELECT * FROM facultad 
         WHERE ID_Facultad=$ID_Facultad";

        $resultado=mysql_query($query,$link);
        echo "<center><h3>".mysql_result($resultado, 0, "Facultad")."</h3></center>";

        
        echo "<form method='post'>
             <table>
             <input type='text' value='". $Codigo_M."' name='txt_ID_M' style='visibility:hidden'>
             <tr><td>Seleccione la Carrera :</td><td><select name='select_C[]'>";
             $query="SELECT * 
             FROM carrera 
             WHERE id_facultad=$ID_Facultad";
            $resultado=mysql_query($query,$link);
            while($row=mysql_fetch_array($resultado))
            {
             
               echo "<option value='".$row['ID_Carrera']."'>".$row['nombre_carrera']."</option>";
            }

         echo "</select></td><td><input type='submit' name='btn_Carrera_Cambio' value='Cambiar'></td></tr></table>
         </form>";
       }
       
        if(isset($_POST['btn_Carrera_Cambio']))
        {
               $Codigo_M=$_POST['txt_ID_M'];
               $Seleccion_C=$_POST['select_C'];

          for ($i=0;$i<count($Seleccion_C);$i++) 
            {  $ID_Carrera=$Seleccion_C[$i];} 

          //echo "el ID DE LA CARRERA :".$ID_Carrera."";
          $query="UPDATE `materia` SET `ID_Carrera` = '$ID_Carrera' WHERE `materia`.`ID_Materia` = $Codigo_M;";
          $resultado=mysql_query($query,$link);
          
          $query="SELECT * FROM carrera WHERE id_carrera=$ID_Carrera";
          $resultado=mysql_query($query,$link);
          echo "<center>Se cambio a la carrera de :<h3>".mysql_result($resultado, 0, "nombre_carrera")."</h3></center>";
          echo "<script>alert('Se Cambio Correctamente');</script>";

          }


       // BOTON ELIMINAR MATERIA

        if(isset($_POST['btn_Eliminar_M']))
        {
            $ID_Materia=$_POST['txt_ID_M'];
            $query="DELETE FROM `materia` WHERE ID_Materia=$ID_Materia";
            $resultado=mysql_query($query,$link);
            echo "<script>alert('Se Cambio Correctamente');</script>";
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