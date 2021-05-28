<!DOCTYPE html>
<html>
<head>
<!-- All the important stuff for the <head> -->
<?php require_once 'includes_php/head.php'; ?>
</head>
<body>
<!-- All the important stuff for the navbar -->
<?php require_once 'includes_php/navBar.php'; ?>

    <div class="jumbotron text-center">
        <h1>Rapid Application Development</h1>
        <h2>Movie Database Search</h2>
    </div>

<!-- Start of the main content -->
    <section class="container-fluid">
     

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

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control-lg" id="title" placeholder="Enter Title" value="<?php echo $title; ?>">
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control-lg" id="genre" placeholder="Enter Genre" value="<?php echo $genre; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="text" class="form-control-lg" id="rating" placeholder="Enter Rating" value="<?php echo $rating; ?>">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control-lg" id="year" placeholder="Enter Year" value="<?php echo $year; ?>">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
<?php 
require_once 'includes_php/sanitiseUserInput.php';
if(count($_POST)>0) {
    echo    '<div class="alert alert-success">
                <strong>Success!</strong> Form Submitted!
            </div>';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();                            
    if (isset($result->num_rows) && $result->num_rows > 0) {   
        //Creation and headings Of the Table
        echo    '<tableclass="table table-dark table-striped">
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
                    </tr>';
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