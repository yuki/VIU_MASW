/***** INICIO DECLARACIÓN DE VARIABLES GLOBALES *****/

// Array de palos
let palos = ["viu", "cua", "hex", "cir"];
// Array de número de cartas
//let numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
// En las pruebas iniciales solo se trabajará con cuatro cartas por palo:
let numeros = [9, 10, 11, 12];

// paso (top y left) en pixeles de una carta a la siguiente en un mazo
let paso = 5;

// Tapetes				
let tapete_inicial   = document.getElementById("inicial");
let tapete_sobrantes = document.getElementById("sobrantes");
let tapete_receptor1 = document.getElementById("receptor1");
let tapete_receptor2 = document.getElementById("receptor2");
let tapete_receptor3 = document.getElementById("receptor3");
let tapete_receptor4 = document.getElementById("receptor4");

// hacemos que los tapetes permitan recibir objetos
let tapetes = [tapete_sobrantes,tapete_receptor1,tapete_receptor2,tapete_receptor3,tapete_receptor4];
for (cont = 0; cont<tapetes.length; cont++) {
	tapetes[cont].ondragenter = function(e) { e.preventDefault(); };
	tapetes[cont].ondragover = function(e) { e.preventDefault(); };
	tapetes[cont].ondragleave = function(e) { e.preventDefault(); };
	tapetes[cont].ondrop = soltar;
}

// Mazos
let mazo_inicial   = [];
let mazo_sobrantes = [];
let mazo_receptor1 = [];
let mazo_receptor2 = [];
let mazo_receptor3 = [];
let mazo_receptor4 = [];

// Contadores de cartas
// FIXED: Los nombres de las id de los elementos no eran correctos
let cont_inicial     = document.getElementById("contador_inicial");
let cont_sobrantes   = document.getElementById("contador_sobrantes");
let cont_receptor1   = document.getElementById("contador_receptor1");
let cont_receptor2   = document.getElementById("contador_receptor2");
let cont_receptor3   = document.getElementById("contador_receptor3");
let cont_receptor4   = document.getElementById("contador_receptor4");
let cont_movimientos = document.getElementById("contador_movimientos");

// Tiempo
// FIXED: el ID es contador_tiempo en lugar de cont_tiempo
let cont_tiempo  = document.getElementById("contador_tiempo"); // span cuenta tiempo
let segundos 	 = 0;    // cuenta de segundos
let temporizador = null; // manejador del temporizador

/***** FIN DECLARACIÓN DE VARIABLES GLOBALES *****/

 
// Rutina asociada a boton reset: comenzar_juego
document.getElementById("reset").onclick = comenzar_juego;

// El juego arranca ya al cargar la página: no se espera a reiniciar
/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! **/

// Desarrollo del comienzo de juego
function comenzar_juego() {
	/* Crear baraja, es decir crear el mazo_inicial. Este será un array cuyos 
	elementos serán elementos HTML <img>, siendo cada uno de ellos una carta.
	Sugerencia: en dos bucles for, bárranse los "palos" y los "numeros", formando
	oportunamente el nombre del fichero png que contiene a la carta (recuérdese poner
	el path correcto en la URL asociada al atributo src de <img>). Una vez creado
	el elemento img, inclúyase como elemento del array mazo_inicial. 
	*/

	/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! **/
	// TODO: hay que reiniciar los mazos por si se da dos veces al botón reiniciar.

	// rellenamos el mazo
    for (let i = 0; i < numeros.length; i++) {
		for (let j = 0; j < palos.length; j++) {
			var img_carta = document.createElement("img");
			img_carta.src = "./imagenes/baraja/" + numeros[i] + "-" + palos[j] + '.png';
			img_carta.setAttribute("data-palo",palos[j]);
			img_carta.setAttribute("data-numero",numeros[i]);
			img_carta.className = "carta";
			// evitamos que todas las cartas se puedan arrastrar, porque se podrían hacer trampas
			img_carta.draggable = false;
			img_carta.ondragstart=al_mover;
			img_carta.ondrag = function(e){};
			img_carta.ondragend = function(){};
			mazo_inicial.push(img_carta);
		}
	}

	
	// Barajar
	barajar(mazo_inicial);

	// Dejar mazo_inicial en tapete inicial
	cargar_tapete_inicial(mazo_inicial);

	// Puesta a cero de contadores de mazos
	// FIXED: faltaba poner el contador del tapete inicial
	set_contador(cont_inicial, mazo_inicial.length)
	set_contador(cont_sobrantes, 0);
	set_contador(cont_receptor1, 0);
	set_contador(cont_receptor2, 0);
	set_contador(cont_receptor3, 0);
	set_contador(cont_receptor4, 0);
	set_contador(cont_movimientos, 0);
	
	// Arrancar el conteo de tiempo
	arrancar_tiempo();

} // comenzar_juego


/**
	Se debe encargar de arrancar el temporizador: cada 1000 ms se
	debe ejecutar una función que a partir de la cuenta autoincrementada
	de los segundos (segundos totales) visualice el tiempo oportunamente con el 
	format hh:mm:ss en el contador adecuado.

	Para descomponer los segundos en horas, minutos y segundos pueden emplearse
	las siguientes igualdades:

	segundos = truncar (   segundos_totales % (60)                 )
	minutos  = truncar ( ( segundos_totales % (60*60) )     / 60   )
	horas    = truncar ( ( segundos_totales % (60*60*24)) ) / 3600 )

	donde % denota la operación módulo (resto de la división entre los operadores)

	Así, por ejemplo, si la cuenta de segundos totales es de 134 s, entonces será:
	   00:02:14

	Como existe la posibilidad de "resetear" el juego en cualquier momento, hay que 
	evitar que exista más de un temporizador simultáneo, por lo que debería guardarse
	el resultado de la llamada a setInterval en alguna variable para llamar oportunamente
	a clearInterval en su caso.   
*/

function arrancar_tiempo(){
	/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! **/
	if (temporizador) clearInterval(temporizador);
    let hms = function (){
			let seg = Math.trunc( segundos % 60 );
			let min = Math.trunc( (segundos % 3600) / 60 );
			let hor = Math.trunc( (segundos % 86400) / 3600 );
			let tiempo = ( (hor<10)? "0"+hor : ""+hor ) 
						+ ":" + ( (min<10)? "0"+min : ""+min )  
						+ ":" + ( (seg<10)? "0"+seg : ""+seg );
			set_contador(cont_tiempo, tiempo);
            segundos++;
		}
	segundos = 0;
    hms(); // Primera visualización 00:00:00
	temporizador = setInterval(hms, 1000);
    	
} // arrancar_tiempo


/**
	Si mazo es un array de elementos <img>, en esta rutina debe ser
	reordenado aleatoriamente. Al ser un array un objeto, se pasa
	por referencia, de modo que si se altera el orden de dicho array
	dentro de la rutina, esto aparecerá reflejado fuera de la misma.
*/
function barajar(mazo) {
	/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! **/
	/* Este algoritmo lo que hace es coger una carta aleatoria del mazo y lo pone en 
	   un nuevo mazo aleatorio. Luego le asigno al mazo pasado como parámetro el mazo
	   ya barajado. La alternativa sería intercambiar posiciones, pero es la primera
	   manera que se me ha ocurrido y prefiero dejarlo así.
	*/
	var mazo_bajarado = [];
	var barajando = true;
	while (barajando) {
		num_cartas = mazo.length;
		//Math.random devuelve un número entre 0 y 1, así que lo multiplicamos con el número de cartas.
		aleatorio = Math.floor(Math.random()*num_cartas);
		if (num_cartas != 0){
			// si quedan cartas, cogemos la de la posición aleatoria
			mazo_bajarado.push(mazo[aleatorio]);
			mazo.splice(aleatorio,1);
		} else {
			// hemos terminado y no quedan cartas en el mazo original
			barajando = false;
		}
	}
	// TODO: comprobar cómo clonarlo mejor
	for (i = 0; i<mazo_bajarado.length; i++){
		mazo.push(mazo_bajarado[i]);
	}
} // barajar



/**
 	En el elemento HTML que representa el tapete inicial (variable tapete_inicial)
	se deben añadir como hijos todos los elementos <img> del array mazo.
	Antes de añadirlos, se deberían fijar propiedades como la anchura, la posición,
	coordenadas top y left, algun atributo de tipo data-...
	Al final se debe ajustar el contador de cartas a la cantidad oportuna
*/
function cargar_tapete_inicial(mazo) {
	/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! **/	
	for (var i=0; i<mazo_inicial.length; i++){
		/* TODO: Intentar hacer esto sólo en CSS? Se puede?
		   Mi idea inicial era hacer la escalera de cartas directamente en CSS (mezclando propiedades de hermanos)
		   pero no lo he conseguido. 
		*/
		mazo_inicial[i].style.top = i*5 + "px";
		mazo_inicial[i].style.left = i*5 + "px";
		if (i == mazo_inicial.length-1) {
			// a la última carta le damos la opción de ser arrastrada.
			mazo_inicial[i].draggable = true;
		}
		tapete_inicial.appendChild(mazo_inicial[i]);
	}
} // cargar_tapete_inicial


/**
 	Esta función debe incrementar el número correspondiente al contenido textual
   	del elemento que actúa de contador
*/
function inc_contador(contador){
    contador.innerHTML = +contador.innerHTML + 1;
} // inc_contador

/**
	Idem que anterior, pero decrementando 
*/
function dec_contador(contador){
	/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! ***/	
	// TODO: Comprobar que está bien
	contador.innerHTML = +contador.innerHTML - 1;
} // dec_contador

/**
	Similar a las anteriores, pero ajustando la cuenta al
	valor especificado
*/
function set_contador(contador, valor) {
	/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! **/
	// TODO: Comprobar que está bien
	contador.innerHTML = valor;
} // set_contador

/*** Código propio **/

/**
 * Función que se ejecuta al mover las cartas
 */
function al_mover(e) {
	console.log(e) //TODO: quitar
	e.dataTransfer.setData( "text/plain/numero", e.target.dataset["numero"] );
	e.dataTransfer.setData( "text/plain/palo", e.target.dataset["palo"] );
	e.dataTransfer.setData( "text/plain/id", e.target.id );
}

function soltar(e) {
	console.log(e);
}