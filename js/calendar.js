
//今日の日付表示
function toDateShow() {
  let now = new Date();
  let year = now.getFullYear();
  let month = now.getMonth() + 1;
  let date = now.getDate();
  let day = now.getDay();

  let weekDays = [
    '日',
    '月',
    '火',
    '水',
    '木',
    '金',
    '土'
  ];

  let weekDay = weekDays[day];

  let htmlShow = year + '/' + month + '/' + date + '(' + weekDay + ')';

  let target_p = document.getElementById("todate");
  target_p.innerHTML = htmlShow;

}
window.onload = toDateShow;
