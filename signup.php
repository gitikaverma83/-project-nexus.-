<?php
session_start();

include("Connection.php");
include("function.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];
    

    if(!empty($username) && !empty($password)   && !is_numeric($username)){
        $user_id=rand_number(20);
        $query="insert into users (user_id,user_name,password) values('$user_id','$username','$password')";
        
        mysqli_query($con,$query);
        
        header("Location: signin.php");
        
        die;
    }
    else{
        echo "<script>alert('please enter some valid information');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<link rel="stylesheet" href="assets/css/signup.css" />
</head>

<body>
<a href="index.html"  style="position:absolute;left:42%;width:15%;text-decoration:none;padding:5px;border-radius: 10px;background-color:#06315e;color:white;display:flex;justify-content:center">go back to home page</a><br>

    <div class="login">

        
        <div class="form">
            
            <h1 style="color: rgb(224, 224, 4);">Register Here!!</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="username" required />
                <input type="Email" name="Email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="Click me to Register" />
            </form>
        </div>

</body>

</html>