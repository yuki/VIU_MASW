var persona1 = { nombre: 'David', 
                apellidos: 'Huertas', 
                edad: 27, 
                nombreCompleto: function(){ return this.nombre + this.apellidos;},
                coche: { marca: "Audi", "potencia de motor": 115, "año": 2017 }
              };     

var persona2 = Object.assign({}, persona1);
console.log("Persona 1a:\n", persona1);
console.log("Persona 2a:\n", persona2);

persona2.nombre = 'Andrea';
console.log("Persona 1b:\n", persona1);
console.log("Persona 2b:\n", persona2);




