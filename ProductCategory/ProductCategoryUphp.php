<link rel="stylesheet" href="ProductCategoryCSS.css">
<?php //列印並更新修改內容
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

	  $pID=$_POST['pID'];	  
	  $pRevise=$_POST['pRevise'];

	echo "<div class='titleBox'>
    <h1>修改資料為$pID,類別名稱更改為$pRevise</h1></div>";
	//修改
	$sql = "UPDATE 產品類別 SET 類別名稱='".$pRevise."' WHERE 類別編號='".$pID."'";
	$result = mysqli_query($link, $sql);

 echo'<table>
    <tr>
      <tr><th>類別編號</th>
         <th>類別名稱</th>
    </tr>
    ';
  $sql = "SELECT * FROM 產品類別";

  if ( $result = mysqli_query($link, $sql) ) { 
    while( $row = mysqli_fetch_assoc($result) ){ 
       echo "<tr><td>".$row['類別編號']."</td>
         <td>".$row['類別名稱']."</td></tr>";
    }
  } 
  echo"</table>";
  mysqli_close($link);
 ?>
 <div class="aBox">
    <a href="ProductCategoryU.php">回前頁</a>
  </div>