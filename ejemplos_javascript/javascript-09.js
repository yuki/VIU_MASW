var miObjeto = {
  nombre:"David",
  apellido: "Huertas",
  nombreCompleto: function () {
    return this.nombre + " " + this.apellido;
  },
  yomismo: function() {
    return this
  }
}

console.log(miObjeto);
console.log(miObjeto.yomismo());
console.log(miObjeto.nombreCompleto());
console.log(miObjeto.yomismo().nombreCompleto());