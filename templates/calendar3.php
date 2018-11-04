<?php
function calendar($year, $month) {

    $wtop = date("w", mktime(0,0,0,$month,1,$year));//月の初めの曜日の確認
    $today = date("j");

    //１日まで空白で埋める
    if($wtop > 0){
        for($i = 0; $i < $wtop; $i++){
            //点の入力 点の位置は中央にする
            echo "<td> </td>";
        }
    }

    //月の日数の確認
    $dend = date("t",mktime(0,0,0,$month,1,$year));

    //曜日の始めを代入
    //$w;現在の曜日
    $w = $wtop;

    for($i = 1; $i <= $dend; $i++){ //１日から月末まで出力
        if($i == $today){
            echo "<td><font color=\"green\">$i</td>";
        }else if($w == 0){//日曜
            echo "</tr><tr>";//改行
            echo "<td><font color=\"red\">$i</td>";
        }else if($w == 6){//土曜
            echo "<td><font color=\"blue\">$i</td>";
        //平日
        }else{
            echo"<td>$i</td>";
        }
        //次の曜日にする
        $w++;
        $w %=7;//日曜になったらリセットする

        if($i ==$today){
        echo "<td><font color=\"green\">$i</td>";
        }
    }//for文の終了


    //最終日の次の日が日曜日なら終了
    if($w == 0)return;


    //残りのマスを空白でうめる
    for($i = $w; $i < 7; $i++){
        echo "<td> </td>";
    }



}

?>

<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>カレンダー</TITLE>
</HEAD>
<BODY>

カレンダーの作成<br>

<!-- テーブルの作成 -->
<TABLE BORDER>
<tr align="center">
<!-- 曜日の書き出し -->
<td><font color="red">日</font></td>
<td>月</td>
<td>火</td>
<td>水</td>
<td>木</td>
<td>金</td>
<td><font color="blue">土</font></td>
</tr>
<tr align="right">
<?php
$year = date("Y");
$month = date("m");
//カレンダー用の関数の呼び出し
calendar($year, $month);
?>
</tr>

</TABLE>


</BODY>
</HTML>
