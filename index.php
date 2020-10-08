<?php
    $insert = false; 
    if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to " . mysqli_connect_error());

    }
     
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $email =  $_POST['email'];
    $desc =  $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `City`, `Phone`, `Email`, `Other`) 
    VALUES ('$name', '$age', '$gender', '$city', '$phone', '$email', '$desc');";
    
    if($con->query($sql) == true){
        $insert = true;
    }
    else{
        // echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Kedarnath </title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Rubik:wght@500&display=swap" rel="stylesheet">    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="kedarnath">
    <div class="container">
        <h1> Welcome to Kedarnath Yatra </h1>
        <p> Enter your details for the trip </p>
        
        <?php
        if($insert == true){
        echo "<p class='submitMsg'> Thanks for submittimg your form.</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Name">
            <input type="text" name="age" id="age" placeholder="Enter Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Gender">
            <input type="text" name="city" id="city" placeholder="Enter City">
            <input type="phone" name="phone" id="phone" placeholder="Enter Phone"> 
            <input type="email" name="email" id="email" placeholder="Enter Email">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any message"></textarea>
            <button class="btn"> Submit </button>

        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

