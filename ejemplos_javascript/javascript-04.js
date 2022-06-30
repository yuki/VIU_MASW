var z = typeof "Pepe"
+ " " + typeof ( 7.23E-2 )
+ " " + typeof(true)
+ " " + typeof [1,2,3,4]
+ " " + typeof(undefined)
+ " " + typeof (null)
+ " " + typeof{nombre:"Pepe", edad: 45}
+ " " + typeof( function doble(x) {return 2*x;} );
console.log( "z = " + z);
// Valor de z: "string number boolean object undefined object object function"


