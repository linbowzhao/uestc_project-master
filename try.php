<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>list</title>
</head>

<body>
<form method="post">
    <textarea wrap="hard" cols="60" rows="5" name="comment"required></textarea>
    <button type="submit" class="btn btn-success">发布评论</button>
</form>
<?php
if(isset($_POST["comment"])){
    echo $_POST["comment"];
}
 ?>

</body>
</html>