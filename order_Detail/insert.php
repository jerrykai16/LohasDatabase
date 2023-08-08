<?php
    $id=$_POST["ID"];
    $attribute=$_POST["Attribute"];
    $price=$_POST["Price"];
    $time=$_POST["time"];
    require_once("DB_conn.php");
    $sql = "INSERT INTO product values('".$id."','".$attribute."','".$price."','".$time."')";
    echo $sql;
    if ( $result = mysqli_query($link, $sql) ) { 
        echo "建立成功";
    }
    $sql = "SELECT pID from product";
    if ( $result = mysqli_query($link, $sql) ) { 
        echo "se suc";
    }
    mysqli_close($link);
    echo "<br><a href='readPage.html'>返回</a>"
?>
