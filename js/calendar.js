
//現在日時表示
function toDateShow() {
  let toDate = new Date();
  let year = toDate.getFullYear();
  let month = toDate.getMonth() + 1;
  let date = toDate.getDate();
  let day = toDate.getDay();

  let htmlShow = year + '/' + month + '/' + date + '(' + day + ')';

  let target_p = document.getElementById("todate");
  target_p.innerHTML = htmlShow;

}
window.onload = toDateShow;
