<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require_once("DB_conn.php");
    $sql1 = "SELECT DISTINCT  訂單編號 FROM 訂單明細;";
    $sql2 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '訂單明細';";
    ?>
</head>

<body>
    <form action="readPage.php" method="post">
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
            <input type="submit" value="查詢">
        </select>
        <?php
        if (isset($_POST["productID"])) {
            $sql3 = "select * from product where ID='" . $_POST["productID"] . "';";
            if ($result1 = mysqli_query($link, $sql2) and $result2 = mysqli_query($link, $sql3)) {
                $rowNum=0;
                $row2=mysqli_fetch_array($result2, MYSQLI_NUM);
                while($row1=mysqli_fetch_array($result1)){
                    echo "<div>".$row1[0]."：".$row2[$rowNum]."</div>";
                    $rowNum+=1;
                }
            }
        }
        mysqli_close($link);
        ?>
    </form>
    <a href="deletePage.php">刪除頁面</a><br>
    <a href="insertPage.html">新增頁面</a><br>
    <a href="updatePage.php">更新頁面</a>
</body>

</html>