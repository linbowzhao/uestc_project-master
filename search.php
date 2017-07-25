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
    <title>搜索结果</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php include "includes/nav.html"?>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="header">
                <a><?php echo $_GET['search']?>的搜索结果</a>
            </div>
            <?php
            include('includes/cnn.php');
            $perpagenum = 5;//定义每页显示几条
            if(isset($_GET['search'])){
                $search=$_GET['search'];
                $sql="select count(*) from passage where locate('".$search."',title)<>0 ";
                $total = mysql_fetch_array(mysql_query($sql));//查询数据库中精选一共有多少条数据
            }else{
                $total = mysql_fetch_array(mysql_query("select count(*) from passage"));//查询数据库中一共有多少条数据
            }
            $Total = $total[0];//
            $Totalpage = ceil($Total/$perpagenum);//上舍，取整
            if(!isset($_GET['page'])||!intval($_GET['page'])||$_GET['page']>$Totalpage)//page可能的四种状态
            {
                $page=1;
            }
            else
            {
                $page=$_GET['page'];//如果不满足以上四种情况，则page的值为$_GET['page']
            }
            $startnum = ($page-1)*$perpagenum;//开始条数
            $sql = "select * from passage where locate('".$_GET['search']."',title)<>0 order by time desc limit $startnum,$perpagenum";//查询出所需要的加精条数
            $rs = mysql_query($sql);
            $contents = mysql_fetch_array($rs);
            if($total['count(*)']!=0)//如果$total不为空则执行以下语句
            {
                do
                {
                    $title = $contents['title'];
                    $passage = $contents['passage'];
                    $author = $contents['author'] ;
                    $time=$contents['time'];
                    $comcount=$contents['comcount'];
                    $look=$contents['look'];
                    $pid=$contents['pid'];
                    ?>
                    <div class="title">
                        <h4><a  href="passage.php?pid=<?php echo $pid;?>"><?php echo $title;?></a></h4><!--这是标题-->
                        <ul>
                            <li><img src="image/1.png"><?php echo $look;?></li><!--这是点击率-->
                            <li><img src="image/2.png">管理员</li><!--这是发布者-->
                            <li><img src="image/3.png"><?php echo $time;?></li><!--这是发布时间-->
                            <li>评论<?php echo $comcount;?></li><!--这是评论数-->
                            <div class="clear"></div>
                        </ul>
                    </div>
                    <p id="firstPage">
                        <?php echo $passage;?>
                    </p><!--这是文章-->
                    <hr/>  <!--this is a line-->
                    <?php
                }
                while($contents = mysql_fetch_array($rs));//do....while
                $per = $page - 1;//上一页
                $next = $page + 1;//下一页
                echo "<p style='text-align: center'>共有".$Total."篇帖子";
                if($page != 1)
                {
                    echo "<a href='".$_SERVER['PHP_SELF']."?search=".$search."'>首页</a>";
                    echo "<a href='".$_SERVER['PHP_SELF'].'?page='.$per."&search=".$search."'> 上一页</a>";
                }
                if($page != $Totalpage)
                {
                    echo "<a href='".$_SERVER['PHP_SELF'].'?page='.$next."&search=".$search."'> 下一页</a>";
                    echo "<a href='".$_SERVER['PHP_SELF'].'?page='.$Totalpage."&search=".$search."'> 尾页</a></p>";
                }
            }
            else//如果$total为空则输出No message
            {
                echo "<p style='text-align: center'>No message</p>";
            }
            ?>
        </div>
        <?php include "includes/right.php"?>
    </div>
</div>

<script>
    $(document).ready(function () {

    })
</script>
</body>
<?php include "includes/footer.html"; ?>
</html>