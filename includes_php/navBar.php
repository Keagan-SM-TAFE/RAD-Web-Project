<?php
/**
 * Short description for file
 * Creates a navigation bar for the HTML page
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
echo    '
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">RAD Project</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsableNavBar" 
            aria-controls="collapsableNavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsableNavBar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="topSearches.php">Top Searches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
';
?>