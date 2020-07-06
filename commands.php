
<?php 
//commands.php
$left = $_POST["leftbutton"];
$right = $_POST["rightbutton"];
$forward = $_POST["forwardbutton"];
$backward = $_POST["backwardbutton"];
$stop = $_POST["stopbutton"];

$con = mysqli_connect("localhost", "root", "", "Control") or die("Cannot connect to the database...please try again.");

$lquery = "INSERT INTO `Commands`(`ID`, `L`, `R`, `Backward`, `Forward`, `Stop`) VALUES ('','$left','','', '','')"; 
//create multiple queries
$rquery =  "INSERT INTO `Commands`(`ID`, `L`, `R`, `Backward`, `Forward`, `Stop`) VALUES ('','','$right','', '','')"; 
$bquery = "INSERT INTO `Commands`(`ID`, `L`, `R`, `Backward`, `Forward`, `Stop`) VALUES ('','','','$backward', '','')"; 
$fquery = "INSERT INTO `Commands`(`ID`, `L`, `R`, `Backward`, `Forward`, `Stop`) VALUES ('','','','', '$forward','')"; 
$squery = "INSERT INTO `Commands`(`ID`, `L`, `R`, `Backward`, `Forward`, `Stop`) VALUES ('','','','', '','$stop')"; 

//select query 

$select = "SELECT `ID`, `L`, `R`, `Backward`, `Forward`, `Stop` FROM `Commands` ORDER BY ID DESC";


$result= '';
$rSql= mysqli_query($con, $rquery);
$lSql= mysqli_query($con, $lquery);
$backSql= mysqli_query($con, $bquery);
$fSql= mysqli_query($con, $fquery);
$sSql= mysqli_query($con, $squery);


$result2 = $con -> query($select);
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
 

if(isset($_POST["rightbutton"]))
{ 
	$result ='R';

	
 if($rSql)
 	 echo "Data Inserted Successfully.";
 	

 else 
 	 {
 	 	echo "Cannot Proceed";
 }

 mysqli_close($con);

}

else if( isset($_POST["leftbutton"]))
{
	$result = 'L'; 

	if($lSql)
		echo "Data Inserted Successfully";
	else
		{ 
			echo "Cannot proceed";
		}
	mysqli_close($con);
}

else if(isset($_POST["forwardbutton"]))
{
	$result = 'F'; 

	if($fSql)
		echo "Data Inserted Successfully";
	else
		{ 
			echo "Cannot proceed";
		}
	mysqli_close($con);
}
else if( isset($_POST["backwardbutton"]))
{
	$result = 'B'; 

	if($backSql)
		echo "Data Inserted Successfully";
	else
		{ 
			echo "Cannot proceed";
		}
	mysqli_close($con);
}
else if( isset($_POST["stopbutton"]))
{
	$result = 'L'; 

	if($sSql)
		echo "Data Inserted Successfully";
	else
		{ 
			echo "Cannot proceed";
		}
	mysqli_close($con);
}

mysqli_close($con);


?>