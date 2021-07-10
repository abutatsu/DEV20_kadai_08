<?php
//------------------------共通[START]------------------------

session_start();

//共通使用関数の読込
require('sample_php/functions.php');

// DB接続
$pdo = connect_db();

//トークンの作成
createToken();

//トークンの検証
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  validateToken();
}

//ヘッダーと左カラムにユーザー情報表示
list($msg,$link,$pName,$pAge,$pImg) =logincheckB();

//ページタイトル
$page_title = "ARSENAL TRANSFER LIST";
//ページサブタイトル
$page_subtitle = "移籍候補リスト";
//headerの読込
include('sample_php/_header.php');

//------------------------共通[END]------------------------

//２．データ登録SQL作成
//移籍リスト全選手
$stmt = $pdo->prepare(
  "SELECT * FROM player_master
  -- JOIN (SELECT T1.p_value,T1.p_id
  --   FROM value_table AS T1 
  --   INNER JOIN (
  --   SELECT p_id AS F1,MAX(v_date) AS F2
  --   FROM value_table GROUP BY p_id ) AS T2
  --   ON T2.F1=T1.p_id AND T2.F2=T1.v_date
  --   ORDER BY p_id
  --   )
  -- ON player_master.p_id = value_table.p_id
  WHERE p_status = '1'"
);
$status = $stmt->execute();

// 移籍金1位
$stmt_f = $pdo->prepare("SELECT * FROM player_master WHERE p_status = '1'  ORDER BY value desc LIMIT 1");
// $stmt_f = $pdo->prepare("SELECT * FROM player_master
//   INNER JOIN value_table
//   ON player_master.p_id = value_tabele.p_id
//   WHERE p_status = '1'  ORDER BY value desc LIMIT 1");

$status_f = $stmt_f->execute();
$result_f = $stmt_f->fetch(PDO::FETCH_ASSOC);

// 移籍金2位
$stmt_s = $pdo->prepare("SELECT * FROM player_master WHERE p_status = '1'  ORDER BY value desc LIMIT 1 , 1");
$status_s = $stmt_s->execute();
$result_s = $stmt_s->fetch(PDO::FETCH_ASSOC);
// 移籍金3位
$stmt_t = $pdo->prepare("SELECT * FROM player_master WHERE p_status = '1'  ORDER BY value desc LIMIT 2 , 1");
$status_t = $stmt_t->execute();
$result_t = $stmt_t->fetch(PDO::FETCH_ASSOC);

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= "<td>".$result["indate"]."</td>";
    $view .= "<td>".$result["name"]."</td>";
    $view .= "<td>".$result["country"]."</td>";
    $view .= "<td>".$result["birth"]."</td>";
    $view .= "<td>".$result["age"]."</td>";
    $view .= "<td>".$result["position"]."</td>";
    $view .= "<td>".$result["value"]."</td>";
    $view .= "<td>".$result["comment"]."</td>";
    $view .= "<td>";
    $view .= '<a class="iframe" href="trf_detail.php?id='.$result["p_id"].'">';
    $view .= '<i class="gg-database"></i>';
    $view .= '</a>';
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a href = "trf_delete.php?id='.$result["p_id"].'">';
    $view .= '<i class="gg-user-remove"></i>';
    $view .= '</a>';
    $view .= "</td>";
    $view .= "</tr>";
  }

}

//掲示板
$filename = 'sample_php/messages.txt';
$messages = file($filename,FILE_IGNORE_NEW_LINES);

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
      
        <?=include('news.php');?>
      
    </div>
    <div class="main">
    <!-- ランキング -->
      <div id="lankContainer">
        <h3>移籍候補市場価格ランキング</h3>
        <ul  style="list-style:none;padding-inline-start:initial">
          <!-- 1st -->
          <li>
            <div class="lank_player">
              <h2 style="color:gold">1st</h2>
              <img src="img/<?=$result_f['p_img']?>">
              <p><?=$result_f["value"]." "."万€"?></p>
              <p><?=$result_f["name"]?></p>
            </div>
          </li>
          <!-- 2nd -->
          <li>
            <div class="lank_player">
              <h2 style="color:#696969">2nd</h2>
              <img src="img/<?=$result_s['p_img']?>">
              <p><?=$result_s["value"]." "."万€"?></p>
              <p><?=$result_s["name"]?></p>
            </div>
          </li>
          <!-- 3rd -->
          <li>
            <div class="lank_player">
              <h2 style="color:#8b4513">3rd</h2>
              <img src="img/<?=$result_t['p_img']?>">
              <p><?=$result_t["value"]." "."万€"?></p>
              <p><?=$result_t["name"]?></p>
            </div>
          </li>
        </ul>
      </div>
    <div class="card-body">
      <table id="fav-table" class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">更新日</th>
            <th scope="col">名前</th>
            <th scope="col">国籍</th>
            <th scope="col" width="80">誕生日</th>
            <th scope="col" width="80">年齢</th>
            <th scope="col" width="125">ポジション</th>
            <th scope="col" width="145">交渉価格(万€)</th>
            <th scope="col">コメント</th>
            <th scope="col" width="65">更新</th>
            <th scope="col" width="65">削除</th>
          </tr>
        </thead>
      <tbody><?=$view?></tbody>
      </table>
    </div>



    <div class="boardContainer">
        <legend>掲示板</legend>
        <div class="board">
          <ul>
            <?php foreach ($messages as $message): ?>
              <li class="boardText"><img src="<?=$pImg?>" alt="">
              <?=$pName
              ."<span class='pipe'>"."|"."</span>"
              ."<span>".date("Y/m/d")."</span>"
              ."<br/>"
              ."<P>".h($message)."</p>";
              ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        
        <form class="boardForm" action="board.php" method="post">
          <?=$pName."さん"?>
          <textarea name="message" id="" cols="100" rows="5" placeholder="コメントを入力してください。"></textarea>
          <!-- <input type="text" name="message" autocomplete="off"> -->
          <button class="">投稿する</button>
          <input type="hidden" name="token" value="<?=h($_SESSION['token']); ?>">
        </form>
    </div>
  </div>
  </div>
</div>   

<!-- Main[End] -->

<!-- モーダルエリアここから -->

<div id="js-left-open__area" class="left-open__area">
<div id="js-left-open__area--main" class="left-open__area--main">
<?php
      include('trf_modal.php');
?>
 
</div>
<p id="js-left-open__btn--close" class="left-open__btn--close"></p>
</div>
<!-- モーダルエリアここまで -->

<!-- テーブルソート用->tablesorter使用 -->
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">

<!-- テーブルソート用 1,2,7はソートしない -->
<script>
$(function(){
// リストを非表示
$('#lankContainer ul li').hide();
// 繰り返し処理
$('#lankContainer ul li').each(function(i) {
// 遅延させてフェードイン
$(this).delay(500 * i).fadeIn(1000);
});
});

$(document).ready(function() {
    $('#fav-table').tablesorter({
            headers: {
              1: { sorter: false },
              2: { sorter: false },
              3: { sorter: false },
              7: { sorter: false },
              8: { sorter: false },
              9: { sorter: false }
            }
    });
});

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

$(function(){
    $.simpleTicker($('.ticker'),{'effectType':'slide'});
  });

</script>

</body>
</html>
