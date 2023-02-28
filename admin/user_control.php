<?php

require './session_check.php';
include './dbconnect.php';
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
    
    <title>User Control Panel </title>
  </head>
  <body>

<?php
include './signup_modal.php';
include './navbar.php';

?>


<?php

if($insert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>Your Note hasbeen inserted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if($update){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>Your Note hasbeen updated successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($delete){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>Your Note hasbeen deleted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>


    <div class="container my-4">
        <h2>User Control Panel</h2>

       <center><button class="btn btn-success">Create new User Account</button></center> 
    </div>






<div class="container  my-5">
<table class="table table-dark" id='myTable'>
  <thead>
    <tr>
      <th scope="col"> S.No</th>
      <th scope="col"> Name</th>
      <th scope="col"> Email</th>
      <th scope="col">Faculty No</th>
      <th scope="col">Enrollment No</th>
      <th scope="col">SuperAdmin</th>
    </tr>
  </thead>
  <tbody>

<?php
  $sql="Select * from users ";
$result=mysqli_query($conn,$sql);
$sn=1;
while ($row=mysqli_fetch_assoc($result)) {
echo "<tr>
<th scope='row'>". $sn . "</th>
<td>". $row['name']."</td>
<td>". $row['email']."</td>
<td>". $row['enrollmentno']."</td>
<td>". $row['facultyno']."</td>
<td>  <button  class='btn btn-primary edit' data-bs-toggle='modal' data-bs-target='#signupModal' id=".$row['sno'].">Edit</button>  <button  class='btn btn-danger deletes' id=". 2222 . $row['sno']." >Delete</button></td>

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
     enote=document.getElementById('enote')
     edescription=document.getElementById('edescription')
    // console.log(edit)
    arr= Array.from(edit)
  // console.log(arr)
    arr.forEach((element) => {
      element.addEventListener("click",(e)=>{
        // console.log("edit" , e.target.parentNode.parentNode)
        tr=e.target.parentNode.parentNode;
        title=tr.getElementsByTagName('td')[0].innerText
        desc=tr.getElementsByTagName('td')[1].innerText
        sno=e.target.id
        // console.log(sno)
        // console.log(title, desc)


        enote.value=title
        edescription.value=desc
        code.value=sno 

      })
    });


    deletes= document.getElementsByClassName('deletes');
    // console.log(deletes)

    arr2= Array.from(deletes)
  // console.log(arr2)

    arr2.forEach((element) => {
      element.addEventListener("click",(e)=>{
        // console.log("edit" , e.target.parentNode.parentNode)
        // tr=e.target.id.su;
        // console.log(tr)
        sno=e.target.id.substr(4,)
        // console.log(sno)
        
        confirmation= confirm("Do you want to delete this note ?");
        if(confirmation){
          console.log("yes")
          window.location=`/crud/index.php?delete=${sno}`;
        }
     

      })
    });
   </script>

  </body>
</html>