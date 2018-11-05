
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

  let htmlShow = year + '年' + month + '月' + date + '日（' + weekDay + '）';

  let target_p = document.getElementById("todate");
  target_p.innerHTML = htmlShow;

}
window.onload = toDateShow;



//モーダルで表示するメモ
$('.modal_btn').on('click', function(){
  $('#overlay').fadeIn();
  $('#modal').fadeIn();
});
$('.close_btn').on('click', function(){
  $('#overlay').fadeOut();
  $('#modal').fadeOut();
});
$('#overlay').on('click', function(){
  $('#overlay').fadeOut();
  $('#modal').fadeOut();
});
