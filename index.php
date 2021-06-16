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
//define variables and set to null values
$title = $genre = $rating = $year = null;
$titleError = $genreError = $ratingError = $yearError = null;
$verifiedTitle = $verifiedGenre = $verifiedRating = $verifiedYear = null;
//Default Query Statemet
$query = "SELECT * FROM movieDatabase_movies where Title like '%$verifiedTitle%' ";
?>
            <!-- Creation of the search form -->
            <div class="container">
                <h2>Movie Database Search Form</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control form-control-lg" id="title"
                        placeholder="Enter Title..." tabindex="1" name="title" value="<?php echo $title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control form-control-lg" id="genre"
                        placeholder="Enter Genre..." tabindex="2" name="genre" value="<?php echo $genre; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="text" class="form-control form-control-lg" id="rating"
                        placeholder="Enter Rating..." tabindex="3" name="rating" value="<?php echo $rating; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control form-control-lg" id="year"
                        placeholder="Enter Year..." tabindex="4" name="year" value="<?php echo $year; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-outline-success btn-lg">Search</button>
                    <br><br>
                </form>
            </div>
<?php
require_once "includes_php\\phpActions\\sanitiseUserInput.php";
if (count($_POST)>0) {
    echo    '
            <div class="alert alert-success">
                <strong>Success!</strong> Form Submitted!
            </div>
            ';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    if (isset($result->num_rows) && $result->num_rows > 0) {
        //Creation and headings Of the Table
        echo    '
                <div class="container">
                <div class="table-responsive">
                <table class="table table-hover table-condensed">
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
                        <th>Rate Movie</th>
                    </tr>
                ';
        //Update searchNum value from search results
        $updateQuery = "UPDATE movieDatabase_movies SET searchNum=(searchNum + 1)
        WHERE Title like '%$verifiedTitle%' ";
        $stmt = $conn->prepare($updateQuery);
        $stmt->execute();
        // output the data of each row
        while ($row = $result->fetch_assoc()) {
            echo    "
                    <tr>
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
                        <td style='width:140px;' class='star-rating row" . $row["ID"] . "'>
                            <span class='far fa-star' data-rating='1' data-id='" . $row["ID"] . "' style='font-size:16px;'></span>
                  					<span class='far fa-star' data-rating='2' data-id='" . $row["ID"] . "' style='font-size:16px;'></span>
                  					<span class='far fa-star' data-rating='3' data-id='" . $row["ID"] . "' style='font-size:16px;'></span>
                  					<span class='far fa-star' data-rating='4' data-id='" . $row["ID"] . "' style='font-size:16px;'></span>
                  					<span class='far fa-star' data-rating='5' data-id='" . $row["ID"] . "' style='font-size:16px;'></span>
                            <input type='hidden' name='rating_value' class='rating-value" . $row["ID"] . "'>
                        </td>
                    </tr>
                    ";
        }
        echo    "
                </table>
                </div>
                </div>
                ";
    }
}
?>
        </div>
    </section>
    <br><br><br><br><br>
<?php closeConn($conn); ?>
<!-- Required Java Script -->
<!-- For the movie Rating System -->
<script type="text/javascript">
  var $star_rating = $('.star-rating .far');
  var SetRatingStar = function(id) {
    var $start_current = $('.row' + id + ' .far');
    $('.row'+id).css('pointer-events','none');
    jQuery.ajax({
        type: 'POST',
        url: 'includes_php\\phpActions\\addRating.php',
        data: {
            'action': 'add_ratings',
            'id': id,
            'star': parseInt($start_current.siblings('input.rating-value'+id).val())
        },
        success: function (data) {
        }
    });
    return $start_current.each(function() {
      if (parseInt($start_current.siblings('input.rating-value' + id).val()) >= parseInt($(this).data('rating'))) {
        return $(this).removeClass('far').addClass('fas');
      } else {
        return $(this).removeClass('fas').addClass('far');
      }
    });
  };
  $star_rating.on('click', function() {
    var id = $(this).data('id');
    var $start_current = $('.row' + id + ' .far');
    $start_current.siblings('input.rating-value'+id).val($(this).data('rating'));
    return SetRatingStar(id);
  });
</script>
<!-- START Footer -->
<?php require_once "includes_php\\templates\\subscribtionFooter.php"; ?>
<!-- END Footer -->
<!-- END Body -->
<!-- END HTML DOCUMENT -->