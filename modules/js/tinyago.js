function ago(val) {
  // https://github.com/odyniec/tinyAgo-js
  // val is datetime in milliseconds
  val = 0 | (Date.now() - val) / 1000;
  var unit, length = {
      秒: 60,
      分钟: 60,
      小时: 24,
      天: 7,
      周: 4.35,
      月: 12,
      年: 10000
    },
    result;

  for (unit in length) {
    result = val % length[unit];
    if (!(val = 0 | val / length[unit]))
      return result + ' ' + unit;
  }
}
