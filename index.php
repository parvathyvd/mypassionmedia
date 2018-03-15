<?php ?>

<?php
$png_image = imagecreate(150, 150);
imagecolorallocate($png_image, 15, 142, 210);
$path_image = 'saved-example.png';
imagepng($png_image, $path_image);

// create a blank image
$circle_image = imagecreatefrompng('saved-example.png' );

// fill the background color
$bg = imagecolorallocate($circle_image, 0, 0, 0);

$col_ellipse = imagecolorallocate($circle_image, 255, 255, 255);

imagefilledellipse($circle_image, 70, 70, 100, 100, $col_ellipse);
$circle_path_image = 'saved-example-circle.png';

imagepng($circle_image, $circle_path_image);


$im = imagecreatefrompng('saved-example-circle.png' );
$background_color = ImageColorAllocate ($im, 234, 234, 234);
$text_color = ImageColorAllocate ($im, 233, 14, 91);
imageline ($im,50,50,100,100, $text_color);

$line_path_image = 'saved-example-line.png';


imagepng($im, $line_path_image);?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Tether core CSS -->
    <link href="css/tether/tether.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>

<div class="container">
        <p>Question No:1</p>
        <p>20 kids have gotten together to play baseball, but they need help making the teams as even as possible. The kids have all ranked their skill level from 1-10. In no particular order, here are their skill numbers: 8,5,6,9,3,8,2,4,6,10,8,5,6,1,7,10,5,3,7,6.

            Write an algorithm (in PHP) that will place these (or any other) kids into two teams of equal size with the total skill level being as even as possible.
        </p>
        <h4>This is the sorted skill set array</h4>
        <?php

        $skill_array  = array(8,5,6,9,3,8,2,4,6,10,8,5,6,1,7,10,5,3,7,6);
        sort($skill_array);

        foreach ($skill_array As $skill)
        {
            print_r($skill);
            echo "  ";

        }

        ?>
        <h4> Even number keys will go to Team A</h4>
        <?php

        foreach ($skill_array As $key => $val)
        {
            if($key %2 ==0){
                echo $val;
                echo " ";
            }
            else {
                $odd_key_array[] = $val;
            }

        }

        ?>
        <h4> All the others will go to Team B</h4>
        <?php

        foreach ($odd_key_array As $key => $val)
        {

            echo $val;
            echo " ";

        }
        echo "<br>";

        ?>
    <hr>
        <p>Question No:2</p>
        <p>Using PHP's GD Image primatives (squares, circles, lines) draw any image you'd like.</p>


        <img src = "saved-example-line.png" />
    <hr>
    <p>Question No:3</p>
    <p>Bernice from accounting has lost her print out of what her employees addresses are.
        Luckily you have them stored in your MySQL database. Write a query that will get Bernice a
        new list with each employee's full name and their current address. </p>

    <p>SQL query for the above question</p>

    <p class="lead">"SELECT Employees.firstname, Employees.lastname, Addresses.address, Addresses.city, Provinces.province FROM Employees
        JOIN Addresses ON Addresses.employeeID = Employees.employeeID JOIN Provinces ON Provinces.provinceID = Addresses.provinceID  "</p>

    <h3>Results</h3>

    <?php
$servername = "localhost";
$username = "parvathy_wp";
$password = "ganapathy";
$dbname = "parvathy_wp";


// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


    $sql ="SELECT Employees.firstname, Employees.lastname, Addresses.address, Addresses.city, Provinces.province FROM Employees  JOIN Addresses ON Addresses.employeeID = Employees.employeeID JOIN Provinces ON Provinces.provinceID = Addresses.provinceID";
    $result = mysqli_query($conn, $sql);


    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        echo " - Address: " . $row["address"]. " <br>";
        echo " - City: " . $row["city"]. " <br>";
        echo " - Province: " . $row["province"]. " <br>";
        echo "<br>";


    }

?>
</div>





<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/tether/tether.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>

