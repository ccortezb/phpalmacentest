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
    
    <?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM Personal ORDER BY idPersonal DESC"); 
$resultStock = mysqli_query($mysqli, "select p.idProducto, p.nom_prod, pa.Stock, pa.Stock_asignado from Producto p, Producto_Almacen pa where p.idProducto=pa.idProducto"); 
// using mysqli_query instead
?>
 
<html>
<head>    
    <title>Home</title>
</head>
 
<body>
    <a href="agregar_personal.html">Agregar nuevo personal aquí.</a><br/><br/>
    <h4>Personal Contratado: </h4>
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>idPersonal</td>
            <td>dni</td>
            <td>Nomb</td>
            <td>Direc</td>
            <td>Telef</td>
            <td>Edad</td>
            <td>Cargo_emp</td>
            <td>Mantenimiento</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['idPersonal']."</td>";
            echo "<td>".$res['dni']."</td>";
            echo "<td>".$res['Nomb']."</td>";
            echo "<td>".$res['Direc']."</td>";
            echo "<td>".$res['Telef']."</td>";
            echo "<td>".$res['Edad']."</td>"; 
            echo "<td>".$res['Cargo_emp']."</td>";   
            echo "<td><a href=\"editar_personal.php?idPersonal=$res[idPersonal]\">Editar</a> | <a href=\"eliminar_personal.php?idPersonal=$res[idPersonal]\" onClick=\"return confirm('Seguro que desea eliminarlo?')\">Eliminar</a></td>";        
        }
        ?>
    </table>
    <br>
    
    <a href="agregar_producto.html">Agregar nuevo producto aquí.</a><br/><br/>
    <h4>Stock de Productos: </h4>
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>idProducto</td>
            <td>nom_prod</td>
            <td>Stock</td>
            <td>Stock_asignado</td>
            <td>Funcionalidades</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($resultStock)) {         
            echo "<tr>";
            echo "<td>".$res['idProducto']."</td>";
            echo "<td>".$res['nom_prod']."</td>";
            echo "<td>".$res['Stock']."</td>";
            echo "<td>".$res['Stock_asignado']."</td>";
  
            echo "<td><a href=\"pedir_stock.php?idProducto=$res[idProducto]\">Pedir Stock a tienda</a> | <a href=\"actualizar_stock.php?idProducto=$res[idProducto]\">Actualizar Stock total</a></td>";        
        }
        ?>
    </table>
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
