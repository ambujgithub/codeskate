<?php 
   session_start();
   session_unset();
   
   $_SESSION['FBID'] = NULL;
   $_SESSION['FULLNAME'] = NULL;
   $_SESSION['EMAIL'] =  NULL;
   $_SESSION['USERNAME'] =  NULL;
   $_SESSION['isfbuser'] = NULL;
   header("Location: index.php");        
?>