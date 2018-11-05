
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




$(function(){
  //日付をクリック
 $(".modal_memo").click(function(){

  //body内の最後に<div id="modal-bg"></div>を挿入
   $("body").append('<div class="modal_bg"></div>');
  //画面中央を計算する関数を実行
  modalResize();
  //モーダルウィンドウを表示
  $("#modal_bg,#modal_main").fadeIn("slow");

  //画面のどこかをクリックしたらモーダルを閉じる
  $("#modal_bg,#modal_main").click(function(){
    $("#modal_main,#modal_bg").fadeOut("slow",function(){
      //挿入した<div id="modal-bg"></div>を削除
      $('#modal_bg').remove();
    });

  });

  //画面の左上からmodal-mainの横幅・高さを引き、その値を2で割ると画面中央の位置が計算できます
   $(window).resize(modalResize);
    function modalResize(){

      var w = $(window).width();
      var h = $(window).height();

      var cw = $("#modal_main").outerWidth();
      var ch = $("#modal_main").outerHeight();

      //取得した値をcssに追加する
      $("#modal_main").css({
        "left": ((w - cw)/2) + "px",
        "top": ((h - ch)/2) + "px"
      });
    }
  });
});
