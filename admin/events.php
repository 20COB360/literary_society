<?php

require './session_check.php';
include './dbconnect.php';
$alert="";
$message="";
if (isset($_GET['error'])) {
  $message=mysqli_real_escape_string($conn,$_GET['error']);

}
if (isset($_GET['success'])) {
  $message=mysqli_real_escape_string($conn,$_GET['success']);
  $alert="success";

}


if($_SERVER['REQUEST_METHOD']=='POST'){

//POST Data Extraction

  $event_name=mysqli_real_escape_string ($conn,$_POST['event_name']);
  $event_date=mysqli_real_escape_string ($conn,$_POST['event_date']);
  $content=mysqli_real_escape_string ($conn,$_POST['content']);

  $key=uniqid("KEY",true);


  //Error Handling of Input Files

 $num_coverimage= count($_FILES['coverimage']['name']);
 $num_landscape= count($_FILES['landscape']['name']);
 $num_portrait= count($_FILES['portrait']['name']);

if ($num_coverimage >15 ||$num_landscape!=2 || $num_portrait !=5 ) {

  $em="Select correct number of files.";
  header("Location: events.php?error=$em");
  exit;
}
else{
  include "./image_validator.php";
  echo "test";
  $result=validMultipleImage($_FILES['coverimage']);
  $result1=validMultipleImage($_FILES['portrait']);
  $result2=validMultipleImage($_FILES['landscape']);
  
      // echo $result ;
      // echo $result1 ;
      // echo $result2 ;
      // exit;

  if($result=="valid" && $result1=="valid" && $result2=="valid"){
    
if(isset($_FILES['coverimage'])){


      if (count($_FILES['coverimage']['name'])<=15) {
        for ($i=0; $i < count($_FILES['coverimage']['name']) ; $i++) { 

          $file_name=$_FILES['coverimage']['name'][$i];
          $file_type=$_FILES['coverimage']['type'][$i];
          $file_tmp_name=$_FILES['coverimage']['tmp_name'][$i];
          $file_error=$_FILES['coverimage']['error'][$i];
          $file_size=$_FILES['coverimage']['size'][$i];
      
      
          if($file_error===0){
            if ($file_size>2000000) {
            $em=" Sorry, your file is too large.";
            header("Location: events.php?error=$em");
            exit;
            }
          else{
              $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
              $file_ex_lc=strtolower($file_ex);
        
                  $allowed_exs=array("jpg","jpeg","png");
        
                  if (in_array($file_ex_lc,$allowed_exs)) {
                    $new_file_name=uniqid("IMG",true).'.'. $file_ex_lc;
                    $file_upload_path='event_images/'. $new_file_name;
                    move_uploaded_file($file_tmp_name,$file_upload_path);
      
                    //Query for image data storing
                    
                    $sql="INSERT INTO `event_images` ( `event_key`, `image_name`) VALUES ( '$key','$new_file_name')";
                    $result=mysqli_query($conn,$sql);
                  }
                  else{
                    $em="You can't upload files of this type.";
                    header("Location: events.php?error=$em");
                    exit;
                  }
        
        
        
            }
          }
      
      
          else{
            $em="unknown error occured!";
            header("Location: events.php?error=$em");
            exit;
          }
      
      
          
      
        }
      }
      else{
        $em=" File limit exceeded! Please select less than 15 images.";
        header("Location: events.php?error=$em");
        exit;
      }
  

}

if(isset($_FILES['landscape'])){

  if (count($_FILES['landscape']['name'])==2){
    for ($i=0; $i < count($_FILES['landscape']['name']) ; $i++) { 

      $file_name=$_FILES['landscape']['name'][$i];
      $file_type=$_FILES['landscape']['type'][$i];
      $file_tmp_name=$_FILES['landscape']['tmp_name'][$i];
      $file_error=$_FILES['landscape']['error'][$i];
      $file_size=$_FILES['landscape']['size'][$i];
  
  
      if($file_error===0){
        if ($file_size>2000000) {
         $em=" Sorry, your file is too large.";
         header("Location: events.php?error=$em");
         exit;
        }
       else{
          $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
          $file_ex_lc=strtolower($file_ex);
    
              $allowed_exs=array("jpg","jpeg","png");
    
              if (in_array($file_ex_lc,$allowed_exs)) {
                $new_file_name=uniqid("LAND",true).'.'. $file_ex_lc;
                $file_upload_path='event_images/'. $new_file_name;
                move_uploaded_file($file_tmp_name,$file_upload_path);
  
                //Query for image data storing
                
                $sql="INSERT INTO `event_images` ( `event_key`, `image_name`) VALUES ( '$key','$new_file_name')";
                $result=mysqli_query($conn,$sql);
              }
              else{
                $em="You can't upload files of this type.";
                header("Location: events.php?error=$em");
                exit;
              }
  
    
    
    
        }
      }
  
  
      else{
        $em="unknown error occured!";
        header("Location: events.php?error=$em");
        exit;
      }
  
  
      
  
    }
  
  }

  else{
    $em=" File limit exceeded! Please select only 2 images.";
    header("Location: events.php?error=$em");
    exit;
  }


}

if(isset($_FILES['portrait'])){

  if (count($_FILES['portrait']['name'])==5){
    for ($i=0; $i < count($_FILES['portrait']['name']) ; $i++) { 

      $file_name=$_FILES['portrait']['name'][$i];
      $file_type=$_FILES['portrait']['type'][$i];
      $file_tmp_name=$_FILES['portrait']['tmp_name'][$i];
      $file_error=$_FILES['portrait']['error'][$i];
      $file_size=$_FILES['portrait']['size'][$i];
  
  
      if($file_error===0){
        if ($file_size>2000000) {
         $em=" Sorry, your file is too large.";
         header("Location: events.php?error=$em");
         exit;
        }
       else{
          $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
          $file_ex_lc=strtolower($file_ex);
    
              $allowed_exs=array("jpg","jpeg","png");
    
              if (in_array($file_ex_lc,$allowed_exs)) {
                $new_file_name=uniqid("PORT",true).'.'. $file_ex_lc;
                $file_upload_path='event_images/'. $new_file_name;
                move_uploaded_file($file_tmp_name,$file_upload_path);
  
                //Query for image data storing
                
                $sql="INSERT INTO `event_images` ( `event_key`, `image_name`) VALUES ( '$key','$new_file_name')";
                $result=mysqli_query($conn,$sql);
              }
              else{
                $em="You can't upload files of this type.";
                header("Location: events.php?error=$em");
                exit;
              }
    
    
    
        }
      }
  
  
      else{
        $em="unknown error occured!";
        header("Location: events.php?error=$em");
        exit;
      }
  
  
      
  
    }
  }

  else{
    $em=" File limit exceeded! Please select only 5 images.";
    header("Location: events.php?error=$em");
    exit;
  }
 


  


}

  }


  
}



  // var_dump($_POST);
  // exit;


  // $img=mysqli_real_escape_string ($conn,$_POST['img']);
  // echo $category,$title,$name,$desc,$content,$featured,$img;
  // $featured=$_POST['featured'];


    $sql="INSERT INTO `events` ( `foreign_key`, `event_name`, `event_date`, `event_report`, `timestamp`) VALUES ( '$key', '$event_name', '$event_date', '$content', current_timestamp())";

    $result=mysqli_query($conn,$sql);
    if ($result) {
      $em="Event hasbeen uploaded successfully.";
      header("Location: events.php?success=$em");
      exit;
    }
    if (!$result) {
      $em=" Sorry, unknown error occured.";
      header("Location: events.php?error=$em");
      exit;
    }

  


  else{
// Redirect browser
    header("Location: ./events.php");
    exit;
  }


}



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>ADMIN PANE -Events</title>
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
        <h1 class="my-2">Update Events:</h1>
    <form class="my-5" action="./events.php" method="POST" enctype="multipart/form-data">
   
  <div class="mb-3">
    <label for="title" class="form-label">Event name :</label>
    <input type="text" class="form-control" id="event_name" name="event_name" aria-describedby="event_name" required>
   
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Event Organised on :</label>
    <input type="date" class="form-control" id="event_date" name="event_date" aria-describedby="event_date" required>
   
  </div>

  <div class="mb-3">
    <label for="article" class="form-label" id="article_label">Event Report :</label>
        <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="article" style="height: 100px" name="content" required></textarea>
        <label for="floatingTextarea2">Content</label>
        </div>
   
  </div>
    <h4>Event Gallery Section <i>("Only in .jpg or .jpeg or .png is allowed.")</i> :</h4>
  <div class="mb-3">
    <label for="image" class="form-label">Landscape Images <i>("Only 2 photos")</i> :</label>
            <div class="mb-3">
              <label for="note" style="color:red; font-weight:bold;">(Images size should be less than 2MB)</label>
        <input class="form-control" type="file" id="coverimage" name="landscape[]" multiple required>
        </div>
  </div>
  <br>
  <div class="mb-3">
    <label for="image" class="form-label">Portrait Images <i>("Only 5 photos")</i> :</label>
            <div class="mb-3">
              <label for="note" style="color:red; font-weight:bold;">(Images size should be less than 2MB)</label>
        <input class="form-control" type="file" id="coverimage" name="portrait[]" multiple required>
        </div>
  </div>
  <br>
  <div class="mb-3">
    <label for="image" class="form-label">Event Gallery :</label>
            <div class="mb-3">
              <label for="note" style="color:red; font-weight:bold;">(Image size should be less than 2MB)</label>
        <input class="form-control" type="file" id="coverimage" name="coverimage[]" multiple required>
        </div>
  </div>
 

 
  <button type="submit" class="btn btn-info">Upload Content</button>
</form>
    </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
  

  </script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
<!--     
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
   
  </body>
</html>