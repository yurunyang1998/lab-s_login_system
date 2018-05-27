<?php
//链接数据库
header("Content-type: text/html; charset=utf-8");
session_start();
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

		

	date_default_timezone_set('PRC'); 
	$xtime= date('Y-m-d H:i:s');

	$username=$_SESSION['username'];
echo "上线时间";
echo 	$stime=$_SESSION['stime'];

echo "<br>";
echo  "下线时间".$xtime;
echo "<br>";

$sql1="update user set m='0' where username='$username'";
$result1= mysqli_query($conn,$sql1);

$get_stime_sql = "select stime from time where username='$username' ORDER BY  id DESC limit 1";
$result2 = mysqli_query($conn,$get_stime_sql);
$stime = mysqli_fetch_assoc($result2);




$datetime1 = new DateTime($xtime);
$datetime2 = new DateTime($stime['stime']);
//('h','i','s')



$interval = $datetime1->diff($datetime2);
//var_dump($interval);

function object_array($array)
{
    if(is_object($array))
    {
        $array = (array)$array;
    }
    if(is_array($array))
    {
        foreach($array as $key=>$value)
        {
            $array[$key] = object_array($value);
        }
    }
    return $array;
}

 $res= object_array($interval);
 //$length =

 //$length = $res['h'].'-'.$res['i'].'-'.$res['s'];

 $length = mktime($res['h'],$res['i'],$res['s'],0,0,0); // 把这个变成时间戳
 var_dump($length);                              //
 //$res['h'];                                    //
    echo $length;                                //
    echo "    ";
    echo strtotime($length);
exit;

//$length = $interval["h"];//i:s'];
//var_dump($length);
#$length= $interval->format('%d天%H小时%i分%s秒');

$name=$_SESSION['username'];


//$update_rank_sql = "SELECT 'sumtime' FROM rank WHERE username='$name'";
//$result = mysqli_query($conn,$update_rank_sql);
//
//$old_time = mysqli_fetch_array($result);
//
//$oldtime  = new DateTime($old_time['sumtime']);
//echo $oldtime;


if(!$name)
{
    echo "error!";
    header("Refresh:2,url=login.html");
}
else {
    echo $length;
    //echo 123123123123;
//    $update_rank = "select sum_length from rank where name = '$name'";
//    $resule = mysqli_query($conn,$update_rank);
//    $old_time = mysqli_fetch_array($result1);
    #echo "123412";
    #var_dump($old_time);


    $sql = "update time set xtime='$xtime', length='$length'  where username='$name' ORDER BY id DESC limit 1";
    //$sql = "insert into time values(NULL,NULL,'$xtime','$length',NULL) where username=$name ORDER BY id DESC limit 1";
    mysqli_query($conn, $sql);

        //sleep(3);

    session_destroy();

    header("Refresh:3,url=index.php");
}
?>
