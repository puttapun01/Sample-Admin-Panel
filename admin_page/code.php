<?php
  include('security.php');

  if(isset($_POST['registerbtn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if($password === $cpassword){

      $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username', '$email', '$password', '$usertype')";
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

  if(isset($_POST['updatebtn'])){

    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['update_usertype'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertype' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
      $_SESSION['success'] = "Your Data is Updated";
      header('Location: register.php');
    } else {
      $_SESSION['status'] = "Your Data is NOT Updated";
      header('Location: register.php');
    }

  }

  if(isset($_POST['delete_btn'])){

    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
      $_SESSION['success'] = "Your Data is DELETED";
      header('Location: register.php');
    } else {
      $_SESSION['status'] = "Your Data is NOT DELETED";
      header('Location: register.php');
    }
  }

  if(isset($_POST['login_btn'])){

    $login_user = $_POST['login_user'];
    $login_pass = $_POST['login_pass'];

    $query = "SELECT * FROM register WHERE username='$login_user' AND password='$login_pass' ";
    $query_run = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($query_run);

    if($row['usertype'] == "admin"){
      $_SESSION['username'] = $login_user;
      header('Location: index.php');
    } else if ($row['usertype'] == "user"){
      $_SESSION['username'] = $login_user;
      header('Location: register.php');
    } else {
      $_SESSION['status'] = 'Username or Password is invalid';
      header('Location: login.php');
    }

  }

  if(isset($_POST['tracking_edit_btn'])) {
    $id = $_POST['tracking_edit_id'];
    $query = "SELECT * FROM tb_tracking WHERE track_id='$id' ";
    $query_run = mysqli_query($connection, $query);
  }

  if(isset($_POST['tracking_update_btn'])) {
    $trackid = $_POST['tracking_edit_id'];
    $trackdate = $_POST['tracking_edit_date'];
    $trackby = $_POST['tracking_edit_by'];
    $tracknumber = $_POST['tracking_edit_number'];
    $trackuser = $_POST['tracking_edit_user'];
    $trackend = $_POST['tracking_edit_end'];

    $query = "UPDATE tb_tracking SET track_date='$trackdate', track_company='$trackby', track_number='$tracknumber', track_recuser='$trackuser', track_destination='$trackend' WHERE track_id='$trackid' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "Update Success";
        header('Location: tracking.php');
    } else {
        $_SESSION['status'] = "Update Error";
        header('Location: tracking.php');
    }

  }

  if(isset($_POST['tracking_add_btn'])){
    $trackdate = $_POST['tracking_add_date'];
    $trackby = $_POST['tracking_add_company'];
    $tracknumber = $_POST['tracking_add_number'];
    $trackuser = $_POST['tracking_add_recuser'];
    $trackend = $_POST['tracking_add_destination'];

    $query = "INSERT INTO tb_tracking (track_date, track_company, track_number, track_recuser, track_destination) VALUES ('$trackdate', '$trackby', '$tracknumber', '$trackuser', '$trackend');";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "Added Success";
        header('Location: tracking.php');
    } else {
        $_SESSION['status'] = "Error Add";
        header('Location: tracking.php');
    }

  }

  if(isset($_POST['tracking_delete_btn'])) {
    $id = $_POST['tracking_delete_id'];

    $query = "DELETE FROM tb_tracking WHERE track_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "Delete Success";
        header('Location: tracking.php');
    } else {
        $_SESSION['status'] = "Delete Error";
        header('Location: tracking.php');
    }

  }
?>
