import { Component, Input, OnInit } from '@angular/core';
import { Plataforma } from 'src/app/models/plataforma';
import { Serie } from 'src/app/models/serie';
import data from 'src/assets/json/series.json';

@Component({
  selector: 'app-series',
  templateUrl: './series.component.html',
  styleUrls: ['./series.component.css']
})
export class SeriesComponent implements OnInit {
  public series:Array<Serie>;
  // con el "!" indicamos que puede estar undefined
  @Input() plataforma_id!: Number;

  constructor() {
    this.series = [];
  }

  ngOnInit(): void {
    let jsonObject = JSON.parse(JSON.stringify(data));

    jsonObject.forEach((element: any) => {
      if (!this.plataforma_id){
        this.series.push(new Serie(element.id, element.nombre, element.sinopsis, element.inicio, element.fin, element.photo, element.url, element.plataforma_id));
      } else if (this.plataforma_id === element.plataforma_id){
        this.series.push(new Serie(element.id, element.nombre, element.sinopsis, element.inicio, element.fin, element.photo, element.url, element.plataforma_id));
      }
    });
  }

}
