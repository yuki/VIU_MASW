import { Component, Input, OnInit,Output, EventEmitter } from '@angular/core';
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
  @Input() celebrity_id!: Number;
  @Output() public series_count = new EventEmitter();

  constructor() {
    this.series = [];
  }

  ngOnInit(): void {
    let jsonObject = JSON.parse(JSON.stringify(data));

    jsonObject.forEach((element: any) => {
      if (!this.plataforma_id && !this.celebrity_id){
        this.series.push(new Serie(element.id, element.nombre, element.sinopsis, element.inicio, element.fin, element.photo, element.url, element.trailer, element.plataforma_id,element.celebrities));
      } else if (this.plataforma_id && this.plataforma_id === element.plataforma_id){
        this.series.push(new Serie(element.id, element.nombre, element.sinopsis, element.inicio, element.fin, element.photo, element.url, element.trailer, element.plataforma_id,element.celebrities));
      } else if (this.celebrity_id && element.celebrities.indexOf(this.celebrity_id)>=0) {
        this.series.push(new Serie(element.id, element.nombre, element.sinopsis, element.inicio, element.fin, element.photo, element.url, element.trailer, element.plataforma_id,element.celebrities));
      }
    });
    this.series_count.emit(this.series.length);
  }

}
