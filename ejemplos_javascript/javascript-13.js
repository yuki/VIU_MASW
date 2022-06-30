class Persona {
    constructor(nombre){
        this.nombre = nombre;
    }
    static saludo() {
        return "Hola";
    }
}


Persona.saludo();
var p = new Persona("Pepe");
p.saludo(); //// ERROR!!!



