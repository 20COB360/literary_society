<?php





 if ($_SERVER['REQUEST_METHOD']=='POST') {
   require '_dbconnect.php';

    $name=$_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $cpassword=$_POST['cpassword'];
     $mobileno=$_POST['mobileno'];
     
     if ($password==$cpassword) {
                $sql ="select * from users where user_email='$email'";
                $result=mysqli_query($conn,$sql);
                // var_dump($result);
                // exit;
                $num=mysqli_num_rows($result);
                            if($num==0){
                                $hashed=password_hash($password,PASSWORD_DEFAULT);
                                $sql="insert into users(user_email,user_name,password,mobile_no) values ('$email','$name','$hashed','$mobileno')";
                                $result=mysqli_query($conn,$sql);
                                
                                header('location:/TheOasiskitchen/index.php?status=1');
                                // header("location:/forums".$_SERVER['REQUEST_URI']);
                                // echo "Signup is successful!";
                            }
                                    else{
                                        $user_exist=true;
                                        header('location:/TheOasiskitchen/index.php?status=2');
                                        // header("location:/forums/".$_SERVER['REQUEST_URI']);
                                    }

       
    }
     else{
        $check_password=false;
        // header("location:/forums/".$_SERVER['REQUEST_URI']);
        header('location:/TheOasiskitchen/index.php?status=3');
    }
    


 }




 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>


  <div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>