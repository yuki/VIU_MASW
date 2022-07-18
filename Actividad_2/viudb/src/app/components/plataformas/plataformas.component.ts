import { Component, OnInit,Output, EventEmitter  } from '@angular/core';
import { Plataforma } from 'src/app/models/plataforma';

import data from 'src/assets/json/plataformas.json';

@Component({
  selector: 'app-plataformas',
  templateUrl: './plataformas.component.html',
  styleUrls: ['./plataformas.component.css']
})
export class PlataformasComponent implements OnInit {

  public plataformas:Array<Plataforma>;
  @Output() public ruta = new EventEmitter();
  

  constructor() {
    this.plataformas = [];
  }

  ngOnInit(): void {
    let jsonObject = JSON.parse(JSON.stringify(data));

    jsonObject.forEach((element: any) => {
      this.plataformas.push(new Plataforma(element.id, element.nombre));
    });
    this.ruta.emit("plataformas");
  }

}
