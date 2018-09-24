import { Component, OnInit, Input } from '@angular/core';
import { HeroModel } from '../model/hero-model';

@Component({
  selector: 'app-hero',
  templateUrl: './hero.component.html',
  styleUrls: ['./hero.component.css']
})
export class HeroComponent implements OnInit {

  @Input() hero: HeroModel;

  constructor() { 
  }
  
  ngOnInit() {
  }

}
