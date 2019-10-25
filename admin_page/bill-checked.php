<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-file-invoice-dollar"></i>&nbsp BILL Check (Checked)</h6>
  </div>

  <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
      echo '<h6 class="bg-success text-white vstatus"> STATUS : '.$_SESSION['success'].' </h6>';
      unset($_SESSION['success']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
      echo '<h6 class="bg-danger text-white vstatus"> STATUS : '.$_SESSION['status'].' </h6>';
      unset($_SESSION['status']);
    }
  ?>


  <!-- Content Row -->
    <div class="row">

      <?php
        $query = "SELECT * FROM tb_bill_check WHERE bill_status='checked' ";
        $query_run = mysqli_query($connection, $query);
        if(mysqli_num_rows($query_run) > 0){
          while ($row = mysqli_fetch_assoc($query_run)) {
      ?>

      <div class="card shadow-sm" style="padding: 5px; width:350px; margin:5px 5px;">
        <div class="card-body">
          <div class="fleft border border-secondary rounded-circle text-secondary text-center" style="width: 27px; height: 27px;font-size:16px; margin-right:20px;"><?php echo $row['bill_id']; ?></i></div>
          <div class="fleft row"><div class="fbold text-dark">Order ID : &nbsp</div><div><?php echo $row['bill_order_id']; ?></div></div>
          <form action="code.php" method="POST">
            <input type="hidden" name="bill_delete_id" value="<?php echo $row['bill_id']; ?>">
            <input type="hidden" name="bill_delete_image" value="<?php echo $row['bill_image']; ?>">
            <button type="submit" name="bill_delete_btn" class="fright border border-danger rounded-circle text-danger text-center" style="width: 27px; height: 27px;font-size:12px;"><i class="fas fa-trash"></i></button>
          </form>
        </div>
        <a href="upload/bills/<?php echo $row['bill_image']; ?>" class="imgcrop">
          <img src="upload/bills/<?php echo $row['bill_image']; ?>" class="vertical">
        </a>
        <div class="card-body">
          <div class="row sarabun"><div class="fbold text-dark">ชื่อ-สกุล : &nbsp</div><div><?php echo $row['bill_name']; ?></div></div>
          <div class="row sarabun"><div class="fbold text-dark">E-mail : &nbsp</div><div><?php echo $row['bill_email']; ?></div></div>
          <div class="row sarabun"><div class="fbold text-dark">โทร : &nbsp</div><div><?php echo $row['bill_tel']; ?></div></div>
          <div class="row sarabun sarabun"><div class="fbold text-dark">โอนเข้าธนาคาร : &nbsp</div><div><?php echo $row['bill_bank']; ?></div></div>
          <div class="row sarabun">
            <div class="fbold text-dark">วันที่ทำรายการ : &nbsp</div><div><?php echo $row['bill_trans_date']; ?></div>
            <div class="fbold text-dark">&nbsp เวลา : &nbsp</div><div><?php echo $row['bill_trans_time']; ?></div>
          </div>
          <div class="row sarabun"><div class="fbold text-dark">เพิ่มเติม : &nbsp</div><div><?php echo $row['bill_etc']; ?></div></div>
          <div class="row sarabun"><div class="fbold text-dark">จำนวนเงิน : &nbsp</div><h2 class="text-primary"><?php echo $row['bill_price']; ?></h2><div class="fbold">&nbsp บาท</div></div>
        </div>
          <form action="code.php" method="POST">
            <input type="hidden" name="bill_c_update_id" value="<?php echo $row['bill_id']; ?>">
            <button type="submit" name="bill_c_checked_btn" class="btn btn-danger" style="width:100%;"><i class="far fa-times-circle"></i> Cancel Checked</button>
          </form>
        </div>

        <?php
            }
          } else {
            echo '<h6 class="bg-secondary text-white vstatus"> ไม่มีรายการ </h6>';
          }
        ?>

    </div>
    <!-- Content Row -->

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
