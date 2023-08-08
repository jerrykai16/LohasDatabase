<?php
$產品編號 = $_POST['產品編號'];
require_once 'db_connect.php';

// 從資料庫中刪除其他資料
$sql = "DELETE FROM 產品資料 WHERE 產品編號 = '$產品編號'";
if (mysqli_query($link, $sql)){
    echo "刪除成功";
}else{
    echo "發生錯誤:".mysqli_error($link);
}
mysqli_close($link);

?>