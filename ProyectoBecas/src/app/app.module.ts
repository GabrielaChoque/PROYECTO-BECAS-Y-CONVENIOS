import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AdministradoresComponent } from './administradores/administradores.component';
import { ParteArribaComponent } from './parte-arriba/parte-arriba.component';
import { ParteAbajoComponent } from './parte-abajo/parte-abajo.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { IndexComponent } from './index/index.component';
import { EmpresaComponent } from './empresa/empresa.component';
import { InformesComponent } from './informes/informes.component';
import { InicioComponent } from './inicio/inicio.component';
import { LoginComponent } from './login/login.component';
import { PracticantesComponent } from './practicantes/practicantes.component';

@NgModule({
  declarations: [
    AppComponent,
    AdministradoresComponent,
    ParteArribaComponent,
    ParteAbajoComponent,
    IndexComponent,
    EmpresaComponent,
    InformesComponent,
    InicioComponent,
    LoginComponent,
    PracticantesComponent
  ],
  imports: [
    
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
