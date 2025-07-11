<?php
    // send data to data base
    include('db.php');
    mysqli_report(MYSQLI_REPORT_OFF);
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $email=trim($_POST['email']);
        $password=trim($_POST['pass']);
// Form validation start

//form validation end 
        $query="INSERT INTO register (name,gender,email,password) values('$name','$gender','$email','$password')";
        $run=mysqli_query($conn,$query);
        if($run){
            $error="<h3 style='color:#32CD32'>Registration Successful!</h3>";
        }else{
            if (mysqli_errno($conn) == 1062) {
            $error= " <h4 style='color:red'>⚠️: Email already exists!</h4>";
            }else{
            $error= " <h4 style='color:red'> ⚠️: error - try again !</h4>";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="post" onsubmit="return validateForm()">
            <div class="head">
                <h1>Register</h1>
            </div>
            <div>
            <center><p class="para"><?php if(isset($run)){echo $error;};?></p></center>
            </div>
            <div class="form">
            <label for="">Name</label> <br>
            <input type="text" name="name" placeholder="Enter name" id="name"  autofocus><br>
            <label for="">Gender: </label>
            <select name="gender" id="gender">
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <br>
            <label for="">Email</label> <br>
            <input type="email" name="email" id="email"  placeholder="Enter email"><br>
            <label for="">Password</label> <br>
            <input type="password" id="pass" name="pass"  placeholder="Enter password">
            <br>
             <div class="forgetpass"><a href="#">Forget Password ?</a></div> 
            <input type="submit" value="Sign Up" class="btn">
            </div>
        </form>
        <div class="mybtn1">Already a Member ? <span id="mybtn">Login now</span></div>
    </div>
<script>
function validateForm() {
  let u = document.getElementById("name").value.trim();
  let e = document.getElementById("email").value.trim();
  let p = document.getElementById("pass").value.trim();
  let g = document.getElementById("gender").value.trim();

  if (u === "" || e === "" || p === "" || g==="") {
    alert("❗ All fields are required");
    return false;
  }

  if (p.length < 6) {
    alert("❗ Password must be at least 6 characters");
    return false;
  }

  return true;
}
 document.getElementById("mybtn").addEventListener("click", function() {
    window.location.href = "login.php";
  });
</script>
</body>
</html>