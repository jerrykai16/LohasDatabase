<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require_once("DB_conn.php");
    $sql1 = "SELECT ID FROM product;";
    ?>
</head>

<body>
    <form action="delete.php" method="post">
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
            <input type="submit" value="刪除">
        </select>
        <?php
        if (isset($_POST["productID"])) {
            $sql2 = "DELETE from product where ID='".$_POST["productID"]."';";
            if ($result1 = mysqli_query($link, $sql2)) {
                header("location:readPage.php");
            }else{
                echo "刪除失敗";
            }
        }
        mysqli_close($link);
        ?>
    </form>
</body>

</html>