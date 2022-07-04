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

// hacemos que los tapetes permitan recibir objetos (menos el tapete_inicial)
let tapetes = [tapete_sobrantes,tapete_receptor1,tapete_receptor2,tapete_receptor3,tapete_receptor4];
for (cont = 0; cont<tapetes.length; cont++) {
	tapetes[cont].ondragenter = function(e) { e.preventDefault(); };
	tapetes[cont].ondragover = function(e) { e.preventDefault(); };
	tapetes[cont].ondragleave = function(e) { e.preventDefault(); };
	tapetes[cont].ondrop = soltar_carta;
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
	/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! **/
	// nos aseguramos que los mazos están vacíos
	mazo_inicial = [];
	mazo_sobrantes = [];
	mazo_receptor1 = [];
	mazo_receptor2 = [];
	mazo_receptor3 = [];
	mazo_receptor4 = [];

	// limpiamos de imágenes/cartas el tapete inicial, para asegurar
	limpiar_tapete(tapete_inicial);
	// limpiamos el resto de tapetes, para asegurar
	for (i = 0; i<tapetes.length; i++) {
		limpiar_tapete(tapetes[i]);
	}

	/* Crear baraja, es decir crear el mazo_inicial. Este será un array cuyos
	elementos serán elementos HTML <img>, siendo cada uno de ellos una carta.
	Sugerencia: en dos bucles for, bárranse los "palos" y los "numeros", formando
	oportunamente el nombre del fichero png que contiene a la carta (recuérdese poner
	el path correcto en la URL asociada al atributo src de <img>). Una vez creado
	el elemento img, inclúyase como elemento del array mazo_inicial.
	*/
	// rellenamos el mazo
    for (let i = 0; i < numeros.length; i++) {
		for (let j = 0; j < palos.length; j++) {
			var img_carta = document.createElement("img");
			img_carta.src = "./imagenes/baraja/" + numeros[i] + "-" + palos[j] + '.png';
			img_carta.setAttribute("id",numeros[i]+"-"+palos[j]);
			img_carta.setAttribute("data-palo",palos[j]);
			img_carta.setAttribute("data-numero",numeros[i]);
			img_carta.className = "carta";
			img_carta.ondragstart=al_mover_carta;
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
function devuelve_tiempo() {
	let seg = Math.trunc( segundos % 60 );
	let min = Math.trunc( (segundos % 3600) / 60 );
	let hor = Math.trunc( (segundos % 86400) / 3600 );
	let tiempo = ( (hor<10)? "0"+hor : ""+hor )
				+ ":" + ( (min<10)? "0"+min : ""+min )
				+ ":" + ( (seg<10)? "0"+seg : ""+seg );
	return tiempo;
}

// he movido cómo obtener el tiempo a una función para aprovecharlo luego
function arrancar_tiempo(){
	/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! **/
	if (temporizador) clearInterval(temporizador);
    let hms = function (){
			let tiempo = devuelve_tiempo();
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
	for (var i=0; i<mazo.length; i++){
		// La suma de 15 es por redondear el tapete, para que quede dentro de él.
		mazo[i].setAttribute("data-mazo","inicial");
		mazo[i].style = "";
		mazo[i].style.top = (i*paso+15) + "px";
		mazo[i].style.left = (i*paso+15) + "px";
		mazo[i].draggable = false;
		if (i == mazo.length-1) {
			// a la última carta le damos la opción de ser arrastrada.
			mazo[i].draggable = true;
		}
		tapete_inicial.appendChild(mazo[i]);
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
	contador.innerHTML = +contador.innerHTML - 1;
} // dec_contador

/**
	Similar a las anteriores, pero ajustando la cuenta al
	valor especificado
*/
function set_contador(contador, valor) {
	/*** !!!!!!!!!!!!!!!!!!! CODIGO !!!!!!!!!!!!!!!!!!!! **/
	contador.innerHTML = valor;
} // set_contador

/*** Código propio **/

/**
 * Función que se ejecuta al mover las cartas
 */
function al_mover_carta(e) {
	e.dataTransfer.setData( "text/plain/numero", e.target.dataset["numero"] );
	e.dataTransfer.setData( "text/plain/palo", e.target.dataset["palo"] );
	e.dataTransfer.setData( "text/plain/mazo", e.target.dataset["mazo"] );
	e.dataTransfer.setData( "text/plain/id", e.target.id );
}

function soltar_carta(e) {
	e.preventDefault();
	// recogemos los valores de la carta y del mazo del que viene.
	var numero = e.dataTransfer.getData("text/plain/numero");
	var palo = e.dataTransfer.getData("text/plain/palo");
	var mazo = e.dataTransfer.getData("text/plain/mazo");
	var tapete_destinto = e.target.id;

	if (e.target.className == "carta") {
		// por si hemos movido una carta sobre otra, necesitamos saber en qué tapete está para permitir mover la carta encima
		tapete_destinto = e.path[1].id;
	}

	// tenemos en cuenta el mazo, para evitar hacks de coger cartas de otros mazos cambiando al atributo draggable
	if (tapete_destinto == "sobrantes" && mazo == "inicial") {
		mazo_inicial[mazo_inicial.length-1].setAttribute("data-mazo","sobrantes");
		mover_carta(mazo_inicial,mazo_sobrantes,tapete_sobrantes,cont_inicial,cont_sobrantes);
	} else {
		// variables que van a depender de lo que se haga
		var mazo_receptor;
		var tapete_receptor;
		var cont_receptor;
		var mazo_origen;
		var cont_origen;
		// el mazo origen es el inicial o el sobrantes?
		if (mazo == "inicial") {
			mazo_origen = mazo_inicial;
			cont_origen = cont_inicial;
		} else {
			mazo_origen = mazo_sobrantes;
			cont_origen = cont_sobrantes;
		}
		// si el tapete es uno de los receptores, hay que saber cuál es
		switch(tapete_destinto) {
			case ("receptor1"):
				mazo_receptor = mazo_receptor1;
				tapete_receptor = tapete_receptor1;
				cont_receptor = cont_receptor1;
				break;
			case ("receptor2"):
				mazo_receptor = mazo_receptor2;
				tapete_receptor = tapete_receptor2;
				cont_receptor = cont_receptor2;
				break;
			case ("receptor3"):
				mazo_receptor = mazo_receptor3;
				tapete_receptor = tapete_receptor3;
				cont_receptor = cont_receptor3;
				break;
			case ("receptor4"):
				mazo_receptor = mazo_receptor4;
				tapete_receptor = tapete_receptor4;
				cont_receptor = cont_receptor4;
				break;
		}
		
		// cogemos la carta del mazo origen para ver qué hacer con ella
		carta = mazo_origen[mazo_origen.length-1];

		if (mazo_receptor.length == 0 && numero == 12){
			// es una carta con número 12 y va a ser la primera carta del tapete
			carta.draggable = false;
			mover_carta(mazo_origen,mazo_receptor,tapete_receptor,cont_origen,cont_receptor);
		} else if (mazo_receptor.length != 0) {
			// no es la primera carta del tapete. Tenemos que ver el número de la carta que ya está en ese tapete.
			carta_mazo_num = mazo_receptor[mazo_receptor.length-1].getAttribute("data-numero");
			if (carta_mazo_num-1 == numero) {
				// aceptamos la carta por número, pero por palo?
				carta_mazo_palo = mazo_receptor[mazo_receptor.length-1].getAttribute("data-palo");
				// este "if-else-if" se podría poner en un único IF muy largo, pero así creo que queda más sencillo de leer.
				if ((palo == "viu" || palo == "cua") && (carta_mazo_palo == "hex" || carta_mazo_palo == "cir") ) {
					carta.draggable = false;
					mover_carta(mazo_origen,mazo_receptor,tapete_receptor,cont_origen,cont_receptor);
				} else if ((palo == "hex" || palo == "cir") && (carta_mazo_palo == "viu" || carta_mazo_palo == "cua")) {
					carta.draggable = false;
					mover_carta(mazo_origen,mazo_receptor,tapete_receptor,cont_origen,cont_receptor);
				}
			}
		}
	}

	// ¿Tiene que terminar el juego?
	if (mazo_inicial.length == 0 && mazo_sobrantes.length == 0) {
		clearInterval(temporizador);
		var seguimos = confirm("JUEGO TERMINADO. Has hecho "+ cont_movimientos.innerHTML + " movimientos en "+ devuelve_tiempo() + " ¿Quieres seguir jugando?");
		if (seguimos) {
			comenzar_juego();
		}
		return; //para salir de la función
	}

	// Si no termina, si el mazo inicial es 0, cogemos las cartas del tapete de sobrantes.
	if (mazo_inicial.length == 0) {
		// limpiamos el tapete de sobrantes
		limpiar_tapete(tapete_sobrantes);

		// pasamos el mazo sobrantes a inicial, barajamos y colocamos.
		mazo_inicial = mazo_sobrantes;
		mazo_sobrantes = [];
		set_contador(cont_sobrantes,0);
		barajar(mazo_inicial);
		cargar_tapete_inicial(mazo_inicial);
		set_contador(cont_inicial,mazo_inicial.length);
	}
}

// función que mueve la carta de un mazo a otro y a un tapete destino. Y cambiamos contadores
function mover_carta(mazo_origen, mazo_destino, tapete_destino, contador_origen, contador_destino) {
	// cogemos la carta del mazo_origen
	carta = mazo_origen.pop();
	// Cambiamos el estilo: el vértice superior izquierdo de la carta queda en el centro del tapete
	carta.style.top = "50%";
	carta.style.left = "50%";
	// Con la siguiente traslación, se centra definitivamente en el tapete: se desplaza,
	// a la izquierda y hacia arriba (valores negativos) el 50 % de las dimensiones de la carta.
	carta.style.transform="translate(-50%, -50%)";

	//añadimos la carta al mazo destino y se mueve al tapete destino
	mazo_destino.push(carta);
	tapete_destino.appendChild(carta);

	// cambiamos contadores
	dec_contador(contador_origen);
	inc_contador(contador_destino);
	inc_contador(cont_movimientos);

	// la que ahora es la última carta del mazo_origen se tiene que poder mover
	if (mazo_origen.length > 0) {
		mazo_origen[mazo_origen.length-1].draggable = true;
	}
}

// función para limpiar el tapete de cartas
function limpiar_tapete(tapete) {
	while (tapete.getElementsByTagName('img').length>0) {
		tapete.getElementsByTagName('img')[0].remove();
	}
}