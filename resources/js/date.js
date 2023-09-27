function setd(num) {
  let ret;
  if (num < 10) { ret = "0" + num; }
  else { ret = num; }
  return ret;
}
function time() {
    var now = new Date();
    var now_hour = setd(now.getHours());
    var now_min = setd(now.getMinutes());
    var time_msg = "現在時刻：" + now_hour + "時" + now_min + "分です";
    document.getElementById("date-time").innerHTML = time_msg;
}

if(document.getElementById("date-time")){
  setInterval(time(),6000);
}