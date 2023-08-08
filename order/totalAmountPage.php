<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    require_once 'DB_conn.php';
    $sql = "select 員工編號 from 員工";
    $result = mysqli_query($link,$sql);

    while($row = mysqli_fetch_assoc($result)){
       $pId[] = $row["員工編號"];
    }
    
    mysqli_close($link);
?>
<body>
    <h3>查詢員工訂單總金額</h1>
    <form method="post" action="read.php">
        員工編號:<select name="pId">
            <?php
                foreach($pId as $id){
                    echo "<option value=$id>$id</option>";
                }
            ?>
        </select>
        </br></br>
        <input type="submit" value="查詢">
    </form>
</body>
</html>