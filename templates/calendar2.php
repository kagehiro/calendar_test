<?php

/* $_GETを展開 */
$py = filter_input(INPUT_GET, 'y');
$pm = filter_input(INPUT_GET, 'm');

/* 3ヵ月分のタイムスタンプを生成する */
try {
    $dt      = new DateTimeImmutable("$py-$pm-1 00:00:00");
    $dt_prev = $dt->sub(new DateInterval('P1M'));
    $dt_next = $dt->add(new DateInterval('P1M'));
} catch (Exception $e) {
    // 失敗したときは今月を基準にする
    $dt      = new DateTimeImmutable('first day of this month 00:00:00');
    $dt_prev = $dt->sub(new DateInterval('P1M'));
    $dt_next = $dt->add(new DateInterval('P1M'));
}

/* リンク・タイトル・フォーム再表示用 */
$py      = $dt->format('Y'); // これを行わない場合はXSS対策が別途必要
$pm      = $dt->format('n'); // これを行わない場合はXSS対策が別途必要
$current = $dt->format('Y年n月');
$prev    = $dt_prev->format('?\y=Y&\a\mp;\m=n');
$next    = $dt_next->format('?\y=Y&\a\mp;\m=n');

/* カレンダー生成用パラメータ */
$max    = (int)$dt->format('t');           // 合計日数
$before = (int)$dt->format('w');           // 曜日オフセット(前)
$after  = (7 - ($before + $max) % 7) % 7;  // 曜日オフセット(後)
$today  = (int)date_create()->format('d'); // 今日

/* 今日をハイライトするかどうか */
$hl = !$dt->diff(new DateTime('first day of this month 00:00:00'))->days;

/* カレンダー生成ロジック */
$rows = array_chunk(array_merge(
    array_fill(0, $before, ''),
    range(1, $max),
    array_fill(0, $after, '')
), 7);

?>
<!DOCTYPE html>

<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<title>カレンダー生成</title>

<h1>カレンダー生成</h1>

<p>
  <fieldset>
    <legend>設定</legend>
    <form action="" method="get">
      <label><input type="text" name="y" value="<?=$py?>" size="4">年</label>
      <label><input type="text" name="m" value="<?=$pm?>" size="2">月</label>
      <label><input type="submit" value="生成"></label>
    </form>
  </fieldset>
</p>

<p>
  <table>
    <tr>
      <th><a href="<?=$prev?>">←</a></th>
      <th colspan="5"><h2><?=$current?></h2></th>
      <th><a href="<?=$next?>">→</a></th>
    </tr>
    <tr>
      <th class="sun">日</th>
      <th>月</th>
      <th>火</th>
      <th>水</th>
      <th>木</th>
      <th>金</th>
      <th class="sat">土</th>
    </tr>
<?php foreach ($rows as $row): ?>
    <tr>
<?php foreach ($row as $cell): ?>
<?php if ($hl && $cell === $today): ?>
      <td class="today"><?=$cell?></td>
<?php else: ?>
      <td><?=$cell?></td>
<?php endif; ?>
<?php endforeach; ?>
    </tr>
<?php endforeach; ?>
  </table>
</p>
