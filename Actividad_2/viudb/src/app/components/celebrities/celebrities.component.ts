import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { Celebrity } from 'src/app/models/celebrity';

import data from 'src/assets/json/celebrities.json';

@Component({
  selector: 'app-celebrities',
  templateUrl: './celebrities.component.html',
  styleUrls: ['./celebrities.component.css']
})
export class CelebritiesComponent implements OnInit {
  
  public celebrities:Array<Celebrity>;
  @Input() public serie_id!: Number;
  @Output() public celebrity_count = new EventEmitter();


  constructor() {
    this.celebrities = [];
  }

  ngOnInit(): void {
    let jsonObject = JSON.parse(JSON.stringify(data));

    jsonObject.forEach((element: any) => {
      if (!this.serie_id || this.serie_id == -1) {
        // si viene con un ID o -1, cojo todos
        this.celebrities.push(new Celebrity(element.id, element.nombre, element.apellidos, element.nacimiento, element.nacionalidad, element.url, element.photo,element.series));
      } else if (element.series.indexOf(this.serie_id)>=0) {
        //celebrity aparece en la serie
        this.celebrities.push(new Celebrity(element.id, element.nombre, element.apellidos, element.nacimiento, element.nacionalidad, element.url, element.photo,element.series));
      }

      if (this.serie_id == -1){
        // si es -1, vengo desde el componente "inicio", y sólo cojo un random de 4 
        this.celebrities = this.celebrities.sort(() => Math.random() - 0.5).slice(0,4)
      }

    });
    this.celebrity_count.emit(this.celebrities.length);
  }

}
