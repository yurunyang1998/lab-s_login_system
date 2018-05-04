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



    ignore_user_abort();//关闭浏览器后，继续执行php代码
    set_time_limit(0);//程序执行时间无限制

    $sleep_time = 10;//多长时间执行一次
    #$switch = include('switch.php');//脚本开关




    //"select sum(length) from time where "
    while($switch){

        $switch = include('switch.php');

        $get_all_names = "select username from user";
        $result = mysqli_query($conn,$get_all_names);
        while($all_names = mysqli_fetch_array($result))
        {
            var_dump($all_names);

            echo "</br>";
        }

        sleep($sleep_time);//等待时间，进行下一次操作。
       
    }
    

 
?>