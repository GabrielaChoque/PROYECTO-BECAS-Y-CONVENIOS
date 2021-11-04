import { Component, OnInit } from '@angular/core';
import {FormControl, FormGroup} from '@angular/forms'
import axios from 'axios';

@Component({
  selector: 'app-administradores',
  templateUrl: './administradores.component.html',
  styleUrls: ['./administradores.component.css']
})
export class AdministradoresComponent implements OnInit {
  ruta = 'http://localhost:8000/';
  admin=[ ];
  newAdministrativo = new FormGroup({
    Apellido_paterno:new FormControl(''),
    Apellido_materno:new FormControl(''),
    Nombre:new FormControl(''),
    CI:new FormControl(''),
    Contrasenia:new FormControl(''),
    Cargo:new FormControl(''),
  });

  constructor() { }

  ngOnInit(): void {
    this.CargarAdministrativo();
  }
  CargarAdministrativo(){
    // LO QUE SE RETORNA DESDE EL INDEX DEL CONTROLLER EN LARAVEL ESTÁ EN res
    axios.get(this.ruta+'api/Administrador')
   .then(res => {
     console.log('Esto es el res.data:',res.data);
     this.admin = res.data;



     
    //  this.admin.forEach(element => {
    //     element.Editando=false;
    //  });
     }).catch(err =>  {
     console.log("err");
  });
  
  }
  AgregarAdministrativo()
  {
    //para prueba
    // this.cerrarBtn.nativeElement.click();
    // return;
    //hasta aca
    const formData = new FormData();
    formData.append('Apellido_paterno',this.newAdministrativo.value.Apellido_paterno);
    formData.append('Apellido_materno',this.newAdministrativo.value.Apellido_materno);
    formData.append('Nombre',this.newAdministrativo.value.Nombre);
    formData.append('CI',this.newAdministrativo.value.CI);
    formData.append('Contrasenia',this.newAdministrativo.value.Contrasenia);
    formData.append('Cargo',this.newAdministrativo.value.Tipo);
    axios({
      method:'post',
      url:this.ruta+'api/Administrativo',
      data:formData,
      headers:{'Content-Type':'multipart/form-data'}
    })
    .then(res=>{
      console.log('SE AÑADIO CORRECTAMENTE');
      console.log(res);
      // this.cerrarBtn.nativeElement.click();
      this.CargarAdministrativo();
    })
    .catch(error=>{
      console.log('HAY ERROR XD');
      console.log(error);
    })
  }
}
