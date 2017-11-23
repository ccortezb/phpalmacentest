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
        <li><a href="index.html">Home</a></li>
        <li><a href="agregar_empleado.html">Personal</a></li>
        <li><a href="agregar_empleado.html">Empleado</a></li>
        <li class="active"><a href="#section3">productos</a></li>
        <li><a href="#section3">pedidos</a></li>
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

    <?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['updatestock']))
{    
    $idProducto = $_POST['idProducto'];
    $nom_prod = $_POST['nom_prod'];
    $stock = $_POST['stock'];
    $Stock_asignado = $_POST['Stock_asignado'];
    
    // checking empty fields
    if(empty($stock) || empty($idProducto) ) {                
        if(empty($idProducto)) {
            echo "<font color='red'>el idProducto esta vacio.</font><br/>";
        }
        
        if(empty($stock)) {
            echo "<font color='red'>el stock esta vacio.</font><br/>";
        }
           
        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "update Producto_Almacen  set Stock_asignado=$stock where idProducto=$idProducto");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
    <form action="pedir_stock.php" method="post" name="formpedirstock">
        <table width="25%" border="0">
             <tr>
                <td>idProducto</td>
                <td><input type="number" name="idProducto"></td>
            </tr>
            <tr>
                <td>¿ A Cuanto deseas actualizar el stock asignado en su almacen?</td>
                <td><input type="number" name="stock"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="updatestock" value="Pedir Stock"></td>
            </tr>
        </table>
    </form>



      
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
