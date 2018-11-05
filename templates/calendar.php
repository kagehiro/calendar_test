<?php
require(__DIR__."/system.php");
//インスタンスを立てる
$newCalendar = new CalendarObj();

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

  <p class="show_year_month">
      <a href="http://localhost/calendar_work/templates/calendar.php?<?php echo $newCalendar->getUrlPrevMonth() ?>">&lt;&lt;前月</a>
      <span>
        <?php echo $newCalendar->getYear(); ?>年
        <?php echo $newCalendar->getMonth(); ?>月
      </span>
      <a href="http://localhost/calendar_work/templates/calendar.php?<?php echo $newCalendar->getUrlNextMonth() ?>">次月&gt;&gt;</a>
  </p>

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
    $today = date("j");
    $thisYear = $newCalendar->getYear();
    $thisMonth = $newCalendar->getMonth();

      foreach ($newCalendar->createRows() as $row){
        echo "<tr>";
        for($i = 0; $i <= 6; $i++){
          if($row[$i] == $today && $thisYear == date("Y") && $thisMonth == date("m")){
            echo "<td><a class=\"modal_btn\"><span class=\"now_day\">".$row[$i]."</span></a></td>";
        } elseif($row[$i] == " "){
            echo "<td> </td>";
        } else {
            echo "<td><a class=\"modal_btn\"><span>".$row[$i]."</span></a></td>";
          }
        }
        echo "</tr>";
      }
    ?>

  </table>
  <p class="todate_box">
    今日：<span id="todate"></span>
  </p>

  <div class="overlay" id="overlay"></div>
  <div class="modal" id="modal">
    <a class="close_btn"></a>
    <span class="modal_date">
      <?php echo $newCalendar->getYear(); ?>年
      <?php echo $newCalendar->getMonth(); ?>月
      <?php echo $newCalendar->getDay(); ?>日
    </span>
    <textarea class="modal_text" name="memo_area" placeholder="ここに予定を書く"></textarea>
  </div>




  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/calendar.js"></script>
</body>
</html>
