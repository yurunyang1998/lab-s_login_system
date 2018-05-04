<?php
//链接数据库
header("Content-type: text/html; charset=utf-8");
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

$name=$_SESSION['username'];
$password=$_SESSION['password'];

$sql="select * from user where username='$name' and password='$password'";		
$result=mysqli_query($conn,$sql);				
$rs=mysqli_fetch_assoc($result);		//取出数据



if($rs)
{
	date_default_timezone_set('PRC'); 
	$stime= date('Y-m-d H:i:s'); 
	
	$_SESSION['stime']=$stime;

	header('Location:online.php');
	
}

else
{
	//login failed
	header('Refresh:2,Url=info_login_error.html');
	
}

mysqli_close($conn);
?>
