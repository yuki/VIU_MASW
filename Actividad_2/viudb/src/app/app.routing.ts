import { ModuleWithProviders } from "@angular/core";
import {Routes, RouterModule} from "@angular/router";

// COMPONENTES PROPIOS
import { InicioComponent } from "./components/inicio/inicio.component";
import { PlataformasComponent } from "./components/plataformas/plataformas.component";
import { PlataformasShowComponent } from "./components/plataformas-show/plataformas-show.component";
import { SeriesComponent } from "./components/series/series.component";
import { CelebritiesComponent } from "./components/celebrities/celebrities.component";
import { ErrorComponent } from "./components/error/error.component";
import { SeriesShowComponent } from "./components/series-show/series-show.component";
import { CelebritiesShowComponent } from "./components/celebrities-show/celebrities-show.component";


// Rutas que necesitamos
const appRoutes: Routes = [
    {path: '', component: InicioComponent},
    {path: 'plataformas', component: PlataformasComponent},
    {path: 'plataformas/:id', component: PlataformasShowComponent},
    {path: 'series', component: SeriesComponent},
    {path: 'series/:id', component: SeriesShowComponent},
    {path: 'celebrities', component: CelebritiesComponent},
    {path: 'celebrities/:id', component: CelebritiesShowComponent},
    {path: '**', component: ErrorComponent},
];

export const routing: ModuleWithProviders<Object> = RouterModule.forRoot(appRoutes);