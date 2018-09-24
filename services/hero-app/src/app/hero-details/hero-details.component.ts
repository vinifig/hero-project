import { Component, OnInit, Input } from '@angular/core';
import { HeroModel } from '../model/hero-model';
import { ActivatedRoute } from '@angular/router';
import { Subscription, Observable } from 'rxjs';
import { HeroService } from '../services/hero.service';

@Component({
  selector: 'app-hero-details',
  templateUrl: './hero-details.component.html',
  styleUrls: ['./hero-details.component.css']
})
export class HeroDetailsComponent implements OnInit {

  heroId: string;
  hero: HeroModel = null;

  private paramsSub:Subscription;
  

  constructor(private route: ActivatedRoute, private heroService: HeroService) { }

  subscribeHero () {

  }

  subscribeId (params) {
    this.heroId = params['id'];
    this.heroService
      .fetchHero(this.heroId)
      .then((hero: HeroModel) => {
        this.hero = hero;
      });
  }

  ngOnInit() {
    this.paramsSub = this.route.params.subscribe(this.subscribeId.bind(this));
  }

  ngOnDestroy() {
    this.hero = null;
    this.paramsSub.unsubscribe();
  }

}
