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
    
    $sql="select * from login where userid='".$uname."'AND password='".$password."' limit 1";
    
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1){
        header("Location: recommend.html"); 
    exit();
    }
    else{
        // echo " You Have Entered Incorrect Password or User does not exsist";
        // echo " <html><body>";
        // echo '  <a href ="register.html">click here to register as a user</a>';
        // echo " </body> <html>";
        header("Location: incorrect.html"); 
        exit();
    }
        
}
?>