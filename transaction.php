<?php
/**
 * Created by PhpStorm.
 * User: Ritwik Shanker
 * Date: 20-02-2019
 * Time: 11:40 PM
 */
include 'connect.php';
session_start();
$TransferUserID = $_GET['b'];
$_SESSION["R_ID"] = $TransferUserID;
$sql = "SELECT * FROM `user` where `id`='$TransferUserID'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $_SESSION["Transfer_User"] = $row["name"];
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
</head>
<body>
<form method="GET" action="tcomplete.php" id="trans_amount">
    <div class="container-fluid" style="overflow-x:auto">
        <table id="Allusers">
            <tr>
                <!--                <th style="width:60px;">Info</th>-->
                <th align="center">Transferee</th>
                <th align="center">Receiver</th>
                <th align="center">Amount</th>
                <th align="center">Transfer</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION["T_User"]; ?></td>
                <td><?php echo $_SESSION["Transfer_User"]; ?></td>
                <td align="center">
                    <input name='amount' type='text' placeholder="Enter amount here" required/>
                </td>
                <td align="center">
                    <input type="submit" class="btn btn-success" name="button"/>
                </td>
            </tr>
</form>
</body>
</html>