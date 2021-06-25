<!-- START Head -->
<?php require_once "includes_php\\templates\\head.php"; ?>
<!-- END Head -->
<style>
.chart-bar{
  float: left;
    width: 100%;
    background: #fff;
}
ul.bottomLegend {
  list-style: none;
  display: block;
  columns: 2;
  float: left;
  width: 100%;
}
ul.bottomLegend li {
    /* display: inline-block; */
    padding-right: 20px;
    padding-bottom: 5px;
}
ul.bottomLegend li span {
    width: 12px;
    height: 12px;
    float: none;
    display: inline-block;
}
</style>
<!-- START Body -->
<?php require_once "includes_php\\templates\\navBar.php"; ?>
<!-- START Showcase -->
<?php require_once "includes_php\\templates\\showcase.php"; ?>
<!-- END Showcase -->
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
$gridData = array();
$maxYValue = 0;
$searchQuery = "SELECT AVG(moviedatabase_ratings.rating) as rate, moviedatabase_movies.Title as title FROM moviedatabase_ratings LEFT JOIN moviedatabase_movies ON moviedatabase_ratings.movie_id = moviedatabase_movies.ID  GROUP BY movie_id ORDER BY `rate` DESC LIMIT 10";
$stmt = $conn->prepare($searchQuery);
$stmt->execute();
$result = $stmt->get_result();
$count = 0;
$label_all = array();
$values_all = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $label_all[] = $row['title'];
        $values_all[] = round($row['rate'], 1);
        if ($count == 0) {
          $maxYValue = round($row['rate'], 1) + 1;
          $count++;
        }
    }
}
$barColourArray = array("#fff100","#ff8c00","#e81123","#ec008c","#68217a","#00188f","#00bcf2","#00b294","#009e49","#bad80a");
?>
  <div class="chart-bar" aria-label="Top search results">
    <canvas id="myBarChart" aria-label="Top search results" role="img"><p>Top search results image</p></canvas>
<?php
  echo '<ul class="bottomLegend">';
    foreach ($label_all as $key => $value) {
      echo '<li aria-label="Number '.($key + 1).' '.$value.'"><span style="background-color:'.$barColourArray[$key].'"></span>  '.($key + 1).'    '.$value.'</li>';
    }
  echo '</ul>
  <br><br><br><br>';
?>
    </div>
  </div>
</section>
<?php closeConn($conn); ?>
<script src="privateAdmin/vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['1','2','3','4','5','6','7','8','9','10'],
    datasets: [{
      label: "Rating",
      backgroundColor: <?php echo json_encode($barColourArray);?>,
      hoverBackgroundColor: "#000000",
      borderColor: "#4e73df",
      data: <?php echo json_encode($values_all);?>,
    }],
  },
  options: {
    maintainAspectRatio: true,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'value'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 10
        },
        maxBarThickness: 45,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo $maxYValue;?>,
          maxTicksLimit: 10,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function (value, index, values) {
            return value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: true,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 2,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel;
        }
      }
    },
  }
});
</script>
<!-- START Footer -->
<?php require_once "includes_php\\templates\\subscribtionFooter.php"; ?>
<!-- END Footer -->
<!-- END Body -->
<!-- END HTML DOCUMENT -->