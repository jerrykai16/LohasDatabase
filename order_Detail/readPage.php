<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td a{
            color: blue;
            text-decoration:underline;
            font-weight: bolder;
        }
    </style>
    <?php
    require_once("DB_conn.php");
    $sql1 = "SELECT DISTINCT  訂單編號 FROM 訂單明細;";
    ?>
    <script>
        function checkButton(ID) {
            var x;
            var r = confirm("確認刪除?");
            if (r == true) {
                location.href="deletePage.php?PID="+ID;
            }
        }
    </script>
</head>

<body>
    <form action="readPage.php" method="post">
        <select name="productID">
            <?php
            session_start();
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
            $_SESSION["productID"] = $_POST["productID"];
            $sql2 = "SELECT od.訂單編號,p.產品名稱,od.數量 FROM 訂單明細 od LEFT JOIN 產品資料 p ON od.產品編號=p.產品編號 WHERE od.`訂單編號`='" . $_POST["productID"] . "';";
            if ($result1 = mysqli_query($link, $sql2)) {
                echo "<table>
                <th>
                    訂單編號
                </th>
                <th>
                    產品名稱
                </th>
                <th>
                    產品數量
                </th>
                ";
                $PID = 0;
                $_SESSION["PN"] = array();
                while ($row1 = mysqli_fetch_array($result1)) {
                    echo
                        "<tr>" .
                        "<td>" . $row1[0] . "</td>" .
                        "<td>" . $row1[1] . "</td>" .
                        "<td>" . $row1[2] . "</td>" .
                        "<td><a style='color:blue;' onclick='checkButton(".$PID.")'>刪除</td>" .
                        "</tr>";
                    $PID += 1;
                    array_push($_SESSION["PN"], $row1[1]);
                }
                echo "</table>";
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