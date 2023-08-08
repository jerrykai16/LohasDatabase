<?php
session_start();
$deleteName = $_SESSION["PN"][$_GET["PID"]];
require_once("DB_conn.php");
$sql = "SELECT p.產品編號 FROM 產品資料 p WHERE p.產品名稱='" . $deleteName . "'";
$PID = mysqli_fetch_array(mysqli_query($link, $sql))[0];
$odID=$_SESSION["productID"];
$sql="DELETE FROM 訂單明細 WHERE 訂單編號 ='".$odID."' AND 產品編號 ='".$PID."'";
if(mysqli_query($link, $sql)){
    Header("location:readPage.php");
}
?>