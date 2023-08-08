<?php
    $產品編號=$_POST['產品編號'];
    $類別編號=$_POST['類別編號'];
    $供應商編號=$_POST['供應商編號'];
    $產品名稱=$_POST['產品名稱'];
    $建議單價=$_POST['建議單價'];
    $平均成本=$_POST['平均成本'];
    $庫存量=$_POST['庫存量'];
    $安全存量=$_POST['安全存量'];

    require_once 'db_connect.php';
        
    $sql = "insert into 產品資料 values('".$產品編號."','".$類別編號."','".$供應商編號."','".$產品名稱."','".$建議單價."','".$平均成本."','".$庫存量."','".$安全存量."')";
    echo $sql."<br/>";
    if ( $result = mysqli_query($link, $sql) ) { 
        echo "ok";
    }			
    mysqli_close($link);
?>