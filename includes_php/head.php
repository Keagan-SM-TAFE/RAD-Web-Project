<?php
/**
 * Short description for file
 * Adds infomation to the HTML <head> tag
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
echo    '
<!-- Set character encoding for the document -->
<meta charset="utf-8">
<!-- Viewport for responsive web design -->
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    The above 2 meta tags *must* come first in the <head>
    to consistently ensure proper document rendering.
    Any other head element should come *after* these tags.
    -->
<title>RAD Project</title>
<meta name="description" content="Movie Database RAD Project">
<meta name="author" content="Keagan Young">
<meta name="author" content="Andrew Tuitupou">
<meta name="keywords" content="Rapid Application Development Project">
<link rel="icon" type="image/png" sizes="16x16" 
href="images/favicon/favicon-16x16.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
crossorigin="anonymous">
';
?>