
  <section id="section-content" class="col-10">
          <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Asistencias</li>
            </ol>
          </nav>

         <table class="table  table-bordered" id="table_id">

		  <thead  class="head-table">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Fecha ingreso</th>
		      <th scope="col">Nombre</th>
		      <th scope="col">Foto</th>
		      <th scope="col">Acciones</th>
		    </tr>
		  </thead>
		  <tbody>
		<?php
		  	$item = null;
          $valor = null;

        $asistencias = ControladorAsistencia::ctrMostrarAsistencias($item, $valor);
        

       foreach ($asistencias as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["fecha"].'</td>';
               
                  $item = "codigo";
                  $valor = $value["codigo_estudiante"];
                
                   $estudiante = ControladorEstudiante::ctrMostrarEstudiantes($item, $valor);


                 echo '<td>'.$estudiante["nombre_estudiante"].'</td>';

                  

                   if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/asistencias/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }
                  
                  

           
                      

                  echo '<td>

                    <div class="btn-group" role="group" aria-label="Basic example">

                      <button type="button" class="btn btn-primary" idEstudiante="'.$value["id"].'"><i class="fa fa-eye"></i></button>


                      <button class="btn btn-danger btnEliminarAsistencia" idAsistencia="'.$value["id"].'" fotoEstudiante="'.$value["foto"].'" codigo="'.$value["codigo_estudiante"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


		 ?>
		   
		  </tbody>
		</table>


        </section>

     <?php

      $borrarAsistencia = new ControladorAsistencia();
      $borrarAsistencia -> ctrBorrarAsistencia();

?> 