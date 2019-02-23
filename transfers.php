<?php
/**
 * Created by PhpStorm.
 * User: Ritwik Shanker
 * Date: 23-02-2019
 * Time: 06:05 PM
 */
include "connect.php";
session_start();
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
            <th>Transfer Amount</th>
            <th>Sender</th>
            <th>Receiver</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `transfers`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $row["transfer_amount"]; ?></td>
                <td><?php echo $row["sender_name"]; ?></td>
                <td><?php echo $row["receiver_name"]; ?></td>
            </tr>
            <?php
        } ?>
    </table>
</div>
<br>
<br>
<div class="text-center">
    <a class="btn btn-primary" href="./index.php" role="button" target="_self">Home Page</a>
</div>
</body>
</html>
