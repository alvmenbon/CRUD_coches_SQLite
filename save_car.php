<?php 

include("db.php");

if (isset($_POST['save-car'])){
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $matricula = $_POST['matricula'];
    $precio =$_POST['precio'];

    
    $result = $db->query("INSERT INTO cars(brand, model, year, matricula, precio) VALUES('$brand', '$model', '$year', '$matricula', '$precio')");
    
    
    if (!$result) {
        die("query error");  /*COMPROBACION DE LA CONSULTA*/
    }

    $_SESSION['message']= 'Coche añadido correctamente';
    $_SESSION['message_type']='success';


    header("Location:  index.php"); /*REDIRECCIONA */
}

?>
