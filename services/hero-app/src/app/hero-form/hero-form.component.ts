import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { HeroModel } from '../model/hero-model';

@Component({
  selector: 'app-hero-form',
  templateUrl: './hero-form.component.html',
  styleUrls: ['./hero-form.component.css']
})
export class HeroFormComponent implements OnInit {

  @Input() hero: HeroModel = null;
  @Input() title: string = "Hero Form";
  @Output() onSubmit: EventEmitter<HeroModel> = new EventEmitter();


  constructor() { }

  ngOnInit() {
    if(this.hero === null) {
      this.hero = new HeroModel();
    }
  }

  save (e) {
    e.preventDefault();
    this.onSubmit.emit(this.hero);
  }

}
