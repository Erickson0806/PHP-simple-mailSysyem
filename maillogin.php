<?php
header("Content-type: text/html; charset=utf-8");
    session_start();
    require "connect.inc.php";

    if($_GET["action"]=="login"){

        $username = $_POST["username"];
        $userpwd=   $_POST["password"];
        $query = "SELECT *FROM user WHERE username='{$username}' AND userpwd='{$userpwd}'";
        try{

            $pdostatement = $dbh->query($query);


            if($pdostatement->rowCount()>0){

                $row = $pdostatement->fetch();
                $_SESSION["username"]=$username;
                $_SESSION["userid"]=$row["id"];
                $_SESSION["islogin"]=1;
                header("Location:index.php");
            } else {
                echo '用户名或密码错误';
            }


        }catch (PDOException $e){
            echo "hehe";
            echo $e->getMessage();
        }



    }
?>
<html>
    <head><title>邮件系统登录</title></head>
    <body>
        <p>欢迎光临邮件系统</p>
        <p>SessionID:<?php echo session_id();?></p>
        <table width="300" border="0" align="center" cellspacing="0" cellpadding="5">
            <form action="maillogin.php?action=login" method="post">
                <tr>
                    <td width="30%" align="right">用户名：</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td width="30%" align="right">密码：</td>
                    <td><input type="password" name="password"></td>
                </tr>

                <tr>
                    <td colspan=2 align="center">
                        <input type="submit" value="登录">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </form>

        </table>
    </body>
</html>