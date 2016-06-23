<html>
<head>
  <title>Sistema de Planes Globales</title>
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
    <tr><td><input type="submit" value="Buscar" name="Btn_Buscar_Facultad"></td></tr>
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
        
      echo '<option value="'.$row['Nombre_Facultad'].'">'.$row['Nombre_Facultad'].'</option>'; 
 
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
       
       echo "<h3> Facultad de :".$Facultad."</h3>";

     require('coneccion.php');
     $query="SELECT Nombre_Carrera FROM carrera c WHERE Facultad='$Facultad'";

     $resultado=mysql_query($query,$link);
     
     echo '<form method="post" action="">
    
     <tr><td>Seleccione la Carrera</td>
       
     <td><select class="Select_Carrera" name="Select_C[]">';
       echo '<option value=""></option>';
     while($row=mysql_fetch_array($resultado))
     {
        
      echo '<option value="'.$row['Nombre_Carrera'].'">'.$row['Nombre_Carrera'].'</option>'; 
 
      }

      echo '</select></td><td><input type="submit" value="Buscar" name="Btn_Buscar_Nivel"></td></tr>
          
            </form>';

      }


    if(isset($_POST['Btn_Buscar_Nivel']))
     {

     
       $Seleccion_C=$_POST['Select_C'];
  
       for ($i=0;$i<count($Seleccion_C);$i++) 
       {  $Carrera=$Seleccion_C[$i];} 
       
      $Carrera_Main=$Carrera;
      
       require('coneccion.php');
       $query="SELECT DISTINCT Nivel_Materia FROM materia WHERE carrera='$Carrera'";

       $resultado=mysql_query($query,$link);
     
       echo '<form method="post" action="">
       
       <h3>Carrera de : <input class="input_Carrera" type="text" value="'.$Carrera.'" name="txtCarrera" value="Norway" readonly size="50"></br></h3>
       <tr><td>Seleccione el nivel</td></tr>
       
       <tr><td><select class="Select_Carrera" name="Select_N[]">';
       echo '<option value=""></option>';
       while($row=mysql_fetch_array($resultado))
       {
        
        echo '<option value="'.$row['Nivel_Materia'].'">'.$row['Nivel_Materia'].'</option>'; 
 
       }

        echo '</select></td><td><input type="submit" value="Mostrar" name="Btn_Buscar_Materia"></td>
        </td><td><input type="submit" value="Mostrar Todos" name="Btn_Buscar_Materia"></td></tr>
            </table>
            </form>';
      }
      
      if(isset($_POST['Btn_Buscar_Materia']))
      {
           
         $Select_Carrera=$_POST['txtCarrera'];
         $Seleccion_N=$_POST['Select_N'];
  
       for ($i=0;$i<count($Seleccion_N);$i++) 
       {  $Nivel=$Seleccion_N[$i];} 
       echo '<form method="post" action="">
             <h3 id="titulo_niveles">Carrera de : <input class="input_Carrera" type="text" value="'.$Select_Carrera.
             '" name="txtCarrera" value="Norway" readonly size="50"></h3>';
       echo '<h3 id="titulo_niveles">Nivel : <input class="input_Carrera" type="text" value="'.$Nivel.
             '" name="txtNivel" value="Norway" readonly size="50"></h3>';
       
        

       require('coneccion.php');
      
       $query="SELECT DISTINCT Nombre_Materia FROM materia m, carrera c 
               where m.carrera='$Select_Carrera' and m.Nivel_Materia='$Nivel' and m.Carrera=c.Nombre_Carrera";

       $resultado=mysql_query($query,$link);
     
       echo '
      
       <tr><td>Seleccione el nivel</td></tr>
       
       <tr><td><select class="Select_Carrera" name="Select_M[]">';
       echo '<option value=""></option>';
       while($row=mysql_fetch_array($resultado))
       {
        
        echo '<option value="'.$row['Nombre_Materia'].'">'.$row['Nombre_Materia'].'</option>'; 
 
       }

        echo '</select></td><td><input type="submit" value="Mostrar" name="Btn_Buscar_Materias"></td>
        </td></tr>
            </table>
            </form>';
           

      }

      if(isset($_POST['Btn_Buscar_Materias'])){
        
       $Seleccion_M=$_POST['Select_M'];
       $Seleccion_nivel=$_POST['txtNivel'];
  
       for ($i=0;$i<count($Seleccion_M);$i++) 
       {  $Materia=$Seleccion_M[$i];} 
       $Select_Carrera=$_POST['txtCarrera'];
       //echo $Select_Carrera;
       //echo $Seleccion_nivel;
       
       echo "<h3> La Materia es :".$Materia."</h3>";
     

       require('coneccion.php');
       $query="SELECT DISTINCT * FROM materia m, carrera c
       where m.carrera='$Select_Carrera' and m.Nivel_Materia='$Seleccion_nivel' and m.Nombre_Materia='$Materia'
       and m.Carrera=c.Nombre_Carrera";

       $resultado=mysql_query($query,$link);
     
       echo '<form method="post" action="">
     
       <table class="Tabla_Frontal"><tr><td id="td_Materia"> Materia </td>
       <td id="td_Grupo"> Grupo </td><td id="td_Select">Seleccion</td>
       <td id="td_Imprimir">Imprimir</td></tr></table>';
       while($row=mysql_fetch_array($resultado))
       {
            
        echo '<table class="Table_Materia">
              <tr><td id="td_Materia1">'.$row['Nombre_Materia'].'<input type="text" style="visibility:hidden" value="'.$row['Nombre_Materia'].'" name="txtMateria" class="input_Carrera" size="50"></td>
                  <td id="td_Grupo1">'.$row['Numero_Grupo'].'<input type="text" value="'.$row['Numero_Grupo'].'" name="txtGrupo" class="input_Grupo" style="visibility:hidden"></td>
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
        echo "Aca el plan global </br>";
        $Materia=$_POST['txtMateria'];
        $Grupo=$_POST['txtGrupo'];

        echo $Materia." - ".$Grupo;
          

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

 