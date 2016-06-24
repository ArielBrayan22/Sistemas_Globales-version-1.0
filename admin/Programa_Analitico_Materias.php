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
  <form method="post" action="Programa_Analitico_Contenido.php">
  <?php
    $enlace = mysql_connect('localhost','root','');
    if (!$enlace) {
      die('no pudo conectarse: '.mysql_error());
    }
    mysql_select_db('planglobal',$enlace);
    $carre = $_POST['carre'];
    $resultado = mysql_query("SELECT * FROM materia, carrera WHERE materia.ID_Carrera = carrera.ID_Carrera AND carrera.nombre_carrera='$carre'",$enlace);
    echo "<table>";  
    echo "<tr>";  
    echo "<th>Materias</th>";  
    echo "</tr>";
    while ($row = mysql_fetch_row($resultado)){   
      $materia = $row[1];
       $ID_Materia=$row[0];
      echo "<tr>";  
      echo "<form method='post' action='Programa_Analitico_Contenido.php'>
                <input type='text' name='code_Materia' value='$ID_Materia' style='visibility:hidden'>
                <td><input type='submit' name = 'mate' value='$materia'></td>";

      echo "</tr></form>";  
    }  
    echo "</table>";
  ?>
  </form>
 
  <?php

  require('coneccion.php');
        
    if(isset($_POST['btn_Plan_Global'])){
      
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


         echo "</select></td><td><input type='submit' name='btn_Carrera' value='Ingresar'></td></tr></table>
         </form>";

 
         echo "<form method='post' >
            <center><input type='submit' value='atras' name='btn_Plan_Global'> </center>";}

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


          

           echo "<form method='post'>
             <table>
             <tr><td>Seleccione la Materia :</td><td><select name='select_M[]'>";
             $query="SELECT * 
             FROM materia 
             WHERE ID_Carrera=$ID_Carrera";
            $resultado=mysql_query($query,$link);
            while($row=mysql_fetch_array($resultado))
            {
              echo "<option value='".$row['ID_Materia']."'>".$row['Nombre_Materia']."</option>";
            }


         echo "</select></td><td><input type='submit' name='btn_Materia' value='Ingresar'></td></tr></table>
         </form>";
        }

         if(isset($_POST['btn_Materia']))
         {

          $Seleccion_M=$_POST['select_M'];

          for ($i=0;$i<count($Seleccion_M);$i++) 
            {  $ID_Materia=$Seleccion_M[$i];} 

          //echo $ID_Materia;

          $query="SELECT * FROM materia 
                  WHERE ID_Materia=$ID_Materia";

          $resultado=mysql_query($query,$link);
          
          echo "<center><h3>".mysql_result($resultado, 0, "Nombre_Materia")."</h3></center>";

             echo "<form method='post'>
             <input type='text' value='$ID_Materia' name='txt_ID_Materia' style='visibility:hidden'>
             <table>
             <tr><td>Seleccione al Docente :</td><td><select name='select_D[]'>";
            
             $query="SELECT * FROM `docente` ORDER BY `docente`.`Nombre_Completo` ASC";
             $resultado=mysql_query($query,$link);

            while($row=mysql_fetch_array($resultado))
            {
              echo "<option value='".$row['ID_Docente']."'>".
              $row['Nombre_Completo']." ".
              $row['Apellido_Paterno']." ".
              $row['Apellido_Materno']."</option>";
            }


         echo "</select></td></tr>
         <tr><td>Seleccione el tipo :</td><td><select name='select_tipo[]'>
         <option value='Normal'>Normal
         </option>
         <option vale='Titular'>Titular
         </option>
         <select></td></tr></tr>
         <td><input type='submit' name='btn_Crear_Plan_Global' value='Crear Plan Global'></td></tr></table>
         </form>";

         }


         if(isset($_POST['btn_Crear_Plan_Global']))
         {
          // echo "nesecito el ID_DOCENTE - ID_MATERIA y se creara un nuevo plan globla";
             $Select_D=$_POST['select_D'];
               for ($i=0;$i<count($Select_D);$i++) 
            {  $ID_Docente=$Select_D[$i];} 

            // echo $ID_Docente;

              $Select_C=$_POST['select_tipo'];
               for ($i=0;$i<count($Select_C);$i++) 
            {  $Tipo=$Select_C[$i];} 
            //echo $Tipo."</p>";

             $ID_Materia=$_POST['txt_ID_Materia'];

           $query="INSERT INTO planglobal 
            (ID_PG,tipo,ID_Materia,ID_Docente) 
            VALUES (NULL, '".$Tipo."', '".$ID_Materia."', '".$ID_Docente."');";
            $resultado=mysql_query($query,$link);
          echo "<script>alert('Plan Global Creado Exitosamente');</script>";

          echo "<form method='post' action=''>
           <input type='submit' value='salir' name='btn_Plan_Global'>
          </form>";

         }
         

         if(isset($_POST['btn_Ver_Planes_Globales'])){
          echo "<H3>LISTADO DE PLANES GLOBLAES</H3>";

          $query="SELECT * FROM planglobal pg, materia m, docente d
                   WHERE pg.ID_PG AND PG.ID_Materia=M.ID_Materia AND pg.ID_Docente=d.ID_Docente ORDER BY m.Nombre_Materia ASC";
          
          $resultado=mysql_query($query,$link);
          echo "  <table class='tabla_lista_docentes'>
                <tr><td>Nombre de la Materia</td>
                    <td>Codigo</td>
                    <td>Tipo</td>
                    <td>Docente Asignado</td>
                    <td></td>
                    <td></td>

                </tr>";

          while($row=mysql_fetch_array($resultado))
          {
              echo "<form method='post' action=''>
                    
                     <tr> <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG' style='visibility:hidden'>
                     
                     <td>".$row['Nombre_Materia']."</td>
                     <td>".$row['Codigo']."</td>
                     <td>".$row['tipo']."</td>
                     <td>".$row['Nombre_Completo']." ".$row['Apellido_Paterno']." ".$row['Apellido_Materno']."</td>
                     <td> <input type='submit' value='Editar' name='btn_Editar_PG'></td>
                     <td> <input type='submit' value='Eliminar' name='btn_Eliminar_PG'></td></tr>
                     </form>";
          }

          echo "  </table>";
         }

        if(isset($_POST['btn_Editar_PG']))
        {
            $ID_PG_Editado=$_POST['txt_ID_PG'];

            echo "<h3>SELECCIONE LOS CAMBIOS QUE QUIERA REALIZAR</h3>";

            $query="SELECT * FROM planglobal pg, materia m, docente d
                   WHERE pg.ID_PG=$ID_PG_Editado AND PG.ID_Materia=M.ID_Materia AND pg.ID_Docente=d.ID_Docente";
            
           
            echo "  <table class='tabla_PG'>";
             $resultado=mysql_query($query,$link);

             while($row=mysql_fetch_array($resultado))
             {
              echo "<form method='post' action=''>
                    
                     <tr> <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG' style='visibility:hidden'></tr>
                     
                     <tr><td>Materia :</td><td colspan='2'>".$row['Nombre_Materia']."</td></tr>
                     <tr><td>Codigo :</td><td>".$row['Codigo']."</td></tr>
                     <tr><td>Tipo :</td><td>".$row['tipo']." Cambiar a :</td><td>
                     <select name='select_tipo_PG[]'>
                     <option></option>
                     <option value='Normal'>Normal</option>
                     <option value='Titular'>Titular</option>
                     </select></td></tr>
                     <tr><td>Docente : </td><td>".$row['Nombre_Completo']." "
                     .$row['Apellido_Paterno']." ".$row['Apellido_Materno']."</td><td>
                      Cambiar a :";
                    
                     
                        $query1="SELECT COUNT(*) FROM docente";
                        $resultado1=mysql_query($query1,$link);

                        $n=mysql_result($resultado1, 0, "COUNT(*)");

                        $query2="SELECT * FROM docente";
                        $resultado2=mysql_query($query2,$link);
                        echo "<select name='doc[]'>";
                        for ($i=0; $i <$n ; $i++) { 
                         
                                 echo" <option></option>
                                  <option value=".mysql_result($resultado2, $i, "ID_Docente").">".
                                            mysql_result($resultado2, $i, "Nombre_Completo")." ".
                                            mysql_result($resultado2, $i, "Apellido_Paterno")." ".
                                            mysql_result($resultado2, $i, "Apellido_Materno")." ".
                                            "</option>";
                               
                                
                        }
                     
                     echo "  </select></td></tr>
                     <td> <input type='submit' value='Editar' name='btn_PG_Cambios'></td></td>
                    
                     </form>";
              }

              echo "  </table>"; 
         
        }

  
        //BOTON REALIZAR CAMBIOS EN PLAN GLOBAL 
        if(isset($_POST['btn_PG_Cambios']))
        {

           $ID_PG=$_POST['txt_ID_PG'];
         
          $Selec_Docente=$_POST['doc'];

          for ($i=0;$i<count($Selec_Docente);$i++) 
          { $Doc_Selec=$Selec_Docente[$i];
             } 

          $Doc_Selec;
        
          $Selec_Tipo=$_POST['select_tipo_PG'];

          for ($j=0;$j<count($Selec_Tipo);$j++) 
          { $Tipo_Selec=$Selec_Tipo[$j];
             } 

           $Tipo_Selec;
        

        if($Tipo_Selec!=""){
          $query="UPDATE `planglobal` SET 
                 `tipo` = '$Tipo_Selec'
                 WHERE `planglobal`.`ID_PG` = $ID_PG;";
                 mysql_query($query,$link);
          echo "
           <script>alert('Datos Editados Correctamente');</script>";

        }
         
         if($Doc_Selec!=""){
          $query="UPDATE `planglobal` SET 
                  `ID_Docente` = '$Doc_Selec' 
                 WHERE `planglobal`.`ID_PG` = $ID_PG;";
                 mysql_query($query,$link);
          echo "
           <script>alert('Datos Editados Correctamente');</script>";

        }

        if($Doc_Selec=="" && $Tipo_Selec==""){
           echo "
           <script>alert('Seleccione algun Dato para Editar');</script>";
        }
        
       
       
       echo "<form method='post'>
             <input type='text' name='txt_ID_PG' style='visibility:hidden' value='".$ID_PG."'>
             <input type='submit' name='btn_Editar_PG' value='atras'>
             </form>";


      }

    if(isset($_POST['btn_Eliminar_PG'])){
      
      $ID_PG=$_POST['txt_ID_PG'];
      $query="DELETE FROM `planglobal` WHERE ID_PG=$ID_PG";
      mysql_query($query,$link);
       echo "<script>alert('Seleccione algun Dato para Editar');</script>";
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