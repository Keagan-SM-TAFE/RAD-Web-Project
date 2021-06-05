<?php
/**
 * Short description for file
 * Creates a Jumbotron for the HTML page
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
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="images\heroImage.jpg" class="d-block mx-lg-auto img-fluid" 
            alt="Movie Search Image" width="700" height="500" loading="lazy">
        </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Movie Database Search Project</h1>
        <p class="lead">An application designed to search a movie database and 
        return the results in an HTML table form.
        the application uses PHP to search a MySQL database and return only the 
        movies that match the search criteria.
        Movies can be searched by Title, Genre, Rating, or Year.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <h4>Keagan Young.</h4>      
            <h4>Andrew Tuitupou.</h4>
        </div>
    </div>
    </div>
</div>
';
?>