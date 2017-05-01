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
    <title>website</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php include "includes/nav.html";
include "includes/cnn.php";
?>
<div style="clear:both;"></div>
<div class="container" >
    <div class="row">
        <div class="col-md-7">
            <form action="edit.php" method="post">
                <input type="text" class="form-control" id="editTitle" name="editTitle" placeholder="输入标题" required>
                <div style="display:flex;justify-content: center">
                <textarea wrap="hard" id="editContents" name="editContents"cols="85" rows="20" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">提交</button>
            </form>
            <?php
            if(isset($_POST["editContents"])&&isset($_POST["editTitle"])) {
                $contents = $_POST["editContents"];//评论内容的获取
                $title=$_POST["editTitle"];
                $sql = "INSERT INTO passage (title,passage) VALUES ('".$title."','".$contents."');";
                $rs = mysql_query($sql);
                $sql2="SELECT * FROM passage WHERE title=$title ORDER BY time DESC LIMIT 1";
                $con=mysql_fetch_array(mysql_query($sql2));
                $pid=$con['pid'];
                echo $pid;
                if ($rs) {
                    echo "<script language=\"JavaScript\">alert(\"发布成功\");</script>";
                    echo "<script>window.location =\"passage.php?pid=$pid\"</script>";
                } else {
                    echo "<script language=\"JavaScript\">alert(\"发布失败\");</script>";
                }
            }//把文章输入到数据库
            ?>
        </div>
        <?php include"includes/right.php"?>
    </div>
</div>

</body>
<?php include "includes/footer.html"; ?>
</html>