<div class="col-md-5"><!--热门推荐和精选内容-->
    <div id="container1"><!--热门推荐从这里开始-->
        <h3>热门推荐</h3>
        <?php
        $sql = "select * from passage WHERE TO_DAYS(NOW()) - TO_DAYS(time) <= 100 order by look desc limit 3";//查询出三天内浏览量最多的文章
        $rs = mysqli_query($sql);
        $contents = mysqli_fetch_array($rs);
        do{
            $title=$contents['title'];
            $time=$contents['time'];
            $pid=$contents['pid'];
            ?>
            <p><a href="passage.php?pid=<?php echo $pid;?>"><?php echo $title;?></a></p><!--这是标题-->
            <p><?php echo $time;?></p><!--这是日期-->
            <hr>
            <?php
        }while($contents = mysqli_fetch_array($rs))
        ?>
    </div>
    <div id="container2">
        <h3>精选内容</h3>
        <?php
        $sql = "select * from passage WHERE importance=1 order by time desc limit 3";//最新加精的文章
        $rs = mysqli_query($sql);
        $contents = mysqli_fetch_array($rs);
        do{
            $title=$contents['title'];
            $time=$contents['time'];
            $pid=$contents['pid'];
            ?>
            <p><a href="passage.php?pid=<?php echo $pid;?>"><?php echo $title;?></a></p><!--这是标题-->
            <p><?php echo $time;?></p><!--这是时间-->
            <hr>
            <?php
        }while($contents = mysqli_fetch_array($rs))
        ?>
    </div>
</div>