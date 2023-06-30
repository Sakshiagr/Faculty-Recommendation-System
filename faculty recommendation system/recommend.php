<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recommend</title>
</head>

    <style>
        body{
		background-color: #2b4865;

	}
    table{
        background:white;
        align-items:center;
        margin-top :15%;
        margin-left:15%;
        border-radius:5px;
        padding:10px;
        border:2px solid;
    }
    td{
        align-items:center;
        padding:15px;
        align-content:center;
        border:2px solid;

    }
    th{
        align-items:center;
        align-content:center;
        margin:2px;
        padding:2px;
        border:2px solid;

    }
    .form{
        align-items: center;
		align-content: center;
		margin: 10% 25% 0% 40%;
    }
    label{
        color: aliceblue;
        font-size: large;
       
    }
    .button{
		margin-left: 50px;
		margin-top: 30px;
		border-radius: 5px;
		color: black;
		height:45px;
		width: 100px;
		background-color: #e9dac1;
	}
    .a{
		margin-top: 10px;
        margin-bottom: 10px;
		border-radius: 10px;
		height: 30px;
		width: 200px;
	}
    </style>
     <body background="img.webp">



<?php
$host="localhost";
$user="root";
$password="";
$db="iwp";

$con =mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);
   $coursecode =$_POST['coursecode'];
   $slot=$_POST['slot'];
   $cgpa=$_POST['cgpa'];
   $sort=$_POST['rating'];
    if ($cgpa>=9){
    $exp=7;
   }
   if ( $cgpa>=8 && $cgpa<9){
    $exp=10;
   }
   if ($cgpa<8 && $cgpa>=0){
    $exp=15;
}
if($sort=="No"){
$sql="select * from faculty where slot='".$slot."' AND coursecode = '".$coursecode."' AND experience='".$exp."' ";
}
if($sort=="Yes"){
    $sql="select * from faculty where slot='".$slot."' AND coursecode = '".$coursecode."' AND experience='".$exp."'  ORDER BY Overall_Rating DESC" ;
}
$result_set=mysqli_query($con,$sql);
echo "<table ><tr><th>Course Code </th> <th>Faculty Name</th> <th>Slot </th> <th>Experience</th><th>Notes</th><th>Friendliness</th><th>Teaching</th>
<th>Leniant</th><th>Overall Rating</th></tr>";
while($rec=mysqli_fetch_row($result_set)){
    echo "<tr><td>".$rec[0]."</td>";
    echo "<td>".$rec[1]."</td>";
    echo "<td>".$rec[2]."</td>";
    echo "<td>".$rec[3]."</td>";
    echo "<td>".$rec[4]."</td>";
    echo "<td>".$rec[5]."</td>";
    echo "<td>".$rec[6]."</td>";
    echo "<td>".$rec[7]."</td>";
    echo "<td>".$rec[8]."</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>
</body>
</html>