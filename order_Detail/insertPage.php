<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require_once("DB_conn.php");
    ?>
</head>
<body>
    <form action="insertPage.php" method="post">
        訂單編號：<input type="text" name="ODvalue[]"><br>
        <?php
        $sql = "SELECT p.產品名稱,p.產品編號 FROM 產品資料 p";
        echo "產品名稱：<select name='ODvalue[]'>";
        if ($PNResult = mysqli_query($link, $sql)) {
            while ($value = mysqli_fetch_array($PNResult)) {
                echo "<option value='" . $value[1] . "'>" . $value[0] . "</option>";
            }
        }
        echo "</select><br>";
        ?>
        實際單價：<input type="text" name="ODvalue[]"><br>
        數量：<input type="text" name="ODvalue[]"><br>
        <input type="submit" value="建立">
    </form>
    <?php 
        if (isset($_POST["ODvalue"])){
            $ODvalue=$_POST["ODvalue"];
            $sql = "INSERT INTO 訂單明細 values('".$ODvalue[0]."','".$ODvalue[1]."','".$ODvalue[2]."','".$ODvalue[3]."')";
            echo $sql;
            if ( mysqli_query($link, $sql) ) { 
                echo "建立成功";
            }
        }
        mysqli_close($link);
    ?>
    <a href="index.html">返回</a>
</body>
</html>