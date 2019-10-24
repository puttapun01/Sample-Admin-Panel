<link href="css/sb-admin-2.min.css" rel="stylesheet">
<?php
session_start();
include('database/dbconfig.php');

if($dbconfig) {
  // echo "Database Connected";
} else {
  echo '
  <div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto" data-text="Fail">Fail</div>
      <p class="lead text-gray-800 mb-5">Database Connection Failed</p>
      <p class="text-gray-500 mb-0">Please Check Your Database...</p>
      <a href="index.php">&larr; Back to Dashboard</a>
    </div>

  </div>

  ';
}

if(!$_SESSION['username']){
  header('Location: login.php');
}

?>
