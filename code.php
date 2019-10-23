<?php
  session_start();

  $connection = mysqli_connect("localhost", "root", "", "adminpanel");

  if(isset($_POST['registerbtn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword){

      $query = "INSERT INTO register (username,email,password) VALUES ('$username', '$email', '$password')";
      $query_run = mysqli_query($connection, $query);

      if($query_run){
        // echo "Saved";
        $_SESSION['success'] = "Admin Profile Added";
        header('Location: register.php');
      } else {
        $_SESSION['status'] = "Admin Profile NOT Added";
        header('Location: register.php');
      }

    } else {
      $_SESSION['status'] = "Password and Confirm Password Does Not Match";
      header('Location: register.php');
    }
  }

  if(isset($_POST['edit_btn'])){
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
  }
?>
