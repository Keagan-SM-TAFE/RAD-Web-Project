<?php
/**
 * Short description for file
 * Test and sanitise the user input
 * Sets the error message if there is an error with the user input
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
require_once "..\\databaseConnection\\databaseConnection.php";
$conn = openConn();
$userDate = date("Y-m-d H:i:s");
require_once "sanitiseNewsletterInput.php";
$news = 0;
$flash = 0;
$all = 0;
if (isset($_POST['news'])) {
    $news = 1;
}
if (isset($_POST['flash'])) {
    $flash = 1;
}
if (isset($_POST['news']) && isset($_POST['flash'])) {
    $all = 1;
}
$sqlQuery = "INSERT INTO `moviedatabase_subscribers`(`name`, `email`, 
`dateCreated`, `is_Subscribed`, `newsletter`, `newsflash`)
VALUES ('$verifiedName', '$verifiedEmail', '$userDate', $all, $news, $flash);";
if (count($_POST)>0) {
    $stmt = $conn->prepare($sqlQuery);
    $stmt->execute();
}
closeConn($conn);
header("Location: ../../index.php?msg=success");
exit;
?>