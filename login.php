<?php
session_start();
include('db.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $usrname=trim($_POST['uname']);
    $password=trim($_POST['pass']);

    $query="SELECT * FROM register WHERE email='$usrname' ";
    $run=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($run);
    if($result){
        if($password==$result['password']){// if password is in hash form use - password_verify($password, $row['password']);
            $_SESSION['user_id']=$result['id'];
            $_SESSION['name']=$result['name'];
            header("Location:dashboard.php");
        }else{
            $data="<h4 style='color:red'>Wrong Password ! <h4>";
        }
    }else{
        $data="<h4 style='color:red'>Account not found !</h4>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="head">
                <h1>Login</h1>
            </div>
            <div> <center><?php if(isset($run)){ echo $data;};?></center></div>
            <div class="form">
            <label for="">Username</label> <br>
            <input type="text" name="uname" placeholder="Enter username" required autofocus><br>
            <br>
            <label for="">Password</label> <br>
            <input type="password" name="pass" required placeholder="Enter password">
            <br>
             <div class="forgetpass"><a href="#">Forget Password ?</a></div> 
            <input type="submit" value="Login" class="btn">
           
            </div>
        </form>
         <div class="login">Not a Member ? <a href="register.php">SignUp Now</a></div>
    </div>
</body>
</html>