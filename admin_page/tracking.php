<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-truck"></i> TRACKING
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tracking_add">ADD TRACK</button>
      </h6>
    </div>
    <div class="card-body">

      <?php
        if(isset($_SESSION['success']) && $_SESSION['success'] !='') {
          echo '<h4 class="bg-success text-white"> '.$_SESSION['success'].' </h4>';
          unset($_SESSION['success']);
        }
        if(isset($_SESSION['status']) && $_SESSION['status'] !='') {
          echo '<h4 class="bg-danger text-white"> class="bg-info" '.$_SESSION['status'].' </h4>';
          unset($_SESSION['status']);
        }
      ?>

      <div class="table-responsive">

        <?php
          $query = "SELECT * FROM tb_tracking";
          $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>EDIT</th>
              <th>DELETE</th>
              <th>ID</th>
              <th>วันจัดส่ง</th>
              <th>ส่งโดย</th>
              <th>เลขพัสดุ</th>
              <th>ชื่อผู้รับ</th>
              <th>ปลายทาง</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>EDIT</th>
              <th>DELETE</th>
              <th>ID</th>
              <th>วันจัดส่ง</th>
              <th>ส่งโดย</th>
              <th>เลขพัสดุ</th>
              <th>ชื่อผู้รับ</th>
              <th>ปลายทาง</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
              if(mysqli_num_rows($query_run) > 0) {
                while($row = mysqli_fetch_assoc($query_run)) {
             ?>
            <tr>
              <td>
                <form action="tracking_edit.php" method="post">
                  <input type="hidden" name="tracking_edit_id" value="<?php echo $row['track_id']; ?>">
                  <button type="submit" name="tracking_edit_btn" class="btn btn-success">EDIT</button>
                </form>
              </td>
              <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="tracking_delete_id" value="<?php echo $row['track_id']; ?>">
                  <button type="submit" name="tracking_delete_btn" class="btn btn-danger">DELETE</button>
                </form>
              </td>
              <td><?php echo $row['track_id']; ?></td>
              <td><?php echo $row['track_date']; ?></td>
              <td><?php echo $row['track_company']; ?></td>
              <td><?php echo $row['track_number']; ?></td>
              <td><?php echo $row['track_recuser']; ?></td>
              <td><?php echo $row['track_destination']; ?></td>
              <?php
                  }
                }
                else {
                  echo "No Record Found";
                }
              ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="tracking_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add TRACK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
            <div class="form-group">
              <label for="trackdate">วันจัดส่ง</label>
              <input type="date" class="form-control" id="tracking_add_date" name="tracking_add_date">
            </div>
            <div class="form-group">
              <label for="trackby">ส่งโดย</label>
              <select class="form-control" id="tracking_add_company" name="tracking_add_company">
                <option>KERRY</option>
                <option>EMS THAI POST</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tracknumber">เลขพัสดุ</label>
              <input type="text" class="form-control" id="tracking_add_number" name="tracking_add_number" placeholder="Tracking">
            </div>
            <div class="form-group">
              <label for="trackuser">ชื่อผู้รับ</label>
              <input type="text" class="form-control" id="tracking_add_recuser" name="tracking_add_recuser" placeholder="ชื่อ-สกุล">
            </div>
            <div class="form-group">
              <label for="trackend">ปลายทาง</label>
              <input type="text" class="form-control" id="tracking_add_destination" name="tracking_add_destination" placeholder="จังหวัด/เมือง">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tracking_add_btn">ADD</button>
        </div>
      </form>
    </div>
  </div>
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
<script src="js/sweetalert.min.js"></script>

<?php
include('includes/footer.php');
?>
