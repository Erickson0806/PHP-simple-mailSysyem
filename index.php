<?php
    session_start();
    if($_SESSION["islogin"]){
        require "connect.inc.php";
        echo "<p>当前用户：<b>".$_SESSION["username"]."</b>&nbsp;";
        echo "<a href='maillogout.php'>退出</a></p>";
    }else {
        header("Location:maillogin.php");
        exit;
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>邮件系统</title></head>
    <body>
        <?php
            $userid=$_SESSION["userid"];
            $pdostatement = $dbh->query("SELECT *FROM mail WHERE uid='{$userid}'");
            $mail_num = $pdostatement->rowCount();
            $mails = array();
            while($row=$pdostatement->fetch()){
                $mails[]=$row;
            }
        ?>
    <p>你的邮箱中<b><?php echo $mail_num;?></b>封邮件</p>
    <table border="0" cellspacing="0" cellpadding="0" width="380">
        <tr><th>编号</th><th>邮件标题</th><th>接收时间</th></tr>
        <?php
        foreach ($mails as $mail) {
            echo '<tr align="center">';
            echo '<td>'.$mail["id"].'</td>';
            echo '<td>'.$mail["mailtitle"].'</td>';
            echo '<td>'.date("Y-m-d H:i:s",$mail["maildt"]).'</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </body>
</html>