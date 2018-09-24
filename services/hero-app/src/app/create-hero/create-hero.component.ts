import { Component, OnInit } from '@angular/core';
import { HeroModel } from '../model/hero-model';
import { HeroService } from '../services/hero.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-create-hero',
  templateUrl: './create-hero.component.html',
  styleUrls: ['./create-hero.component.css']
})
export class CreateHeroComponent implements OnInit {

  public hero:HeroModel = null;

  constructor(private heroService: HeroService, private router: Router) { }

  ngOnInit() {
    this.hero = new HeroModel();
  }

  createHero(hero: HeroModel){
    this.heroService
      .createHero(hero)
      .then((hero: HeroModel) => {    
        this.hero = hero;  

        this.router.navigate(['/hero', hero._id]);
      })
  }

}
