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
   <table id="Manual_Usuario">
    <tr><td> Realiza tu busqueda :</td><td></td></tr>
    <tr><td><input type="text" name="Txt_Busqueda" size="100"></td>
        <td><input type="submit" value="Buscar" name="Btn_Buscar"></td></tr>
  </table>
  </form>




  <?php
      if(isset($_POST['Btn_Buscar'])){
        echo "<h3>Resultados de su Busqueda:</h3>";
       
        echo '<table id="Tabla_Video">
   <tr><td><video src="Fallen To Flux   Halo.mp4" width="400" height="250" controls></video></td>
       <td id="td_documentacion">
        <article>
        Note that you should read "Variables/Variable scope" if you are looking for static keyword use for declaring static variables inside functions (or methods). I myself had this gap in my PHP knowledge until recently and had to google to find this out. I think this page should have a "See also" link to static function variables.
        http://www.php.net/manual/en/language.variables.scope.php
        </article>
      </td></tr>
</table>

<table id="Tabla_Video">
   <tr><td><video src="Fallen To Flux   Halo.mp4" width="400" height="250" controls></video></td>
       <td id="td_documentacion">
        <article>
        Note that you should read "Variables/Variable scope" if you are looking for static keyword use for declaring static variables inside functions (or methods). I myself had this gap in my PHP knowledge until recently and had to google to find this out. I think this page should have a "See also" link to static function variables.
        http://www.php.net/manual/en/language.variables.scope.php
        </article>
      </td></tr>
</table>

<table id="Tabla_Video">
   <tr><td><video src="Fallen To Flux   Halo.mp4" width="400" height="250" controls></video></td>
       <td id="td_documentacion">
        <article>
        Note that you should read "Variables/Variable scope" if you are looking for static keyword use for declaring static variables inside functions (or methods). I myself had this gap in my PHP knowledge until recently and had to google to find this out. I think this page should have a "See also" link to static function variables.
        http://www.php.net/manual/en/language.variables.scope.php
        </article>
      </td></tr>
</table>

<table id="Tabla_Video">
   <tr><td><video src="Fallen To Flux   Halo.mp4" width="400" height="250" controls></video></td>
       <td id="td_documentacion">
        <article>
        Note that you should read "Variables/Variable scope" if you are looking for static keyword use for declaring static variables inside functions (or methods). I myself had this gap in my PHP knowledge until recently and had to google to find this out. I think this page should have a "See also" link to static function variables.
        http://www.php.net/manual/en/language.variables.scope.php
        </article>
      </td></tr>
</table>

<table id="Tabla_Video">
   <tr><td><video src="Fallen To Flux   Halo.mp4" width="400" height="250" controls></video></td>
       <td id="td_documentacion">
        <article>
        Note that you should read "Variables/Variable scope" if you are looking for static keyword use for declaring static variables inside functions (or methods). I myself had this gap in my PHP knowledge until recently and had to google to find this out. I think this page should have a "See also" link to static function variables.
        http://www.php.net/manual/en/language.variables.scope.php
        </article>
      </td></tr>
</table>
';
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