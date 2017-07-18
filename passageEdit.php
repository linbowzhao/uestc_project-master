<?php include "includes/nav.html";
include "includes/cnn.php";
?>
<div style="clear:both;"></div>
<div class="container" >
    <div class="row">
        <div class="col-md-7">
            <form action="passageEdit.php" method="post">
                <input type="text" class="form-control" id="editTitle" name="editTitle" placeholder="请输入标题"  maxlength="20" required>
                <div style="display:flex;justify-content: center">
                <textarea wrap="soft" id="editContents" name="editContents" placeholder="请输入内容" maxlength="3000" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">提交</button>
            </form>
            <?php
            if(isset($_POST["editContents"])&&isset($_POST["editTitle"])) {
                $contents = $_POST["editContents"];
                $title=$_POST["editTitle"];
                $rule='/(\')+(.)*(\-\-)+/ix';
                $checkTitle=preg_match($rule,$title);
                $checkContents=preg_match($rule,$contents);
                if($checkContents||$checkTitle){
                    echo "<script language=\"JavaScript\">alert(\"含有非法字符\");</script>";
                }else{
                    $sql = "INSERT INTO passage (title,passage) VALUES ('".$title."','".$contents."');";
                    $rs = mysql_query($sql);
                    $sql2="SELECT * FROM passage WHERE title='".$title."' ORDER BY time DESC LIMIT 1";
                    $con=mysql_fetch_array(mysql_query($sql2));
                    $pid=$con['pid'];
                    echo $pid;
                    if ($rs) {
                        echo "<script language=\"JavaScript\">alert(\"发布成功\");</script>";
                        echo "<script>window.location =\"passage.php?pid=$pid\"</script>";
                    } else {
                        echo "<script language=\"JavaScript\">alert(\"发布失败\");</script>";
                    }
                }
            }//把文章输入到数据库
            ?>
        </div>
        <?php include"includes/right.php"?>
    </div>
</div>
<?php include "includes/footer.html"; ?>