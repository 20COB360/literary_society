<?php

require './dbconnect.php';

$invalid_user=false;


if ($_SERVER['REQUEST_METHOD']=='POST') {
    
     $enrollmentno=mysqli_real_escape_string($conn,$_POST['enrollmentno']);
     $password=mysqli_real_escape_string($conn,$_POST['password']);
    

    $sql ="select * from users where enrollmentno='$enrollmentno'";

    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    $hashed=$row['password'];
    $name=$row['name'];
    $enrollmentno=$row['enrollmentno'];
    $facultyno=$row['facultyno'];
    $user_id=$row['user_id'];
    $is_super_admin=$row['is_super_admin'];
    // var_dump($hashed);
    // echo "<br>";
    // var_dump(password_hash($password,PASSWORD_DEFAULT));
    // $pass_verify=password_verify($password,$hashed);
    // var_dump($pass_verify);

    //Test Login (Deleted After test)
    $pass_verify=($password==$hashed)?true:false;

    // exit;
    if ($pass_verify) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id']=$user_id;
        $_SESSION['loggedin']=true;
        $_SESSION['enrollmentno']=$enrollmentno;
        $_SESSION['facultyno']=$facultyno;
        $_SESSION['name']=$name;
        $_SESSION['is_super_admin']=$is_super_admin;
        // echo "Logged in successfully!";
        header('location:/RLS/admin/form.php');
    }
    else{
        $invalid_user=true;
        header('location:/RLS/admin/index.php?invalid_user='.$invalid_user);
    }


 }


?>