<?php
/**
 * Short description for file
 * Function to connect user to database
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
/**
 * Summary openConn
 * A function to open the connection to the databas
 * 
 * @return string conn
 */
function openConn()
{
    /* 
    Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with the password 'usbw')
    */
        $servername = "localhost";
        $username = "root";
        $password = "usbw";
        $dbName = "moviedatabase";
                            
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbName);
        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        return $conn;
}
/**
 * Summary closeConn
 * A function to close the databse connection
 * 
 * @return string $conn -> close();
 */
function closeConn($conn)
{
    $conn -> close();
}
/**
 * Summary mb_htmlentities
 * Function to preform string sanitisation
 * Escapes special characters in a string for use in an SQL statement
 * Taking into account the current charset of the connection
 * 
 * @param string $string   the string to sanitise
 * @param string $hex      the string to sanitise
 * @param string $encoding the string to sanitise
 * 
 * @return string mysqli_real_escape_string($conn, $string)
 */
function mb_htmlentities($string, $hex = true, $encoding = 'UTF-8') 
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}
?>