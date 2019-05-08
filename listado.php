
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
          <!-- <li class="nav-item">
            <a class="nav-link coloresN" href="#portfolio">Ingetech</a>
          </li> -->
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
          <li class="breadcrumb-item active">
            Listado
          </li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <!-- <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div> -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fuerza</th>
                <th>Sede</th>
                <th>Departamento</th>
                <th>Localización</th>
                <th>Estado</th>
                <th>Fecha programada</th>
                <th>Fecha visita</th>

            </tr>
        </thead>

    </table>
            </div>
          </div>
          <div class="card-footer small text-muted" idea="ultima_actualizacion">Actualizado ayer 11:59 PM</div>
        </div>



      </div>
      <!-- /.container-fluid -->



    </div>
    <!-- /.content-wrapper -->

  </div>


<script type="text/javascript" src="./js/listado.js"></script>
<?php include './footer.php';?>
</body>

</html>
