<?php
session_start();
$PName = $_SESSION["PN"][$_GET["PID"]];
$odID=$_SESSION["orderDetailID"];
require_once("DB_conn.php");
$sql="DELETE FROM 訂單明細 WHERE 訂單編號 ='".$odID."' AND 產品編號 =("."SELECT p.產品編號 FROM 產品資料 p WHERE p.產品名稱='" . $PName . "')";
if(mysqli_query($link, $sql)){
    mysqli_close($link);
    Header("location:readPage.php");
}
?>