var saludo = "probando, probanDo, uno, dos...";
var pos = saludo.search(/ando/i);
var nuevoTexto1 = saludo.replace("do", "ding");
var nuevoTexto2 = saludo.replace("Do", "ding");
var nuevoTexto3 = saludo.replace(/do/i, "ding");
var nuevoTexto4 = saludo.replace(/do/ig, "ding");
var nuevoTexto5 = saludo.replace(/[oa]/ig, "x");

console.log("pos: ", pos);
console.log("nuevoTexto1: ", nuevoTexto1);
console.log("nuevoTexto2: ", nuevoTexto2);
console.log("nuevoTexto3: ", nuevoTexto3);
console.log("nuevoTexto4: ", nuevoTexto4);
console.log("nuevoTexto5: ", nuevoTexto5);