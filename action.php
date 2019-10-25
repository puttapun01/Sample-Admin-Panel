<?php
session_start();
include('admin_page/database/dbconfig.php');

if(isset($_POST['bill_add_btn'])){
  $bill_order_id = $_POST['bill_order_id'];
  $bill_image = $_FILES["bill_image"]["name"];
  $bill_name = $_POST['bill_name'];
  $bill_email = $_POST['bill_email'];
  $bill_tel = $_POST['bill_tel'];
  $bill_bank = $_POST['bill_bank'];
  $bill_trans_date = $_POST['bill_trans_date'];
  $bill_trans_time = $_POST['bill_trans_time'];
  $bill_price = $_POST['bill_price'];
  $bill_etc = $_POST['bill_etc'];
  $bill_status = $_POST['bill_status'];

  date_default_timezone_set('Asia/Bangkok');
  $date = date("Ymd");
  $numrand = (mt_rand());
  $path="admin_page/upload/bills/";
  $type = strrchr($_FILES["bill_image"]["name"],".");
  $bill_image_new = 'bill-'.$date.'-'.$numrand.$type;

  if(file_exists("admin_page/upload/bills/" .$_FILES["bill_image"]["name"])) {

    $store = $_FILES["bill_image"]["name"];
    $_SESSION['status'] = "ชื่อไฟล์ซ้ำ = $store";
    header('Location: form-cbill.php');

  } else {

    $query = "INSERT INTO tb_bill_check (bill_order_id, bill_image, bill_name, bill_email, bill_tel, bill_bank, bill_trans_date, bill_trans_time, bill_price, bill_etc, bill_status)
    VALUES ('$bill_order_id','$bill_image_new','$bill_name','$bill_email','$bill_tel','$bill_bank','$bill_trans_date','$bill_trans_time','$bill_price','$bill_etc','$bill_status')";

    $query_run = mysqli_query($connection, $query);

    if($query_run) {
      move_uploaded_file($_FILES["bill_image"]["tmp_name"], "admin_page/upload/bills/".$bill_image_new);
      $_SESSION['success'] = "ส่งข้อมูลถึงผู้ขายแล้ว";
      header('Location: form-cbill.php');
    } else {
      $_SESSION['status'] = "ส่งข้อมูลผิดพลาด";
      header('Location: form-cbill.php');
    }

    }
}

?>

  <!--
  bill_order_id
  bill_image
  bill_name
  bill_email
  bill_tel
  bill_bank
  bill_trans_date
  bill_trans_time
  bill_price
  bill_etc
  bill_status
  -->
