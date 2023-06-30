<?php

$host="localhost";
$user="root";
$password="";
$db="iwp";

$con =mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);


if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    
    $sql = "select * from login where userid='".$uname."' ";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)!=0){
       echo "USER ALREADY EXSISTS";
       exit();
    }

    if($password==$repassword ){
        $sql= " insert into login values ($uname,$password)";
        $result=mysqli_query($con,$sql);
        header("Location: registered.html"); 
    exit();
    }
    else {
        header("Location: match.html");
    }
}
?>