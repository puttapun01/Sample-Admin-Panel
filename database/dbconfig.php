<?php
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "adminpanel";

  $connection = mysqli_connect($db_host, $db_user, $db_pass);
  $dbconfig = mysqli_select_db($connection, $db_name);
?>
