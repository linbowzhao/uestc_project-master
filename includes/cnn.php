<?php
$conn=mysqli_connect("localhost","bbs","qwe883762");//连接数据库
if($conn){
    $a=mysqli_select_db ("jinghua");//选择数据库
    mysqli_query("SET NAMES UTF8");//设置数据库编码
}else{
    echo "<script>console.log('fail to connect to mysqli')</script>";//连接失败打印错误信息
}
?>