<?php
//------------------------共通[START]------------------------

session_start();

//共通使用関数の読込
require('sample_php/functions.php');

// DB接続
$pdo = connect_db();

// トークンの作成
createToken();

// トークンの検証
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  validateToken();
}

//ヘッダーと左カラムにユーザー情報表示
list($msg,$link,$pName,$pAge,$pImg) =logincheckB();

//ページタイトル
$page_title = "ARSENAL MEMBER LIST";
//ページサブタイトル
$page_subtitle = "在籍メンバー";
//headerの読込
include('sample_php/_header.php');

//------------------------共通[END]------------------------

include('sample_php/_playerdata.php');

?>

  <!-- Main[Start] $view-->
<div id="main_contents">
  <div class="left_container">
    <div class="iconArea" style="background-image: url('img/icon_back.jpg')">
      <div class="user_icon">
        <img src="<?=$pImg?>" class="">
      </div>
      <p class="pName"><?=$pName."さん"?><br /><?=$pAge."歳"?></p>
      <form method="get" action="profile.php" name="">
        <input type='hidden' name="id" value="<?=$_SESSION['id']?>">
        <input type="submit" value="プロフィール">
      </form>
    </div>
    <div class="linkArea">
      <p>リンク</p>
      <a href="https://www.arsenal.com/">アーセナル公式</a>
      <a href="https://www.goal.com/jp/%E3%83%81%E3%83%BC%E3%83%A0/%E3%82%A2%E3%83%BC%E3%82%BB%E3%83%8A%E3%83%AB/4dsgumo7d4zupm2ugsvm4zm4d">
      Goal.com</a>
    </div>
  </div>
  
  <div class="right_container">
    <div class="subnav">
      <button id="js-left-open__btn" class="js-left-open__btn">プレーヤー登録</button>
      <!-- 更新情報 -->
      
        <?=include('news.php')?>
      
    </div>
    <div class="main">
      <!-- タブ・メニュー -->
      <ul class="nav nav-tabs">
        <li class="active"><a href="#sampleContentA" data-toggle="tab">GK</a></li>
        <li><a href="#sampleContentB" data-toggle="tab">DF</a></li>
        <li><a href="#sampleContentC" data-toggle="tab">MF</a></li>
        <li><a href="#sampleContentD" data-toggle="tab">FW</a></li>
      </ul>

<!-- タブ内容 -->
      <div class="tab-content">
        <div class="tab-pane fade in active" id="sampleContentA">
              <div class="card-body">
                <table id="fav-table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col" width="50">#</th>
                      <th scope="col">名前</th>
                      <th scope="col">国籍</th>
                      <th scope="col" width="100">誕生日</th>
                      <th scope="col" width="100">年齢</th>
                      <th scope="col" width="150">ポジション</th>
                      <th scope="col" width="150">推定市場価格</th>
                      <th scope="col">コメント</th>
                      <th scope="col" width="70">更新</th>
                      <th scope="col" width="70">削除</th>
                    </tr>
                  </thead>
                <tbody><?=$view?></tbody>
                </table>
              </div>
        </div>
        <div class="tab-pane fade" id="sampleContentB">
              <div class="card-body">
                <table id="fav-table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col" width="50">#</th>
                      <th scope="col">名前</th>
                      <th scope="col">国籍</th>
                      <th scope="col" width="100">誕生日</th>
                      <th scope="col" width="100">年齢</th>
                      <th scope="col" width="150">ポジション</th>
                      <th scope="col" width="150">推定市場価格</th>
                      <th scope="col">コメント</th>
                      <th scope="col" width="70">更新</th>
                      <th scope="col" width="70">削除</th>
                    </tr>
                  </thead>
                <tbody><?=$view_df?></tbody>
                </table>
              </div>
        </div>
        <div class="tab-pane fade" id="sampleContentC">
              <div class="card-body">
                <table id="fav-table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col" width="50">#</th>
                      <th scope="col">名前</th>
                      <th scope="col">国籍</th>
                      <th scope="col" width="100">誕生日</th>
                      <th scope="col" width="100">年齢</th>
                      <th scope="col" width="150">ポジション</th>
                      <th scope="col" width="150">推定市場価格</th>
                      <th scope="col">コメント</th>
                      <th scope="col" width="70">更新</th>
                      <th scope="col" width="70">削除</th>
                    </tr>
                  </thead>
                <tbody><?=$view_mf?></tbody>
                </table>
              </div>
        </div>
        <div class="tab-pane fade" id="sampleContentD">
              <div class="card-body">
                <table id="fav-table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col" width="50">#</th>
                      <th scope="col">名前</th>
                      <th scope="col">国籍</th>
                      <th scope="col" width="100">誕生日</th>
                      <th scope="col" width="100">年齢</th>
                      <th scope="col" width="150">ポジション</th>
                      <th scope="col" width="150">推定市場価格</th>
                      <th scope="col">コメント</th>
                      <th scope="col" width="70">更新</th>
                      <th scope="col" width="70">削除</th>
                    </tr>
                  </thead>
                <tbody><?=$view_fw?></tbody>
                </table>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Main[End] -->

  <!-- モーダルエリアここから -->

<div id="js-left-open__area" class="left-open__area">
<div id="js-left-open__area--main" class="left-open__area--main">
<?php
      include('index_modal.php');
?>
 
</div>
<p id="js-left-open__btn--close" class="left-open__btn--close"></p>
</div>

<!-- モーダルエリアここまで -->

  <script>

  $(function(){
 
  var scrollPosition;
 
  $('#js-left-open__btn').on('click touched', function(){
    scrollPosition = $(window).scrollTop();
    $('body').addClass('_fixed').css({'top': -scrollPosition});
    $('#js-left-open__area').fadeIn(100);
    $('#js-left-open__area--main').animate({'marginLeft':'400px'},300);
    setTimeout(function(){
      $('#js-left-open__btn--close').fadeIn(100);
    },400);
  });
 
  $('#js-left-open__area').on('click touched', function(){
    $('body').removeClass('_fixed').css({'top': 0});
    window.scrollTo( 0 , scrollPosition );
    $('#js-left-open__btn--close').fadeOut(100);
    setTimeout(function(){
    $('#js-left-open__area--main').animate({'marginLeft':'-400px'},300);
    },200);
    setTimeout(function(){
      $('#js-left-open__area').fadeOut(100);
    },400);
  });
 
  $('#js-left-open__area--main').on('click', function (e) {
    e.stopPropagation();
  });
 
});

  //フォームへの入力チェック
      function Check(){
      if (
        document.member_form.number.value == "" ||
        document.member_form.name.value == "" ||
        document.member_form.country.value == "" ||
        document.member_form.birth.value == "" ||
        document.member_form.value.value == "" ||
        document.member_form.position.value == "" 
      ){
      alert("未入力項目があります");
      return false;
      }
      return true;
      };
  
  $(function(){
    $.simpleTicker($('.ticker'),{'effectType':'slide'});
  });

  </script>

  </body>
</html>
