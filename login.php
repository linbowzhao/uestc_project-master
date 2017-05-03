<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <title>try</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
</head>
</head>
<body>

    <?php
    if(isset($_COOKIE['jinghua'])&&$_COOKIE['jinghua']=='jinghua666666'){
        include "passageEdit.php";
    }else{echo '    <div  id="login">
        <form>
            <input type="text" id="admin" placeholder="管理员账号" required>
            <input type="password" id="adminPassword" placeholder="密码" required>
            <input type="button" id="button" class="btn btn-success" value="登陆">
        </form>
    </div>';}//密码和账号对就进入更改页面，失败就留在登陆页面
    ?>
</body>
<script>
    document.getElementById('button').addEventListener('click',function () {
        var admin=document.getElementById('admin').value;
        var password =document.getElementById('adminPassword').value;
        document.cookie=admin+'='+password+';';
        window.location.reload();//重新加载此页面
    });//监听按钮事件把cookie插入
</script>
</html>