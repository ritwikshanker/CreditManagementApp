<?php
/**
 * Created by PhpStorm.
 * User: Ritwik Shanker
 * Date: 21-02-2019
 * Time: 12:28 AM
 */
include "connect.php";
session_start();
$Trans_Amount = (int)$_GET['amount'];
$Receiver = $_SESSION["Transfer_User"];
$Sender = $_SESSION["T_User"];
$ReceiverID = $_SESSION["R_ID"];
$SenderID = $_SESSION["T_ID"];
$CurrentMoney = 0;
$sql = "SELECT * from `user` WHERE id = '$SenderID'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result))
{
    $CurrentMoney = $row["current_credit"];
}
if ($CurrentMoney < $Trans_Amount)
{
    $msg = "Insufficient funds to transfer";
    echo("<script LANGUAGE='JavaScript'>window.location.href='incomplete.php?mess=" . "\"" . $msg . "\"';</script>");
}
else if ($Trans_Amount <= 0)
{
    $msg = "Cannot Transfer Negative Funds";
    echo("<script LANGUAGE='JavaScript'>window.location.href='incomplete.php?mess=" . "\"" . $msg . "\"';</script>");
}
else if ($ReceiverID == $SenderID)
{
    $msg = "Cannot Transfer Between Same Users";
    echo("<script LANGUAGE='JavaScript'>window.location.href='incomplete.php?mess=" . "\"" . $msg . "\"';</script>");
}
else
{
    $sql = "update user set current_credit= current_credit+'$Trans_Amount' where id = '$ReceiverID'";
    $result = mysqli_query($conn, $sql);
    $sql = "update user set current_credit= current_credit-'$Trans_Amount' where id = '$SenderID'";
    $result = mysqli_query($conn, $sql);
    $sql = "insert into transfers(transfer_amount, sender_name, receiver_name, sender_id, receiver_id)  
    VALUES ('$Trans_Amount', '$Sender', '$Receiver', '$SenderID','$ReceiverID')";
    $result = mysqli_query($conn, $sql);
    $msg = $message = "Transferred " . $Trans_Amount . " credits to " . $Receiver . " from " . $Sender . "s account";
    echo("<script LANGUAGE='JavaScript'>window.location.href='complete.php?mess=" . "\"" . $msg . "\"';</script>");
}
?>


