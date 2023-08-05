<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增</title>
    <link rel="stylesheet" href="SupplierCSS.css">
    <style>
      .contentBox{
        height: 400px;

      }
    </style>
  </head>
  <body>
    <div class="titleBox"><h1>供應商</h1></div>

    <div class="aBox">
      <a href="SupplierC.php">新增</a>
      <a href="SupplierU.php">修改</a>
      <a href="SupplierR.php">查詢</a>
      <a href="SupplierD.php">刪除</a>
    </div>

    <div class="ConterBox">
      <div class="contentBox">


        <form action="SupplierCphp.php" method="post" name="form1" id="form1">
          <h3>新增資料</h3>
          供應商編號：<input name="sID" type="text" autofocus required size="10" maxlength="5"><br>
          供應商名稱：<input name="sName" type="text" autofocus required size="10" maxlength="50"><br>
          　聯絡人　：<input name="sContact" type="text" autofocus required size="10" maxlength="30"><br>
          聯絡人職稱：<input name="sTitle" type="text" autofocus required size="10" maxlength="30"><br>
          聯絡人性別：<input name="sGender" type="text" autofocus required size="10" maxlength="2"><br>
          郵遞區號　：<input name="sPostalcode" type="text" autofocus required size="10" maxlength="10"><br>
          　地址　　：<input name="sAddress" type="text" autofocus required size="10" maxlength="60"><br>
          　電話　　：<input name="sTelephone" type="text" autofocus required size="10" maxlength="24"><br><br>
          <input type="reset" name="reset" id="reset" value="重設">
          <input type="submit" name="submit" id="submit" value="送出">
        </div>
      </div>
    </form>
  </body>
</html>