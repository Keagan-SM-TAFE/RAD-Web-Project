<?php
/**
 * Short description for file
 * Creates a navigation bar for the HTML page
 * Inside the <header> tag
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
echo    '<nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="#">RAD Project</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chart.php">Top 10 Searches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">#Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">#News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">#About</a>
                    </li>
                </ul>
            </div>  
        </nav>';
?>