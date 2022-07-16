import { Component, OnInit } from '@angular/core';
import { Celebrity } from 'src/app/models/celebrity';
import data from 'src/assets/json/celebrities.json';

@Component({
  selector: 'app-celebrities',
  templateUrl: './celebrities.component.html',
  styleUrls: ['./celebrities.component.css']
})
export class CelebritiesComponent implements OnInit {
  
  public celebrities:Array<Celebrity>;

  constructor() {
    this.celebrities = [];
    let jsonObject = JSON.parse(JSON.stringify(data));

    jsonObject.forEach((element: any) => {
      console.log(element)
      this.celebrities.push(new Celebrity(element.id, element.nombre, element.apellidos, element.nacimiento, element.nacionalidad, element.url, element.photo));
    });

    
  }

  ngOnInit(): void {
    
  }

}
