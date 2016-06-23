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
  

   <?php
 
     // CODIGO DE NUESTRO DOCENTE
       $CodigoD=$ID_User;
 
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
          
        echo "<tr><td ><center><input type='submit' value='Editar' name='btn_Editar_Datos_Ident'></center></td>
        <td><center><input type='submit' value='Siguiente Paso' name='btn_Justificacion'></center></td></tr>
        </table></form>";
        
       }

       //BOTON EDITAR IDENTIFICACION
       if(isset($_POST['btn_Editar_Datos_Ident']))
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

           $query1="UPDATE `docente` SET 
                   `Nombre_Completo` = '$Nombre',
                   `Apellido_Paterno` = '$Apellido_P', 
                   `Apellido_Materno` = '$Apellido_M',
                   `Telefono` = '$Telefono',
                   `Correo` = '$Correo'
                    WHERE `docente`.`ID_Docente` = $CodigoD;";

         $resultado=mysql_query($query1,$link);

         $query2="UPDATE `materia` SET `Carga_Horaria` = '$Carga_H' WHERE `materia`.`ID_Materia` =$Cod_Materia";

         $resultado2=mysql_query($query2,$link);

         echo "SE EDITO CORRECTAMENTE";

         echo "<form method='post'>
               <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'>
               <input type='text' name='txt_Cod_PG' style='visibility:hidden' value='".$Cod_PG."'>
               <input type='submit' name='btn_Editar_Materia' value='atras'>
               </form>";

         }

       // BOTON JUSTIFICACION

       if(isset($_POST['btn_Justificacion']))
       {
          $Cod_Materia=$_POST['txt_Cod_M'];
          $Cod_PG=$_POST['txt_Cod_PG'];
          $CodigoD;
        echo "JUSTIFICACION</br>";
        echo "<form method='post'>
        <input type='text' name='ID_PG' style='visibility:hidden' value='".$Cod_PG."'>
        <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_PG."'>
        <textarea cols='100' name='txt_justificacion'></textarea></p>
        <input type='submit' name='btn_Crear_Justificacion' value='Crear Justificaccion'></form>";


        $query="SELECT * FROM justificacion j
         WHERE   j.ID_PG='$Cod_PG'";

        $resultado=mysql_query($query,$link);
      
        while ($row=mysql_fetch_array($resultado)) {
              
              echo "<form method='post' action=''>
              <input type='text' name='ID_PG' style='visibility:hidden' value='".$Cod_PG."'></p>
               <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'></p>
              <textarea name='txt_justificacion' cols='100' rows='18' >".$row['Justificacion'].
              "</textarea></br></p>
               <input type='text' name='ID_J' style='visibility:hidden' value='".$row['Id_Justificacion']."'></p>
               <input type='submit' value='Eliminar' name='btn_Eliminar_Justificacion'>
               <input type='submit' value='Editar' name='btn_Editar_Justificacion'>
               <input type='submit' value='Siguiente' name='btn_Objetivos'></form>";}
       }

   //BOTON PARA CREAR UN NUEVA JUSTIFICACION 

      if(isset($_POST['btn_Crear_Justificacion'])){
        
        $Texto=$_POST['txt_justificacion'];
        $Cod_Materia=$_POST['txt_Cod_M'];
        $ID_PG=$_POST['ID_PG'];
        $CodigoD;

        $query="INSERT INTO `justificacion` (`Id_Justificacion`, `Justificacion`, `ID_PG`) VALUES (NULL,'$Texto','$ID_PG')";
        
        $resultado=mysql_query($query,$link);
        echo "<script>alert('Justificacion Creada Correctamente');</script>";

         echo "<form method='post'>
               <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'>
               <input type='text' name='txt_Cod_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' name='btn_Justificacion' value='atras'>
               </form>";
        }

      
      //BOTON ELIMINAR JUSTIFICACION

      if(isset($_POST['btn_Eliminar_Justificacion'])){
        $ID_J=$_POST['ID_J'];
        $Cod_Materia=$_POST['txt_Cod_M'];
        $ID_PG=$_POST['ID_PG'];
        $CodigoD;

        $query="DELETE FROM `justificacion` WHERE Id_Justificacion='$ID_J'";
        $resultado=mysql_query($query,$link);
        echo "<script>alert('Justificacion Eliminada Correctamente');</script>";

         echo "<form method='post'>
               <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'>
               <input type='text' name='txt_Cod_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' name='btn_Justificacion' value='atras'>
               </form>";
      }

      //BOTON EDITAR JUSTIFICACION

      if(isset($_POST['btn_Editar_Justificacion']))
      {
        $Texto=$_POST['txt_justificacion'];
        $Cod_Materia=$_POST['txt_Cod_M'];
        $ID_PG=$_POST['ID_PG'];
        $CodigoD;
       
        
        $query="UPDATE `justificacion` SET `Justificacion` = '$Texto' WHERE ID_PG='$ID_PG'";
        $resultado=mysql_query($query,$link);
        echo "<script>alert('Justificacion Editada Correctamente');</script>";

        echo "<form method='post'>
               <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'>
               <input type='text' name='txt_Cod_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' name='btn_Justificacion' value='atras'>
               </form>";


      }

       // BOTON OBJETIVOS

       if(isset($_POST['btn_Objetivos'])){

        $Cod_Materia=$_POST['txt_Cod_M'];
        $ID_PG=$_POST['ID_PG'];
        $CodigoD;

        echo "OBJETIVOS</br>";
           
        $query="SELECT * FROM objetivo
                WHERE ID_PG=$ID_PG";
       
        $resultado=mysql_query($query,$link);

        while ($row=mysql_fetch_array($resultado)) {
                      
            echo "<form method='post' action=''>
                  <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'></p>
                  <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'></p>
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
                  <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'></p>
                  <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'></p>
                  <tr><td><textarea cols='100' rows='3' name='txt_new_Objetivo'></textarea></td>
                  <td><input type='submit' value='Ingresar' name='btn_Ingresar_Objetivo'></td></tr>
                  </table>";

             echo "
                   <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                   <input type='submit' value='Siguiente' name='btn_Contenidos'></form>";
         }
      
        //BOTON INGRESAR NUEVO OBJETIVO
        
        if(isset($_POST['btn_Ingresar_Objetivo'])){
        
         $Cod_Materia=$_POST['txt_Cod_M'];
         $ID_PG=$_POST['ID_PG'];
         $Txt_Objetivo=$_POST['txt_new_Objetivo'];

         $query="INSERT INTO `objetivo` (`ID_Objetivos`, `ID_PG`, `Texto_Obj`) 
                 VALUES (NULL, '$ID_PG','$Txt_Objetivo');";
         $resultado=mysql_query($query,$link);  
         
         echo "<script>alert('Se Inserto Correctamente');</script>";

         echo "<form method='post'>
               <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'>
               <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' name='btn_Objetivos' value='atras'>
               </form>";

       }
      
       //BOTON EDITAR OBJETIVOS

       if(isset($_POST['btn_Editar_Objetivo'])){
         $Cod_Materia=$_POST['txt_Cod_M'];
         $ID_PG=$_POST['ID_PG'];
         $ID_O=$_POST['txt_Cod_O'];
         $Txt_O=$_POST['txt_Objetivo'];

         $query="UPDATE `objetivo` SET `Texto_Obj` = '$Txt_O' WHERE ID_Objetivos=$ID_O";
         $resultado=mysql_query($query,$link);

         echo "<script>alert('Se edito Correctamente');</script>";

          echo "<form method='post'>
               <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'>
               <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' name='btn_Objetivos' value='atras'>
               </form>";
      
       }

       //BOTON ELIMINAR LOS OBJETIVOS

         if(isset($_POST['btn_Eliminar_Objetivo'])){
         
         $Cod_Materia=$_POST['txt_Cod_M'];
         $ID_PG=$_POST['ID_PG'];
         $ID_O=$_POST['txt_Cod_O'];
         $Txt_O=$_POST['txt_Objetivo'];

         $query="DELETE FROM objetivo WHERE ID_Objetivos=$ID_O";
         $resultado=mysql_query($query,$link);
         echo "<script>alert('Se elimino Correctamente');</script>";

         echo "<form method='post'>
               <input type='text' name='txt_Cod_M' style='visibility:hidden' value='".$Cod_Materia."'>
               <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' name='btn_Objetivos' value='atras'>
               </form>";
       }   







      // BOTON DE CONTENIDOS

       if(isset($_POST['btn_Contenidos']))
       {
         echo "CONTENIDOS";
         
          $ID_PG=$_POST['ID_PG'];
          //$Cod_Materia=$_POST['txt_Cod_M'];
         
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
                    <input type='submit' name='btn_Metodologias' value='Siguiente'>
                    </form>";
         }

        //BOTON INSERTAR UNIDAD

       if(isset($_POST['btn_Ingresar_Contenidos']))
       {
          $ID_PG=$_POST['ID_PG'];

          echo "INSERTAR NUEVA UNIDAD";

          echo "<form method='post' action=''>
          <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
          <table>
          <tr><td>Unidad :</td><td><textarea name='txt_Unidad' cols='80' rows='3' ></textarea></td></tr>
          <tr><td>Numero de la Unidad :</td><td><input type='text'  name='txt_Numero_U' size='5'></td></tr>
          <tr><td>Duracion en Horas :</td><td><input type='text'  name='txt_Cant_Hrs' size='5'> (hrs)</td></tr>
          <tr><td>Duracion en Semanas :</td><td><input type='text'  name='txt_Num_Sem' size='5'> (semanas)</td></tr>

          <tr><td><input type='submit' value='Ingresar' name='btn_Contenidos_Nuevos'></td></tr>
          </tr></table></form>";

           echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";

        }  

         //BOTON INSERTAR OBJETIVOS Y CONTENIDOS

        if(isset($_POST['btn_Contenidos_Nuevos'])){
         
          $Txt_Unidad=$_POST['txt_Unidad'];
          $Num_U=$_POST['txt_Numero_U'];
          $ID_PG=$_POST['ID_PG'];
          $txt_Cant_Hrs=$_POST['txt_Cant_Hrs'];
          $txt_Num_Sem=$_POST['txt_Num_Sem'];

          echo "UNIDAD : ".$Txt_Unidad."</p> NUMERO :".$Num_U;

         $query="INSERT INTO `unidad` (`ID_Unidad`, `Unidad`, `Numero_Unidad`, `Hora_Academica`, `Cant_Semana`, `ID_PG`) 
                  VALUES (NULL, '$Txt_Unidad', '$Num_U', '$txt_Cant_Hrs', '$txt_Num_Sem', '$ID_PG');";

        
         $resultado=mysql_query($query,$link);

         $query="SELECT ID_Unidad FROM `unidad` WHERE Numero_Unidad=$Num_U AND ID_PG=$ID_PG";
         $resultado=mysql_query($query,$link);
         $ID_U=mysql_result($resultado, 0, "ID_Unidad");

         echo "<form method='post' action=''>
          <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$ID_U."'>
          <input type='text' name='txt_Unidad' style='visibility:hidden' value='".$Txt_Unidad."'>
          <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
          <input type='submit' name='btn_Agregar_Objetivos' value='Ingresar Objetivos'>
          <input type='submit' name='btn_Ingresar_Sub_Contenidos' value='Ingresar Contenidos'>
          </form>";

          echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";
        }  

         //BTN EDITAR UNIDAD

        if(isset($_POST['btn_Editar_Unidad']))
         {
             //ECHO "Estoy en Editar Unidad";
           $ID_PG=$_POST['ID_PG'];
           $ID_Unidad=$_POST['ID_Unidad'];
           $text_U=$_POST['txt_Unidad'];
           $ID_Numero_U=$_POST['txt_Numero_U'];
           
           $query="UPDATE `unidad` SET `Unidad` = '$text_U', `Numero_Unidad` = '$ID_Numero_U' 
                   WHERE `unidad`.`ID_Unidad` = $ID_Unidad;";
           $resultado=mysql_query($query,$link);

          echo "<form method='post' action=''>
          <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$ID_Unidad."'>
          <input type='text' name='txt_Unidad' style='visibility:hidden' value='".$text_U."'>
          <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
          <input type='submit' name='btn_Agregar_Objetivos' value='Ingresar Objetivos'>
          <input type='submit' name='btn_Ingresar_Sub_Contenidos' value='Ingresar Contenidos'>
          </form>";

           echo "<form method='post'>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' name='btn_Contenidos' value='atras'>
                </form>";
         }

         //BOTON ELIMINAR UNIDAD

         if(isset($_POST['btn_Eliminar_Unidad']))
         {
            $text_U=$_POST['txt_Unidad'];
            $ID_Unidad=$_POST['ID_Unidad'];
            $ID_PG=$_POST['ID_PG'];
            $ID_Numero_U=$_POST['txt_Numero_U'];

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

           echo "<script>alert('Eliminacion de Unidad Correctamente');</script>";
         }

        //BOTON EDITAR OBJETIVOS

         if(isset($_POST['btn_Editar_Objetivos_Unidad']))
         {
          
          $ID_Objetivo_U=$_POST['ID_Objetivo_U'];
          $ID_PG=$_POST['ID_PG'];
          $txt_Obj_U=$_POST['txt_Objetivo'];

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

           echo "<script>alert('Eliminacion de Objetivo Correctamente');</script>";
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

         //BOTON ELIMINAR CONTENIDIO DE LA UNIDAD
         

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
           echo "<script>alert('Eliminacion de Contenido Correctamente');</script>";
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
          $Contendio=$_POST['txt_Contenido'];

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
       
       if(isset($_POST['btn_Metodologias']))
       {
            $ID_PG=$_POST['ID_PG'];

            echo "METODOLOGIAS</p>";

            echo "<form method='post' action=''>
            <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
            <input type='submit' name='btn_Ingresar_Metodologias' value='Ingresar Nueva Metodologia'></p>
                 </form>";
            
            $query="SELECT * FROM metodologia
             WHERE ID_PG=$ID_PG";
            $resultado=mysql_query($query,$link);
        
            while ($row=mysql_fetch_array($resultado)) {
                echo "<form method='post' action=''>
                     <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                     <input type='text' name='ID_Metodologia' style='visibility:hidden' value='".$row['ID_Metod']."'>
                      <textarea cols='100' rows='5'  name='txt_Metodologia'>".
                      $row['Metodologia']."</textarea>
                      <input type='submit' name='btn_Editar_Metodologia' value='Editar'>
                      <input type='submit' name='btn_Eliminar_Metodologia' value='Eliminar'>
                      </form>";
           }
           //aniadimos el boton siguiente

           echo "<form method='post'>
                 <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                 <input type='submit' value='Siguiente' name='btn_Cronograma'>
                 </form>";
            
       }

     //BOTON EDITAR METODOLOGIA

       if(isset($_POST['btn_Editar_Metodologia'])){

           $txt_Metodologia=$_POST['txt_Metodologia'];
           $ID_PG=$_POST['ID_PG'];
           $ID_Metod=$_POST['ID_Metodologia'];

           $query="UPDATE metodologia 
                   SET Metodologia = '$txt_Metodologia', ID_PG = '$ID_PG' 
                   WHERE ID_Metod = $ID_Metod;";
           $resultado=mysql_query($query,$link);

         echo "<script>alert('Edificion Realizada');</script>";
         
         echo "<form method='post' action=''>
               <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' value='atras' name='btn_Metodologias'>
               </form>";
       }

         if(isset($_POST['btn_Eliminar_Metodologia'])){

           $ID_PG=$_POST['ID_PG'];
           $ID_Metod=$_POST['ID_Metodologia'];

           $query="DELETE FROM `metodologia` WHERE ID_Metod = $ID_Metod";

           $resultado=mysql_query($query,$link);

           echo "<script>alert('Edificion Realizada');</script>";
         
            echo "<form method='post' action=''>
                  <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                  <input type='submit' value='atras' name='btn_Metodologias'>
                 </form>";
       }

       //BOTON INGRESAR METODOLOGIA

       if(isset($_POST['btn_Ingresar_Metodologias'])){
             echo "INGRESAR METODOLOGIA</P>";
             $ID_PG=$_POST['ID_PG'];
             echo "<form method='post' action=''>
               <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
               <textarea  cols='100' rows='5' name='txt_Metodologia'></textarea>
               <input type='submit' value='Ingresar Nueva' name='btn_Insertar_Metodologias'></p>
               <input type='submit' value='atras' name='btn_Metodologias'>
             </form>";
       }

       if(isset($_POST['btn_Insertar_Metodologias'])){
        
           $ID_PG=$_POST['ID_PG'];
           $txt_Metodologia=$_POST['txt_Metodologia'];

           $query="INSERT INTO `metodologia`(`ID_Metod`, `Metodologia`, `ID_PG`) 
           VALUES (NULL,'$txt_Metodologia','$ID_PG')";
           $resultado=mysql_query($query,$link);

           echo "<script>alert('Metodologia Insertada Correctamente');</script>";
           echo "<form method='post'>
          <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
          <input type='submit' value='atras' name='btn_Ingresar_Metodologias'></form>";
       }

     //BOTON CRONOGRAMA

       if(isset($_POST['btn_Cronograma'])){
            
          $ID_PG=$_POST['ID_PG'];
          echo "CRONOGRAMA </P>";

          $query="SELECT * FROM unidad 
                  WHERE ID_PG='$ID_PG'";

          $resultado=mysql_query($query,$link);
          echo "<table class='tabla_Cronograma'>
                <tr><td>Unidad</td><td>Duracion (Horas Academicas)</td><td>Duracion en Semanas</td><td></td></tr>";
        
            while ($row=mysql_fetch_array($resultado)) {
                echo "<form method='post' action=''>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='text' name='ID_Unidad' style='visibility:hidden' value='".$row['ID_Unidad']."'>
                <tr><td>".$row['Unidad']."</td> 
                <td><input size='5' type='text' name='txt_Horas' value='".$row['Hora_Academica']."'></td> 
                <td><input size='5' type='text' name='txt_Semanas' value='".$row['Cant_Semana']."'></td> 
                <td><input type='submit' name='btn_Editar_Cronograma' value='Editar'></td></tr>
                </form>";
            }

          echo "</table>";
        
          echo "<form method='post' action=''>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' value='Siguiente' name='btn_Criterios'>
                </form>";
         }
      //BOTON CRONOGRAMA EDITADO

      if(isset($_POST['btn_Editar_Cronograma'])){
       
       
       $ID_PG=$_POST['ID_PG'];
       $ID_Unidad=$_POST['ID_Unidad'];
       $txt_Horas=$_POST['txt_Horas'];
       $txt_Semanas=$_POST['txt_Semanas'];

       $query="UPDATE `unidad` SET `Hora_Academica` = '$txt_Horas', `Cant_Semana` = '$txt_Semanas' 
               WHERE ID_Unidad = $ID_Unidad;";
       $resultado=mysql_query($query,$link);

       echo "<script>alert('Edicion Correcta');</script>";
       echo "<form method='post' action=''>
             <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
             <input type='submit' value='atras' name='btn_Cronograma'>
             </form>";

       }


       //BOTON CRITERIOS 
       
        if(isset($_POST['btn_Criterios'])){
         $ID_PG=$_POST['ID_PG'];
      
         echo "CRITERIOS DE EVALUACION </p>";
         echo "<form method='post' action=''>
               <textarea cols='100' rows='5' name='txt_Criterio'></textarea></p>
               <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' value='Insertar Nuevo Criterio' name='btn_Insertar_Criterio_Evaluacion'>
               </form>";
         
         $query="SELECT * 
                 FROM criterio c
                 WHERE c.ID_PG='$ID_PG'";
            $resultado=mysql_query($query,$link);
            
        
            while ($row=mysql_fetch_array($resultado)) {
                echo "<form method='post' action=''>
                <table>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='text' name='ID_Criterio' style='visibility:hidden' value='".$row['ID_Criterio']."'>
                <tr><td><textarea cols='100' rows='5' name='txt_Criterio_Evaluacion' >".$row['Criterio']."</textarea></td> 
                <td><input type='submit' name='btn_Editar_Criterio' value='Editar'></td>
                <td><input type='submit' name='btn_Eliminar_Criterio' value='Eliminar'></td></tr>
                </table></form>";
            }   

            echo "<form method='post' action=''>
            <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' value='Siguiente' name='btn_Siguiente_Bibliografia'>
                </form>";    
       }

       //BOTON EDITAR CRITERIO

       if(isset($_POST['btn_Editar_Criterio'])){

           $Criterio=$_POST['txt_Criterio_Evaluacion'];
           $ID_PG=$_POST['ID_PG'];
           $ID_Criterio=$_POST['ID_Criterio'];

          $query="UPDATE `criterio` SET `Criterio` = '$Criterio', `ID_PG` = '$ID_PG' 
                  WHERE  `criterio`.`ID_Criterio` = $ID_Criterio;";
          $resultado=mysql_query($query,$link);

          echo "<script>alert('Edicion Correcta');</script>";
          
          echo "<form method='post' action=''>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' value='atras' name='btn_Criterios'>
                </form>";
       }

       //BOTON ELIMINAR CRITERIO

        if(isset($_POST['btn_Eliminar_Criterio'])){

           $Criterio=$_POST['txt_Criterio_Evaluacion'];
           $ID_PG=$_POST['ID_PG'];
           $ID_Criterio=$_POST['ID_Criterio'];

          $query="DELETE FROM `criterio` WHERE `criterio`.`ID_Criterio` = $ID_Criterio";
          $resultado=mysql_query($query,$link);

          echo "<script>alert('Se Elimino Correctamente');</script>";
          
          echo "<form method='post' action=''>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' value='atras' name='btn_Criterios'>
                </form>";
       }


       //BOTON INSERTAR CRITERIO DE EVALUACION
       if(isset($_POST['btn_Insertar_Criterio_Evaluacion'])){
         echo $ID_PG=$_POST['ID_PG'];
         echo $txt_Criterio=$_POST['txt_Criterio'];

         $query="INSERT INTO `criterio` (`ID_Criterio`, `Criterio`, `ID_PG`) 
                 VALUES (NULL, '$txt_Criterio', '$ID_PG');";

         $resultado=mysql_query($query,$link);       

          echo "<form method='post' action=''>
               <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
               <input type='submit' value='atras' name='btn_Criterios'>
               </form>";
       }


       //BOTON BIBLIOGRAFIAS

        if(isset($_POST['btn_Siguiente_Bibliografia'])){
         
         $ID_PG=$_POST['ID_PG'];
         echo "BIBLIOGRAFIAS </br>";

          echo "<form method='post' action=''>
          <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'></br>
          <textarea name='txt_Bibliografia' cols='100' rows='5'></textarea></p>    
          <input type='submit' value='Insertar Nuevo Bibliografia' name='btn_Nueva_Bibliografia'>
          </form>";
          
         $query="SELECT * 
                 FROM bibliografia 
                 WHERE ID_PG='$ID_PG'";
         $resultado=mysql_query($query,$link);

        
            while ($row=mysql_fetch_array($resultado)) {
                echo "<form method='post' action=''>
                <table>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='text' name='ID_Bibliografia' style='visibility:hidden' value='".$row['Id_Bibliografia']."'>
                <tr><td><textarea cols='100' rows='3' name='txt_Bibliografia' >".$row['texto']."</textarea></td> 
                <td><input type='submit' name='btn_Editar_Bibliografia' value='Editar'></td>
                <td><input type='submit' name='btn_Eliminar_Bibliografia' value='Eliminar'></td></tr>
                </table></form>";
            }   

            echo "<form method='post' action=''>
                  <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                  <input type='submit' value='Terminar Editado' name='btn_Terminar_Editado'>
                </form>" ;      
       }

       //BOTON INGRESO DE BIBLIOGRAFIAS
      
        if(isset($_POST['btn_Nueva_Bibliografia']))
        {  
           $ID_PG=$_POST['ID_PG'];
           $ID_txt_bibiografia=$_POST['txt_Bibliografia'];

           $query="INSERT INTO `bibliografia` (`Id_Bibliografia`, `texto`, `ID_PG`) 
                   VALUES (NULL,'$ID_txt_bibiografia', '$ID_PG');";
                     $resultado=mysql_query($query,$link);

           echo "<script>alert('Datos Ingresados Correctamente');</script>";

           echo "<form method='post' action=''>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' value='atras' name='btn_Siguiente_Bibliografia'>
                </form>";
       }

       //BOTON EDITADO DE LAS BIBLIOGRAFIAS

        if(isset($_POST['btn_Editar_Bibliografia'])){
         
          $Bibliografia=$_POST['txt_Bibliografia'];
          $ID_Bibliografia=$_POST['ID_Bibliografia'];
          $ID_PG=$_POST['ID_PG'];
             
          $query="UPDATE bibliografia SET ID_PG= '$ID_PG', texto='$Bibliografia' 
           WHERE Id_Bibliografia = $ID_Bibliografia";

          $resultado=mysql_query($query,$link);

          echo "<script>alert('Edicion Correcta');</script>";
          
          echo "<form method='post' action=''>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' value='atras' name='btn_Siguiente_Bibliografia'>
                </form>";
       }

       // BOTON ELIMINAR BIBLIOGRAFIA
     
        if(isset($_POST['btn_Eliminar_Bibliografia'])){
           $Bibliografia=$_POST['txt_Bibliografia'];
           $ID_Bibliografia=$_POST['ID_Bibliografia'];
           $ID_PG=$_POST['ID_PG'];
             
          $query="DELETE FROM `bibliografia` 
                  WHERE `bibliografia`.`Id_Bibliografia` =$ID_Bibliografia";

          $resultado=mysql_query($query,$link);

          echo "<script>alert('Eliminado Correctamente');</script>";
          
          echo "<form method='post' action=''>
                <input type='text' name='ID_PG' style='visibility:hidden' value='".$ID_PG."'>
                <input type='submit' value='atras' name='btn_Siguiente_Bibliografia'>
                </form>";
        }

        if(isset($_POST['btn_Terminar_Editado']))
        {  
           $ID_PG=$_POST['ID_PG'];
           $CodigoD;
           echo "<script>alert('Llenado o Editado Terminado');</script>";
          
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