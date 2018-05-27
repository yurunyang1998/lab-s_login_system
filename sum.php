<?php
    //链接数据库
    //echo 1;
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
    //echo 2;
    $sleep_time = 10;//多长时间执行一次
    $switch = include('switch.php');//脚本开关




    //"select sum(length) from time where "
    #while(1){
{
        #$switch = include('switch.php');

        $get_all_names = "select username from user";
        $result = mysqli_query($conn,$get_all_names);
        //var_dump($result);
        //echo 3;
        while($all_names = mysqli_fetch_array($result))
        {
            //var_dump($all_names);
            $name = $all_names['username'];
            //echo $name;
            $getsumtime = "select length from time where username='$name'"; //一次获取同一个人的所有时间
            $timeresult = mysqli_query($conn,$getsumtime);
            //$time = mysqli_fetch_all($timeresult);

            $time_add = 0;
            while($time = mysqli_fetch_array($timeresult))  //一个个加在一起
            {
                //($time['length']);
                //echo  $time['length'];

                // 这里加一个时间戳转换的
                $nowtime = date('H-i-s','943891200');
                //$nowtime = strtotimte($time['length']);
                //echo  $nowtime;
                echo  $nowtime;
                $timd_add =  $time['length']+$nowtime;

                echo "</br>";
                //echo ($time[0]);
            }
            //get 到了这个人的总时间 time_add
            echo $name;
            echo $time_add;
            $insert_sql="INSERT INTO rank VALUES (NULL,'$name','$time_add',NULL)";
            #$inseer_result = mysqli_query($conn,$insert_sql);
            if(!$inseer_result)
            {
                echo "error";
                //写到日志里面
            }



            echo "</br>";
        }















        sleep($sleep_time);//等待时间，进行下一次操作。

    }


 
?>