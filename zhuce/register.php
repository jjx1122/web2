<?php
$mysqli=new mysqli("localhost","root","12345678","db",3306);
if($mysqli->connect_errno){
    echo "连接数据库失败";
    return;
}
//print "成功连接到数据库";
$user = $_POST["username"];
$pass = $_POST["password"];
if($user==''||$pass==''){
    //echo "用户名密码不允许为空";
    echo '<script>alert("用户名密码不允许为空")</script>';
    echo '<script>location.href="register.html"</script>';
}
//sql语句
$sql_select =$mysqli->query("select user_id from user_login where user_id = '{$user}'") ;
//sql语句执行
$num=mysqli_fetch_assoc($sql_select);
if ($num) {
    //用户名已存在
    echo '<script>alert("用户名已存在")</script>';
    echo '<script>location.href="register.html"</script>';
    exit;
} else {
    //用户名不存在
    $sql_insert = "insert into user_login values('$user','$pass')";
    //插入数据
    $ret = mysqli_query($mysqli, $sql_insert);
//  $row = mysqli_fetch_assoc($ret);
    if($ret){
        echo '<script>alert("注册成功")</script>';
        echo '<script>location.href="../login/login.html"</script>';
    }
    else echo '<script>alert("注册失败")</script>';
}
$mysqli->close();//关闭数据库
?>