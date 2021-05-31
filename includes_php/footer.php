<?php
/**
 * Short description for file
 * Adds a footer to the page
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
echo "
<footer class=\"bg-light text-center text-lg-start\">
    <div class=\"text-center p-3\" style=\"background-color: rgba(0, 0, 0, 0.2);\">
        <span class=\"text-dark\"><p>Copyright &copy; 1996-" . date("Y") . " RAD Group Project. Team members: Keagan Young. Andrew Tuitupou.</p></span>
    </div>
</footer>
";
?>