<html>
<head>
	<title>Sistema de Planes Globales</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	<center><h2>Sistema de Planes Globales</h2></center>
	<hr></hr>
	
	<div id="menu">
    <div id="titulo">Inicio</div>
   <div id="titulo"><a id="titulo" href="Plan_Global_Publico.php">Plan Global</a></div>
    <div id="titulo"><a id="titulo" href="Plan_Analitico_Publico.php">Plan Analitico</a></div>
    <div id="titulo"><a id="titulo" href="">Docentes</a></div>
    <div id="titulo">Manual de Usuario</div>
    
    <form method="post" action="redireccion.php">
    <table id="tabla">
		<tr > <td id="t">usuario</td>
			   <td id="t"><input type ="text" name="Txt_User" size="30" class="Txt_Input"></td></tr>
		<tr > <td id="t">password</td>
			  <td id="t"><input type ="password" name="Password_User" size="30" class="Txt_Input"></td></tr>
			  <tr><td id="t"></td><td id="t">
			  <select class="tipo_usuario" name="select[]">
			  	<option value="Docente">Docente</option>
          <option value="Administrador">Administrador</option>
			  </select></td></tr>
		<tr > <td id="t"  colspan="2"><center><input type ="submit" name="BtnIngreso" value="Ingresar" size="30" class="Bottom"></center></td></tr>

	</table>
	</form>


	</div>

<div id="cuerpo">
    <center>

    <?php      


  
    if(isset($_POST['Btn_Ver_Plan_Global']))
    {
        echo '
           <form method="post" action="">
          <center> <h3 id="titulo_plan_global">UNIVERSIDAD MAYOR DE SAN SIMON</H3>
          <h3 id="titulo_plan_global">FACULTAD DE CIENCIAS Y TECNOLOGIA</h3></center>
          <hr>
            <table id="tabla_Plan_Global">
           
            <tr><td colspan="3"><h3>I. DATOS DE IDENTIFICACION</h3></td></tr>
            <tr><td> &bull; Nombre de la materia :</td><td colspan="2">FISICA I</td></tr>
            <tr><td> &bull; Codigo</td><td colspan="2">2010042</td></tr>
            <tr><td> &bull; Grupo</td><td colspan="2">1</td></tr>
            <tr><td> &bull; Carga horaria</td><td colspan="2"> 24hrs / mes </td></tr>
            <tr><td> &bull; Materias con la que se relaciona :</td><td> Algoritmos Avanzados Programación WEB </td></tr>
            <tr><td> &bull; Docentes :</td><td> Jaime Christian Villazón Alcocer Rosemary Torrico Bascope </td></tr>
            <tr><td> &bull; Telefono :</td><td> 4543241 </td></tr>
            <tr><td> &bull; Correo Electronico :</td><td> christian@umss.edu.bo rosemarytb@yahoo.com </td></tr>

          </table>
          <br>
          
          <table id="tabla_Plan_Global">
          <tr><td colspan="3"><h3>II. JUSTIFICACION</h3></td></tr>
          <tr><td colspan="2"><article>

Durante las últimas décadas, el campo de la Graficación por Computadora ha evolucionado de una manera continua y rápida aplicándose a diversas áreas del saber humano que van desde la simulación hasta el entretenimiento, muchas de las cuales han maravillado e impactado a la sociedad.   
Entre las numerosas aplicaciones, podemos mencionar las siguientes: Interfaces GUI, Industria del Entretenimiento, Aplicaciones Comerciales, Diseño Asistido, Aplicaciones Científicas, Medicina, Cartografía y GIS.   
Todos estos sistemas, utilizados para fines tan diversos, tienen un fundamento subyacente que consiste en una seria de técnicas derivadas de la aplicación de la Graficación por Computadora. En este contexto se hace necesario un estudio de los algoritmos y técnicas gráficas que  permitan el desarrollo de nuevas aplicaciones para solucionar  diversos problemas que se presentan. . 

</article></td></tr>
        

          </table>
          <br>

            <table id="tabla_Plan_Global">
            <tr><td colspan="3"><h3>III. OBJETIVOS</h3></td></tr>
            <tr><td colspan="3"><article>
             &bull; Tener los suficientes fundamentos matemáticos, geométricos y de programación para desarrollar aplicaciones gráficas.<br> 

             &bull; Introducir los algoritmos y estructura de datos necesarios para presentar datos gráficamente en una computadora. <br>

             &bull; Estudiar la generación de las primitivas básicas y su correspondiente manipulación. <br>
             &bull; Desarrollar modelos 3D, junto con su representación, visualización y transformación. <br>
             &bull; Generar imágenes con realismo fotográfico. <br>
             &bull; Aprender algoritmos y técnicas para el modelamiento geométrico. <br>
             &bull; Tener conocimiento sobre los modelos Fractales y su aplicación. <br>


            </article></td></tr>
        

          </table>
          <br>
            <table id="tabla_Plan_Global">
            <tr><td colspan="3"><h3>IV. SELECCION Y ORGANIZACION DE CONTENIO </h3></td></tr>
             <tr><td> <article>

              

             </article></td></tr>
            

          </table>
          <br>
          
            <table id="tabla_Plan_Global">
             <tr><td colspan="3"><h3>V. METODOLOGIAS </h3></td></tr>
             <tr><td> &bull; Ingrese la Metodologia :</td></tr>
             <tr><td colspan="2"><textarea  rows="3" cols="108" ></textarea></td><td><input type="submit" value="Insertar"></td></tr>
            
          </table>
          <br>

          <table id="tabla_Plan_Global">
             <tr><td colspan="3"><h3>VI. CRONOGRAMA O DURACION EN PERIODOS ACADEMICOS POR UNIDAD</h3></td></tr>
             <tr><td> &bull; Ingrese la Unidad :</td></tr>
             <tr><td colspan="2"><textarea  rows="3" cols="108" ></textarea></td>
             <tr><td> &bull; Ingrese la Duracion (HORAS ACADEMICAS) :</td></tr>
             <tr><td colspan="2"><textarea  rows="3" cols="108" ></textarea></td>
             <tr><td> &bull; Ingrese la Duracion en Semana :</td></tr>
             <tr><td colspan="2"><textarea  rows="3" cols="108" ></textarea></td>
             <td><input type="submit" value="Insertar"></td></tr>
            
          </table>
          <br>

            <table id="tabla_Plan_Global">
             <tr><td colspan="3"><h3>VII. CRITERIOS DE EVALUACION</h3></td></tr>
             <tr><td> &bull; Ingrese el Criterio :</td></tr>
             <tr><td colspan="2"><textarea  rows="3" cols="108" ></textarea></td>
             <td><input type="submit" value="Insertar"></td></tr>
            
          </table>
          <br>
   
            <table id="tabla_Plan_Global">
             <tr><td colspan="3"><h3>VIII. BIBLIOGRAFIA</h3></td></tr>
             <tr><td> &bull; Ingrese la bibliografia :</td></tr>
             <tr><td colspan="2"><textarea  rows="3" cols="108" ></textarea></td>
             <td><input type="submit" value="Insertar"></td></tr>
            
          </table>
          <br>

        ';


    }

           
          
          ?>
    
  
    </center>
    
</div>



</body>

</html>