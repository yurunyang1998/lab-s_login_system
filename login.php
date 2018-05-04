<?php
//链接数据库
//header("Content-type: text/html; charset=utf-8");

$host='localhost';
$username='root';
$passowrd='admin';

$conn=mysqli_connect($host,$username,$passowrd);
mysqli_query($conn,'set names utf8');
if(!$conn)
{
	die('数据库链接失败'.mysql_error());
}
//链接'xx'数据库
mysqli_select_db($conn,'login');

session_start();		//开启session

$name=$_POST['username'];
$password=$_POST['password'];

$_SESSION['username']=$name;
$_SESSION['password']=$password;

$sql="select * from user where username='$name' and password='$password'";		
$result=mysqli_query($conn,$sql);				
$rs=mysqli_fetch_assoc($result);		//取出数据

$ip = $_SERVER["REMOTE_ADDR"];     //获取ip
$isMatched = preg_match_all('/117\.32\.216\.\d{0,3}/', $ip, $matches);
//ip judgement
if($isMatched == 0){
	//flag judgement
	if($rs['m']==0 )
	{
		
		header('Location:xx21.php');
		
	}

	else
	{
		header('Location:xx22.php');
		
	}
}
else{
	header('Location:info_ip_error.html');
}

mysqli_close($conn);
?>
