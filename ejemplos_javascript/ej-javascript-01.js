var x = 1;

function funcion1 ( z ) {
  var k = z + 1;
  c = 1;
  function funcion2 ( a ) { 
    k = k * a + x;
    c = c + 10 * k;
    if ( c < 100 ) {
      var d = 1;
    } 
    else  {
      var d = 0; 
    }
    return c + d;
  } // funcion2

  funcion2( 2 );
  x = 5 + funcion2( 2 );
  return x * 10;
}  // funcion1


/*console.log("Consola 1: ", c );
var c;
console.log("Consola 2: ", c );*/
var y = funcion1( 4 );
console.log("Consola 3: ", c );
/*var j = funcion2 ( 7 );
console.log("Consola 4: ", j );
q = x;
console.log("Consola 5: ", q ); 
t = c;
console.log("Consola 6: ", t ); 
*/