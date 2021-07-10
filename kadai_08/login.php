<?php
session_start();

//共通使用関数の読込
require('sample_php/functions.php');

//ヘッダーと左カラムにユーザー情報表示
list($msg,$link,$pName,$pAge,$pImg) =logincheckB();

//ページタイトル
$page_title = "ログインページ";
//ページサブタイトル
$page_subtitle = "ログイン";
//headerの読込
include('sample_php/_header.php');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page_title ?></title>
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/arsenal_logo.png">

    <style>
        div{padding: 10px;font-size:16px;}
    </style>
</head>

  <!-- Head[End] -->
<div id="main_contents">
  <div class="l_container">
    <form method="post" action="login_act.php" name="" onsubmit="return Check()">
      <div class="form-group">
      <fieldset style="margin:20px">
        <legend>ログイン</legend>
        <label>ID(email)：<input type="text" class="form-control" name="email" placeholder=""></label><br>
        <label>PW：<input type="password" class="form-control" name="u_pw" placeholder=""></label><br>
        <input type="submit" value="ログイン" class="btn btn-primary">
        <!-- <input type="hidden" name="token" value="<?=h($_SESSION['token']); ?>"> -->
        </fieldset>
      </div>
    </form>
    <a href="entry_php/entry.php">新規ユーザー登録</a>
  </div>
</div>