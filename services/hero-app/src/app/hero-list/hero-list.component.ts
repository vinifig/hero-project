import { Component, OnInit } from '@angular/core';
import {HeroModel} from '../model/hero-model';
import { HeroComponent } from '../hero/hero.component';
import { HeroService } from '../services/hero.service';

@Component({
  selector: 'app-hero-list',
  templateUrl: './hero-list.component.html',
  styleUrls: ['./hero-list.component.css'],
  entryComponents: [HeroComponent]
})
export class HeroListComponent implements OnInit {

  heroList: HeroModel[] = [];
  
  generateHero () {
    let hero: HeroModel = new HeroModel();
    hero._id = 'teste';
    hero.name = 'oi';
    hero.type = 'aa';
    hero.life = 0;
    hero.defense = 0;
    hero.attack = 0;
    hero.attackSpeed = 0;
    hero.moveSpeed = 0;
    return hero;
  }

  constructor(private heroService: HeroService) {
  }

  ngOnInit() {
    this.heroService
      .fetchHeroes()
      .then((heroes: HeroModel[])=>{
        this.heroList = heroes;
      })
  }

}
