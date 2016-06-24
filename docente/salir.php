<?php
session_start();
session_destroy();
header("location: /Sistemas_Globales-version-1.1/index.php");
?>