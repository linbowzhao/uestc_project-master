<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <title>website</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php include "includes/nav.html"?>
<img src="image/banner.gif" alt="banner" id="banner">
<div id="introduce">
    <p><h3>团队历史</h3><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;菁华自招团队成立于2015年，后更名为菁华成长，由电子科大2014级，2015级和2016 级各大院学生组成。
        由于家长和同学们的反响很好，且得到了在校老师的认同和支持， 决定于2016年转为创业团队。2015年末，
        张昀燊老师与团队共同商议，改进了团队结构，服务方式，并获得了创业实践资助。在2016年的自主招生培
        训中，我们再创佳绩，得到校团委创新创业中心刘刚老师的指导支持，再次获得创业实践资助。为提供更好
        的自招服务，于2017年伊始，我们注册成立了“四川菁华成长教育科技有限公司”，以服务更多学子，为我
        校吸收更多人才。</p>

    <p><h3>培训团队</h3><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;对于学生的自主招生培训，我们是绝不敢有丝毫的马虎。我们都是找年级上的顶尖高手来做笔试辅导，其中
        不乏年级第一的国奖大神，物理学霸和数学学霸，为同学带去更专业的培训和讲解。对于面试培训，我们请
        的都是有丰富面试经验的同学，与腾讯等大公司HR都有接触。在资料准备上，我们尽心准备资料和教案，只
        是为了不辜负信任我们的学员和家长。今年，我们在去年的经验基础上又做了总结改进，我们的决心是做一
        年胜过一年的服务！这就是我们团队的态度!</p>

    <p><h3>成果数据</h3><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;接下来就要说到家长们最关心的部分了，上面说了那么多，估计家长们该问了，“你们 一群大学生组成的团
        队，这自主招生培训效果怎么样啊？”，咱们先拿事实说话：2015年，我们成立了电子科大自招QQ群，群成员
        高峰时期达150人。参与了团队培训的有50人，其中80%以上的学员面试成绩超过了80分，5人超过90分，最终
        有23人拿到了自招优惠，学员中有山东自招第一名。2016年，有了第一年的经验，QQ群内成员成倍增长，我们
        再接再厉，继续扩大规模和改进服务，并得到电子科大官方认可。同时我们有了自己的微信公众平台，用于福利
        性的历年真题等资料发放，超过300人从中受益。据不完全统计，直接或间接参加我们菁华自招培训的来自全国各
        地的学员共55人，综合通过率高达54%，其中面试培训效果更佳，均在75分以上，有过半数的学生分数在85以上，
        其中又有过半数的学生获得90+的高分。整个培训下来也得到了家长们的一致认可，参加过我们培训的学生家长对
        我们都是满满的好评。
    </p>
</div>
<div id="picture">
    <input id="sub1" type="image" src="image/before.png">
    <ul>
        <li style="display:block"><img src="image/picture1.png" alt="我们的图片"></li>
        <li><img src="image/picture2.png" alt="我们的图片"></li>
        <li><img src="image/picture3.png" alt="我们的图片"></li>
        <li><img src="image/picture4.png" alt="我们的图片"></li>
        <li><img src="image/picture5.png" alt="我们的图片"></li>
    </ul>
    <input id="sub2" type="image" src="image/next.png">
</div>
<script>
    /*轮播*/
    $(function(){
        var i=0;
        var len=$("#picture ul li").length-1;
        $("#sub1").click(function(){
            if(i==len){
                i=-1;
            }
            i++;
            $("#picture ul li").eq(i).fadeIn().siblings().hide();//除了选中元素的元素，其它兄弟元素都hide()；
        });
//到这里分开！上面的是上一张点击的效果代码，下面的是下一张点击的效果代码．
        $("#sub2").click(function(){//获取类名的点击事件．
            if(i==0){
                i=len+1;
            }
            i--;
            $("#picture ul li").eq(i).fadeIn().siblings().hide();
        });
    });
    function click(){
        setTimeout(function () {
            $('#sub2').click();
            console.log('1');
            click();
        },3000);
    }//自动轮播
    click();
    /*轮播*/
</script>
</body>
<?php include "includes/footer.html"; ?>
</html>