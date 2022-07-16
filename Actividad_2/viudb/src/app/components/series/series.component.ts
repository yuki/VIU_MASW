import { Component, OnInit } from '@angular/core';
import { Plataforma } from 'src/app/models/plataforma';
import { Serie } from 'src/app/models/serie';
import data from 'src/assets/json/series.json';

@Component({
  selector: 'app-series',
  templateUrl: './series.component.html',
  styleUrls: ['./series.component.css']
})
export class SeriesComponent implements OnInit {
  public series:Array<Serie>

  constructor() {
    this.series = [];
    let jsonObject = JSON.parse(JSON.stringify(data));

    jsonObject.forEach((element: any) => {
      console.log(element)
      this.series.push(new Serie(element.id, element.nombre, element.sinopsis, element.inicio, element.fin, element.photo, element.url, element.plataforma_id));
    });
  }

  ngOnInit(): void {
  }

}
