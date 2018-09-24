import { Injectable } from '@angular/core';
import { Http, Response } from "@angular/http";
import { environment } from '../../environments/environment';
import { Observable } from 'rxjs';
import { HeroModel } from '../model/hero-model';
@Injectable({
  providedIn: 'root'
})
export class HeroService {

  constructor(private http: Http) { 

  }

  public fetchHeroes (): Promise<HeroModel[]>{
    return this.http
      .get(environment.heroesURI)
      .toPromise()
      .then((response) => response.json())
      .catch((content)=>console.log(content));
  }

  public fetchHero (id: string): Promise<HeroModel> {
    return this.http
      .get(`${environment.heroesURI}/${id}`)
      .toPromise()
      .then((response) => response.json())
      .catch((content)=>console.log(content));
  }

  public updateHero (id: string, hero: HeroModel): Promise<HeroModel> {
    return this.http
      .patch(`${environment.heroesURI}/${id}`, hero)
      .toPromise()
      .then((response) => response.json())
      .catch((content)=>console.log(content));
  }

  public createHero (hero: HeroModel) {
    return this.http
      .post(`${environment.heroesURI}`, hero)
      .toPromise()
      .then((response) => response.json())
      .catch((content)=>console.log(content));
  }

  public deleteHero (hero: HeroModel) {
    return this.http
      .delete(`${environment.heroesURI}`)
      .toPromise()
      .then((response) => response.json())
      .catch((content)=>console.log(content));
  }

}
