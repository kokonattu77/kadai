<?php

$err_msg = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        $db = new PDO('mysql:host=localhost;dbname=sample', 'watanabe', 'root');
        $sql = 'select count(*) from users where username=? and password=?';
        $stmt = $db->prepare($sql);
        $stmt->execute(array($username, $password));
        $result = $stmt->fetch();
        $stmt = null;
        $db = null;
        
        
        if($result[0] != 0) {
            header('Location: http:/kadai4-3.php');
            exit;
        }else {
            $err_msg = "ユーザー名またはパスワード宇が違います。";
        }
    }catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }  
}



?>





<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="kadai4.css">

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>ログイン画面</title>
</head>
<body>
    <div class="box0">
    <h1>ログイン画面</h1>
    </div>

    <form action="" method="POST">

        

        <div class="box1">
        <label for="text1" id="l_text1">ユーザー名</label>
            <input id="text1" type="text" name="username" value=""><br>
        </div>
        <div class="box1">
            <label for="text2" id="l_text2">パスワード</label>
            <input id="text2" type="password" name="password" value=""><br>
        </div>
        
        <input class="btn1" type="submit" name="login" value="ログイン">
        
    </form>
    <p>
    <a href="kadai4-2.php">アカウント作成</a>
    </p>
    <div class="box0">
        <?php 
            if ($err_msg !== null && $err_msg !== '') {echo $err_msg . "<br>";} 
        ?>

    </div>
    
</body>
</html>