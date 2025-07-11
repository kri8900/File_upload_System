<?php
include('db.php');
session_start();
if(isset($_SESSION['name'])){
}else{
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <style>
    .head a button{
        width: 60px;
        height: 25px;
        background:red;
        border-radius:5px;
        border:none;
        color:white;
        cursor:pointer;
        font-size:14px;
        position:absolute;
        right:40px;
    }
  </style>
</head>
<body>

  <div class="head">
    Dashboard <a href="logout.php"><button>Log out</button></a>
  </div>

  <div class="container">
    <div class="logo">
      <img src="../img/logo.png" alt="logo">
    </div>
    <div class="greet">
        <h3>Welcome: <?php echo $_SESSION['name'];?></h3>
    </div>
  </div>
  <div class="upload">
      <div><h2>Upload Files Here</h2></div>
      <form action="upload-file.php" method="post" enctype="multipart/form-data">
        <div class="upload-inp">
        <input type="file" name="img" multiple required> <input type="submit" value="Upload" name="submit">
        </div>
        
      </form>
  </div>
  <section>
    <div class="gap">
        <h3>All Files</h3>
    </div>
    <?php
      $username=str_replace(' ','',$_SESSION['name']);
      $dist="uploads/".$_SESSION['user_id'].$username."/";
      
      $files=scandir($dist);
      foreach($files as $file){
        if ($file !== '.' && $file !== '..'){
        if(pathinfo($file,PATHINFO_EXTENSION)=='pdf'){
           echo " <a href='$dist$file' >view file</a>";
        }
        else{
          echo "<img width=400px height=400px src='$dist$file' >";
        }
      }
    }
    ?>
  </section>

</body>
</html>
