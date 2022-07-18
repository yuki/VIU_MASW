export class Serie {

    constructor(
        public id: number,
        public nombre: string,
        public sinopsis: string,
        public inicio: number,
        public fin: number,
        public photo: string,
        public url: string,
        public trailer: string,
        public plataforma_id: number,
        public celebrities: Array<number>
    ){}
}

