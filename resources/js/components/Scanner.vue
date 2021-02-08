<template>
  <div>
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
          <div class="card text-center" style="width: 18rem;">
            <video id="preview" class="card-img-top"> </video>
            <div class="card-body">
              <h5 class="card-title">QR SCANNER</h5>
              <p class="card-text">
               {{ mensaje }}
              </p>
            </div>
            <div class="card-body">
              <a href="#" class="card-link">Mas detalles </a>
            </div>
          </div>
      </div>
      <div class="col-md-8">
        <div class="table-responsive">
           <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nro.</th>
                  <th scope="col">Codigo</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) of registros">
                  <td scope="row">{{ index+1 }}</td>
                  <td>{{ item }}</td>
                  <td>@mdo</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        data() {
            return {
                editmode : false,
                registros : {},
                mensaje: 'Escanee el QR',
                form: new Form({
                    id:'',
                    nombre: '',
                    fecha: ''
                })
            }
        },
        mounted: function (){
          this.onInitialOpenCamera();
        },
        methods:{
          onInitialOpenCamera(){
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
              console.log(content);
                if(this.registros.indexOf(content) >= 0){
                  this.mensaje = 'El QR ya existe';
                }else{
                  this.registros.push(content);
                  this.mensaje = 'Insercion correcta';
                }

                setTimeout(function (){
                  this.mensaje = 'Escanee el QR';
                }, 1500);
            });
            Instascan.Camera
              .getCameras()
              .then(function (cameras){
                if (cameras.length > 0) {
                  scanner.start(cameras[0]);
                } else {
                  console.error('No cameras found Jorge.');
                }
              })
              .catch(error => alert(error))
          }
        }
    }
</script>