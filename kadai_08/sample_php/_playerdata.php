<?php

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM player_master WHERE position = 'GK' AND p_status = '0' ORDER BY value desc");
$status = $stmt->execute();
$stmt_df = $pdo->prepare("SELECT * FROM player_master WHERE position = 'DF' AND p_status = '0'  ORDER BY value desc");
$status_df = $stmt_df->execute();
$stmt_mf = $pdo->prepare("SELECT * FROM player_master WHERE position = 'MF' AND p_status = '0'  ORDER BY value desc");
$status_mf = $stmt_mf->execute();
$stmt_fw = $pdo->prepare("SELECT * FROM player_master WHERE position = 'FW' AND p_status = '0'  ORDER BY value desc");
$status_fw = $stmt_fw->execute();

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
    $view .= "<td style='font-weight:bold;'>".$result["number"]."</th>";
    $view .= "<td>".$result["name"]."</td>";
    $view .= "<td>".$result["country"]."</td>";
    $view .= "<td>".$result["birth"]."</td>";
    $view .= "<td>".$result["age"]."</td>";
    $view .= "<td>".$result["position"]."</td>";
    $view .= "<td>".$result["value"]."</td>";
    $view .= "<td>".$result["comment"]."</td>";
    $view .= "<td>";
    $view .= '<a class="iframe" href="mem_detail.php?id='.$result["p_id"].'">';
    $view .= '<i class="gg-database"></i>';
    $view .= '</a>';
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a href = "mem_delete.php?id='.$result["p_id"].'">';
    $view .= '<i class="gg-user-remove"></i>';
    $view .= '</a>';
    $view .= "</td>";
    $view .= "</tr>";
  }
}

$view_df="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt_df->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt_df->fetch(PDO::FETCH_ASSOC)){
    $view_df .= "<tr>";
    $view_df .= "<td style='font-weight:bold;'>".$result["number"]."</th>";
    $view_df .= "<td>".$result["name"]."</td>";
    $view_df .= "<td>".$result["country"]."</td>";
    $view_df .= "<td>".$result["birth"]."</td>";
    $view_df .= "<td>".$result["age"]."</td>";
    $view_df .= "<td>".$result["position"]."</td>";
    $view_df .= "<td>".$result["value"]."</td>";
    $view_df .= "<td>".$result["comment"]."</td>";
    $view_df .= "<td>";
    $view_df .= '<a class="iframe" href="mem_detail.php?id='.$result["p_id"].'">';
    $view_df .= '<i class="gg-database"></i>';
    $view_df .= '</a>';
    $view_df .= "</td>";
    $view_df .= "<td>";
    $view_df .= '<a href = "mem_delete.php?id='.$result["p_id"].'">';
    $view_df .= '<i class="gg-user-remove"></i>';
    $view_df .= '</a>';
    $view_df .= "</td>";
    $view_df .= "</tr>";
  }
}

$view_mf="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt_mf->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt_mf->fetch(PDO::FETCH_ASSOC)){
    $view_mf .= "<tr>";
    $view_mf .= "<td style='font-weight:bold;'>".$result["number"]."</th>";
    $view_mf .= "<td>".$result["name"]."</td>";
    $view_mf .= "<td>".$result["country"]."</td>";
    $view_mf .= "<td>".$result["birth"]."</td>";
    $view_mf .= "<td>".$result["age"]."</td>";
    $view_mf .= "<td>".$result["position"]."</td>";
    $view_mf .= "<td>".$result["value"]."</td>";
    $view_mf .= "<td>".$result["comment"]."</td>";
    $view_mf .= "<td>";
    $view_mf .= '<a class="iframe" href="mem_detail.php?id='.$result["p_id"].'">';
    $view_mf .= '<i class="gg-database"></i>';
    $view_mf .= '</a>';
    $view_mf .= "</td>";
    $view_mf .= "<td>";
    $view_mf .= '<a href = "mem_delete.php?id='.$result["p_id"].'">';
    $view_mf .= '<i class="gg-user-remove"></i>';
    $view_mf .= '</a>';
    $view_mf .= "</td>";
    $view_mf .= "</tr>";
  }
}

$view_fw="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt_fw->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt_fw->fetch(PDO::FETCH_ASSOC)){
    $view_fw .= "<tr>";
    $view_fw .= "<td style='font-weight:bold;'>".$result["number"]."</th>";
    $view_fw .= "<td>".$result["name"]."</td>";
    $view_fw .= "<td>".$result["country"]."</td>";
    $view_fw .= "<td>".$result["birth"]."</td>";
    $view_fw .= "<td>".$result["age"]."</td>";
    $view_fw .= "<td>".$result["position"]."</td>";
    $view_fw .= "<td>".$result["value"]."</td>";
    $view_fw .= "<td>".$result["comment"]."</td>";
    $view_fw .= "<td>";
    $view_fw .= '<a class="iframe" href="mem_detail.php?id='.$result["p_id"].'">';
    $view_fw .= '<i class="gg-database"></i>';
    $view_fw .= '</a>';
    $view_fw .= "</td>";
    $view_fw .= "<td>";
    $view_fw .= '<a href = "mem_delete.php?id='.$result["p_id"].'">';
    $view_fw .= '<i class="gg-user-remove"></i>';
    $view_fw .= '</a>';
    $view_fw .= "</td>";
    $view_fw .= "</tr>";
  }
}