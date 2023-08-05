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

	  $SS=$_POST['s'];
	  
	  

	echo "<div class='titleBox'><h1>查詢資料：供應商編號$SS</h1></div>";
	
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
		$sql = "SELECT * FROM 供應商 WHERE 供應商編號='".$SS."'";
;

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
    <a href="SupplierR.php">回前頁</a>
  </div>