class Vector2D {
    constructor(x, y) {
        this.x = x;
        this.y = y;
    }
    modulo() {
        return Math.sqrt(this.x*this.x+this.y*this.y);
    }
}

class Vector3D extends Vector2D  {
    constructor(x,y,z) {
        super(x,y);
        this.z = z;
    }
    modulo() {
        return Math.sqrt( super.modulo() * super.modulo() 
            + this.z*this.z);
    }
}

v2D = new Vector2D(3,4);
console.log("v2D.modulo: ", v2D.modulo());

v3D = new Vector3D(2,4,4);
console.log("v3D.modulo: ", v3D.modulo());

