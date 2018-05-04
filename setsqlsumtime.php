<?php
/**
 * Created by PhpStorm.
 * User: yurunyang
 * Date: 2018/4/24
 * Time: 18:25
 */
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

