<?php

 if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../connector.php';
    $useremail = $_POST["email"];
    $password = $_POST["password"]; 
    
     
    $sql = "SELECT * FROM `employee` WHERE `emp-email` LIKE '$useremail'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['emp-pass'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $useremail;
                header("location: welcomeEmployee.php");
            } 
            else{
                echo "<h1>Invalid Credentials</h1>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1>Post Office Employee</h1>
    <form action="/dbms_project/employee/employee.php" method="post">
    <input type="email" name="email" id="email">
    <input type="password" name="password" id="password">
    <button type="submit">Submit</button>
    </form>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
</body>
</html>