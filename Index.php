<?php
if(isset($_POST['name'])){
//set connection variables
    $insert=false;
$server="localhost";
$username="root";
$password="";
//create a database connection
$connection= mysqli_connect($server,$username,$password);
//check for connection success
if(!$connection)
{
    die("Connection to this database failed due to ".mysqli_connect_error());
}
//else echo "Successfull";
//collect post variables
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$Desc=$_POST['Desc'];
$sql="INSERT INTO `bitmesra_trip`.`trip` ( `Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Dt`) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$Desc', current_timestamp());";
//echo $sql;        
//execute the query
if($connection->query($sql)== true)
{
    //echo "Successfully Inserted";
   
   //flag for successful insertion
    $insert=true;

}
else 
{
    echo "ERROR: $sql <br> $connection->error";
    
}
//close the database connection
$connection->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Goibibo</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <div class="container">
        <h3>Welcome To BIT Mesra Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation.</p>
        
        <?php
        if($insert==true){
        echo "<p class='submitMsg'>Thanks for submitting your details.You will be contacted shortly by a Trip coordinator.</p>";
        }
        ?>
        
        <form action="index.php" method="post">

            <input type="text" name ="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="text" name="email" id="email" placeholder="Enter your Email id">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone number">
            <textarea name="Desc" id="Desc" cols="30 " rows="10" placeholder="Enter any other relevant Information"></textarea>
            <button class="btn">Submit</button>
            <button class="reset">Reset</button>
        </form>
    </div>
        <script src="index.js"></script>
</body>
</html>
