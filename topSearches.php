<!DOCTYPE html>
<html lang="en">
<head>
<!-- All the important stuff for the <head> -->
<?php require_once "includes_php\\head.php"; ?>
</head>
<body>
<!-- All the important stuff for the navbar -->
<?php require_once "includes_php\\navBar.php"; ?>

<!-- All the important stuff for the Jummbotron/Showcase -->
<?php require_once "includes_php\\jumbotron.php"; ?>

<!-- Start of the main content -->
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
require_once "includes_php\\db_connection.php";
$conn = openConn();
/*
 * grid data
 */
$gridData = array();
$maxYValue = 0;
$searchQuery = "SELECT title, searchNum FROM `moviedatabase_movies` 
ORDER BY `moviedatabase_movies`.`searchNum` DESC LIMIT 10";
$stmt = $conn->prepare($searchQuery);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $gridData[$row['title']] = $row['searchNum'];
    }
    if ($row['searchNum'] >= $maxYValue) {
        $maxYValue .= $row['searchNum'];
    }
}
$maxYValue .= 80;
/*
* image settings and create image
*/
//image dimensions
$imageChartWidth = 1400;
$imageChartHeight = 800;
//dimensions of gridand placement within the image
$gridTop = 20;
$gridLeft = 40;
$gridBottom = 780;
$gridRight = 1360;
$gridHeight = $gridBottom - $gridTop;
$gridWidth = $gridRight - $gridLeft;
//line and bar width
$lineWidth = 3;
$barWidth = 30;
//font settings -- within fonts folder
$font = 'fonts/OpenSans-Regular.ttf';
$fontSize = 20;
//the margin between the label and grid axis
$labelMargin = 8;
//max y-axis value
$yAxisMaxValue .= $maxYValue;
//distance between grid lines and lables on y-axis
$yAxisLabelSpan = $maxYValue / 5;
//$red = imagecolorallocate($im,255,0,0);
//create image
$topTenImageChart = imagecreate($imageChartWidth, $imageChartHeight);
//imagecreate ( int $width , int $height)
//image colors
$backgroundColor = imagecolorallocate($topTenImageChart, 255, 255, 255);
//imagecolorallocate ( resource $topTenImageChart , int $red , 
//int $green , int $blue)
$axisColor = imagecolorallocate($topTenImageChart, 85, 85, 85);
$labelColor = $axisColor;
$gridColor = imagecolorallocate($topTenImageChart, 212, 212, 212);
$barColor = imagecolorallocate($topTenImageChart, 47, 133, 217);
$titleColor = imagecolorallocate($topTenImageChart, 5, 5, 5);
//flood fill
imagefill($topTenImageChart, 0, 0, $backgroundColor);
//imagefill ( resource $topTenImageChart , int $x-startPoint , 
//int $counter-startPoint,int $color ) 
//set the thickness for line drawing
imagesetthickness($topTenImageChart, $lineWidth);
//imagesetthickness ( resource $topTenImageChart , int $thickness )
/*
* Print grid lines bottom up -- count to yAxisMaxValue
*/
for ($count = 0; $count <= $yAxisMaxValue; $count += $yAxisLabelSpan) {
    $counter = $gridBottom - $count * $gridHeight / $yAxisMaxValue;
    //draw a line
    imageline
    ($topTenImageChart, $gridLeft, $counter, $gridRight, $counter, $gridColor);
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
        $topTenImageChart, $fontSize, 0, $labelX, $labelY, $labelColor, 
        $font, strval($count)
        //imagettftext ( resource $topTenImageChart , float $size , float $angle ,
        //int $x , int $y , int $color , string $fontfile , string $text )
    );
}
/*
* draw x-axis and y-axis
*/
imageline
($topTenImageChart, $gridLeft, $gridTop, $gridLeft, $gridBottom, $axisColor);
imageline
($topTenImageChart, $gridLeft, $gridBottom, $gridRight, $gridBottom, $axisColor);
/*
* draw gridData with x-axis labels
*/
$barSpacing = $gridWidth / count($gridData);
$itemX = $gridLeft + $barSpacing / 2;
foreach ($gridData as $key => $value) {
    // Draw the bar
    $x1 = $itemX - $barWidth ;
    $y1 = $gridBottom - $value / $yAxisMaxValue * $gridHeight;
    $x2 = $itemX + $barWidth / 2;
    $y2 = $gridBottom - 1;
    //draw a rectangle 
    imagefilledrectangle($topTenImageChart, $x1, $y1, $x2, $y2, $barColor);
    //imagefilledrectangle ( resource $topTenImageChart , int $x1 , int $y1 ,
    //int $x2 , int $y2 , int $color )
    // Draw the label
    $labelBox = imagettfbbox($fontSize, 90, $font, $key);
    //imagettfbbox ( float $size , float $angle , string $fontfile , string $text )
    $labelWidth = $labelBox[7] - $labelBox[0];
    $labelX = $itemX - $labelWidth / 2;
    $labelY = $gridBottom + $labelMargin + $fontSize - 40;
    //Write text to the image using TrueType fonts
    imagettftext(
        $topTenImageChart, $fontSize, 90, $labelX, $labelY, $titleColor, $font, $key
    );
    //imagettftext ( resource $topTenImageChart , float $size , float $angle ,
    //int $x , int $y , int $color , string $fontfile , string $text )
    $itemX += $barSpacing;
}
/*
* Output image to browser
*/
imagepng($topTenImageChart, "images\\topTenSearchResult.png");
imagedestroy($topTenImageChart);
echo '
<div class="text-center">
<figure class="figure">
    <img src="images\topTenSearchResult.png" class="figure-img 
    img-fluid mx-auto d-block" alt="Top Ten Search Results">
    <figcaption class="figure-caption">Top Ten Search Results</figcaption>
</figure>
</div>
';
?>
        </div>
    </section>
<?php closeConn($conn); ?>
<!-- All the important stuff for the <footer> -->
<?php require_once "includes_php\\footer.php"; ?>
</body>
</html>