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
    <title>帖子详情</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php include "includes/nav.html" ?>
<?php
include('includes/cnn.php');
if (!isset($_GET['pid']) || !intval($_GET['pid']))//判断是否有pid从上一页传过来，没有默认0号文章
{
    $pid = 1;
} else {
    $pid = $_GET['pid'];
}
$sql = "select * from bbspage WHERE bid='".$pid."'";//查到对应文章
$rs = mysql_query($sql);
$contents = mysql_fetch_array($rs);
$title = $contents['title'];
$passage = $contents['bbspassage'];
$author = $contents['author'];
$time = $contents['time'];
$look = $contents['look'];
$look += 1;
$pid = $contents['bid'];
$comCount = $contents['comCount'];
?>
<div class="container">
    <div class="row">
        <div class="col-md-7" id="secondPage">
            <h3><?php echo $title; ?></h3><!--这是标题-->
            <ul>
                <li><p>游客</p></li><!--这是管理员-->
                <li><p>&nbsp;&nbsp;&nbsp;浏览量<?php echo $look; ?></p></li><!--这是浏览量-->
                <div style="clear:both;"></div>
            </ul>
            <hr/>
            <section>
                <p><?php echo $passage; ?></p><!--这是文章-->
            </section>
            <form action="bbspage.php?pid=<?php echo $pid; ?>" method="post">
                <textarea name="comment" placeholder="请输入评论" wrap="soft" required></textarea>
                <button type="submit" class="btn btn-success">发布评论</button>
            </form>
            <?php
            if (isset($_POST["comment"])) {
                $comment = $_POST["comment"];//评论内容的获取
                $rule='/(\')+(.)*(\-\-)+/ix';
                $checkComment=preg_match($rule,$comment);
                if($checkComment){
                    echo "<script language=\"JavaScript\">alert(\"含有非法字符\");</script>";
                }else{
                    $sql = "INSERT INTO bbscomment (comment,bbsid) VALUES ('" . $comment . "','" . $pid . "');";
                    $rs = mysql_query($sql);
                    $sql = "SELECT COUNT(*) FROM bbscomment WHERE bbsid='".$pid."'";
                    $rs = mysql_query($sql);
                    $comCount = mysql_fetch_array($rs)[0];
                    $sql = "UPDATE bbspage SET comcount='".$comCount."' where bid='".$pid."'";
                    $rs2 = mysql_query($sql);
                    if ($rs && $rs2) {
                        echo "<script language=\"JavaScript\">alert(\"发布成功\");</script>";
                    } else {
                        echo "<script language=\"JavaScript\">alert(\"发布失败\");</script>";
                    }
                }
            }//把评论输入到数据库
            ?>
            <div style="clear:both"></div>
            <section id="comment">
                <hr/>
                <?php
                $sql = "UPDATE bbspage SET look='".$look."' where bid='".$pid."'";
                $rs = mysql_query($sql);
                $sql = "SELECT * FROM bbscomment WHERE bbsid='".$pid."' ORDER BY ctime DESC LIMIT 4";//修改这里的数据就可以改输出评论条数
                $rs = mysql_query($sql);
                $contents = mysql_fetch_array($rs);
                do {
                    $c = $contents['comment'];
                    $t = $contents['ctime'];
                    ?>
                    <p>游客:<br/>&emsp;&emsp;<?php echo $c; ?></p>
                    <small><?php echo $t; ?></small>
                    <hr/>
                    <?php
                } while ($contents = mysql_fetch_array($rs))
                ?>
            </section>
        </div>
        <?php include "includes/right.php" ?>
    </div>
</div>
</body>
<?php include "includes/footer.html"; ?>
</html>