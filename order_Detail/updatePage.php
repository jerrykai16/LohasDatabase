<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    session_start();
    require_once("DB_conn.php");

    if(isset($_GET["PID"])){
        $_SESSION["PID"]=$_GET["PID"];
    }
    $PName = $_SESSION["PN"][$_SESSION["PID"]];
    $PID = "SELECT p.產品編號 FROM 產品資料 p WHERE p.產品名稱='" . $PName . "'";

    $ODID = $_SESSION["orderDetailID"];
    ?>
</head>

<body>
    <form action="updatePage.php" method="post">
        <?php
        if (isset($ODID)) {
            $tableColumn = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '訂單明細';";
            $tableValue = "SELECT * FROM 訂單明細 WHERE 訂單編號='" . $ODID . "' AND 產品編號=(" . $PID . ")";
            $columnNameArray = array();
            if ($result1 = mysqli_query($link, $tableColumn) and $tableValues = mysqli_query($link, $tableValue)) {
                $rowNum = 0;
                while ($row1 = mysqli_fetch_array($result1)) {
                    array_push($columnNameArray, $row1[0]);
                }
                //設定表標題
                
                $ODvalue = mysqli_fetch_array($tableValues, MYSQLI_NUM);
                //將表資料傳進陣列

                $sql = "SELECT p.產品名稱 FROM 產品資料 p WHERE p.產品名稱!='" . $PName . "'";
                echo "<div>產品名稱：<select name='product[]'>";
                if ($PNResult = mysqli_query($link, $sql)) {
                    echo "<option value='" . $PName . "'>" . $PName . "</option>";
                    while ($value = mysqli_fetch_array($PNResult)) {
                        echo "<option value='" . $value[0] . "'>" . $value[0] . "</option>";
                    }
                }
                echo "</select>";
                //設定產品名稱編號
            }
            echo "<div>" . $columnNameArray[2] . "：<input type='text' value='" . $ODvalue[2] . "' name='product[]'>" . "</div>";
            echo "<div>" . $columnNameArray[3] . "：<input type='text' value='" . $ODvalue[3] . "' name='product[]'>" . "</div>";
        }
        ?>
        <input type="submit" value="更新">
    </form>
    <?php
    if (isset($_POST["product"]) and isset($ODID)) {
        $finValue=$_POST["product"];
        $sql = "update 訂單明細 SET 產品編號=(SELECT p.產品編號 FROM 產品資料 p WHERE p.產品名稱='".$finValue[0]."'),實際單價='".$finValue[1]."',數量='".$finValue[2]."' WHERE 訂單編號='".$ODID."' AND 產品編號=(".$PID.")";
        mysqli_query($link, $sql);
        mysqli_close($link);
        Header("location:readPage.php");
    }
    ?>
    <a href="readPage.php">返回</a>
</body>

</html>