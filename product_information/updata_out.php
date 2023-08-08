<?php
$產品編號 = $_POST['產品編號'];
$新建議單價 = $_POST['建議單價'];
require_once 'db_connect.php';
// 從資料庫中更新其他資料，並賦值給相應變數
$sql = "UPDATE 產品資料 SET 建議單價='$新建議單價' WHERE 產品編號 = '$產品編號'";
$result = mysqli_query($link, $sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $類別編號 = $row['類別編號'];	
    $供應商編號	= $row['供應商編號'];
    $產品名稱 = $row['產品名稱'];
    $建議單價 = $row['建議單價'];
    $平均成本 = $row['平均成本'];
    $庫存量	= $row['庫存量'];
    $安全存量 = $row['安全存量'];
}
echo "<table border='1px'>
    <tr>
        <td>產品編號</td>
        <td>類別編號</td>
        <td>供應商編號</td>
        <td>產品名稱</td>
        <td>建議單價</td>
        <td>平均成本</td>
        <td>庫存量</td>
        <td>安全存量</td>
    </tr>
    <tr>
        <td>$產品編號</td>
        <td>$類別編號</td>
        <td>$供應商編號</td>
        <td>$產品名稱</td>
        <td>$建議單價</td>
        <td>$平均成本</td>
        <td>$庫存量</td>
        <td>$安全存量</td>
    </tr>
</table>";

mysqli_close($link);
?>