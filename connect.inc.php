<?php
    try{
        $dbh = new PDO('mysql:dbname=news;host=localhost','root','root');
    }catch(PDOException $e){
        echo '数据库连接失败：'.$e->getMessage();
        exit;
    }
?>