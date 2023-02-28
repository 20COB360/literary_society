<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if( !isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true) || !isset($_SESSION['user_id'])|| !isset($_SESSION['enrollmentno'])|| !isset($_SESSION['facultyno'])|| !isset($_SESSION['name'])|| !isset($_SESSION['is_super_admin']) )
{
   header( "Location: index.php?invalidcredentials=true");
   exit;
}
?>