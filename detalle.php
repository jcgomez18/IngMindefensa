
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
            <a class="nav-link  coloresN" href="./listado.php">Listado</a>
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

          <li class="breadcrumb-item"><a href="./listado.php">Listado</a></li>
          <li class="breadcrumb-item active " id="id_batallon"></li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <!-- <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div> -->
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
                <div class="row">
                  <div class="col col-md-12 text-center">
                    <ul class="list">
                      <li>
                        <i class="fa fa-images  big-text icon-s"></i>
                        <label  class="big-text text-left">Registro fotografico</label>
                        <img id="img_principal" alt="">
                      </li>
                    </ul>
                  </div>
                </div>
                </br>
                <div class="row">
                    <div class="col col-md-4">
                      <ul class="list">
                            <li>
                                <i class="fa fa-money icon-s"></i>
                                <label>Nombre</label>
                                <strong  id="nombreBatallon"></strong>
                            </li>
                            <li>
                                <i class="fa fa-dollar icon-s"></i>
                                <label>Fuerza</label>
                                <strong  id="fuerza"></strong>
                            </li>
                            <li>
                                <i class="fa fa-percent icon-s"></i>
                                <label>Sede </label>
                                <strong  id="sede" ></strong>
                            </li>
                            <li>
                                <i class="fa fa-dollar icon-s"></i>
                                <label>Departamento</label>
                               <strong  id="departamento"></strong>
                            </li>
                            <li>
                                <i class="fa fa-dollar icon-s"></i>
                                <label>Localización</label>
                               <strong  id="localizacion"></strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col col-md-4">
                        <ul class="list">
                            <li>
                                <i class="fa fa-clock-o icon-s"></i>
                                <label>Lider visita</label>
                                <strong id="lider_visita"></strong>
                            </li>
                            <li>
                                <i class="fa fa-clock-o icon-s"></i>
                                <label>Quien atiende</label>
                                <strong id="quien_atiende"></strong>
                            </li>
                            <li>
                                <i class="fa fa-hashtag icon-s"></i>
                                <label>Fecha programada</label>
                                <strong id="fecha_programada"></strong>
                            </li>
                            <li>
                                <i class="fa fa-clock-o icon-s"></i>
                                <label>Fecha visita</label>
                                <strong id="fecha_visita"></strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col col-md-4">
                        <ul class="list">
                            <li>
                                <i class="fa fa-info icon-s"></i>
                                <label>Cantidad de personas</label>
                                <strong id="cantidad_personas"></strong>
                            </li>
                            <li>
                                <i class="fa fa-info icon-s"></i>
                                <label>Seguros voluntarios</label>
                                <strong id="seguros_voluntarios"></strong>
                            </li>
                            <li>
                                <i class="fa fa-info icon-s"></i>
                                <label>Seguros complementarios</label>
                                <strong id="seguros_complementarios"></strong>
                            </li>
                        </ul>
                        <ul class="list">
                            <li>
                                <i class="fa fa-users icon-s"></i>
                                <label>Observaciones</label>
                                <strong id="observaciones"></strong>
                            </li>

                        </ul>
                    </div>
                </div>
              </div>
            </aside>
          </div>
          <!-- <div class="card-footer small text-muted" idea="ultima_actualizacion">Actualizado ayer 11:59 PM</div> -->
        </div>



      </div>
      <!-- /.container-fluid -->



    </div>
    <!-- /.content-wrapper -->

  </div>


<script type="text/javascript" src="./js/detalle.js"></script>
<?php include './footer.php';?>
</body>

</html>
