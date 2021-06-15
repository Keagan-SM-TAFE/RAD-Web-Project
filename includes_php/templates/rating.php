<?php echo"
<div class=\"container\">
    <form method=\"post\" action=\"includes_php/phpActions/inputRating.php\">
        <select name= \"rating\" id=\"rating\" data-rating=".$row["ID"].">
            <option value=\"1\">1</option>
            <option value=\"2\">2</option>
            <option value=\"3\">3</option>
            <option value=\"4\">4</option>
            <option value=\"5\">5</option>                               
        </select>
            <input type=\"hidden\" id=\"ratingID\" name=\"ratingID\" value=".$row["ID"].">
        <button type=\"submit\" class=\"btn btn-outline-success btn-sm\">Rate</button>
    </form>
</div>

"?>