<?php
//链接数据库
//xx3
$host='localhost';
$username='root';
$passowrd='admin';

header("Content-type: text/html; charset=utf-8");
$conn=mysqli_connect($host,$username,$passowrd);
mysqli_query($conn,'set names utf8');
if(!$conn)
{
	die('数据库链接失败'.mysql_error());
}
//链接'xx'数据库
mysqli_select_db($conn,'login');

session_start();		//开启session
	
echo  "登陆成功 登陆时间".$_SESSION['stime'];
$stime = $_SESSION['stime'];
$name  = $_SESSION['username'];

//$sql="update user set m='1' ";
echo $name;
$sql_get_m = "select m from user WHERE username='$name'";
//echo $sql_get_m;
$m = mysqli_query($conn,$sql_get_m);
$m = mysqli_fetch_assoc($m);
//var_dump($m);
if($m['m']==0)
    {
       // echo "fdfsa";
    $sql = "insert into time values(NULL,'$stime',NULL ,NULL ,'$name')";
    $result2 = mysqli_query($conn,$sql);

    $sql2 = "update user set m='1' where username='$name'";
    $result= mysqli_query($conn,$sql2);
    }


header("Refresh:2,url=index.php");

?>
