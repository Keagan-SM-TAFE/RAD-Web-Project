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
echo    '<header>
<div class="container">
    <div id="branding">
        <h1><span class="highlight">Rapid Application Development</span> Project</h1>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="chart.php">Top 10 Searches</a></li>
            <li><a href="#news">#News</a></li>
            <li><a href="#contact">#Contact</a></li>
            <li><a href="#about">#About</a></li>
        </ul>
    </nav>
</div>
</header>';
?>