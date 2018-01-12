<?php
setcookie('flavor2', 'chocloate chip');
setcookie('flavor1', 'choclate', '1417608000');

if(!isset($_COOKIE['flavor'])) {
    echo $_COOKIE['flavor'];
} else {
    setcookie('flavor1', 'aaaaaa');
}

setcookie('flavor1', '', 1);

//echo $_SERVER['PHP_AUTH_USER'];
//echo $_SERVER['PHP_AUTH_PW'];
if(!isset($_COOKIE['login'])) {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $cook = $_POST['username'] . $_POST['password'];
        setcookie('login', md5($cook));
        echo 'you have cookie';
    }
}

print_r(getallheaders());//读取头部信息

//header('Content-Type: application/json');
//http_response_code(400);//设置相应码
//header('Location: https://www.baidu.com');
//sleep(3);
//flush();
echo uniqid();
print_r(getenv('PATH'));
?>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<form action="" method="post">
    username <input type="text" name="username"> <br/>
    password <input type="password" name="password"> <br/>
    <input type="hidden" name="token" value="<?= md5(uniqid())?>">
    <input type="submit" value="Login">
</form>
</body>
</html>