import { Component, OnInit, Input } from '@angular/core';
import { HeroModel } from '../model/hero-model';
import { HeroService } from '../services/hero.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-hero',
  templateUrl: './hero.component.html',
  styleUrls: ['./hero.component.css']
})
export class HeroComponent implements OnInit {

  @Input() hero: HeroModel;
  @Input() showDetails: boolean = true;
  @Input() showDelete: boolean = true;

  constructor(private heroService:HeroService, private router: Router) { }
  
  ngOnInit() {
  }

  deleteHero (_id:string) {
    this.heroService
      .deleteHeroById(_id)
      .then(()=>{
        console.log('deleted');
        this.router.navigate(['/hero']);
      })
  }

}
