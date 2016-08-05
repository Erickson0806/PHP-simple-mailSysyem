<?php
    session_start();
    $username = $_SESSION["username"];
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),time()-42000,'/');
    }
    session_destroy();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>退出系统</title></head>
    <body>
        <p><?php echo $username?>再见！</p>
    <p><a href="maillogin.php">重新登录</a></p>
    </body>
</html>