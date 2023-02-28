<?php
require './session_check.php';
require './dbconnect.php';
$insert="";
$update="";
$delete="";
$alert="";
?>


<?php 

if ($_SERVER['REQUEST_METHOD']=='POST') {
  if(isset($_POST['update'])){
    //Convert it to number
    $sno=mysqli_real_escape_string($conn,$_POST['update']);

    //Extracting information
    $name=mysqli_real_escape_string ($conn,$_POST['name']);
    $title=mysqli_real_escape_string ($conn,$_POST['title']);
    $desc=mysqli_real_escape_string ($conn,$_POST['desc']);
    $content=mysqli_real_escape_string ($conn,$_POST['content']);
    $featured=mysqli_real_escape_string ($conn,$_POST['featured']);
    $author_bio=mysqli_real_escape_string ($conn,$_POST['author_bio']);

    $sql="UPDATE `proses` SET `author` = '$name', `title` = '$title', `desc` = '$desc', `prose` = '$content',`featured`='$featured',`author_bio`='$author_bio'    WHERE`PROSE_id`='$sno'";
    $result=mysqli_query($conn,$sql);
    if($result){
      $update=true;
  
    }
  
  }
 else{
//HAndle Later

  }
 }

 




if (($_SERVER['REQUEST_METHOD']=='GET') ){

  if (isset($_GET['delete'])) {
    $sno=mysqli_real_escape_string($conn,$_GET['delete']);
    $sql="select * from proses where proses.prose_id=$sno";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $cover_image=$row['cover_image'];
    $author_image=$row['author_image'];

    if ($cover_image!=="") {
      $path="./upload/". $cover_image;
      if(!unlink($path)){
        $message="Error Occured.";
      }
     }
  
     if($author_image!=""){
      $path="./upload/".$author_image;
      if(!unlink($path)){
        $message="Error Occured.";
      }
     }

    $sql="DELETE FROM `proses` WHERE `proses`.`prose_id` = $sno";
  
    $result=mysqli_query($conn,$sql);
    if($result){
      //Reflect Success
       }

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
    <!-- Data Tables css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
    <title>RLS - Proses</title>
  </head>
  <body>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Content</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                  <form method="post" action="./proses.php">
                  <input type="hidden" name="update" id='update'>
              <div class="mb-3">
                <label for="author_name" class="form-label">Author Name :</label>
                <input type="text" class="form-control" id="name" name="name" Required >
              </div>

              <div class="mb-3">
                <label for="author_name" class="form-label">Author Bio :</label>
                <input type="text" class="form-control" id="author_bio" name="author_bio" Required >
              </div>
              <div class="mb-3">
                <label for="title" class="form-label">Title :</label>
                <input type="text" class="form-control" id="title" name="title" Required >
              </div>

              <div class="mb-3">
                <label for="desc" class="form-label">Description :</label>
                <input type="text" class="form-control" id="desc" name="desc" Required >
              </div>



              <div class="mb-3">
                <label for="content" class="form-label">Prose :</label>
                <textarea name="content" id="content" cols="30" rows="6" class="form-control"></textarea>
                
              </div>

              <div class="mb-3">
                <label for="featured" class="form-label">Featured :</label>
                <select class="form-select form-control" aria-label="Default select example" name="featured" id="featured" required>
            <option value="YES">Yes</option>
            <option value="NO">No</option>
            </select>
              </div>
  </div>

              <button type="submit" class="btn btn-info">Save Updates</button>
            </form>
      </div>
      
    </div>
  </div>
</div>

<?php
include './navbar.php';

?>




<?php

if($insert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>Prose hasbeen inserted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if($update){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>Prose hasbeen updated successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($delete){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>Prose hasbeen deleted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>


    <div class="container my-5">
        <h2>CONTROL PANEL - ALL PROSES PUBLISHED </h2>

    </div>






<div class="container  my-5">
<table class="table table-dark" id='myTable'>
  <thead>
    <tr>
      <th scope="col"> S.No</th>
      <th scope="col">Author Name</th>
      <th scope="col">Author Bio</th>
      <th scope="col">Title </th>
      <th scope="col">Description </th>
      <th scope="col">Prose </th>
      <th scope="col">Featured</th>
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>

<?php
  $sql="Select * from proses ";
$result=mysqli_query($conn,$sql);
$sn=1;
while ($row=mysqli_fetch_assoc($result)) {
echo "<tr>
<th scope='row'>". $sn . "</th>
<td>". $row['author']."</td>
<td>". $row['author_bio']."</td>
<td>". $row['title']."</td>
<td>". $row['desc']."</td>
<td>". $row['prose']."</td>
<td>". $row['featured']."</td>

<td> <a id=".$row['prose_id']." href='./prose_images.php?key=".$row['prose_id']."' style='color:white;text-decoration:none; '><button  class='btn btn-warning my-1 ' >Edit Images</button></a> <button  class='btn btn-success my-1 edit' data-bs-toggle='modal' data-bs-target='#editModal' id=".$row['prose_id'].">Edit</button>  <button  class='btn btn-danger deletes' id=". 99999999 . $row['prose_id']." >Delete</button></td>

</tr>";
$sn++;
} ;

?> 
    
  </tbody>
</table>

</div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script>
     $(document).ready( function () {
    $('#myTable').DataTable();
} )

   </script>


<script>
     edit= document.getElementsByClassName('edit');

    //  console.log(deletes)
     ename=document.getElementById('name')
     etitle=document.getElementById('title')
     edesc=document.getElementById('desc')
     econtent=document.getElementById('content')
     efeatured=document.getElementById('featured')
     eauthor_bio=document.getElementById('author_bio')

    // console.log(edit)
    arr= Array.from(edit)
    // console.log(arr)
    arr.forEach((element) => {
      element.addEventListener("click",(e)=>{
        // console.log("edit" , e.target.parentNode.parentNode)
        tr=e.target.parentNode.parentNode;

        name=tr.getElementsByTagName('td')[0].innerText
        author_bio=tr.getElementsByTagName('td')[1].innerText
        title=tr.getElementsByTagName('td')[2].innerText
        desc=tr.getElementsByTagName('td')[3].innerText
        content=tr.getElementsByTagName('td')[4].innerText
        featured=tr.getElementsByTagName('td')[5].innerText

        sno=e.target.id
        // console.log(sno)
        // console.log(title, desc)
        ename.value=name;
        etitle.value=title;
        edesc.value=desc;
        econtent.value=content;
        efeatured.value=featured;
        efeatured.value=featured;
        eauthor_bio.value=author_bio;

        //Passing Code to be Updated
        update.value=sno 

      })
    });
   // Deleting Element
    deletes= document.getElementsByClassName('deletes');
    // console.log(deletes)

    arr2= Array.from(deletes)
      // console.log(arr2)

    arr2.forEach((element) => {
      element.addEventListener("click",(e)=>{
        // console.log("edit" , e.target.parentNode.parentNode)
        // tr=e.target.id.su;
        // console.log(tr)
        sno=e.target.id.substr(8,)
        // img=e.target.parentNode.parentNode.getElementsByTagName('td')[5].id;
        // console.log(img)
        // console.log(sno)
        
        confirmation= confirm("Do you want to delete this prose ?");
        if(confirmation){
          // console.log("yes")
          window.location=`./proses.php?delete=${sno}`;
        }
     

      })
    });
   </script>
   


  </body>
</html>