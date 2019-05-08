
<!DOCTYPE html>
<html lang="en">

<?php include 'header.php';?>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand " href="./index.php"><img src="img/logoPrevi.png" style="width: 100px;" alt=""></a>
      <a class="navbar-brand" href="./index.php"><img src="img/mindef.png" style="width: 100px;" alt=""></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link  coloresN" href="./listado_editar.php">Listado</a>
          </li>
          <li class="nav-item">
            <a class="nav-link coloresN" href="./index.php">Inicio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <hr class="divider my-5">


  <div id="wrapper">



    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">

          <li class="breadcrumb-item"><a href="./listado_editar.php">Listado</a></li>
          <li class="breadcrumb-item active " id="id_batallon"></li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <!-- <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div> -->
          <form id="editar_form"    >
              <div class="card-body">
                <aside class="basic-infomation">
                  <div class="table">
                    <div class="row">
                      <div class="col col-md-12 ">
                        <ul class="list">
                            <li>
                                <i class="fa fa-key  big-text icon-s"></i>
                                <label  class="big-text">ID Batallon</label>
                                <strong class="bigger-text" id="id_batallon_g"></strong>
                            </li>
                        </ul>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-12 text-center">
                        <ul class="list">
                          <li>
                            <i class="fa fa-images  big-text icon-s"></i>
                            <label  class=" text-left">Registro fotografico</label>
                            <img id="img_principal" alt="">
                            <input class="form-control" type="file" class="form-control"  id="imagen"  accept="image/jpg,image/jpeg"  />
                          </li>
                        </ul>
                      </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col col-md-4">
                          <ul class="list">
                                <li>
                                    <label>Nombre</label>
                                    <strong  id="nombreBatallon"></strong>
                                </li>
                                <li>
                                    <label>Fuerza</label>
                                    <strong  id="fuerza"></strong>
                                </li>
                                <li>
                                    <label>Sede </label>
                                    <strong  id="sede" ></strong>
                                </li>
                                <li>
                                    <label>Departamento</label>
                                   <strong  id="departamento"></strong>
                                </li>
                                <li>
                                    <label>Localización</label>
                                   <input  class="form-control" name="localizacion" id="localizacion">
                                </li>
                            </ul>
                        </div>
                        <div class="col col-md-4">
                            <ul class="list">
                                <li>
                                    <label>Lider visita</label>
                                     <input  class="form-control" type="text" name="lider_visita" id="lider_visita">
                                </li>
                                <li>
                                    <label>Quien atiende</label>
                                     <input  class="form-control" type="text" name="quien_atiende" id="quien_atiende">
                                </li>
                                <li>
                                    <label>Fecha programada</label>
                                     <input  class="form-control" type="date" name="fecha_programada" id="fecha_programada">
                                </li>
                                <li>
                                    <label>Fecha visita</label>
                                     <input  class="form-control" type="date" name="fecha_visita" id="fecha_visita">
                                </li>
                            </ul>
                        </div>
                        <div class="col col-md-4">
                            <ul class="list">
                                <li>
                                    <label>Cantidad de personas</label>
                                    <input  class="form-control" type="number" name="cantidad_personas" id="cantidad_personas">
                                </li>
                                <li>
                                    <label>Seguros voluntarios</label>
                                    <input  class="form-control" type="number" name="seguros_voluntarios" id="seguros_voluntarios">
                                </li>
                                <li>
                                    <label>Seguros complementarios</label>
                                    <input  class="form-control" type="number" name="seguros_complementarios" id="seguros_complementarios">
                                </li>
                            </ul>
                            <ul class="list">
                                <li>
                                    <label>Observaciones</label>
                                    <textarea form="editar_form" cols="40" rows="5" name="observaciones" id="observaciones"></textarea>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col col-md-12">
                        <button type="submit" form="editar_form" class="btn btn-success form-control" value="Submit">Guardar</button>
                      </div>
                    </div>
                  </div>
                </aside>
              </div>
          </form>

          <!-- <form class="form-horizontal" method="POST" action="./modelos/cargaImagenes.php"  autocomplete="off">
    				<div class="form-group">
    					<label for="archivo" class="col-sm-2 control-label">Archivo</label>
    					<div class="col-sm-10">
    						<input type="file" class="form-control" id="archivo" name="archivo">
    					</div>
    				</div>
            <div class="form-group">
    					<div class="col-sm-offset-2 col-sm-10">
    						<a href="index.php" class="btn btn-default">Regresar</a>
    						<button type="submit" class="btn btn-primary">Guardar</button>
    					</div>
    				</div>
          </form> -->

          <!-- <div class="card-footer small text-muted" idea="ultima_actualizacion">Actualizado ayer 11:59 PM</div> -->
        </div>




      </div>
      <!-- /.container-fluid -->



    </div>
    <!-- /.content-wrapper -->

  </div>


<script type="text/javascript" src="./js/detalle_editar.js"></script>
<?php include './footer.php';?>
</body>

</html>
