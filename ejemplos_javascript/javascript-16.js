try {
    console.log(pepe);
} catch (errorCometido) {
    console.log("Error cometido: " + errorCometido.name + ", descripcion: " + errorCometido.message );
} finally {
    console.log("En cualquier caso");
}

try {
    x=5/2;
} catch (error) {
    console.log("Error cometido: " + error.name + ", descripcion: " + error.message );
} finally {
    console.log("En cualquier caso");
}

var x = -2;
try {
    console.log(x);
    if (x < 0 ) throw "negativo"
} catch (errorCometido) { // tipo idem que valor asociado a throw
    console.log("Error cometido: " + errorCometido );
} finally {
    console.log("En cualquier caso");
}


