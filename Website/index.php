<!DOCTYPE html>

<html lang = "en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<!-- Bootstrap is used to edit the navigation bar aswell as the header background-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Movies</title>

</head>
<body>
<h1 class="text-center bg-primary">Company name</h1>
<div class="row">

</div>
<div class = "row">
    <div class = "col-lg-12">
        <!-- Bootstrap is used to edit the navigation bar -->
        <h2>&nbsp;Navigation</h2>
    </div>
</div>
<br>
<div class = "row">
    <div class = "col-lg-2">
        <!-- This contains the navigation bar -->
        <h4>&nbsp;Movies</h4>
        <ul class="list-group">
          <li class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php">Movie Search</a></li>
          <li class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="Top.php">Top 10 Movies</a></li>
          
          
    </ul>
    
    </div>
    
    <div class = "col-lg-2">
    <br>
    <!-- This contains the form information which is entered into php later -->
        <form method = "POST" action = "" >
        <label for "mTitle">Movie Title:</label>
        <br>
        <input name="mTitle" type="text"/>
        <br>

        <label for "mYear">Movie Year:</label>
        <br>
        <input type = "text" name = "mYear"/>
        <br>

        <label for "mGenre">Movie Genre:</label><br>
        <select name = "mGenre">
            <option value = ""></option>
            <option value = "Other">Other</option>
            <option value = "Music">Music</option>
            <option value = "SciFi">SciFi</option>
            <option value = "Drama">Drama</option>
            <option value = "Horror">Horror</option>
            <option value = "family">Family</option>
            <option value = "Comedy">Comedy</option>
            <option value = "Ballet">Ballet</option>
            <option value = "Musical">Musical</option>
            <option value = "Thriller">Thriller</option>
            <option value = "fantasy">Fantasy</option>
            <option value = "Western">Western</option>
            <option value = "Animation">Animation</option>
            <option value = "TV Classics">TV Classics</option>
            <option value = "Late Night">LateNight</option>
            <option value = "Dance / Ballet">Dance / Ballet</option>
            <option value = "Special Interest">Special Interest</option>
            <option value = "Mystery/Suspense">Mystery/Suspense</option>
            <option value = "Action/Adventure">Action/Adventure</option>
        </select>
      
        <!-- This contains the form information which is entered into php later -->
        <br>
        <label for "mRating">Movie Rating:</label>
        <br>
        <select name = "mRating">
            <option value = ""></option>
            <option value = "G">G</option>
            <option value = "R">R</option>
            <option value = "PG">PG</option>
            <option value = "NR">NR</option>
            <option value = "UR">UR</option>
            <option value = "UR/R">UR/R</option>
            <option value = "VAR">VAR</option>
            <option value = "UNK">UNK</option>
            <option value = "PG-13">PG-13</option>
            <option value = "NC-17">NC-17</option>
        </select>
        <br>
        <br>
        <input type="submit" name="search"  value="search" />
        </form>

      
        


    
    </div>
</div>



<div class = "row">
    <div class = "col-lg-2"></div>

   <!-- Basic table data is created to be edited when a search is performed, this table data displays columns no matter if there are results ot not -->
    <div class = "col-lg-8">
        <br>
        <br>
        <table>
        <th>ID</th>
        <th>Title</th>
        <th>Studio</th>
        <th>Status</th>
        <th>Sound</th>
        <th>Versions</th>
        <th>Rating</th>
        <th>RecRetPrice</th>
        <th>Year</th>
        <th>Genre</th>
        <th>Aspect</th>
    
        <?php

        /**
         PHP code submits searched movies increasing Hits
         PHP code also performs search of database and displays results
         php version 8.0.3
         
         @var      ClassName
         @category NotApplicable
         @package  NotApplicable
         @author   Andrew Tuitupou <Atuitupou2@gmail.com>
         @license  https://www.php.net/license/index.php 
         @link     https://www.southmetrotafe.wa.edu.au/
         **/



        //This checks if the submit button has been clicked
        //If the submit button has been clicked the database is altered //by adding one to the number of hits that this record has-->





        //This checks if the search button has been clicked
        //If the search button has been clicked a query is run to 
        //display all search data within the form elements earlier in 
        //this code 

        if (isset($_POST["search"])) {
            $dbc = mysqli_connect('localhost', 'root', '', 'movies');

            $title = $_POST['mTitle'];
            $year = $_POST['mYear'];
            $genre = $_POST['mGenre'];
            $rating = $_POST['mRating'];

           
            //Deals with the case where search includes movies which have any ratings
            //and any genres.
            if($rating == '' && $genre == '')
            {
            	 $sql = "SELECT * FROM movies WHERE  Title LIKE '%$title%' AND Year
            			LIKE '%$year%' ";

            }
            //Deals with the case where the movies include any ratings and a specfic genere
            if($rating == '' && $genre != '')
            {
            	$sql = "SELECT * FROM movies WHERE Genre IN ('$genre') AND Title LIKE '%$title%' AND Year
            			LIKE '%$year%' ";
            }
            //Deals with the case where the movies include a specfic rating and any genre
            if($rating != '' && $genre == '')
            {
            	$sql = "SELECT * FROM movies WHERE Rating IN ('$rating') AND Title LIKE '%$title%' AND Year
            			LIKE '%$year%' ";
            }
            //Deals with the case where the movies include a specfic rating and specific genre
            if($rating != '' && $genre != '')
            {
            	$sql = "SELECT * FROM movies WHERE Rating IN ('$rating') AND Genre IN ('$genre') AND Title LIKE '%$title%' AND Year LIKE '%$year%'  ";
            }

            


            $query = mysqli_query($dbc, $sql);

            //This checks if there is no movies according to the search criteria 
            //If so display a no result message 
            if (mysqli_num_rows($query) ==0) {
                echo 'No results';
            }

            //This automaticaly populates the displayed information on the website according to what movies the query finds
            
            while ($info=mysqli_fetch_array($query)) {
                ?>
                    <?php 
                        $tempID = $info['ID'];
                        $sql1 = "UPDATE movies SET Hits = Hits + 1 WHERE ID = '$tempID'";
                        mysqli_query($dbc, $sql1);
                    ?>
                    <tr>
                        <td><?php echo $info['ID'];?></td>
                        <td><?php echo $info['Title'];?></td>
                        <td><?php echo $info['Studio'];?></td>
                        <td><?php echo $info['Status'];?></td>
                        <td><?php echo $info['Sound'];?></td>
                        <td><?php echo $info['Versions'];?></td>
                        <td><?php echo $info['Rating'];?></td>
                        <td><?php echo $info['RecRetPrice'];?></td>
                        <td><?php echo $info['Year'];?></td>
                        <td><?php echo $info['Genre'];?></td>
                        <td><?php echo $info['Aspect'];?></td>
                    </tr>
                    
                    <?php
            }

            mysqli_close($dbc);

        }
        ?>
        </table>
    </div>

</div>
<div class = "row">
    <div class = "col-lg-2"></div>
    <div class = "col-lg-8">
        <!-- This is another form which contains the submit button for an ID to increase the hits for this movie by 1 -->
    </div>
</div>
    
</div>
</body>
</html>