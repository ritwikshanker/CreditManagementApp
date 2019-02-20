<?php
/**
 * Created by PhpStorm.
 * User: Ritwik Shanker
 * Date: 20-02-2019
 * Time: 11:45 AM
 */
include "connect.php";
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
<div class="container-fluid" style="overflow-x:auto">
    <table id="Allusers">
        <tr>
            <th style="width:60px;">Info</th>
            <th>Name</th>
            <th>Email</th>
            <!--            <th>Current Credit</th>-->
        </tr>
        <?php
        $sql = "SELECT * FROM `user`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><input type="radio" name="DisplayUserDetails" value="<?php echo $row["id"]; ?>"
                           onclick="ShowAssociatedUser(this.value);"></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <!--                <td>--><?php //echo $row["current_credit"];
                ?><!--</td>-->
            </tr>
            <?php
        } ?>
    </table>
</div>
<br>
<br>
<div class="text-center">
    <a class="btn btn-primary" href="./selectuser.php" role="button" target="_self">View User</a>
</div>
</body>
<script>
    function ShowAssociatedUser(str) {
        if (str == "") {
            document.getElementById("Allusers").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("Allusers").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "selectsuser.php?rit=" + str, true);
            //alert("Ritwik");
            alert(str);
            xmlhttp.send();
        }
    }

</script>
</html>