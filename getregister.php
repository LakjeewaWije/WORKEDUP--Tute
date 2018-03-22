<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Registration Confirmation";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");
echo "<p></p>";
//display name of the page and some random text
session_start();
include("db.php");
$con = mysqli_connect("localhost","root","","workedup");
echo "<h2>".$pagename."</h2>";

if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["address"])
 && isset($_POST["postcode"]) && isset($_POST["telno"]) && isset($_POST["email"])
 && isset($_POST["pass"]) && isset($_POST["conpass"])){
    
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$address=$_POST["address"];
$postcode=$_POST["postcode"];
$telno=$_POST["telno"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$conpass=$_POST["conpass"];
$usertype="";

$useremails = array();

if($pass!=$conpass){
    echo "passwords don't match - ";
    echo "<a href=register.php> Back to register</a>";
}else{
        $sql = "INSERT INTO users (userType,userFname,userSName,userAddress,userPostCode,userTelNo,
    userEmail,userPassword)
    VALUES ('$usertype','$fname' ,'$lname','$address','$postcode','$telno','$email','$pass')";

    $result = mysqli_query($con,"SELECT userEmail  FROM users");
    
    //$newRes = mysqli_fetch_array($result);

    
    while($row = mysqli_fetch_assoc($result))
    {
       if($email == $row['userEmail']) {
        echo "The Email you Entered is already exists ! ";
        echo "</br>";
        echo "Go back to <a href=register.php>Register </a>";
        die();
       }
        
    }


    
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
        echo "</br>";
        echo "Go to <a href=#>Login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
//     if(mysqli_connect_errno($con)== 1062 ){
//         echo "Enter another email";

//     } else {

//     echo "Error: " . $sql . "<br>" . mysqli_connect_errno($con);
// }

    
   
}



}

    


//include head layout
include("footfile.html");
?> 