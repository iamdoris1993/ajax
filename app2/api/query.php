<?php
//處理查詢資料的請求

include_once "connect.php";

//sprintf 數字轉字串
$class='1'.sprintf("%02d",$_GET["class"]); //%d正整數 02:兩位數(空的補0)

//撈出班級學生
$sql="select * from students where substring(`class_num`,1,3)='$class'";
$rows=$pdo->query($sql)->fetchAll();

echo "<tr>";
echo "<td>座號</td>";
echo "<td>姓名</td>";
echo "<td>科系</td>";
echo "<td>生日</td>";
echo "<td>學號</td>";
echo "<td>操作</td>";
echo "</tr>";

foreach($rows as $r){
    echo "<tr>";
    echo "<td>".mb_substr($r['class_num'],3,2,"utf8")."</td>";
    echo "<td>".$r['name']."</td>";
    echo "<td>".$r['dept']."</td>";
    echo "<td>".$r['birthday']."</td>";
    echo "<td>".$r['uni_id']."</td>";
    echo "<td>";
    echo "<button class='edit-user' data-edit='".$r['uni_id']."'>編輯</button>";
    echo "<button class='del-user' data-del='".$r['uni_id']."'>刪除</button>";
    echo "</td>";
    echo "</tr>";
}

?>