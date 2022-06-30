var persona1 = { nombre: 'David', 
                apellidos: 'Huertas', 
                edad: 27, 
                nombreCompleto: function(){ return this.nombre + this.apellidos;},
                coche: { marca: "Audi", "potencia de motor": 115, "año": 2017 }
              };

var persona2 = persona1;
console.log("Persona 1:\n", persona1);
console.log("Persona 2:\n", persona2);

persona2.nombre = 'Andrea';
console.log("Persona 1:\n", persona1);
console.log("Persona 2:\n", persona2);

