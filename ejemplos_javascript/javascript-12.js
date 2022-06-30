class NumeroComplejo {

    constructor(parteReal, parteImaginaria){
    this.parteReal = parteReal;
    this.parteImaginaria = parteImaginaria;
    }

    getParteReal() {
        return this.parteReal;
    }

    getParteImaginaria() {
        return this.parteImaginaria;
    }

    modulo() {
        return Math.sqrt(this.parteReal*this.parteReal 
            + this.parteImaginaria*this.parteImaginaria);
    }
}

var a = new NumeroComplejo(3, 4);
console.log("modulo: ", a.modulo());



