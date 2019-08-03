<section id="section-content" class="col-10">
          <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear-estudiante</li>
            </ol>
          </nav>
          <form method="POST" enctype="multipart/form-data">
          	<?php

                    $item = "id";
                    $valor = $_GET["idEstudiante"];

                    $estudiante = ControladorEstudiante::ctrMostrarEstudiantes($item, $valor);
                    

             ?>       
             <div class="form-group">
              <label for="exampleInputEmail1">Codigo</label>
              <input type="text" class="form-control"  name="editarCodigo"  value="<?php echo $estudiante["codigo"]; ?>">
              <input type="hidden" name="idEstudiante" value="<?php echo $estudiante["id"]; ?>">
             
            </div>
            <div class="form-group">
              <label for="name">Nombre Estudiante</label>
              <input type="text" class="form-control"   name="editarNombre" value="<?php echo $estudiante["nombre_estudiante"]; ?>">
              
            </div>
             <div class="form-group">
              <label for="nameAttendant">Nombre Acudiente</label>
              <input type="text" class="form-control" id="nameAttendant" name="editarAcudiente" value="<?php echo $estudiante["nombre_acudiente"]; ?>">
              
            </div>
            <div class="form-group">
              <label for="Acudiente">Correo</label>
              <input type="email" class="form-control"  aria-describedby="emailHelp" name="editarCorreo" value="<?php echo $estudiante["correo"]; ?>">
              <small id="emailHelp" class="form-text text-muted">Este correo será utilizado para notificar la asistencia del estudiante</small>
            </div>

              <div class="form-group">
                <input type="file" class="nuevaFoto"  name="editarFoto" id="validatedCustomFile" >
                  
                <p class="help-block">Peso máximo de la foto 2MB</p>

                <?php
                 if($estudiante["foto"] != ""){

                    echo '<img src="'.$estudiante["foto"].'" class="img-thumbnail previsualizar" width="100px">';
                   

                  }else{

                    echo '<img src="vistas/img/estudiantes/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">';

                  }
                  ?>
              
               <input type="hidden" name="fotoActual" id="fotoActual" value="<?php echo $estudiante["foto"]; ?>">
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
          
            <button type="submit" class="btn btn-primary mt-5">Guardar</button>

        <?php

          $editarEstudiante = new ControladorEstudiante();
          $editarEstudiante -> ctrEditarEstudiante();

        ?>
          </form>
        </section>