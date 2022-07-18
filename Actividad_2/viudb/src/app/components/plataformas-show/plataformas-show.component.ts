import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { Plataforma } from 'src/app/models/plataforma';

import data from 'src/assets/json/plataformas.json';

@Component({
  selector: 'app-plataformas-show',
  templateUrl: './plataformas-show.component.html',
  styleUrls: ['./plataformas-show.component.css']
})
export class PlataformasShowComponent implements OnInit {
  public id: number = 0;
  public plataforma: Plataforma = new Plataforma(0,'');
  public series_count: number;
  

  constructor(
    private route:ActivatedRoute,
  ) {
    this.series_count = 0
  }

  ngOnInit(): void {
    this.route.params.subscribe((params: Params) => {
      this.id = Number( params["id"]);
    });

    if (this.id) {
      let jsonObject = JSON.parse(JSON.stringify(data));
      jsonObject.forEach((element: any) => {
        if (this.id === element.id){
          this.plataforma = new Plataforma(element.id, element.nombre);
        }
      });
    }
  }

}
