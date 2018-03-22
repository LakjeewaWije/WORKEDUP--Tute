<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Ordering Basket";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");
echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

session_start();//starts the session

include("db.php");
echo "<br>";

if(isset($_POST['h_prodid']) && isset($_POST['p_quan'])){
 
$newprodid=$_POST["h_prodid"]; //taking the values from previous php to id variable
$reququantity=$_POST["p_quan"]; //taking the values from previous php to id variable

$_SESSION['basket'][$newprodid] = $reququantity;

echo "product ID :".$newprodid;
echo "<br>";
echo "Quantity Requested :".$reququantity;
echo "<br>";
echo  "Your basket has been updated";
//print_r($_SESSION['basket']);
//echo $_SESSION['basket'][$newprodid];

}else if(isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {
    echo "<br>";
   echo "Excisting Basket ";
    $total=0;
    echo "<table border=1>";
    echo "<tr>";
        echo "<td>";
        echo "Product Name  ";
        echo "</td>";
        echo "<td>";
        echo "Price  ";
        echo "</td>";
        echo "<td>";
        echo "Quantity  ";
        echo "</td>";
        echo "<td>";
        echo "Subtotal  ";
        echo "</td>";
    echo "</tr>";
    
    foreach($_SESSION['basket'] as $key=>$value) {
        
    $prodSQL="select prodName, prodPrice  from product
    where prodId=".$key;
        
        $exeprodSQL=mysqli_query($con,$prodSQL) or die(mysqli_error());
        
        $thearrayprod=mysqli_fetch_array($exeprodSQL);
        echo "<tr>";
        echo "<td>";
        echo $thearrayprod['prodName'];
        echo "</td>";
        echo "<td>";
        echo "£".$thearrayprod['prodPrice'];
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "<td>";
        echo "£".$value*$thearrayprod['prodPrice'];
        echo "</td>";
        echo "</tr>";
        $total=$total+$value*$thearrayprod['prodPrice'];
        
       //echo "Product Name : ".$thearrayprod['prodName'];
        //echo "Price : ".$thearrayprod['prodPrice'];
}
     echo "<tr>";
        echo "<td colspan=3>";
        echo "Total ";
        echo "</td>";
        echo "<td>";
        echo "£".$total;
        echo "</td>";
       
    echo "</tr>";
    
    echo "</table>";
}
else{
    echo "Your Basket is Empty !";
     echo "<table border=1>";
    echo "<tr>";
        echo "<td>";
        echo "Product Name  ";
        echo "</td>";
        echo "<td>";
        echo "Price  ";
        echo "</td>";
        echo "<td>";
        echo "Quantity  ";
        echo "</td>";
        echo "<td>";
        echo "Subtotal  ";
        echo "</td>";
    echo "</tr>";
    
     echo "<tr>";
        echo "<td>";
        echo "";
        echo "</td>";
        echo "<td>";
        echo "£ 0";
        echo "</td>";
        echo "<td>";
        echo "";
        echo "</td>";
        echo "<td>";
        echo "£ 0";
        echo "</td>";
        echo "</tr>";
       
    
    echo "<tr>";
        echo "<td colspan=3>";
        echo "Total ";
        echo "</td>";
        echo "<td>";
        echo "£ 0";
        echo "</td>";
       
    echo "</tr>";
    
    echo "</table>";
    
   
}
echo "<br>";
echo "<a href=clearbasket.php>"."Clear Basket"."</a>";
echo"<br>";
echo "New WorkedUp Cutomers "."<a href=register.php>Register</a>";
echo"<br>";
echo "Registered WorkedUp Member "."<a href=login.php>Login</a>";

//include head layout
include("footfile.html");
?> 