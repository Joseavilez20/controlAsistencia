
  <section id="section-content" class="col-10">
          <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Asistencias</li>
            </ol>
          </nav>
 <button type="button" class="btn btn-secondary pull-right" id="daterange-btn">
   <span> 
    <i class="fa fa-calendar"></i> Rango de fecha
   </span>

   <i class="fa fa-caret-down"></i>
 </button>
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

      if(isset($_GET["fechaInicial"])){

        $fechaInicial = $_GET["fechaInicial"];
        $fechaFinal = $_GET["fechaFinal"];

      }else {
        $fechaFinal = null;
        $fechaInicial = null;
      }

		  	

        $asistencias = ControladorAsistencia::ctrRangoFechasAsistencias($fechaInicial, $fechaFinal);
        

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