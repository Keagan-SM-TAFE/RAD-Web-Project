<?php
  $active_menu2 = 'active';
  include_once('header.php');
  if(isset($_POST['action']) && $_POST['action'] == 'update_newsletter'){
    $conn = openConn();
    if($_POST['type'] == 'all'){
        if($_POST['check'] == 0){
            $query = "UPDATE moviedatabase_subscribers set is_subscribed = 0 , newsletter = 0 , newsflash = 0 WHERE id = ".$_POST['id'];
        }else{
            $query = "UPDATE moviedatabase_subscribers set is_subscribed = 1 , newsletter = 1 , newsflash = 1 WHERE id = ".$_POST['id'];
        }
    }
    if($_POST['type'] == 'newsletter'){
        if($_POST['check'] == 0){
            $query = "UPDATE moviedatabase_subscribers set is_subscribed = 0 , newsletter = 0  WHERE id = ".$_POST['id'];
        }else{
            $result = $conn->query("SELECT newsflash FROM moviedatabase_subscribers WHERE id = ".$_POST['id']);
            while($rows = mysqli_fetch_array($result))
            {
              $newsflash = $rows['newsflash'];
            }
            if($newsflash == 1){
              $query = "UPDATE moviedatabase_subscribers set is_subscribed = 1 , newsletter = 1  WHERE id = ".$_POST['id'];
            }else{
              $query = "UPDATE moviedatabase_subscribers set is_subscribed = 0 , newsletter = 1  WHERE id = ".$_POST['id'];
            }
        }
    }
    if($_POST['type'] == 'newsflash'){
        if($_POST['check'] == 0){
            $query = "UPDATE moviedatabase_subscribers set is_subscribed = 0 , newsflash = 0  WHERE id = ".$_POST['id'];
        }else{
            $result = $conn->query("SELECT newsletter FROM moviedatabase_subscribers WHERE id = ".$_POST['id']);
            while($rows = mysqli_fetch_array($result))
            {
              $newsflash = $rows['newsletter'];
            }
            if($newsflash == 1){
              $query = "UPDATE moviedatabase_subscribers set is_subscribed = 1 , newsflash = 1  WHERE id = ".$_POST['id'];
            }else{
              $query = "UPDATE moviedatabase_subscribers set is_subscribed = 0 , newsflash = 1  WHERE id = ".$_POST['id'];
            }
        }
    }
    $conn->query($query);
  }
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page Wrapper -->
<div id="wrapper">

    <?php include_once('sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="mb-4"></div>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Subscribers</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Is Subscribed</th>
                                        <th>Newsletter</th>
                                        <th>Newsflash</th>
                                        <th>Date Subscribed</th>
                                    </tr>
                                </thead>
                                <tfoot>

                                </tfoot>
                                <tbody>
                                    <?php
                                      $conn = openConn();
                                      $query = "SELECT * FROM moviedatabase_subscribers";
                                      if ($result = $conn->query($query)) {
                                        while($obj = $result->fetch_object()){
                                            ?>
                                            <tr>
                                                <td><?php echo $obj->name;?></td>
                                                <td><?php echo $obj->email;?></td>
                                                <td>
                                                    <?php $check = ''; if($obj->is_subscribed == 1){ $check = 'checked'; } ?>
                                                    <input type="checkbox" name="all_newsletter" id="all_newsletter" onclick="update_newsletter(this,<?php echo $obj->id;?>,'all');" <?php echo $check; ?> >
                                                </td>
                                                <td>
                                                    <?php $check = ''; if($obj->newsletter == 1){ $check = 'checked'; } ?>
                                                    <input type="checkbox" name="newsletter" id="newsletter" onclick="update_newsletter(this,<?php echo $obj->id;?>,'newsletter');" <?php echo $check; ?> >
                                                </td>
                                                <td>
                                                    <?php $check = ''; if($obj->newsflash == 1){ $check = 'checked'; } ?>
                                                    <input type="checkbox" name="newsflash" id="newsflash" onclick="update_newsletter(this,<?php echo $obj->id;?>,'newsflash');" <?php echo $check; ?> >
                                                </td>
                                                <td><?php echo $obj->dateCreated;?></td>
                                            </tr>
                                            <?php
                                        }
                                      }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<script type="text/javascript">
    function update_newsletter(check,id,type){
      var value = 1;
      if(!$(check).prop('checked')){
          value = 0;
      }
      jQuery.ajax({
          type: 'POST',
          url: 'subscribers.php',
          data: {
              'action': 'update_newsletter',
              'check': value,
              'id': id,
              'type': type
          },
          success: function (data) {
              location.reload();
          }
      });
    }
</script>
<?php include_once('footer.php'); ?>
