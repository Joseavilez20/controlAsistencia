
  <section id="section-content" class="col-10">
          <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Estudiantes</li>
            </ol>
          </nav>

          <a href="crear-estudiante" class="btn btn-primary" role="button" aria-pressed="true">Agregar estudiante</a>
            

<div class="table-responsive-xl">
  
  <table class="table w-100 tablas"  >

      <thead  class="head-table">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Codigo</th>
          <th scope="col">Nombre</th>
          <th scope="col">Foto</th>
          <th scope="col">Acudiente</th>
          <th scope="col">Email</th>
          
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
    <?php
        $item = null;
          $valor = null;

        $estudiantes = ControladorEstudiante::ctrMostrarEstudiantes($item, $valor);
        

       foreach ($estudiantes as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["codigo"].'</td>

                 

                  <td>'.$value["nombre_estudiante"].'</td>';

                   if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }
                  
                  echo '<td>'.$value["nombre_acudiente"].'</td>
                  <td>'.$value["correo"].'</td>';

           
                      

                  echo '<td>

                    <div class="btn-group" role="group" aria-label="Basic example">

                      <button type="button" class="btn btn-primary" idEstudiante="'.$value["id"].'"><i class="fa fa-eye"></i></button>

                      <button class="btn btn-warning btnEditarEstudiante" idEstudiante="'.$value["id"].'" data-toggle="modal"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarEstudiante" idEstudiante="'.$value["id"].'" fotoEstudiante="'.$value["foto"].'" codigo="'.$value["codigo"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


     ?>
       
      </tbody>
    </table>

</div>
         

        </section>

  <?php

      $borrarEstudiante = new ControladorEstudiante();
      $borrarEstudiante -> ctrBorrarEstudiante();

?> 


   