<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>刪除</title>
	<link rel="stylesheet" href="SupplierCSS.css">
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
					$sql = "SELECT * FROM 供應商";
			
			?>
				
			<form action="SupplierDphp.php" method="post" name="form1" id="form1">
			  <h3>刪除資料</h3>	<br><br>	
			  	供應商編號：
			  <select name="s" id="">
			  <?php  	//下拉式選單  	
			  	if ( $result = mysqli_query($link, $sql) ) { 
				while( $row = mysqli_fetch_assoc($result) ){ 
					echo "<option value='". $row["供應商編號"] ."'>".$row["供應商編號"]."</option>";
				}
			}
			  ?>
			  </select>
			<br><br><br>
			  	<input type="reset" name="reset" id="reset" value="重設">
			  	<input type="submit" name="submit" id="submit" value="送出">
			  
	
			<?php 
			mysqli_close($link); 
			?>			
		</div>
	</div>
</body>
</html>
