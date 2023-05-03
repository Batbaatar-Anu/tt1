<?php

$host="localhost";
$users="root";
$password="";
$dbname="cs2a";

$con=mysqli_connect($host,$users,$password,$dbname);

if(!$con){
    die("Connection Failed!".mysqli_connect_error());
} else{
    echo "Connected!";
}
if(isset($_POST['reg_submit'])){
    $username= $_POST['uname'];
    $password= $_POST['pass'];
    $sql="INSERT INTO users ( username,password) 
                    VALUES('$username','$password')";
    if(mysqli_query($con,$sql)){
        echo "new user sucessfully added!";
    }
    else{
        echo "Error:". $sql . " " . mysqli_error($con);
    }
}
if(isset($_POST['but_submit'])){
    $uname = $_POST['txt_uname'];
    $password = $_POST['txt_pass'];
    if($uname != " " && $password != " "){
        $sql_query="SELECT count(*) AS u_id FROM users
        WHERE username='".$uname."' AND password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row= mysqli_fetch_array($result);
        $count = $row['u_id'];
        if($count > 0){
            header('location: main.php');
        }
        else{
            echo "Invalid username and password!";
        }
    }

}

?>