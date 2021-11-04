
import { AdministradoresComponent } from './administradores/administradores.component';
import { NgModule, Component } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { IndexComponent } from './index/index.component';
import { InicioComponent } from './inicio/inicio.component';
import { InformesComponent } from './informes/informes.component';
import { PracticantesComponent } from './practicantes/practicantes.component';
import { LoginComponent } from './login/login.component';

const routes: Routes = [
  { path: 'Administradores', component: AdministradoresComponent },
  { path: 'Informes', component: InformesComponent },
  { path: 'Practicantes', component: PracticantesComponent },
  { path: 'Login', component: LoginComponent },
  { path: '**', component: InicioComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
