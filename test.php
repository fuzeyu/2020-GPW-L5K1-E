<html>
<head>
<meta charset="utf-8">
<title>a</title>
</head>
<body>
 
<form action="logintext.php" method="post">
<tr>username: <input type="text" name="uname"></tr>
<tr>password: <input type="text" name="password"></tr>
<input type="submit" value="submit">
<tr> 
    <td colspan="2" align="center" style="color:red;font-size:10px;"> 

        <?php
            $err = isset($_GET["err"]) ? $_GET["err"] : "";
            switch ($err) {
            case 1:echo "用户名或密码错误！";break;
            case 2:echo "用户名或密码不能为空！";break;
            case 3:echo "连接服务器失败!";break;
        } ?>
    </td> 
</tr>
</form>
 
</body>
</html>