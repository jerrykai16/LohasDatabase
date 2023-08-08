<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    session_start();
    require_once("DB_conn.php");
    $sql1 = "SELECT ID FROM product;";
    $sql2 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'product';";
    ?>
</head>

<body>
    <form action="update.php" method="post">
        <select name="productID">
            <?php
            if ($colResult = mysqli_query($link, $sql1)) {
                foreach ($colResult as $key => $value) {
                    foreach ($value as $value) {
                        echo "<option value='" . $value . "'>" . $value . "</option>";
                    }
                }
            }
            ?>
            <input type="submit" value="送出">
        </select>
        </form>
    <form action="update.php" method="post">
        <?php
        if (isset($_POST["productID"])) {
            $_SESSION["productID"]=$_POST["productID"];
            $sql3 = "select * from product where ID='" . $_SESSION["productID"] . "';";
            if ($result1 = mysqli_query($link, $sql2) and $result2 = mysqli_query($link, $sql3)) {
                $rowNum=0;
                $row2=mysqli_fetch_array($result2, MYSQLI_NUM);
                while($row1=mysqli_fetch_array($result1)){
                    if($row1[0]!="ID"){
                        echo "<div>".$row1[0]."：<input type='text' value='".$row2[$rowNum]."' name='product[]'>"."</div>";
                    }
                    $rowNum+=1;
                }
            }
        }
        ?>
        <input type="submit" value="更新">
    </form>
    <?php
        if (isset($_POST["product"]) and isset($_SESSION["productID"])) {
            $rowArray=$_POST["product"];
            $sql3 = "update product SET `Attribute`='".$rowArray[0]."',`Price`='".$rowArray[1]."',`time`='".$rowArray[2]."' WHERE ID='".$_SESSION["productID"]."';";
            if ($result1 = mysqli_query($link, $sql3)) {
                echo "<div>更新成功</div>";
            }
        }
        mysqli_close($link);
        ?>
    <a href="readPage.php">返回</a><br>
</body>

</html>