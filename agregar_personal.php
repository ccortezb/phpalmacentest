<!DOCTYPE html>
<html lang="en">
<head>
  <title>Almacen App Wiener</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Almacen App</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="agregar_personal.html">Personal</a></li>
        <li><a href="agregar_empleado.html">Empleado</a></li>
        <li><a href="agregar_producto.html">productos</a></li>
        <li><a href="agregar_pedido.html">pedidos</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-9">
    <br>
    <br>

<html>
<head>
    <title>Contrato de nuevo Personal</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $idPersonal = $_POST['idPersonal'];
    $dni = $_POST['dni'];
    $Nomb = $_POST['Nomb'];
    $Direc = $_POST['Direc'];
    $Telef = $_POST['Telef'];
    $Edad = $_POST['Edad'];
    $Cargo_emp = $_POST['Cargo_emp'];
        
    // checking empty fields
    if(empty($idPersonal) || empty($dni) || empty($Nomb) || empty($Direc) || empty($Telef) || empty($Edad) || empty($Cargo_emp)) {                
        if(empty($idPersonal)) {
            echo "<font color='red'>el id esta vacio.</font><br/>";
        }
        
        if(empty($dni)) {
            echo "<font color='red'>el dni esta vacio.</font><br/>";
        }
        
        if(empty($Nomb)) {
            echo "<font color='red'>el nombre esta vacio.</font><br/>";
        }
        if(empty($Direc)) {
            echo "<font color='red'>el id esta vacio.</font><br/>";
        }
        
        if(empty($Telef)) {
            echo "<font color='red'>el dni esta vacio.</font><br/>";
        }
        
        if(empty($Edad)) {
            echo "<font color='red'>el nombre esta vacio.</font><br/>";
        }
        if(empty($Cargo_emp)) {
            echo "<font color='red'>el nombre esta vacio.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $dni2=(int)$dni;
        $Telef2=(int)$Direc;
        $result = mysqli_query($mysqli, "INSERT INTO Personal VALUES('$idPersonal',$dni2,'$Nomb','$Direc',$Telef2,'$Edad','$Cargo_emp')");
        
        //display success message
        echo "<font color='green'>personal agregado.";
        echo "<br/><a href='index.php'>regresar</a>";
    }
}
?>
</body>
</html>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Wiener 2017</p>
</footer>

</body>
</html>
