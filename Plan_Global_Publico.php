<html lang='spa'>
<head>
  <title>Sistema de Planes Globales</title>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="Style.css">
  <link rel="stylesheet" type="text/css" href="Styles_funciones.css">
</head>
<body>
  <header><center><h2 id="titulo_Principal">Sistema de Planes Globales y Programas Analiticos</h2></center>
  <hr></hr>
  </header>
  
  <aside id="menu">
    <div id="titulo"><a id="titulo" href="index.php">Inicio</a></div>
    <div id="titulo"><a id="titulo" href="Plan_Global_Publico.php">Planes Globales</a></div>
    <div id="titulo"><a id="titulo" href="Programa_Analitico_Publico.php">Programas Analiticos</a></div>
    <div id="titulo"><a id="titulo" href="Manual_de_Usuario.php">Manual de Usuario</a></div>
    
    <form method="post" action="redireccion.php">
    <table id="tabla">
    <tr > <td id="t">usuario</td>
         <td id="t"><input type ="text" name="Txt_User" size="30" class="Txt_Input" placeholder="Nombre Usuario"></td></tr>
    <tr > <td id="t">password</td>
        <td id="t"><input type ="password" name="Password_User" size="30" class="Txt_Input" placeholder="Contrasenia"></td></tr>
        <tr><td id="t">cargo</td><td id="t">
        <select class="tipo_usuario" name="select[]">
          
          <option value=""></option>  
          <option value="Docente">Docente</option>
          <option value="Administrador">Administrador</option>
        </select></td></tr>
    <tr > <td id="t"  colspan="2"><center><input type ="submit" name="BtnIngreso" value="Ingresar" size="30" class="Bottom"></center></td></tr>

  </table>
  </form>




  </aside>

 <article id="cuerpo">

   <form method="post" action="">
    <table id="Tabla_Seleccion_Carrera">
    <tr><td><input type="submit" value="Presione Aqui para Comenzar" name="Btn_Buscar_Facultad"></td></tr>
    </table>
   </form>

     <?php
    
    $Facultad;
    $Carrera_Main;
    $Materia;
    if(isset($_POST['Btn_Buscar_Facultad']))
    {
     
     require('coneccion.php');
     $query="SELECT * FROM facultad";
     $resultado=mysql_query($query,$link);
     
     echo '<form method="post" action="">
     <table id="Tabla_Seleccion_Carrera">
     <tr><td><h3>Seleccione la Facultad</h3></td></tr>
       
     <tr><td><select class="Select_Facultad" name="Select_F[]">';
       echo '<option value=""></option>';
     
     while($row=mysql_fetch_array($resultado))
     { 

      echo '<option value="'.$row['ID_Facultad'].'">'.$row['Facultad'].'</option>'; 
 
      }

      echo '</select></td><td><input type="submit" value="Buscar" name="Btn_Buscar_Carrera"></td></tr>
            </table>
            </form>';
      }
      

    if(isset($_POST['Btn_Buscar_Carrera']))
    {


        $Seleccion_F=$_POST['Select_F'];

       for ($i=0;$i<count($Seleccion_F);$i++) 
       {  $Facultad=$Seleccion_F[$i];} 
       
    
     require('coneccion.php');
     $query="SELECT * FROM carrera WHERE id_facultad='$Facultad'";

     $resultado=mysql_query($query,$link);

      while($row0=mysql_fetch_array($resultado))
     { $f=$row0['facultad'];}

     echo '<h3> '.$f.' :</h3>';
     
     echo '<form method="post" action="">
    
     <tr><td>Seleccione la Carrera</td>
       
     <td><select class="Select_Carrera" name="Select_C[]">';
     echo '<option value=""></option>';
     
     $resultado=mysql_query($query,$link);
     while($row=mysql_fetch_array($resultado))
     {
        
      echo '<option value="'.$row['ID_Carrera'].'">'.$row['nombre_carrera'].'</option>'; 
 
      }

      echo '</select></td><td><input type="submit" value="Buscar" name="Btn_Buscar_Nivel"></td></tr>
          
            </form>';

      }


    if(isset($_POST['Btn_Buscar_Nivel']))
     {

     
       $Seleccion_C=$_POST['Select_C'];
  
       for ($i=0;$i<count($Seleccion_C);$i++) 
       {  $Carrera=$Seleccion_C[$i];} 
    
       require('coneccion.php');
       $query0="SELECT * FROM carrera WHERE ID_Carrera=$Carrera";

       $query="SELECT DISTINCT Nivel_Materia FROM materia WHERE ID_Carrera='$Carrera'";

       $resultado=mysql_query($query0,$link);

        while($row0=mysql_fetch_array($resultado))
       {
        
        echo '<h3> Carrera de : '.$row0['nombre_carrera'].'</h3>'; 
 
       }
     
       echo '<form method="post" action="">
       
       <input class="input_Carrera" type="text" value="'.$Carrera.'" name="txtCarrera" style="visibility:hidden"  value="Norway" readonly size="50"></br>
       <tr><td>Seleccione el nivel</td></tr>
       
       <tr><td><select class="Select_Carrera" name="Select_N[]">';
       echo '<option value=""></option>';

       $resultado=mysql_query($query,$link);
       while($row=mysql_fetch_array($resultado))
       {echo '<option value="'.$row['Nivel_Materia'].'">'.$row['Nivel_Materia'].'</option>'; }

        echo '</select></td><td><input type="submit" value="Mostrar" name="Btn_Buscar_Materia"></td>
        </td><td><input type="submit" value="Mostrar Todos" name="Btn_Buscar_Materia2"></td></tr>
            </table>
            </form>';
      }
      

      if(isset($_POST['Btn_Buscar_Materia']))
      {
        
         $S_Carrera=$_POST['txtCarrera'];
         $Seleccion_N=$_POST['Select_N'];

         //echo "$S_Carrera </br>";

      for ($i=0;$i<count($Seleccion_N);$i++) 
       { 
          $Nivel=$Seleccion_N[$i];
        } 

          //echo $Nivel;
       
       require('coneccion.php');

        $query0="SELECT * FROM carrera WHERE ID_Carrera=$S_Carrera";

        $resultado=mysql_query($query0,$link);

       while($row0=mysql_fetch_array($resultado))
       {
        // echo $row0['nombre_carrera']; 
        $Carrera=$row0['nombre_carrera'];}


       echo '<form method="post" action="">
             <h3 id="titulo_niveles">Carrera de : <input class="input_Carrera" type="text" value="'.$Carrera.
             '" name="txtCarrera" value="Norway" readonly size="50"></h3>';
       echo '<h3 id="titulo_niveles">Nivel : <input class="input_Carrera" type="text" value="'.$Nivel.
             '" name="txtNivel" value="Norway" readonly size="50"></h3>';
       
        
      //echo $S_Carrera;
     // echo $Nivel;

       $query="SELECT DISTINCT * FROM materia  
               where ID_Carrera=$S_Carrera AND Nivel_Materia='$Nivel'";

       $resultado=mysql_query($query,$link);
     
       echo '
      
       <tr><td>Seleccione el nivel</td></tr>
       
       <tr><td><select class="Select_Carrera" name="Select_M[]">';
       echo '<option value=""></option>';

       while($row=mysql_fetch_array($resultado))
       { 
        echo "el ID".$row['ID_Materia'];
     
        echo '<option value="'.$row['ID_Materia'].'">'.$row['Nombre_Materia'].'</option>'; }

        echo '</select></td><td><input type="submit" value="Mostrar" name="Btn_Buscar_Materias"></td>
        </td></tr>
            </table>
            </form>';

            
      }

      if(isset($_POST['Btn_Buscar_Materias'])){
        
      
       $Seleccion_M=$_POST['Select_M'];
    
  
       for ($i=0;$i<count($Seleccion_M);$i++) 
       {  $ID_Materia=$Seleccion_M[$i];} 

       //echo "es =".$ID_Materia."</br>";

       require ("coneccion.php");
       $query="SELECT DISTINCT * FROM materia WHERE ID_Materia=$ID_Materia";
       $resultado=mysql_query($query,$link);
       while($row=mysql_fetch_array($resultado))
       {
         echo "<h3> Materia :".$row['Nombre_Materia']."</h3>"; 
       }

       $Select_Carrera=$_POST['txtCarrera'];

       $query="SELECT * FROM materia WHERE ID_Materia=$ID_Materia";

       $resultado=mysql_query($query,$link);
     
       echo '<form method="post" action="">
     
       <table class="Tabla_Frontal"><tr><td id="td_Materia"> Materia </td>
       <td id="td_Grupo"> Grupo </td><td id="td_Select">Seleccion</td>
       <td id="td_Imprimir">Imprimir</td></tr></table>';
       while($row=mysql_fetch_array($resultado))
       {
            
        echo '<table class="Table_Materia">
              <tr>
              <td id="td_Materia1">'.$row['Nombre_Materia'].'<input type="text" style="visibility:hidden" value="
              '.$row['ID_Materia'].'" name="txt_ID_Materia" class="input_Carrera" size="50"></td>
              
              <td id="td_Grupo1">'.$row['Grupo'].'<input type="text" value="'.$row['Grupo'].'" name="txtGrupo" class="input_Grupo" style="visibility:hidden"></td>
              
              <td id="td_Boton1"><input type="submit" value="Plan Global" name="Btn_Plan_Global"></br>
               
              <input type="submit" value="Programa Analitico" name="Btn_Plan_Global"></td>
              
               <td id="td_Imprimir1"><input type="submit" value="Imprimir PG" name="BtnImprimir">
                
                <input type="submit" value="Imprimir PA" name="BtnImprimir"></td></tr>

            </table>';
        
 
       }

       echo '</form>';
           

      }
      
      if(isset($_POST['Btn_Plan_Global']))
      {
       // echo "Aca el plan global </br>";
       // echo "el ID es :".$Materia=$_POST['txt_ID_Materia']."</br>";
       // echo "el grupo es :".$Grupo=$_POST['txtGrupo']."</br>";

        
        require("coneccion.php");

        echo "<p><h2> DATOS DE IDENTIFICACION </h2></p>";
        
      $query="SELECT * FROM planglobal pg,materia m,docente d 
        WHERE pg.ID_PG=1 AND pg.ID_Materia=m.ID_Materia AND pg.ID_Docente=d.ID_Docente AND pg.tipo='Titular'";

      $resultado=mysql_query($query,$link);
     
        echo "<table>";
        while ($row=mysql_fetch_array($resultado)) {
        
          echo " <tr><td>&bull; Nombre de la materia: </td><td>".$row['Nombre_Materia']."</br></td></tr>";
          echo " <tr><td>&bull; Codigo: </td><td>".$row['Codigo']."</br></td></tr>";
          echo " <tr><td>&bull; Grupo: </td><td>".$row['Grupo']."</br></td></tr>";
          echo " <tr><td>&bull; Carga Horaria: </td><td>".$row['Carga_Horaria']."</br></td></tr>";
          echo " <tr><td>&bull; Materias con las que se relaciona </td><td>".$row['Materias_Relacionadas']."</br></td></tr>";
          echo " <tr><td>&bull; Docente: </td><td>".$row['Nombre_Completo']."</br></td></tr>";
          echo " <tr><td>&bull; Telefono: </td><td>".$row['Telefono']."</br></td></tr>";
          echo " <tr><td>&bull; Correo Electronico: </td><td>".$row['Correo']."</br></p></td></tr>";
        }
          
        echo "</table>";
        
        echo "<p><h2> JUSTIFICACION </h2></p>";

      $query="SELECT * FROM planglobal pg,justificacion j WHERE pg.ID_PG=1 AND j.ID_PG=pg.ID_PG";

       $resultado=mysql_query($query,$link);
       
       while ($row=mysql_fetch_array($resultado)) {
             echo $row['Justificacion']."</br></p>";

       }
       
          echo "<p><h2> OBJETIVOS </h2></p>";

      $query="SELECT * FROM objetivo ob, objetivos obs WHERE ob.ID_Objetivo=obs.Clave_Objetivo AND ob.ID_PG=1";

       $resultado=mysql_query($query,$link);
       
       while ($row=mysql_fetch_array($resultado)) {
             echo $row['Texto_Obj']."</br></p>";

       }

     
        echo "<p><h2> SELECCION Y ORGANIZACION DE CONTENIDOS </h2></p>";
        
       $query="SELECT * FROM unidad WHERE ID_PG=1";

        $resultado=mysql_query($query,$link);
       
       while ($row=mysql_fetch_array($resultado)) {
             echo "<h3>".$row['Numero_Unidad']." .- ".$row['Unidad']."</h3></p>"; }


        echo "<h3>OBJETIVOS</h3>";
       $query="SELECT * FROM unidad u,seccion_objetivo o WHERE u.ID_PG=3 and u.ID_Unidad=o.ID_Unidad";

        $resultado=mysql_query($query,$link);
       
       while ($row=mysql_fetch_array($resultado)) {
             echo $row['Objetivo']."</br></p>"; }

       echo "<h3>CONTENIDOS</h3>";
       $query="SELECT * FROM unidad u,seccion_contenido o WHERE u.ID_PG=3 AND u.ID_Unidad=o.ID_Unidad";

       $resultado=mysql_query($query,$link);
       
       while ($row=mysql_fetch_array($resultado)) {
             echo $row['Contenido']."</br></p>";}


       echo "<p><h2> METODOLOGIAS </h2></p>";
       $query="SELECT * FROM metodologia m,planglobal pg WHERE pg.ID_PG=m.ID_PG AND pg.ID_PG=1";

       $resultado=mysql_query($query,$link);
       
       while ($row=mysql_fetch_array($resultado)) {
             echo " &bull; ".$row['Metodologia']." </br></p>";

       }
      
       echo "<p><h2> CRONOGRAMA O DURACION DE PERIODOS</h2></p>";

      $query="SELECT * FROM cronograma c,planglobal pg WHERE pg.ID_PG=c.ID_PG AND pg.ID_PG=1";

       $resultado=mysql_query($query,$link);
       
       while ($row=mysql_fetch_array($resultado)) {
             echo $row['Unidad']." | ";
             echo $row['Duracion_Horas']." | ";
             echo $row['Duracion_Semnas']." | </br></br>";
        

       }

     

        echo "<p><h2> CRITERIOS DE EVALUACION </h2></p>";
       $query="SELECT * FROM criterio_evaluacion c, criterio cr WHERE c.ID_PG=1 AND c.Id_Criterio=cr.ID_Criterio_Evaluacion";

       $resultado=mysql_query($query,$link);
       
       while ($row=mysql_fetch_array($resultado)) {
             echo " &bull; ".$row['Criterio']." </br></p>";

       }

       echo "<p><h2> BIBLIOGRAFIA </h2></p>";
       $query="SELECT * FROM bibliografia b,planglobal pg WHERE pg.ID_PG=b.ID_PG AND pg.ID_PG=1";

       $resultado=mysql_query($query,$link);
       
       while ($row=mysql_fetch_array($resultado)) {
             echo $row['texto']." </P> ";

       }
       
      }

    

























   /*echo '<tr><td>CARRERA</td></tr>
        <tr><td><select class="select" name="Select_C[]">
        <option value=""></option>
        <option value="Ing_Civil">Ingenieria Civil</option>
        <option value="Ing_Alimentos">Ingenieria De Alimentos</option>
        <option value="Ing_Sistemas">Ingenieria De Sistemas</option>
        <option value="Ing_Electrica">Ingenieria Electrica</option>
        <option value="Ing_Electronica">Ingenieria Electronica</option>
        <option value="Ing_Electromecanica">Ingenieria Electromecanica</option>
        <option value="Ing_Industrial">Ingenieria Industrial</option>
        <option value="Ing_Informatica">Ingenieria en Informatica</option>
        <option value="Ing_Matematica">Ingenieria Matematica</option>
        <option value="Ing_Mecanica">Ingenieria Mecanica</option>
        <option value="Ing_Mecanica_Quimica">Ingenieria Quimica</option>
        <option value="Lic_Biologia">Licenciatura en Biologia</option>
        <option value="Lic_Dact_Fisica">Licenciatura en Didactica de la Fisica</option>
        <option value="Lic_Dact_Matematica">Licenciatura en Didactica de la Matematica</option>
        <option value="Lic_Fisica">Licenciatura en Fisica</option>
        <option value="Lic_Matematica">Licenciatura en Matematicas</option> 
        <option value="Lic_Quimica">Licenciatura en Quimica</option>
       
       </select></td><td><input type="submit" value="Buscar" name="Btn_Buscar_Carrera"></td></tr>';

      <td>FACULTAD</td></tr>
       
       <tr><td><select class="Select_Facultad" name="Select_F[]">
        <option value=""></option>
        <option value="F_Tecnologia">Facultad de Ciencias y Tecnoligia</option>
        <option value="F_Medicina">Facultad de Medicina</option>
        <option value="F_Economia">Facultad de Economia</option>
        <option value="F_Arquitectura">Facultad de Arquitectura</option>
        <option value="F_Humanidades">Facultad de Humanidades</option>
        <option value="F_Agronomia">Facultad de Agronomia</option>
        <option value="F_Derecho">Facultad de Derecho</option>

       </select></td>*/

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

 