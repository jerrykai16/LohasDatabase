<?php
    $id = $_POST["pId"];

    require_once 'DB_conn.php';
    $sql = "SELECT o.員工編號,c.姓名, SUM(od.實際單價 * od.數量) AS 總金額
            FROM 訂單 o, 訂單明細 od, 員工 c
            WHERE o.訂單編號 = od.訂單編號 AND o.員工編號 = c.員工編號
            GROUP BY o.員工編號,c.姓名
            HAVING o.員工編號 = $id";
    $result = mysqli_fetch_assoc(mysqli_query($link,$sql));
    if(isset($result)){
        echo "員工編號:$result[員工編號]</br>
              員工姓名:$result[姓名]</br>
              總金額:$result[總金額]</br>";
    }else{
        echo "此員工沒有交易紀錄</br>";
    }
    echo "<a href=readPage.php>返回上一頁</a>";


    mysqli_close($link);
?>