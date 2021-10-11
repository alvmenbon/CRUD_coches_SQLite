<?php

include("db.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $db->query("SELECT * FROM cars WHERE id = $id");
    if($result!=NULL) {
       /* echo 'you can edit'; */
       $row = $result->fetchArray();
       $brand = $row['brand'];
       $model = $row['model'];                  /*ESTO COGE LOS DATOS DE TU TABLA*/
       $year = $row['year'];
       $matricula = $row['matricula'];
       $precio = $row['precio']; 
       
    }
}

if (isset($_POST['update'])){
   /* echo 'updating';*/
   $id = $_GET['id'];
   $brand = $_POST['brand'];
   $model = $_POST['model'];
   $year = $_POST['year'];
   $matricula = $_POST['matricula'];
   $precio = $_POST['precio']; 
   
  /* echo $brand;
   echo $model;
   echo $year;
   echo $matricula;
   echo $precio;*/
   /*$query = "UPDATE cars set brand = '$brand', model = '$model', year = '$year', matricula= '$matricula', precio = '$precio' WHERE id = $id";
   mysqli_query($conn, $query);*/
   $db->query("UPDATE cars set brand = '$brand', model = '$model', year = '$year', matricula= '$matricula', precio = '$precio' WHERE id = $id");

    $_SESSION['message']= 'Datos editados correctamente';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
   <div class="row">
       <div class="col-md-4 mx-auto">
           <div class="card card-body">
               <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST" >
                   <div class="form-group">
                       <input type="text" name="brand" value="<?php echo $brand; ?>" class="form-control" placeholder="Edita la marca">
                   </div>
                   <div class="form-group">
                       <input type="text" name="model" value="<?php echo $model; ?>" class="form-control" placeholder="Edita el modelo">
                   </div>
                   <div class="form-group">
                       <input type="num" name="year" value="<?php echo $year; ?>" class="form-control" placeholder="Edita el año">
                   </div>
                   <div class="form-group">
                       <input type="text" name="matricula" value="<?php echo $matricula; ?>" class="form-control" placeholder="Edita la matricula">
                   </div>
                   <div class="form-group">
                       <input type="num" name="precio" value="<?php echo $precio; ?>" class="form-control" placeholder="Edita el precio">
                   </div>
                   <button class="btn btn-succes" name="update">Editar</button>
               </form>
           </div>
       </div>
   </div> 
</div>

<?php include("includes/footer.php") ?>
