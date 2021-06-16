<!-- START Head -->
<?php require_once "includes_php\\templates\\head.php"; ?>
<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- END Head -->
<!-- START Body -->
<?php require_once "includes_php\\templates\\navBar.php"; ?>
<!-- START of Main Website Content -->
<section class="container-fluid">
<?php
/**
 * Short description for file
 * Rapid Application Development Project
 * Movie Database with MySQL connection
 * This PHP code creates a graph using PHPGD
 *
 * PHP version 8
 *
 * @category  Rapid_Application_Development
 * @package   PEAR
 * @author    Keagan Young <keaganyoun554@gmail.com>
 * @author    Andrew Tuitupou <Atuitupou2@gmail.com>
 * @copyright 1997-2021 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      https://pear.php.net/package/PEAR
 */
// include database connection
require_once "includes_php\\databaseConnection\\databaseConnection.php";
$conn = openConn();
/*
 * grid data
 */
$searchQuery = "SELECT ID,Title,searchNum FROM `moviedatabase_movies` ORDER BY ID DESC";
$stmt = $conn->prepare($searchQuery);
$stmt->execute();
$result = $stmt->get_result();
?>
  <div class="container py-5">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Movie Title</th>
                <th>Search Num</th>
                <th>Rating</th>
            </tr>
        </thead>
      <tfoot>
      </tfoot>
      <tbody>
<?php
$previous = date('Y-m-d',strtotime("-1 days"));
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $res = $conn->query("SELECT AVG(rating) as rating FROM moviedatabase_ratings WHERE movie_id = ".$row['ID']."  AND DATE(createdAt) = '".$previous." ' ");
        if (mysqli_num_rows($res) > 0) {
          while ($re_cn = mysqli_fetch_array($res)) {
              $previous_rate = round($re_cn['rating'],1);
          }
        }
        $res = $conn->query("SELECT AVG(rating) as rating FROM moviedatabase_ratings WHERE  movie_id = ".$row['ID']."  AND DATE(createdAt) = '".date('Y-m-d')." ' ");
        if (mysqli_num_rows($res) > 0) {
          while ($re_cn = mysqli_fetch_array($res)) {
              $current_rate = round($re_cn['rating'],1);
          }
        }
        $total = $current_rate - $previous_rate;
        if ($total > 0) // condition for positive numbers
        {
            $text =  '<i class="fas fa-arrow-up green"></i> '.$total;
        } else if ($total < 0) // condition for negative number
        {
            $text =  '<i class="fas fa-arrow-down red"></i> '.$total;
        } else if ($total == 0) // condition for zero
        {
            $text = $total;
        } else {
            $text = $total;
        }
        echo '<tr>';
          echo '<td>'.$row['ID'].'</td>';
          echo '<td>'.$row['Title'].' ('.$text.')</td>';
          echo '<td>'.$row['searchNum'].'</td>';
          $res = $conn->query("SELECT AVG(rating) as rating FROM moviedatabase_ratings WHERE movie_id = ".$row['ID']);
          while ($re_cn = mysqli_fetch_array($res)) {
            $count = $re_cn['rating'] ;
            echo '<td>'.round($count,1).'</td>';
          }
        echo '</tr>';
    }
}
?>
      </tbody>
    </table>
  </div>
</section>
<br><br><br><br><br>
<?php closeConn($conn); ?>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
<style>
  .green{
    color: green;
  }
  .red{
    color:red;
  }
</style>
<!-- START Footer -->
<?php require_once "includes_php\\templates\\subscribtionFooter.php"; ?>
<!-- END Footer -->
<!-- END Body -->
<!-- END HTML DOCUMENT -->