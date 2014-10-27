<style>
        .table-bordered > thead > tr {
   background-color:#C8C8C8;
}
.table-bordered > tbody > tr > td {
text-align:right;
}
</style>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

<?php
include('db.php');
$limit = 5; 
if($_GET)
{
$page=$_GET['page'];
}
$eu = ($page-1)*$limit;
$query = "select * from data_author  limit $eu,$limit";

?>
<?php
$bgcolor="#ffffff";
echo "<table class='table table-bordered' cellpadding='0' cellspacing='0' border='0'>";
    echo "<thead><tr>";
echo "<td  colspan='8'><p align='center'><b>
<font face='Simplified Arabic' size='4' color='#000000'>بيانات المؤلف</font></b></td>
</tr></thead>";
echo "<tbody><tr>";
echo "<td  bgcolor='#ffffff' >&nbsp;<font  color='#000000' size='4'>م</font></td>";
echo "<td  bgcolor='#ffffff' >&nbsp;<font  color='#000000' size='4'><a>الاسم</a></font></td>";
echo "<td  bgcolor='#ffffff' >&nbsp;<font  color='#000000' size='4'><a>رقم الهوية</a></font></td>";
echo "<td  bgcolor='#ffffff'>&nbsp;<font  color='#000000' size='4'><a>رقم المنسوب</a></font></td>";
echo "<td  bgcolor='#ffffff'>&nbsp;<font  color='#000000' size='4'>الوظيفة</font></td>";
echo "<td  bgcolor='#ffffff'>&nbsp;<font  color='#000000' size='4'><a>تاريخ التسجيل</a></font></td>";
    echo "<td  bgcolor='#ffffff'>&nbsp;<font  color='#000000' size='4'>حذف</font></td>";   
echo "<td  bgcolor='#ffffff'>&nbsp;<font  color='#000000' size='4'>تعديل</font></td></tr>";
?>
<?php
//$i=1;
      $num2=$eu+1;
foreach ($dbo->query($query) as $row) 
		{
if($bgcolor=='#ffffff'){$bgcolor='#f1f1f1';}
else{$bgcolor='#ffffff';}
	echo "<tr class=record >";
echo "<td align=right bgcolor=$bgcolor >&nbsp;<font  size='2'>$num2</font></td>";
echo "<td align=right bgcolor=$bgcolor >&nbsp;<font  size='2'>$row[Author_Name]</font></td>"; 
echo "<td align=right bgcolor=$bgcolor >&nbsp;<font  size='2'>$row[AuthorID]</font></td>"; 
echo "<td align=right bgcolor=$bgcolor >&nbsp;<font  size='2'>$row[university_ID]</font></td>"; 
echo "<td align=right bgcolor=$bgcolor >&nbsp;<font  size='2'>$row[job_typea]</font></td>";
 if($row['edit1']==1){
 echo"<td bgcolor=$bgcolor>$row[regdate]<span><font color='green' size=3>تعديل</font></span></td>";
 }else{
   echo" <td bgcolor=$bgcolor>$row[regdate]</td>";
}       
echo "</tr></tbody>";
                $num2+=1;
		}
                echo "</table>";
		?>
