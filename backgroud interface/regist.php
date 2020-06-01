<html>
<head>
<meta charset="utf-8">
<title>a</title>
</head>
<body>
 
<form action="registtext.php" method="post">
<tr>username: <input type="text" name="uname"></tr></br>
<tr>password: <input type="password" name="password"></tr></br>
<tr>re_password:<input type="password" id="re_password" name="re_password" required="required"> </tr></br>
<tr>truthName: <input type="text" name="truthName"></tr></br>
<tr>gender: 
    <select id="gender">
        <option value="boy">男孩</option>
        <option value="girl">女孩</option>
    </select>
</tr></br>
<tr>age: <input type="text" name="age"></tr></br>
<tr>IDcard: <input type="text" name="IDcard"></tr></br>
<tr>phone: <input type="tel" name="phone" autocomplete="off" maxlength="11" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9]/g,'')"/></tr></br>
<tr><input type="submit" value="submit"></tr></br>
<tr> <td colspan="2" align="center" style="color:red;font-size:10px;"> <!--提示信息--> 
<?php
$err = isset($_GET["err"]) ? $_GET["err"] : "";
switch ($err) 
{
    case 1:
        echo "用户名已存在";
        break;

    case 2:
        echo "密码与重复密码不一致！";
        break;

    case 3:
        echo "注册成功！";
        break;
}
?> 
</td> </tr>
</form>
</body>
</html>