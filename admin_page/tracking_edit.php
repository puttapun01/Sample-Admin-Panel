
<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container-fluid">

          <?php
            if(isset($_POST['tracking_edit_btn'])) {
              $id = $_POST['tracking_edit_id'];
              $query = "SELECT * FROM tb_tracking WHERE track_id='$id' ";
              $query_run = mysqli_query($connection, $query);
              foreach($query_run as $row) {
          ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Tracking By ID : <?php echo $row['track_id']; ?></h1>

          <!-- Modal -->

                  <form action="code.php" method="POST">
                    <div class="modal-body">
                      <input type="hidden" name="tracking_edit_id" value="<?php echo $row['track_id']; ?>">
                        <div class="form-group">
                          <label for="trackdate">วันจัดส่ง</label>
                          <input type="date" class="form-control" id="tracking_edit_date" name="tracking_edit_date" value="<?php echo $row['track_date']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="trackby">ส่งโดย</label>
                          <select class="form-control" id="tracking_edit_by" name="tracking_edit_by">
                            <option value="KERRY" <?php if ($row['track_company'] == "KERRY") echo "selected"; ?>>KERRY</option>
                            <option value="EMS THAI POST" <?php if ($row['track_company'] == "EMS THAI POST") echo "selected"; ?>>EMS THAI POST</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="tracknumber">เลขพัสดุ</label>
                          <input type="text" class="form-control" id="tracking_edit_number" name="tracking_edit_number" value="<?php echo $row['track_number']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="trackuser">ชื่อผู้รับ</label>
                          <input type="text" class="form-control" id="tracking_edit_user" name="tracking_edit_user" value="<?php echo $row['track_recuser']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="trackend">ปลายทาง</label>
                          <input type="text" class="form-control" id="tracking_edit_end" name="tracking_edit_end" value="<?php echo $row['track_destination']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <a href="tracking.php" class="btn btn-danger">Close</a>
                      <button type="submit" class="btn btn-primary" name="tracking_update_btn">UPDATE</button>
                    </div>
                  </form>
<?php }} ?>

        </div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<?php
include('includes/footer.php');
?>
