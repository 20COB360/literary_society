<?php

require './session_check.php';
include './dbconnect.php';
$alert="";
$message="";
if (isset($_GET['error'])) {
  $message=mysqli_real_escape_string($conn,$_GET['error']);

}




if($_SERVER['REQUEST_METHOD']=='POST'){

  // var_dump($_POST);
  // exit;
if (isset($_FILES['coverimage']) && isset($_FILES['author_image'])) {
  include './image_validator.php';
  $result=validImage($_FILES['coverimage']);
  $result2=validImage($_FILES['author_image']);
 
  if ($result=="valid" && $result2="valid") {
      //COver Image Handle
  if(isset($_FILES['coverimage'])){

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    // exit;
  
    $file_name=$_FILES['coverimage']['name'];
    $file_type=$_FILES['coverimage']['type'];
    $file_tmp_name=$_FILES['coverimage']['tmp_name'];
    $file_error=$_FILES['coverimage']['error'];
    $file_size=$_FILES['coverimage']['size'];
  
  
  
    if($file_error===0){
      if ($file_size>2000000) {
       $em=" Sorry, your file is too large.";
       header("Location: form.php?error=$em");
       exit;
      }
     else{
        $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
        $file_ex_lc=strtolower($file_ex);
  
            $allowed_exs=array("jpg","jpeg","png");
  
            if (in_array($file_ex_lc,$allowed_exs)) {
              $new_file_name=uniqid("IMG",true).'.'. $file_ex_lc;
              $file_upload_path='upload/'. $new_file_name;
              move_uploaded_file($file_tmp_name,$file_upload_path);
            }
            else{
              $em="You can't upload files of this type.";
              header("Location: form.php?error=$em");
              exit;
            }
  
  
  
      }
    }
    else{
      $em="unknown error occured!";
      header("Location: form.php?error=$em");
      exit;
    }
  }

  //Author Image Handle

  if(isset($_FILES['author_image'])){

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    // exit;
  
    $file_name=$_FILES['author_image']['name'];
    $file_type=$_FILES['author_image']['type'];
    $file_tmp_name=$_FILES['author_image']['tmp_name'];
    $file_error=$_FILES['author_image']['error'];
    $file_size=$_FILES['author_image']['size'];
  
  
  
    if($file_error===0){
      if ($file_size>2000000) {
       $em=" Sorry, your file is too large.";
       header("Location: form.php?error=$em");
       exit;
      }
     else{
        $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
        $file_ex_lc=strtolower($file_ex);
  
            $allowed_exs=array("jpg","jpeg","png");
  
            if (in_array($file_ex_lc,$allowed_exs)) {
              $author_image_name=uniqid("IMG",true).'.'. $file_ex_lc;
              $file_upload_path='upload/'. $author_image_name;
              move_uploaded_file($file_tmp_name,$file_upload_path);
            }
            else{
              $em="You can't upload files of this type.";
              header("Location: form.php?error=$em");
              exit;
            }
  
  
  
      }
    }
    else{
      $em="unknown error occured!";
      header("Location: form.php?error=$em");
      exit;
    }
  }

  }
  else{
    if ($result !="valid") {
      header("Location: form.php?error=$result");
      exit;
    }
    if ($result2 !="valid") {
      header("Location: form.php?error=$result");
      exit;
    }
    
  }

}

  


  $category=mysqli_real_escape_string ($conn,$_POST['category']);
  $title=mysqli_real_escape_string ($conn,$_POST['title']);
  $name=mysqli_real_escape_string ($conn,$_POST['name']);
  $desc=mysqli_real_escape_string ($conn,$_POST['desc']);
  $content=mysqli_real_escape_string ($conn,$_POST['content']);
  $featured=mysqli_real_escape_string ($conn,$_POST['featured']);
  $author_bio=mysqli_real_escape_string ($conn,$_POST['author_bio']);
  // $img=mysqli_real_escape_string ($conn,$_POST['img']);
  // echo $category,$title,$name,$desc,$content,$featured,$img;
  // $featured=$_POST['featured'];
  $myDate = date("d-m-y");

  if($category=="article"){

    $sql="INSERT INTO `articles` ( `author`, `title`, `desc`, `article`, `featured`, `cover_image`, `publish_date`, `timestamp`,`author_bio`,`author_image`) VALUES ( '$name', '$title', '$desc', '$content', '$featured', '$new_file_name', '$myDate', current_timestamp(),'$author_bio','$author_image_name')";

    $result=mysqli_query($conn,$sql);
    if ($result) {
      $message="Article hasbeen uploaded successfully.";
      $alert="success";
    }
    if (!$result) {
      $em=" Sorry, unknown error occured.";
      header("Location: form.php?error=$em");
    }

  }

  elseif($category=="prose"){

    $sql="INSERT INTO `proses` ( `author`, `title`, `desc`, `prose`, `featured`, `cover_image`, `publish_date`, `timestamp`,`author_bio`,`author_image`) VALUES ( '$name', '$title', '$desc', '$content', '$featured', '$new_file_name', '$myDate', current_timestamp(),'$author_bio','$author_image_name')";

    $result=mysqli_query($conn,$sql);
    if ($result) {
      $message="Prose hasbeen uploaded successfully.";
      $alert="success";
    }
    if (!$result) {
      $em=" Sorry, unknown error occured.";
      header("Location: form.php?error=$em");
      // die(mysqli_connect_error());
    }

  }

 elseif($category=="poetry"){

    $sql="INSERT INTO `poems` ( `author`, `title`, `desc`, `poem`, `featured`, `cover_image`, `publish_date`, `timestamp`,`author_bio`,`author_image`) VALUES ( '$name', '$title', '$desc', '$content', '$featured', '$new_file_name', '$myDate', current_timestamp(),'$author_bio','$author_image_name')";

    $result=mysqli_query($conn,$sql);
    if ($result) {
      $message="Poetry hasbeen uploaded successfully.";
      $alert="success";
    }
    if (!$result) {
      $em=" Sorry, unknown error occured.";
      header("Location: form.php?error=$em");

      die(mysqli_connect_error());
    }

  }
  else{
// Redirect browser
    header("Location: ./form.php");
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


    <title>ADMIN PANEL</title>
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
        <h1 class="my-2">Upload Your Data:</h1>
    <form class="my-5" action="./form.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">Category :</label>
            <select class="form-select form-control" aria-label="Default select example" id="category" name="category"  required>
        <option value="article">Article</option>
        <option value="poetry">Poetry</option>
        <option value="prose">Prose</option>
        </select>
   
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title :</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" required>
   
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Author Name :</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="name" required>
   
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Author Bio :</label>
    <input type="text" class="form-control" id="author_bio" name="author_bio" aria-describedby="name" required>
   
  </div>
 
  <div class="mb-3">
    <label for="image" class="form-label">Author Image <i>("Only in .jpg or .jpeg or .png is allowed.")</i> :</label>
            <div class="mb-3">
              <label for="note" style="color:red; font-weight:bold;">(Image size should be less than 2MB)</label>
        <input class="form-control" type="file" id="author_image" name="author_image" required>
        </div>
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label" id="article_desc">Article Description :</label>
    <input type="text" class="form-control" id="desc" name="desc" aria-describedby="desc" required>
   
  </div>
  <div class="mb-3">
    <label for="article" class="form-label" id="article_label">Article :</label>
        <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="article" style="height: 100px" name="content" required></textarea>
        <label for="floatingTextarea2">Content</label>
        </div>
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Featured :</label>
            <select class="form-select form-control" aria-label="Default select example" name="featured" required>
        <option value="YES">Yes</option>
        <option value="NO">No</option>
        </select>
   
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Cover Photo <i>("Only in .jpg or .jpeg or .png is allowed.")</i> :</label>
            <div class="mb-3">
              <label for="note" style="color:red; font-weight:bold;">(Image size should be less than 2MB)</label>
        <input class="form-control" type="file" id="coverimage" name="coverimage" required>
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
    var category= document.getElementById("category")
    var article= document.getElementById("article_label")
    var desc= document.getElementById("article_desc")

        category.onchange= function (){
          if(category.value=="prose"){
            article.innerText="Prose :";
            desc.innerText="Prose Description :"
          }
     
      else if (category.value=="poetry")
      {
        article.innerText="Poetry :";
            desc.innerText="Poetry Description :"
      }

        else if(category.value=="article")
       {
        article.innerText="Article :";
            desc.innerText="Article Description :"
       }
        }


  </script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
<!--     
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
   
  </body>
</html>