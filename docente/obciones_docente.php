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
    <div id="titulo"><a id="titulo" href="index.php">Inicio</a></div>
    <div id="titulo">

    <a id="titulo" href="Buscar_Planes_Globales.php">Planes Globales</a>
    <a id="titulo" href="Materias_Asignadas.php">Materias</a>

    </div>
    <div id="titulo"><a id="titulo" href="Programa_Analitico_Publico.php">Programas Analiticos</a></div>
    <div id="titulo"><a id="titulo" href="Manual_de_Usuario.php">Manual de Usuario</a></div>

      <table id="tabla_user">
      <tr><td></td><td><img src="user.jpg" width="120" height="120"></td></tr>
      <tr><td>usuario:</td><td>Ariel Brayan</td></tr>
      <tr><td>cargo:</td><td>Docente</td></tr>
      <tr><td>nivel de estudios:</td><td>Ing. de Sistemas</td></tr>
       <tr><td>codigo:</td><td>2</td></tr>

    </table>
    
	</aside>

<article id="cuerpo">
     

   <form method="post" action="obciones_docente.php">
   <input type="submit" name="btn_Materias" value="Materias">
  
   
   </form>
  

   <?php

       $CodigoD=2;
 
       require("coneccion.php");

       if(isset($_POST['btn_Materias']))
       {
          $sql="SELECT * FROM materia m, docente d,planglobal pg
               WHERE d.ID_Docente=$CodigoD AND pg.ID_Docente=d.ID_Docente AND pg.ID_Materia=m.ID_Materia";
          $resultado=mysql_query($sql,$link);
          echo "
                <table id='tabla_Materias'>
                <tr id='titulo'>
                <td>Codigo</td>
                <td>Materia</td>
                <td>Cargo</td>
                <td>Grupo</td>
                <td>Imprimir</td>
                <td>Ver</td>
                <td>Editar</td>
                </tr>";
          while($row=mysql_fetch_array($resultado)){
         
          echo "<form method='post' action=''>
                <tr>
                <input readonly class='id_materia' style='visibility:hidden' value='".$row['ID_Materia']."' name='txt_Cod_M' size='5'>
                <input readonly class='id_materia' style='visibility:hidden' value='".$row['ID_PG']."' name='txt_Cod_PG' size='5'>
                <td><input readonly class='id_materia' value='".$row['Codigo']."' name='txtCodM' size='5'></td>
                <td>".$row['Nombre_Materia']."</td>
                <td>".$row['tipo']."</td>
                <td>".$row['Grupo']."</td>
                <td><input type='submit' name='btn_Imprimir' value='Imprimir'></td>
                <td><input type='submit' name='btn_Ver_Materia' value='Ver'></td>
                <td><input type='submit' name='btn_Editar_Materia' value='Editar'></td></tr></form>";
            }

            echo "</table>";
   
       }
       
       // BOTON IMPRIMIR MATERIA

       if(isset($_POST['btn_Imprimir'])){

         echo "entro ";

         echo $Cod_Materia=$_POST['txt_Cod_M'];
       }

       // BOTON VER MATERIA

       if(isset($_POST['btn_Ver_Materia'])){

         echo "entro ";
          echo $Cod_Materia=$_POST['txtCodM'];
       }
       
      // BOTON EDITAR MATERIA

       if(isset($_POST['btn_Editar_Materia'])){

         $Cod_Materia=$_POST['txt_Cod_M'];
         $Cod_PG=$_POST['txt_Cod_PG'];


       
        $query="SELECT * FROM planglobal pg,materia m,docente d 
        WHERE pg.ID_PG=$Cod_PG AND m.ID_Materia=$Cod_Materia AND pg.ID_Materia=m.ID_Materia 
        AND pg.ID_Docente=d.ID_Docente";

        $resultado=mysql_query($query,$link);
        echo "<form method='post' action=''>
        <input type='text' value='".$Cod_PG."' name='txt_Cod_PG' style='visibility:hidden'>  
        <input type='text' value='".$Cod_Materia."' name='txt_Cod_M' style='visibility:hidden'> 
        <table id='tabla_Identificacion'><tr><td colspan='2'><h3> DATOS DE IDENTIFICACION </h3></td></tr>";
        while ($row=mysql_fetch_array($resultado)) {
        
          echo " <tr><td>&bull; Nombre de la materia: </td>
          <td>".$row['Nombre_Materia']."</br></td></tr>";

          echo " <tr><td>&bull; Codigo: </td>
          <td>".$row['Codigo']."</br></td></tr>";

          echo " <tr><td>&bull; Grupo: </td>
          <td>".$row['Grupo']."</br></td></tr>";

          echo " <tr><td>&bull; Carga Horaria: </td>
          <td><input type='text' name='txt_Carga_Horaria' value='".$row['Carga_Horaria']."'></br></td></tr>";

          echo " <tr><td>&bull; Materias con las que se relaciona </td>
          <td>".$row['Materias_Relacionadas']."</br></td></tr>";
         
          echo '<tr><td>&bull; Docente: </td>
          <td><input type="text" name="txt_Nombre" value="'.$row['Nombre_Completo'].'">&nbsp;'
           .'<input type="text"  name="txt_Apellido_P" value="'.$row['Apellido_Paterno'].'">&nbsp;'
           .'<input type="text"  name="txt_Apellido_M" value="'.$row['Apellido_Materno'].'">&nbsp;</td></tr>';

          echo " <tr><td>&bull; Telefono: </td><td><input name='txt_Telefono' value='".$row['Telefono']."'></td></tr>";
          echo " <tr><td>&bull; Correo Electronico: </td><td><input name='txt_Correo' value='".$row['Correo']."' size='40'></td></tr>";
        }
          
        echo "<tr><td colspan='2'><center><input type='submit' value='Siguiente' name='btn_Justificacion'></center></td></tr></table></form>";
        
       }

       // BOTON JUSTIFICACION

       if(isset($_POST['btn_Justificacion']))
       {
          
          $Carga_H=$_POST['txt_Carga_Horaria'];
          $Nombre=$_POST['txt_Nombre'];
          $Apellido_P=$_POST['txt_Apellido_P'];
          $Apellido_M=$_POST['txt_Apellido_M'];
          $Telefono=$_POST['txt_Telefono'];
          $Correo=$_POST['txt_Correo'];

          $Cod_Materia=$_POST['txt_Cod_M'];
          $Cod_PG=$_POST['txt_Cod_PG'];
          $CodigoD;

         $query1="UPDATE `docente` 
         SET `Nombre_Completo` = '$Nombre',
             `Apellido_Paterno` = '$Apellido_P', 
             `Apellido_Materno` = '$Apellido_M',
             `Telefono` = '$Telefono',
             `Correo` = '$Correo', 
             `Direccion` = '' WHERE `docente`.`ID_Docente` = $CodigoD;";

         $resultado=mysql_query($query1,$link);

         $query2="UPDATE `materia` SET `Carga_Horaria` = '$Carga_H' WHERE `materia`.`ID_Materia` =$Cod_Materia";

         $resultado2=mysql_query($query2,$link);


        echo "JUSTIFICACION</br>";

        echo "<form method='post'>
        <input type='text' name='ID_PG' style='visibility:hidden' value='".$Cod_PG."'></p>
        <textarea cols='100' name='txt_justificacion'></textarea></p>
        <input type='submit' name='btn_Crear_Justificacion' value='Crear Justificaccion'></form>";


        $query="SELECT * FROM planglobal pg,justificacion j
         WHERE  pg.ID_PG=$Cod_PG AND j.ID_PG=pg.ID_PG";

        $resultado=mysql_query($query,$link);
      
        while ($row=mysql_fetch_array($resultado)) {
              echo "<form method='post' action=''>
              <input type='text' name='ID_PG' style='visibility:hidden' value='".$Cod_PG."'></p>
              <textarea name='txt_justificacion' cols='100' rows='18' >".$row['Justificacion'].
              "</textarea></br></p>
               <input type='text' name='ID_J' style='visibility:hidden' value='".$row['Id_Justificacion']."'></p>
               <input type='submit' value='Eliminar' name='btn_Eliminar_Justificacion'>
               <input type='submit' value='Siguiente' name='btn_Objetivos'></form>";}
       }

      
      if(isset($_POST['btn_Crear_Justificacion'])){
        $Texto=$_POST['txt_justificacion'];
        echo $ID_PG=$_POST['ID_PG'];

        $query="INSERT INTO `justificacion` (`Id_Justificacion`, `Justificacion`, `ID_PG`) VALUES (NULL,'$Texto','$ID_PG')";
        
        $resultado=mysql_query($query,$link);
        

         $query="SELECT * FROM planglobal pg,justificacion j
         WHERE  pg.ID_PG=$ID_PG AND j.ID_PG=pg.ID_PG";

        $resultado=mysql_query($query,$link);
      
        while ($row=mysql_fetch_array($resultado)) {
              echo "<form method='post' action=''>
              <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'></p>
              <textarea name='txt_justificacion' cols='100' rows='18' >".$row['Justificacion'].
              "</textarea></br></p>
               <input type='text' name='ID_J' style='visibility:hidden' value='".$row['Id_Justificacion']."'></p>
               <input type='submit' value='Eliminar' name='btn_Eliminar_Justificacion'>
               <input type='submit' value='Siguiente' name='btn_Objetivos'>
               </form>";}

        }
      
      //BOTON ELIMINAR JUSTIFICACION
      if(isset($_POST['btn_Eliminar_Justificacion'])){
        $ID_J=$_POST['ID_J'];

        $query="DELETE FROM `justificacion` WHERE Id_Justificacion='$ID_J'";
        $resultado=mysql_query($query,$link);
        echo "<script>alert('Justificacion Eliminada Correctamente');</script>";
      }
       
       // BOTON OBJETIVOS

       if(isset($_POST['btn_Objetivos'])){

         echo $ID_PG=$_POST['ID_PG'];
         $Justificacion=$_POST['txt_justificacion'];

         $query="UPDATE `justificacion` SET `Justificacion` = '$Justificacion' WHERE ID_PG='$ID_PG'";
         $resultado=mysql_query($query,$link);


        echo "OBJETIVOS</br>";
       

     
        $query="SELECT * FROM planglobal pg,objetivo o, objetivos ob 
                WHERE pg.ID_PG=$ID_PG AND o.ID_PG=pg.ID_PG AND o.ID_Objetivo=ob.ID_Objetivo";

        $resultado=mysql_query($query,$link);

        $query1="SELECT * FROM planglobal pg,objetivo o, objetivos ob 
                WHERE pg.ID_PG=$ID_PG AND o.ID_PG=pg.ID_PG";
        $resultado1=mysql_query($query1,$link);
        $ID_O=mysql_result($resultado1, 0, "ID_Objetivo");

        
        while ($row=mysql_fetch_array($resultado)) {
            
            echo "<form method='post' action=''>
                  <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'></p>
                  <input type='text' style='visibility:hidden' value='".$row['ID_Objetivos']."' name='txt_Cod_O'>
                  <table>
                  <tr><td>
                  <textarea name='txt_Objetivo' cols='100' rows='3'>".$row['Texto_Obj']."</textarea></td>
                  <td><input type='submit' name='btn_Editar_Objetivo' value='Editar'></td>
                  <td><input type='submit' name='btn_Eliminar_Objetivo' value='Eliminar'></td></tr>
                  </table></form>";
                }

      

        echo "<form method='post'>
        <table> 
        <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'></p>
        <input type='text' name='ID_O' style='visibility:hidden' value='".$ID_O."'></p>
        <tr><td><textarea cols='100' rows='3' name='txt_new_Objetivo'></textarea></td>
        <td><input type='submit' value='Ingresar' name='btn_Ingresar_Objetivo'></td></tr>
                                 
        </table></form>";

       echo "<form method='post' action=''>
         <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
         <input type='submit' value='Siguiente' name='btn_Contenidos'>

         </form>";


       }
      
        //BOTON INGRESAR NUEVO OBJETIVO
        
        if(isset($_POST['btn_Ingresar_Objetivo'])){
         
         $ID_PG=$_POST['ID_PG'];
         $ID_O=$_POST['ID_O'];
         $Cod_Objetivo=$_POST['txt_new_Objetivo'];

         $query="INSERT INTO `objetivos` (`ID_Objetivos`, `ID_Objetivo`, `Texto_Obj`) VALUES (NULL, '$ID_O', '$Cod_Objetivo');";
         $resultado=mysql_query($query,$link);

         
        echo "<script>alert('Se Inserto Correctamente');</script>";

       }
      
       //BOTON EDITAR OBJETIVOS

       if(isset($_POST['btn_Editar_Objetivo'])){

         $ID_PG=$_POST['ID_PG'];
         $ID_O=$_POST['txt_Cod_O'];
         $Txt_O=$_POST['txt_Objetivo'];

         $query="UPDATE `objetivos` SET `Texto_Obj` = '$Txt_O' WHERE `objetivos`.`ID_Objetivos`=$ID_O";
         $resultado=mysql_query($query,$link);

         echo "<script>alert('Se edito Correctamente');</script>";

      
       }

       //BOTON ELIMINAR LOS OBJETIVOS

         if(isset($_POST['btn_Eliminar_Objetivo'])){

         $ID_PG=$_POST['ID_PG'];
         $ID_O=$_POST['txt_Cod_O'];
         $Txt_O=$_POST['txt_Objetivo'];

         $query="DELETE FROM `objetivos` WHERE `objetivos`.`ID_Objetivos`=$ID_O";
         $resultado=mysql_query($query,$link);
         echo "<script>alert('Se elimino Correctamente');</script>";
       }

      // BOTON DE CONTENIDOS

       if(isset($_POST['btn_Contenidos']))
       {
         echo "CONTENIDOS";
         
         echo $ID_PG=$_POST['ID_PG'];
         //BOTON DE CREACION DE UNIDAD
         echo "<form method='post' action=''>
               <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' name='btn_Ingresar_Contenidos' value='Ingresar Contenidos'></p>
               </form> ";


        $query="SELECT COUNT(*) FROM unidad 
        WHERE ID_PG=$ID_PG";

        $resultado=mysql_query($query,$link);
        $u=mysql_result($resultado, 0, "COUNT(*)");
        //echo $u;
        $query1="SELECT * FROM unidad WHERE ID_PG=$ID_PG";
        $resultado1=mysql_query($query1,$link);
        
        
         for ($i=0; $i <$u; $i++) { 
             
              
             mysql_result($resultado1, $i, "Unidad");
             $id_unidad=mysql_result($resultado1, $i, "ID_Unidad");
        
             echo "<form method='post' action=''> 
                   <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$id_unidad."'>
                   <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                   <table>
                   <tr><td>Unidad :</td><td><textarea cols='80' rows='3' name='txt_Unidad'>"
                   .mysql_result($resultado1, $i, "Unidad")."</textarea></td><td>Numero :</td>
                    <td><input type='text' size='3' value='".mysql_result($resultado1, $i, "Numero_Unidad")."' name='txt_Numero_U'></td>
                   <td><input type='submit' value='Editar' name='btn_Editar_Unidad'></td>
                   <td><input type='submit' value='Eliminar' name='btn_Eliminar_Unidad'></td>
                   </tr></table></form>";


             //OBJETIVO
             $query2="SELECT COUNT(*) FROM seccion_objetivo 
                     WHERE ID_Unidad=$id_unidad";
             $resultado2=mysql_query($query2,$link);

             $n=mysql_result($resultado2, 0, "COUNT(*)");
                    echo "OBJETIVOS </P>";
                for ($j=0; $j <$n ; $j++) { 
                 
                  $query3="SELECT * FROM seccion_objetivo 
                           WHERE ID_Unidad=$id_unidad";
                  $resultado3=mysql_query($query3,$link);
                   echo "<form method='post' action=''> 
                   <input type='text' name='ID_Objetivo_U' style='visibility:hidden' value='".mysql_result($resultado3, $j, "ID_Objetivo")."'>
                   <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                   <table>
                   <tr><td><textarea cols='100' rows='3' name='txt_Objetivo'>"
                   .mysql_result($resultado3, $j, "Objetivo")."</textarea></td>
                   <td><input type='submit' value='Editar' name='btn_Editar_Objetivos_Unidad'></td>
                   <td><input type='submit' value='Eliminar' name='btn_Eliminas_Objetivos_Unidad'></td>
                   </tr>

                   </table></form>";
                }

             // CONTENIDO

                $query4="SELECT COUNT(*) FROM seccion_contenido 
                         WHERE ID_Unidad=$id_unidad";
                $resultado4=mysql_query($query4,$link);

                $m=mysql_result($resultado4, 0, "COUNT(*)");
                 echo "CONTENIDOS </P>";
                 for ($k=0; $k <$m ; $k++) { 
                  $query5="SELECT * FROM seccion_contenido 
                           WHERE ID_Unidad=$id_unidad";
                  
                  $resultado5=mysql_query($query5,$link);
                 
                 echo "<form method='post' action=''> 
                       
                       <input type='text' name='ID_Cont_U' style='visibility:hidden' value='"
                        .mysql_result($resultado5, $k, "ID_Contenido")."'>

                       <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                       <table>
                       <tr><td><textarea cols='100' rows='3' name='txt_Contenido'>"
                       .mysql_result($resultado5, $k, "Contenido")."</textarea></td>
                       <td><input type='submit' value='Editar' name='btn_Editar_Contenido_U'></td>
                       <td><input type='submit' value='Eliminar' name='btn_Eliminar_Contenido_U'></td>
                       </tr>
                 </table></form>";
                }
             }

             echo " <form method='post' action=''>
                    <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                    <input type='submit' name='btn_Siguiente_Metodologias' value='Siguiente'>
                    </form>";
         }


         //BTN EDITAR UNIDAD

        if(isset($_POST['btn_Editar_Unidad']))
         {
           echo $text_U=$_POST['txt_Unidad'];
           echo "</p>";
           echo $ID_Unidad=$_POST['ID_Unidad'];
           echo "</p>";
           echo $ID_PG=$_POST['ID_PG'];
           echo $ID_Numero_U=$_POST['txt_Numero_U'];
           
           $query="UPDATE `unidad` SET `Unidad` = '$text_U', `Numero_Unidad` = '$ID_Numero_U' 
                   WHERE `unidad`.`ID_Unidad` = $ID_Unidad;";
           $resultado=mysql_query($query,$link);

           echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";

         }

         //BOTON ELIMINAR UNIDAD

         if(isset($_POST['btn_Eliminar_Unidad']))
         {
           echo $text_U=$_POST['txt_Unidad'];
           echo "</p>";
           echo $ID_Unidad=$_POST['ID_Unidad'];
           echo "</p>";
           echo $ID_PG=$_POST['ID_PG'];
           echo $ID_Numero_U=$_POST['txt_Numero_U'];

           $query="SELECT * FROM `seccion_objetivo` WHERE ID_Unidad=$ID_Unidad";
           $resultado=mysql_query($query,$link);

           $query="DELETE FROM `seccion_contenido` WHERE ID_Unidad=$ID_Unidad";
           $resultado=mysql_query($query,$link);
           
           $query="DELETE FROM `unidad` WHERE ID_Unidad=$ID_Unidad";
           $resultado=mysql_query($query,$link);

           echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";

         }



        //BOTON EDITAR OBJETIVOS

         if(isset($_POST['btn_Editar_Objetivos_Unidad']))
         {
          
          echo $ID_Objetivo_U=$_POST['ID_Objetivo_U'];
        
          echo $ID_PG=$_POST['ID_PG'];
         
          echo $txt_Obj_U=$_POST['txt_Objetivo'];

          $query="UPDATE `seccion_objetivo` SET `Objetivo` = '$txt_Obj_U' WHERE `seccion_objetivo`.`ID_Objetivo` = $ID_Objetivo_U;";
          $resultado=mysql_query($query,$link);

           echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";
         }

        //BOTON ELIMINAR OBJETIVOS UNIDAD
         if(isset($_POST['btn_Eliminas_Objetivos_Unidad']))
         {
          
           $ID_Objetivo_U=$_POST['ID_Objetivo_U'];
        
           $ID_PG=$_POST['ID_PG'];
         
           $txt_Obj_U=$_POST['txt_Objetivo'];

          $query="DELETE FROM `seccion_objetivo` WHERE `seccion_objetivo`.`ID_Objetivo` = $ID_Objetivo_U;";
          $resultado=mysql_query($query,$link);

           echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";
         }


        //BOTON EDITAR CONTENIDOS
    

         if(isset($_POST['btn_Editar_Contenido_U']))
         {
           
            $ID_Cont_U=$_POST['ID_Cont_U'];

            $text_Cont_U=$_POST['txt_Contenido'];
        
            $ID_PG=$_POST['ID_PG'];
         
          $query="UPDATE `seccion_contenido` SET `Contenido` = '$text_Cont_U' WHERE `seccion_contenido`.`ID_Contenido` = $ID_Cont_U;";
          $resultado=mysql_query($query,$link);

           echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";

           
         }

         //BOTON ELIMINAR CONTENIDIO UNIDAD
         

         if(isset($_POST['btn_Eliminar_Contenido_U']))
         {
           
           $ID_Cont_U=$_POST['ID_Cont_U'];

           $text_Cont_U=$_POST['txt_Contenido'];
        
           $ID_PG=$_POST['ID_PG'];
         
          $query="DELETE FROM `seccion_contenido` WHERE `seccion_contenido`.`ID_Contenido` = $ID_Cont_U;";
          $resultado=mysql_query($query,$link);

           echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";

           
         }

     //BOTON INSERTAR UNIDAD

       if(isset($_POST['btn_Ingresar_Contenidos']))
       {
          echo $ID_PG=$_POST['ID_PG'];

          echo "INSERTAR NUEVA UNIDAD";

          echo "<form method='post' action=''>
          <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
          <table>
          <tr><td><textarea name='txt_Unidad' cols='80' rows='3' ></textarea></td>
          <td>Unidad :<input type='text'  name='txt_Numero_U' size='5'></td>

          <td><input type='submit' value='Ingresar' name='btn_Contenidos_Nuevos'></td>
          </tr></table></form>";

           echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";

        }  
  
      //BOTON INSERTAR OBJETIVOS Y CONTENIDOS

        if(isset($_POST['btn_Contenidos_Nuevos'])){
         
         echo $Txt_Unidad=$_POST['txt_Unidad'];
         echo $Num_U=$_POST['txt_Numero_U'];
         echo $ID_PG=$_POST['ID_PG'];

         $query="INSERT INTO `unidad` (`ID_Unidad`, `Unidad`, `Numero_Unidad`, `ID_PG`) 
                 VALUES (NULL, ' $Txt_Unidad', '$Num_U', '$ID_PG');";

         $resultado=mysql_query($query,$link);

         $query="SELECT ID_Unidad FROM `unidad` WHERE Numero_Unidad=$Num_U AND ID_PG=$ID_PG";
         $resultado=mysql_query($query,$link);
         $ID_U=mysql_result($resultado, 0, "ID_Unidad");
        
         echo "</P>el ID DE UNIDAD ".$ID_U;

         echo "<form method='post' action=''>
          <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$ID_U."'>
          <input type='text' name='txt_Unidad' style='visibility:hidden' value='".$Txt_Unidad."'>
          <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
          <input type='submit' name='btn_Agregar_Objetivos' value='Ingresar Objetivos'>
          <input type='submit' name='btn_Ingresar_Sub_Contenidos' value='Ingresar Contenidos'>
          </form>";



        }  


        //BOTTON INGRESAR OBJETIVOS
        if(isset($_POST['btn_Agregar_Objetivos'])){
        
          $ID_Unidad=$_POST['ID_Unidad'];
          $ID_PG=$_POST['ID_PG'];
          $Unidad=$_POST['txt_Unidad'];
           
          echo "UNIDAD :".$Unidad; 

          echo "<form method='post'>
          <table>
          <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$ID_Unidad."'>
          <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
          <input type='text' name='txt_Unidad' style='visibility:hidden' value='".$Unidad."'>
          <tr><td><textarea name='txt_Objetivo'> </textarea></td>
          <td><input type='submit' name='btn_Agregar_U_O' value='Agregar'></td>
          </table>";

            echo "<form method='post'>
                <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$ID_Unidad."'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='text' name='txt_Unidad' style='visibility:hidden' value='".$Unidad."'>
                <input type='submit' name='btn_Atras_Objetivos' value='atras'></form>";

         
        }

        if(isset($_POST['btn_Atras_Objetivos'])){
         

          $ID_Unidad=$_POST['ID_Unidad'];
          $ID_PG=$_POST['ID_PG'];
          ECHO "UNIDAD :";
          ECHO $Unidad=$_POST['txt_Unidad'];

          echo "<form method='post' action=''>
          <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$ID_Unidad."'>
          <input type='text' name='txt_Unidad' style='visibility:hidden' value='".$Unidad."'>
          <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
          <input type='submit' name='btn_Agregar_Objetivos' value='Ingresar Objetivos'>
          <input type='submit' name='btn_Ingresar_Sub_Contenidos' value='Ingresar Contenidos'>
          </form>";

            echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";


        }

         //BTN AGREGAR OBJETIVOS
        
        if(isset($_POST['btn_Agregar_U_O']))
        {
          
          $ID_Unidad=$_POST['ID_Unidad'];
          $ID_PG=$_POST['ID_PG'];
          $Unidad=$_POST['txt_Unidad'];
          $Objetivo=$_POST['txt_Objetivo'];

          $query="INSERT INTO `seccion_objetivo` (`ID_Objetivo`, `Objetivo`, `ID_Unidad`) VALUES (NULL, '$Objetivo', '$ID_Unidad');";
          $resultado=mysql_query($query,$link);

          echo "<form method='post'>
                <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$ID_Unidad."'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='text' name='txt_Unidad' style='visibility:hidden' value='".$Unidad."'>
                <input type='submit' name='btn_Agregar_Objetivos' value='atras'></form>";


        }

        //BOTON INGRESAR CONTENIDOS

         if(isset($_POST['btn_Ingresar_Sub_Contenidos']))
         {
          
          $ID_Unidad=$_POST['ID_Unidad'];// id de la unidad
          $ID_PG=$_POST['ID_PG'];       
          $Unidad=$_POST['txt_Unidad']; //titulo de la unidad

          echo "UNIDAD : $Unidad </p> CONTENIDOS </P>";

          echo "<form method='post' action=''> 

                <textarea name='txt_Contenido' cols='80' rows='5'></textarea>
                <input type='submit' value='Agregar' name='btn_Insertar_Sub_Contenidos_Nuevo'>
                <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$ID_Unidad."'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='text' name='txt_Unidad' style='visibility:hidden' value='".$Unidad."'>
                <input type='submit' value='atras' name='btn_Atras_Objetivos'>
            </form>";
        }     
        

        if(isset($_POST['btn_Insertar_Sub_Contenidos_Nuevo']))
        {
          $ID_Unidad=$_POST['ID_Unidad'];// id de la unidad
          $ID_PG=$_POST['ID_PG'];       
          $Unidad=$_POST['txt_Unidad']; //titulo de la unidad
          echo $Contendio=$_POST['txt_Contenido'];

           $query="INSERT INTO `seccion_contenido` (`ID_Contenido`, `Contenido`, `ID_Unidad`) 
                   VALUES (NULL, '$Contendio','$ID_Unidad');";
           $resultado=mysql_query($query,$link);

         
          //ATRAS 
           echo "<form method='post' action=''> 
                <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$ID_Unidad."'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='text' name='txt_Unidad' style='visibility:hidden' value='".$Unidad."'>
                <input type='submit' value='atras' name='btn_Ingresar_Sub_Contenidos'>
            </form>";

        }


       // BTON METODOLOGIAS
       
       if(isset($_POST['btn_Siguiente_Metodologias']))
       {
            echo "METODOLOGIAS</p>";

            echo "<form method='post' action=''>
            <input type='submit' name='btn_Ingresar_Metodologias' value='Ingresar Nueva Metodologia'></p>
                 </form>";
            $Cod_PG=3;
            $query="SELECT * FROM planglobal pg,metodologia m
             WHERE pg.ID_PG=m.ID_PG";
            $resultado=mysql_query($query,$link);
        
            while ($row=mysql_fetch_array($resultado)) {
                echo "<form method='post' action=''>
                <textarea cols='100' rows='5'  name='txt_Metodologia'>".$row['Metodologia']."</textarea><input type='submit' name='btn_Editar_Metodologia' value='Editar'></p></form>";
           }
           //aniadimos el boton siguiente

           echo "<form method='post'>
               <input type='submit' value='Siguiente' name='btn_Cronograma'>
            </form>";
            
       }

       if(isset($_POST['btn_Editar_Metodologia'])){
         echo $m=$_POST['txt_Metodologia'];
         echo "<script>alert('Edificion Realizada');</script>";
         
         echo "<form method='post' action=''>
               
               <input type='submit' value='atras' name='btn_Siguiente_Metodologias'>
             </form>";

       }

       if(isset($_POST['btn_Ingresar_Metodologias'])){
             echo "INGRESAR METODOLOGIA </P>";

             echo "<form method='post' action=''>
               <textarea  cols='100' rows='5' name='txt_Metodologia'></textarea>
               <input type='submit' value='Ingresar' name='btn_ingresar_Metod'></p>
               <input type='submit' value='atras' name='btn_Siguiente_Metodologias'>
             </form>";
       }

       if(isset($_POST['btn_ingresar_Metod'])){

        echo "<form method='post'>
          <input type='submit' value='atras' name='btn_Ingresar_Metodologias'></form>";
       }


       if(isset($_POST['btn_Cronograma'])){
        echo "CRONOGRAMA </P>";
        $ID_PG=3;

          $query="SELECT * FROM planglobal pg, cronograma c
             WHERE pg.ID_PG=c.ID_PG";
            $resultado=mysql_query($query,$link);
            echo "<table><tr><td>Unidad</td><td>Duracion (Horas Academicas)</td><td>Duracion en Semanas</td></tr></table>";
        
            while ($row=mysql_fetch_array($resultado)) {
                echo "<form method='post' action=''>
                <table>
                <tr><td><input size='70' type='text' name='txt_Unidad' value='".$row['Unidad']."'> </td> 
                <td><input size='5' type='text' name='txt_Horas' value='".$row['Duracion_Horas']."'> </td> 
                <td><input size='5' type='text' name='txt_Semanas' value='".$row['Duracion_Semnas']."'> </td> 
                <td><input type='submit' name='btn_Editar_Cronograma' value='Editar'></td></tr>
                </table></form>";
            }
        
           echo "<form method='post' action=''>
              
               <input type='submit' value='Siguiente' name='btn_Siguiente_Criterios'>
             </form>";

         }
        

   if(isset($_POST['btn_Editar_Cronograma'])){

       echo $txt_Unidad=$_POST['txt_Unidad'];
       echo $txt_Horas=$_POST['txt_Horas'];
       echo $txt_Semanas=$_POST['txt_Semanas'];
       echo "<script>alert('Edicion Correcta');</script>";
       echo "<form method='post' action=''>
               
               <input type='submit' value='atras' name='btn_Cronograma'>
             </form>";

       }

       //BOTON CRITERIOS 
       

        if(isset($_POST['btn_Siguiente_Criterios'])){
           $ID_PG=3;
      
         echo "CRITERIOS DE EVALUACION </p>";
         echo "<form method='post' action=''>
               
        <input type='submit' value='Insertar Nuevo Criterio' name='btn_Nuevo Criterio_Evaluacion'></form>";
         
         $query="SELECT * 
                 FROM planglobal pg, criterio_evaluacion c, criterio cs
                 WHERE pg.ID_PG=c.ID_PG AND c.Id_Criterio=cs.ID_Criterio_Evaluacion";
            $resultado=mysql_query($query,$link);
            echo "<table><tr><td>Unidad</td><td>Duracion (Horas Academicas)</td><td>Duracion en Semanas</td></tr></table>";
        
            while ($row=mysql_fetch_array($resultado)) {
                echo "<form method='post' action=''>
                <table>
                <tr><td><textarea cols='100' rows='5' name='txt_Criterio_Evaluacion' >".$row['Criterio']."</textarea></td> 
             
                <td><input type='submit' name='btn_Editar_Criterio' value='Editar'></td></tr>
                </table></form>";
            }   

            echo "<form method='post' action=''>
                <input type='submit' value='Siguiente' name='btn_Siguiente_Bibliografia'>
                </form>" ;    
       }
       //BOTON EDITAR CRITERIO

       if(isset($_POST['btn_Editar_Criterio'])){
          echo $Criterio=$_POST['txt_Criterio_Evaluacion'];
          echo "<script>alert('Edicion Correcta');</script>";
          
          echo "<form method='post' action=''>
                <input type='submit' value='atras' name='btn_Siguiente_Criterios'>
                </form>";
       }

       //BOTON BIBLIOGRAFIAS

        if(isset($_POST['btn_Siguiente_Bibliografia'])){
         
         ECHO "BIBLIOGRAFIAS </P>";

          echo "<form method='post' action=''>
               
        <input type='submit' value='Insertar Nuevo Bibliografia' name='btn_Nueva_Bibliografia'></form>";
         
         $query="SELECT * 
                 FROM planglobal pg,bibliografia b
                 WHERE pg.ID_PG=b.ID_PG";
            $resultado=mysql_query($query,$link);
            echo "<table><tr><td>Unidad</td><td>Duracion (Horas Academicas)</td><td>Duracion en Semanas</td></tr></table>";
        
            while ($row=mysql_fetch_array($resultado)) {
                echo "<form method='post' action=''>
                <table>
                <tr><td><textarea cols='100' rows='3' name='txt_Bibliografia' >".$row['texto']."</textarea></td> 
             
                <td><input type='submit' name='btn_Editar_Bibliografia' value='Editar'></td></tr>
                </table></form>";
            }   

            echo "<form method='post' action=''>
                <input type='submit' value='Terminar Editado' name='btn_Materias'>
                </form>" ;      
       }

       //BOTON INGRESO DE BIBLIOGRAFIAS
      
        if(isset($_POST['btn_Nueva_Bibliografia'])){
          
         echo "<form method='post' action=''>
               <textarea  cols='100' rows='3' name='txt_Bibliografia_Nueva'></textarea>
               <input type='submit' value='Ingresar' name='btn_Ingresar_Bibliografia'></p>
              
             </form>";
          
          echo "<form method='post' action=''>
                <input type='submit' value='atras' name='btn_Siguiente_Bibliografia'>
                </form>";
       }
       // BOTON INGRESO DE DATOS BIBLIOGRAFICOS

       if(isset($_POST['btn_Ingresar_Bibliografia']))
       { 
           echo $b=$_POST['txt_Bibliografia_Nueva'];

          echo "<script>alert('Datos Ingresados Correctamente');</script><form method='post' action=''>
                <input type='submit' value='atras' name='btn_Nueva_Bibliografia'>
                </form>";
       }

       //BOTON EDITADO DE LAS BIBLIOGRAFIAS

        if(isset($_POST['btn_Editar_Bibliografia'])){
          echo $b=$_POST['txt_Bibliografia'];
          echo "<script>alert('Edicion Correcta');</script>";
          
          echo "<form method='post' action=''>
                <input type='submit' value='atras' name='btn_Siguiente_Bibliografia'>
                </form>";
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