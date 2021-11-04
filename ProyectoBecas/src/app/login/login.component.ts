import { FormGroup, FormControl } from '@angular/forms';
import { Component, OnInit } from '@angular/core';
import axios from 'axios';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  ruta = 'http://localhost:8000/';
  Datos = new FormGroup({
    Usuario:new FormControl(''),
    Contrasenia:new FormControl('')
  });
  constructor() { }

  ngOnInit(): void {
  }
  Logueacion()
  {
     //para prueba
    // this.cerrarBtn.nativeElement.click();
    // return;
    //hasta aca
    const formData = new FormData();
    formData.append('ci1',this.Datos.value.Usuario);
    formData.append('contrasenia1',this.Datos.value.Contrasenia);
    axios({
      method:'post',
      url:this.ruta+'api/AdministrativoLogin',
      data:formData,
      headers:{'Content-Type':'multipart/form-data'}
    })
    .then(res=>{
      // console.log('NO SE LOGUEO CORRECTAMENTE');
      console.log(res.data);
    })
    .catch(error=>{
      // NO SE PUDO LOGUEAR EL ADMIN ENTONCES BUSCAR SI ERA PRACTICANTE
      axios({
        method:'post',
        url:this.ruta+'api/PracticanteLogin',
        data:formData,
        headers:{'Content-Type':'multipart/form-data'}
      })
      .then(res=>{
        console.log('SE LOGUEO CORRECTAMENTE');
        console.log(res.data);
      })
      .catch(error=>{
        console.log('NO SE PUDO LOGUEAR EL PRACTICANTE');
        console.log(error);
      })
    })
  }
}
