// Ámbito global 
var x = 1; // x global: visible en cualquier sitio

function funcion1 ( z ) { // z: local en la función funcion1
  var k = z + 1; // k: local en funcion1 -no visible fuera, pero sí "dentro"
  c = 1;
  function funcion2 ( a ) { // a: local en la función funcion2
    k = k * a + x; // k y x visibles: pertenece a ámbito superior
    c = c + 10 * k;   // c declarada automáticamente global
    if ( c < 100 ) {
      var d = 1;   // d local en funcion2
    } 
    else  {
      var d = 0    // d local en funcion2
    }
    return c + d;
  } // funcion2

  funcion2( 2 );
  x = 5 + funcion2( 2 ); // x: fue declarada global
  return x * 10;
}  // funcion1

// console.log( c ); /// ERROR: c no existe todavía
var y = funcion1( 4 );    // y = 3460
console.log( c ); // c (341) ya existe (creada globalmente en la llamada a funcion1()->funcion2() )
// var j = funcion2 ( 7 );     // ERROR: función funcion2() no visible desde aquí
q = x;     // q = x = 346 // q sin declarar: automáticamente variable global
console.log( q ); 
t = c;     // c = 341; ya existe; fue declarada globalmente por la llamada funcion1( 4 )
           // t, igual que q, automáticamente variable global






