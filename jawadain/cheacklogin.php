<?php
session_start();

include("connection.php");

if(isset($_POST['login'])){
    
    // This code to cheack if the password and user is correct and avialable in the database of users to move admin page;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE userName='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    //if user exists in database, redirect to homepage
    if (mysqli_num_rows($result) == 1) {
        header("Location: displayData.php");
    } 
    else {

       echo "<h1 style='color:red;text-align:center;padding-top: 50px;letter-spacing: 1px;'>Your information is not correct,make sure it's true not correct</h1>";
    }

}



?>