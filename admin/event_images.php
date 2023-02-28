<?php

require './session_check.php';
require './dbconnect.php';
$alert="";
$message="";
if ($_SERVER['REQUEST_METHOD']=='GET' &&  isset($_GET['key'])) {
    $key=mysqli_real_escape_string($conn,$_GET['key']);
    echo $key;
    // exit;
}

//POST request handling


if($_SERVER['REQUEST_METHOD']=='POST'){
  $image_name=$_POST['image_name'];
  $image_file_name= str_replace(".","_",$image_name);

  $key=$_POST['key'];
  // echo $image_name;
  // echo $key;
  // exit;

  function addImage($image_name,$file_name,$file_tmp_name,$file_error,$file_size,$key){
    
    if($file_error===0){
      if ($file_size>2000000) {
       $em=" Sorry, your file is too large.";
       header("Location: event_images.php?error=$em");
      }
     else{
        $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
        $file_ex_lc=strtolower($file_ex);
  
            $allowed_exs=array("jpg","jpeg","png");
  
            if (in_array($file_ex_lc,$allowed_exs)) {
              //Deleting Existing File

              $path="./event_images/". $image_name;
              // echo $path;
              if(unlink($path)){
                $message="Deleted.";
                // echo $message;
              }

              //New File Inserted

              $file_upload_path='event_images/'. $image_name;
              move_uploaded_file($file_tmp_name,$file_upload_path);
              // die("Succeses");
              header("Location: event_images.php?key=$key");
            }
            else{
              $em="You can't upload files of this type.";
              header("Location: event_images.php?error=$em");
            }
  
  
  
      }
    }


    else{
      $em="unknown error occured!";
      header("Location: event_images.php?error=$em");
    }
  }
  

  if(isset($_FILES[$image_file_name])){
    $file_name=$_FILES[$image_file_name]['name'];
    $file_type=$_FILES[$image_file_name]['type'];
    $file_tmp_name=$_FILES[$image_file_name]['tmp_name'];
    $file_error=$_FILES[$image_file_name]['error'];
    $file_size=$_FILES[$image_file_name]['size'];
    
    addImage($image_name,$file_name,$file_tmp_name,$file_error,$file_size,$key);

  }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php
    require './navbar.php';
    if($message==""){

    }
    else{

      if($alert=="success"){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong>'. $message .'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Error occured!</strong> '.$message.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      }
      
    }
   
   ?>

    <div class="container my-5">
        <h2 class="my-3">Landscape Images :</h2>
        <div class="row ">
            <?php
              $sql="Select * from event_images where event_key='$key' and image_name like 'LAND%' ";
              $result=mysqli_query($conn,$sql);
            //  var_dump ($result);
            while ($row=mysqli_fetch_assoc($result)) {

                echo ' <div class="col-md-6  " >
                <div class="card" >
                    <img src="../admin/event_images/'.$row['image_name'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                    <center><form action="event_images.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="'.$row['image_name'].'" " id="'.$row['image_name'].'" class="my-1 mx-1" required>
                    <input type="text" name="image_name" value="'.$row['image_name'].'" hidden>
                    <input type="text" name="key" value="'.$key.'" hidden>
                     <button type="submit" class="btn btn-info">Change Image</button>
                    </form></center>
                    </div>
                </div>
            </div>';
            }
            ?>
           
           
            
        </div>
        <h2 class="my-3">Portrait Images :</h2>
        <div class="row ">
            <?php
              $sql="Select * from event_images where event_key='$key' and image_name like 'PORT%' ";
              $result=mysqli_query($conn,$sql);
            //  var_dump ($result);
            while ($row=mysqli_fetch_assoc($result)) {

                echo ' <div class="col-md-4 my-2 " >
                <div class="card" >
                    <img src="../admin/event_images/'.$row['image_name'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                    <center><form action="event_images.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="'.$row['image_name'].'" " id="'.$row['image_name'].'"  class="my-1 mx-1" required>
                    <input type="text" name="image_name" value="'.$row['image_name'].'" hidden>
                    <input type="text" name="key" value="'.$key.'" hidden>
                     <button type="submit" class="btn btn-info">Change Image</button>
                    </form></center>
                    </div>
                </div>
            </div>';
            }
            ?>
           

            
        </div>

        <h2 class="my-3">Image Gallery :</h2>
        <div class="row ">
            <?php
              $sql="Select * from event_images where event_key='$key' and image_name like 'IMG%' ";
              $result=mysqli_query($conn,$sql);
            //  var_dump ($result);
            while ($row=mysqli_fetch_assoc($result)) {

                echo ' <div class="col-md-4 my-2 " >
                <div class="card" >
                    <img src="../admin/event_images/'.$row['image_name'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                    <center><form action="event_images.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="'.$row['image_name'].'" " id="'.$row['image_name'].'"  class="my-1 mx-1" required>
                    <input type="text" name="image_name" value="'.$row['image_name'].'" hidden>
                    <input type="text" name="key" value="'.$key.'" hidden>
                     <button type="submit" class="btn btn-info">Change Image</button>
                    </form></center>
                    </div>
                </div>
            </div>';
            }
            ?>
           

            
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>