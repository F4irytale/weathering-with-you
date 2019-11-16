<?php
error_reporting(E_ALL & ~E_NOTICE);
$time= $_POST['date'];
$address= $_POST['address'];
$comment= $_POST['comment'];
$username= $_POST['username'];
if($username==""){
	echo "<script>alert('昵称不能为空哦');location='../index.php'</script>";
}else{
	if($comment==""){
	echo "<script>alert('理由不能为空哦');location='../index.php'</script>";
}else{
	echo $comment;
include"config.php";
$sql="insert into comment(username,address,time,why) values('$username','$address','$time','$comment')";
$res=$mySQL->query($sql);

echo "<script>alert('提交成功');location='../index.php'</script>";
}

}

?>
