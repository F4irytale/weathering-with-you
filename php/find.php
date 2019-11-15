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
			background-color: #81d4fa;
			margin-bottom: 20px;
			padding: 10px;
</style>
<body>
	<div class="comment">
<?php
include"config.php";
$sql="select * from comment order by id desc";
	$res=$mySQL->query($sql);
			while($row=$res->fetch_array())
		{?>
			<table style="margin: 15px;">
		<tr>
			<td colspan="2" style="font-size: 18px;"><?php echo $row['username']?>的愿望:</td>
			
		</tr>
		<tr>	
			<td style="font-size: 15px;" colspan="2"><?php echo $row['why']?></td>
		</tr>
		<tr>
			<td style="color: #424242; font-size: 13px;">希望在<?php echo $row['time']?></td>
			<td colspan="" style="color: #424242; font-size: 13px;"><?php echo $row['address']?>天晴</td>
			<hr style="color: #e1f5fe">
		</tr>
	</table>
<?php }?>
</div>
</body>
</html>