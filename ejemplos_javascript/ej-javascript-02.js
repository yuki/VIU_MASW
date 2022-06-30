x=1;
switch (x) {
  case 0 :
    x = x + 2;
    break;
  case 1:
    x = x * 2;
  case 2:
    x = x - 2;
    break;
  case 3:
    x = Math.pow(x, 2);
  default:
    x = 12;
 }
 console.log(x);



