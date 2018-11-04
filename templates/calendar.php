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

  <h1 class="title">テストカレンダー</h1>
  <p id="todate"></p>
  <a href="#"></a>
  <p class="show_year_month">
      <a href="http://localhost/calendar_work/templates/calendar.php?<?php echo $newCalendar->getUrlPrevMonth() ?>">前月</a>
      <?php echo $newCalendar->getYear(); ?>年<?php echo $newCalendar->getMonth(); ?>月
      <a href="http://localhost/calendar_work/templates/calendar.php?<?php echo $newCalendar->getUrlNextMonth() ?>">次月</a>
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
            echo "<td class=\"now_day\"><a href=\"#\">".$row[$i]."</a></td>";
        } elseif($row[$i] == " "){
            echo "<td> </td>";
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
