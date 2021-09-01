<?php
$err = [];




if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
    $db = new PDO('mysql:host=localhost;dbname=sample', 'watanabe', 'root');
    $sql = 'insert into users(username, password) values(?, ?)';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($username, $password));
    $stmt = null;
    $db = null;
        
    header('Location: http://localhost:8888/kadai4.php');
    exit;
    }catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }  
}

if(!$username = filter_input(INPUT_POST, 'username')){
    $err[] = 'ユーザー名を記入してください';
}

$password = filter_input(INPUT_POST, 'password');
if(preg_match("\/A[a-z\d]{8.100}+\z/i",$password)){
    $err[] = 'パスワードは８文字以上１００文字以下にしてください。';
}

if(count($err) === 0){
    ///
}

?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="kadai4-2.css">
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>新規登録画面</title>

</head>
<body>
    <div class="box0">
        <h1>新規登録画面</h1>
    </div>

    <form action="" method="POST">
        <div class="box1">
        <label for="username" id="l-text1">ユーザー名</label>
            <input id="text1" type="text" name="username" value=""><br>
        </div>
        <div class="box1">
            <label for="password" id="l-text2">パスワード</label>
            <input id="text2" type="password" name="password" value=""><br>
        </div>
        
        <input class="btn1" type="submit" name="signin" value="新規登録">

    </form>
</body>
</html>