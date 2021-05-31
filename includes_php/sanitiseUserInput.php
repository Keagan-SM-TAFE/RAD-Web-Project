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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /*
    * title
    */ 
    if (empty($_POST["title"])) {
        $titleError = "";
    } else {
        $verifiedTitle = testUserInput($_POST["title"]);
        $query = "SELECT * FROM movieDatabase_movies 
        where Title like '%$verifiedTitle%' ";
    }
    /*
    * genre
    */
    if (empty($_POST["genre"])) {
        $genreError = "";
    } else {
        $verifiedGenre = testUserInput($_POST["genre"]);
        $query .= " AND (genre like '%$verifiedGenre%')";
        $updateQuery .= " AND (genre like '%$verifiedGenre%')";
    }
    /*
    * year
    */
    if (empty($_POST["year"])) {
        $yearError = "";
    } else {
        $verifiedYear = testUserInput($_POST["year"]);
        $query .= " AND (year like '%$verifiedYear%')";
        $updateQuery .= " AND (year like '%$verifiedYear%')";
    }
    /*
    * rating
    */
    if (empty($_POST["rating"])) {
        $ratingError = "";
    } else {
        $verifiedRating = testUserInput($_POST["rating"]);
        $query .= " AND (rating like '%$verifiedRating%')";
        $updateQuery .= " AND (rating like '%$verifiedRating%')";
    }
    /*
    * Only run request when the form is submitted, not when the page reloads
    */
    $submitted = ($_POST["submit"]);
}
/**
 * Summary Examples
 * the htmlspecialchars() function converts special characters to HTML entities. 
 * This means that it will replace HTML characters like < and > with &lt; and &gt;. 
 * This prevents attackers from exploiting the code by 
 * injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.
 * 
 * @param string $userData the string to sanitise
 * 
 * @return string userData
 */
function testUserInput($userData)
{
    $userData = trim($userData);
    $userData = stripslashes($userData);
    $userData = htmlspecialchars($userData);
    return $userData;
}
if (count($_POST)>0) {
    $verifiedTitle = mb_htmlentities($_POST['title']);
    $verifiedGenre = mb_htmlentities($_POST['genre']);
    $verifiedRating = mb_htmlentities($_POST['rating']);
    $verifiedYear = mb_htmlentities($_POST['year']);
}
?>