function testingVar() {
  var x = 6;
  if (true) {
    var x = 17;  // ¡misma variable!
    console.log("testingVar, dentro:", x);  // 17
  }
  console.log("testingVar, fuera:", x);  // 17
}

function testingLet() {
  let x = 6;
  if (true) {
    let x = 17;  // variable diferente
    console.log("testingLet, dentro:", x);  // 17
  }
  console.log("testingLet, fuera:", x);  // 6
}

// llamamos a las funciones
testingVar();
testingLet();


