<link rel="stylesheet" href="ProductCategoryCSS.css">
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

	  $pID=$_POST['pID'];
	  
	  

	echo "<div class='titleBox'><h1>刪除資料：類別編號$pID</h1></div>";
	$sql = "UPDATE 產品資料 SET 類別編號 = NULL WHERE 類別編號='".$pID."'";
	$result = mysqli_query($link, $sql);
	$sql = "DELETE FROM 產品類別 WHERE 類別編號='".$pID."'";
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
    <a href="ProductCategoryD.php">回前頁</a>
  </div>