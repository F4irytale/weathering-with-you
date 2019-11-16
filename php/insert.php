<?php
error_reporting(E_ALL & ~E_NOTICE);
$time= $_POST['date'];
$address= $_POST['address'];
$comment= $_POST['comment'];
$username= $_POST['username'];
$search = array('江泽','vpn','傻逼','艹','滚','习近','<','>','script','<?php','#','alert','||','`');
function test($str , $array_search){
    foreach($array_search as $value){
       if(strstr($str , $value)!==false){
       	 echo "<script>alert('含有敏感词或字符，请重新输入');location='../index.php'</script>";
           return true;
       }
    }
   
    return false;
}
//使用方法
$test = test($username,$search);
$test2 = test($comment,$search);
$test3 = test($address,$search);
$text4 = test($time,$search);

if($test==false&&$test2==false&&$test3==false&&$test4==false){
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
}

?>
?>
