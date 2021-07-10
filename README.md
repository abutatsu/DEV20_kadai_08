
# 課題0８
「アーセナル移籍情報登録(改良版)2」

## 課題内容（どんな作品か）
 - サッカーチーム「アーセナル」へ移籍する可能性のある選手を登録する

## 工夫した点・こだわった点
 - 新規ユーザー登録機能追加  
　└password_hash()関数を使用してパスワードの暗号化  
　└password_verify()関数を使用して暗号化したパスワードの認証  
　└パスワードのフォームを「input type="password"」に変更して入力した文字が見えないようにした  
 ![localhost_kadai_08_entry_php_entry php](https://user-images.githubusercontent.com/83898546/125147603-56425180-e167-11eb-8e9e-c4a277a1ce4e.png)
 - データベースを組み直し正規化
 - プレーヤー情報を一つにまとめ`p_status`で`0=現メンバー``1=移籍候補`とした
  └SELECT WHEREで表示を分ける。 
 - ER図挑戦！
 ![drawSQL-export-2021-07-10_09_58](https://user-images.githubusercontent.com/83898546/125147787-89d1ab80-e168-11eb-9518-63757e627699.png)

 - 在籍メンバーをポジションごとにタブ切り替えする仕様に変更
 - 移籍候補リストのページに市場価格上位3名を順番にフェードインさせて表示  
  └`ORDER BY`で市場価格順にソートしなおかつ`LIMIT`で順位を指定

## 質問・疑問・残課題
 - 本番環境で在籍メンバーのポジションtabの切り替えが動かず...
 - DBの`player_masterテーブル`に`value_table`の最新日付の選手(`p_id`)ごとの市場価格(`p_value`)を結合して表示させたかったが上手くいかず、、
 ```
 "SELECT * FROM player_master
  JOIN (SELECT T1.p_value,T1.p_id
    FROM value_table AS T1 
    INNER JOIN (
    SELECT p_id AS F1,MAX(v_date) AS F2
    FROM value_table GROUP BY p_id ) AS T2
    ON T2.F1=T1.p_id AND T2.F2=T1.v_date
    ORDER BY p_id
    )
  ON player_master.p_id = value_table.p_id
  WHERE p_status = '1'"
  ```
 - `_playerdata.php`ファイル→ポジションごとにデータを`fetch`し同じコードを繰り返すことに  
  →簡略化の方法があれば知りたいです

```
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
```
 
## その他（感想、シェアしたいことなんでも）
今週は_docker_と_DBの正規化_と_ER図の書き方_に多くの時間を割きましたがなかなか理解するのに苦しみました。  
データベースの組み直しの大変さや、本番環境で上手く表示されないことなどを身をもって体験できたのは良かったです。  
どこかのタイミングでdockerを使用してデプロイを試してみたいです。

## 課題のイメージ
![localhost_kadai_08_index php](https://user-images.githubusercontent.com/83898546/125147814-b5ed2c80-e168-11eb-9ba1-3a8183eec451.png)
![localhost_kadai_08_transfer php](https://user-images.githubusercontent.com/83898546/125147817-b8e81d00-e168-11eb-8767-44411c86fd11.png)



