<!DOCTYPE html>
<html>
<head>
    <title>Testing</title>

</head>
<body>
    <?php
        /**
          PHP code searches database for top 10 titles
         PHP code also searches database for top 10 hitsresults
         php version 8.0.3
         
         @var      ClassName
         @category NotApplicable
         @package  NotApplicable
         @author   Andrew Tuitupou <Atuitupou2@gmail.com>
         @license  https://www.php.net/license/index.php 
         @link     https://www.southmetrotafe.wa.edu.au/
         **/
    $dbc = @mysqli_connect('localhost', 'root', '', 'movies')
           OR die('Could not connect to Mysql'.mysql_connect_error());

          //Selects the top ten movies according to hit number

           $sql = "SELECT ID FROM movies ORDER BY Hits DESC";
            
            $query = $dbc->query($sql);
            $titles = [];
        //This populates the titlearray with movies which are top 10 according to hits

    if ($query->num_rows > 0) {
        $j = 0;
        while ($row = $query->fetch_assoc()) {
              
            $titles[$j] =  "ID-".$row['ID'];
            $j = $j + 1;
        }
    }

     //Selects the top ten hits according number of hits highest first

      $sql2 = "SELECT Hits FROM movies ORDER BY Hits DESC";

      $query = $dbc->query($sql2);
      $hits = [];

    if ($query->num_rows > 0) {
          $j = 0;
        while ($row = $query->fetch_assoc()) {
            $hits[$j] = $row['Hits'];
            $j = $j + 1;
        }
    }

            $dbc->close();
  
    
        /*
    * Chart data
    */
    ob_clean();
    //This displays the top 10 titles with the highest hits on the x axis
    //This displays the top 10 hits according to title on the y axis
    $data = [
    $titles[0] => $hits[0],
    $titles[1] => $hits[1],
    $titles[2] => $hits[2],
    $titles[3] => $hits[3],
    $titles[4] => $hits[4],
    $titles[5] => $hits[5],
    $titles[6] => $hits[6],
    $titles[7] => $hits[7],
    $titles[8] => $hits[8],
    $titles[9] => $hits[9],
    ];

    /*
    * Chart settings and create image
    */

    // Image dimensions
    $imageWidth = 1500;
    $imageHeight = 800;

    // Grid dimensions and placement within image
    $gridTop = 40;
    $gridLeft = 50;
    $gridBottom = 600;
    $gridRight = 1500;
    $gridHeight = $gridBottom - $gridTop;
    $gridWidth = $gridRight - $gridLeft;

    // Bar and line width
    $lineWidth = 1;
    $barWidth = 20;

    // Font settings
    $font = 'OpenSans-Regular.ttf';
    $fontSize = 10;

    // Margin between label and axis
    $labelMargin = 8;

    // Max value on y-axis
    $yMaxValue = 25;

    // Distance between grid lines on y-axis
    $yLabelSpan = 1;

    // Init image
    $chart = imagecreate($imageWidth, $imageHeight);

    // Setup colors
    $backgroundColor = imagecolorallocate($chart, 255, 255, 255);
    $axisColor = imagecolorallocate($chart, 85, 85, 85);
    $labelColor = $axisColor;
    $gridColor = imagecolorallocate($chart, 212, 212, 212);
    $barColor = imagecolorallocate($chart, 47, 133, 217);

    imagefill($chart, 0, 0, $backgroundColor);

    imagesetthickness($chart, $lineWidth);

    /*
    * Print grid lines bottom up
    */

    for ($i = 0; $i <= $yMaxValue; $i += $yLabelSpan) {
        $y = $gridBottom - $i * $gridHeight / $yMaxValue;

        // draw the line
        imageline($chart, $gridLeft, $y, $gridRight, $y, $gridColor);

        // draw right aligned label
        $labelBox = imagettfbbox($fontSize, 0, $font, strval($i));
        $labelWidth = $labelBox[4] - $labelBox[0];

        $labelX = $gridLeft - $labelWidth - $labelMargin;
        $labelY = $y + $fontSize / 2;

        imagettftext(
            $chart, $fontSize, 0, $labelX, $labelY, $labelColor, $font, strval($i)
        );
    }

    /*
    * Draw x- and y-axis
    */

    imageline($chart, $gridLeft, $gridTop, $gridLeft, $gridBottom, $axisColor);
    imageline($chart, $gridLeft, $gridBottom, $gridRight, $gridBottom, $axisColor);

    /*
    * Draw the bars with labels
    */

    $barSpacing = $gridWidth / count($data);
    $itemX = $gridLeft + $barSpacing / 2;

    foreach ($data as $key => $value) {
        // Draw the bar
        $x1 = $itemX - $barWidth / 2;
        $y1 = $gridBottom - $value / $yMaxValue * $gridHeight;
        $x2 = $itemX + $barWidth / 2;
        $y2 = $gridBottom - 1;

        imagefilledrectangle($chart, $x1, $y1, $x2, $y2, $barColor);

        // Draw the label
        $labelBox = imagettfbbox($fontSize, 0, $font, $key);
        $labelWidth = $labelBox[4] - $labelBox[0];

        $labelX = $itemX - $labelWidth / 2;
        $labelY = $gridBottom + $labelMargin + $fontSize;

        imagettftext(
            $chart, $fontSize, 0, $labelX, $labelY, $labelColor, $font, $key
        );

        $itemX += $barSpacing;
    }

    /*
    * Output image to browser
    */



    header('Content-Type: image/png');
    imagepng($chart);
 
    ?>
</body>
</html>
<br>
