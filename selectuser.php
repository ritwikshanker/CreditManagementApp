<?php
/**
 * Created by PhpStorm.
 * User: Ritwik Shanker
 * Date: 20-02-2019
 * Time: 11:45 AM
 */
include "connect.php";
session_start();
$User_id = $_GET['a'];
//var_dump(get_defined_vars());
//print_r($_POST);
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
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
</head>

<body>
<div class="container-fluid" style="overflow-x:auto">
    <table id="Allusers">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Current Credit</th>
        </tr>
        <?php
        //        $User_id = $_SESSION['Selected_User_Id'];
        $sql = "SELECT * FROM `user` where `id`='$User_id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php $_SESSION["T_User"] = $row["name"];
                    $_SESSION["T_ID"] = $row["id"];
                    echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["current_credit"]; ?></td>
            </tr>
            <?php
        } ?>
    </table>
</div>
<br>
<br>
<div class="text-center">
    <a class="btn btn-dark" href="selectusertransfer.php" role="button" target="_self">Select User to Transfer
        Credit</a>
</div>
</body>