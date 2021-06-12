<!-- START Head -->
<?php require_once "includes_php\\templates\\head.php"; ?>
<!-- END Head -->
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
?>
    <h1>rating chart</h1>
    <br><br><br><br><br>
<?php closeConn($conn); ?>
<!-- START Footer -->
<?php require_once "includes_php\\templates\\subscribtionFooter.php"; ?>
<!-- END Footer -->
<!-- END Body -->
<!-- END HTML DOCUMENT -->