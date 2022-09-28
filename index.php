<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>把晴天带给你
	</title>
	<link rel="icon" href="images/favicon.ico">
	<style type="text/css">
		.images {
			margin-left: 50px;
			position:absolute;
			z-index: -1;
		}

		.form {
			position:absolute;
			width: 400px;
			height: 350px;
			background-color: #FFDD99;
			margin-left: 510px;
			margin-top: 300px;
			border-radius: 30px;
			box-shadow: #ccc 0px 0px 5px;
		}

		.top_font {
			margin-top: 2.5%;
			margin-left: 5%;
			margin-right: 5%;
		}

		.button {
			background-color: #f44336;
		    border: none;
		    color: white;
		    padding: 8px 12px;
		    text-align: center;
		    font-size: 15px;
		    border-radius: 8px;
		    display:block;
		    margin:0 auto;
		    margin-top: 2.5%;
		}

		.form_main {
			margin-left: 5%;
			margin-right: 5%;
		}

		textarea {
			resize: none;
			width: 353px;
			height: 45px;
		}

		.comment {
			position: absolute;
			margin-top: 680px;
			width: 845px;
			margin-left: 50px;
			border-radius: 15px;
			background-color: #FFDD99;
			margin-bottom: 20px;
			padding: 10px;
		}
		
		a {
		    text-decoration: none;
		    color: #000000;
		}
	</style>
	
	<!--css-->
    <link rel="stylesheet" href="https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/aplayer/1.10.1/APlayer.min.css">
    <!--js-->
	<script src="https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/aplayer/1.10.1/APlayer.min.js"></script>
	<script src="https://unpkg.com/meting@2.0.1/dist/Meting.min.js"></script>
</head>
<body>
	<div style="width: 100px;">
	<div class="images">
		<img src="images/main.jpg" width="900px" height="650px;" oncontextmenu="return false;" ondragstart="return false;">
		</div>
			<div class="form">
				<div class="top_font">
				<span style="font-size:25px; color: red;">￥0</span>
				<span style="font-size:15px; color: red;">(免费)</span><br>
				<span style="font-size: 15px;">由于下雨而困扰的你，无论在什么地方，100%的晴天女孩会为你带来阳光😄</span>
			</div>
			<div class="form_main">
				<form action="php/insert.php" method="post" id="main_form">
					<input type="submit" name="" value="许愿放晴吧" class="button"><br>
					<table>
						<tr>
							<td width="200px;"><span style="font-weight: 900px; font-size: 15px;">您希望的日期</span></td>
							<td><span style="font-weight: 900px; font-size: 15px;">希望放晴的地方</span></td>
						</tr>
						<tr>
							<td>
								<input type="date" name="date" style="width: 150px; height: 20px;" value="<?php echo date('Y-m-d') ?>">
							</td>
							<td>
								<input type="text" name="address" style="width: 150px; height: 20px;" maxlength="30">
							</td>
						</tr>
						<tr>
							<td colspan="2">昵称<span style="font-size:12px; color: red;">*必填</span></td>
						</tr>
						<tr>
							<td colspan="2"><input type="text" name="username" maxlength="16" style="width: 353px; height: 20px;"></td>
						</tr>
						<tr>
							<td colspan="2">希望放晴的理由<span style="font-size:12px; color: red;">*必填</span></td>
						</tr>
						<tr>
							<td colspan="2">
								<textarea name="comment" form="main_form" placeholder="请在此处输入文本..."></textarea> 
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div class="comment">
		<div style="margin: 10px;">
			<h1>大家的委托：</h1>
		</div>
		<?php
			include "php/config.php";
			$sql = "select * from comment order by id desc limit 20";  // 最后的数字为显示的内容数量
			$res = $mySQL->query($sql);
			while ($row=$res->fetch_array()) {
		?>
		<table style="margin: 15px;">
			<tr>
				<td colspan="2" style="font-size: 18px;"><?php echo $row['username']?>的委托:</td>
				
			</tr>
			<tr>	
				<td style="font-size: 15px;text-indent:2em;" colspan="2"><?php echo $row['why']?></td>
			</tr>
			<tr>
				<td style="color: #424242; font-size: 13px;">在<?php if ($row['time'] == "") {echo "未来的某一天";} else {echo $row['time'];}?></td>
				<td colspan="0" style="color: #424242; font-size: 13px;">希望<?php echo $row['address']?>天晴</td>
				<hr style="color: #e1f5fe">
			</tr>
		</table>
		<?php
			}
			$sql2="select count(*) from comment";
			$res2=$mySQL->query($sql2);
			$row2=$res2->fetch_array()
			
			// ALTER TABLE 数据库表名 AUTO_INCREMENT=最新的数字; 该参数可以重置数据库排序问题。解决id不连续的问题；
		?>
		<span style="margin: 15px; color: #f50057">已有<?php echo $row2['count(*)']?>人提交晴天委托</span>
		<span><a href="php/find.php?p=1">查看所有人的晴天委托</a></span>
		<br/><br/>
		<center><a href="https://beian.miit.gov.cn/" target="_blank">ICP备xxxxx号-1</a></center>
		<center>没看过天气之子？ 点这里 → <a href="https://www.bilibili.com/bangumi/play/ss33343" target="_blank">《天气之子》</a></center>
	</div>
		<meting-js 
        	server="netease"
        	type="playlist"
        	id="5174564916"
        	fixed="true" 
        	autoplay="false"
        	loop="all"
        	order="list"
        	preload="auto"
        	list-folded="ture"
        	list-max-height="500px"
        	lrc-type="0">
	    </meting-js>
</body>
</html>
