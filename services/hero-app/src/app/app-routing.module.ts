import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HeroListComponent } from './hero-list/hero-list.component';
import { HeroDetailsComponent } from './hero-details/hero-details.component';
import { CreateHeroComponent } from './create-hero/create-hero.component';

const routes :Routes = [
  { path: 'hero', component: HeroListComponent },
  { path: 'hero/:id', component: HeroDetailsComponent },
  { path: 'create/hero', component: CreateHeroComponent },
  { path: '', redirectTo: '/hero', pathMatch: 'full' },
];


@NgModule({
  exports: [ RouterModule ],
  imports: [RouterModule.forRoot(routes)]
})
export class AppRoutingModule {}