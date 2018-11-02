<?php
$now = time();
$year = date("Y", $now);
$month = date("n", $now);
$day = date("j", $now);
if ($_POST['year']) {
  if ($year != $_POST['year'] || $month != $_POST['month']) {
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = 0;
    $now = mktime(0, 0, 0, $month, 1, $year);
  }
}
$dnum = date("t", $now);
?>



<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
  <title>カレンダー</title>
  </head>
  <body>
  <form method="post" action="calendar2.php">
  <select name="year" onChange="submit()">
  <?php
  for ($i = $year - 5; $i <= $year + 5; $i++) {
    print "<option";
    if ($i == $year) print " selected";
    print ">$i</option>\n";
  }
  ?>
  </select>年
  <select name="month" onChange="submit()">
  <?php
  for ($i = 1; $i <= 12; $i++) {
    print "<option";
    if ($i == $month) print " selected";
    print ">$i</option>\n";
  }
  ?>
  </select>月
  </form>
  <?php
  $wstr = array('日', '月', '火', '水', '木', '金', '土');
  for ($i = 1; $i <= $dnum; $i++) {
    $t = mktime(0, 0, 0, $month, $i, $year);
    $w = date("w", $t);
    if ($i == $day) print "<strong>";
    if ($w == 0) print "<font color='red'>";
    print date("Y年m月d日", $t);
    print "(" . $wstr[$w] . ")";
    if ($w == 0) print "</font>";
    if ($i == $day) print "</strong>";
    print "<br>\n";
  }
  ?>
  </body>
</html>
