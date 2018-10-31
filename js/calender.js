//トップページスライダー
$(function() {
  $('.not-enough-slider').slick({
    infinite: true,
    dots: true,
    autoplay: true,
    autoplaySpeed: 2500,
    arrows: false
  });
});

// 一定量スクロールでメニュー固定
$(function(){
  var fix    = $(".global-menu");
  var fixTop = fix.offset().top;
  $(window).scroll(function () {
    if($(window).scrollTop() >= fixTop) {
      fix.css("position","fixed");
      fix.css("top","0");
    } else {
      fix.css("position","");
      fix.css("top","");
    }
  });
});

// 一定量スクロールでメニューに「おてつだいネットワークス」表示
$(function(){
  var fix    = $(".title-sp");
  var fixTop = fix.offset().top;
  $(window).scroll(function () {
    if($(window).scrollTop() >= fixTop) {
      fix.css("display","inline-block");
    } else {
      fix.css("display","none");
    }
  });
});

//HEADER アコーディオン
$(document).ready(function(){
	$(".global-menu-icon").click(function(){
		$(this).next().slideToggle(300);
	});
});

//FOOTER アコーディオン
$(document).ready(function(){
	$(".a_item").click(function(){
		$(this).next().slideToggle(300);
	});
});
