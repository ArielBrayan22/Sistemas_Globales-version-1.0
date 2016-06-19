<?php
session_start();
session_destroy();
header("location: /Sistemas_Globales/index.php");
?>