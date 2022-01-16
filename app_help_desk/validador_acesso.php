<?php
  
  session_start();

  if(!isset($_SESSION['autentificado']) || $_SESSION['autentificado'] != 'SIM'){

      header('Location: index.php?login=erro2');
  };
  
?>