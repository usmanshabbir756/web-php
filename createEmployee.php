<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'connector.php';
    echo"Start ";
    $username=$_POST["name"];
    $useremail=$_POST["email"];
    $usernumber=$_POST["number"];
    $password=$_POST["password"];
    $usercnic=$_POST["cnic"];

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql="INSERT INTO `employee` (`emp-name`, `emp-email`, `emp-cnic`, `emp-num`, `emp-pass`) VALUES ( '$username', '$useremail', '$usercnic', '$usernumber', '$hash')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo"Add data";
    }
    else{
        echo"Not added";
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
    <h1>Employee create</h1>
    <form action="/dbms_project/createEmployee.php" method="post">
        <label for="name">Name</label>
        <input type="text" maxlength="35" name="name" id="name">
        <label for="email">Email</label>
        <input type="email" maxlength="30" name="email" id="email">
        <label for="number"> Phone Number</label>
        <input type="number" maxlength="14" name="number" id="number">
        <label for="password">Password</label>
        <input type="password" maxlength="30" name="password" id="password">
        <label for="cnic">CNIC</label>
        <input type="text"  name="cnic" id="cnic" maxlength="15" data-inputmask="'mask' : '99999-9999999-9" placeholder='xxxxx-xxxxxxx-x' required="">
        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>