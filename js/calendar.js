
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


// hoverInの処理
let hoverIn = function() {
    $(this).children('span').attr( 'id', 'this_date' );
    $('#this_date').html();
}
// hoverOutの処理
let hoverOut = function() {
    $(this).children('span').removeAttr( 'id' );
}
$('.modal_btn').hover(hoverIn, hoverOut);


//モーダル関連の機能
$('.modal_btn').on('click', function(){
  $('#overlay').fadeIn();
  $('#modal').fadeIn();
  $('.n_push').html($('#this_date').text());　//クリックした日付の値がモーダルの”日”部分に反映される
});
$('.close_btn').on('click', function(){
  $('#overlay').fadeOut();
  $('#modal').fadeOut();
});
$('#overlay').on('click', function(){
  $('#overlay').fadeOut();
  $('#modal').fadeOut();
});


//textarea内の文章を削除
$('#delete_btn').on('click',function(){
  $('.modal_text').val('');
});
