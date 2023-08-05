<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>修改</title>
	<link rel="stylesheet" href="ProductCategoryCSS.css">
</head>
<body><div class="titleBox"><h1>產品類別</h1></div>
	<div class="aBox">
		<a href="ProductCategoryC.php">新增</a>
		<a href="ProductCategoryU.php">修改</a>
		<a href="ProductCategoryR.php">查詢</a>
		<a href="ProductCategoryD.php">刪除</a>
	</div>

	<div class="ConterBox">
		<div class="contentBox">
			<?php //連線資料庫
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
					$sql = "SELECT * FROM 產品類別";
			
			?>
		
			<form action="ProductCategoryUphp.php" method="post" name="form1" id="form1">
			  <h3>修改資料</h3>	<br>	
			  	類別編號：
			  <select name="pID" id="">
			  <?php  	//下拉式選單  	
			  	if ( $result = mysqli_query($link, $sql) ) { 
				while( $row = mysqli_fetch_assoc($result) ){ 
					echo "<option value='". $row["類別編號"] ."'>".$row["類別編號"]."</option>";
				}
			}
			  ?>
			  </select>
			 
			<br>更改類別名稱為：<input name="pRevise" type="text" autofocus required size="10" maxlength="20"><br><br>



		  <input type="reset" name="reset" id="reset" value="重設">
		  <input type="submit" name="submit" id="submit" value="送出">
	
			<?php 
			mysqli_close($link); 
			?>			
		</div>
	</div>
</body>
</html>