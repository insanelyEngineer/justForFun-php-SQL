<?php
$insert=false;
if(isset($_POST['name'])){
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$info=$_POST['desc'];


$server="localhost";
$username="root";
$password="";
$database="travel";
$con = mysqli_connect($server,$username,$password,$database);

if(!$con){
    die("connection to this database failed due to error".mysqli_connect_error());
}
else{
    // echo "connected to db <br><br>";
}

$sql="INSERT INTO `form` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$info', current_timestamp());";

if(mysqli_query($con,$sql)){
    // echo "submited";
    $insert=true;
    }
    else{ 
        echo "error".mysqli_error($con);
    }
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.png" alt="image" class="bg">
    <div class="container">
        <h3>Welcome to the page</h3>
        <p>Enter your details and submit this form to confirm you participation in the trip.</p>
        <?php
        if($insert == true){
         echo "<p class='sub'>Thanks for joining the trip.</p>";
        }
        ?>

        <form action="index.php" method="post">
        <input type="text" name="name" id="name" class="inp" placeholder="Enter your name">
        <input type="number" name="age" id="age" class="inp" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" class="inp" placeholder="Enter your gender">
        <input type="text" name="email" id="email" class="inp" placeholder="Enter your email id">
        <input type="text" name="phone" id="phone" class="inp" placeholder="Enter your phone number">
        <textarea name="desc" id="desc" cols="30" rows="10" class="inp" placeholder="Enter any related info"></textarea>
        <button class="btn">Submit</button>
        </form>
    </div>
<script src="app.js"></script>
</body>
</html>