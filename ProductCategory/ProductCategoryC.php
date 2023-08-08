<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增</title>
    <link rel="stylesheet" href="ProductCategoryCSS.css">
  </head>
  <body>
    <div class="titleBox"><h1>產品類別</h1></div>

    <div class="aBox">
      <a href="ProductCategoryC.php">新增</a>
      <a href="ProductCategoryU.php">修改</a>
      <a href="ProductCategoryR.php">查詢</a>
      <a href="ProductCategoryD.php">刪除</a>
    </div>

    <div class="ConterBox">
      <div class="contentBox">
        <form action="ProductCategoryCphp.php" method="post" name="form1" id="form1">
          <h3>新增資料</h3>
          類別編號：<input name="pID" type="text" autofocus required size="10" maxlength="11"><br>
          類別名稱：<input name="pName" type="text" autofocus required size="10" maxlength="20"><br><br>
          <input type="reset" name="reset" id="reset" value="重設">
          <input type="submit" name="submit" id="submit" value="送出">
        </div>
      </div>
    </form>
  </body>
</html>