<section id="section-content" class="col-10">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear-asistencia</li>
            </ol>
          </nav>
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail">Codigo</label>
               
                <input type="text"  class="form-control" id="inputCode" name="codigoEstudiante" aria-describedby="emailHelp">

              </div>
             
            </div>
            
            
            
            <div class="form-row">
              <div class="form-group  col-md-6">

                <div class="custom-file">

                
                
                <input type="file" class="custom-file-input nuevaFoto" aria-describedby="fotoHelp" name="fotoEstudiante" id="validatedCustomFile" required>
                <small id="fotoHelp" class="form-text text-muted">Peso máximo de la foto 2MB</small>

                <label class="custom-file-label" for="validatedCustomFile">Escoja una foto...</label>
                
                <div class="invalid-feedback">Archivo invalido</div>
                 <div >
                  <img src="vistas/img/asistencias/default/anonymous.png" class="img-thumbnail previsualizar " width="100px">
                </div>

              </div>
              </div>
             
              
             
   
             </div>
              <button type="submit" class="btn btn-primary mt-5">Guardar</button> 
          
        <?php

          $crearAsistencia= new ControladorAsistencia();
          $crearAsistencia -> ctrCrearAsistencia();

        ?>
          </form>
        </section>