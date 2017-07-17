<?php
$conn=mysql_connect("localhost","bbs","qwer883762");//连接数据库
if($conn){
    $a=mysql_select_db ("jinghua");//选择数据库
    mysql_query("SET NAMES UTF8");//设置数据库编码
}else{
    echo "<script>console.log('fail to connect to mysql')</script>";//连接失败打印错误信息
}
?>