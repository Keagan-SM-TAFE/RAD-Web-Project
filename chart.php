<!DOCTYPE html>
<html>
<head>
<!-- All the important stuff for the <head> -->
    <?php require_once 'includes_php/head.php'; ?>
</head>
<body>
<!-- All the important stuff for the navbar -->
    <?php require_once 'includes_php/navBar.php'; ?>
    <section id="showcase">
        <div class="container">
            <h1>Web Programming</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum consectetur sed reprehenderit commodi tenetur cumque 
                rem consequuntur ipsa sapiente? Rem, accusamus nihil harum veniam dicta consequatur ex maiores aperiam sed!</p>
        </div>
    </section>

<!-- Start of the main content -->
    <section id="main-content">
        <div class="container">
        <?php
/**
 * Short description for file
 * Rapid Application Development Project
 * Movie Database with MySQL connection
 * This PHP code creates a graph using PHPGD
 *
 * PHP version 8
 *
 * @category  Rapid Application Development
 * @package   PEAR
 * @author    Keagan Young
 * @author    Andrew
 * @copyright 1997-2021 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      https://pear.php.net/package/PEAR
 */
require_once 'includes_php/db_connection.php';
$conn = openConn();
/*
 * grid data
 */
$gridData = array();
$maxYValue = 0;
$searchQuery = "SELECT title, searchNum FROM `moviedatabase_movies` ORDER BY `moviedatabase_movies`.`searchNum` DESC LIMIT 10";
$stmt = $conn->prepare($searchQuery);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $gridData[$row['title']] = $row['searchNum'];
    }
    if ($row['searchNum']>=$maxYValue) {
        $maxYValue .= $row['searchNum'];
    }
}
$maxYValue.= 20;
/*
* image settings and create image
*/
//image dimensions
$imageChartWidth = 1600;
$imageChartHeight = 800;
//dimensions of gridand placement within the image
$gridTop = 20;
$gridLeft = 60;
$gridBottom = 750;
$gridRight = 1350;
$gridHeight = $gridBottom - $gridTop;
$gridWidth = $gridRight - $gridLeft;
//line and bar width
$lineWidth = 2;
$barWidth = 20;
//font settings -- within fonts folder
$font = 'fonts/OpenSans-Regular.ttf';
$fontSize = 20;
//the margin between the label and grid axis
$labelMargin = 8;
//max y-axis value
$yAxisMaxValue = $maxYValue;
//distance between grid lines on y-axis
//y-axis incrementation
$yAxisLabelSpan = $maxYValue/10;
//$red = imagecolorallocate($im,255,0,0);
//create image
$imageChart = imagecreate($imageChartWidth, $imageChartHeight);
//imagecreate ( int $width , int $height)
//image colors
$backgroundColor = imagecolorallocate($imageChart, 255, 255, 255);
//imagecolorallocate ( resource $imageChart , int $red , int $green , int $blue)
$axisColor = imagecolorallocate($imageChart, 85, 85, 85);
$labelColor = $axisColor;
$gridColor = imagecolorallocate($imageChart, 212, 212, 212);
$barColor = imagecolorallocate($imageChart, 47, 133, 217);
$titleColor = imagecolorallocate($imageChart, 5, 5, 5);
//flood fill
imagefill($imageChart, 0, 0, $backgroundColor);
//imagefill ( resource $imageChart , int $x-startPoint , int $counter-startPoint
// ,int $color ) 
//set the thickness for line drawing
imagesetthickness($imageChart, $lineWidth);
//imagesetthickness ( resource $imageChart , int $thickness )
/*
* Print grid lines bottom up -- count to yAxisMaxValue
*/
for ($count = 0; $count <= $yAxisMaxValue; $count += $yAxisLabelSpan) {
    $counter = $gridBottom - $count * $gridHeight / $yAxisMaxValue;
    //draw a line
    imageline($imageChart, $gridLeft, $counter, $gridRight, $counter, $gridColor);
    //Give the bounding box of a text using TrueType fonts
    //This function calculates and returns the bounding box in pixels for a 
    //TrueType text. draw right aligned label
    $labelBox = imagettfbbox($fontSize, 0, $font, strval($count));
    //imagettfbbox ( float $size , float $angle , string $fontfile , string $text )
    $labelWidth = $labelBox[4] - $labelBox[0];
    $labelX = $gridLeft - $labelWidth - $labelMargin;
    $labelY = $counter + $fontSize / 2;
    //Write text to the image using TrueType fonts
    imagettftext(
        $imageChart, $fontSize, 0, $labelX, $labelY, $labelColor, 
        $font, strval($count)
    );
    //imagettftext ( resource $imageChart , float $size , float $angle , int $x ,
    //int $y , int $color , string $fontfile , string $text )
}
/*
* draw x-axis and y-axis
*/
imageline($imageChart, $gridLeft, $gridTop, $gridLeft, $gridBottom, $axisColor);
imageline($imageChart, $gridLeft, $gridBottom, $gridRight, $gridBottom, $axisColor);
/*
* draw gridData with x-axis labels
*/
$barSpacing = $gridWidth / count($gridData);
$itemX = $gridLeft + $barSpacing / 2;
foreach ($gridData as $key => $value) {
    // Draw the bar
    $x1 = $itemX - $barWidth / 2;
    $y1 = $gridBottom - $value / $yAxisMaxValue * $gridHeight;
    $x2 = $itemX + $barWidth / 2;
    $y2 = $gridBottom - 1;
    //draw a filled rectangle 
    imagefilledrectangle($imageChart, $x1, $y1, $x2, $y2, $barColor);
    //imagefilledrectangle ( resource $imageChart , int $x1 , int $y1 , int $x2 ,
    //int $y2 , int $color )
    // Draw the label
    $labelBox = imagettfbbox($fontSize, 90, $font, $key);
    //imagettfbbox ( float $size , float $angle , string $fontfile , string $text )
    $labelWidth = $labelBox[4] - $labelBox[0];
    $labelX = $itemX - $labelWidth / 2;
    $labelY = $gridBottom + $labelMargin + $fontSize;// + 30 ;
    //Write text to the image using TrueType fonts
    imagettftext(
        $imageChart, $fontSize, 90, $labelX, $labelY, $titleColor, $font, $key
    );
    //imagettftext ( resource $imageChart , float $size , float $angle ,
    //int $x , int $y , int $color , string $fontfile , string $text )
    $itemX += $barSpacing;
}
/*
* Output image to browser
*/
imagepng($imageChart, "Chart.png");
imagedestroy($imageChart);
echo "<img src='Chart.png'>";
?>
        </div>
    </section>
<?php closeConn($conn); ?>
    <footer>
        <!-- All the important stuff for the <footer> -->
<?php require_once 'includes_php\footer.php'; ?>
    </footer>
</body>
</html>