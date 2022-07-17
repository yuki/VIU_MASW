import { ModuleWithProviders } from "@angular/core";
import {Routes, RouterModule} from "@angular/router";

// COMPONENTES PROPIOS
import { InicioComponent } from "./components/inicio/inicio.component";
import { PlataformasComponent } from "./components/plataformas/plataformas.component";
import { PlataformasShowComponent } from "./components/plataformas-show/plataformas-show.component";
import { SeriesComponent } from "./components/series/series.component";
import { EpisodiosComponent } from "./components/episodios/episodios.component";
import { PeliculasComponent } from "./components/peliculas/peliculas.component";
import { CelebritiesComponent } from "./components/celebrities/celebrities.component";
import { ErrorComponent } from "./components/error/error.component";


// Rutas que necesitamos
const appRoutes: Routes = [
    {path: '', component: InicioComponent},
    {path: 'plataformas', component: PlataformasComponent},
    {path: 'plataformas/:id', component: PlataformasShowComponent},
    {path: 'series', component: SeriesComponent},
    {path: 'episodios', component: EpisodiosComponent},
    {path: 'peliculas', component: PeliculasComponent},
    {path: 'celebrities', component: CelebritiesComponent},
    {path: '**', component: ErrorComponent},
];

export const routing: ModuleWithProviders<Object> = RouterModule.forRoot(appRoutes);