<html>
<head>
    <title>Agregar Empleado al Almacen</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $idempleado = $_POST['idempleado'];
    $dni = $_POST['dni'];
    $nom_emp = $_POST['nom_emp'];
        
    // checking empty fields
    if(empty($idempleado) || empty($dni) || empty($nom_emp)) {                
        if(empty($idempleado)) {
            echo "<font color='red'>el id esta vacio.</font><br/>";
        }
        
        if(empty($dni)) {
            echo "<font color='red'>el dni esta vacio.</font><br/>";
        }
        
        if(empty($nom_emp)) {
            echo "<font color='red'>el nombre esta vacio.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO almacen VALUES('$idempleado','$dni','$nom_emp')");
        
        //display success message
        echo "<font color='green'>empleado agregado.";
        echo "<br/><a href='index.php'>regresar</a>";
    }
}
?>
</body>
</html>