<!doctype html>
<html>
  <head>
  <meta charset="utf-8">
  <title>更新</title>
  </head>
  <body>
    <form action="updata_out.php" method="post" name="form1" id="form1">
    <p>
      <label for="textfield">產品編號:</label>
      <select name="產品編號">
            <option value="whatm" selected="true">請選擇產品編號</option>
            <?php
              $產品編號 = $_POST['產品編號'];
              require_once 'db_connect.php';
                  
              $sql = "SELECT 產品編號 FROM 產品資料 ORDER BY 產品編號";
              $result = mysqli_query($link, $sql);
              if ($result->num_rows > 0) {
                // 將資料轉換為關聯陣列並使用迴圈顯示在網頁上
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['產品編號'] . '">' . $row['產品編號'] . '</option>';
                }
              }
              mysqli_close($link);
            ?>                
        </select>
    </p>
    <p>
      <label for="textfield">建議單價:</label>
      <input name="建議單價" type="text" autofocus required id="建議單價" size="20">
    </p>
    <p>
      <input type="submit" name="submit" id="submit" value="更新">
    </p>
    </form> 
  </body>
</html>