<?php

  $Select=$_POST['select'];
  $user=$_POST['Txt_User'];
  $password=$_POST['Password_User'];

   for ($i=0;$i<count($Select);$i++) 
    { 
  
       $CargoSelec=$Select[$i];
            
       } 

  if(isset($_POST['BtnIngreso'])){	

  	$Selection=$_POST['select'];
  	
  	 if($CargoSelec=="Administrador"){
  	 	 $cargo="Administrador";
       $user;
       $password;
      require("coneccion.php");

      $consulta=mysql_query("SELECT * FROM usuario WHERE alias='$user' and password='$password' and cargo='$cargo'");
  	  $count = 0;

       try {

        while($row=mysql_fetch_array($consulta))
        {

           $Alias=$row['alias'];
           $Password=$row['password'];
           $Id=$row['ID_Docente'];
           $count++;
           
        }

         if($count == 1)
         {
            //echo "es 1";
            session_start();
            $_SESSION['Alias']=$Alias;
            $_SESSION['Password']=$Password;
            $_SESSION['ID']=$Id;
           
            echo "
            <script type='text/javascript'>
              alert('Bienvenido $Alias');
              window.location='admin/menu_root.php';
             </script>";

          // header("location: /TEST/MODELO/menu.php");

         }
         else{
          echo "
            <script type='text/javascript'>
              alert('No se encontro su cuenta vuelva a intentar');
              window.location='index.php';
             </script>";
         }
       
        } catch (Exception $e) {

          
        } 
     

     	//header("location:admin/menu_root.php");

  	  }

  	 if($CargoSelec=="Docente"){
       $cargo="Docente";
       $user;
       $password;
      
      require("coneccion.php");
      $consulta=mysql_query("SELECT * FROM docente WHERE User_Login='$user' and Password='$password'");
      $count = 0;

        try {

        while($row=mysql_fetch_array($consulta))
        {

           $Alias=$row['User_Login'];
           $Password=$row['Password'];
           $Id=$row['ID_Docente'];
           $count++;
           
        }

         if($count == 1)
         {
            //echo "es 1";
            session_start();
            $_SESSION['Alias']=$Alias;
            $_SESSION['Password']=$Password;
            $_SESSION['ID']=$Id;
           
            echo "
            <script type='text/javascript'>
              alert('Bienvenido $Alias');
              window.location='docente/menu.php';
             </script>";

          

         }
         else{
          echo "
            <script type='text/javascript'>
              alert('No se encontro su cuenta vuelva a intentar');
              window.location='index.php';
             </script>";
            }
       
        } 
        catch (Exception $e) { } 
     
  	 }

     if($CargoSelec==""){
       echo "<script type='text/javascript'>
              alert('Seleccione una opcion de cargo');
              window.location='index.php';
             </script>";
       //header("location:index.php");
     }
  	


  }

?>