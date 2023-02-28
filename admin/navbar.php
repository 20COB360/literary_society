<?php

include './dbconnect.php';
// include '_logincheck.php';




$logout=false;


if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true)){

    $logout=true;
    $enrollmentno=$_SESSION['enrollmentno'];
   $is_super_admin= $_SESSION['is_super_admin'];
   
    
}

else{
    $logout=false;
}


?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./form.php">RLS </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./form.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./articles.php">Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./proses.php">Proses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./poetry.php">Poetry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./events.php">RLS Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./event_info.php">Update Events</a>
        </li>
        <?php
        if($is_super_admin){
          echo '<li class="nav-item">
          <a class="nav-link" href="./user_control.php">User Control</a>
        </li>';
        }
        
        ?>
      </ul>
      <form class="d-flex" role="search">
        


        <?php
        if ($logout) {

          echo '   <div class="mx-2 " style="color:white;"> ' . $enrollmentno . '</div>
   
      <a href="./logout.php" class="btn btn-outline-danger mx-2"role="button" style=" display:flex;justify-content:center; align-items:center;">Logout</a>';
        } 
        ?>




      </form>
    </div>
  </div>
</nav>