<?php
session_start();
require('sample_php/functions.php');


$pdo = connect_db();

$email = $_POST['email'];
$u_pw = $_POST['u_pw'];

$stmt = $pdo->prepare("SELECT * FROM user_master WHERE email = :email" );

$stmt->bindValue(':email', $email, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//execute→実行しますという関数。全てのデータが$statusに入る

//データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

//抽出データ数を取得
$val = $stmt->fetch();//1レコードだけ取得

//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['u_pw'], $val['u_pw'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["id"] = $val['id'];
    $_SESSION["u_name"] = $val['u_name'];
    
    if (isset($val['u_age'])) {
        $_SESSION["u_age"] = $val['u_age'];
    }
    if (isset($val['u_img'])) {
        $_SESSION["u_img"] = $val['u_img'];
    }
    header("Location: index.php");
    exit();
    $msg = 'ログインしました。';
    $link = '<a href="index.php">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login.php">戻る</a>';
}




?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>
