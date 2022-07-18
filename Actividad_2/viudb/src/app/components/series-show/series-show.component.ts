import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { Serie } from 'src/app/models/serie';

import data from 'src/assets/json/series.json';

@Component({
  selector: 'app-series-show',
  templateUrl: './series-show.component.html',
  styleUrls: ['./series-show.component.css']
})
export class SeriesShowComponent implements OnInit {
  public id: number = 0;
  public serie: Serie = new Serie(0,'','',0,0,'','',0,[])

  constructor(
    private route:ActivatedRoute,
    
  ) { }

  ngOnInit(): void {
    this.route.params.subscribe((params: Params) => {
      this.id = Number( params["id"]);
    });

    if (this.id) {
      let jsonObject = JSON.parse(JSON.stringify(data));
      jsonObject.forEach((element: any) => {
        if (this.id === element.id){
          this.serie = new Serie(element.id, element.nombre, element.sinopsis, element.inicio, element.fin, element.photo, element.url, element.plataforma_id,element.celebrities);
        }
      });
    }
  }

}
