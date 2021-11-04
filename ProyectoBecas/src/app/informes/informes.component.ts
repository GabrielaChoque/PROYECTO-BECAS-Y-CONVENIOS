import { Component, OnInit, ViewChild } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import axios from 'axios';

@Component({
  selector: 'app-informes',
  templateUrl: './informes.component.html',
  styleUrls: ['./informes.component.css']
})
export class InformesComponent implements OnInit {
  ruta = 'http://localhost:8000/';
  @ViewChild('CerrarBoton') cerrarBtn;
  informe = [];
  newInforme = new FormGroup({
    titulo:new FormControl(''),
    fecha:new FormControl(''),
    descripcion:new FormControl(''),
    id_practicante:new FormControl('')
  });
  
  constructor() { }

  ngOnInit(): void {
    this.CargarInforme();
  }
  CargarInforme() {
    axios.get<any[]>(this.ruta+'api/Informe')
          .then(res =>{
            console.log("OBTENIENDO ADMINs");
            console.log(res.data);
            var Datos = res.data;
            Datos.forEach(element => {
              element.Editando=false;
            });
            this.informe = res.data;
          }).catch(error =>{
            console.log("hay error");
            console.log(error);
          })
  }

  AgregarInforme()
  {
    //para prueba
    // this.cerrarBtn.nativeElement.click();
    // return;
    //hasta aca



    const formData = new FormData();
    formData.append('titulo',this.newInforme.value.titulo);
    formData.append('fecha',this.newInforme.value.fecha);
    formData.append('descripcion',this.newInforme.value.descripcion);
    formData.append('id_practicante',this.newInforme.value.id_practicante);
    
    console.log(formData);
    axios({
      method:'post',
      url:this.ruta+'api/Informe',
      data:formData,
      headers:{'Content-Type':'multipart/form-data'}
    })
    .then(res=>{
      console.log('SE AÑADIO CORRECTAMENTE');
      console.log(res);
      this.cerrarBtn.nativeElement.click();
      this.CargarInforme();
    })
    .catch(error=>{
      console.log('HAY ERROR XD');
      console.log(error);
    })
  }
  
  ModificarInforme(Informe)
  {
    Informe.Editando=false;
    
    // const IdAdmin = 3;
    // const formData = new FormData();
    
    // formData.append('NombreInforme',Informe.id);
    // formData.append('NivelInforme',Informe.id);

    // ESTO ES OTRA MANERA DE USAR
  axios.put(this.ruta+'api/Informe/'+Informe.id_informe, {
    titulo: Informe.titulo,
    fecha:Informe.fecha,
    descripcion:Informe.descripcion,
    id_practicante:Informe.id_practicante,
      
  })


    .then(res=>{
      //OBTENER RETURN DE CONTROLLER
      // var x = res;
      // var xD:string  = x.toString();

      // console.log(xD);
      
      console.log('SE MODIFICO CORRECTAMENTE');
      console.log(res);
      this.CargarInforme();
    })
    .catch(error=>{
      console.log('HAY ERROR AL MODIFICAR');
      console.log(error);
    })
  }
  EliminarInforme(Informe)
  {
    console.log(Informe);

    if(confirm("Seguro que desea eliminar el Curso? ")) {
        // const IdAdmin = 3;
    // const formData = new FormData();
    // formData.append('NombreCurso',Curso.nombreCurso);
    // formData.append('NivelCurso',Curso.nivelCurso);

    axios({
      method:'delete',
      url:this.ruta+'api/Informe/'+Informe.id_informe
    })
    .then(res=>{
      console.log('SE ELIMINO CORRECTAMENTE');
      console.log(res);
      this.CargarInforme();
    })
    .catch(error=>{
      console.log('HAY ERROR AL BORRAR');
      console.log(error);
    })
    }
    
  }
}