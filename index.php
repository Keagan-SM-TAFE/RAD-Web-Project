<!DOCTYPE html>
<html>
<head>
<!-- All the important stuff for the <head> -->
<?php require_once 'includes_php/head.php'; ?>
</head>
<body>
<!-- All the important stuff for the navbar -->
<?php require_once 'includes_php/navBar.php'; ?>
    <section id="showcase">
        <div class="container">
            <h1>Web Programming</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum consectetur sed reprehenderit commodi tenetur cumque rem 
                consequuntur ipsa sapiente? Rem, accusamus nihil harum veniam dicta consequatur ex maiores aperiam sed!</p>
        </div>
    </section>

<!-- Start of the main content -->
    <section id="main-content">
        <div class="container">       
<?php
/**
 * Short description for file
 * Rapid Application Development Project
 * Movie Database with MySQL connection
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
require_once 'includes_php/db_connection.php';
$conn = openConn();
//define variables and set to null values
$title = $genre = $rating = $year = null;
$titleError = $genreError = $ratingError = $yearError = null;
$verifiedTitle = $verifiedGenre = $verifiedRating = $verifiedYear = null;
//Default Query Statemet
$query = "SELECT * FROM movieDatabase_movies where Title like '%$verifiedTitle%' ";
?>
            <!-- Creation of the search form -->
            <h2>Movie Database Search</h2>
            <div class="search-form">
                <p><span class="error"></span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    Title: <input type="text" name="title" placeholder="Search.." value="<?php echo $title; ?>">
                    <span class="error"><?php echo $titleError; ?></span>
                    <br><br>
                    Genre: <input type="text" name="genre" placeholder="Search.." value="<?php echo $genre; ?>">
                    <span class="error"><?php echo $genreError; ?></span>
                    <br><br>
                    Rating: <input type="text" name="rating" placeholder="Search.." value="<?php echo $rating; ?>">
                    <span class="error"><?php echo $ratingError; ?></span>
                    <br><br>
                    Year: <input type="text" name="year" placeholder="Search.." value="<?php echo $year; ?>">
                    <span class="error"><?php echo $yearError; ?></span>
                    <br><br>
                    <input type="submit" name="submit" value="Search">
                </form><br>
            </div>
<?php 
require_once 'includes_php/sanitiseUserInput.php';
if(count($_POST)>0) {
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();                            
    if (isset($result->num_rows) && $result->num_rows > 0) {   
        //Creation and headings Of the Table
        echo    "<table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Studio</th>
                        <th>Status</th>
                        <th>Sound</th>
                        <th>Versions</th>
                        <th>RecRetPrice</th>
                        <th>Rating</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <th>Aspect</th>
                        <th>searchNum</th>
                    </tr>";
        //Update searchNum value from search results
        $updateQuery = "UPDATE movieDatabase_movies SET searchNum=(searchNum + 1) WHERE Title like '%$verifiedTitle%' ";
        $stmt = $conn->prepare($updateQuery);
        $stmt->execute();
        // output the data of each row
        while($row = $result->fetch_assoc()) {            
            echo    "<tr>
                        <td>" . $row["ID"] . "</td>
                        <td>" . $row["Title"] . "</td>
                        <td>" . $row["Studio"] . "</td>
                        <td>" . $row["Status"] . "</td>
                        <td>" . $row["Sound"] . "</td>
                        <td>" . $row["Versions"] . "</td>
                        <td>" . $row["RecRetPrice"] . "</td>
                        <td>" . $row["Rating"] . "</td>
                        <td>" . $row["Year"] . "</td>
                        <td>" . $row["Genre"] . "</td>
                        <td>" . $row["Aspect"] . "</td>
                        <td>" . $row["searchNum"] . "</td>
                    </tr>";
        }
        echo "</table>";
    }
}
?>
        </div>
    </section>
<?php closeConn($conn); ?>
    <footer>
        <!-- All the important stuff for the <footer> -->
<?php require_once 'includes_php\footer.php'; ?>
    </footer>
</body>
</html>