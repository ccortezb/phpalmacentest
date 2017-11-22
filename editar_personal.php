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
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
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
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE Personal SET idPersonal='$idPersonal',dni2=dni2,Nomb='$Nomb',Direc='$Direc',Telef2=Telef2,Edad='$Edad',Cargo_emp='$Cargo_emp' WHERE idPersonal=$idPersonal");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$idPersonal = $_GET['idPersonal'];
include("config.php");
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Personal WHERE idPersonal=$idPersonal");
echo($result);
while($res = mysqli_fetch_array($result))
{
    $idPersonal = $res['idPersonal'];
    $dni = $res['dni'];
    $Nomb = $res['Nomb'];
    $Direc = $res['Direc'];
    $Telef = $res['Telef'];
    $Edad = $res['Edad'];
    $Cargo_emp = $res['Cargo_emp']; 
}
?>
<html>
<head>    
    <title>Editar Información de Personal</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editar_personal.php">
            <table width="25%" border="0">
            <tr>
                <td>dni</td>
                <td><input type="text" name="dni" value="<?php echo $dni;?>"</td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="Nomb" value="<?php echo $Nomb;?>"</td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td><input type="text" name="Direc" value="<?php echo $Direc;?>"</td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" name="Telef" value="<?php echo $Telef;?>"</td>
            </tr>
            <tr>
                <td>Edad</td>
                <td><input type="text" name="Edad" value="<?php echo $Edad;?>"</td>
            </tr>
            <tr>
                <td>Cargo</td>
                <td><input type="text" name="Cargo_emp" value="<?php echo $Cargo_emp;?>"</td>
            </tr>
        </table>
            <tr>
                <td><input type="hidden" name="idPersonal" value=<?php echo $_GET['idPersonal'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
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
