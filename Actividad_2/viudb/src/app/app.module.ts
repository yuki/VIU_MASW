import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { InicioComponent } from './components/inicio/inicio.component';
import { routing } from './app.routing';
import { PlataformasComponent } from './components/plataformas/plataformas.component';
import { SeriesComponent } from './components/series/series.component';
import { EpisodiosComponent } from './components/episodios/episodios.component';
import { PeliculasComponent } from './components/peliculas/peliculas.component';
import { CelebritiesComponent } from './components/celebrities/celebrities.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    InicioComponent,
    PlataformasComponent,
    SeriesComponent,
    EpisodiosComponent,
    PeliculasComponent,
    CelebritiesComponent
  ],
  imports: [
    BrowserModule,
    routing
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
