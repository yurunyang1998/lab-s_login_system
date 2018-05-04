<?php
/**   
* 获取机器网卡的物理（MAC）地址
* 目前支持WIN/LINUX系统   
**/
header("Content-type: text/html; charset=utf-8");
class MacAddInfo {      
    var $return_array = array (); // 返回带有MAC地址的字串数组    
    var $mac_addr;  

    function MacAddInfo($os_type) {  
        switch (strtolower ( $os_type )) {  
            case "linux" :  
                $this->forLinux ();  
                break;  
            case "solaris" :  
                break;  
            case "unix" :  
                break;  
            case "aix" :  
                break;  
            default :  
                $this->forWindows ();  
                break;          
        } 
        $temp_array = array ();  
        foreach ( $this->return_array as $value ) {  

            if (preg_match ( "/[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f][:-]" . "[0-9a-f][0-9a-f]/i", $value, $temp_array )) {  
                $this->mac_addr = $temp_array [0];  
                break;  
            }
        }  
        unset ( $temp_array );  
        return $this->mac_addr;  
    }  

    function forWindows() {  
        @exec ( "ipconfig /all", $this->return_array );  
        if ($this->return_array)  
            return $this->return_array;  
        else {  
            $ipconfig = $_SERVER ["WINDIR"] . "/system32/ipconfig.exe";  
            if (is_file ( $ipconfig ))  
                @exec ( $ipconfig . " /all", $this->return_array );  
            else  
                @exec ( $_SERVER ["WINDIR"] . "/system/ipconfig.exe /all", $this->return_array );  
            return $this->return_array;  
        }  
    }  

    function forLinux() {  
        @exec ( "ifconfig -a", $this->return_array );  
        return $this->return_array;  
    }  
}  


//调用实例
$mac = new MacAddInfo(PHP_OS);    
   


//链接数据库
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


$name=$_POST["username"];

$password=$_POST["password"];

var_dump($_POST);



$mac->mac_addr;

$sql="select * from user where username='$name' ";
$result=mysqli_query($conn,$sql);
$rs=mysqli_fetch_assoc($result);

if($rs!=NULL)
{
	//have reged
	header('Refresh:2,Url=info_sign_error.html');
}

else
{
	$sql="insert into user values(NULL,'$name','$password','$mac->mac_addr','0')";
	$result=mysqli_query($conn,$sql);
	header('Refresh:2,Url=info_sign_success.html');
}



mysqli_close($conn);
?>
