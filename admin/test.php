<?php
include "dbconnect.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
</head>
<body>
    <?php
    $sql="select * from articles";
    $result=$conn->query($sql);
    echo var_dump( mysqli_fetch_assoc($result));
    $conn->close();
    ?>
</body>
</html>