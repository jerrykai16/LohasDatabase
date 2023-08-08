<link rel="stylesheet" href="SupplierCSS.css">
<?php 
$link = @mysqli_connect( 
      'localhost', // MySQL主機名稱 
      'root', // 使用者名稱 
      '', // 密碼 
      'testdbfromsql');

  if(isset($link)){
    echo "";
  }
  else{
    echo "資料庫連線失敗<br>";
  }
  $sID=$_POST['sID'];
  $sName=$_POST['sName'];
  $sContact=$_POST['sContact'];
  $sTitle=$_POST['sTitle'];
  $sGender=$_POST['sGender'];
  $sPostalcode=$_POST['sPostalcode'];
  $sAddress=$_POST['sAddress'];
  $sTelephone=$_POST['sTelephone'];

  echo "<div class='titleBox'>
    <h1>新增資料為$sID,$sName,$sContact,$sTitle,$sGender,$sPostalcode,$sAddress,$sTelephone</h1>
  </div>";
  //新增
  $sql = "INSERT INTO 供應商 VALUES ('". $sID ."','". $sName ."','". $sContact ."','". $sTitle ."','". $sGender ."','". $sPostalcode ."','". $sAddress ."','". $sTelephone ."')";
  $result = mysqli_query($link, $sql);

    
   echo'<table>
    <tr>
      <tr><th>供應商編號</th>
         <th>供應商名稱</th>
         <th>聯絡人</th>
         <th>聯絡人職稱</th>
         <th>聯絡人性別</th>
         <th>郵遞區號</th>
         <th>地址</th>
         <th>電話</th>
    </tr>
    ';
  $sql = "SELECT * FROM 供應商";

  if ( $result = mysqli_query($link, $sql) ) { 
    while( $row = mysqli_fetch_assoc($result) ){ 
       echo "<tr><td>".$row['供應商編號']."</td>
         <td>".$row['供應商名稱']."</td>
         <td>".$row['聯絡人']."</td>
         <td>".$row['聯絡人職稱']."</td>
         <td>".$row['聯絡人性別']."</td>
         <td>".$row['郵遞區號']."</td>
         <td>".$row['地址']."</td>
         <td>".$row['電話']."</td></tr>";
    }
  } 
  echo"</table>";
  mysqli_close($link);
 ?>
 <div class="aBox">
    <a href="SupplierC.php">回前頁</a>
  </div>