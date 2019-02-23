<?php
/**
 * Created by PhpStorm.
 * User: Ritwik Shanker
 * Date: 21-02-2019
 * Time: 11:06 AM
 */
session_start();
include "connect.php";
if (isset($_GET["mess"])) {
    $m = $_GET["mess"];
    unset($_GET["mess"]);
    ?>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Credit Management App</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="refresh" content="5;url=./index.php" />

</head>
<body>
<div class="alert" align="center">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong>Success!</strong>
    <div id="top">
        <h2><?php echo $m; ?></h2>
    </div>
</div>

</body>
</html>
