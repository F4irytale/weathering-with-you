<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>把晴天带给你
	</title>
	<link rel="icon" href="../images/favicon.ico">
</head>
<style type="text/css">
	.comment{
			width: 845px;
			margin-left: 50px;
			border-radius: 15px;
			background-color: #FFDD99;
			margin-bottom: 20px;
			padding: 10px;
		}
	a{
		text-decoration: none;
	}
</style>
<body>
	<div class="comment">
	    <div style="margin: 10px;">
			<h1>所有人的委托：</h1>
		</div>
<?php
error_reporting(0);
include"config.php";
$page=isset($_GET['p'])? $_GET['p']:2;//查看所有委托起始页
if ($_GET['p'] == 0) {
    echo "错误页面！";
}
$sql = "select * from comment order by id desc limit ".($page-1) * 5 .",15 ";//查询语句，limit后的两个参数第一个是查询的起始位置，第二个是显示的数据条数
$res=$mySQL->query($sql);
			while($rows=$res->fetch_array())
		{?>
		<table style="margin: 15px;">
    		<tr>
    			<td colspan="2" style="font-size: 18px;"><?php echo $rows['username']?>的委托:</td>
    			
    		</tr>
    		<tr>	
    			<td style="font-size: 15px;" colspan="2"><?php echo $rows['why']?></td>
    		</tr>
    		<tr>
    			<td style="color: #424242; font-size: 13px;">在<?php if ($rows['time'] == "") {echo "未来的某一天";} else {echo $rows['time'];}?></td>
    			<td colspan="" style="color: #424242; font-size: 13px;">希望<?php echo $rows['address']?>天晴</td>
    			<hr style="color: #e1f5fe">
    		</tr>
	</table>
	
<?php 
}
$to_sql="SELECT COUNT(*)FROM comment";
$res2=$mySQL->query($to_sql);
$row=$res2->fetch_array();
$count=$row[0];
$to_pages=ceil($count/15); // 每页显示多少个写多少个
if($page<=1){
    echo "<a style='margin-left:20px;' href='".$_SERVER['PHP_SELF']."?p=1'>上一页</a>";
    }else{
    echo "<a style='margin-left:20px;' href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";
}
if ($page<$to_pages){
    echo "<a style='margin-left:50px;' href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
 
 
}else{
    echo "<a style='margin-left:50px;' href='".$_SERVER['PHP_SELF']."?p=".($to_pages)."'>下一页</a>";

}
?>
<span style="margin-left:50px;"><a href="../">回首页</a></span>
<span style="margin-left:50px;">共<?php echo $to_pages ?>页&nbsp;&nbsp;&nbsp;第<?php echo $page ?>页</span>
</div>
</body>
</html>
