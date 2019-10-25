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

  <!-- Content Row -->
  <div class="row">

    <div class="card shadow-sm" style="padding: 5px; width:350px; margin:5px 5px;">
      <div class="card-body">
        <div class="fright border border-danger rounded-circle text-danger" style="padding:7px; font-size:13px;"><i class="fas fa-trash"></i></div>
        <div class="fleft row"><div class="fbold text-dark">Order ID : &nbsp</div><div>0000001</div></div>
      </div>
      <a href="#" class="imgcrop">
        <img src="img/sample_photo.jpg" class="vertical">
      </a>
      <div class="card-body">
        <div class="row sarabun"><div class="fbold text-dark">ชื่อ-สกุล : &nbsp</div><div>John Sena</div></div>
        <div class="row sarabun"><div class="fbold text-dark">E-mail : &nbsp</div><div>john@google.com</div></div>
        <div class="row sarabun"><div class="fbold text-dark">โทร : &nbsp</div><div>0626656656</div></div>
        <div class="row sarabun sarabun"><div class="fbold text-dark">โอนเข้าธนาคาร : &nbsp</div><div>กรุงไทย</div></div>
        <div class="row sarabun">
          <div class="fbold text-dark">วันที่ทำรายการ : &nbsp</div><div>10/10/62</div>
          <div class="fbold text-dark">&nbsp เวลา : &nbsp</div><div>10.56</div>
        </div>
        <div class="row sarabun"><div class="fbold text-dark">เพิ่มเติม : &nbsp</div><div>โอนเงินเพิ่มเติม</div></div>
        <div class="row sarabun"><div class="fbold text-dark">จำนวนเงิน : &nbsp</div><h2 class="text-primary">700</h2><div class="fbold">&nbsp บาท</div></div>
      </div>
        <form action="" method="POST">
          <div type="submit" class="btn btn-danger" style="width:100%;"><i class="far fa-times-circle"></i></i> Cancle Checked</div>
        </form>
      </div>
    </div>

  </div>

  <!-- Content Row -->
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
