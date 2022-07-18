import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { InicioComponent } from './components/inicio/inicio.component';
import { routing } from './app.routing';
import { PlataformasComponent } from './components/plataformas/plataformas.component';
import { SeriesComponent } from './components/series/series.component';
import { CelebritiesComponent } from './components/celebrities/celebrities.component';
import { ErrorComponent } from './components/error/error.component';
import { PlataformasShowComponent } from './components/plataformas-show/plataformas-show.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    InicioComponent,
    PlataformasComponent,
    SeriesComponent,
    CelebritiesComponent,
    ErrorComponent,
    PlataformasShowComponent,
  ],
  imports: [
    BrowserModule,
    routing
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
