 <?php
$Cod_PG= $_GET['Cod_PG']; 
$Cod_M=$_GET['Cod_M']; 
  # Cargamos la librería dompdf.
         require_once("dompdf/dompdf_config.inc.php");
         require("coneccion.php");
 



       $html='<html>
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <link rel="stylesheet" type="text/css" href="estilos2.css">
            <title>Sistemas Globales.</title>
            </head>
            <body> ';

       $html.='<center><P id="tabla_titulo" >UNIVERSIDAD MAYOR DE SAN SIMON </P>
                <P id="tabla_titulo" >FACULTAD DE CIENCIAS Y TECNOLOGIA</P>
                <hr id="linea_primaria"></hr>
                <h4 id="tabla_titulo">PLAN GLOBAL</h4>';

                  $consulta="SELECT DISTINCT * FROM materia m WHERE m.ID_Materia=$Cod_M";
  
                  $resultado=mysql_query($consulta);

                   while($row=mysql_fetch_array($resultado)){

                   $html.='<h4 id="tabla_titulo">'.$row['Nombre_Materia'].'</h4>';}
                   $html.='</center>';

                   $html.='<hr id="linea_secundaria"></hr>';

 //I. DATOS DE IDENTIFICACION
             //$html.='';
             $html.='<H4 id="tabla_title">I. DATOS DE IDENTIFICACION</H4> <table id="tabla_Ident">';

          $consulta="SELECT DISTINCT * FROM materia m WHERE m.ID_Materia=$Cod_M";
  
          $resultado=mysql_query($consulta);

        while($row=mysql_fetch_array($resultado)){

           $html.='<tr><td>&bull; Nombre de la materia :</td><td>'.
                $row['Nombre_Materia'].'</td></tr>
               <tr><td>&bull; Codigo :</td><td>'
               .$row['Codigo'].'</td></tr>
               <tr><td>&bull; Grupo :</td><td>'
               .$row['Grupo'].'</td></tr>
               <tr><td>&bull; Carga horaria :</td><td>'
               .$row['Carga_Horaria'].'</td></tr>
               <tr><td>&bull; Materias Relacionadas :</td><td>'
               .$row['Materias_Relacionadas'].'</td></tr>';

          }
         

    $html.='<tr><td>&bull; Docente : </td><td>
           <table>';
           
              $consulta="SELECT * FROM planglobal pg,materia m,docente d 
                   WHERE m.ID_Materia=$Cod_M AND pg.ID_Materia=m.ID_Materia 
                   AND pg.ID_Docente=d.ID_Docente";
  
        $resultado=mysql_query($consulta);

        while($row=mysql_fetch_array($resultado)){

           $html.='<tr><td>'.$row['Nombre_Completo'].' '
                          .$row['Apellido_Paterno'].' '
                          .$row['Apellido_Materno'].' '
                          .'</td></tr>';
          }

    $html.='</table
             </td></tr>';
  // MOSTRAR TELEFONOS
    $html.='<tr><td>&bull; Telefono :</td><td>
           <table>';

           $consulta="SELECT * FROM planglobal pg,materia m,docente d 
                      WHERE m.ID_Materia=$Cod_M AND pg.ID_Materia=m.ID_Materia 
                      AND pg.ID_Docente=d.ID_Docente";
  
        $resultado=mysql_query($consulta);

        while($row=mysql_fetch_array($resultado)){

           $html.='<tr><td>'.$row['Telefono'].'</td></tr>';
          } 
          
    $html.='</table></td></tr>';

    //MOTRANDO CORREOS

    $html.='<tr><td>&bull; Correo : </td><td>
           <table>';

           $consulta="SELECT * FROM planglobal pg,materia m,docente d 
                      WHERE m.ID_Materia=$Cod_M AND pg.ID_Materia=m.ID_Materia 
                      AND pg.ID_Docente=d.ID_Docente";
  
        $resultado=mysql_query($consulta);

        while($row=mysql_fetch_array($resultado)){

           $html.='<tr><td>'.$row['Correo'].'</td></tr>';
          } 
          
    $html.='</table></td></tr></table><p>a</p>';


    //MOSTRAR JUSTIFICACION

         $html.='<H4 id="tabla_title">II. JUSTIFICACION</H4>'; 
        
         $html.='<table id="tabla_Ident">';

          $query="SELECT * FROM justificacion j,planglobal pg 
                  WHERE j.ID_PG='$Cod_PG' AND pg.tipo='Titular' AND j.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query,$link);

          while($row=mysql_fetch_array($resultado)){

               $html.='<tr><td>'.$row['Justificacion'].'</td></tr>'; } 
          
               $html.='</table><p>a</p>';


  //MOSTRAR OBJETIVOS

           //MOSTRAR JUSTIFICACION

         $html.='<H4 id="tabla_title">III. OBJETIVOS</H4>'; 
        
         $html.='<table id="tabla_Ident">';

          $query="SELECT * FROM objetivo o,planglobal pg 
                  WHERE o.ID_PG='$Cod_PG' AND pg.tipo='Titular' AND o.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               $html.='<tr><td>&bull; '.$row['Texto_Obj'].'</td></tr>'; } 
          
               $html.='</table><p>a</p>';

 //MOSTRAR SELECCION Y ORGANIZACION DE CONTENIDOS

          $html.='<H4 id="tabla_title_large">IV. SELECCION Y ORGANIZACION DE CONTENIDOS</H4>'; 
        
        

          $query="SELECT COUNT(*) FROM unidad u,planglobal pg 
                  WHERE u.ID_PG='$Cod_PG' AND pg.tipo='Titular' AND u.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query,$link);
          $u=mysql_result($resultado, 0, "COUNT(*)");
          
          $query1=" SELECT * FROM unidad u,planglobal pg 
                    WHERE u.ID_PG='$Cod_PG' AND pg.tipo='Titular' AND u.ID_PG=pg.ID_PG";
          $resultado1=mysql_query($query1,$link);
          
          $html.='<table id="tabla_Ident"><tr><td>';
        
         for ($i=0; $i <$u; $i++) { 
             
              
             mysql_result($resultado1, $i, "Unidad");
             $id_unidad=mysql_result($resultado1, $i, "ID_Unidad");
        
             $html.='<h4> Unidad '.mysql_result($resultado1, $i, "Numero_Unidad").' .-
             '.mysql_result($resultado1, $i, "Unidad").'</h4>';


             //OBJETIVO
             $query2="SELECT COUNT(*) FROM seccion_objetivo WHERE ID_Unidad=$id_unidad";
             $resultado2=mysql_query($query2,$link);

             $n=mysql_result($resultado2, 0, "COUNT(*)");
             
             $html.='Objetivo(s) de la unidad:';

              for ($j=0; $j <$n ; $j++) { 
                 
                  $query3="SELECT * FROM seccion_objetivo WHERE ID_Unidad=$id_unidad";
                  $resultado3=mysql_query($query3,$link);
                  
                   $html.='<table><tr><td>&bull; '.mysql_result($resultado3, $j, "Objetivo").'</td></tr></table>';
    
                }
                

             // CONTENIDO

                $query4="SELECT COUNT(*) FROM seccion_contenido WHERE ID_Unidad=$id_unidad";
                $resultado4=mysql_query($query4,$link);

                $m=mysql_result($resultado4, 0, "COUNT(*)");
                $html.='Contenido :';
                 
                for ($k=0; $k <$m ; $k++) { 
                    $query5="SELECT * FROM seccion_contenido WHERE ID_Unidad=$id_unidad";
                    $resultado5=mysql_query($query5,$link);
                 
                 $html.='<table><tr><td>'.mysql_result($resultado5, $k, "Contenido").'</td></tr></table>';

                }
                
             }

             $html.='</td></tr></table><p>a</p>';


        //MOSTRAMOS METODOLOGIAS

         $html.='<H4 id="tabla_title">V. METODOLOGIAS</H4>'; 
        
         $html.='<table id="tabla_Ident">';

          $query="SELECT * FROM metodologia m,planglobal pg 
                  WHERE m.ID_PG='$Cod_PG' AND pg.tipo='Titular' AND m.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               $html.='<tr><td>&bull; '.$row['Metodologia'].'</td></tr>'; } 
          
          $html.='</table><p>a</p>';  

          //MOSTRAREMOS CRONOGRAMA O DURACIÓN EN PERIODOS ACADÉMICOS POR UNIDAD
         
          $html.='<H4 id="tabla_title_large_2" >VI. CRONOGRAMA O DURACIÓN EN PERIODOS ACADÉMICOS POR UNIDAD</H4>'; 
        
          $html.='<table id="tabla_Ident">';

          $query="SELECT * FROM planglobal pg,unidad u WHERE pg.ID_PG='$Cod_PG' AND pg.tipo='Titular' AND pg.ID_PG=u.ID_PG";

          $resultado=mysql_query($query);
          $html.='<tr><td id="titulo_tabla">Unidad</td>
                    <td id="titulo_tabla">Duracion </br> (Horas Academicas)</td>
                    <td id="titulo_tabla">Duracion en Semana</td></tr>';

          while($row=mysql_fetch_array($resultado)){

               $html.='<tr><td>&bull; '.$row['Unidad'].'</td><td id="td_Medio" >'.
                     $row['Hora_Academica'].'</td><td id="td_Medio">'.$row['Cant_Semana'].'</td></tr>'; } 
          
          $html.='</table><p>a</p>';  

          //MOSTRAREMOS CRITERIOS DE EVALUACION

          $html.='<H4 id="tabla_title">VII. CRITERIOS DE EVALUACION</H4>'; 
        
          $html.='<table id="tabla_Ident">';

          $query="SELECT * FROM criterio c,planglobal pg 
                  WHERE c.ID_PG='$Cod_PG' AND pg.tipo='Titular' AND c.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               $html.='<tr><td>&bull; '.$row['Criterio'].'</td></tr>'; } 
          
          $html.='</table><p>a</p>';  
         
          //MOSTRAREMOS BIBLIOGRAFIA

          $html.='<H4 id="tabla_title">VIII. BIBLIOGRAFIA</H4>'; 
        
          $html.='<table id="tabla_Ident">';

          $query="SELECT * FROM bibliografia b,planglobal pg 
                  WHERE b.ID_PG='$Cod_PG' AND pg.tipo='Titular' AND b.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               $html.='<tr><td>&bull; '.$row['texto'].'</td></tr>'; } 
          
          $html.='</table><p>a</p>'; 

            ///*
            $html.='
            </body>
            </html>';
             
            # Instanciamos un objeto de la clase DOMPDF.
            $mipdf = new DOMPDF();
             
            # Definimos el tamaño y orientación del papel que queremos.
            # O por defecto cogerá el que está en el fichero de configuración.
            $mipdf ->set_paper("letter", "portrait");
             
            # Cargamos el contenido HTML.
            $mipdf ->load_html(utf8_decode($html));
             
            # Renderizamos el documento PDF.
            $mipdf ->render();
             
            # Enviamos el fichero PDF al navegador.
            $mipdf ->stream('Plan_Global.pdf');
            //*/
?>