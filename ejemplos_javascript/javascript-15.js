class Persona {
    constructor(nombre) {
        this.nombre = nombre;
    }
    set edad(anyos) {
        if (anyos>0) {
            this.anyos = anyos;
        }
    }
    get edad() {
        return this.anyos
    }
}

var p = new Persona("Pepe");
p.edad = 25;
console.log(p.edad); //25
p.edad = -37;
console.log(p.edad); //25


