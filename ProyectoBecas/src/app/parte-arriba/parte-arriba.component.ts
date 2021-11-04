import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-parte-arriba',
  templateUrl: './parte-arriba.component.html',
  styleUrls: ['./parte-arriba.component.css']
})
export class ParteArribaComponent implements OnInit {
ruta="http://localhost:8000/";
  constructor() { }

  ngOnInit(): void {
  }

}
