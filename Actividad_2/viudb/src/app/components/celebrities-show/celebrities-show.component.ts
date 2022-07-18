import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { Celebrity } from 'src/app/models/celebrity';

import data from 'src/assets/json/celebrities.json';

@Component({
  selector: 'app-celebrities-show',
  templateUrl: './celebrities-show.component.html',
  styleUrls: ['./celebrities-show.component.css']
})
export class CelebritiesShowComponent implements OnInit {
  public id: number = 0;
  public celebrity = new Celebrity(0,'','',new Date('1970-01-01'),'','','',[])

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
          this.celebrity = new Celebrity(element.id, element.nombre, element.apellidos, element.nacimiento, element.nacionalidad, element.url, element.photo,element.series);
        }
      });
    }
  }

}
