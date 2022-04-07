<?php
//echo "Oh";
//echo ""print_r($_POST);
$book_name = $_POST['book_name'];

// To check if Mysqli module is available
//echo "UPDATE project1 SET Num_books = Num_books + 1 WHERE Book_name = '".$book_name."'";
// if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//     echo 'We don\'t have mysqli!!!';
// } else {
//     echo 'Phew we have it!';
// }

if(!empty($book_name))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "project1";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName, 3307);
    if ($conn->connect_error)
    {
        die('Could not connect to the database.');
    }
    else 
    {
        $UPDATE = "UPDATE book_database SET Num_books = Num_books + 1 WHERE Book_name = '".$book_name."'";

        $stmt = $conn->prepare($UPDATE);
        $stmt ->execute();
        $stmt ->close();
        echo "Form Submitted Sucessfully";
    }
}
else
{
    echo "All field are requireed";
    die();
}

?>
