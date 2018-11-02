<?php
class CalendarObj{

  private $year;  //年
  private $month; //月

  //コンストラクタ。インスタンス生成時の初期値用
  public function __construct($y,$m){
    $this->year = $y;
    $this->month = $m;
  }

  //カレンダーの行を作る
  public function createRows(){
    //月の最終日を$lastDayにセット
    $lastDay = date("j", mktime(0, 0, 0, $this->month + 1, 0, $this->year));
    $rows = array();
    $row = self::initRow();    //最初に日付部分の土台

    //1ヶ月分の日付ループ
    for($i = 1; $i <= $lastDay; $i++){
      //$iの数だけ曜日（のindex0～6）を$dateにセット
      $date = date("w", mktime(0, 0, 0, $this->month, $i, $this->year));
      $row[$date] = $i;

      //土曜日もしくは月の最終日の場合
      if($date == 6 || $i == $lastDay){
        //$rowsに$rowをセット
        $rows []= $row;
        //$rowsに$row一行を加えたらinitRow()で初期化する
        $row = self::initRow();
      }
    }
    return $rows; //最終日まで追加された配列$rowsを返す
  }

  //年月表示用
  public function getInfo(){
    return $this->year."年".$this->month."月";
  }

  //日付の入らない空白部分を埋める（日付部分の土台）
  private static function initRow(){
    $emptyArray = array();
    for($i = 0; $i <= 6; $i++){
      $emptyArray[] = "　";
    }
    return $emptyArray;
  }

}

$year = date("Y");   //年
$month = date("n");  //月
$newCalendar = new CalendarObj($year,$month);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>カレンダー＊テスト</title>
  <meta name="description" content="試作したカレンダー">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>

  <p>テストカレンダー</p>
  <p id="todate"></p>
  <!-- <p><?php echo $newCalendar->getInfo(); ?></p> -->

  <table class="calendar_table">
    <tr>
      <th>日</th>
      <th>月</th>
      <th>火</th>
      <th>水</th>
      <th>木</th>
      <th>金</th>
      <th>土</th>
    </tr>

    <?php
      foreach ($newCalendar->createRows() as $row){
        echo "<tr>";
        for($i = 0; $i <= 6; $i++){
          if($i == $newCalendar->getInfo()){
            echo "<td class=\"now_day\"><a href=\"#\">".$row[$i]."</a></td>";
          } else {
            echo "<td><a href=\"#\">".$row[$i]."</a></td>";
          }
        }
        echo "</tr>";
      }
    ?>

  </table>



  <script type="text/javascript" src="../js/calendar.js"></script>
</body>
</html>
