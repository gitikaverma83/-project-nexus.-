<?php
session_start();

include("Connection.php");
include("function.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];
   

    if(!empty($username) && !empty($password)  && !is_numeric($username)){

        $query="select * from users where user_name ='$username' limit 1";

        $result= mysqli_query($con,$query);

        if($result){
            if($result && mysqli_num_rows($result)>0){

                $user_data=mysqli_fetch_assoc($result);

                if($user_data['password']===$password){
                    
                    $_SESSION['user_id']=$user_data['user_id'];
                    header("Location: index.php");
                    die;
                } 
            }
        }
        
             echo "<script>alert('Wrong username and password  ');</script>";
 
    }else{
        echo "<script>alert('please enter some valid information');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/signin.css">
    <title>Document</title>
</head>
<body>
   
<a href="index.html"  style="position:absolute;left:42%;width:15%;text-decoration:none;padding:5px;border-radius: 10px;background-color:#06315e;color:white;display:flex;justify-content:center">Home page</a><br>

<div class="login">
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
    

<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='signup.php' style="color: rgb(224, 224, 4);">Register Here</a></p>
</div>

</body>
</html>
