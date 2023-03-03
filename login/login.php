<?php
    $db = mysqli_connect('localhost:3306','root','12345678','db');
		if (!$db) { 
		 die('Could not connect:' . mysqli_error()); 
		} 
		echo 'Connected successfully <br/>';
        $username=$_POST["username"];
        $password=$_POST["password"];
        //查询数据库中的用户名密码
        $sql=$db->query("select user_id user_pass from user_login where user_id='{$username}'and user_pass='$password'");
        $row=mysqli_fetch_assoc($sql);
        if($username==''||$password==''){
        //echo "用户名密码不允许为空";
        echo '<script>alert("用户名密码不允许为空")</script>';
        echo '<script>location.href="login.html"</script>';
        }
        else if(!$row){
            echo '<script>alert("该用户不存在")</script>';
            echo '<script>location.href="login.html"</script>';
        }
        else {
            echo '<script>alert("登录成功")</script>';
            echo '<script>location.href="../index.html"</script>';
        }
//		mysqli_query($db,'set names utf8');
//		echo "$username <br>";
//		echo "$password <br>";
//		$sql="select* from 'user_login' ";
//		$result=mysqli_query($db,$sql);
//		if(!$result){
//		        echo "请确认信息完整性";
//		    }else if($result){
//		        echo "登录成功";
//		    }
	mysqli_close($db);

?>