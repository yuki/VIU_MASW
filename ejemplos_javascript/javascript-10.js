function f(x,y) {
  if ( y === undefined ) {
    y = 0;
    console.log("no se le ha pasado un segundo argumento")
  }  //y = y || 0;
  return x+y;
}

function sumar( ) {
  var acum = 0;
  for ( var i = 0; i < arguments.length; i++ ) {
    acum += arguments[ i ];
  }
  return acum;
}

console.log( f( 2, 3 ) );
console.log( f( 2 ) );
console.log ("primera suma: ", sumar( 1, 2, 3, 4, 5 ));
console.log ("segunda suma: ", sumar( -13, 2, 17 ));

