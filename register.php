<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Customer Registration";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");
echo "<p></p>";
//display name of the page and some random text
session_start();
echo "<h2>Register and Create a WorkedUp account</h2>";
echo "<form action=getregister.php method=post >";

    echo "<table border=1>";
    echo "<tr><td>First Name</td><td><input type=text name=fname></td> </tr>";
    echo "<tr><td>Last Name</td><td><input type=text name=lname></td></tr>";
    echo "<tr><td>Address </td><td><input type=text name=address></td> </tr>";
    echo "<tr><td>Postcode</td><td><input type=text name=postcode></td></tr>";
    echo "<tr><td>Tel No</td><td><input type=text name=telno></td> </tr>";
    echo "<tr><td>Email Address</td><td><input type=text name=email></td></tr>";
    echo "<tr><td>Password</td><td><input type=password name=pass></td> </tr>";
    echo "<tr><td>Confirm Password</td><td><input type=password name=conpass></td></tr>";
    echo "<tr><td><input type=submit value=Register></td><td><input type=button value=ClearForm></td> </tr>";
    


    echo "</table>";

echo "</form>";

echo "<p> Text Here";
//include head layout
include("footfile.html");
?> 