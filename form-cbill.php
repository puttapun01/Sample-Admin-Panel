<?php
session_start();
include('admin_page/database/dbconfig.php');
include('include/include_top.php');
?>

<div class="container top_title">
  <img src="admin_page/img/bamw.svg" width="50px">
</div>
<!-- Content -->
<div class="container card" style="margin-top: 10px; padding: 10px">

            <!-- Page Heading -->
            <h5 class="m-0 font-weight-bold text-primary">แจ้งการโอนเงิน</h5>

            <!-- Modal -->

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

            <form action="action.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="bill_order_id">เลขที่คำสั่งซื้อ</label><label class="text-danger">&nbsp*</label>
                    <input type="text" class="form-control" id="bill_order_id" name="bill_order_id" placeholder="เลขที่คำสั่งซื้อ" required>
                  </div>
                  <div class="form-group">
                    <label for="bill_name">ชื่อ - สกุล</label><label class="text-danger">&nbsp*</label>
                    <input type="text" class="form-control" id="bill_name" name="bill_name" placeholder="ชื่อ - สกุล" required>
                  </div>
                  <div class="form-group">
                    <label for="bill_email">อีเมล</label><label class="text-danger">&nbsp*</label>
                    <input type="email" class="form-control" id="bill_email" name="bill_email" placeholder="E-mail" required>
                  </div>
                  <div class="form-group">
                    <label for="bill_tel">เบอร์โทร</label>
                    <input type="text" class="form-control" id="bill_tel" name="bill_tel" placeholder="เบอร์โทร">
                  </div>
                  <div class="form-group">
                    <label for="bill_price">จำนวนเงินที่โอน</label><label class="text-danger">&nbsp*</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="bill_price" name="bill_price" placeholder="จำนวนเงิน" required>
                      <div class="input-group-append">
                        <span class="input-group-text">บาท</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bill_bank">โอนเข้าธนาคาร</label><label class="text-danger">&nbsp*</label>
                    <select class="form-control" id="bill_bank" name="bill_bank">
                      <option value="กรุงไทย">กรุงไทย</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="bill_trans_date">วันที่ทำรายการ</label><label class="text-danger">&nbsp*</label>
                    <input type="date" class="form-control" id="bill_trans_date" name="bill_trans_date" required>
                  </div>
                  <div class="form-group">
                    <label for="bill_trans_time">เวลาที่ทำรายการ</label><label class="text-danger">&nbsp*</label>
                    <input type="time" class="form-control" id="bill_trans_time" name="bill_trans_time" required>
                  </div>
                  <div class="form-group">
                    <label for="bill_image">แนบหลักฐานการโอนเงิน</label><label class="text-danger">&nbsp*</label>
                    <div class="custom-file">
                      <input type="file" class="form-control" id="bill_image" name="bill_image" required>
                      <label for="bill_image" class="custom-file-label">เลือกไฟล์</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bill_etc">ข้อความเพิ่มเติม (ถ้ามี)</label>
                    <input type="text" class="form-control" id="bill_etc" name="bill_etc">
                  </div>
                  <input type="hidden" class="form-control" id="bill_status" name="bill_status" value="pending">
              </div>
              <div class="text-center">
                <a href="../" class="btn btn-danger">ย้อนกลับ</a>
                <button type="submit" class="btn btn-primary" name="bill_add_btn">ส่ง</button>
              </div>
            </form>

          </div>

<!-- Content -->
<?php include('include/include_footer.php'); ?>
