import { Component, OnInit, ViewChild } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import axios from 'axios';

@Component({
  selector: 'app-practicantes',
  templateUrl: './practicantes.component.html',
  styleUrls: ['./practicantes.component.css']
})
export class PracticantesComponent implements OnInit {
  @ViewChild('CerrarBoton') cerrarBtn;
  @ViewChild('CerrarBotonMod') cerrarBtnMod;
  txtGG = '';
  ruta = 'http://localhost:8000/';
  pract =[ ];
  curso=[ ];
  PracticanteSeleccionado = {
    ci_practicante:'',
    nombre:'',
    apellido_paterno:'',
    apellido_materno:'',
    carrera:'',
    facultad:'',
    contrasenia:'',
    id_administrativo:''
  };
  

  newPracticante = new FormGroup({
    ci_practicante:new FormControl(''),
    nombre:new FormControl(''), //CHOQUE
    apellido_paterno:new FormControl(''), //FLORES
    apellido_materno:new FormControl(''),
    carrera:new FormControl(''),
    facultad:new FormControl(''),
    contrasenia:new FormControl(''),
    id_administrativo:new FormControl('')
  });

  constructor() { }

ngOnInit(): void {
  this.CargarPracticante();
}
  CargarPracticante() {
    axios.get<any[]>(this.ruta+'api/Practicante')
    .then(res => {
      console.log(res.data);
      this.pract = res.data;
      res.data.forEach(element => {
        element.Editando=false;
      });
    }).catch(err =>  {
    console.log("err");
    });
  }


  AgregarPracticante()
  {
    //para prueba
    // this.cerrarBtn.nativeElement.click();
    // return;
    //hasta aca
    const formData = new FormData();
    formData.append('ci_practicante',this.newPracticante.value.ci_practicante);
    formData.append('nombre',this.newPracticante.value.nombre); //CHOQUE
    formData.append('apellido_paterno',this.newPracticante.value.apellido_paterno); //FLORES
    formData.append('apellido_materno',this.newPracticante.value.apellido_materno);
    formData.append('carrera',this.newPracticante.value.carrera);
    formData.append('facultad',this.newPracticante.value.facultad);
    formData.append('contrasenia',this.newPracticante.value.contrasenia);
    formData.append('id_administrativo',this.newPracticante.value.id_administrativo);
    axios({
      method:'post',
      url:this.ruta+'api/Practicante',
      data:formData,
      headers:{'Content-Type':'multipart/form-data'}
    })
    .then(res=>{
      console.log('SE AÑADIO CORRECTAMENTE');
      console.log(res.data);
      this.cerrarBtn.nativeElement.click();
      this.CargarPracticante();
    })
    .catch(error=>{
      console.log('NO SE PUDO AÑADIR');
      console.log(error);
    })
  }
  
  ModificarPracticante(Practicante)
  {
    //PODIAMOS HACER POR EL METODO PUT PERO PARA PRACTICAR POR EL METODO POST
    //AL NO TENER METODO POST PARA MODIFICAR PUES, NOS CREAMOS NUESTRA PROPIA RUTA EN ROUTES API
    //LLAMADO ModificarPracticante
    Practicante.Editando=false;
    
    const formData = new FormData();
    formData.append('ci_practicante',Practicante.ci_practicante); //PEDRO
    formData.append('nombre',Practicante.nombre);
    formData.append('apellido_paterno',Practicante.apellido_paterno);
    formData.append('apellido_materno',Practicante.apellido_materno);
    formData.append('carrera',Practicante.carrera);
    formData.append('facultad',Practicante.facultad);
    formData.append('contrasenia',Practicante.contrasenia);
    formData.append('id_administrativo',Practicante.id_administrativo);
    axios({
      method:'post',
      url:this.ruta+'api/ModificarPracticante/'+Practicante.id_practicante,
      data:formData,
      headers:{'Content-Type':'multipart/form-data'}
    })
    
    // ESTO ES OTRA MANERA DE USAR (NO FUNCIONA CUANDO HAY FOTO; POR LO TANTO USAR method POST)
  // axios.put(this.ruta+'api/Practicante/'+Practicante.id, {
  //     Foto:this.newPracticante.value.Foto,
  //     Ap_Paterno: Practicante.Ap_Paterno,
  //     Ap_Materno: Practicante.Ap_Materno,
  //     Nombre: Practicante.Nombre,
  //     Sexo: Practicante.Sexo,
  //     FechNac: Practicante.FechNac,
  //     CI: Practicante.CI,
  //     Nombre_Padre: Practicante.Nombre_Padre,
  //     OcupacionP: Practicante.OcupacionP,
  //     Nombre_Madre: Practicante.Nombre_Madre,
  //     OcupacionM: Practicante.OcupacionM,
  //     Direccion: Practicante.Direccion,
  //     Telefono: Practicante.Telefono,
  //     Celular: Practicante.Celular,
  //     NColegio: Practicante.NColegio,
  //     TipoColegio: Practicante.TipoColegio,
  //     CGrado: Practicante.CGrado,
  //     CNivel: Practicante.CNivel,
  //     Especialidad: Practicante.Especialidad,
  //     Password: Practicante.Password,
  //     Estado: Practicante.Estado
  // })

  
    .then(res=>{
      console.log('SE MODIFICO CORRECTAMENTE');
      console.log(res);
      this.cerrarBtnMod.nativeElement.click();
      this.CargarPracticante();
    })
    .catch(error=>{
      console.log('HAY ERROR AL MODIFICAR');
      console.log(error);
    })
  }
  EliminarPracticante(Practicante)
  {
    
    if(confirm("Seguro que desea Eliminar Practicante? ")) {
        // const IdAdmin = 3;
    // const formData = new FormData();
    // formData.append('NombrePracticante',Practicante.nombrePracticante);
    // formData.append('NivelPracticante',Practicante.nivelPracticante);

    axios({
      method:'delete',
      url:this.ruta+'api/Practicante/'+Practicante.id_practicante
    })
    .then(res=>{
      console.log('SE ELIMINO CORRECTAMENTE');
      console.log(res);
      this.CargarPracticante();
    })
    .catch(error=>{
      console.log('HAY ERROR AL BORRAR');
      console.log(error);
    })
    }
  }
}