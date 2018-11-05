<?php
class CalendarObj{

  private $year;  //年
  private $month; //月
  private $day;   //日


  //getter（ゲッタ。年・月・日の出力用。）
  public function getYear(){
    return $this->year;
  }
  public function getMonth(){
    return $this->month;
  }
  public function getDay(){
    return $this->day;
  }

  //次月・前月移動用
  public function getUrlPrevMonth(){
    $str = '';
    if($this->month == "01"){
      $year = $this->year - 1;
      $month = "12";
      $str = "year=".$year."&month=".$month;
    } else {
      $year = $this->year;
      $month = "0".($this->month - 1);
      $str = "year=".$year."&month=".substr($month, -2);
    }
    return $str;
  }
  public function getUrlNextMonth(){
    $str = '';
    if($this->month == "12"){
      $year = $this->year + 1;
      $month = "01";
      $str = "year=".$year."&month=".$month;
    } else {
      $year = $this->year;
      $month = "0".($this->month + 1);
      $str = "year=".$year."&month=".substr($month, -2);
    }
    return $str;
  }

  //コンストラクタ。インスタンス生成時の初期値用（setter、セッタ）
  public function __construct(){
    $req = $_REQUEST;
    $year = $req['year'];
    $month = $req['month'];
    $day = $req['day'];

    if(preg_match("/[12]\d{3}/", $year) == true && preg_match("/[0-9]{2}/", $month) == true){
      $this->year = $year;
      $this->month = $month;
    } else {
      $this->year = date("Y");
      $this->month = date("n");
    }
  }

  //カレンダーの行を作る
  public function createRows(){
    //月の最終日を$lastDayにセット
    $lastDay = date("j", mktime(0, 0, 0, $this->month + 1, 0, $this->year));
    $row = self::initRow(); //最初の配列。1週間分。
    $rows = array(); //$rowを格納する配列。1か月分。

    //1ヶ月分の日付ループ
    for($i = 1; $i <= $lastDay; $i++){
      //$iの数だけ曜日（のindex0～6）を$youbiにセット
      $youbi = date("w", mktime(0, 0, 0, $this->month, $i, $this->year));
      $row[$youbi] = $i;

      //土曜日もしくは月の最終日の場合
      if($youbi == 6 || $i == $lastDay){
        //$rowsに$rowを格納。
        $rows []= $row;
        //$rowsに$row一行を加えたらinitRow()で初期化する。
        $row = self::initRow();
      }
    }
    return $rows; //最終日まで追加された配列$rowsを返す
  }

  //空白部分を埋める（1週間分。曜日単位。）
  private static function initRow(){
    $emptyArray = array();
    for($i = 0; $i <= 6; $i++){
      $emptyArray[] = " ";
    }
    return $emptyArray;
  }

}
