var x = 3;
var y = cubo (x);
ponerGuiones();
console.log("El cubo de ", x, " es", y);
ponerGuiones();
parImpar(y);
ponerGuiones();
var texto ="Ejemplo de texto";
if (contieneCaracter(texto, 'j')){
	console.log(texto, "contiene el caracter 'j'");
	ponerGuiones();
}

function parImpar(i){
	console.log ("El numero ", i, "es ", (i%2==0)? "par" : "impar" );
}

function cubo (i){
	return i*i*i;
}

function ponerGuiones(){
	console.log("------------------------------");
}

function contieneCaracter(cadena, caracter){
	if (cadena.indexOf(caracter)==-1){
		return false;
	}
	return true;
	//Alternativa: return (cadena.indexOf(caracter)==-1)? false : true;
}






