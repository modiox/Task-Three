<?php 

//commands.php
$left = $_POST["left"];
$right = $_POST["right"];
$forward = $_POST["forward"];


$con = mysqli_connect("localhost", "root", "", "Control") or die("Cannot connect to the database...please try again.");

$insertQuery = "INSERT INTO `Commands`(`ID`, `L`, `R`, `Backward`, `Forward`, `Stop`) VALUES ('','$left','$right','$forward', '','')"; 
//select query 

$selectQuery = "SELECT `ID`, `L`, `R`, `Backward`, `Forward`, `Stop` FROM `Commands` ORDER BY ID DESC";

$deleteQuery = "TRUNCATE `Commands`;"


$result= '';
$insertSql= mysqli_query($con, $insertQuery);
$deleteSql mysqli_query($con, $deleteQuery);

$result2 = $con -> query($selectQuery);
print("<br>");
print("<center> <table border='1' style='color:#2A6881 width: 100%;
    color: #2A6881;
    font-family: monospace;
    font-size:16px;
    text-align:center;'> <thead> <tr>"); 
    print("<th> ID </th><th> Left </th><th> Right </th> <th> Backward </th><th> Forward </th> <th> Stop </th>"); 
print("</tr> </thead>");
print("<tbody>");

if($_POST["records1"])
{
	if($result2 -> num_rows > 0)
		{ 
			while($row = $result -> fetch_assoc())
				{ 
					echo "<tr> <td>" . $row["ID"]. "</td> <td>". $row["L"]. "</td> <td>". $row["R"] ."</td> <td>" .$row["Backward"] . "</td> <td>". $row["Forward"]. "</td> <td>". $row["Stop"]. "</td>" 
				}
			print("</tbody </table> </center>");

		}
	else 
		echo "No Data Recorded";
}
 

if(isset($_POST["save"]))
{ 
	
 if($insertSql)
 	 echo "Data Inserted Successfully.";
 	

 else 
 	 {
 	 	echo "Cannot Proceed";
 }

 mysqli_close($con);
}

if($_POST["delete"])
{
	if($deleteSql)
	{
		echo "Data deleted from database";
	}
	else 
		echo "Could not connect to database";
}

 mysqli_close($con);


?>
