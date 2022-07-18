export class Celebrity {

    constructor(
        public id: number,
        public nombre: string,
        public apellidos: string,
        public nacimiento: Date,
        public nacionalidad: string,
        public url: string,
        public photo: string,
        public tvshows: Array<number>
    ){}
}


