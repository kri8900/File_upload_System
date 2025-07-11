<?php
include('db.php');
session_start();
error_reporting(0);
if(isset($_SESSION['name'])){
}else{
  header('location:login.php');
}
if(isset($_POST['submit'])){
    //form se input liya user ka
  $filename=$_FILES['img']['name'];
  $tempname=$_FILES['img']['tmp_name'];
  // remove space from user name
  $username=str_replace(' ','',$_SESSION['name']);
  // path creat kiya ki file store kaha hoga
  $userfolder="uploads/".$_SESSION['user_id'].$username;
  // check kiya agr file creat na ho to creat ho jaye
  if(!is_dir($userFolder))
   {
        mkdir($userfolder,0777,true);// folder creat kare ga agr nhi hain to
   };

$uploadDir = $userfolder . '/'; 
$destination=$uploadDir.basename($filename);

$upload=move_uploaded_file($tempname,$destination);
   if($upload){
            echo "success";
   }
   else{
    echo "fail";
   }

}
header('location:dashboard.php');


?>