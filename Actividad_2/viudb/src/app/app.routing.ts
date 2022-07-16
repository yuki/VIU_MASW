import { ModuleWithProviders } from "@angular/core";
import {Routes, RouterModule} from "@angular/router";
import { CelebritiesComponent } from "./components/celebrities/celebrities.component";

import { EpisodiosComponent } from "./components/episodios/episodios.component";
import { InicioComponent } from "./components/inicio/inicio.component";
import { PeliculasComponent } from "./components/peliculas/peliculas.component";
import { PlataformasComponent } from "./components/plataformas/plataformas.component";
import { SeriesComponent } from "./components/series/series.component";



const appRoutes: Routes = [
    {path: '', component: InicioComponent},
    {path: 'plataformas', component: PlataformasComponent},
    {path: 'series', component: SeriesComponent},
    {path: 'episodios', component: EpisodiosComponent},
    {path: 'peliculas', component: PeliculasComponent},
    {path: 'celebrities', component: CelebritiesComponent},
];

export const routing: ModuleWithProviders<Object> = RouterModule.forRoot(appRoutes);