<section id="section-content" class="col-10">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear-estudiante</li>
            </ol>
          </nav>
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail">Codigo </label>
               
                <input type="text"  class="form-control" id="inputCode" name="newCode" aria-describedby="emailHelp"  readonly>
                <span class="btnStatus"></span>
               
                <button type="button" class="btn btn-primary" id="btnSincronizar">Recibir codigo</button>
                
              </div>
              <div class="form-group col-md-6">
                <label for="name">Nombre Estudiante</label>
                <input type="text" class="form-control" id="name"  name="nameStudent" placeholder="Digite el nombre">
              </div>
            </div>
            
            
             <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nameAttendant">Nombre Acudiente</label>
                <input type="text" class="form-control" id="nameAttendant" name="nameAttendant" placeholder="Digite el nombre del acudiente">
              </div>
              <div class="form-group col-md-6">
                <label for="Acudiente">Correo</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Digite el email">
                <small id="emailHelp" class="form-text text-muted">Este correo será utilizado para notificar la asistencia del estudiante</small>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group  col-md-6">

                <div class="custom-file">

                
                
                <input type="file" class="custom-file-input nuevaFoto" aria-describedby="fotoHelp" name="nuevaFoto" id="validatedCustomFile" required>
                <small id="fotoHelp" class="form-text text-muted">Peso máximo de la foto 2MB</small>

                <label class="custom-file-label" for="validatedCustomFile">Escoja una foto...</label>
                
                <div class="invalid-feedback">Archivo invalido</div>
                 <div >
                  <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar " width="100px">
                </div>

              </div>
              </div>
             
              
             
   
             </div>
              <button type="submit" class="btn btn-primary mt-5">Guardar</button> 
          
        <?php

          $crearEstudiante= new ControladorEstudiante();
          $crearEstudiante -> ctrCrearEstudiante();

        ?>
          </form>
        </section>