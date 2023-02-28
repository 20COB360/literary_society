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
    $date=mysqli_real_escape_string ($conn,$_POST['date']);
    $content=mysqli_real_escape_string ($conn,$_POST['content']);


    $sql="UPDATE `events` SET `event_name` = '$name', `event_date` = '$date',  `event_report` = '$content' WHERE `event_id`='$sno'";

    $result=mysqli_query($conn,$sql);
    if($result){
      $update=true;
  
    }
  
  }
 else{
//Code will be written in final stage


 }

 

}


if (($_SERVER['REQUEST_METHOD']=='GET') ){

  if (isset($_GET['delete'])) {
    $sno=mysqli_real_escape_string($conn,$_GET['delete']);

    $sql="DELETE FROM `events` WHERE `events`.`event_id` = $sno";
   
    $result=mysqli_query($conn,$sql);

    if($result){
      $key= mysqli_real_escape_string ($conn,$_GET['key']);
        $sql="SELECT * FROM `event_images` WHERE `event_key` = '$key'";
        $result=mysqli_query($conn,$sql);
        
        while ($rows=mysqli_fetch_assoc($result)) {
            $path="./event_images/". $rows['image_name'];
            if(!unlink($path)){
              $message="Error Occured.";
            }

            else{
              $delete=true;
            }

        }



      $sql="DELETE FROM `event_images` WHERE `event_images`.`event_key` = '$key';";
      $result=mysqli_query($conn,$sql);


      $delete=true;
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
    
    <title>RLS - Event Info</title>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Event Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form method="post" action="./event_info.php">
                  <input type="hidden" name="update" id='update'>
              <div class="mb-3">
                <label for="author_name" class="form-label">Event Name:</label>
                <input type="text" class="form-control" id="name" name="name" Required >
              </div>

              <div class="mb-3">
                <label for="date" class="form-label">Event Organised On :</label>
                <input type="date" class="form-control" id="date" name="date" Required >
              </div>

              
              <div class="mb-3">
                <label for="content" class="form-label">Event Report :</label>
                <textarea name="content" id="content" cols="30" rows="6" class="form-control"></textarea>
                
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
  <strong>Success! </strong>Event hasbeen recorded successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if($update){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>Event hasbeen updated successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($delete){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>Event hasbeen deleted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>


    <div class="container my-5">
        <h2>CONTROL PANEL - ALL EVENTS PUBLISHED </h2>

    </div>






<div class="container  my-5">
<table class="table table-dark" id='myTable'>
  <thead>
    <tr>
      <th scope="col"> S.No</th>
      <th scope="col">Event Name</th>
      <th scope="col">Date  </th>
      <th scope="col">Event Report </th>
     
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>

<?php
  $sql="Select * from events ";
$result=mysqli_query($conn,$sql);
$sn=1;
while ($row=mysqli_fetch_assoc($result)) {
echo "<tr>
<th scope='row'>". $sn . "</th>
<td>". $row['event_name']."</td>
<td>". $row['event_date']."</td>
<td>". $row['event_report']."</td>
<td> <a id=".$row['foreign_key']." href='./event_images.php?key=".$row['foreign_key']."' style='color:white;text-decoration:none; '><button  class='btn btn-warning my-1 ' >Edit Images</button></a>

    <button  class='btn btn-success my-1 edit' data-bs-toggle='modal' data-bs-target='#editModal' id=".$row['event_id'].">Edit</button>  <button  class='btn btn-danger deletes' id=". 99999999 . $row['event_id']." >Delete</button>
</td>

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
     edate=document.getElementById('date')
     econtent=document.getElementById('content')

    // console.log(edit)
    arr= Array.from(edit)
  // console.log(arr)
    arr.forEach((element) => {
      element.addEventListener("click",(e)=>{
        // console.log("edit" , e.target.parentNode.parentNode)
        tr=e.target.parentNode.parentNode;

        name=tr.getElementsByTagName('td')[0].innerText
        date=tr.getElementsByTagName('td')[1].innerText
        content=tr.getElementsByTagName('td')[2].innerText
       

        sno=e.target.id
        // console.log(sno)
        // console.log(title, desc)
        ename.value=name;
        edate.value=date;
        econtent.value=content;

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

        key=e.target.parentNode.getElementsByTagName('a')[0].id;
        // console.log(key)
        // console.log(sno)
        
        confirmation= confirm("Do you want to delete this event ?");
        if(confirmation){
          // console.log("yes")
          window.location=`./event_info.php?delete=${sno}&key=${key}`;
        }
     

      })
    });
   </script>

  </body>
</html>