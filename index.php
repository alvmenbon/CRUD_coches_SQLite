<?php include("db.php") ?>
<?php include("includes/header.php") ?>
    <div class="container p-4">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])) { ?>                                      
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="save_car.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="brand" class="form-control" placeholder="Introduce la marca" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="model" class="form-control" placeholder="Introduce el Modelo" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="num" name="year" class="form-control" placeholder="Introduce el año" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="matricula" class="form-control" placeholder="Introduce la matricula" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="num" name="precio" class="form-control" placeholder="Introduce el precio" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save-car" value="Añadir coche">
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Año</th>
                            <th>Matricula</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $query = "SELECT * FROM cars";
                      $result_car = mysqli_query($conn, $query);

                      while($row = mysqli_fetch_array($result_car)){?>
                        <tr>
                            <td><?php echo $row['brand'] ?></td>
                            <td><?php echo $row['model'] ?></td>
                            <td><?php echo $row['year'] ?></td>
                            <td><?php echo $row['matricula'] ?></td>
                            <td><?php echo $row['precio'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fab fa-bitcoin"></i>
                                </a>
                                <a href="delete_car.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                      <?php } ?>
                    </tbody>
                </table>
        </div>

    </div>
<?php include("includes/footer.php")?>