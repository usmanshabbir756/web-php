<?php

 if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connector.php';
    $username = $_POST["email"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from admin where admin_name='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['admin_password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php");
            } 
            else{
                echo "Invalid Credentials";
            }
        }
        
    } 
    else{
        echo "Invalid Credentials";
    }
}
  




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Post Office Admin</h1>
    <form action="/dbms_project/index.php" method="post">
    <input type="email" name="email" id="email">
    <input type="password" name="password" id="password">
    <button type="submit">Submit</button>
    </form>
</body>
</html>