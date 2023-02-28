<?php

require './session_check.php';
require './dbconnect.php';
$alert="";
$message="";
if ($_SERVER['REQUEST_METHOD']=='GET' &&  isset($_GET['key'])) {
    $key= mysqli_real_escape_string ($conn,$_GET['key']);
}

//POST request handling


if($_SERVER['REQUEST_METHOD']=='POST'){
  $key=mysqli_real_escape_string ($conn,$_POST['key']);
  // echo $image_name;
  // echo $key;
  // exit;
  $image_name=$_POST['image'];
  $image_file_name= str_replace(".","_",$image_name);

//   echo $image_file_name;
//   echo "<b>";
//   echo $image_name;
//   exit;

  function addImage($image_name,$file_name,$file_tmp_name,$file_error,$file_size,$key){
    
    if($file_error===0){
      if ($file_size>2000000) {
       $em=" Sorry, your file is too large.";
       header("Location: article_images.php?error=$em");
      }
     else{
        $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
        $file_ex_lc=strtolower($file_ex);
  
            $allowed_exs=array("jpg","jpeg","png");
  
            if (in_array($file_ex_lc,$allowed_exs)) {
              //Deleting Existing File

             if($image_name!= "default.jpg"){
                $path="./upload/". $image_name;
                // echo $path;
                if(unlink($path)){
                  $message="Deleted.";
                  // echo $message;
                }
             }

              //New File Inserted

              $file_upload_path='upload/'. $image_name;
              move_uploaded_file($file_tmp_name,$file_upload_path);
              // die("Succeses");
              header("Location: article_images.php?key=$key&success=true");
            }
            else{
              $em="You can't upload files of this type.";
              header("Location: article_images.php?error=$em");
            }
  
  
  
      }
    }


    else{
      $em="unknown error occured!";
      header("Location: article_images.php?error=$em");
    }
  }
  

  if(isset($_FILES['cover_image'])){
    $file_name=$_FILES['cover_image']['name'];
    $file_type=$_FILES['cover_image']['type'];
    $file_tmp_name=$_FILES['cover_image']['tmp_name'];
    $file_error=$_FILES['cover_image']['error'];
    $file_size=$_FILES['cover_image']['size'];
    
    addImage($image_name,$file_name,$file_tmp_name,$file_error,$file_size,$key);

  }
  if(isset($_FILES['author_image'])){
    $file_name=$_FILES['author_image']['name'];
    $file_type=$_FILES['author_image']['type'];
    $file_tmp_name=$_FILES['author_image']['tmp_name'];
    $file_error=$_FILES['author_image']['error'];
    $file_size=$_FILES['author_image']['size'];
    
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
        <h2 class="my-3"> Images Published:</h2>
        <div class="row ">
            <?php
              $sql="Select * from articles where article_id='$key' ";
              $result=mysqli_query($conn,$sql);
            //  var_dump ($result);
                    $row=mysqli_fetch_assoc($result);
                    $cover_image=$row['cover_image'];
                    if($cover_image==""){
                        $cover_image="default.jpg";
                    }
                echo ' <div class="col-md-6  " >
                <div class="card" >
                    <img src="../admin/upload/'.$cover_image.'" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Cover Image</h5>
                    <center><form action="article_images.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="cover_image" " id="'.$cover_image.'" class="my-1 mx-1" required>

                    <input type="text" name="image" value="'.$cover_image.'" hidden>
                    <input type="text" name="key" value="'.$key.'" hidden>
                     <button type="submit" class="btn btn-info">Change Image</button>
                    </form></center>
                    </div>
                </div>
            </div>';


            $row1=mysqli_fetch_assoc($result);
            $author_image=$row['author_image'];
            if($author_image==""){
                $author_image="default.jpg";
            }

            echo ' <div class="col-md-6  " >
            <div class="card" >
                <img src="../admin/upload/'.$author_image.'" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Author Image</h5>
                <center><form action="article_images.php" method="post" enctype="multipart/form-data">
                <input type="file" name="author_image" " id="'.$author_image.'" class="my-1 mx-1" required>
            
                <input type="text" name="image" value="'.$author_image.'" hidden>
                <input type="text" name="key" value="'.$key.'" hidden>
                 <button type="submit" class="btn btn-info">Change Image</button>
                </form></center>
                </div>
            </div>
        </div>';


            ?>
           
           
            
        </div>
       
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>